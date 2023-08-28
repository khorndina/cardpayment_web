@extends('vendor.layouts.master')

@section('content')
    <section id="wsus__dashboard">
    <div class="container-fluid">

        @include('vendor.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
                <div class="wsus__input">
                    <h4>basic information</h4>
                    <form action="{{ route('vendor.shop-profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Preview</label><br>
                            <img width="20%" src="{{ asset($profile->banner) }}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input id="banner" type="file" name="banner" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Shop Name</label>
                            <input type="text" id="shop_name" name="shop_name" class="form-control" value="{{$profile->shop_name}}">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{$profile->phone}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{$profile->email}}">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{$profile->address}}">
                        </div>
                        <div>
                            <label>Description</label>
                            <textarea class="summernote" name="description" id="description" cols="30" rows="10">{{$profile->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>FaceBook Link</label>
                            <input type="text" id="fb_link" name="fb_link" class="form-control" value="{{$profile->fb_link}}">
                        </div>
                        <div class="form-group">
                            <label>Twitter Link</label>
                            <input type="text" id="tw_link" name="tw_link" class="form-control" value="{{$profile->tw_link}}">
                        </div>
                        <div class="form-group">
                            <label>Instagram Link</label>
                            <input type="text" id="insta_link" name="insta_link" class="form-control" value="{{$profile->insta_link}}">
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
  </section>
@endsection
