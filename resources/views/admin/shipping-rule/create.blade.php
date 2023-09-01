@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Shipping Rule</h1>
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
                    <h4>Create Shipping-Rule</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.shipping-rule.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control shipping-type">
                            <option value="flat_cost">Flat Cost</option>
                            <option value="min_cost">Minimum Order Amount</option>
                            </select>
                        </div>
                        <div class="form-group min_cost d-none">
                            <label>Min-Cost</label>
                            <input type="text" id="min_cost" name="min_cost" class="form-control" value="{{old('min_cost')}}">
                        </div>
                        <div class="form-group">
                            <label>Cost</label>
                            <input type="text" id="cost" name="cost" class="form-control" value="{{old('cost')}}">
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
        $('body').on('change', '.shipping-type', function(){
            // alert('helelll');
            let value = $(this).val();
            // console.log(value);
            if(value != 'min_cost'){
                $('.min_cost').addClass('d-none')
            }else{
                $('.min_cost').removeClass('d-none')
            }
	    })
    })
  </script>
@endpush
