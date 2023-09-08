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
                <h3><i class="fal fa-gift-card"></i> address</h3>
                <div class="wsus__dashboard_add wsus__add_address">
                  <div class="row">
                    @foreach ($addresses as $addresse)
                    <div class="col-xl-6">
                        <div class="wsus__dash_add_single">
                          <h4>Billing Address <span>office</span></h4>
                          <ul>
                            <li><span>name :</span> {{$addresse->name}}</li>
                            <li><span>Phone :</span> {{$addresse->phone}}</li>
                            <li><span>email :</span> {{$addresse->email}}</li>
                            <li><span>country :</span> {{$addresse->country}}</li>
                            <li><span>city :</span> {{$addresse->city}}</li>
                            <li><span>zip code :</span> {{$addresse->zip}}</li>
                            <li><span>address :</span> {{$addresse->address}}</li>
                          </ul>
                          <div class="wsus__address_btn">
                            <a href="{{ route('user.address.edit', $addresse->id) }}" class="edit"><i class="fal fa-edit"></i> edit</a>
                            <a href="{{ route('user.address.destroy', $addresse->id) }}" class="del delete-item"><i class="fal fa-trash-alt"></i> delete</a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    <div class="col-12">
                      <a href="{{ route('user.address.create') }}" class="add_address_btn common_btn"><i class="far fa-plus"></i>add new address</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </section>
@endsection
