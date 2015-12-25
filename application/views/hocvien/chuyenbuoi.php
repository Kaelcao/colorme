<div class="row">
    <?php

    foreach ($lectures as $lecture) {
        $phpdate = strtotime($lecture->day);
        $day = date('D, jS M Y', $phpdate);
        $currentTime = time();
        $disable = "";
        $numdays = floor(($currentTime - $phpdate) / 86400);
        if ($numdays < 0) {
            $numdays = $numdays * -1;
            $interval = "$numdays ngày sau";
        } else {
            if ($numdays >= 1)
                $disable = "disabled";
            $interval = "$numdays ngày trước";
        }

        $linkchuyenbuoi = base_url('hocvien/home/doibuoi/' . $lecture->classid . '/' . $lecture->lectureid . '/' . $user['id']);
        echo "
    <div class=\"col-md-4 col-sm-4 col-xs-12 animated fadeInDown\">
    <div class=\"well profile_view\">
        <div class=\"col-sm-12\" style='margin-bottom: 12px'>
            <h4 class=\"brief\"></h4>
            <div class=\"left col-xs-12\">
                <h2>Lớp $lecture->gen.$lecture->classname</h2>
                <p>$lecture->studyday </p>
                <ul class=\"list-unstyled\">
                    <li><strong>Giảng viên:</strong> $lecture->lecturername</li>
                    <li><strong>Trợ giảng:</strong> $lecture->taname</li>
                </ul>
            </div>
            <div class=\"right col-xs-5 text-center\" >

            </div>
        </div>
        <div class=\"col-xs-12 bottom\">
            <div class=\"col-xs-6 emphasis\">
                <h2><strong>$day</strong></h2>
                <p>$interval</p>

            </div>
            <div class=\"col-xs-6 emphasis\">
                <a href=\"$linkchuyenbuoi\" $disable class=\"btn btn-primary pull-right\"> <i class=\"fa fa-user\">
                    </i> Chọn lớp </a>
            </div>
        </div>
    </div>
</div>
        ";
    }
    ?>
</div>



