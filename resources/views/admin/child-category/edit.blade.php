@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>child-Categories</h1>
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
                    <h4>Update child-Category</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.child-category.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                                <option {{$category->id == $subcategory->category_id ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$subcategory->name}}">
                        </div>
                        {{-- <div class="form-group">
                            <label>Slug</label>
                            <input type="text" id="starting_price" name="starting_price" class="form-control" value="{{old('starting_price')}}">
                        </div> --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                            <option {{$subcategory->status == 1 ? 'selected': ''}} value="1">Active</option>
                            <option {{$subcategory->status == 0 ? 'selected': ''}} value="0">Inactive</option>
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
