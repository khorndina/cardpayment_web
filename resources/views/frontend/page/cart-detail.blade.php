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
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
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
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_tk">
                                            unit price
                                        </th>

                                        <th class="wsus__pro_tk">
                                            total price
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>

                                        {{-- <th class="wsus__pro_status">
                                            status
                                        </th> --}}

                                        <th class="wsus__pro_icon">
                                            <a href="{{ route('home') }}" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>
                                    @foreach ($cartItems as $cartItem)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img src="{{ asset($cartItem->options->image) }}" alt="product"
                                                    class="img-fluid w-100">
                                            </td>

                                            <td class="wsus__pro_name">
                                                <p>{!! $cartItem->name !!}</p>
                                                @foreach ($cartItem->options->variants as $key=>$value)
                                                    <span>{{$key}}: {{$value['name']}} ({{$generalSetting->currency_icon.$value['price']}})</span>
                                                @endforeach
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6>{{$generalSetting->currency_icon.$cartItem->price}}</h6>
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6 id="{{$cartItem->rowId}}">{{$generalSetting->currency_icon.($cartItem->price + $cartItem->options->variants_total) * $cartItem->qty}}</h6>
                                            </td>


                                            <td class="wsus__pro_select">
                                                <div class="product_qty_wrapper">
                                                    <button class="btn btn-danger product-decrement"> - </button>
                                                    <input class="product-qty" data-row-id="{{$cartItem->rowId}}" type="text" min="1" max="100" value="{{$cartItem->qty}}" readonly />
                                                    {{-- <input type="hidden" class="product-qty" data-row-id="{{ $rowId }}" value="{{ $quantity }}"> --}}
                                                    <button class="btn btn-success product-increment"> + </button>
                                                </div>
                                            </td>

                                            {{-- <td class="wsus__pro_status">
                                                <p>in stock</p>
                                            </td> --}}

                                            <td class="wsus__pro_icon">
                                                <a href="{{ route('cart.remove', $cartItem->rowId) }}"><i class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if(count($cartItems) === 0)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_icon" rowspan="2" style="width: 100%">
                                                Cart is impty!
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="sub_total">{{$generalSetting->currency_icon}}{{getCartTotal()}}</span></p>
                        <p>discount: <span id="discount">{{$generalSetting->currency_icon}}{{getCartDiscount()}}</span></p>
                        <p class="total"><span>total:</span> <span id="cart_total">{{$generalSetting->currency_icon}}{{getMainCartTotal()}}</span></p>
                        <form id="coupon_form">
                            <input type="text" placeholder="Coupon Code" name="coupon_code" value="{{session()->has('coupon') ? session()->get('coupon')['coupon_code'] : ''}}">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="{{ route('user.checkout') }}">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="{{ route('home') }}"><i class="fab fa-shopify"></i> go shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--============================
          CART VIEW PAGE END
    ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Increment product quantity
            $('.product-increment').on('click', function(){
                // event.preventDefault(); // Prevents the default behavior of the button
                // alert('hi');
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) + 1;
                let rowId = input.data('row-id');
                input.val(quantity);
                // console.log(rowId);

                $.ajax({
                    url: "{{route('cart-details.update-quantity')}}",
                    method: 'POST',
                    data: {
                        rowId : rowId,
                        quantity: quantity
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            let productId = '#'+rowId;
                            let totalAmount = "{{$generalSetting->currency_icon}}"+data.product_total
                            $(productId).text(data.product_total)
                            // console.log(data.product_total);
                            toastr.success(data.message)

                            getCartSubTotal()
                            calculateCouponDescount()
                        }else {
                            toastr.error(data.message)
                        }
                    },
                    error: function(data){

                    }
                })
            })


            // Decrement product quantity
            $('.product-decrement').on('click', function(){
                // event.preventDefault(); // Prevents the default behavior of the button
                // alert('hi');
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;
                let rowId = input.data('row-id');
                if(quantity < 1){
                    quantity = 1;
                }
                input.val(quantity);
                // console.log(rowId);
                $.ajax({
                    url: "{{route('cart-details.update-quantity')}}",
                    method: 'POST',
                    data: {
                        rowId : rowId,
                        quantity: quantity
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            let productId = '#'+rowId;
                            $(productId).text(data.product_total)
                            // console.log(data.product_total);
                            toastr.success(data.message)

                            getCartSubTotal()
                            calculateCouponDescount()
                        }else if(data.status === 'error'){
                            toastr.error(data.message)
                        }
                    },
                    error: function(data){

                    }
                })
            })

            // clear Cart
            $('.clear_cart').on('click', function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to clear your cart?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: "{{route('cart.clear')}}",
                            success: function(data){
                                // console.log(data);
                                if(data.status == 'success'){
                                // reload page
                                window.location.reload();
                                }
                            },
                            error:function(xhr, status, error){
                                console.log(error);
                            }
                        })
                    }
                })
            })

            // Get cart subtotal
            function getCartSubTotal(){
                $.ajax({
                    method: 'GET',
                    url: "{{route('cart.sidebar-product-total')}}",
                    success: function(data){
                        // console.log(data);
                        $('#sub_total').text("{{$generalSetting->currency_icon}}"+data)
                    },
                    error:function(data){
                        console.log(error);
                    }
                })
            }

            // apply coupon
            $('#coupon_form').on('submit', function(e){
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'GET',
                    url: "{{route('apply-coupon')}}",
                    data: formData,
                    success: function(data){
                        // console.log(data);
                        if(data.status === 'error'){
                            toastr.error(data.message);
                        }else if(data.status === 'success'){
                            toastr.success(data.message);

                            calculateCouponDescount()
                        }
                    },
                    error:function(xhr, status, error){
                        console.log(error);
                    }
                })
            })

            // calculate descount with coupon
            function calculateCouponDescount(){
                $.ajax({
                    method: 'GET',
                    url: "{{route('coupon-calculation')}}",
                    success: function(data){
                        // console.log(data);
                        if(data.status === 'success'){
                            $('#discount').text("{{$generalSetting->currency_icon}}"+data.discount)
                            $('#cart_total').text("{{$generalSetting->currency_icon}}"+data.cart_total)
                        }
                    },
                    error:function(data){
                        console.log(error);
                    }
                })
            }
        })
    </script>
@endpush
