@section('title')
{{$generalSetting->site_name}} || aba bank
@endsection

@extends('frontend.layouts.master')

@section('Content')


    <!--============================
        BANNER PART 2 START
    ==============================-->
    <!-- @include('frontend.Home.section.banner-slider') -->
    <!--============================
        BANNER PART 2 END
    ==============================-->

    <!--============================
        FLASH SELL START
    ==============================-->
    @include('frontend.Home.section.flash-sale')
    <!--============================
        FLASH SELL END
    ==============================-->

    <!--============================
       MONTHLY TOP PRODUCT START
    ==============================-->
    {{-- @include('frontend.Home.section.top-category-product') --}}
    <!--============================
       MONTHLY TOP PRODUCT END
    ==============================-->

    <!--============================
        BRAND SLIDER START
    ==============================-->
    {{-- @include('frontend.Home.section.brand-slider') --}}
    <!--============================
        BRAND SLIDER END
    ==============================-->

    <!--============================
        SINGLE BANNER START
    ==============================-->
    {{-- @include('frontend.Home.section.single-banner') --}}
    <!--============================
        SINGLE BANNER END
    ==============================-->

    <!--============================
        HOT DEALS START
    ==============================-->
    {{-- @include('frontend.Home.section.hot-deals') --}}
    <!--============================
        HOT DEALS END
    ==============================-->

    <!--============================
        ELECTRONIC PART START
    ==============================-->
    {{-- @include('frontend.Home.section.category-product-slider-one') --}}
    <!--============================
        ELECTRONIC PART END
    ==============================-->

    <!--============================
        ELECTRONIC PART START
    ==============================-->
    {{-- @include('frontend.Home.section.category-product-slider-two') --}}
    <!--============================
        ELECTRONIC PART END
    ==============================-->


    <!--============================
        LARGE BANNER  START
    ==============================-->
    {{-- @include('frontend.Home.section.large-banner') --}}
    <!--============================
        LARGE BANNER  END
    ==============================-->


    <!--============================
        WEEKLY BEST ITEM START
    ==============================-->
    {{-- @include('frontend.Home.section.weekly-best-item') --}}
    <!--============================
        WEEKLY BEST ITEM END
    ==============================-->


    <!--============================
      HOME SERVICES START
    ==============================-->
    {{-- @include('frontend.Home.section.services') --}}
    <!--============================
        HOME SERVICES END
    ==============================-->


    <!--============================
        HOME BLOGS START
    ==============================-->
    {{-- @include('frontend.Home.section.blog') --}}
    <!--============================
        HOME BLOGS END
    ==============================-->
@endsection
