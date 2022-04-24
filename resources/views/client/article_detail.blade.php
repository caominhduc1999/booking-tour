@extends('client.layouts.master')
@section('title')
    {{ $article->title }} 
@endsection
@section('stylesheets')
    <!-- Style Css -->
    <link href="{{ asset('assets/client/css/blog_single_1.css') }}" rel="stylesheet">
    <style>
        .accordion_wrapper .panel .panel-heading a.collapsed:after {
            content: '' !important;
        }
    </style>
    <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="{{ $article->image ? URL::asset('storage/images/' . $article->image) : '/assets/images/default.jpg' }}" />
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=162796118975185&autoLogAppEvents=1" nonce="USZ54TNt"></script>
@endsection

@section('content')
    <!-- blog_section start -->
    <div class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
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
                            @foreach($latestArticles as $latestArticle)
                                <div class="blog_wrapper1">
                                    <div class="blog_image">
                                        <img src="{{ $latestArticle->image ? URL::asset('storage/images/' . $latestArticle->image) : '/assets/images/default.jpg' }}" class="img-responsive" alt="blog_img1" />
                                    </div>
                                    <div class="blog_text">
                                        <h5><a href="{{ route('client.articles.detail', $latestArticle->id) }}">{{ $latestArticle->title }}</a></h5>
                                        <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>{{ $latestArticle->created_at->format('d-m-Y') }}</div>
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
                    <article class="blog-post-wrapper clearfix">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="post-thumbnail" style="display: flex; justify-content: center;">
                                    <img src="{{ $article->image ? URL::asset('storage/images/' . $article->image) : '../../assets/images/default.jpg' }}" class="img-responsive "
                                        alt="Image" style="width: 700px;">
                                </div>
                                <!-- /.post-thumbnail -->

                                <div class="blog-content">
                                    <header class="entry-header">
                                        <h4 class="entry-title">{{ $article->title }}
                                            </h4>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><span class="posted-date">{{ $article->created_at->format('d-m-Y') }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.entry-meta -->
                                    </header>
                                    <!-- /.entry-header -->

                                    <div class="entry-content">
                                        <p>{!! $article->description !!}</p>
                                    </div>
                                    <!-- /.entry-content -->

                                </div>
                                <!-- /.blog-content -->
                            </div>
                        </div>
                    </article>


                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="blog_post_bottom_wrapper">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
                                    <div class="tags">
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        Tags:
                                        @foreach($article->tags as $tag)
                                        <a href="{{ route('client.articles.list') . '?tag_id=' . $tag->id }}">{{ $tag->name }} ,</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
                                    <div class="share_icons">
                                        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog_section end -->
@endsection

@section('scripts')
@endsection
