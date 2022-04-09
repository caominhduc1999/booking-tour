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
                        <h1>
                            @if ($paymentMethod != null)
                                Thanh toán thành công bằng {{$paymentMethod }}.
                            @else 
                                Hoàn tất đặt tour. Vui lòng liên hệ SĐT 1234567890 để thanh toán tại quầy.
                            @endif 
                            <br>
                            <br>
                            Thông tin đặt tour của bạn sẽ được gửi về mail:<br> {{ $email }}. 
                            <br>
                            <br>
                            Xin chân thành cảm ơn.</h1>
                            <a href="/"><button class="btn btn-primary">Trở về trang chủ</button></a>
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
