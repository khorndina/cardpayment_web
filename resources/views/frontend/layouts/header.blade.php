<header>
    <div class="container">
        <div class="row">
            <div class="col-2 col-md-1 d-lg-none">
                <div class="wsus__mobile_menu_area">
                    <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                </div>
            </div>
            <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                <div class="wsus_logo_area">
                    <a class="wsus__header_logo" href="#">
                        <img width="30%" src="{{ asset('frontend/images/ABA logo.png') }}" alt="logo" class="img-fluid w-10">
                    </a>
                </div>
            </div>
            <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                <div class="wsus__search">
                    <form>
                        <input type="text" placeholder="Search...">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                <div class="wsus__call_icon_area">
                    <div class="wsus__call_area">
                        <div class="wsus__call">
                            <i class="fas fa-user-headset"></i>
                        </div>
                        <div class="wsus__call_text">
                            <p>cardsystem@ababank.com</p>
                            <p>+855 98 00 000 000</p>
                        </div>
                    </div>
                    <ul class="wsus__icon_area">
                        <li><a href="wishlist.html"><i class="fal fa-heart"></i><span>99</span></a></li>
                        <li><a href="compare.html"><i class="fal fa-random"></i><span>99</span></a></li>
                        <li><a class="wsus__cart_icon" href="#"><i
                                    class="fal fa-shopping-bag"></i><span id="cart_count">{{Cart::content()->count()}}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wsus__mini_cart">
        <h4>shopping cart <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
        <ul class="mini_cart_wrapper">
            @foreach (Cart::content() as $sidebarCartProduct)
                <li id="mini_cart_{{$sidebarCartProduct->rowId}}">
                    <div class="wsus__cart_img">
                        <a href="#"><img src="{{ asset($sidebarCartProduct->options->image) }}" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon remove_cart_product" data-row-id="{{$sidebarCartProduct->rowId}}" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="{{ route('product-detail.showProduct', $sidebarCartProduct->options->slug) }}">{{$sidebarCartProduct->name}}</a>
                        <p>{{$generalSetting->currency_icon}} {{$sidebarCartProduct->price}}</p>
                        <small>Variant Total: {{$generalSetting->currency_icon}} {{$sidebarCartProduct->options->variants_total}}</small><br>
                        <small>Qty: {{$sidebarCartProduct->qty}}</small>
                    </div>
                </li>
            @endforeach
            @if(Cart::content()->count() === 0)
                <li class="text-center"> Cart is empyt!</li>
            @endif
        </ul>
        <div class="mini_cart_actions {{Cart::content()->count() === 0 ? 'd-none' : ''}}">
            <h5>sub total <span id="mini_cart_subtotal">{{$generalSetting->currency_icon}}{{getCartTotal()}}</span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="{{ route('cart-details') }}">view cart</a>
                <a class="common_btn" href="{{ route('user.checkout') }}">checkout</a>
            </div>
        </div>
    </div>

</header>
