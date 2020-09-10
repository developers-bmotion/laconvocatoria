<html class="no-js" lang="{{ session("applocale") }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> {{config('app.name')}} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CPoppins:200,400,500,600,700%7CPlayfair+Display:400,700i"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon.ico">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- Icon foont list -->
    <link rel="stylesheet" href="/frontend/css/iconfont.css">
    <link rel="stylesheet" href="/frontend/css/font-awesome.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
    <!-- isotope -->
    <link rel="stylesheet" href="/frontend/css/isotope.css">
    <!-- magnific -->
    <link rel="stylesheet" href="/frontend/css/magnific-popup.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/css/owl.theme.default.min.css">
    <!-- woocommerce -->
    <link rel="stylesheet" href="/frontend/css/woocommerce.css">


    <!--For Plugins external css-->
    <link rel="stylesheet" href="/frontend/css/plugins.css"/>

    <!--Theme custom css -->
    <link rel="stylesheet" href="/frontend/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="/frontend/css/responsive.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>

    <script src="/frontend/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <link rel="stylesheet" href="/css/ajax.css"/>
    <link rel="stylesheet" href="/frontend/css/card.css">
    @stack('css')
</head>
<body class="woocommerce">
<!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div id="preloader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div><!-- #preloader -->

<main class="xs-all-content-wrapper">
    <div class="container">
        <div class="row justify-content-center p-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('olvido_contraseña') }}</div>

                    <div class="card-body">
                        <form style="display: block" method="POST" id="frmLogin" action="{{ route('password.update') }}"
                              aria-label="{{ __('Login') }} ">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="xs-input-group-v2">
                                <i class="icon icon-profile-male"></i>
                                <input type="email" name="email" id="xs_user_login_name"
                                       class="xs-input-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('PlaceHolder_email') }}" value="{{ $email ?? old('email') }}"
                                       required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback mesajesError d-block" role="alert">
                                        <strong id="error-email">{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                        </span>
                            <div class="xs-input-group-v2">
                                <i class="icon icon-key2"></i>
                                <input type="password" name="password" id="password"
                                       class="xs-input-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('PlaceHolder_password') }}" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback mesajesError d-block" role="alert">
                                        <strong id="error-password">{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                                <div class="xs-input-group-v2">
                                <i class="icon icon-key2"></i>
                                <input type="password" name="password_confirmation" id="password-confirm"
                                       class="xs-input-control" placeholder="{{ __('PlaceHolder_password_confirmation') }}" required>
                            </div>
                            <span class="invalid-feedback mesajesError d-block" role="alert">
                            <strong id="error-password"></strong>
                        </span>
                            <div class="xs-submit-wraper xs-mb-20">
                                <input type="submit" name="submit" value="{{ __('olvido_contraseña') }}"
                                       id="xs_contact_get_action" class="btn btn-warning btn-block">
                            </div>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<footer class="xs-footer-section xs-fixed-footer fundpress-footer-section">
    <div class="fundpress-footer-top-layer">
        <div class="container">
            <div class="row">
                {{--<div class="col-md-5">
                    <div class="fundpress-single-footer">
                        <div class="xs-footer-logo">
                            <a href="index.html">
                                <img src="/images/footer_logo.png" alt="">
                            </a>
                        </div>
                        <div class="fundpress-footer-content">
                            <p>FundPress online and raise money for charity and causes you’re passionate about. FundPress is an innovative, cost-effective online fundraising website for personal fundraising pages.</p>
                        </div><!-- . END -->
                        <ul class="xs-social-list fundpress-social-list">
                            <li><a href="" class="color-facebook full-round"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="" class="color-twitter full-round"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="" class="color-dribbble full-round"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="" class="color-pinterest full-round"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="" class="color-instagram full-round"><i class="fa fa-instagram"></i></a></li>
                        </ul><!-- .xs-social-list .fundpress-social-list END -->
                    </div><!-- .fundpress-single-footer END -->
                </div>
                <div class="col-md-3">
                    <div class="fundpress-single-footer">
                        <div class="xs-footer-title">
                            <h4 class="color-white">Explore Campaigns</h4>
                        </div><!-- .xs-footer-title END -->
                        <nav class="xs-footer-menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Gadgets</a></li>
                                <li><a href="#">Monuments</a></li>
                                <li><a href="#">Travels</a></li>
                                <li><a href="#">Accessoriers</a></li>
                                <li><a href="#">Books</a></li>
                                <li><a href="#">Community Programs</a></li>
                                <li><a href="#">Design</a></li>
                            </ul>
                        </nav><!-- .xs-footer-menu .xs-block-menu END -->
                    </div><!-- .fundpress-single-footer END -->
                </div>
                <div class="col-md-2">
                    <div class="fundpress-single-footer">
                        <div class="xs-footer-title">
                            <h4 class="color-white">About</h4>
                        </div><!-- .xs-footer-title END -->
                        <nav class="xs-footer-menu">
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">How It Works</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="news-feed.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav><!-- .xs-footer-menu .xs-block-menu END -->
                    </div><!-- .fundpress-single-footer END -->
                </div>
                <div class="col-md-2">
                    <div class="fundpress-single-footer">
                        <div class="xs-footer-title">
                            <h4 class="color-white">Help</h4>
                        </div><!-- .xs-footer-title END -->
                        <nav class="xs-footer-menu">
                            <ul>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="#">Our Rules</a></li>
                                <li><a href="#">Trust & Safety</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </nav><!-- .xs-footer-menu .xs-block-menu END -->
                    </div><!-- .fundpress-single-footer END -->
                </div>--}}
            </div>
        </div>
    </div><!-- .xs-footer-wraper .fundpress-footer-top-layer END -->
    <div class="xs-footer-bottom-layer fundpress-footer-bottom">
        <div class="container">
            <div class="xs-footer-bottom-wraper">
                <div class="xs-copyright-text fundpress-copyright-text">
                    <p><i class="fa fa-heart"></i> by <a href="https://xpeedstudio.com/">Apuesto por ti</a></p>
                </div>
                <div class="xs-back-to-top-wraper">
                    <a href="#" class="xs-back-to-top full-round green-btn xs-back-to-top-btn show-last-pos">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div><!-- .xs-back-to-top-wraper END -->
            </div>
        </div>
    </div><!-- .xs-footer-bottom-layer .fundpress-footer-bottom END -->
</footer>

<script>
    const lang = "{{ session("applocale") }}";
</script>
<script src="/frontend/js/jquery-3.2.1.min.js"></script>
<script src="/frontend/js/plugins.js"></script>
<script src="/frontend/js/Popper.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/isotope.pkgd.min.js"></script>
<script src="/frontend/js/jquery.easing.1.3.js"></script>
<script src="/frontend/js/jquery.countdown.min.js"></script>
<script src="/frontend/js/jquery.magnific-popup.min.js"></script>
<script src="/frontend/js/owl.carousel.min.js"></script>
<script src="/frontend/js/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCy7becgYuLwns3uumNm6WdBYkBpLfy44k"></script>
<script src="/frontend/js/jquery.easypiechart.min.js"></script>
<script src="/frontend/js/spectragram.min.js"></script>
<script src="/frontend/js/jquery.waypoints.min.js"></script>
<script src="/frontend/js/scrollax.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="/backend/vendors/block-ui/jquery.blockUI.js" type="text/javascript"></script>

<script src="/frontend/js/main.js"></script>

</body>
</html>
