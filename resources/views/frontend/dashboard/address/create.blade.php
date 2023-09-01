@extends('frontend.dashboard.layouts.master')

@section('content')
    <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
              <div class="dashboard_content mt-2 mt-md-0">
                <h3><i class="fal fa-gift-card"></i>create address</h3>
                <div class="wsus__dashboard_add wsus__add_address">
                  <form action="{{ route('user.address.store') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>name <b>*</b></label>
                          <input type="text" placeholder="Name" name="name" value="{{old('name')}}">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>email</label>
                          <input type="email" placeholder="Email" name="email" value="{{old('email')}}">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>phone <b>*</b></label>
                          <input type="text" placeholder="Phone" name="phone" value="{{old('phone')}}">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>countery <b>*</b></label>
                          <div class="wsus__topbar_select">
                            <select class="select_2" name="country">
                                <option value="">select</option>
                                @foreach(config('settings.country') as $key => $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>State <b>*</b></label>
                          <input type="text" placeholder="state" name="state" value="{{old('state')}}">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>City <b>*</b></label>
                          <input type="text" placeholder="city" name="city" value="{{old('city')}}">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>zip code <b>*</b></label>
                          <input type="text" placeholder="Zip Code" name="zip_code" value="{{old('zip_code')}}">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>Address <b>*</b></label>
                          <input type="text" placeholder="address" name="address" value="{{old('address')}}">
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <button type="submit" class="common_btn">Create</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
  </section>
@endsection