<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card">
        <div class="card-body">
          <form action="{{ route('admin.general-setting-update.updateGeneralSetting') }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                  <label>Site Name</label>
                  <input type="text" id="site_name" name="site_name" class="form-control" value="{{@$generalSetting->site_name}}">
              </div>
              <div class="form-group">
                <label for="layout">Layout</label>
                <select id="layout" name="layout" class="form-control">
                <option {{@$generalSetting->layout == 'LTR' ? 'selected': ''}} value="LTR">LTR</option>
                <option {{@$generalSetting->layout == 'RTL' ? 'selected': ''}} value="RTL">RTL</option>
                </select>
              </div>
              <div class="form-group">
                  <label>Contact Email</label>
                  <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{@$generalSetting->contact_email}}">
              </div>
              <div class="form-group">
                <label for="currency_name">Default Currency Name</label>
                <select id="currency_name" name="currency_name" class="form-control select2">
                <option value="">select</option>
                @foreach(config('setting.currency_list') as $key => $currency)
                    <option {{@$generalSetting->currency_name == $key ? 'selected': ''}} value="{{$key}}">{{$key}}</option>
                @endforeach
                </select>
              </div>
              <div class="form-group">
                  <label>Currency Icon</label>
                  <input type="text" id="currency_icon" name="currency_icon" class="form-control" value="{{@$generalSetting->currency_icon}}">
              </div>
              <div class="form-group">
                  <label for="timezone">Timezone</label>
                  <select id="timezone" name="timezone" class="form-control select2">
                  <option value="">select</option>
                  @foreach(config('setting.timezone') as $key => $timezone)
                    <option {{@$generalSetting->timezone == $key ? 'selected': ''}} value="{{$key}}">{{$key}}</option>
                  @endforeach
                  </select>
              </div>
              <div class="card-footer">
                  <button class="btn btn-primary">Save</button>
              </div>
          </form>
        </div>
      </div>
</div>
