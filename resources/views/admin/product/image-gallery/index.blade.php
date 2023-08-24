@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Product Images Gallery</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Product</a></div>
              <div class="breadcrumb-item">Images Gallery</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product: {{$product->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product-image-gallery.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Image <code>(Supported Upload multiple image)</code></label>
                                <input type="file" name="image[]" id="" class="form-control" required multiple>
                                <input type="hidden" name="product" value="{{$product->id}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>All Product Product</h4>
                    </div>
                    <div class="card-body">
                      {{$dataTable->table()}}
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </section>
      </div>
@endsection

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
