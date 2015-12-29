<br/>
<div class="">

    <div class="row">

        <?php

        foreach ($lectures as $lecture) {
            $linkchuyenbuoi = base_url('hocvien/home/chuyenbuoi/' . $lecture->lectureid);
            if ($lecture->joined == 0) {
                $btnHocBu = "<a href='$linkchuyenbuoi' style='width: 100%' type=\"button\" class=\"btn btn-primary\" \"><i class='fa fa-refresh'></i> Học bù</a>";
            } else {
                $btnHocBu = "<div  style='width: 100%'  disabled class=\"btn btn-success\" \"><i class='fa fa-check'></i> Đã học </div>";
            }

            $linkgiaotrinh = $lecture->linkgiaotrinh;
            $linkvideo = $lecture->linkyoutube;
            $linkanh = base_url($lecture->linkanh);
            $htmltomtat = "
<!-- Trigger the modal with a button -->
<button style=\"width:100%\" type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#myModal" . $lecture->lectureid . "\"><i class='fa fa-book'></i> Chi tiết giáo trình</button>

<!-- Modal -->
<div id=\"myModal" . $lecture->lectureid . "\" class=\"modal fade\" role=\"dialog\">
  <div class=\"modal-dialog modal-lg\">

    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\">Chi tiết giáo trình</h4>
      </div>
      <div class=\"modal-body\">
        " . $lecture->giaotrinhhocvien . "
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>

  </div>
</div>";

            echo
            "
            <div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">
                <div class=\"x_panel ui-ribbon-container \">
                    <div class=\"ui-ribbon-wrapper\">
                        <div class=\"ui-ribbon\">
                            Lớp $lecture->gen.$lecture->classname
                        </div>
                    </div>
                <div class=\"x_title text-center\">
                    <div>
                        <h2 style='width: 100%;font-weight: bold;' >Buổi $lecture->order</h2>
                    </div>
                    <div>
                        $lecture->studyday
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"x_content\">

                    <div style=\"text-align: center; margin-bottom: 17px\">
                     <img style='width:100%;' src='$linkanh'>
                    </div>

                    <h3 style='font-size: 16px;height: 35px' class=\"name_title text-center\">$lecture->name</h3>

                    <div class=\"divider\"></div>
                    <div>
                         <a style='width: 100%' class='btn btn-info' target=newtab href='$linkgiaotrinh'><i class='fa fa-book'></i> Slide buổi học</a>
                    </div>
                    <div>
                        $htmltomtat
                    </div>
                    <div>
                         <a style='width: 100%' class='btn btn-danger ' target=newtab href='$linkvideo'><i class='fa fa-video-camera'></i> Video</a>
                    </div>
                    <div>
                         <!-- modals -->
                                <!-- Large modal -->
                        $btnHocBu
                    </div>

                </div>
            </div>
        </div>
                                ";
        }
        ?>

    </div>

</div>

