<!DOCTYPE html>
<html>

<head>
    <title><?php echo isset($seo['title'])?htmlspecialchars($seo['title']):''; ?></title>
    <meta name="keywords" content="<?php echo isset($seo['keywords'])?htmlspecialchars($seo['keywords']):''; ?>"/>
    <meta name="description" content="<?php echo isset($seo['description'])?htmlspecialchars($seo['description']):''; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo CM_BASE_URL;?>"/>
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="public/template/backend/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/bower_components/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/bower_components/animate.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/bower_components/iCheck/skins/flat/_all.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/bower_components/DataTables/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/vendor/css/dataTables.bootstrap.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="public/template/backend/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/template/backend/css/themes.css">
</head>

<body class="flat-blue login-page">
    <?php $this->load->view($template,isset($data)?$data:NULL); ?>

    <!-- Javascript Libs -->
    <script type="text/javascript" src="public/template/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="public/template/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/template/backend/bower_components/chartjs/Chart.min.js"></script>
    <script type="text/javascript" src="public/template/backend/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
    <script type="text/javascript" src="public/template/backend/bower_components/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="public/template/backend/bower_components/matchHeight/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="public/template/backend/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="public/template/backend/bower_components/select2/dist/js/select2.full.min.js"></script>
            
    <script type="text/javascript" src="public/template/backend/vendor/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="public/template/backend/vendor/js/ace/ace.js"></script>
    <script type="text/javascript" src="public/template/backend/vendor/js/ace/mode-html.js"></script>
    <script type="text/javascript" src="public/template/backend/vendor/js/ace/theme-github.js"></script>
    <!-- Javascript -->
    <script type="text/javascript" src="public/template/backend/js/app.js"></script>
</body>

</html>
