@extends('vendor.layouts.master')

@section('content')
    <section id="wsus__dashboard">
    <div>
        {{-- class="container-fluid" --}}

        @include('vendor.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <nav aria-label="breadcrumb" class="topnav-right">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="ro">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="{{ route('vendor.products.index') }}">Product</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Image-Gallery</li>
                        </ol>
                    </nav>
                    <h4><i class="fab fa-product-hunt"></i> {{$product->name}}</h4>
                    <h5 class="mt-md-3">Product Image-Gallery</h5>
                    <div class="wsus__dashboard_profile mt-3">
                        <div class="wsus__dash_pro_area">
                            <div>
                                <form action="{{ route('vendor.product-image-gallery.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group wsus__input">
                                        <label for="">Image <code>(Supported Upload multiple image)</code></label>
                                        <input type="file" name="image[]" id="" class="form-control" required multiple>
                                        <input type="hidden" name="product" value="{{$product->id}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h4>List of Image-Gallery</h4>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <div>
                                {{$dataTable->table()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
