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
                    <h4>Create child-Category</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.child-category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control main-category">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Sub-Category</label>
                            <select id="category" name="sub_category" class="form-control sub-category">
                            <option value="">Select</option>
                            {{-- handle by ajax request --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
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
                    url: "{{route('admin.child-category.getSubCategory')}}",
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
        })
    </script>
@endpush
