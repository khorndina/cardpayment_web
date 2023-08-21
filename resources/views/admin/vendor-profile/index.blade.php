@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Vendor Profile</h1>
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
                    <h4>Create Vendor Profile</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.vendor-profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Preview</label><br>
                            <img width="30%" src="{{ asset($profile->banner) }}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input id="banner" type="file" name="banner" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label>User ID</label>
                            <input type="text" id="user_id" name="user_id" class="form-control" value="{{$profile->user_id}}">
                        </div> --}}
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
        </section>
      </div>
@endsection
