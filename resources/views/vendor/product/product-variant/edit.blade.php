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
                            <h6><b>Update Variant: {{$productVariant->name}}</b></h6>
                            <form action="{{ route('vendor.product-variant.update', $productVariant->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mt-3 wsus__input">
                                    <label>Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{$productVariant->name}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <input type="hidden" id="productId" name="productId" class="form-control" value="{{$productVariant->id}}">
                                </div>
                                <div class="form-group wsus__input">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                    <option {{$productVariant->status == 1 ? 'selected': ''}} value="1">Active</option>
                                    <option {{$productVariant->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="card-footer mt-2">
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

