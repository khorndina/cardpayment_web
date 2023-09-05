<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // add product to cart
        $('.shopping-cart-form').on('submit', function(e){
            e.preventDefault();
            // alert('hiiiii');
            let formData = $(this).serialize();
            // console.log(formData);

            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{route('add-to-cart')}}",
                success: function(data){
                    if(data.status === 'success'){
                        getCartCount()
                        fetchSidebarCartProduct()
                        $('.mini_cart_actions').removeClass('d-none');
                        toastr.success(data.message)
                    }else{
                        toastr.error(data.message)
                    }
                },
                error: function(data){
                    console.log(error);
                }

            })
        })

        function getCartCount(){
            $.ajax({
                method: 'GET',
                url: "{{route('cart.count')}}",
                success: function(data){
                    // console.log(data);
                    $('#cart_count').text(data);
                },
                error: function(data){
                    console.log(error);
                }

            })
        }

        function fetchSidebarCartProduct(){
            $.ajax({
                method: 'GET',
                url: "{{route('get-cart-product')}}",
                success: function(data){
                    // console.log(data);
                    $('.mini_cart_wrapper').html("");
                    var html = '';
                    for(let item in data){
                        let product = data[item];
                        html += `<li id="mini_cart_${product.rowId}">
                                    <div class="wsus__cart_img">
                                        <a href="{{url('product-detail')}}/${product.options.slug}"><img src="{{asset('/')}}${product.options.image}" alt="product" class="img-fluid w-100"></a>
                                        <a class="wsis__del_icon remove_cart_product" data-row-id="${product.rowId}" href="#"><i class="fas fa-minus-circle"></i></a>
                                    </div>
                                    <div class="wsus__cart_text">
                                        <a class="wsus__cart_title" href="{{url('product-detail')}}/${product.options.slug}">${product.name}</a>
                                        <p>{{$generalSetting->currency_icon}} ${product.price}</p>
                                        <small>Variant Total: {{$generalSetting->currency_icon}} ${product.options.variants_total}</small><br>
                                        <small>Qty: ${product.qty}</small>
                                    </div>
                                </li>`
                    }

                    $('.mini_cart_wrapper').html(html);

                    getSidebarCartSubtotal()

                },
                error: function(data){
                    console.log(error);
                }

            })
        }

        // remove product from cart sidebar
        $('body').on('click', '.remove_cart_product', function(e){
            e.preventDefault();
            // alert('hiiiii');
            let rowId = $(this).data('row-id');
            console.log(rowId);

            $.ajax({
                method: 'POST',
                url: "{{route('cart.remove-product-sidebar')}}",
                data: {
                    rowId: rowId
                },
                success: function(data){
                    // console.log(data);
                    let productId = '#mini_cart_'+rowId;
                    $(productId).remove()

                    if($('.mini_cart_wrapper').find('li').length === 0){
                        $('.mini_cart_actions').addClass('d-none');
                        $('.mini_cart_wrapper').html('<li class="text-center"> Cart is empyt!</li>')
                    }

                    getSidebarCartSubtotal()

                    toastr.success(data.message)
                },
                error: function(data){
                    console.log(error);
                }

            })
        })

        // get cart sidebar sub-total
        function getSidebarCartSubtotal(){
            $.ajax({
                method: 'GET',
                url: "{{route('cart.sidebar-product-total')}}",
                success: function(data){
                    // console.log(data);
                    $('#mini_cart_subtotal').text("{{$generalSetting->currency_icon}}"+data);
                },
                error: function(data){
                    console.log(error);
                }

            })
        }
    })
</script>
