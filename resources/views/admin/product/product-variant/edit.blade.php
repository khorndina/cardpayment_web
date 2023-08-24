@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Product: {{$product->name}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Product</a></div>
              <div class="breadcrumb-item"><a href="{{ route('admin.product-variant.showtable', $product->id) }}">Variant</a></div>
              <div class="breadcrumb-item">Update Variant</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Variant</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.product-variant.update', $productVariant->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$productVariant->name}}">
                        </div>
                        {{-- <div class="form-group">
                            <input type="hidden" id="productId" name="productId" class="form-control" value="{{$productVariant->product_id}}">
                        </div> --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                            <option {{$productVariant->status == 1 ? 'selected': ''}} value="1">Active</option>
                            <option {{$productVariant->status == 0 ? 'selected': ''}} value="0">Inactive</option>
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
