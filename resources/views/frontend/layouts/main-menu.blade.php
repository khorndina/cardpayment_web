@php
    $categories = \App\Models\Category::where('status', 1)
    ->with(['subcategories' => function($query) {
        $query->where('status', 1)
        ->with(['childcategories' => function($query) {
            $query->where('status', 1);
        }]);
    }])
    ->get();
    // dd($categories);
@endphp

<nav class="wsus__main_menu d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="relative_contect d-flex">
                    <div class="wsus_menu_category_bar">
                        <i class="far fa-bars"></i>
                    </div>
                    <ul class="wsus_menu_cat_item show_home toggle_menu">
                        {{-- <li><a href="#"><i class="fas fa-star"></i> hot promotions</a></li> --}}
                        @foreach ($categories as $category)
                        <li><a class="{{count($category->subcategories) > 0 ? 'wsus__droap_arrow' : ''}}" href="#"><i class="{{$category->icon}}"></i> {{$category->name}} </a>
                                @if(count($category->subcategories) > 0)
                                    <ul class="wsus_menu_cat_droapdown">
                                        @foreach ($category->subcategories as $subcategory)
                                            <li><a href="#">{{$subcategory->name}}<i class="{{count($subcategory->childcategories) > 0 ? 'fas fa-angle-right' : ''}}"></i></a>
                                                @if(count($subcategory->childcategories) > 0)
                                                    <ul class="wsus__sub_category">
                                                        @foreach ($subcategory->childcategories as $childcategory)
                                                        <li><a href="#">{{$childcategory->name}}</a> </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                        </li>
                        @endforeach
                        <li><a href="#"><i class="fal fa-gem"></i> View All Categories</a></li>
                    </ul>

                    <ul class="wsus__menu_item">
                        <li><a class="active" href="{{ route('home') }}">home</a></li>
                        
                        <li><a href="{{ route('user.transaction-management') }}">Transaction Management</a></li>
                        
                    </ul>
                    <ul class="wsus__menu_item wsus__menu_item_right">
                        <li><a href="dsahboard.html">my account</a></li> 
                        <li><a href="{{ route('login') }}">login</a></li>
                        
                    </ul>
                    <ul class="wsus__icon_area">
                        <li><a class="wsus__cart_icon" href="#">
                            <i class="fal fa-shopping-bag"></i><span id="cart_count">{{Cart::content()->count()}}</span></a>
                        </li>
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
</nav>
