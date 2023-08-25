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
              <div class="breadcrumb-item">Update Variant-Item</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Item for Variant: {{$productVariant->name}} </h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.product-variant-item.update', $productVariantItem->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Variant Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$productVariant->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="variantId" name="variantId" class="form-control" value="{{$productVariant->id}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="productId" name="productId" class="form-control" value="{{$product->id}}">
                        </div>
                        <div class="form-group">
                            <label>Itme Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$productVariantItem->name}}">
                        </div>
                        <div class="form-group">
                            <label>Price <code>('SET 0 FOR FREE')</code></label>
                            <input type="text" id="price" name="price" class="form-control" value="{{$productVariantItem->price}}">
                        </div>
                        <div class="form-group">
                            <label for="is_default">Is-Default</label>
                            <select id="is_default" name="is_default" class="form-control">
                            <option {{$productVariant->is_default == 1 ? 'selected': ''}} value="1">Yes</option>
                            <option {{$productVariant->is_default == 0 ? 'selected': ''}} value="0">No</option>
                            </select>
                        </div>
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
