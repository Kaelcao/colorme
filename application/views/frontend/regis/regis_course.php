<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Đăng kí khóa học thiết kế cơ bản tháng 12">
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
                <a class="hvr-float" href="<?php echo base_url('frontend/students/regis/'.$course['id'])?>"><img src="public/template/frontend/images/Slide%20logo.jpg"
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
<div class="container" id="main-content">

        <div class="col-xs-offset-2 col-xs-8">
            <h1 class="page-header row-title">
                ĐĂNG KÍ <?php echo $course['name'] ?>
                <img class="title-separator" src="public/template/frontend/images/title-separator.png"/>

                <p class="row-description"><?php echo $course['description'] ?></p>
            </h1>
        </div>
        <?php
        if (isset($confirm)) {
            echo "<div class='col-xs-12 alert alert-success'>$confirm</div>";
        }
        ?>
        <div class="col-xs-12">


            <form class="form-horizontal" role="form" id="regis-form" method="post">
                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('fullname'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label for="fullname" class="control-label">Họ và tên *</label>
                    <input type="text" value="<?php echo isset($fullname) ? $fullname : ""; ?>"
                           class="form-control has-error" id="fullname" name="fullname">
                    <?php if (!empty(form_error('fullname'))) {
                        echo '<div class="alert alert-danger error">' . form_error('fullname') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('gender'))) ? ' has-error' : 'has-success';
                }
                ?>">
                    <label class="control-label">Bạn là Adam hay Eva? *</label>


                    <div class="radio">
                        <label><input type="radio" <?php echo (isset($gender) && $gender == "Male") ? "checked" : ""; ?>
                                      name="gender" value="Male">Adam</label>
                    </div>
                    <div class="radio">
                        <label><input
                                type="radio" <?php echo (isset($gender) && $gender == "Female") ? "checked" : ""; ?>
                                name="gender" value="Female">Eva</label>
                    </div>
                    <?php if (!empty(form_error('gender'))) {
                        echo '<div class="alert alert-danger error">' . form_error('gender') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('dob'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Ngày Sinh</label>
                    <input value="<?php echo isset($dob) ? $dob : ""; ?>" type="date" class="form-control" id="dob"
                           name="dob">
                    <?php if (!empty(form_error('dob'))) {
                        echo '<div class="alert alert-danger error">' . form_error('dob') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('email'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Email của bạn? *</label>
                    <input type="email" class="form-control" value="<?php echo isset($email) ? $email : ""; ?>"
                           id="email" name="email">
                    <?php if (!empty(form_error('email'))) {
                        echo '<div class="alert alert-danger error">' . form_error('email') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('phone'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Số điện thoại *</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                           value="<?php echo isset($phone) ? $phone : ""; ?>">
                    <?php if (!empty(form_error('phone'))) {
                        echo '<div class="alert alert-danger error">' . form_error('phone') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('address'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Địa chỉ hiện tại *</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="<?php echo isset($address) ? $address : ""; ?>">
                    <?php if (!empty(form_error('address'))) {
                        echo '<div class="alert alert-danger error">' . form_error('address') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('position'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Bạn đang là? *</label>

                    <div class="radio">
                        <label><input
                                type="radio" <?php echo (isset($position) && $position == "Sinh Viên") ? "checked" : ""; ?>
                                name="position" value="Sinh Viên">Sinh Viên</label>
                    </div>
                    <div class="radio">
                        <label><input
                                type="radio" <?php echo (isset($position) && $position == "Học Sinh") ? "checked" : ""; ?>
                                name="position" value="Học Sinh">Học Sinh</label>
                    </div>
                    <div class="radio">
                        <label><input
                                type="radio" <?php echo (isset($position) && $position == "Người Đi Làm") ? "checked" : ""; ?>
                                name="position" value="Người Đi Làm">Người Đi Làm</label>
                    </div>
                    <?php if (!empty(form_error('position'))) {
                        echo '<div class="alert alert-danger error">' . form_error('position') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('workplace'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Nơi bạn đang học/làm *</label>
                    <input type="text" class="form-control" id="workplace"
                           value="<?php echo isset($workplace) ? $workplace : ""; ?>" name="workplace">
                    <?php if (!empty(form_error('workplace'))) {
                        echo '<div class="alert alert-danger error">' . form_error('workplace') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('facebook'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Link facebook của bạn *</label>
                    <input type="text" class="form-control" id="facebook"
                           value="<?php echo isset($facebook) ? $facebook : ""; ?>" name="facebook">
                    <?php if (!empty(form_error('facebook'))) {
                        echo '<div class="alert alert-danger error">' . form_error('facebook') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('howknow'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Bạn biết đến lớp học qua kênh nào? *</label>

                    <div class="radio">
                        <label><input type="radio"
                                      name="howknow" <?php echo (isset($howknow) && $howknow == "Bạn bè giới thiệu") ? "checked" : ""; ?>
                                      value="Bạn bè giới thiệu">Bạn bè giới thiệu</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio"
                                      name="howknow" <?php echo (isset($howknow) && $howknow == "Bài share trên FB của bạn") ? "checked" : ""; ?>
                                      value="Bài share trên FB của bạn">Bài share trên FB
                            của bạn</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio"
                                      name="howknow" <?php echo (isset($howknow) && $howknow == "Group trên FB nói về khóa học ở colorME") ? "checked" : ""; ?>
                                      value="Group trên FB nói về khóa học ở colorME">Group
                            trên FB nói về khóa học ở colorME</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="howknow"
                                      value="Email của colorME gửi mình" <?php echo (isset($howknow) && $howknow == "Email của colorME gửi mình") ? "checked" : ""; ?>>Email
                            của colorME
                            gửi mình</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="howknow"
                                      value="Chủ động vào fanpage colorME xem tin khóa mới" <?php echo (isset($howknow) && $howknow == "Chủ động vào fanpage colorME xem tin khóa mới") ? "checked" : ""; ?>>Chủ
                            động vào fanpage colorME xem tin khóa mới</label>
                    </div>
                    <?php if (!empty(form_error('howknow'))) {
                        echo '<div class="alert alert-danger error">' . form_error('howknow') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('classregis'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Bạn muốn học lớp nào? *</label>
                    <select name="classregis" class="form-control">
                        <option value="">Chọn Lớp</option>
                        <?php

                        foreach ($classes as $class) {
                            if ($class->isopen==0){
                                if (isset($classregis) && $classregis == $class->id) {
                                    echo "<option value=\"$class->id\" selected>$class->name, thời gian: $class->studyday</option>";
                                } else {
                                    echo "<option value=\"$class->id\">$class->name, thời gian: $class->studyday</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                    <?php if (!empty(form_error('classregis'))) {
                        echo '<div class="alert alert-danger error">' . form_error('classregis') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('leadname'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Tên Nhóm Trưởng (Nếu học nhóm 3 người trở lên)</label>
                    <input type="text" class="form-control" id="leadname" name="leadname"
                           value="<?php echo isset($leadname) ? $leadname : ""; ?>">
                    <?php if (!empty(form_error('leadname'))) {
                        echo '<div class="alert alert-danger error">' . form_error('leadname') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('leadphone'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Số Điện Thoại Nhóm trưởng (Nếu học nhóm 3 người trở lên)</label>
                    <input type="dob" class="form-control" id="leadphone" name="leadphone"
                           value="<?php echo isset($leadphone) ? $leadphone : ""; ?>">
                    <?php if (!empty(form_error('leadphone'))) {
                        echo '<div class="alert alert-danger error">' . form_error('leadphone') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" value="submit" class="btn btn-register-now">Submit</button>
                    <button type="reset" class="btn btn-learn-more">Reset</button>
                </div>
            </form>
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
