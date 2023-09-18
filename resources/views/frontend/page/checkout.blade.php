@extends('frontend.layouts.master')

@section('Content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">check out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CHECK OUT PAGE START
    ==============================-->
    <?php
        $digits = 5;
        $randomNum = substr(str_shuffle("012"), 0, $digits);
        //echo $randomNum;
        $referebce_number='0'.time().($randomNum);
        
        ?>
    <section id="wsus__cart_view">
        <div class="container">
            

          <div class="row">
                    <!-- Add Customer Billing -->
            <div class="col-xl-8 col-lg-7">
                <div class="wsus__check_form">
                    <!-- <h5>Billing Details <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                            new address</a></h5> -->

                    <h5>Checkout Form <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 480px;" ></a></h5>

                    <h4 class="box-title"><b>Payment Summary</b></h4>
	
				<table class="table table-condensed">
					<tbody>
						<tr>
							<td>Previous Transaction ID</td>
							<td style="text-align: right; padding-right: 30px">
							<?php echo $referebce_number ;?>
							|
							<?php echo $referebce_number ;?>
							</td>
						</tr>
						<tr>
							<td>Transaction ID</td>
							<td style="text-align: right; padding-right: 30px"><?php echo $referebce_number ;?></td>
						</tr>
						<tr>
							<th>SubTotal</th>
							<th style="text-align: right; padding-right: 30px">{{$generalSetting->currency_icon}}{{getMainCartTotal()}}</th>
						</tr>
						<tr>
							<th>Total</th>
							<th style="text-align: right; padding-right: 30px"><span style="font-size: 25px;">{{$generalSetting->currency_icon}}{{getMainCartTotal()}}</span>
							
							</th>
							<input type="hidden" name="total-amount" value="0.10">
						</tr>
					</tbody>
				</table>
                
                <h5>Billing Information <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 480px;" ></a></h5>
                    <div class="row">
                        @foreach ($userAddresses as $userAddress)
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <input type="text" placeholder="First Name" value="{{$userAddress->name}}">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <input type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="wsus__check_single_form">
                                <input type="text" placeholder="Company Name (Optional)">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <select class="select_2" name="state">
                                    <option value="AL">Country / Region *</option>
                                    <option value="">dhaka</option>
                                    <option value="">barisal</option>
                                    <option value="">khulna</option>
                                    <option value="">rajshahi</option>
                                    <option value="">bogura</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <input type="text" placeholder="Street Address *">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <input type="text" placeholder="Apartment, suite, unit, etc. (optional)">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <input type="text" value="{{$userAddress->city}}" placeholder="Town / City *">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <input type="text" value="{{$userAddress->address}}" placeholder="State *">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <input type="text" placeholder="Zip *">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <input type="text" value="{{$userAddress->phone}}" placeholder="Phone *">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="wsus__check_single_form">
                                <input type="email" value="{{$userAddress->email}}" placeholder="Email *">
                            </div>
                        </div>
                       
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="accordion checkout_accordian" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            <div class="wsus__check_single_form">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Same as shipping address
                                                    </label>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="wsus__check_single_form">
                                <h5>Additional Information</h5>
                                <textarea cols="3" rows="4"
                                    placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    
                
                </div>
            </div>
           <!-- End Add Customer Billing -->
                    <!-- <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            <h5>Billing Details <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 480px;" >add new address</a></h5>
                            <div class="row">
                                @foreach ($userAddresses as $userAddress)
                                    <div class="col-xl-6">
                                        <div class="wsus__checkout_single_address">
                                            <div class="form-check">
                                                <input class="form-check-input shipping_address" type="radio" name="flexRadioDefault" id="flexRadioDefault1" data-id="{{$userAddress->id}}">
                                                <label class="form-check-label" for="flexRadioDefault1">Select Address</label>
                                            </div>
                                            <ul>
                                                <li><span>Name :</span> {{$userAddress->name}}</li>
                                                <li><span>Phone :</span> {{$userAddress->phone}}</li>
                                                <li><span>Email :</span> {{$userAddress->email}}</li>
                                                {{-- <li><span>Country :</span> {{$userAddress->country}}</li> --}}
                                                {{-- <li><span>City :</span> {{$userAddress->city}}</li>
                                                <li><span>Zip Code :</span> {{$userAddress->zip}}</li> --}}
                                                <li><span>Address :</span> {{$userAddress->address}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div> -->

                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">
                            <p class="wsus__product">Summary Methods</p>
                            @foreach ($shippingMethods as $shippingMethod)
                                @if($shippingMethod->type === 'min_cost' && getCartTotal() >= $shippingMethod->min_cost)
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios1" value="{{$shippingMethod->id}}" data-id="{{$shippingMethod->cost}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{$shippingMethod->name}}
                                            <span>(cost:{{$generalSetting->currency_icon}}{{$shippingMethod->cost}})</span>
                                        </label>
                                    </div>
                                @elseif ($shippingMethod->type === 'flat_cost')
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios1" value="{{$shippingMethod->id}}" data-id="{{$shippingMethod->cost}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{$shippingMethod->name}}
                                            <span>(cost:{{$generalSetting->currency_icon}}{{$shippingMethod->cost}})</span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach

                            <!-- <div class="wsus__order_details_summery">
                                <p>subtotal: <span>{{$generalSetting->currency_icon}}{{getCartTotal()}}</span></p>
                                <p>shipping fee: <span id="shipping_fee">{{$generalSetting->currency_icon}}0</span></p>
                                <p>Coupon: <span></span>{{$generalSetting->currency_icon}}{{getCartDiscount()}}</p>
                                <p><b>total:</b> <span id="total_fee" data-id="{{getMainCartTotal()}}"><b>{{$generalSetting->currency_icon}}{{getMainCartTotal()}}</b></span></p>
                            </div> -->

                            <!-- Payment Method -->
                            <div class="wsus__payment_method">
                                <p class="wsus__product">Payment Methods</p>
                                <div class="form-check">
                                    <input class="form-check-input card_payment" type="radio" name="paymentMethod" id="paymentMethodRadios" value="card_payment" data-id="card_payment">
                                    <label class="form-check-label" for="paymentMethodRadios">
                                        Card Payment:
                                        <img width="55px" height="35px" src="{{ asset('frontend/images/payment1.png') }}" alt="payment" class="img-fluid">
                                        <img width="55px" height="35px" src="{{ asset('frontend/images/payment2.png') }}" alt="payment" class="img-fluid">
                                        <img width="55px" height="35px" src="{{ asset('frontend/images/unionpay-logo.png') }}" alt="payment" class="img-fluid">
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input other_payment" type="radio" name="paymentMethod" id="paymentMethodRadios" value="other_payment" data-id="other_payment">
                                    <label class="form-check-label" for="paymentMethodRadios">
                                        Others:
                                        <img width="55px" height="35px" src="{{ asset('frontend/images/payment3.png') }}" alt="payment" class="img-fluid">
                                    </label>
                                </div>
                            </div>
                            <!-- End Payment Method -->

                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3">
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        I have read and agree to the website <a href="#">terms and conditions *</a>
                                    </label>
                                </div>
                            </div>
                            <form action="" id="checkOutForm">
                                <input type="hidden" name="shipping_method_id" id="shipping_method_id" value="">
                                <input type="hidden" name="shipping_address_id" id="shipping_address_id" value="">
                            </form>
                            <a href="" id="submitCheckOutForm" class="common_btn">Place Order</a>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <form action="{{ route('user.checkout.address.create') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Name *" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="email" placeholder="Email *" name="email" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Phone *" name="phone" value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__topbar_select">
                                            <select class="select_2" name="country">
                                                <option value="AL">Country / Region *</option>
                                                @foreach(config('settings.country') as $key => $value)
                                                    <option {{$value === old('country') ? 'selected' : ''}} value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="state *" name="state" value="{{old('state')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="city *" name="city" value="{{old('city')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Zip Code *" name="zip_code" value="{{old('zip_code')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="address *" name="address" value="{{old('address')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================
        CHECK OUT PAGE END
    ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            // Add shipping method to checkout form
            $('#shipping_method_id').val("");
            $('#shipping_address_id').val("");

            $('.shipping_method').on('click', function(){
                // alert($(this).val());
                let shippingFee = $(this).data('id');
                let totalFee = $('#total_fee').data('id');
                let totalAmount = totalFee + shippingFee;
                // console.log(totalAmount);

                $('#shipping_method_id').val($(this).val());
                $('#shipping_fee').text("{{$generalSetting->currency_icon}}"+shippingFee);
                $('#total_fee').text("{{$generalSetting->currency_icon}}"+totalAmount);
            })

            // Add shipping address to checkout form
            $('.shipping_address').on('click', function(){
                // alert($(this).data('id'));
                $('#shipping_address_id').val($(this).data('id'));
            })

            // submit checkout form
            $('#submitCheckOutForm').on('click', function(event){
                event.preventDefault();
                // alert('hi');
                if ($('#shipping_method_id').val() == "") {
                    toastr.error("Shipping Method Is Requered")
                } 
                // else if($('#shipping_address_id').val() == "") {
                //     toastr.error("Shipping Address Is Requered")
                // }
                
                else if(!$('.agree_term').prop('checked')){
                    toastr.error("You have read and agree to the website Term and Agreement!")
                }else{
                    $.ajax({
                        url: "{{route('user.checkout.form-submit')}}",
                        method: 'POST',
                        data: $('#checkOutForm').serialize(),
                        beforeSend: function(){
                            $('#submitCheckOutForm').html('<i class="fas fa-spinner fa-spin fa-1x"></i>')
                        },
                        success: function(data){
                            // console.log(data);
                            if(data.status === 'success'){
                                $('#submitCheckOutForm').text('Place Order')

                                // redirect user to payment page
                                window.location.href = data.redirect_url;
                            }
                        },
                        error: function(data){
                            console.log(data);
                        }
                    })
                }
            })
        })
    </script>
@endpush
