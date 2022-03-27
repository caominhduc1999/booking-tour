@extends('client.layouts.master')
@section('stylesheets')
        <!-- Style Css -->
        <link href="{{ asset('assets/client/css/blog_single_3.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
                <h1>Blog Categories</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                <div class="sub_title_section">
                    <ul class="sub_title">
                        <li> <a href="#"> Home </a> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                        <li> Blog <i class="fa fa-angle-right" aria-hidden="true"> </i> </li>
                        <li> Blog Categories</li>
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
                            <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg" class="img-responsive " alt="Image">
                        </div>
                        <!-- /.post-thumbnail -->

                        <div class="blog-content">
                            <header class="entry-header">
                                <h4 class="entry-title"><a href="#">Blog Image Post Simple blog post format..!! </a></h4>
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
                                <p>Estibulum vitae fringilla in, rhoncus luctus ante. Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla, ut ttis augue finibus ac. Vivamus elementum enim ac enim ultrices rhoncus. Duis et nibh blat, eifend liberost amet, suscipit enim. Sed rutrum posuere orci.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus auctor lacinia pellentesque. Vivamus et tellus in urna us porttitor. Sed auctor ut nunc in pulvinar. Fusce lacinia, velit vitae pharetra porttitor, nunc libero sollicitudin odio, quis iaculis tortor ligula feugiat ex. Nam ut cursus mi. Nullam eu erat in justo euismod ultrices ut id enim. Morbi non tempor ante, eget molestie mauris. Cras gravida, lacus nec sollicitn euismod, ipsum nisl tempor leo, in volutpat sapien ex ac erat. In sit amet dolor ut erat fermentum tincidut. Maecenas sd pque ex.</p>
                            </div>
                            <!-- /.entry-content -->

                        </div>
                        <!-- /.blog-content -->
                        <div class="row">
                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                <div class="post-thumbnail">
                                    <img src="images/blog/blog-single-3/blog-single-2.jpg" alt="Image">
                                </div>
                                <!-- /.post-thumbnail -->
                            </div>
                            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                <div class="blog-content">
                                    <div class="entry-content">
                                        <p>Duis et nibh blat, eifend liberost amet, suscipit enim. Sed rutrum suere orci. Lorem ipsum dolor sitt amet.  This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliqet. Aenean sollicitudin, lorem quis bibendum. This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin. This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </p>
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <a href="#">
                                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <a href="#">
                                                            Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet.
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <a href="#">
                                                            Sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet.
                                                        </a>
                                                    </li>
                                                </ul>
                                        </div>
                                        <!-- /.entry-content -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                    <div class="blog-content">
                                        <div class="entry-content">
                                            <p>Duis et nibh blat, eifend liberost amet, suscipit enim. Sed rutrum suere orci. Lorem ipsum dolor sitt amet.  This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliqet. Aenean sollicitudin, lorem quis bibendum. This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin. This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </p>
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <a href="#">
                                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <a href="#">
                                                            Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet.
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                        <a href="#">
                                                            Sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet.
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.entry-content -->
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                        <div class="post-thumbnail">
                                            <img src="images/blog/blog-single-3/blog-single-3.jpg" alt="Image">
                                        </div>
                                        <!-- /.post-thumbnail -->
                                    </div>
                                </div>
                            </article>
                        </div>
                
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="blog_post_bottom_wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                            <div class="tags">
                                <i class="fa fa-tags" aria-hidden="true"></i> 
                                Tags:
                                <a href="#">Business ,</a>
                                <a href="#">Corporate ,</a>
                                <a href="#">Services</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
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
                
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="comments_wrapper">
                        <h4>Comments (04)</h4>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="comments_Box">
                                    <div class="img_wrapper">
                                        <img src="images/blog/blog-single-3/author1.jpg" class="" alt="author_img" />
                                    </div>
                                    <div class="text_wrapper">
                                        <div class="author_detail"> 
                                            <span class="author_name"> Jhon Doe <i class="fa fa-circle"></i> </span>
                                            <span class="publish_date"> July 1, 2018 - <a href="#">Reply</a> </span>
                                        </div>
                                        <div class="author_content">
                                            <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla, ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices rhoncus. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="comments_Box">
                                    <div class="row">
                                        <div class="col-lg-11 col-md-12 col-xs-12 col-sm-12 col-lg-offset-1">
                                            <div class="img_wrapper">
                                                <img src="images/blog/blog-single-3/author2.jpg" class="" alt="author_img" />
                                            </div>
                                            <div class="text_wrapper">
                                                <div class="author_detail">
                                                    <span class="author_name"> Eva Marilla <i class="fa fa-circle"></i> </span>
                                                    <span class="publish_date"> July 1, 2018 - <a href="#">Reply</a> </span>
                                                </div>
                                                <div class="author_content">
                                                    <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla, ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices rhoncus. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="comments_Box">
                                    <div class="img_wrapper">
                                        <img src="images/blog/blog-single-3/author3.jpg" class="" alt="author_img" />
                                    </div>
                                    <div class="text_wrapper">
                                        <div class="author_detail">
                                            <span class="author_name"> Steffa Ferello <i class="fa fa-circle"></i> </span>
                                            <span class="publish_date"> July 1, 2018 - <a href="#">Reply</a> </span>
                                        </div>
                                        <div class="author_content">
                                            <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla, ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices rhoncus. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="comments_Box last_comment_box">
                                    <div class="img_wrapper">
                                        <img src="images/blog/blog-single-3/author4.jpg" class="" alt="author_img" />
                                    </div>
                                    <div class="text_wrapper">
                                        <div class="author_detail">
                                            <span class="author_name"> Matin Lauran <i class="fa fa-circle"></i></span>
                                                
                                            <span class="publish_date"> July 1, 2018 - <a href="#">Reply</a> </span>
                                        </div>
                                        <div class="author_content">
                                            <p>Integer porttitor fringilla vestibulum. Phasellus curs our tinnt nulla, ut mattis augue finibus ac. Vivamus elementum enim ac enim ultrices rhoncus. </p>
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
                                        <input type="text" class="form-control" required="" id="namTen-first" placeholder="Full Name *">
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <div class="formsix-e">
                                    <div class="form-group i-email">
                                        <label class="sr-only">Email</label>
                                        <input type="email" class="form-control" required="" id="email" placeholder="Email Address *">
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
        <!-- blog_section start -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/client/js/blog.js') }}"></script>
@endsection