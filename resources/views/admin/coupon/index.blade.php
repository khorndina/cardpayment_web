@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Coupon</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="ro">Dashboard</a></div>
              <div class="breadcrumb-item">Coupon</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Coupon</h4>
                    <div class="card-header-action"><a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">+ Create New</a></div>
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
                url: "{{route('admin.coupons.changestatus')}}",
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

@endpush
