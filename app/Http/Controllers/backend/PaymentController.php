<?php

namespace App\Http\Controllers\backend;

use App\DataTables\PaymentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index()
    {
        if(!Session::has('address')){
            return redirect()->route('user.checkout');
        }

        return view('frontend.page.payment');
    }

    public function createPayment(Request $request)
    {
        // dd($request->all());

        // Validate the request data
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'card_number' => 'required|digits:16',
            'exp_date' => 'required|digits:4'
        ]);

        // Call the CreateOrder function
        $merchantId = '316100770110001';
        $amount = $request->amount;
        $pan= $request->card_number;
        $exp= $request->exp_date;
        $payment_type= $request->payment_type;
        // $data = $merchantId.", ".$amount.", ".$pan.", ".$exp.", ".$payment_type;
        // dd($data);

        $xmlResp = $this->createOrder($merchantId, $amount, $pan, $exp, $payment_type);
        $orderId = $xmlResp['OrderID'];
        $sessionId = $xmlResp['SessionID'];

        $xmlResp_getOrderStatus = $this->getOrderStatus($sessionId, $merchantId, $orderId, $payment_type);
        $orderStatus = (string)$xmlResp_getOrderStatus->Response->Order->OrderStatus;

        // Process the response and return a JSON response
        if ($xmlResp) {
            // Process the XML response and extract the required data
            // Add more data extraction as needed
            $payment = Payment::create([
                'user_id' => Auth::user()->id,
                'mid' => $merchantId,
                'orderId' => $orderId,
                'sessionId' => $sessionId,
                'orderstatus' => $orderStatus,
                'pan' => $pan,
                'exp' => $exp,
                'amount' => $amount,
                'payment_type' => $payment_type,
            ]);

            return response()->json(['message' => $payment, 201]);

        } else {
            return response()->json(['message' => 'Payment creation failed'], 400);
        }
    }

    public function createOrder($merchantId, $amount, $pan, $exp, $payment_type)
    {
        $resp ='@fee:0@cur:USD@payout:{"payees":[{"mtxnid":"1688615455782386-1","mid":"122092016015926","amt":"0.50","ccy":"840"},{"mtxnid":"1688615455782386-2","mid":"122091511120425","amt":"0.50","ccy":"840"}]}@merchanttranid:16886119155@';
        $dd = htmlspecialchars($resp);

        $data='<?xml version="1.0" encoding="UTF-8"?>
		<TKKPG>
			<Request>
				<Operation>CreateOrder</Operation>
				<Language>EN</Language>
				<Order>
					<OrderType>Purchase</OrderType>
					<Merchant>'.$merchantId.'</Merchant>
					<Amount>'.$amount.'</Amount>
					<Currency>840</Currency>
					<Description>'.$dd.'</Description>
					<SaveResponseDescription>true</SaveResponseDescription>
				</Order>
			</Request>
		</TKKPG>';
        if($payment_type=='txpg'){
            $exec="http://10.6.2.25:8890/Exec";
            $header_=['Content-Type: application/octet-stream', 'merchantCN: '.$merchantId];
            $xmlResp = $this->executeXml($data,$exec,$header_);
            var_dump($xmlResp);
            $sessionId = (string) $xmlResp->Response->Order->SessionID;
            $orderId = (string) $xmlResp->Response->Order->OrderID;
            $xmlResp = $this->processFirst($sessionId, $merchantId, $orderId, $pan, $exp,$payment_type);
            $xmlResp = $this->proccessAreq($merchantId, $orderId,$sessionId,$pan,$exp,$amount,$payment_type);

            return ['OrderID' => $orderId, 'SessionID' => $sessionId];

        }else{
        $exec= "http://10.6.2.8:8068/exec";
        $header_=['Content-Type: application/x-www-form-urlencoded', 'merchantCN: '.$merchantId];
        $xmlResp = $this->executeXml($data,$exec,$header_);
        $sessionId = (string) $xmlResp->Response->Order->SessionID;
        $orderId = (string) $xmlResp->Response->Order->OrderID;
        $xmlResp = $this->processFirst($sessionId, $merchantId, $orderId, $pan, $exp, $payment_type);
        $xmlResp = $this->proccessAreq($merchantId, $orderId, $sessionId, $pan, $exp, $amount, $payment_type);

        return ['OrderID' => $orderId, 'SessionID' => $sessionId];
        }
    }

    /**Get Order Status */
    public function getOrderStatus($sessionId, $merchantId, $orderId, $payment_type)
    {
        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <TKKPG>
            <Request>
                <Operation>GetOrderStatus</Operation>
                <Language>EN</Language>
                <Order>
                    <Merchant>'.$merchantId.'</Merchant>
                    <OrderID>'.$orderId.'</OrderID>
                </Order>
                <SessionID>'.$sessionId.'</SessionID>
            </Request>
        </TKKPG>';

        // echo '<h1>Check Order Status</h1>';
        // var_dump($data);
        // echo '<h6>----------------------------------------------</h6>';

        if($payment_type=='txpg'){
            $exec="http://10.6.2.25:8890/Exec";
            $header_=['Content-Type: application/octet-stream', 'merchantCN: '.$merchantId];
            $xmlResp = $this->executeXml($data, $exec, $header_);
            value($xmlResp);

            return $xmlResp;

        }else{
            $exec= "http://10.6.2.8:8068/exec";
            $header_=['Content-Type: application/x-www-form-urlencoded', 'merchantCN: '.$merchantId];
            $xmlResp = $this->executeXml($data, $exec, $header_);

            return $xmlResp;
        }
    }

    // execute xml data and return respond for next process
    public function executeXml($data, $exec, $header_)
    {
        $xmlObject = simplexml_load_string($data);
        $merchantId = (string)$xmlObject->Request->Order->Merchant;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $exec);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $xml = curl_exec($ch);
        $info = curl_errno($ch) > 0 ? array("curl_error_" . curl_errno($ch) => curl_error($ch)) : curl_getinfo($ch);
        // print_r($info);
        curl_close($ch);

        echo '';
        echo '';
        var_dump($header_);
        echo '';
        echo '';

        echo 'Response XML';
        echo '' . $xml . '';
        echo '';

        return simplexml_load_string($xml);
    }

    // Process Step first
    public function processFirst($sessionId, $merchantId, $orderId, $pan, $exp, $payment_type)
    {
        $data = '<?xml version="1.0" encoding="UTF-8"?>
                <TKKPG>
                    <Request>
                        <Operation>Process3DSAuth</Operation>
                        <Step>FIRST</Step>
                        <SessionID>'.$sessionId.'</SessionID>
                        <Order>
                            <Merchant>'.$merchantId.'</Merchant>
                            <OrderID>'.$orderId.'</OrderID>
                        </Order>
                        <PAN>'.$pan.'</PAN>
                        <PAN2></PAN2>
                        <ExpDate>'.$exp.'</ExpDate>
                        <CardHolderName>TEST 3DS2</CardHolderName>
                        <CVV2>123</CVV2>
                        <AReqDetails>
                            <deviceChannel></deviceChannel>
                        </AReqDetails>
                    </Request>
                </TKKPG>';
        echo '<h1>Request Check3DS Auth</h1>';
        var_dump($data);
        echo '<h6>----------------------------------------------</h6>';
        if($payment_type=='txpg'){
            $exec="http://10.6.2.25:8890/Exec";
            $header_=['Content-Type: application/octet-stream', 'merchantCN: '.$merchantId];
            $xmlResp = $this->executeXml($data,$exec,$header_);

            value($xmlResp);

            return $xmlResp;

        }else{
            $exec= "http://10.6.2.8:8068/exec";
            $header_=['Content-Type: application/x-www-form-urlencoded', 'merchantCN: '.$merchantId];
            $xmlResp = $this->executeXml($data,$exec,$header_);

            return $xmlResp;
        }
        //var_dump($xml);
    }

    // Process Arequest data
    public function proccessAreq($merchantId, $orderId, $sessionId, $pan, $exp, $amount, $payment_type)
    {
        $data= [
            'mid' => $merchantId,
            'orderId' => $orderId,
            'sessionId' => $sessionId,
            'pan' => $pan,
            'exp' => $exp,
            'payment_type'=>$payment_type
        ];
        // var_dump($data);
        $paramCallBack = base64_encode(json_encode($data));

        $paramCallBack = str_replace('/', '--', $paramCallBack);

        // $url = "http://localhost:8888/cardpayment_web/public/orders/".$paramCallBack;
        // $url = "http://10.6.2.8:8888/cardpayment_web/public/orders/".$paramCallBack;
        $url = "http://10.6.2.8:8888/cardpayment_web/public/payment-payout";
        $bankid=10065380;
        $start='*';
        $requestorID=($bankid.$start.$merchantId);

        $data='<?xml version="1.0" encoding="UTF-8"?>
        <TKKPG>
            <Request>
            <Operation>Process3DSAuth</Operation>
            <Step>AREQ</Step>
            <Order>
            <Merchant>'.$merchantId.'</Merchant>
            <OrderID>'.$orderId.'</OrderID>
            </Order>
            <SessionID>'.$sessionId.'</SessionID>
            <PAN>'.$pan.'</PAN>
            <PAN2></PAN2>
            <ExpDate>'.$exp.'</ExpDate>
            <CardHolderName>TEST 3DS2</CardHolderName>
            <CVV2>123</CVV2>
            <AReqDetails>
                <notificationURL>'.$url.'</notificationURL>
                <threeDSRequestorID>'.$requestorID.'</threeDSRequestorID>
                <deviceChannel>02</deviceChannel>
                <messageCategory>01</messageCategory>
                <threeDSCompInd>U</threeDSCompInd>
                <threeDSRequestorAuthenticationInd>01</threeDSRequestorAuthenticationInd>
                <browserAcceptHeader>application/json,application/jose;charset=utf-8</browserAcceptHeader>
                <browserJavaEnabled>true</browserJavaEnabled>
                <browserJavascriptEnabled>true</browserJavascriptEnabled>
                <browserLanguage>en-US</browserLanguage>
                <browserColorDepth>24</browserColorDepth>
                <browserScreenHeight>1080</browserScreenHeight>
                <browserScreenWidth>1920</browserScreenWidth>
                <browserTZ>-420</browserTZ>
                <browserUserAgent>Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36</browserUserAgent>
            </AReqDetails>
            <CReqDetails>
            <WindowWidth>100</WindowWidth>
            <WindowHeight>100</WindowHeight>
            </CReqDetails>
            </Request>
        </TKKPG>';

        if($payment_type=='txpg'){
            $exec="http://10.6.2.25:8890/Exec";
            $header_=['Content-Type: application/octet-stream', 'merchantCN: '.$merchantId];
            $xmlResp = $this->executeXml($data, $exec, $header_);
            var_dump($xmlResp);
            $acs = (string) $xmlResp->Response->Refinement->AcsURL;
            $creq = (string) $xmlResp->Response->Refinement->CReq;

            $xmlResp= $this->setDataForm($paramCallBack, $acs, $creq);

            // return $xmlResp;

        }else{
        $exec= "http://10.6.2.8:8068/exec";
        $header_=['Content-Type: application/x-www-form-urlencoded', 'merchantCN: '.$merchantId];
        $xmlResp = $this->executeXml($data,$exec,$header_);
        $acs = (string) $xmlResp->Response->Refinement->AcsURL;
        $creq = (string) $xmlResp->Response->Refinement->CReq;

        $xmlResp= $this->setDataForm($paramCallBack,$acs,$creq);
        // dd($xmlResp);
        // return $xmlResp;

        }
    }

    public function setDataForm( string $paramCallBack, string $acs, string $creq)
    {
        ?>
            <form name="areq_from"  action="<?= $acs; ?>" method="post" id="areq_from">
            @csrf <!-- {{ csrf_field() }} -->
                CReq:<br> <textarea rows="9" cols="140" name="creq"><?= $creq; ?></textarea><br><br>
                threeDSSessionData:<br> <textarea rows="9" cols="140" name="threeDSSessionData"><?= $paramCallBack; ?></textarea><br><br>

                <input type="submit" value="Process CReq">
            </form>

            <script type="text/javascript">
                document.getElementById('areq_from').submit(); // SUBMIT FORM
            </script>
        <?php
    }

    public function processoder(Request $request, PaymentDataTable $dataTable)
    {
        // dd($request->all());
        // $data = base64_decode($paramCallBack);
        $data = $request->threeDSSessionData;
        $data = base64_decode($data);
        $data = json_decode($data, true);
        $cres=$request->cres;
        $cvv2=123;

        $proCre =$this->ProcessCres($data['mid'], $data['orderId'], $data['sessionId'], $cres, $data['pan'], $data['exp'], $cvv2, $data['payment_type']);

        /**Check Order Status */
        $xmlResp_getOrderStatus = $this->getOrderStatus($data['sessionId'], $data['mid'], $data['orderId'], $data['payment_type']);
        $orderStatus = (string)$xmlResp_getOrderStatus->Response->Order->OrderStatus;
        /**Update Order Status */
        Payment::where('orderId', $data['orderId'])->where('sessionId', $data['sessionId'])->where('mid', $data['mid'])->update(['orderstatus' => $orderStatus]);

        // return view('frontend.page.paymentdata');
        toastr('Payment Successfully!','success');
        return redirect()->route('user.home');
    }

    public function ProcessCres($merchantId, $orderId, $sessionId, $cres, $pan, $exp, $cvv2,$payment_type)
    {
        $data='<?xml version="1.0" encoding="UTF-8"?>
        <TKKPG>
            <Request>
                <Operation>Process3DSAuth</Operation>
               <Step>CRES</Step>
                <Order>
                   <Merchant>'.$merchantId.'</Merchant>
                    <OrderID>'.$orderId.'</OrderID>
                </Order>
                <SessionID>'.$sessionId.'</SessionID>
                <CRes>'.$cres.'</CRes>
                  <PAN>'.$pan.'</PAN>
                 <PAN2></PAN2>
                <ExpDate>'.$exp.'</ExpDate>
                <CardHolderName>TEST 3DS2</CardHolderName>
                <CVV2>'.$cvv2.'</CVV2>
            </Request>
        </TKKPG>';

        if($payment_type=='txpg'){
            $exec="http://10.6.2.25:8890/Exec";
            $header_=['Content-Type: application/octet-stream', 'merchantCN: '.$merchantId];
            $xmlResp = $this->executeXml($data, $exec, $header_);

            var_dump($xmlResp);
            return $xmlResp;

        }else{
            $exec= "http://10.6.2.8:8068/exec";
            $header_=['Content-Type: application/x-www-form-urlencoded', 'merchantCN: '.$merchantId];
            $xmlResp = $this->executeXml($data, $exec, $header_);

            var_dump($xmlResp);
            return $xmlResp;

        }
    }
}
