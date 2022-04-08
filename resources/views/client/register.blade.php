<!DOCTYPE html>
<!--
Template Name: A-Future HTML
Version: 1.0.0
Author: Webstrot
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Home Page 2 </title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

    <!-- font-awesome -->
    <link href="{{ asset('assets/client/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/fonts.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/client/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Animation Css -->
    <link href="{{ asset('assets/client/css/animate.css') }}" rel="stylesheet">
    <!-- Style CSS -->
    <link href="{{ asset('assets/client/css/login_and_register.css') }}" rel="stylesheet">
    <!-- Common Style CSS -->
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <style>
        .login_btn {
            background-color: #4385f5;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 100%;
        }
    </style>
</head>

<body>

    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

    <!-- login_section -->
    <div class="login_section">
        <div class="login_section_overlay"></div>
        <!-- login_form_wrapper -->
        <div class="login_form_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- login_wrapper -->
                        <form class="login_wrapper" action="{{ route('client_post_register') }}" method="POST">
                            @csrf
                            <div class="formsix-pos">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" required="" id="email2"
                                        placeholder="Tên *" value="{{ old('name') }}">
                                </div>
                            </div>
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                            <div class="formsix-pos">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" required="" id="email2"
                                        placeholder="SĐT *" value="{{ old('phone') }}">
                                </div>
                            </div>
                            @error('phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                            <div class="formsix-pos">
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" required="" id="email2"
                                        placeholder="Địa chỉ *" value="{{ old('address') }}">
                                </div>
                            </div>
                            @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                            <div class="formsix-pos">
                                <div class="form-group">
                                    <select name="gender" class="form-control" id="">
                                        <option value="">Giới tính</option>
                                        <option value="1" @if(old('address') == 1) selected @endif>Nam</option>
                                        <option value="2" @if(old('address') == 2) selected @endif>Nữ</option>
                                    </select>
                                </div>
                            </div>
                            @error('gender')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                            <div class="formsix-pos">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required="" id="email2"
                                        placeholder="Email Address *" value="{{ old('email') }}">
                                </div>
                            </div>
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                            <div class="formsix-e">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" required="" id="password2"
                                        placeholder="Mật khẩu *">
                                </div>
                            </div>
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                            <div class="formsix-e">
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control" required="" id="password2"
                                        placeholder="Xác nhận mật khẩu *">
                                </div>
                            </div>
                            @error('confirm_password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>    
                            @enderror
                            <div class="login_btn_wrapper">
                                <button type="submit" class="btn btn-primary login_btn"> Đăng Ký </button>
                            </div>
                            <div class="login_message">
                                <p>Đã có tài khoản ? <a href="{{ route('client_get_login') }}"> Đăng nhập </a> </p>
                            </div>
                        </form>
                        <!-- /.login_wrapper-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.login_form_wrapper-->
    </div>
    <!-- /.login_section -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Bootstrap js -->
    <script src="{{ asset('assets/client/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('assets/client/js/custom.js') }}"></script>
</body>

</html>
