@extends('client.layouts.master')
@section('stylesheets')
    <!-- Style Css -->
    <link href="{{ asset('assets/client/css/blog_style_5.css') }}" rel="stylesheet">
    <style>
        .accordion_wrapper .panel .panel-heading a.collapsed:after {
            content: '' !important;
        }
    </style>
@endsection

@section('content')
    <div class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                    <h1>Bài viết</h1>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                    <div class="sub_title_section">
                        <ul class="sub_title">
                            <li> <a href="{{ route('client.index') }}"> Trang chủ </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                            <li> Bài viết</li>
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
                <div class="col-lg-3 col-md-4 col-sm-5 hidden-xs">
                    <div class="sidebar_widget">
                        <h4>Tìm kiếm bài viết</h4>
                        <form class="search_form" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Từ khóa" name="search">
                            </div>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Danh mục</h4>
                        <div class="accordion_wrapper">
                            <div class="panel-group" id="accordion_wrapperLeft">
                                <!-- /.panel-default -->
                                <div class="panel panel-default">
                                    @foreach($categories as $category)
                                        <div class="panel-heading">
                                            <h2 class="panel-title">
                                                <a class="collapsed" href="{{ route('client.articles.list') . '?category_id=' . $category->id }}">
                                                    {{ $category->name }}
                                                </a>
                                            </h2>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /.panel-default -->
                            </div>
                            <!--end of /.panel-group-->
                        </div>
                        <!--end of accordion_wrapper-->
                    </div>
                    <div class="sidebar_widget">
                        <h4>Bài viết mới nhất</h4>
                        <div class="latest_post_wrapper">
                            @foreach($latestArticles as $article)
                                <div class="blog_wrapper1">
                                    <div class="blog_image">
                                        <img src="{{ $article->image ? URL::asset('storage/images/' . $article->image) : '../../assets/images/default.jpg' }}" class="img-responsive" alt="blog_img1" />
                                    </div>
                                    <div class="blog_text">
                                        <h5><a href="{{ route('client.articles.detail', $article->id) }}">{{ $article->title }}</a></h5>
                                        <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{ $article->created_at->format('d-m-Y') }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Tags</h4>
                        <div class="tag_cloud_wrapper">
                            <ul>
                                @foreach($tags as $tag)
                                    <li>
                                        <a href="{{ route('client.articles.list') . '?tag_id=' . $tag->id }}">{{ $tag->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="row">
                        @foreach($articles as $article)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <article class="blog-post-wrapper clearfix">
                                    <div class="post-thumbnail">
                                        <a href="{{ route('client.articles.detail', $article->id) }}">
                                            <img src="{{ $article->image ? URL::asset('storage/images/' . $article->image) : '../../assets/images/default.jpg' }}" alt="Image" style="height: 300px;">
                                        </a>
                                        <div class="posted-date">
                                            <span class="day">{{ $article->created_at->format('d') }}</span>
                                            <span class="month">{{ $article->created_at->format('M') }}</span>
                                        </div>
                                    </div>
                                    <!-- /.post-thumbnail -->

                                    <div class="blog-content">
                                        <header class="entry-header">
                                            <h4 class="entry-title"><a href="{{ route('client.articles.detail', $article->id) }}">{{ $article->title }}</a></h4>
                                        </header>
                                        <!-- /.entry-header -->

                                        <div class="entry-content">
                                            <p>{{ \Str::limit($article->overall, 150, $end='...') }}
                                            </p>
                                        </div>
                                        <!-- /.entry-content -->
                                    </div>
                                    <!-- /.blog-content -->

                                    <div class="entry-footer clearfix">
                                        <ul class="entry-meta pull-left">
                                            @foreach($article->tags as $tag)
                                            <li><span class="hits"><a href="{{ route('client.articles.list') . '?tag_id=' . $tag->id }}">{{ $tag->name }}</a></span>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <a class="readmore pull-right" href="{{ route('client.articles.detail', $article->id) }}"><i class="fa fa-long-arrow-right"></i>
                                            More</a>
                                    </div>
                                    <!-- /.entry-footer -->
                                </article>
                            </div>
                        @endforeach
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: flex; justify-content: center;">
                            <!-- blog_pagination_section start -->
                                {{ $articles->links() }}
                            <!-- blog_pagination_section end -->
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 visible-xs">
                    <div class="sidebar_widget">
                        <h4>Search Feed</h4>
                        <form class="search_form" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Categories</h4>
                        <div class="accordion_wrapper">
                            <div class="panel-group" id="responsive_accordion_wrapperLeft">
                                <!-- /.panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" >
                                                Background (541)
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                                <!-- /.panel-default -->
                            </div>
                            <!--end of /.panel-group-->
                        </div>
                        <!--end of accordion_wrapper-->
                    </div>
                    <div class="sidebar_widget">
                        <h4>Latest Post</h4>
                        <div class="latest_post_wrapper">
                            <div class="blog_wrapper1">
                                <div class="blog_image">
                                    <img src="images/blog/blog-10/blog_img1.jpg" class="img-responsive" alt="blog_img1" />
                                </div>
                                <div class="blog_text">
                                    <h5><a href="#">Familiar idea<br> with Clients</a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June
                                        28, 2018-19</div>
                                </div>
                            </div>
                            <div class="blog_wrapper2">
                                <div class="blog_image">
                                    <img src="images/blog/blog-10/blog_img2.jpg" class="img-responsive" alt="blog_img2" />
                                </div>
                                <div class="blog_text">
                                    <h5><a href="#">Lorem ipsum <br> dolor sit elit</a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June
                                        28, 2018-19</div>
                                </div>
                            </div>
                            <div class="blog_wrapper3">
                                <div class="blog_image">
                                    <img src="images/blog/blog-10/blog_img3.jpg" class="img-responsive" alt="blog_img3" />
                                </div>
                                <div class="blog_text">
                                    <h5><a href="#">Donec id elit <br>gravida aeget </a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June
                                        28, 2018-19</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <div class="video_wrapper">
                            <img src="images/blog/blog-2/video_img.jpg" alt="blog_img1" />
                            <a href="https://www.youtube.com/watch?v=b9krhARsAHU" class="play-trigger"><span><i
                                        class="fa fa-play"></i></span></a>
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Tags Cloud</h4>
                        <div class="tag_cloud_wrapper">
                            <ul>
                                <li>
                                    <a href="#">Business</a>
                                </li>
                                <li>
                                    <a href="#">Corporate</a>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                </li>
                                <li>
                                    <a href="#">Customer</a>
                                </li>
                                <li>
                                    <a href="#">Money</a>
                                </li>
                                <li class="active">
                                    <a href="#">Portfolio</a>
                                </li>
                                <li>
                                    <a href="#">Partners</a>
                                </li>
                                <li>
                                    <a href="#">Wordpress</a>
                                </li>
                                <li>
                                    <a href="#">Html</a>
                                </li>
                                <li>
                                    <a href="#">Psd</a>
                                </li>
                                <li>
                                    <a href="#">Joomla</a>
                                </li>
                                <li>
                                    <a href="#">Skills</a>
                                </li>
                                <li>
                                    <a href="#">Prices</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- blog_section end -->
@endsection

@section('scripts')
    <!-- blog js -->
    <script src="{{ asset('assets/client/js/blog.js') }}"></script>
@endsection