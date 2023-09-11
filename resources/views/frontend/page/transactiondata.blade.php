@extends('vendor.layouts.master')

@section('content')
    <section id="wsus__dashboard">
    <div>
        {{-- class="container-fluid" --}}

        @include('vendor.layouts.sidebar')

        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-user"></i>Transaction History</h3>
                    {{-- <div class="create_button"><a href="{{ route('vendor.products.create') }}" class="btn btn-primary">+ Create New</a></div> --}}
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

  {{-- <script>
    $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
        // alert('helelll');
		let ischecked = $(this).is(':checked');
		let id = $(this).data('id');
        // console.log(id); /**show on console when inspec*/
        $.ajax({
                url: "{{route('vendor.products.changestatus')}}",
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
  </script> --}}
@endpush
