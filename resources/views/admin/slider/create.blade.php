@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Slider</h1>
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
                    <h4>Create Slider</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input id="banner" type="file" name="banner" class="form-control" value="{{old('banner')}}">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" id="type" name="type" class="form-control" value="{{old('type')}}">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label>Starting Price</label>
                            <input type="text" id="starting_price" name="starting_price" class="form-control" value="{{old('starting_price')}}">
                        </div>
                        <div class="form-group">
                            <label>Button URL</label>
                            <input type="text" id="button_url" name="button_url" class="form-control" value="{{old('button_url')}}">
                        </div>
                        <div class="form-group">
                            <label>Serail</label>
                            <input type="text" id="serail" name="serail" class="form-control" value="{{old('serail')}}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Create Slider</button>
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
