@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Flash Sale</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="ro">Dashboard</a></div>
              <div class="breadcrumb-item">Flash Sale</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Flash Sale End Date</h4>
                  </div>
                  <form action="{{ route('admin.flash-sale.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <div class="form-group mt-3">
                            <label>End Date</label>
                            <input type="text" id="end_date" name="end_date" class="form-control datepicker" value="{{old('end_date')}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Flash Sale Product</h4>
                  </div>
                  <div class="form-group">
                    <label for="product">Add Product</label>
                    <select id="product" name="product" class="form-control">
                        <option value="">select</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="show_at_home">Show at Home Page?</label>
                            <select id="show_at_home" name="show_at_home" class="form-control main-category">
                                <option value="">select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control sub-category">
                                <option value="">select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Save</button>
                </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Flash Sale Products</h4>
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

{{-- @push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

  <script>
    $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
        // alert('helelll');
		let ischecked = $(this).is(':checked');
		let id = $(this).data('id');
        // console.log(id); /**show on console when inspec*/
        $.ajax({
                url: "{{route('admin.products.changestatus')}}",
                method: 'PUT',
                data:{
                    ischecked:ischecked,
                    id:id
                },
                success: function(data){
                    // console.log(data);
                    toastr.success(data.message);
                },
                error:function(xhr, status, error){
                    console.log(error);
                }
            })
	    })
    })
  </script>
@endpush --}}
