@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Products</h1>
            {{-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Table</div>
            </div> --}}
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Product</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.products.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Preview</label><br>
                            <img width="20%" src="{{ asset($product->thum_image) }}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input id="image" type="file" name="image" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$product->name}}">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control main-category">
                                        <option value="">select</option>
                                        @foreach ($categories as $category)
                                            <option {{$category->id == $product->category_id ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sub_category">Sub-Category</label>
                                    <select id="sub_category" name="sub_category" class="form-control sub-category">
                                        <option value="">select</option>
                                        //handled by ajax for select option
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="child_category">Child-Categorys</label>
                                    <select id="child_category" name="child_category" class="form-control child-category">
                                        <option value="">select</option>
                                        //handled by ajax for select option
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <select id="brand" name="brand" class="form-control">
                            <option value="">Select</option>
                            @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="text" id="sku" name="sku" class="form-control" value="{{$product->sku}}">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" id="price" name="price" class="form-control" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label>Offer Price</label>
                            <input type="text" id="offer_price" name="offer_price" class="form-control" value="{{$product->offer_price}}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offer Start Date</label>
                                    <input type="text" id="offer_start_date" name="offer_start_date" class="form-control datepicker" value="{{$product->offer_start_date}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Offer End Date</label>
                                    <input type="text" id="offer_end_date" name="offer_end_date" class="form-control datepicker" value="{{$product->offer_end_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Stock Qty</label>
                            <input type="number" id="qty" name="qty" class="form-control" value="{{$product->qty}}">
                        </div>
                        <div class="form-group">
                            <label>Video Link</label>
                            <input type="text" id="video_link" name="video_link" class="form-control" value="{{$product->video_link}}">
                        </div>
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea name="short_description" id="short_description" class="form-control">{{$product->short_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Long Description</label>
                            <textarea name="long_description" id="long_description" class="form-control summernote">{{$product->long_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_type">Product Type</label>
                            <select id="product_type" name="product_type" class="form-control">
                                <option value="">select</option>
                                <option {{$product->product_type == 'new_arrival' ? 'selected' : ''}}  value="new_arrival">New Arrival</option>
                                <option {{$product->product_type == 'featured_product' ? 'selected' : ''}} value="featured_product">Featured</option>
                                <option {{$product->product_type == 'top_product' ? 'selected' : ''}} value="top_product">Top Product</option>
                                <option {{$product->product_type == 'best_product' ? 'selected' : ''}} value="best_product">Best Product</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Seo Title</label>
                            <input type="text" id="seo_title" name="seo_title" class="form-control" value="{{$product->seo_title}}">
                        </div>
                        <div class="form-group">
                            <label>Seo Description</label>
                            <textarea name="seo_description" id="seo_description" class="form-control">{{$product->seo_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
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
        </section>
      </div>
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
                    url: "{{route('admin.products.getSubCategory')}}",
                    data: {
                        id: id
                    },
                    success:function(data){
                        // console.log(data);

                        $('.sub-category').html('<option value="">Select</option>')
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
                    url: "{{route('admin.products.getChildcategory')}}",
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
