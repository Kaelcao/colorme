<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo base_url(); ?>"/>
    <!--Import Google Icon Font-->
    <link rel="shortcut icon" href="images/logo.jpg">
    <title>colorME</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="bower_components/Materialize/dist/css/materialize.min.css"
          media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="public/template/hocvien/css/material_home.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>

    </style>
</head>

<body>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="#!" onclick="return false" class="brand-logo">colorME</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down" id="mobile-demo">
                <li><a href="<?php echo base_url('hocvien/home/lop/'.$thisClass['id']); ?>">Lớp <?php echo $thisClass['gen'] . "." . $thisClass['name']?></a></li>
                <li><a href="<?php echo base_url('hocvien'); ?>">Trạng
                        thái</a></li>
                <li><a href="<?php echo base_url('hocvien/home/danhsachbuoihoc'); ?>">Buổi học</a></li>
                <li><a href="<?php echo base_url('hocvien/home/links'); ?>">Links</a></li>
            </ul>
            <ul class="side-nav">
                <li><a href="<?php echo base_url('hocvien'); ?>">Trạng
                        thái</a></li>
                <li><a href="<?php echo base_url('hocvien/home/danhsachbuoihoc'); ?>">Buổi học</a></li>
                <li><a href="<?php echo base_url('hocvien/home/links'); ?>">Links</a></li>

            </ul>
        </div>
    </nav>
</div>
<?php $this->load->view($template, isset($data) ? $data : NULL); ?>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/Materialize/dist/js/materialize.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.button-collapse').sideNav();
    });
</script>
</body>
</html>