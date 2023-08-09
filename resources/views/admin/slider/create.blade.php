@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Slider</h1>
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
                    <h4>Create Slider</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                        <label>Banner Image</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Starting Page</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Button URL</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Serail</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control">
                          <option>Active</option>
                          <option>Inactive</option>
                        </select>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Create Slider</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection
