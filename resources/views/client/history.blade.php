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
                <h1> Lịch sử đặt tour </h1>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                <div class="sub_title_section">
                    <ul class="sub_title">
                        <li> <a href="/"> Trang chủ </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                        <li> Lịch sử đặt tour  </li>
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
                    <h1>Thông tin tour đã đặt:</h1>
                </div>
            </div>
            <div class="shop_cart_page_wrapper">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if(Session::has('notify'))
                        <div class="alert alert-success">
                            {{ Session::get('notify')}}
                        </div>
                    @endif
                    <div class="table-responsive cart-calculations">
                        <table class="table">

                            <thead class="cart_table_heading">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên tour</th>
                                    <th>Ngày đặt</th>
                                    <th>Ngày khởi hành</th>
                                    <th>Trạng thái tour</th>
                                    <th>HTTT</th>
                                    <th>Trạng thái HTTT</th>
                                    <th>Tổng tiền</th>
                                    <th>Thao tác</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>
                                            {{ $booking->id }}
                                        </td>
                                        <td>{{ $booking->tour->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }}</td>
                                        <td>
                                            @switch($booking->status)
                                                @case(1)
                                                    <span>Chờ xác nhận</span>
                                                    @break
                                                @case(2)
                                                    <span>Đã xác nhận</span>
                                                    @break
                                                @case(3)
                                                    <span>Đã hủy</span>
                                                    @break
                                                @default
                                                    <span></span>
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($booking->payment)
                                                @case(1)
                                                    <span>Thanh toán tại quầy</span>
                                                    @break
                                                @case(2)
                                                    <span>Paypal</span>
                                                    @break
                                                @case(3)
                                                    <span>Momo</span>
                                                    @break
                                                @case(4)
                                                    <span>Vnpay</span>
                                                    @break
                                                @default
                                                    <span></span>
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($booking->payment_status)
                                                @case(1)
                                                    <span>Chưa thanh toán</span>
                                                    @break
                                                @case(2)
                                                    <span>Đã đặt coc</span>
                                                    @break
                                                @case(3)
                                                    <span>Đã thanh toán</span>
                                                    @break
                                                @default
                                                    <span></span>
                                            @endswitch
                                        </td>
                                        
                                        <td class="cart_page_totl">{{ number_format($booking->total_price) }} VNĐ</td>
                                        <td>
                                            <a onclick="return confirm('Xác nhận hủy tour ?')" href="{{ route('cancel_booking', $booking->id) }}"><button class="btn btn-danger" @if($booking->status == 2 || $booking->status == 3) disabled @endif>Hủy tour</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <p style="margin-left: 15px; color: red;">Chú ý: Tour đã được xác nhận không thể hủy. Nếu bạn muốn hủy tour đã đặt, vui lòng liên hệ với chúng tôi theo hotline: 0986005759</p>
            </div>

        </div>
    </div>
</div>
<!-- cart product wrapper end -->
@endsection