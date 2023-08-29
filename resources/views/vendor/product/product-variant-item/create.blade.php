@extends('vendor.layouts.master')

@section('content')
    <section id="wsus__dashboard">
    <div class="container-fluid">

        @include('vendor.layouts.sidebar')

        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h5><i class="far fa-user"></i> Product: {{$product->name}}</h5>
                    <div class="wsus__dashboard_profile mt-3">
                        <div class="wsus__dash_pro_area">
                            <h6><b>Create Product-Variant-Items</b></h6>
                            <form action="{{ route('vendor.product-variant-item.store') }}" method="POST">
                                @csrf
                                <div class="form-group wsus__input">
                                    <label>Variant Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{$productVariant->name}}" readonly>
                                </div>
                                <div class="form-group wsus__input">
                                    <input type="hidden" id="variantId" name="variantId" class="form-control" value="{{$productVariant->id}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <input type="hidden" id="productId" name="productId" class="form-control" value="{{$product->id}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <label>Itme Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <label>Price <code>('SET 0 FOR FREE')</code></label>
                                    <input type="text" id="price" name="price" class="form-control" value="{{old('price')}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <label for="is_default">Is-Default</label>
                                    <select id="is_default" name="is_default" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group wsus__input">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Create</button>
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

