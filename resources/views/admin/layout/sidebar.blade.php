<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">ABA BANK</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li class=active><a class="nav-link" href="index-0.html">General Dashboard</a></li>
            <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
          </ul>
        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown {{setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Category</span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.category.*'])}}"><a class="nav-link {{setActive(['admin.category.*'])}}" href="{{ route('admin.category.index') }}">Categories</a></li>
              <li class="{{setActive(['admin.sub-category.*'])}}"><a class="nav-link" href="{{ route('admin.sub-category.index') }}">Sub-Categories</a></li>
              <li class="{{setActive(['admin.child-category.*'])}}"><a class="nav-link" href="{{ route('admin.child-category.index') }}">Child-Categories</a></li>
            </ul>
        </li>
        <li class="dropdown {{setActive(['admin.vendor-profile.*', 'admin.flash-sale.*', 'admin.coupons.*', 'admin.shipping-rule.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Ecommerce</span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.vendor-profile.*'])}}"><a class="nav-link" href="{{ route('admin.vendor-profile.index') }}">Ecommerce Vendor</a></li>
              <li class="{{setActive(['admin.flash-sale.*'])}}"><a class="nav-link" href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
              <li class="{{setActive(['admin.coupons.*'])}}"><a class="nav-link" href="{{ route('admin.coupons.index') }}">Coupons</a></li>
              <li class="{{setActive(['admin.shipping-rule.*'])}}"><a class="nav-link" href="{{ route('admin.shipping-rule.index') }}">Shipping Rule</a></li>
            </ul>
        </li>
        <li class="dropdown {{setActive(['admin.slider.*'])}}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Slider</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.slider.*'])}}"><a class="nav-link" href="{{ route('admin.slider.index') }}">Sliders</a></li>
          </ul>
        </li>
        <li class="dropdown {{setActive(['admin.brand.*', 'admin.products.*', 'admin.product-image-gallery.*', 'admin.product-variant.*', 'admin.product-variant-item.*', 'admin.seller-products.*', 'admin.seller-pending-products.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Product</span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.brand.*'])}}"><a class="nav-link" href="{{ route('admin.brand.index') }}">Brand</a></li>
              <li class="{{setActive(['admin.products.*', 'admin.product-image-gallery.*', 'admin.product-variant.*', 'admin.product-variant-item.*'])}}"><a class="nav-link" href="{{ route('admin.products.index') }}">Product</a></li>
              <li class="{{setActive(['admin.seller-products.*'])}}"><a class="nav-link" href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
              <li class="{{setActive(['admin.seller-pending-products.*'])}}"><a class="nav-link" href="{{ route('admin.seller-pending-products.pendingProduct') }}">Seller Pending Products</a></li>
            </ul>
        </li>

        <li><a class="nav-link" href="{{ route('admin.general-setting.index') }}"><i class="far fa-square"></i> <span>Setting</span></a></li>


        {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
              <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
              <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
            </ul>
          </li>
        <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
      </ul>
    </aside>
  </div>
