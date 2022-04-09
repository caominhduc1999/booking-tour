@extends('client.layouts.master')
@section('stylesheets')
    <!-- Style Css -->
    <link href="{{ asset('assets/client/css/blog_style_2.css') }}" rel="stylesheet">
    <style>
        .search-button {
            width: 100%;
            background-color: #4285f4;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
     <!-- blog_section start -->
     <div class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <div class="sidebar_widget">
                        <h4>Tìm kiếm tour</h4>
                        <form role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ request()->name ?? '' }}" placeholder="Search">
                            </div>
                            <label for="">Giá tiền</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="from_price" placeholder="Từ" value="{{ request()->from_price ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="to_price" placeholder="Đến" value="{{ request()->to_price ?? '' }}">
                                </div>
                            </div>

                            <br>
                            <label for="">Loại tour</label>
                            <select name="type" id="" class="form-control">
                                <option value=""></option>
                                <option value="1" @if(request()->type == 1) selected @endif>Trong nước</option>
                                <option value="2" @if(request()->type == 2) selected @endif>Quốc tế</option>
                            </select>

                            <br>
                            <label for="frequency">Tần suất</label>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                                <option value="1" @if(request()->frequency == 1) selected @endif>Hàng tuần</option>
                                <option value="2" @if(request()->frequency == 2) selected @endif>Liên hệ</option>
                            </select>

                            <br>
                            <label for="">Số ngày</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="from_days" placeholder="Từ" value="{{ request()->from_days ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="to_days" placeholder="Đến" value="{{ request()->to_days ?? '' }}">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="search-button">Áp dụng</button>
                        </form>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Tour mới nhất</h4>
                         <div class="latest_post_wrapper">
                            @foreach($latestTours as $tour)
                                <div class="blog_wrapper1">
                                    <div class="blog_image">
                                        <img src="{{ $tour->image ? URL::asset('storage/images/' . $tour->image) : '/assets/images/default.jpg' }}" class="img-responsive" alt="blog_img1" />
                                    </div>
                                    <div class="blog_text">
                                        <h5><a href="#">{{ $tour->name }}</a></h5>
                                        <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{ $tour->created_at->format('d-m-Y') }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 hidden-xs">
                    <div class="sidebar_widget">
                        <h4>Tìm kiếm tour</h4>
                        <form role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{ request()->name ?? '' }}" placeholder="Search">
                            </div>
                            <label for="">Giá tiền</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="from_price" placeholder="Từ" value="{{ request()->from_price ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="to_price" placeholder="Đến" value="{{ request()->to_price ?? '' }}">
                                </div>
                            </div>

                            <br>
                            <label for="">Loại tour</label>
                            <select name="type" id="" class="form-control">
                                <option value=""></option>
                                <option value="1" @if(request()->type == 1) selected @endif>Trong nước</option>
                                <option value="2" @if(request()->type == 2) selected @endif>Quốc tế</option>
                            </select>

                            <br>
                            <label for="frequency">Tần suất</label>
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                                <option value="1" @if(request()->frequency == 1) selected @endif>Hàng tuần</option>
                                <option value="2" @if(request()->frequency == 1) selected @endif>Liên hệ</option>
                            </select>

                            <br>
                            <label for="">Số ngày</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="from_days" placeholder="Từ" value="{{ request()->from_days ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="to_days" placeholder="Đến" value="{{ request()->to_days ?? '' }}">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="search-button">Áp dụng</button>
                        </form>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Tour mới nhất</h4>
                         <div class="latest_post_wrapper">
                            @foreach($latestTours as $tour)
                                <div class="blog_wrapper1">
                                    <div class="blog_image">
                                        <img src="{{ $tour->image ? URL::asset('storage/images/' . $tour->image) : '/assets/images/default.jpg' }}" class="img-responsive" alt="blog_img1" />
                                    </div>
                                    <div class="blog_text">
                                        <h5><a href="{{ route('client.tours.detail', $tour->id) }}">{{ $tour->name }}</a></h5>
                                        <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{ $tour->created_at->format('d-m-Y') }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    @foreach($tours as $tour)
                        <article class="blog-post-wrapper clearfix">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="post-thumbnail">
                                        <img style="height: 300px" src="{{ $tour->image ? URL::asset('storage/images/' . $tour->image) : '/assets/images/default.jpg' }}" class="" alt="Image">
                                    </div>
                                    <!-- /.post-thumbnail -->
                                </div>
                                <div class="col-md-6">
                                    <div class="blog-content" style="padding-top: 5px;">
                                        <header class="entry-header">
                                            <h1 class="entry-title"><a href="{{ route('client.tours.detail', $tour->id) }}">{{ $tour->name }}</a></h1>
                                            <div class="entry-meta">
                                                <ul class="list-inline">
                                                    <li><span class="the-time"><a href="#">{{ $tour->created_at->format('d-m-Y') }}</a></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.entry-meta -->
                                        </header>
                                        <!-- /.entry-header -->
            
                                        <div class="entry-content">
                                            <h3 style="font-size: 20px;">{{ $tour->days }} ngày - {{ $tour->nights }} đêm</h3>
                                            <br>
                                            <h3 style="font-size: 16px;">
                                                Lịch trình: 
                                            <br>
                                            {{ \Str::limit($tour->journey, 150, '...') }}</h3>
                                            <br>
                                            <br>
                                            <b><h3 style="color: #e30051;">{{ number_format($tour->adult_price) }} VNĐ</h3></b>
                                            <a class="readmore_btn" href="{{ route('client.tours.detail', $tour->id) }}">Đặt tour ngay</a>
                                            <br><br>
                                        </div>
                                        <!-- /.entry-content -->
                                    </div>
                                </div>
                            </div>
                        


                        
                        </article>
                    @endforeach
                    <!-- /.blog_section end -->

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: flex; justify-content: center;">
                        <!-- blog_pagination_section start -->
                            {{ $tours->links() }}
                        <!-- blog_pagination_section end -->
                    </div>
                </div>
                
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- blog_section start -->
@endsection

@section('scripts')
<script>

</script>
@endsection
