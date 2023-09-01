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
                    <h4>Update Coupon</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$coupon->name}}">
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" id="code" name="code" class="form-control" value="{{$coupon->code}}">
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" id="quantity" name="quantity" class="form-control" value="{{$coupon->quantity}}">
                        </div>
                        <div class="form-group">
                            <label>Max Use Per Person</label>
                            <input type="text" id="max_use" name="max_use" class="form-control" value="{{$coupon->max_use}}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="text" id="start_date" name="start_date" class="form-control datepicker" value="{{$coupon->start_date}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="text" id="end_date" name="end_date" class="form-control datepicker" value="{{$coupon->end_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount_type">Discount Tyep</label>
                                    <select id="discount_type" name="discount_type" class="form-control">
                                    <option {{$coupon->discount_type == 'percentage' ? 'selected' : '' }} value="percentage">Percentage(%)</option>
                                    <option {{$coupon->discount_type == 'amount' ? 'selected' : '' }} value="amount">Amount</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" id="discount" name="discount" class="form-control" value="{{$coupon->discount_value}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                            <option {{$coupon->status == 1 ? 'selected' : '' }} value="1">Active</option>
                            <option {{$coupon->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Save</button>
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
