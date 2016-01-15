<?php

foreach ($hoc_vien_nop_bais as $hoc_vien_nop_bai) {
    //                    if ($bai_tap_hoc_vien['duration'] == $bai_tap_hoc_vien['lectureOrder']) {
    //                        $buoi = "BTCK";
    //                    } else {
    //                        $buoi = "Buổi " . $bai_tap_hoc_vien['lectureOrder'];
    //                    }
    $buoi = "Buổi " . $hoc_vien_nop_bai['lectureOrder'];
    $date = rebuild_date('l, jS F, Y', strtotime($hoc_vien_nop_bai['date']));
    ?>
    <div class="x_panel tile" style="padding-top: 20px;">
        <li class="media" id="bt-hocvien-info">

            <div class="media-body">
                <div class="x_title">
                    <div class="col-xs-8">
                        <a href="#" style="float:left;margin-right:2%">
                            <img src="public/template/hocvien/images/user.png" class="media-object"
                                 width="40px"/>
                        </a>
                        <h4 class="media-heading"><?php echo $hoc_vien_nop_bai['fullname'] ?></h4>
                        <?php echo $date ?></p>
                    </div>
                    <div class="col-xs-4">
                                <span
                                    class="badge alert-success pull-right"
                                    style="color:white;padding: 5px 7px;margin-top:3px"><a style="color: white" target="_blank" href="<?php echo base_url('hocvien/home/lop/'.$hoc_vien_nop_bai['classid']) ?>">Lớp <?php echo $hoc_vien_nop_bai['gen'] . "." . $hoc_vien_nop_bai['name'] ?></a></span>
                                <span
                                    class="badge pull-right"
                                    style="color:white;padding: 5px 7px;margin-top:3px;margin-right: 5%"><?php echo $buoi; ?></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content links">

                    <?php
                    $baitap_id_array = array();
                    foreach ($hoc_vien_nop_bai['baitap'] as $key => $baitap) {
                        $baitap_id_array[] = $baitap['id'];
                        if ($key == 0) {

                            ?>

                            <a target="_blank"
                               href="<?php echo base_url($baitap['source']); ?>"
                               class="grid-thumbnail-first baiTap"
                               style="background: url('<?php echo base_url($baitap['source']); ?>') 50% 50% no-repeat;background-size:cover">
                            </a>

                            <?php
                        } else {
                            ?>
                            <a target="_blank" href="<?php echo base_url($baitap['source']); ?>"
                               class="grid-thumbnail baiTap"
                               style="background: url('<?php echo base_url($baitap['source']); ?>') 50% 50% no-repeat;background-size:cover">
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </li>
        <div class="like-info">
            <span>14 lượt thích</span>
            <span style="margin-left:1%">2 bình luận</span>
        </div>
        <div class="like-container" onclick='ajax_like(<?php echo json_encode($baitap_id_array) ?>)'>
            <i class="fa fa-thumbs-up "></i>
            <span>Thích</span>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php
}

?>