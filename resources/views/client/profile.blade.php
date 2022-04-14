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
                <h1> Thông tin khách hàng </h1>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                <div class="sub_title_section">
                    <ul class="sub_title">
                        <li> <a href="/"> Trang chủ </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                        <li> Thông tin khách hàng  </li>
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
                    <h1>Thông tin khách hàng:</h1>
                </div>
            </div>
            <div class="shop_cart_page_wrapper">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if(Session::has('notify'))
                        <div class="alert alert-success">
                            {{ Session::get('notify')}}
                        </div>
                    @endif
                    <form action="{{ route('update_profile') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">SĐT</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div class="form-group">
                        <br>
                        <div>
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}">
                            @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- cart product wrapper end -->
@endsection