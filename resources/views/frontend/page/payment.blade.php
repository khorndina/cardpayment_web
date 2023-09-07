@extends('frontend.layouts.master')

@section('Content')

<!--============================
    BREADCRUMB START
==============================-->
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Payment</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">Payment</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    BREADCRUMB END
==============================-->

<!--============================
    PAYMENT PAGE START
==============================-->
{{-- <section id="wsus__cart_view">
    <div class="container">
        <div class="wsus__pay_info_area">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="wsus__payment_menu" id="sticky_sidebar">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link common_btn active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">card payment</button>
                            <button class="nav-link common_btn" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">bank payment</button>
                            <button class="nav-link common_btn" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">mobile banking</button>
                            <button class="nav-link common_btn" id="v-pills-settings-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings" type="button" role="tab"
                                aria-controls="v-pills-settings" aria-selected="false">cash on delivery</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="tab-content" id="v-pills-tabContent" id="sticky_sidebar">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-xl-12 m-auto">
                                    <div class="wsus__payment_area">
                                        <form>
                                            <div class="wsus__pay_caed_header">
                                                <h5>credit or debit card</h5>
                                                <img src="images/payment5.png" alt="payment" class="img-=fluid">
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input class="input" type="text"
                                                        placeholder="MD. MAHAMUDUL HASSAN SAZAL">
                                                </div>
                                                <div class="col-12">
                                                    <input class="input" type="text"
                                                        placeholder="2540 4587 **** 3215">
                                                </div>
                                                <div class="col-4">
                                                    <input class="input" type="text" placeholder="MM/YY">
                                                </div>
                                                <div class="col-4 ms-auto">
                                                    <input class="input" type="text" placeholder="1234">
                                                </div>
                                            </div>
                                            <div class="wsus__save_payment">
                                                <h6><i class="fas fa-user-lock"></i> 100% secure payment with :</h6>
                                                <img src="images/payment1.png" alt="payment" class="img-fluid">
                                                <img src="images/payment2.png" alt="payment" class="img-fluid">
                                                <img src="images/payment3.png" alt="payment" class="img-fluid">
                                            </div>
                                            <div class="wsus__save_card">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckDefault">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckDefault">save thid Card</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="common_btn">confirm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero, tempora cum optio
                                cumque rerum dolor impedit exercitationem? Eveniet suscipit repellat, quae natus hic
                                assumenda consequatur excepturi ducimus.</p>
                            <ul>
                                <li>Natus hic assumenda consequatur excepturi ducimu.</li>
                                <li>Cumque rerum dolor impedit exercitationem Eveniet suscipit repellat.</li>
                                <li>Dolor sit amet consectetur adipisicing elit tempora cum .</li>
                                <li>Orem ipsum dolor sit amet consectetur adipisicing elit asperiores.</li>
                            </ul>
                            <form class="wsus__input_area">
                                <input type="text" placeholder="Enter Something">
                                <textarea cols="3" rows="4" placeholder="Enter Something"></textarea>
                                <select class="select_2" name="state">
                                    <option>default select</option>
                                    <option>short by rating</option>
                                    <option>short by latest</option>
                                    <option>low to high </option>
                                    <option>high to low</option>
                                </select>
                                <button type="submit" class="common_btn mt-4">confirm</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero, tempora cum optio
                                cumque rerum dolor impedit exercitationem? Eveniet suscipit repellat, quae natus hic
                                assumenda consequatur excepturi ducimus.</p>
                            <ul>
                                <li>Natus hic assumenda consequatur excepturi ducimu.</li>
                                <li>Cumque rerum dolor impedit exercitationem Eveniet suscipit repellat.</li>
                                <li>Dolor sit amet consectetur adipisicing elit tempora cum .</li>
                                <li>Orem ipsum dolor sit amet consectetur adipisicing elit asperiores.</li>
                            </ul>
                            <form class="wsus__input_area">
                                <input type="text" placeholder="Enter Something">
                                <textarea cols="3" rows="4" placeholder="Enter Something"></textarea>
                                <select class="select_2" name="state">
                                    <option>default select</option>
                                    <option>short by rating</option>
                                    <option>short by latest</option>
                                    <option>low to high </option>
                                    <option>high to low</option>
                                </select>
                                <button type="submit" class="common_btn mt-4">confirm</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero, tempora cum optio
                                cumque rerum dolor impedit exercitationem? Eveniet suscipit repellat, quae natus hic
                                assumenda consequatur excepturi ducimus.</p>
                            <ul>
                                <li>Natus hic assumenda consequatur excepturi ducimu.</li>
                                <li>Cumque rerum dolor impedit exercitationem Eveniet suscipit repellat.</li>
                                <li>Dolor sit amet consectetur adipisicing elit tempora cum .</li>
                                <li>Orem ipsum dolor sit amet consectetur adipisicing elit asperiores.</li>
                            </ul>
                            <form class="wsus__input_area">
                                <input type="text" placeholder="Enter Something">
                                <textarea cols="3" rows="4" placeholder="Enter Something"></textarea>
                                <select class="select_2" name="state">
                                    <option>default select</option>
                                    <option>short by rating</option>
                                    <option>short by latest</option>
                                    <option>low to high </option>
                                    <option>high to low</option>
                                </select>
                                <button type="submit" class="common_btn mt-4">confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="wsus__pay_booking_summary" id="sticky_sidebar2">
                        <h5>Booking Summary</h5>
                        <p>subtotal: <span>$120.00</span></p>
                        <p>shipping fee: <span>$20.00 </span></p>
                        <p>tax: <span>$00.00</span></p>
                        <h6>total <span>$140.00</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--============================
    PAYMENT PAGE END
==============================-->

<section id="wsus__dashboard">
    <div class="container-fluid">
        {{-- @include('vendor.layouts.sidebar') --}}
        <div class="row">
            <div>
                <div>
                    <div>
                        <div class="wsus__dash_pro_area">
                            <form action="{{ route('user.payment.create') }}" method="POST">
                                @csrf
                                <div class="form-group wsus__input" style="margin-bottom: 10px;">
                                    <label>Payment Amount ($)</label>
                                    <input type="number" id="amount" name="amount" class="form-control" value="{{getFinalPayment()}}" readonly>
                                </div>
                                <div class="form-group wsus__input">
                                    <label>Credit Or Debit Card</label>
                                    <img width="55px" height="30px" src="{{ asset('frontend/images/payment1.png') }}" alt="payment" class="img-fluid" style="float:right">
                                    <img width="55px" height="30px" src="{{ asset('frontend/images/payment2.png') }}" alt="payment" class="img-fluid" style="float:right">
                                    <img width="55px" height="30px" src="{{ asset('frontend/images/unionpay-logo.png') }}" alt="payment" class="img-fluid" style="float:right">
                                    <input type="text" id="card_number" name="card_number" class="form-control" value="{{old('card_number')}}" placeholder="4540 4587 **** 3215">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group wsus__input">
                                            <label>Expire Date</label>
                                            <input type="text" id="exp_date" name="exp_date" class="form-control" value="{{old('exp_date')}}" placeholder="YY/MM">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group wsus__input">
                                            <label>CVV</label>
                                            <input type="text" id="cvv" name="cvv" class="form-control" value="{{old('cvv')}}" placeholder="2540">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group wsus__input">
                                    <label for="payment_type">Payment Type</label>
                                    <select id="payment_type" name="payment_type" class="form-control wsus__input">
                                    <option value="txpg">TXPG</option>
                                    <option value="twpg">TWPG</option>
                                    </select>
                                </div>
                                {{-- <div class="wsus__save_card">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label"
                                            for="flexSwitchCheckDefault">save thid Card</label>
                                    </div>
                                </div> --}}
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Pay Now</button>
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
