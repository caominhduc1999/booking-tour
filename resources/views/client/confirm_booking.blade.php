@extends('client.layouts.master')
@section('stylesheets')
    <!-- Style Css -->
    <link href="{{ asset('assets/client/css/shop.css') }}" rel="stylesheet">
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
@endsection

@section('content')
    <!-- page_header start -->
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1> Đặt tour </h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="/"> Trang chủ </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Đặt tour </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page_header end -->

    <!--cart product wrapper Wrapper Start -->
    <div class="cart_product_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="btc_shop_single_prod_right_section shop_product_single_head related_pdt_shop_head">
                        <h1>Xác nhận thông tin đặt tour của bạn</h1>
                    </div>
                </div>
                @if(Session::has('notify'))
                    <div class="alert alert-danger">
                        {{ Session::get('notify')}}
                    </div>
                @endif
                <div class="shop_cart_page_wrapper">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="">
                            <div class="row">
                                <div class="col-md-4">
                                    <img style="width: 200px; height: 200px;"
                                        src="{{ $tour->image ? URL::asset('storage/images/' . $tour->image) : '/assets/images/default.jpg' }}"
                                        alt="">

                                    <p><a href="{{ route('client.tours.detail', $tour->id) }}" target="_blank">Thông tin
                                            chi tiết</a></p>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b>Mã tour: {{ $tour->code }}</b><br>
                                            <b>Tên tour: {{ $tour->name }}</b><br>
                                            <b>Loại tour: {{ $tour->type == 1 ? 'Trong nước' : 'Quốc tế' }}</b><br>
                                            <b>Số người giới hạn: {{ $tour->people_limit }}</b><br>
                                            <b>Thời gian: {{ $tour->days }} ngày - {{ $tour->nights }} đêm</b>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Giá vé: </b><br>
                                            <b>Người lớn: {{ number_format($tour->adult_price) }} VNĐ / vé</b><br>
                                            <b>Trẻ em: {{ number_format($tour->children_price) }} VNĐ / vé</b><br>
                                            <b>Trẻ nhỏ: {{ number_format($tour->baby_price) }} VNĐ / vé</b><br>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Hành trình: {{ $tour->journey }}</b><br>
                                            <b>Điểm khởi hành: {{ $tour->departure }}</b><br>
                                            <b>Điểm đến: {{ $tour->destination }}</b><br>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Lịch khởi hành:</b>
                                            <div id="validDepartureDateArray"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h2>Vui lòng nhập đầy đủ thông tin đặt tour</h2>
                            <br>
                            <div>
                                <div class="row" style="margin-left: 0px;">
                                    <label>Ngày khởi hành : {{ $booking->start_date }}</label>
                                    <br>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Số lượng người lớn: {{ $booking->adult_number }}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Số lượng trẻ em (từ 6 - 12 tuổi): {{ $booking->children_number }}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Số lượng trẻ nhỏ (dưới 6 tuổi): {{ $booking->baby_number }}</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Họ Tên: {{ $booking->booking_person_name }}</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">SĐT: {{ $booking->booking_person_phone }}</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Địa chỉ: {{ $booking->booking_person_address }}</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Email: {{ $booking->booking_person_email }}</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Khách sạn: {{ $hotel ? $hotel->name : 'Tự tìm khách sạn' }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Ghi chú: {{ $booking->note }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="position: sticky; top: 20%;">

                        <div class="shipping_Wrapper">
                            <div class="estimate_shiping_Wrapper_cntnt estimate_shiping_Wrapper_repsnse">
                                <h1 style="margin-top: 10px; color: red;">Tổng tiền: {{ number_format($booking->booking_price) }} VNĐ</h1>
                                <div class="shop_btn_wrapper shop_btn_wrapper_shipping" >
                                    <form action="">

                                    </form>
                                    <button class="btn btn-success">Thanh toán tại quầy</button>
                                </div>
                                <br>
                                <div class="shop_btn_wrapper shop_btn_wrapper_shipping">
                                    <button class="btn btn-primary">Thanh toán PayPal</button>
                                </div>
                                <br>
                                <div class="shop_btn_wrapper shop_btn_wrapper_shipping">
                                    <form action="{{ route('momo_payment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="booking_price" value="{{ $booking->booking_price }}">
                                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                        <input type="hidden" name="hotel_id" value="{{ $tour->hotel_id }}">
                                        <input type="hidden" name="discount_id" value="{{ $tour->discount_id }}">
                                        <input type="hidden" name="start_date" value="{{ $booking->start_date }}">
                                        <input type="hidden" name="adult_number" value="{{ $booking->adult_number }}">
                                        <input type="hidden" name="children_number" value="{{ $booking->children_number }}">
                                        <input type="hidden" name="baby_number" value="{{ $booking->baby_number }}">
                                        <input type="hidden" name="booking_person_name" value="{{ $booking->booking_person_name }}">
                                        <input type="hidden" name="booking_person_phone" value="{{ $booking->booking_person_phone }}">
                                        <input type="hidden" name="booking_person_email" value="{{ $booking->booking_person_email }}">
                                        <button type="submit" class="btn btn-danger">Thanh toán MoMo</button>
                                    </form>
                                </div>
                                <br>
                                <div class="shop_btn_wrapper shop_btn_wrapper_shipping">
                                    <button class="btn btn-warning">Thanh toán VnPay</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- cart product wrapper end -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/client/js/blog.js') }}"></script>
@endsection
