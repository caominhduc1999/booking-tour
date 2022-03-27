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
                        <div class="login_wrapper">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                    <a href="#" class="btn btn-primary"> <span>Login with Facebook</span> <i
                                            class="fa fa-facebook"></i> </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                    <a href="#" class="btn btn-primary google-plus"> Login with Google <i
                                            class="fa fa-google-plus"></i> </a>
                                </div>
                            </div>
                            <h2>or</h2>
                            <div class="formsix-pos">
                                <div class="form-group i-email">
                                    <input type="email" class="form-control" required="" id="email2"
                                        placeholder="Email Address *">
                                </div>
                            </div>
                            <div class="formsix-e">
                                <div class="form-group i-password">
                                    <input type="password" class="form-control" required="" id="password2"
                                        placeholder="Password *">
                                </div>
                            </div>
                            <div class="login_remember_box">
                                <label class="control control--checkbox">Remember me
                                    <input type="checkbox">
                                    <span class="control__indicator"></span>
                                </label>
                                <a href="#" class="forget_password">
                                    Forgot Password
                                </a>
                            </div>
                            <div class="login_btn_wrapper">
                                <a href="#" class="btn btn-primary login_btn"> Login </a>
                            </div>
                            <div class="login_message">
                                <p>Don’t have an account ? <a href="#"> Sign up </a> </p>
                            </div>
                        </div>
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
