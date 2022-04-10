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
                                        <div id="validDepartureDateArray"></div>
                                        {{-- <br>
                                            @foreach(explode(",", $tour->departure_date) as $date)
                                                {{ $date }}
                                                <br>
                                            @endforeach
                                        <br> --}}
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
                            <br>
                            <!-- /.entry-content -->
                            <div class="entry-content row" style="margin-top: 20px; background-color: yellow; padding: 5px;">
                                <h1>Danh sách khách sạn liên kết:</h1>
                                <br>
                                @foreach($tour->hotels as $hotel)
                                    <h2>{{ $hotel->name }}</h2>
                                    <p>Hotline: {{ $hotel->hotline }}</p>
                                    <p>Giá vé / ngày: {{ number_format($hotel->price_per_day) }} VNĐ - Giá vé / đêm: {{ number_format($hotel->price_per_night) }} VNĐ</p>
                                    <p>Địa chỉ: {{ $hotel->address }}</p>
                                    <p>Thông tin:{!! $hotel->note !!}</p>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="comments_wrapper">
                        <h4>Bình luận (04)</h4>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="comments_Box last_comment_box">
                                    <div class="img_wrapper">
                                        <img src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png" class=""
                                            alt="author_img" height="70px" />
                                    </div>
                                    <div class="text_wrapper">
                                        <div class="author_detail">
                                            <span class="author_name"> Eva Marilla <i
                                                    class="fa fa-circle"></i></span>

                                            <span class="publish_date"> July 5, 2018 - <a href="#">Reply</a> </span>
                                        </div>
                                        <div class="author_content">
                                            <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla,
                                                ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices
                                                rhoncus. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="comments_form">
                        <h4>Để lại bình luận</h4>
                        <div class="row">
                            <!-- /.col-md-6 -->
                            <div class="col-md-12">
                                <div class="formsix-m">
                                    <div class="form-group i-message">
                                        <label class="sr-only">Nội dung</label>
                                        <textarea class="form-control" required="" rows="7" id="messageTen" placeholder="Nội dung"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row-->
                        @if(\Auth::check() && \Auth::user()->role == 2)
                            <button type="submit" class="btn btn-primary btn-block">Gửi bình luận</button>
                        @else
                            <a href="{{ route('client_get_login') }}"><button type="button" class="btn btn-primary btn-block">Đăng nhập để bình luận ngay</button></a>
                        @endif
                    </div>
                    <!-- /.comments_form-->
                </div>
        </div>
                        <!-- /.blog-content -->
                        
        
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/client/js/blog.js') }}"></script>
    <script>
        let departureDate = '{{ $tour->departure_date }}'
        let departureDateArray = departureDate.split(',')
        let validDepartureDateArray = [];

        departureDateArray.forEach(function(item) {
            let selectItemDate = item.split('/')
            let formatItemDate = `${selectItemDate[1]}/${selectItemDate[0]}/${selectItemDate[2]}`
            let currentDate = new Date()
            let itemDate = new Date(formatItemDate)
            let remainSlot = ''
            if (itemDate > currentDate) {
                 // calculate remain slot
                $.ajax({
                    type: "GET",
                    url: '/get-remain-slot',
                    data: {
                        tour_id: '{{ $tour->id }}',
                        start_date: item
                    }, // serializes the form's elements.
                    success: function(data)
                    {
                        remainSlot = data.remain_slot
                        validDepartureDateArray.push({
                            'date': item,
                            'remain_slot': remainSlot
                        });

                        let html = ''
                        validDepartureDateArray.forEach(function(item) {
                            html += `<label>${item.date} - Còn ${item.remain_slot} chỗ</label><br>`
                        })
                        $('#validDepartureDateArray').html(html)
                    }
                });
            }
        })
    </script>
@endsection