<!DOCTYPE html>
<html>

<head>


    <base href="<?php echo base_url(); ?>"/>
    <link rel="shortcut icon" href="images/logo.jpg">
    <title><?php echo $seo['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <!-- CSS Libs -->
    <link href="public/template/backend/css/bootstrap-toggle.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="public/template/backend/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css"
          href="public/template/backend/bower_components/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/bower_components/animate.css">
    <link rel="stylesheet" type="text/css"
          href="public/template/backend/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/bower_components/iCheck/skins/flat/_all.css">
    <link rel="stylesheet" type="text/css"
          href="public/template/backend/bower_components/DataTables/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
          href="public/template/backend/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/vendor/css/dataTables.bootstrap.css">

    <!-- Bootstrap Material Design -->
    <!--    <link href="public/template/backend/css/bootstrap-material-design.css" rel="stylesheet">-->
    <!--    <link href="public/template/backend/css/ripples.min.css" rel="stylesheet">-->
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="public/template/backend/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/css/themes.css">
    <script type="text/javascript"
            src="public/template/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <!--    <script src="public/template/backend/js/snowstorm-min.js"></script>-->
    <!--    <script>-->
    <!--        snowStorm.snowColor = '#0A572B';-->
    <!--        snowStorm.useTwinkleEffect = true; // let the snow flicker in and out of view-->
    <!--    </script>-->
</head>

<body class="flat-blue">
<!-- Modal -->
<div class="modal fade" id="modalDefault" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div id="confirmmessage">
                </div>
                <table class="table table-striped">
                    <tr>
                        <th>Người chuyển</th>
                        <th>Số tiền</th>
                        <th>Thời gian chuyển</th>
                        <th>Hành động</th>
                    </tr>
                    <?php

                    foreach ($user['incommingtransfers'] as $transfer) {
                        $xacnhan = "<button class='btn btn-primary' onclick='nhantien($transfer->fromid,$transfer->amount)'>Xác nhận</button>";
                        $huy = "<button class='btn btn-danger' onclick='huynhantien($transfer->fromid)'>Hủy</button>";
                        echo "
                        <tr>
                            <td>$transfer->fullname</td>
                            <td>$transfer->amount</td>
                            <td>$transfer->transferedtime</td>
                            <td>$xacnhan $huy</td>
                        </tr>
                        ";
                    }


                    ?>
                </table>
                <table class="table table-striped">
                    <tr>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Hành động</th>
                    </tr>
                    <?php

                    foreach ($user['users'] as $userIndividual) {
                        if ($user['id'] != $userIndividual->id) {
                            if ($user['istransfering'] == 0) {
                                $temp = "

<button type=\"button\" class=\"btn btn-primary float-left\" data-toggle=\"collapse\"
                                            data-target=\"#$userIndividual->id\">Chuyển
                                    </button>
                                    <div id=\"$userIndividual->id\" class=\"collapse\">

<button class='btn btn-danger' onclick='chuyentien($userIndividual->id," . $user['money'] . ")'>Xác nhận</button>
                                        </button>

                                    </div>
";
                            } else {
                                $temp = "<div>Đang chờ xác nhận</div>";
                            }

                            echo "
                        <tr>
                            <td>$userIndividual->fullname</td>
                            <td>$userIndividual->email</td>
                            <td class='btnChuyenTien'>$temp</td>
                        </tr>
                        ";
                        }

                    }
                    ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<div class="app-container">
    <div class="row content-container">
        <nav class="navbar navbar-default navbar-fixed-top navbar-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-expand-toggle">
                        <i class="fa fa-bars icon"></i>
                    </button>
                    <ol class="breadcrumb navbar-breadcrumb">
                        <li class="active"><?php echo $current_page ?></li>

                    </ol>

                    <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                        <i class="fa fa-th icon"></i>
                    </button>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                        <i class="fa fa-times icon"></i>
                    </button>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-comments-o"></i></a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li class="title">
                                Notification <span class="badge pull-right">0</span>
                            </li>
                            <li class="message">
                                No new notification
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown danger">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-star-half-o"></i> 4</a>
                        <ul class="dropdown-menu danger  animated fadeInDown">
                            <li class="title">
                                Notification <span class="badge pull-right">4</span>
                            </li>
                            <li>
                                <ul class="list-group notifications">
                                    <a href="#">
                                        <li class="list-group-item">
                                            <span class="badge">1</span> <i class="fa fa-exclamation-circle icon"></i>
                                            new registration
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            <span class="badge success">1</span> <i class="fa fa-check icon"></i> new
                                            orders
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item">
                                            <span class="badge danger">2</span> <i class="fa fa-comments icon"></i>
                                            customers messages
                                        </li>
                                    </a>
                                    <a href="#">
                                        <li class="list-group-item message">
                                            view all
                                        </li>
                                    </a>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><?php echo $user['fullname'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li class="profile-img">
                                <img src="<?php echo base_url($user['avatar']); ?>" class="profile-img">
                            </li>
                            <li>
                                <div class="profile-info">
                                    <h4 class="username"><?php echo $user['fullname'] ?></h4>


                                    <p><?php echo $user['email'] ?></p>

                                    <div class="alert alert-danger text-danger">Số tiền: <span
                                            id="sotienhienco"><?php echo $user['money'] ?></span>
                                        vnđ
                                    </div>
                                    <p>
                                        <button style="width: 100%;margin-top: -18px" type="button" data-toggle="modal"
                                                data-target="#modalDefault"
                                                class="btn btn-success"><i class="fa fa-money"></i> Chuyển/nhận tiền
                                        </button>

                                    </p>
                                    <div>


                                        </button>

                                        <div class="btn-group margin-bottom-1x" role="group">

                                            <button type="button" class="btn btn-default"><i class="fa fa-user"></i>
                                                Profile
                                            </button>
                                            <a class="btn btn-default"
                                               href="<?php echo base_url('backend/auth/logout'); ?>"><i
                                                    class="fa fa-sign-out"></i>Logout</a>
                                            <!--                                            <button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</button>-->
                                        </div>
                                    </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="side-menu" style="margin-left: 0">
            <nav class="navbar navbar-default" role="navigation">
                <div class="side-menu-container">
                    <div class="navbar-header">
                        <div class="navbar-brand">
                            <div class="icon fa fa-paper-plane"></div>
                            <div class="title"><?php echo $seo['title']; ?></div>
                        </div>

                    </div>
                    <ul class="nav navbar-nav">
                        <li <?php echo ($current_page == 'Dashboard') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo base_url('backend') ?>">
                                <span class="icon fa fa-dashboard"></span><span class="title">Dashboard</span>
                            </a>
                        </li>

                        <li class="panel panel-default dropdown">
                            <a data-toggle="collapse" href="#dropdown-tuyensinh">
                                <span class="icon fa fa-calendar-o"></span><span class="title">Quản lý tuyển sinh</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="dropdown-tuyensinh" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <?php
                                        if ($user['permission'] == 1) {
                                            ?>
                                            <li <?php echo ($current_page == 'Quản lý tuyển sinh') ? 'class="active"' : ''; ?>>
                                                <a href="<?php echo base_url('backend/tuyensinh') ?>">Đợt tuyển sinh</a>
                                            </li>
                                            <li <?php echo ($current_page == 'Quản lý ca trực') ? 'class="active"' : ''; ?>>
                                                <a href="<?php echo base_url('backend/tuyensinh/ca_truc') ?>">Ca
                                                    trực</a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <li <?php echo ($current_page == 'Phân công trực') ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo base_url('backend/tuyensinh/phan_cong_truc') ?>">Phân công trực</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <?php
                        if ($user['permission'] == 1) {
                            ?>
                            <li <?php echo ($current_page == 'Quản lý lớp học') ? 'class="active"' : ''; ?>>
                                <a href="<?php echo base_url('backend/quanlylophoc/hienthilophoc') ?>">
                                    <span class="icon fa fa-graduation-cap"></span><span
                                        class="title">Quản lý lớp học</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>


                        <li <?php echo ($current_page == 'danhsachnoptien') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo base_url('backend/student/danhsachnoptien') ?>">
                                <span class="icon fa fa-usd"></span><span class="title">Danh sách nộp tiền</span>
                            </a>
                        </li>

                        <li <?php echo ($current_page == 'tele_student') ? 'class="active"' : ''; ?>
                            class="panel panel-default dropdown">
                            <a data-toggle="collapse" href="#dropdown-table">
                                <span class="icon fa fa-table"></span><span class="title">Tele Sale</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="dropdown-table" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        <?php
                                        foreach ($courses as $course) {
                                            ?>
                                            <li>
                                                <a href="<?php echo base_url('backend/student/students_tele_sale/' . $course->id) ?>"><?php echo $course->name ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="panel panel-default dropdown">
                            <a data-toggle="collapse" href="#dropdown-quanlytaichinh">
                                <span class="icon fa fa-bank"></span><span class="title">Quản lý tài chính</span>
                            </a>
                            <!-- Dropdown level 1 -->
                            <div id="dropdown-quanlytaichinh" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">

                                        <li <?php echo ($current_page == "Danh sách học sinh nộp tiền khóa hiện tại") ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo base_url('backend/quanlytaichinh/danhsachdanoptien') ?>">Danh
                                                sách học viên đã nộp tiền</a>
                                        </li>
                                        <li <?php echo ($current_page == "Danh sách chuyển tiền") ? 'class="active"' : ''; ?>>
                                            <a href="<?php echo base_url('backend/quanlytaichinh/danhsachchuyentien') ?>">Danh
                                                sách chuyển tiền</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!--                        --><?php
                        //
                        //                        $link = base_url('backend/student/show_all_students');
                        //                        $active = ($current_page == 'Student') ? 'class="active"' : '';
                        //                        if ($user['permission'] == 1) {
                        //
                        //                            echo "
                        //                            <li  $active>
                        //                                <a href=\"$link\">
                        //                                    <span class=\"icon fa fa-graduation-cap \"></span><span class=\"title\">Students</span>
                        //                                </a>
                        //                            </li>
                        //                            ";
                        //                        }
                        //                        ?>


                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
        <!-- Main Content -->
        <?php $this->load->view($template, isset($data) ? $data : NULL); ?>
    </div>
    <footer class="app-footer">
        <div class="wrapper">
            <span class="pull-right">2.0 <a href=""><i class="fa fa-long-arrow-up"></i></a></span> © 2015 Copyright.
        </div>
    </footer>
    <div>
        <!-- Javascript Libs -->

        <!-- Javascript Libs -->
        <script type="text/javascript"
                src="public/template/backend/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript"
                src="public/template/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/template/backend/bower_components/chartjs/Chart.min.js"></script>
        <script type="text/javascript"
                src="public/template/backend/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
        <script type="text/javascript" src="public/template/backend/bower_components/iCheck/icheck.min.js"></script>
        <script type="text/javascript"
                src="public/template/backend/bower_components/matchHeight/jquery.matchHeight-min.js"></script>
        <script type="text/javascript"
                src="public/template/backend/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript"
                src="public/template/backend/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script type="text/javascript" src="public/template/backend/vendor/js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="public/template/backend/vendor/js/ace/ace.js"></script>
        <script type="text/javascript" src="public/template/backend/vendor/js/ace/mode-html.js"></script>
        <script type="text/javascript" src="public/template/backend/vendor/js/ace/theme-github.js"></script>
        <!-- Javascript -->
        <script type="text/javascript" src="public/template/backend/js/app.js"></script
        <script type="text/javascript" src="public/template/backend/js/index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.3/highlight.min.js"></script>
        <script src="public/template/backend/js/bootstrap-toggle.js"></script>

        <!--bootstrap material design-->
        <!--        <script src="public/template/backend/js/ripples.min.js"></script>-->
        <!--        <script src="public/template/backend/js/material.min.js"></script>-->

        <script type="text/javascript">
            var globalmoney = 0;
            function chuyentien(id, money) {
                if (globalmoney > 0) {
                    money = globalmoney;
                }

                link = "<?php echo base_url('backend/tien/ajaxchuyentien')?>" + "/" + id + "/" + money;

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        $(".btnChuyenTien").each(function () {
                            $(this).html(xhttp.responseText);
                        });

                    }
                };
                xhttp.open("GET", link, true);
                xhttp.send();
            }
            function nhantien(id, money) {
                var e = window.event;
                var btn = e.target || e.srcElement;

                link = "<?php echo base_url('backend/tien/ajaxnhantien')?>" + "/" + id + "/" + money;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        $(btn).parent().html(xhttp.responseText);
                        var tiendangco = $('#sotienhienco').html();
                        $("#sotienhienco").html(parseInt(tiendangco) + parseInt(money));
                        globalmoney = parseInt(tiendangco) + parseInt(money);
//                        window.location.reload();
                    }
                };
                xhttp.open("GET", link, true);
                xhttp.send();
            }
            function huynhantien(id) {
                var e = window.event;
                var btn = e.target || e.srcElement;


                link = "<?php echo base_url('backend/tien/ajaxhuynhantien')?>" + "/" + id;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        $(btn).parent().html(xhttp.responseText);
                    }
                };
                xhttp.open("GET", link, true);
                xhttp.send();
            }
        </script>
</body>

</html>