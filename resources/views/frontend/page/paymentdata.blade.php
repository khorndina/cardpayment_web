@extends('vendor.layouts.master')

@section('content')
    <section id="wsus__dashboard">
    <div>
        {{-- class="container-fluid" --}}

        {{-- @include('vendor.layouts.sidebar') --}}

        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <nav aria-label="breadcrumb" class="topnav-right">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="ro">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="{{ route('vendor.products.index') }}">Product</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Variant</li>
                        </ol>
                    </nav>
                    <h3><i class="far fa-user"></i> Product:</h3>
                    {{-- <div class="create_button"><a href="{{ route('vendor.product-variant.create-varian', request()->id) }}" class="btn btn-primary">+ Create New</a></div> --}}
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <div>
                                {{$dataTable->table()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

  {{-- <script>
    $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
        // alert('helelll');
		let ischecked = $(this).is(':checked');
		let id = $(this).data('id');
        // console.log(id); /**show on console when inspec*/
        $.ajax({
                url: "{{route('vendor.product-variant.changestatus')}}",
                method: 'PUT',
                data:{
                    ischecked:ischecked,
                    id:id
                },
                success: function(data){
                    // console.log(data);
                    toastr.success(data.message);
                },
                error:function(xhr, status, error){
                    console.log(error);
                }
            })
	    })
    })
  </script> --}}
@endpush





{{-- <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
</head>
<body>
    <table id="paymentTable">
        <thead>
            <tr>
                <th>Merchant ID</th>
                <th>Order ID</th>
                <th>Session ID</th>
                <th>PAN</th>
                <th>Expiry Date</th>
                <th>Amount</th>
                <th>Payment Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table rows will be dynamically generated -->
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        function completePayment(orderId, merchantId, sessionId, amount) {
            // Make a PUT request to the complete payment API endpoint
            $.ajax({
                url: `http://10.6.2.8:8888/payment-api/public/api/payment/complete/${orderId}/${merchantId}/${sessionId}/${amount}`,
                type: 'PUT',
                success: function(response) {
                    console.log(response.message);
                    // Refresh the table
                    table.ajax.reload();
                },
                error: function(error) {
                    console.error('Error completing payment:', error);
                }
            });
        }

        function refundPayment(orderId, merchantId, sessionId, amount) {
            var refundAmount = prompt('Enter the refund amount:');
            // Make a PUT request to the refund payment API endpoint
            $.ajax({
                url: `http://10.6.2.8:8888/payment-api/public/api/payment/refund/${orderId}/${merchantId}/${sessionId}/${refundAmount}`,
                type: 'PUT',
                success: function(response) {
                    console.log(response.message);
                    // Refresh the table
                    table.ajax.reload();
                },
                error: function(error) {
                    console.error('Error refunding payment:', error);
                }
            });
        }

        function reservePayment(orderId, merchantId, sessionId, amount) {
            // Make a PUT request to the reserve payment API endpoint
            $.ajax({
                url: `http://10.6.2.8:8888/payment-api/public/api/payment/reserve/${orderId}/${merchantId}/${sessionId}/${amount}`,
                type: 'PUT',
                success: function(response) {
                    console.log(response.message);
                    // Refresh the table
                    table.ajax.reload();
                },
                error: function(error) {
                    console.error('Error reserving payment:', error);
                }
            });
        }

        $(document).ready(function() {
            var table = $('#paymentTable').DataTable({
                ajax: {
                    url: 'http://10.6.2.8:8888/payment-api/public/api/payment',
                    dataSrc: ''
                },
                columns: [
                    { data: 'mid' },
                    { data: 'orderId' },
                    { data: 'sessionId' },
                    { data: 'pan' },
                    { data: 'exp' },
                    { data: 'amount' },
                    { data: 'payment_type' },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <button onclick="completePayment('${row.orderId}', '${row.mid}', '${row.sessionId}', '${row.amount}')">Complete</button>
                                <button onclick="refundPayment('${row.orderId}', '${row.mid}', '${row.sessionId}', '${row.amount}')">Refund</button>
                                <button onclick="reservePayment('${row.orderId}', '${row.mid}', '${row.sessionId}', '${row.amount}')">Reserve</button>
                            `;
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html> --}}
