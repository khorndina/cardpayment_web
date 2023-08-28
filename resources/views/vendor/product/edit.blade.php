@extends('vendor.layouts.master')

@section('content')
    <section id="wsus__dashboard">
    <div class="container-fluid">

        @include('vendor.layouts.sidebar')

        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-user"></i>Product</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <form action="{{ route('vendor.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group wsus__input">
                                    <label><b>Preview</b></label><br>
                                    <img width="20%" src="{{ asset($product->thum_image) }}" alt="">
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Image</b></label>
                                    <input id="thum_image" type="file" name="thum_image" class="form-control" value="">
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Name</b></label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{$product->name}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group wsus__input">
                                            <label for="category"><b>Category</b></label>
                                            <select id="category" name="category" class="form-control main-category wsus__input">
                                                <option value="">select</option>
                                                @foreach ($categories as $category)
                                                    <option {{$product->category_id == $category->id ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group wsus__input">
                                            <label for="sub_category"><b>Sub-Category</b></label>
                                            <select id="sub_category" name="sub_category" class="form-control sub-category wsus__input">
                                                <option value="">select</option>
                                                @foreach ($subcategories as $subcategory)
                                                <option {{$product->sub_category_id == $subcategory->id ? 'selected': ''}} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group wsus__input">
                                            <label for="child_category"><b>Child-Categorys</b></label>
                                            <select id="child_category" name="child_category" class="form-control child-category wsus__input">
                                                <option value="">select</option>
                                                @foreach ($childcategories as $childcategory)
                                                <option {{$product->child_category_id == $childcategory->id ? 'selected': ''}} value="{{$childcategory->id}}">{{$childcategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group wsus__input">
                                    <label for="brand"><b>Brand</b></label>
                                    <select id="brand" name="brand" class="form-control wsus__input">
                                    <option value="">Select</option>
                                    @foreach ($brands as $brand)
                                    <option {{$product->brand_id == $brand->id ? 'selected': ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>SKU</b></label>
                                    <input type="text" id="sku" name="sku" class="form-control" value="{{$product->sku}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Price</b></label>
                                    <input type="text" id="price" name="price" class="form-control" value="{{$product->price}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Offer Price</b></label>
                                    <input type="text" id="offer_price" name="offer_price" class="form-control" value="{{$product->offer_price}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group wsus__input">
                                            <label><b>Offer Start Date</b></label>
                                            <input type="text" id="offer_start_date" name="offer_start_date" class="form-control datepicker" value="{{$product->offer_start_date}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group wsus__input">
                                            <label><b>Offer End Date</b></label>
                                            <input type="text" id="offer_end_date" name="offer_end_date" class="form-control datepicker" value="{{$product->offer_end_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Stock Qty</b></label>
                                    <input type="number" id="qty" name="qty" class="form-control" value="{{$product->qyt}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Video Link</b></label>
                                    <input type="text" id="video_link" name="video_link" class="form-control" value="{{$product->video_link}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Short Description</b></label>
                                    <textarea name="short_description" id="short_description" class="form-control">{{$product->short_description}}</textarea>
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Long Description</b></label>
                                    <textarea name="long_description" id="long_description" class="form-control summernote">{{$product->long_description}}</textarea>
                                </div>
                                <div class="form-group wsus__input">
                                    <label for="product_type"><b>Product Type</b></label>
                                    <select id="product_type" name="product_type" class="form-control wsus__input">
                                        <option value="">select</option>
                                        <option {{$product->product_type == 'new_arrival' ? 'selected' : ''}}  value="new_arrival">New Arrival</option>
                                        <option {{$product->product_type == 'featured_product' ? 'selected' : ''}} value="featured_product">Featured</option>
                                        <option {{$product->product_type == 'top_product' ? 'selected' : ''}} value="top_product">Top Product</option>
                                        <option {{$product->product_type == 'best_product' ? 'selected' : ''}} value="best_product">Best Product</option>
                                    </select>
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Seo Title</b></label>
                                    <input type="text" id="seo_title" name="seo_title" class="form-control" value="{{$product->seo_title}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <label><b>Seo Description</b></label>
                                    <textarea name="seo_description" id="seo_description" class="form-control">{{$product->seo_description}}</textarea>
                                </div>
                                <div class="form-group wsus__input">
                                    <label for="status"><b>Status</b></label>
                                    <select id="status" name="status" class="form-control wsus__input">
                                    <option {{$product->status == 1 ? 'selected': ''}}  value="1">Active</option>
                                    <option {{$product->status == 0 ? 'selected': ''}}  value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('body').on('change', '.main-category', function(e){
                // alert('hi');
                let id = $(this).val();
                // console.log(id);
                $.ajax({
                    method: 'GET',
                    url: "{{route('vendor.products.getSubCategory')}}",
                    data: {
                        id: id
                    },
                    success:function(data){
                        // console.log(data);

                        // clear select item from select box when user change main category
                        $('.sub-category').html('<option value="">Select</option>')
                        $('.child-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item){
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error:function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
            /** Get Child-Category from database whin user select sub-category on form create product*/
            $('body').on('change', '.sub-category', function(e){
                // alert('hi');
                let id = $(this).val();
                // console.log(id);
                $.ajax({
                    method: 'GET',
                    url: "{{route('vendor.products.getChildcategory')}}",
                    data: {
                        id: id
                    },
                    success:function(data){
                        // console.log(data);

                        $('.child-category').html('<option value="">Select</option>')
                        $.each(data, function(i, item){
                            $('.child-category').append(`<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error:function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
