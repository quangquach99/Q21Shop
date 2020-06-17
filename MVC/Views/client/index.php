<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Q21Shop</title>
    <meta name="csrf-token" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Animate.css -->
    <link rel="stylesheet" href="./public/client/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="./public/client/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="./public/client/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="./public/client/css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="./public/client/css/flexslider.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="./public/client/css/style.css">
    <link rel="stylesheet" href="./public/client/css/custome.css">

    <style>
        #colorlib-logo a {
            font-size: 30px;
            font-weight: bold;
            color: blue;
        }
    </style>

</head>

<body>
    <!--header -->
    <div class="colorlib-loader"></div>
    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-2">
                            <div id="colorlib-logo"><a href="index.html">Q21Shop</a></div>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <li class="active"><a href="index.html">Home</a></li>
                                <li class="has-dropdown">
                                    <a href="/san-pham">Stores</a>
                                    <ul class="dropdown">
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Pay Now</a></li>

                                    </ul>
                                </li>
                                <li><a href="about.html">Introduction</a></li>
                                <li><a href="#colorlib-footer">Contact</a></li>
                                <li>
                                    <a href="/gio-hang">
                                        <i class="icon-shopping-cart"></i>
                                        Cart <span
                                            class="cart-quantity">1</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                    <li style="background-image: url(./public/img/bg-03.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <h1 class="head-1">Sale</h1>
                                            <h2 class="head-3">45%</h2>
                                            <p class="category"><span>Professional Designed Samples</span></p>
                                            <p><a href="#" class="btn btn-primary">Connect To Us</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(./public/img/bg-01.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <h1 class="head-1">Sale</h1>
                                            <h2 class="head-3">45%</h2>
                                            <p class="category"><span>Professional Designed Samples</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(./public/img/bg-02.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <h1 class="head-1">Sale</h1>
                                            <h2 class="head-3">45%</h2>
                                            <p><a href="#" class="btn btn-primary">Connect To Us</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- End header -->
        <!-- main -->
        <?php
            require_once './MVC/Views/client/' . $data['content'] . '.php';
        ?>
        <!-- end main -->

        <!-- subscribe -->
        <div id="colorlib-subscribe">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-6 text-center">
                            <h2><i class="icon-paperplane"></i>Subcribe To Get Notifications</h2>
                        </div>
                        <div class="col-md-6">
                            <form class="form-inline qbstp-header-subscribe">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email"
                                                placeholder="Email">
                                            <button type="submit" class="btn btn-primary">Subcribe</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end  subscribe -->
        <!-- footer -->
        <footer id="colorlib-footer" role="contentinfo">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-3 colorlib-widget">
                        <h4>About Q21Shop</h4>
                        <p>Q21Shop Is A Blah Blah Blah :))</p>
                        <p>
                            <ul class="colorlib-social-icons">

                                <li><a href="https://www.facebook.com/"><i class="icon-facebook"></i></a>
                                </li>

                                <li><a href="#"><i
                                            class="icon-youtube"></i></a></li>
                            </ul>
                        </p>
                    </div>
                    <div class="col-md-3 colorlib-widget">
                        <h4>Customer Services</h4>
                        <p>
                            <ul class="colorlib-footer-links">
                                <li><a href="#">Contect </a></li>
                                <li><a href="#">Delivery/ Return Products</a></li>
                                <li><a href="#">For Sale Code</a></li>
                                <li><a href="#">Highlighted Products</a></li>
                                <li><a href="#">Speciality</a></li>


                            </ul>
                        </p>
                    </div>
                    <div class="col-md-2 colorlib-widget">
                        <h4>Information</h4>
                        <p>
                            <ul class="colorlib-footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Security Policy</a></li>
                                <li><a href="#">Help</a></li>

                            </ul>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h4>Contact Information</h4>
                        <ul class="colorlib-footer-links">
                            <li>Ha Noi</li>
                            <li><a href="tel://1234567920">0355764662</a></li>
                            <li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                            <li><a href="#">http://localhost/Q21Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </footer>
        <!--end  footer -->
    </div>


    <!-- jQuery -->
    <script src="./public/client/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="./public/client/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="./public/client/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="./public/client/js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="./public/client/js/jquery.flexslider-min.js"></script>

    <script src="./public/client/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="./public/client/js/jquery.magnific-popup.min.js"></script>
    <script src="./public/client/js/magnific-popup-options.js"></script>

    <!-- Stellar Parallax -->
    <script src="./public/client/js/jquery.stellar.min.js"></script>
    <!-- Main -->
    <script src="./public/client/js/main.js"></script>
</body>

</html>