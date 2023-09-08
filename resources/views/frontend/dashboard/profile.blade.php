@section('title')
{{$generalSetting->site_name}} || aba bank
@endsection

@extends('frontend.dashboard.layouts.master')

@section('content')
    <section id="wsus__dashboard">
    <div>

        @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>basic information</h4>
                <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-9">
                        <div class="col-md-2">
                            <div class="wsus__dash_pro_img">
                                <img src="{{Auth::user()->image ? asset(Auth::user()->image):asset('frontend/images/avtar.jpg')}}" alt="img" class="img-fluid w-100">
                                <input id="image" name="image" type="file">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mt-5">
                            <div class="wsus__dash_pro_single">
                                <i class="fas fa-user-tie"></i>
                                <input id="name" name="name" type="text" placeholder="Name" value="{{Auth::user()->name}}">
                            </div>
                            </div>

                            <div class="col-md-8">
                            <div class="wsus__dash_pro_single">
                                <i class="fal fa-envelope-open"></i>
                                <input id="email" name="email" type="email" placeholder="Email" value="{{Auth::user()->email}}">
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <button class="common_btn mb-4 mt-2" type="submit">Update Profile</button>
                    </div>
                </form>

                <div class="wsus__dash_pass_change mt-2">
                    <form method="POST" action="{{ route('user.profile.update.password') }}">
                        @csrf
                        <div class="row">
                            <h4>Update Password</h4>
                            <div class="col-xl-4 col-md-6">
                            <div class="wsus__dash_pro_single">
                                <i class="fas fa-unlock-alt"></i>
                                <input type="password" id="current_password" name="current_password" placeholder="Current Password">
                            </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                            <div class="wsus__dash_pro_single">
                                <i class="fas fa-lock-alt"></i>
                                <input type="password" id="password" name="password" placeholder="New Password">
                            </div>
                            </div>
                            <div class="col-xl-4">
                            <div class="wsus__dash_pro_single">
                                <i class="fas fa-lock-alt"></i>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                            </div>
                            <div class="col-xl-12">
                            <button class="common_btn" type="submit">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
