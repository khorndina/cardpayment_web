@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Seller Products</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="ro">Dashboard</a></div>
              <div class="breadcrumb-item">Product</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Seller Products Pending</h4>
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

        // set event for admin approve pending sellers Products
        $('body').on('change', '.is_approved', function(){
        // alert('helelll');
		let value = $(this).val();
		let id = $(this).data('id');
        // console.log(id); /**show on console when inspec*/
        $.ajax({
                url: "{{route('admin.approve-pending-product')}}",
                method: 'PUT',
                data:{
                    value:value,
                    id:id
                },
                success: function(data){
                    // console.log(data);
                    toastr.success(data.message);

                    // reload form
                    window.location.reload();
                },
                error:function(xhr, status, error){
                    console.log(error);
                }
            })
	    })
    })
  </script>
@endpush
