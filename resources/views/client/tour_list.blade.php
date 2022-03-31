@extends('client.layouts.master')
@section('stylesheets')
    <!-- Style Css -->
    <link href="{{ asset('assets/client/css/blog_style_2.css') }}" rel="stylesheet">
@endsection

@section('content')
     <!-- blog_section start -->
     <div class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 hidden-xs">
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
                            <div class="panel-group" id="accordion_wrapperLeft">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftTwo" aria-expanded="false">
											Web Template (214)
										  </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftTwo" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Screen Kit (20)
                                                </li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftone" aria-expanded="false">
											PSD Mockup
											
										  </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftone" class="panel-collapse collapse in" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftThree" aria-expanded="false">
											Freebies (145)
										  </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftThree" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftFour" aria-expanded="false">
											Tool / Tips (21)
										  </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftFour" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftFive" aria-expanded="false">
											Background (541)
										  </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftFive" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>
                                        </div>
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
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June 28, 2018-19</div>
                                </div>
                            </div>
                            <div class="blog_wrapper2">
                                <div class="blog_image">
                                    <img src="images/blog/blog-10/blog_img2.jpg" class="img-responsive" alt="blog_img2" />
                                </div>
                                <div class="blog_text">
                                    <h5><a href="#">Lorem ipsum <br> dolor sit elit</a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June 28, 2018-19</div>
                                </div>
                            </div>
                            <div class="blog_wrapper3">
                                <div class="blog_image">
                                    <img src="images/blog/blog-10/blog_img3.jpg" class="img-responsive" alt="blog_img3" />
                                </div>
                                <div class="blog_text">
                                  <h5><a href="#">Donec id elit <br>gravida aeget </a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June 28, 2018-19</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <div class="video_wrapper">
                            <img src="images/blog/blog-2/video_img.jpg" alt="blog_img1" />
                            <a href="https://www.youtube.com/watch?v=b9krhARsAHU" class="play-trigger"><span><i class="fa fa-play"></i></span></a>
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
                    <div class="sidebar_widget">
                        <h4>Text Widget</h4>
                        <div class="text_widget_content">
                            <p>
                                Sollicitudin, lorem quis bibe u auctor, nisi elit couat ipsu, nec sagittis sem ni id elit. Duis sed odio sit amet.
                            </p>
                            <p>
                                Nibh vulpute cursus. Proin gravida nibh vel velit tor aliquet.
                            </p>
                            <a href="http://www.webstrot.com/">
								http://www.webstrot.com/
							</a>
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Instagram</h4>
                        <ul class="instagram_images">
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery1.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery2.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery3.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery4.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery5.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery6.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Archives</h4>
                        <div class="archives_wrapper">
                            <ul>
                                <li>
                                    <a href="#">
										<i class="fa fa-caret-right" aria-hidden="true"></i> January 2016
									</a>
                                </li>
                                <li>
                                    <a href="#">
										<i class="fa fa-caret-right" aria-hidden="true"></i> February 2016
									</a>
                                </li>
                                <li>
                                    <a href="#">
										<i class="fa fa-caret-right" aria-hidden="true"></i> March 2016
									</a>
                                </li>
                                <li>
                                    <a href="#">
										<i class="fa fa-caret-right" aria-hidden="true"></i> April 2016
									</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <div class="twitter_wrapper">
                            <div class="twitter_icon_wrapper">
                                <div class="twitter_icon_image">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <div class="twitter_icon_content">
                                    <a>@akshayhandge</a>
                                </div>
                            </div>
                            <p>
                                http://goo.gl/kaKnUP Click Here, One More PSD Approval on Theme Forest #envato #PSD #theme #webstrot
                            </p>
                            <p>
                                - 4 Hours ago
                            </p>
                            <ul>
                                <li>
                                    <a class="likes" href="#"><i class="fa fa-heart-o"></i> 152</a>
                                </li>
                                <li>
                                    <a class="comments" href="#"><i class="fa fa-comment-o"></i> 25</a>
                                </li>
                            </ul>
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
                                            <h1 class="entry-title"><a href="#">{{ $tour->name }}</a></h1>
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
                                            <a class="readmore_btn" href="#">Đặt tour ngay</a>
                                            <br><br>
                                        </div>
                                        <!-- /.entry-content -->
                                    </div>
                                </div>
                            </div>
                        


                        
                        </article>
                    @endforeach
                    <!-- /.blog_section end -->

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- blog_pagination_section start -->
                        <div class="blog_pagination_section">
                            <ul>
                                <li>
                                    <a href="#" class="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> Prev </a>
                                </li>
                                <li><a href="#">1</a>
                                </li>
                                <li class="hidden-xs"><a href="#">2</a>
                                </li>
                                <li class="hidden-xs"><a href="#">3</a>
                                </li>
                                <li class="hidden-xs"><a href="#">4</a>
                                </li>
                                <li class="hidden-xs"><a href="#">5</a>
                                </li>
                                <li class="hidden-xs"><a href="#">6</a>
                                </li>
                                <li class="hidden-xs hidden-sm"><a href="#">7</a>
                                </li>
                                <li class="visible-xs"><a href="#">...</a>
                                </li>
                                <li class="hidden-sm"><a href="#">8</a>
                                </li>
                                <li><a href="#" class="next"> Next <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- blog_pagination_section end -->
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

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftTwo" aria-expanded="false">
											Web Template (214)
										  </a>
                                        </h2>
                                    </div>
                                    <div id="responsive_collapseSevenLeftTwo" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Screen Kit (20)
                                                </li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#responsive_accordion_wrapperLeft" href="#responsive_collapseSevenLeftone" aria-expanded="false">
											PSD Mockup
											
										  </a>
                                        </h2>
                                    </div>
                                    <div id="responsive_collapseSevenLeftone" class="panel-collapse collapse in" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#responsive_accordion_wrapperLeft" href="#responsive_collapseSevenLeftThree" aria-expanded="false">
											Freebies (145)
										  </a>
                                        </h2>
                                    </div>
                                    <div id="responsive_collapseSevenLeftThree" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#responsive_accordion_wrapperLeft" href="#responsive_collapseSevenLeftFour" aria-expanded="false">
											Tool / Tips (21)
										  </a>
                                        </h2>
                                    </div>
                                    <div id="responsive_collapseSevenLeftFour" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#responsive_accordion_wrapperLeft" href="#responsive_collapseSevenLeftFive" aria-expanded="false">
											Background (541)
										  </a>
                                        </h2>
                                    </div>
                                    <div id="responsive_collapseSevenLeftFive" class="panel-collapse collapse" aria-expanded="false" role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)</li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>
                                        </div>
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
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June 28, 2018-19</div>
                                </div>
                            </div>
                            <div class="blog_wrapper2">
                                <div class="blog_image">
                                    <img src="images/blog/blog-10/blog_img2.jpg" class="img-responsive" alt="blog_img2" />
                                </div>
                                <div class="blog_text">
                                    <h5><a href="#">Lorem ipsum <br> dolor sit elit</a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June 28, 2018-19</div>
                                </div>
                            </div>
                            <div class="blog_wrapper3">
                                <div class="blog_image">
                                    <img src="images/blog/blog-10/blog_img3.jpg" class="img-responsive" alt="blog_img3" />
                                </div>
                                <div class="blog_text">
                                  <h5><a href="#">Donec id elit <br>gravida aeget </a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June 28, 2018-19</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <div class="video_wrapper">
                            <img src="images/blog/blog-2/video_img.jpg" alt="blog_img1" />
                            <a href="https://www.youtube.com/watch?v=b9krhARsAHU" class="play-trigger"><span><i class="fa fa-play"></i></span></a>
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
                    <div class="sidebar_widget">
                        <h4>Text Widget</h4>
                        <div class="text_widget_content">
                            <p>
                                Sollicitudin, lorem quis bibe u auctor, nisi elit couat ipsu, nec sagittis sem ni id elit. Duis sed odio sit amet.
                            </p>
                            <p>
                                Nibh vulpute cursus. Proin gravida nibh vel velit tor aliquet.
                            </p>
                            <a href="http://www.webstrot.com/">
								http://www.webstrot.com/
							</a>
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Instagram</h4>
                        <ul class="instagram_images">
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery1.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery2.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery3.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery4.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery5.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="instagram_wrapper">
                                    <div class="instagram_img_wrapper">
                                        <img src="images/blog/blog-2/gallery6.jpg" class="img-responsive" alt="gallery_img" />
                                        <div class="instagram_img_overlay">
                                            <div class="instagram_img_overlay_icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar_widget">
                        <h4>Archives</h4>
                        <div class="archives_wrapper">
                            <ul>
                                <li>
                                    <a href="#">
										<i class="fa fa-caret-right" aria-hidden="true"></i> January 2016
									</a>
                                </li>
                                <li>
                                    <a href="#">
										<i class="fa fa-caret-right" aria-hidden="true"></i> February 2016
									</a>
                                </li>
                                <li>
                                    <a href="#">
										<i class="fa fa-caret-right" aria-hidden="true"></i> March 2016
									</a>
                                </li>
                                <li>
                                    <a href="#">
										<i class="fa fa-caret-right" aria-hidden="true"></i> April 2016
									</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <div class="twitter_wrapper">
                            <div class="twitter_icon_wrapper">
                                <div class="twitter_icon_image">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <div class="twitter_icon_content">
                                    <a>@akshayhandge</a>
                                </div>
                            </div>
                            <p>
                                http://goo.gl/kaKnUP Click Here, One More PSD Approval on Theme Forest #envato #PSD #theme #webstrot
                            </p>
                            <p>
                                - 4 Hours ago
                            </p>
                            <ul>
                                <li>
                                    <a class="likes" href="#"><i class="fa fa-heart-o"></i> 152</a>
                                </li>
                                <li>
                                    <a class="comments" href="#"><i class="fa fa-comment-o"></i> 25</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- blog_section start -->
@endsection

@section('scripts')
@endsection
