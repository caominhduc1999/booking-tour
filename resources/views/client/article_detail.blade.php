@extends('client.layouts.master')
@section('stylesheets')
    <!-- Style Css -->
    <link href="{{ asset('assets/client/css/blog_single_1.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- blog_section start -->
    <div class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
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
                                            <a class="collapsed" data-toggle="collapse"
                                                data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftTwo"
                                                aria-expanded="false">
                                                Web Template (214)
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftTwo" class="panel-collapse collapse" aria-expanded="false"
                                        role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Screen Kit (20)
                                                </li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)
                                                </li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion_wrapperLeft"
                                                href="#collapseSevenLeftone" aria-expanded="false">
                                                PSD Mockup

                                            </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftone" class="panel-collapse collapse in" aria-expanded="false"
                                        role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)
                                                </li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse"
                                                data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftThree"
                                                aria-expanded="false">
                                                Freebies (145)
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftThree" class="panel-collapse collapse" aria-expanded="false"
                                        role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)
                                                </li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse"
                                                data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftFour"
                                                aria-expanded="false">
                                                Tool / Tips (21)
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftFour" class="panel-collapse collapse" aria-expanded="false"
                                        role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)
                                                </li>
                                                <li><i class="fa fa-angle-right"></i> UI kit (10)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse"
                                                data-parent="#accordion_wrapperLeft" href="#collapseSevenLeftFive"
                                                aria-expanded="false">
                                                Background (541)
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="collapseSevenLeftFive" class="panel-collapse collapse" aria-expanded="false"
                                        role="tablist">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fa fa-angle-right"></i> Screen Kit (20)</li>
                                                <li>
                                                    <i class="fa fa-angle-right"></i> Mobile Kit (45)
                                                </li>
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
                                    <img src="images/blog/blog-1/blog_img1.jpg" class="img-responsive" alt="blog_img1" />
                                </div>
                                <div class="blog_text">
                                    <h5><a href="#">Lorem ipsum <br> dolor sit elit</a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June
                                        28, 2018</div>
                                </div>
                            </div>
                            <div class="blog_wrapper2">
                                <div class="blog_image">
                                    <img src="images/blog/blog-1/blog_img2.jpg" class="img-responsive" alt="blog_img2" />
                                </div>
                                <div class="blog_text">
                                    <h5><a href="#">Familiar idea<br> with Clients</a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June
                                        28, 2018</div>
                                </div>
                            </div>
                            <div class="blog_wrapper3">
                                <div class="blog_image">
                                    <img src="images/blog/blog-1/blog_img3.jpg" class="img-responsive" alt="blog_img3" />
                                </div>
                                <div class="blog_text">
                                    <h5><a href="#">Donec id elit <br>gravida aeget </a></h5>
                                    <div class="blog_date"><i class="fa fa-calendar-o" aria-hidden="true"></i>June
                                        28, 2018</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar_widget">
                        <div class="video_wrapper">
                            <img src="images/blog/blog-1/video_img.jpg" alt="blog_img1" />
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
                    <div class="sidebar_widget">
                        <h4>Text Widget</h4>
                        <div class="text_widget_content">
                            <p>
                                Sollicitudin, lorem quis bibe u auctor, nisi elit couat ipsu, nec sagittis sem ni id elit.
                                Duis sed odio sit amet.
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
                                        <img src="images/blog/blog-1/gallery1.jpg" class="img-responsive"
                                            alt="gallery_img" />
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
                                        <img src="images/blog/blog-1/gallery2.jpg" class="img-responsive"
                                            alt="gallery_img" />
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
                                        <img src="images/blog/blog-1/gallery3.jpg" class="img-responsive"
                                            alt="gallery_img" />
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
                                        <img src="images/blog/blog-1/gallery4.jpg" class="img-responsive"
                                            alt="gallery_img" />
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
                                        <img src="images/blog/blog-1/gallery5.jpg" class="img-responsive"
                                            alt="gallery_img" />
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
                                        <img src="images/blog/blog-1/gallery6.jpg" class="img-responsive"
                                            alt="gallery_img" />
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
                                http://goo.gl/kaKnUP Click Here, One More PSD Approval on Theme Forest #envato #PSD #theme
                                #webstrot
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
                    <article class="blog-post-wrapper clearfix">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="post-thumbnail">
                                    <img src="images/blog/blog-single-1/blog-single-1.jpg" class="img-responsive "
                                        alt="Image">
                                </div>
                                <!-- /.post-thumbnail -->

                                <div class="blog-content">
                                    <header class="entry-header">
                                        <h4 class="entry-title"><a href="#">Blog Image Post Simple blog post format..!!
                                            </a></h4>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><span class="author">By <a href="#">Admin</a></span>
                                                </li>
                                                <li><span class="posted-date"><a href="#">12 Nov, 2018</a></span>
                                                </li>
                                                <li><span class="posted-in">In <a href="#">Web Design</a></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.entry-meta -->
                                    </header>
                                    <!-- /.entry-header -->

                                    <div class="entry-content">
                                        <p>Estibulum vitae fringilla in, rhoncus luctus ante. Integer porttitor fringilla
                                            vestibulum. Phasellus curs our tinnt nulla, ut ttis augue finibus ac. Vivamus
                                            elementum enim ac enim ultrices rhoncus. Duis et nibh blat, eifend liberost
                                            amet, suscipit enim. Sed rutrum posuere orci.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus auctor lacinia
                                            pellentesque. Vivamus et tellus in urna us porttitor. Sed auctor ut nunc in
                                            pulvinar. Fusce lacinia, velit vitae pharetra porttitor, nunc libero
                                            sollicitudin odio, quis iaculis tortor ligula feugiat ex. Nam ut cursus mi.
                                            Nullam eu erat in justo euismod ultrices ut id enim. Morbi non tempor ante, eget
                                            molestie mauris. Cras gravida, lacus nec sollicitn euismod, ipsum nisl tempor
                                            leo, in volutpat sapien ex ac erat. In sit amet dolor ut erat fermentum
                                            tincidut. Maecenas sd pque ex.</p>
                                    </div>
                                    <!-- /.entry-content -->

                                </div>
                                <!-- /.blog-content -->
                            </div>

                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                        <div class="post-thumbnail">
                                            <img src="images/blog/blog-single-1/blog-single-2.jpg" alt="Image">
                                        </div>
                                        <!-- /.post-thumbnail -->
                                    </div>
                                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                        <div class="blog-content">
                                            <div class="entry-content">
                                                <p>Duis et nibh blat, eifend liberost amet, suscipit enim. Sed rutrum suere
                                                    orci. Lorem ipsum dolor sitt amet. This is Photoshop's version of Lorem
                                                    Ipsum. Proin gravida nibh vel velit auctor aliqet. Aenean sollicitudin,
                                                    lorem quis bibendum.</p>
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <a href="#">
                                                            Sollicitudin, lorem quis bibendum auctor, nisi elit consequat
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <a href="#">
                                                            Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <a href="#">
                                                            Duis sed odio sit amet nibh vulputate cursus a sit mauris.
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.entry-content -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                <div class="blog-content">
                                    <div class="entry-content">
                                        <p>Duis et nibh blat, eifend liberost amet, suscipit enim. Sed rutrum suere orci.
                                            Lorem ipsum dolor sitt amet. This is Photoshop's version of Lorem Ipsum. Proin
                                            gravida nibh vel velit auctor aliqet. Aenean sollicitudin, lorem quis bibendum.
                                        </p>
                                        <ul>
                                            <li>
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                <a href="#">
                                                    Sollicitudin, lorem quis bibendum auctor, nisi elit consequat
                                                </a>
                                            </li>
                                            <li>
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                <a href="#">
                                                    Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin
                                                </a>
                                            </li>
                                            <li>
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                <a href="#">
                                                    Duis sed odio sit amet nibh vulputate cursus a sit mauris.
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.entry-content -->
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                <div class="post-thumbnail">
                                    <img src="images/blog/blog-single-1/blog-single-3.jpg" alt="Image">
                                </div>
                                <!-- /.post-thumbnail -->
                            </div>



                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="blog-content">
                                    <div class="entry-content">
                                        <p>Estibulum vitae fringilla in, rhoncus luctus ante. Integer porttitor fringilla
                                            vestibulum. Phasellus curs our tinnt nulla, ut ttis augue finibus ac. Vivamus
                                            elementum enim ac enim ultrices rhoncus. Duis et nibh blat, eifend liberost
                                            amet, suscipit enim. Sed rutrum posuere orci.
                                        <p>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus auctor lacinia
                                            pellentesque. Vivamus et tellus in urna us porttitor. Sed auctor ut nunc in
                                            pulvinar. Fusce lacinia, velit vitae pharetra porttitor, nunc libero
                                            sollicitudin odio, quis iaculis tortor ligula feugiat ex. Nam ut cursus mi.
                                            Nullam eu erat in justo euismod ultrices ut id enim. Morbi non tempor ante, eget
                                            molestie mauris. Cras gravida, lacus nec sollicitn euismod, ipsum nisl tempor
                                            leo, in volutpat sapien ex ac erat. In sit amet dolor ut erat fermentum
                                            tincidut. Maecenas sd pque ex.</p>
                                    </div>
                                </div>
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
                                        <a href="#">Business ,</a>
                                        <a href="#">Corporate ,</a>
                                        <a href="#">Services</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
                                    <div class="share_icons">
                                        Share:
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <!-- blog_pagination_section start -->
                        <div class="blog_pagination_section">
                            <ul>
                                <li>
                                    <a href="#" class="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        Prev </a>
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
                                <li><a href="#" class="next"> Next <i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- blog_pagination_section end -->
                    </div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="comments_wrapper">
                            <h4>Comments (04)</h4>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div class="comments_Box">
                                        <div class="img_wrapper">
                                            <img src="images/blog/blog-single-1/author1.jpg" class=""
                                                alt="author_img" />
                                        </div>
                                        <div class="text_wrapper">
                                            <div class="author_detail">
                                                <span class="author_name"> Jhon Doe <i class="fa fa-circle"></i>
                                                </span>
                                                <span class="publish_date"> April 1, 2018 - <a href="#">Reply</a> </span>
                                            </div>
                                            <div class="author_content">
                                                <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla,
                                                    ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices
                                                    rhoncus. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div class="comments_Box">
                                        <div class="row">
                                            <div class="col-lg-11 col-md-12 col-xs-12 col-sm-12 col-lg-offset-1">
                                                <div class="img_wrapper">
                                                    <img src="images/blog/blog-single-1/author2.jpg" class=""
                                                        alt="author_img" />
                                                </div>
                                                <div class="text_wrapper">
                                                    <div class="author_detail">
                                                        <span class="author_name"> Steffa Ferello <i
                                                                class="fa fa-circle"></i> </span>
                                                        <span class="publish_date"> July 1, 2018 - <a href="#">Reply</a>
                                                        </span>
                                                    </div>
                                                    <div class="author_content">
                                                        <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt
                                                            nulla, ut mattis augue finibus ac. Vivamus elementum enim ac
                                                            enim ultrices rhoncus. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div class="comments_Box">
                                        <div class="img_wrapper">
                                            <img src="images/blog/blog-single-1/author3.jpg" class=""
                                                alt="author_img" />
                                        </div>
                                        <div class="text_wrapper">
                                            <div class="author_detail">
                                                <span class="author_name">Matin Lauran <i class="fa fa-circle"></i>
                                                </span>
                                                <span class="publish_date"> July 3, 2018 - <a href="#">Reply</a> </span>
                                            </div>
                                            <div class="author_content">
                                                <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla,
                                                    ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices
                                                    rhoncus. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div class="comments_Box last_comment_box">
                                        <div class="img_wrapper">
                                            <img src="images/blog/blog-single-1/author4.jpg" class=""
                                                alt="author_img" />
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
                            <h4>Leave A Comment</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="formsix-pos">
                                        <div class="form-group i-name">
                                            <label class="sr-only">Name</label>
                                            <input type="text" class="form-control" required="" id="namTen-first"
                                                placeholder="Full Name *">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="formsix-e">
                                        <div class="form-group i-email">
                                            <label class="sr-only">Email</label>
                                            <input type="email" class="form-control" required="" id="emailTen"
                                                placeholder="Email Address *">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->
                                <div class="col-md-12">
                                    <div class="formsix-m">
                                        <div class="form-group i-message">
                                            <label class="sr-only">Message</label>
                                            <textarea class="form-control" required="" rows="7" id="messageTen" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row-->
                            <button type="submit" class="btn btn-primary btn-block">Send Now</button>
                        </div>
                        <!-- /.comments_form-->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- blog_section end -->
@endsection

@section('scripts')
@endsection
