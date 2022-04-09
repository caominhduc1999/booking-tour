    <!-- header start -->
    <style>
        .login-button {
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
    <div class="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                        <div class="contact_info_wrapper">
                            <ul>
                                <li><a href="#"><i class="fa fa-envelope"></i> hello@example.com</a></li>
                                <li class="contact_number_wrapper hidden-xs"><a href="#"><i class="fa fa-phone"></i>
                                        +1 814 251 152</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                        <!-- signin_and_social_icon_wrapper -->
                        <div class="signin_and_social_icon_wrapper">
                            <ul>
                                <li class="social_icon_wrapper hidden-xs">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                    </ul>
                                </li>
                                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 2)
                                    <li class="dropdown signin_wrapper">
                                        <a>Xin chào {{ Auth::user()->name }}</a>
                                    </li>
                                    <li> </li>
                                    <li class="dropdown signin_wrapper">
                                        <a href="/logout" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-sign-in"></i> Đăng xuất
                                        </a>
                                    </li>
                                @else 
                                     <!-- Cart Option -->
                                     <li class="dropdown signin_wrapper">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-sign-in"></i> Đăng ký/ Đăng nhập
                                        </a>
                                        <form action="{{ route('client_post_login') }}" method="post" id="login-form">
                                            @csrf
                                            <ul class="dropdown-menu">
                                                <li class="signin_dropdown">
                                                    <div class="formsix-pos">
                                                        <div class="form-group i-email">
                                                            <input type="email" name="email" class="form-control" required="" id="emailTen"
                                                                placeholder="Email Address *">
                                                        </div>
                                                    </div>
                                                    <div class="formsix-e">
                                                        <div class="form-group i-password">
                                                        <input type="password" name="password" class="form-control" required=""
                                                            id="namTen-first" placeholder="Password *">
                                                    </div>
                                                    </div>
                                                    <div class="remember_box">
                                                        <input type="checkbox" name="remember_me"> Ghi nhớ mật khẩu
                                                    
                                                    </div>
                                                    <div class="login_wrapper">
                                                        <button class="login-button">Đăng nhập</button>
                                                    </div>
                                                    <div class="sign_up_message">
                                                        <p>Chưa có tài khoản ? <a href="/register"> Đăng ký </a> </p>
                                                        <p> <a href="" class="forget-passưord">Quên mật khẩu</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                    </li>
                                    <!-- /.Cart Option -->
                                @endif
                            </ul>
                        </div>
                        <!-- /.signin_and_social_icon_wrapper end -->
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <div class="main_menu_wrapper hidden-xs hidden-sm">
            <nav class="navbar mega-menu navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">
                    <div class="navbar-header hidden-xs hidden-sm">
                        <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active dropdown">
                                <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    Trang chủ
                                </a>
                            </li>
                            <li class="active dropdown">
                                <a href="{{ route('client.articles.list') }}" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    Bài viết
                                </a>
                            </li>
                            <li class="active dropdown">
                                <a href="{{ route('client.tours.list') }}" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    Danh sách Tours
                                </a>
                            </li>
                            @if(\Auth::check() && \Auth::user()->role == 2)
                                <li class="active dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        Lịch sử đặt tour
                                    </a>
                                </li>
                            @endif
                            <!-- /.Cart Option -->
                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
        <!-- .site-nav -->
        <div class="mobail_menu_main visible-xs visible-sm">
            <div class="navbar-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""></a>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <button type="button" class="navbar-toggle collapsed" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar">
                <a class="sidebar_logo" href="index.html"><img src="images/logo.png" alt=""></a>
                <div id="toggle_close">&times;</div>
                <div id='cssmenu'>
                    <ul>
                        <li>
                            <form class="sidebar_search">
                                <input type="search" placeholder="Search...">
                                <button>
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </li>
                        <li class='has-sub'><a href='/'>Trang chủ</a>
                        </li>
                        <li class='has-sub'><a href='{{ route('client.articles.list') }}'>Bài viết</a>
                        </li>
                        <li class='has-sub'><a href='{{ route('client.tours.list') }}'>Danh sách Tours</a>
                        </li>
                        <li class='has-sub'><a href='#'>Lịch sử đặt tour</a>
                        </li>
                        <li class="sidebar_login">
                            <a href="/login" class="btn btn-primary">Login/Register</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->