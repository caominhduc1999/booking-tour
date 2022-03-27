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
    <!-- Revolution slider Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/js/plugin/rs_slider/layers.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/js/plugin/rs_slider/navigation.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/js/plugin/rs_slider/settings.css') }}" />
    <!-- Owl Carousel -->
    <link href="{{ asset('assets/client/css/owl.theme.default.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/owl.carousel.css') }}" rel="stylesheet">
    <!-- Magnific Popup Css -->
    <link href="{{ asset('assets/client/css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Common Style CSS -->
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/homepage_style_2.css') }}" rel="stylesheet">
    @yield('stylesheets')
</head>

<body>
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>

    @include('client.layouts.header')
    @yield('content')
    @include('client.layouts.footer')
    <!-- copyright_wrapper end -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Bootstrap js -->
    <script src="{{ asset('assets/client/js/jquery.min.js') }}"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Revolution Slider js -->
    <script src="{{ asset('assets/client/js/plugin/rs_slider/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.addon.snow.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugin/rs_slider/revolution.extension.video.min.js') }}"></script>

    <!-- Portfolio Filter js -->
    <script src="{{ asset('assets/client/js/jquery.shuffle.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.inview.min.js') }}"></script>
    <!-- Counter Pie Chart js -->
    <script src="{{ asset('assets/client/js/jquery.easypiechart.min.js') }}"></script>
    <!-- Magnific Popup js -->
    <script src="{{ asset('assets/client/js/jquery.magnific-popup.js') }}"></script>
    <!-- Owl Carousel js -->
    <script src="{{ asset('assets/client/js/owl.carousel.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/client/js/wow.js') }}"></script>
    <!-- portfolio filter js -->
    <script src="{{ asset('assets/client/js/portfolio.js') }}"></script>
    <!-- homepage js -->
    <script src="{{ asset('assets/client/js/homepage.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('assets/client/js/custom.js') }}"></script>
    @yield('scripts')
    <!-- slider custom js Start -->
    <script>
        var tpj = jQuery;

        var revapi1052;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_1052_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1052_1");
            } else {
                revapi1052 = tpj("#rev_slider_1052_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "revolution/js/",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "on",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 50,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "uranus",
                            enable: true,
                            hide_onmobile: true,
                            hide_onleave: true,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 10
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 10
                            }
                        },
                        bullets: {
                            enable: false,
                            hide_onmobile: false,
                            hide_under: 1024,
                            style: "hephaistos",
                            hide_onleave: false,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 40,
                            space: 10,
                            tmp: ''
                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1400, 1240, 778, 480],
                    gridheight: [868, 768, 960, 720],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "on",
                    stopAfterLoops: 0,
                    stopAtSlide: 1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }); /*ready*/
    </script>
    <!-- slider custom js End -->

</body>

</html>
