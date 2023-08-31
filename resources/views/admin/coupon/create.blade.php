@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Coupons</h1>
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
                    <h4>Create Coupon</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.coupons.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" id="code" name="code" class="form-control" value="{{old('code')}}">
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" id="quantity" name="quantity" class="form-control" value="{{old('quantity')}}">
                        </div>
                        <div class="form-group">
                            <label>Max Use Per Person</label>
                            <input type="text" id="max_use" name="max_use" class="form-control" value="{{old('max_use')}}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="text" id="start_date" name="start_date" class="form-control datepicker" value="{{old('start_date')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="text" id="end_date" name="end_date" class="form-control datepicker" value="{{old('end_date')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount_type">Discount Tyep</label>
                                    <select id="discount_type" name="discount_type" class="form-control">
                                    <option value="percentage">Percentage(%)</option>
                                    <option value="amount">Amount</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" id="discount" name="discount" class="form-control" value="{{old('discount')}}">
                                </div>
                            </div>
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
