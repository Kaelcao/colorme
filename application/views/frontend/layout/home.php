<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?php echo CM_BASE_URL; ?>"/>

    <title>Color ME - Design School</title>


    <!-- Bootstrap Core CSS -->
    <link href="public/template/frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Hover Effects CSS -->
    <link href="public/template/frontend/css/hover.css" rel="stylesheet" media="all">

    <!-- All Page CSS -->
    <link href="public/template/frontend/css/colorme.css" rel="stylesheet">

    <link href="public/template/frontend/css/<?php echo $page; ?>.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="public/template/frontend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <div class="container slide-logo">
        <div class="row ">
            <div class="col-xs-offset-1 col-xs-2 nav-logo-container">
                <a class="hvr-float" href="home.html"><img src="public/template/frontend/images/Slide%20logo.jpg"
                                                           class="slide-logo-img"/></a>
            </div>

            <div class="col-xs-3 col-xs-push-2">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
            </div>


            <div class="col-xs-2 social-group-btn col-xs-push-3">
                <a class="hvr-bounce-in" href="www.facebook.com">
                    <div class="btn-facebook"></div>
                </a>
                <a class="hvr-bounce-in" href="www.instagram.com">
                    <div class="btn-instagram"></div>
                </a>
                <a class="hvr-bounce-in" href="www.facebook.com">
                    <div class="btn-youtube"></div>
                </a>
                <a class="hvr-bounce-in" href="www.facebook.com">
                    <div class="btn-pinterest"></div>
                </a>

            </div>

        </div>
    </div>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill"
                 style="background-image:url('public/template/frontend/images/photo-1420310414923-bf3651a89816.jpg');"></div>

        </div>
        <div class="item">
            <div class="fill"
                 style="background-image:url('public/template/frontend/images/photo-1444201716572-c60ec66d0494.jpg');"></div>

        </div>
        <div class="item">
            <div class="fill"
                 style="background-image:url('public/template/frontend/images/photo-1429051781835-9f2c0a9df6e4.jpg');"></div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>

    <!--<div class="container btn-bottom-slide">-->
    <!--<div class="col-sm-2 col-sm-offset-5 col-xs-4 col-xs-offset-4">-->
    <!--<a id="down" href="#main-nav">-->
    <!--<div class="hvr-bounce-in btn-explore">-->
    <!--Explore now-->
    <!--</div>-->

    <!--</a>-->

    <!--</div>-->
    <!--</div>-->


</header>

<!-- Navigation -->
<nav class="navbar navbar-default" id="menu" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse index-nav-bar" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav " id="main-nav">
                <li class="selected">
                    <a class="hvr-underline-from-left" href="about.html">HOME</a>
                </li>
                <li>
                    <a class="hvr-underline-from-left" href="courses.html">COURSES</a>
                </li>
                <li>
                    <a class="hvr-underline-from-left" href="services.html">SERVICES</a>
                </li>
                <li>
                    <a class="hvr-underline-from-left" href="#">GALLERY</a>
                </li>
                <li>
                    <a class="hvr-underline-from-left" href="#">BLOG</a>
                </li>
                <li>
                    <a class="hvr-underline-from-left" href="#">EVENTS</a>
                </li>
                <li>
                    <a class="hvr-underline-from-left" href="#">CONTACT</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container" id="main-content">

    <?php $this->load->view($template, isset($data) ? $data : NULL); ?>

</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-4">
                <h4>/Information</h4>
                <ul class="information">
                    <li>091 234 5678</li>
                    <li>www.facebook.com/colorme</li>
                    <li>colorme@gmail.com</li>
                    <li>175 Chùa Láng, Cầu Giấy, Hà Nội</li>
                    <li>www.colorme.com</li>
                </ul>

            </div>
            <div class="col-sm-5 col-md-5">
                <h4>/Map</h4>
                <iframe class="map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d553.6114280949337!2d105.80085653161902!3d21.02312404019547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab5cc792b30f%3A0x5ca31a925007ef7c!2zMTc1IENow7lhIEzDoW5nLCBMw6FuZyBUaMaw4bujbmcsIMSQ4buRbmcgxJBhLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1446377408986"
                        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>

            <div class="col-sm-2 col-md-3">
                <h4>/Follow Us</h4>
                <ul class="footer-social-icons">
                    <li><a class="hvr-float" href="www.facebook.com">
                            <div></div>
                        </a></li>
                    <li><a class="hvr-float" href="">
                            <div></div>
                        </a></li>
                    <li><a class="hvr-float" href="">
                            <div></div>
                        </a></li>
                    <li><a class="hvr-float" href="">
                            <div></div>
                        </a></li>
                </ul>

            </div>
            <div class="col-xs-12">
                <p class="copyright">&copy; 2015 www.colorme.com.All Right Reserved.

                <p>
            </div>
        </div>
    </div>

</footer>


<!-- /.container -->

<!-- jQuery -->
<script src="public/template/frontend/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="public/template/frontend/js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script src="public/template/frontend/js/colorme.js">

</script>

</body>

</html>
