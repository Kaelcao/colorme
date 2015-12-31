<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nhanh tay đăng kí để nhận những ưu đãi tốt nhất từ colorME">
    <meta name="author" content="">
    <base href="<?php echo CM_BASE_URL; ?>"/>

    <title>Học thiết kế với colorME</title>


    <!-- Bootstrap Core CSS -->
    <link href="public/template/frontend/css/bootstrap.min.css" rel="stylesheet">


    <!-- Hover Effects CSS -->
    <link href="public/template/frontend/css/hover.css" rel="stylesheet" media="all">

    <!-- All Page CSS -->
    <link href="public/template/frontend/css/colorme.css" rel="stylesheet">

    <link href="public/template/frontend/css/index.css" rel="stylesheet">
    <link href="public/template/frontend/css/regis.css" rel="stylesheet">
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
                <a class="hvr-float" href="<?php echo base_url('frontend/students/choose_course/') ?>"><img
                        src="public/template/frontend/images/Slide%20logo.jpg"
                        class="slide-logo-img"/></a>
            </div>

            <div class="col-xs-4 col-xs-push-1">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
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


<!-- Page Content -->

<?php
if (isset($confirm)) {
    ?>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="alert alert-success text-center"><?php echo $confirm; ?></div>
        </div>
    </div>
    <?php
}
?>
<div class="container" id="main-content">
    <div class="row">

        <div class="col-xs-offset-2 col-xs-8">
            <h1 class="page-header row-title">
                CHỌN KHÓA HỌC
                <img class="title-separator" src="public/template/frontend/images/title-separator.png"/>

                <p class="row-description">Chọn khóa học mà bạn muốn đăng kí.</p>
            </h1>
        </div>
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <div class="list-group">
                <?php
                foreach ($courses as $course) {
                    if ($course->inRegister == 1) {
                        ?>
                        <a href="<?php echo base_url('frontend/students/regis/' . $course->id) ?>"
                           class="list-group-item" style="overflow: hidden">
                            <h3 class="list-group-item-heading"><?php echo $course->name; ?></h3>
                            <p class="list-group-item-text">
                                <?php echo $course->description; ?>
                            </p>
                            <div style="float:right">
                                <i class="fa fa-money"></i>
                                <strong><?php echo format_currency($course->price); ?></strong>
                            </div>
                            <div>
                                <i class="fa fa-clock-o"></i>
                                <strong><?php echo $course->duration; ?> buổi</strong>
                            </div>

                        </a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>


    </div>
</div>


</div>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-4">
                <h4>/Information</h4>
                <ul class="information">
                    <li>0163 580 1118</li>
                    <li>www.facebook.com/colorme.hanoi</li>
                    <li>colorme.idea@gmail.com</li>
                    <li>175 Chùa Láng, Cầu Giấy, Hà Nội</li>
                    <li>www.colorme.vn</li>
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
                    <li><a class="hvr-float" href="https://www.facebook.com/ColorME.Hanoi">
                            <div></div>
                        </a></li>
                    <li><a class="hvr-float" href="https://www.instagram.com/colormehanoi">
                            <div></div>
                        </a></li>
                    <li><a class="hvr-float" href="https://www.youtube.com/channel/UCfdIZQjVEgvN6l18Vtda22A">
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
<script>
    $('.list-group-item').click(function (e) {
        e.preventDefault();//in this way you have no redirect
        var url = $(this).attr('href');
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("main-content").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();

    });

</script>

}
<?php
if (isset($confirm) && !empty($confirm)) {
    echo '
            <script>var form = document.getElementById("regis-form");
                var elements = form.elements;
                for (var i = 0, len = elements.length; i < len; ++i) {
                    elements[i].readOnly = true;
                    elements[i].disabled = true;
                }
            </script>';
}

?>


</body>

</html>
