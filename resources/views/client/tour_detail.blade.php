@extends('client.layouts.master')
@section('stylesheets')
        <!-- Style Css -->
        <link href="{{ asset('assets/client/css/blog_single_3.css') }}" rel="stylesheet">
        <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Your Website Title" />
        <meta property="og:description"   content="Your description" />
        <meta property="og:image"         content="{{ $tour->image ? URL::asset('storage/images/' . $tour->image) : '/assets/images/default.jpg' }}" />
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=162796118975185&autoLogAppEvents=1" nonce="USZ54TNt"></script>
        <style>
            .badge {
                font-size: 16px;
                border-radius: 5px;
            }
        </style>
@endsection

@section('content')
<div class="page_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                <h1>THÔNG TIN TOUR</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                <div class="sub_title_section">
                    <ul class="sub_title">
                        <li> <a href="#"> Trang chủ </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                        <li> Thông tin tour</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- blog_section start -->
<div class="blog_section">
    <div class="container">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <article class="blog-post-wrapper clearfix">
                        <div class="post-thumbnail">
                            <img style="" src="{{ $tour->image ? URL::asset('storage/images/' . $tour->image) : '/assets/images/default.jpg' }}" class="img-responsive " alt="Image">
                        </div>
                        <!-- /.post-thumbnail -->
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                <div class="share_icons">
                                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content">
                            <header class="entry-header">
                                <h1 class="" style="font-size: 32px;">{{ $tour->name }}</h1>
                                <div class="entry-meta">
                                    <ul>
                                        <li><span class="posted-date"><a href="#">{{ $tour->created_at->format('d-m-Y') }}</a></span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.entry-meta -->
                            </header>
                            <!-- /.entry-header -->
                            <div class="row">
                                <div class="col-md-4">
                                     <span class="badge badge-success">Mã tour: {{ $tour->code }}</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="badge badge-primary">Loại tour: {{ $tour->type == 1 ? 'Trong nước' : 'Quốc tế' }}</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="badge badge-primary">Tần suất: {{ $tour->frequency == 1 ? 'Hàng tuần' : 'Liên hệ' }}</span>
                                </div>
                               
                            </div>
                             <div class="row" style="margin-top: 20px;">
                                <div class="col-md-4">
                                    <span class="badge badge-secondary">Số ngày: {{ $tour->days }} ngày</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="badge badge-primary">Số người tối đa: {{ $tour->people_limit }} người</span>
                                </div>
                                @if($tour->is_feature)
                                    <div class="col-md-4">
                                        <span class="badge badge-primary">***Tour nổi bật***</span>
                                    </div>
                                @endif
                            </div>
                            <div class="entry-content row" style="margin-top: 20px;">
                                <br>
                                <div class="col-md-6">
                                    <div style="font-size: 16px;">
                                        <b >Lịch khởi hành: </b>
                                        <br>
                                            @foreach(explode(",", $tour->departure_date) as $date)
                                                {{ $date }}
                                                <br>
                                            @endforeach
                                        <br>
                                        <b >Điểm khởi hành: </b>{{ $tour->departure }}<br>
                                        <b >Điểm đến: </b>{{ $tour->destination }}<br>
                                        <b >Vận chuyển: </b>{{ $tour->transport }}<br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('booking', $tour->id) }}"><button class="btn btn-warning" style="width: 100%; font-size: 2rem;">ĐẶT TOUR NGAY</button></a>
                                </div>
                                <div style="margin-top: 10px;">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th scope="col"><h3>Giá vé / người</h3></th>
                                            <th scope="col"><h3>Người lớn</h3></th>
                                            <th scope="col"><h3>Trẻ em (6 - 12 tuổi)</h3></th>
                                            <th scope="col"><h3>Trẻ nhỏ (< 6 tuổi)</h3></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">#</th>
                                            <td><h3><b style="color: red;">{{ number_format($tour->adult_price) }} VNĐ</b></h3></td>
                                            <td><h3><b style="color: red;">{{ number_format($tour->children_price) }} VNĐ</b></h3></td>
                                            <td><h3><b style="color: red;">{{ number_format($tour->baby_price) }} VNĐ</b></h3></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                                <hr>
                                <h1>Mô tả:</h1>
                                <p>{!! $tour->description !!}</p>
                                <hr>
                                <h1>Lịch Trình:</h1>
                                <p>{!! $tour->schedule !!}</p>
                            </div>
                            <!-- /.entry-content -->

                        </div>
                    </article>
                </div>
        </div>
                        <!-- /.blog-content -->
                        
        
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/client/js/blog.js') }}"></script>
@endsection