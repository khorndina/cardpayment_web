@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Brand</h1>
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
                    <h4>Edit Brand</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.brand.update', $brands->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label>Preview</label><br>
                            <img width="20%" src="{{ asset($brands->logo) }}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input id="logo" type="file" name="logo" class="form-control" value="{{old('logo')}}">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$brands->name}}">
                        </div>
                        <div class="form-group">
                            <label for="is_featured">Is-Featuered</label>
                            <select id="is_featured" name="is_featured" class="form-control">
                            <option {{$brands->is_featured == 1 ? 'selected': ''}} value="1">Yes</option>
                            <option {{$brands->is_featured == 0 ? 'selected': ''}} value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Satus</label>
                            <select id="status" name="status" class="form-control">
                            <option {{$brands->status == 1 ? 'selected': ''}} value="1">Active</option>
                            <option {{$brands->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">update</button>
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
