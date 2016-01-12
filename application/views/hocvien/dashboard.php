<style>
    .actionBar .btn-default {
        display: none;
    }

    .cauhoi {
        color: #c50000;
    }

    .bai-tap:hover {
        cursor: pointer;
    }

    .baiTap:hover {
        cursor: pointer;
    }

    #imageViewModal {
        text-align: center;
        width: 100%;
        height: 100%;
        margin: 0;
        top: 0;
        left: 0;
    }

    #imageViewModal .modal-dialog {
        display: inline-block;
        width: 90%;
    }

    .img-responsive {
        max-height: calc(100vh - 225px);
    }

    .grid-thumbnail {
        overflow: hidden;
        width: 24%;
        height: 0;
        padding-bottom: 24%;
        float: left;
        margin: 0.5%;
        border: 1px solid rgba(0, 0, 0, .2);

    }

    .grid-thumbnail-first {
        overflow: hidden;
        width: 99%;
        height: 0;
        padding-bottom: 99%;
        margin: 0.5%;
        border: 1px solid rgba(0, 0, 0, .2);

    }

    #btn-modal-next-image {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        width: 20%;
    }

    #btn-modal-next-image:hover {
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0+0,1+100 */
        background: -moz-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#000000', GradientType=1); /* IE6-9 */

    }

    #btn-modal-previous-image:hover {
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&1+0,0+100 */
        background: -moz-linear-gradient(left, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#00000000', GradientType=1); /* IE6-9 */
    }

    #btn-modal-previous-image {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 20%;
    }

    .like-container {
        border-top: 2px solid #E6E9ED;
        padding: 5px 5px 6px;
        margin-top: 5px;
        width: 100%;

    }

    .like-container span:hover {
        text-decoration: underline;
        cursor: pointer;
    }

    .like-info:hover {
        cursor: pointer;
    }

    .slide-description {
        color: white;
        position: absolute;
        bottom: 0;
        right: 0px;
        text-align: center;
        width: 500px;
    }

    .liked {
        color: #c50000;
    }

    .modal-body {
        margin: 0;
        padding: 0 !important;
    }

    .header {
        overflow: hidden;
        margin-top: 5px;
        padding-bottom: 5px;
        border-bottom: 1px solid #eeefef;
    }


    .comment-container {

    }

    div.comment-body {
        text-align: left;
        padding-top: 5px;
        max-height: 350px;
        overflow-y: scroll;
        overflow-x: hidden;
    }
</style>
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->

<div class="modal fade" id="image-viewer">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">

            <div class="modal-body next">
                <div class="row">
                    <div class="col-xs-8 image-container">
                    </div>
                    <div class="col-xs-4 comment-container">
                        <div class="header">
                            <img src="public/template/hocvien/images/user.png" class="media-object"
                                 style="width: 40px;position: static;margin: 0;float: left"/>
                            <h5 style="margin-top:0;margin-bottom: 0;float: left;width: 75%;height: 40px;line-height: 40px;text-align: left;margin-left: 2%;display:table-cell;vertical-align:middle;">
                                Cao Anh Quan</h5>
                            <button type="button" class="close" aria-hidden="true"
                                    style="margin-right:10px">&times;</button>
                        </div>
                        <div style="clear: both">
                        </div>
                        <div style="text-align: left;border-bottom: 1px solid #eeefef;">
                            <div class="like-container" style="border-top:none;"
                                 onclick='ajax_like(<?php echo json_encode($baitap_id_array) ?>)'>
                                <i class="fa fa-thumbs-up"></i>
                                <span>Thích</span>
                                <span>14 lượt thích</span>
                            </div>
                        </div>

                        <div class="comment-body">
                            <p><strong>Cao Anh Quan</strong> <span>Lorem ipsum dolor sit amet, vix no eius abhorreant. Graece atomorum repudiandae at cum, vide etiam me</span>
                            </p>
                            <p><strong>Cao Anh Quan</strong> <span>Dicam liberavisse sit at, qui consul laoreet accusata ei.</span>
                            </p>
                            <p><strong>Cao Anh Quan</strong>
                                <span>Eu omnes molestie his, ne pro oportere adipiscing. </span>
                            </p>
                            <p><strong>Cao Anh Quan</strong> <span>Per ut mollis verear virtute, partiendo corrumpit delicatissimi id eum, ut qui aeterno propriae</span>
                            </p>
                            <p><strong>Cao Anh Quan</strong> <span>Lorem ipsum dolor sit amet, vix no eius abhorreant. Graece atomorum repudiandae at cum, vide etiam me</span>
                            </p>
                            <p><strong>Cao Anh Quan</strong> <span>Dicam liberavisse sit at, qui consul laoreet accusata ei.</span>
                            </p>
                            <p><strong>Cao Anh Quan</strong>
                                <span>Eu omnes molestie his, ne pro oportere adipiscing. </span>
                            </p>
                            <p><strong>Cao Anh Quan</strong> <span>Per ut mollis verear virtute, partiendo corrumpit delicatissimi id eum, ut qui aeterno propriae</span>
                            </p>
                            <p><strong>Cao Anh Quan</strong> <span>Lorem ipsum dolor sit amet, vix no eius abhorreant. Graece atomorum repudiandae at cum, vide etiam me</span>
                            </p>
                            <p><strong>Cao Anh Quan</strong> <span>Dicam liberavisse sit at, qui consul laoreet accusata ei.</span>
                            </p>
                            <p><strong>Cao Anh Quan</strong>
                                <span>Eu omnes molestie his, ne pro oportere adipiscing. </span>
                            </p>
                            <p><strong>Cao Anh Quan</strong> <span>Per ut mollis verear virtute, partiendo corrumpit delicatissimi id eum, ut qui aeterno propriae</span>
                            </p>

                        </div>

                        <form class="form" role="form">
                            <div class="form-group">
                                <input type="text" class="form-control comment-input"/>
                            </div>
                            <button type="submit" class="btn btn-default">Gửi</button>


                        </form>


                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left prev">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    Previous
                </button>
                <button type="button" class="btn btn-primary next">
                    Next
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </button>

            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 col-lg-5">

        <ul class="media-list" id="bai-tap-container">
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
                                    style="color:white;padding: 5px 7px;margin-top:3px">Lớp <?php echo $hoc_vien_nop_bai['gen'] . "." . $hoc_vien_nop_bai['name'] ?></span>
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

                                        <div src="<?php echo base_url($baitap['source']); ?>"
                                            class="grid-thumbnail-first bai-tap"
                                            style="background: url('<?php echo base_url($baitap['source']); ?>') 50% 50% no-repeat;background-size:cover">

                                        </div>

                                        <?php
                                    } else {
                                        ?>

                                        <div
                                            src="<?php echo base_url($baitap['source']); ?>"
                                            href="<?php echo base_url($baitap['source']); ?>"
                                             class="grid-thumbnail bai-tap"
                                             style="background: url('<?php echo base_url($baitap['source']); ?>') 50% 50% no-repeat;background-size:cover">
                                        </div>


                                        <?php
                                    }
                                }
                                ?>
                            </div>

                        </div>
                        <div class="like-info">
                            <span>14 lượt thích</span>
                            <span style="margin-left:1%">2 bình luận</span>
                        </div>
                        <div class="like-container" onclick='ajax_like(<?php echo json_encode($baitap_id_array) ?>)'>
                            <i class="fa fa-thumbs-up"></i>
                            <span>Thích</span>
                            <div class="clearfix"></div>
                        </div>
                    </li>

                </div>
                <?php
            }

            ?>
        </ul>


        <div>
            <button class="btn btn-info" style="width: 100%;font-size:20px " id="btn-load-more">Tải thêm</button>
        </div>
    </div>

    <div class="col-md-4">

        <!-- Trigger the modal with a button -->


        <!-- Modal -->
        <div id="modal-nopbai" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">


                        <h2>Nop bai giua ki</h2>


                        <form action="<?php echo base_url('hocvien/home/nop_baigiuaki') ?>"
                              class="dropzone"
                              id="my-awesome-dropzone"
                              style="border: 1px solid #e5e5e5; height: 300px; "></form>


                        <!--                        <form id="uploadbaigiuaki" method="post"-->
                        <!--                              action="-->
                        <?php //echo base_url('hocvien/home/nop_baigiuaki') ?><!--"-->
                        <!--                              enctype="multipart/form-data">-->
                        <!--                            <div class="form-group">-->
                        <!--                                <label for="baigiuaki">Upload bài giữa kì - Kích thước tối đa 5 Mb </label>-->
                        <!--                                <input name="userfile" id="userfile" required class="form-control" rows="3"-->
                        <!--                                       type="file"/>-->
                        <!--                            </div>-->
                        <!---->
                        <!--                            <input type="submit" id="submitBaiGiuaki" name="submit" value="submit"-->
                        <!--                                   class="btn btn-default"/>-->
                        <!---->
                        <!--                        </form>-->
                        <!--                        <div id="message-nopbai" class="text-center">-->
                        <!--                            --><?php
                        //                            if (!empty($linkbaigiuaki)) {
                        //                                echo "<div><img src='$linkbaigiuaki' style='width: 75%;'/></div>";
                        //                            }
                        //                            ?>
                        <!--                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-hoan-tat">Hoan tat
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <form role="form">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Ban vui long hoan thanh survey 1 gium chung minh nhe</h4>
                        </div>
                        <div class="modal-body">
                            <div id="step-1">
                                <?php


                                echo
                                "

                            <div class=\"form-group\">
                                <label for=\"clb\" class='cauhoi'>Bạn có đang tham gia nhóm/ CLB nào mà có hoạt động thiết kế nào
                                    không?*</label>
                                <input required type=\"text\" class=\"form-control\" id=\"clb\" name=\"clb\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"hailong\" class='cauhoi'>Bạn thấy hài lòng thế nào với kiến thức mình học được tới hiện tại?
                                    *</label>
                                <div id=\"stars-existing\" class=\"starrr lead\" data-rating='4'></div>
                                Cảm ơn bạn đã dành tặng <span id=\"count-existing\">4</span> sao cho chất lượng đào tạo của colorME
                            </div>
                            <div class=\"form-group\">
                                <label for=\"yeutochon\" class='cauhoi'>Yếu tố nào khiến bạn chọn colorME mà không chọn nơi khác?
                                    *</label>

                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" type=\"checkbox\" id=\"yeutochon\" value=\"colorME có thầy giỏi\">colorME có thầy giỏi</label>
                                        </div>
                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" type=\"checkbox\" id=\"yeutochon\" value=\"colorME giá rẻ quá\">colorME giá rẻ quá</label>
                                        </div>
                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" type=\"checkbox\" id=\"yeutochon\" value=\"colorME ngay gần chỗ mình học/ làm/ ở\">
                                                colorME ngay gần chỗ mình học/ làm/ ở</label>
                                        </div>
                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" type=\"checkbox\" id=\"yeutochon\" value=\"Mình được biết nội dung khóa học rất hay\">
                                                Mình được biết nội dung khóa học rất hay</label>
                                        </div>
                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" id=\"yeutochon\" type=\"checkbox\" value=\"Bạn mình cứ lôi kéo học cùng. Thôi thì học cho biết.\">
                                                Bạn mình cứ lôi kéo học cùng. Thôi thì học cho biết.</label>
                                        </div>
                                        <label>Yếu tố khác
                                        <input name=\"yeutochon\" id=\"yeutochonkhac\" type=\"text\" class=\"form-control\" value=\"\"/>
                                        </label>

                            </div>
                            <div class=\"form-group\">
                                <label for=\"noikhac\" class='cauhoi'>Bạn có biết những nơi nào cũng dạy thiết kế như colorME không?
                                    *</label>
                                <input required type=\"text\" class=\"form-control\" id=\"noikhac\" name=\"noikhac\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"lydo\" class='cauhoi'>Tại sao bạn muốn học thiết kế Photoshop cơ bản? *</label>

                                <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để thiết kế slides, phục vụ thuyết trình\">Để thiết kế slides, phục vụ
                                           thuyết trình</label>
                                   </div>
                                   <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để thiết kế CV\">Để thiết kế CV</label>
                                   </div>
                                   <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để thiết kế các ấn phẩm truyền thông\">
                                           Để thiết kế các ấn phẩm truyền thông</label>
                                   </div>
                                   <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để chỉnh sửa ảnh\">
                                           Để chỉnh sửa ảnh</label>
                                   </div>
                                   <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để thiết kế website\">
                                           Để thiết kế website</label>
                                   </div>
                                   <label>
                                   Lý do khác <input name=\"lydo\" id=\"lydokhac\" type=\"text\" class=\"form-control\" value=\"\"/>
                                   </label>

                           </div>

                            <div class=\"form-group\">
                                <label for=\"dogood\" class='cauhoi'>Và,theo bạn chúng mình đã làm tốt điều gì? *</label>
                                <textarea name=\"dogood\" id=\"dogood\" required class=\"form-control\" rows=\"3\"></textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"improve\" class='cauhoi'>Bạn thấy chúng mình nên cải thiện điều gì? *</label>
                                <textarea name=\"improve\" id=\"improve\" required class=\"form-control\" rows=\"3\"></textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"workshop\" class='cauhoi'>Nếu colorME tổ chức workshop, chủ đề bạn mong muốn là gì?
                                    *</label>
                                <textarea name=\"workshop\" id=\"workshop\" required class=\"form-control\"
                                          rows=\"3\"></textarea>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"chiase\" class='cauhoi'>Và còn gì nữa bạn muốn chia sẻ với colorME không ạ? *</label>
                                <textarea name=\"chiase\" id=\"chiase\" required class=\"form-control\" rows=\"3\"
                                          required></textarea>
                            </div>



                                ";

                                ?>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="submit" class="btn btn-default" data-target="#modal-nopbai"
                                    data-dismiss="modal">Nộp bài giữa kì
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </div>


        <!-- Trigger the modal with a button -->
        <!-- Modal -->
        <div id="modal-nopbai-ck" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nộp bài</h4>
                    </div>
                    <div class="modal-body">
                        <h2>Bạn nhớ nộp đầy đủ bài tập nhé</h2>

                        <form action="<?php echo base_url('hocvien/home/nop_bai') ?>" class="dropzone"
                              id="nop-bai-ck-dropzone"
                              style="border: 1px solid #e5e5e5">
                            <input type="hidden" name="lectureOrder" id="lectureOrder"/>
                        </form>


                        <!--                        <form id="uploadbaigiuaki" method="post"-->
                        <!--                              action="-->
                        <?php //echo base_url('hocvien/home/nop_baigiuaki') ?><!--"-->
                        <!--                              enctype="multipart/form-data">-->
                        <!--                            <div class="form-group">-->
                        <!--                                <label for="baigiuaki">Upload bài giữa kì - Kích thước tối đa 5 Mb </label>-->
                        <!--                                <input name="userfile" id="userfile" required class="form-control" rows="3"-->
                        <!--                                       type="file"/>-->
                        <!--                            </div>-->
                        <!---->
                        <!--                            <input type="submit" id="submitBaiGiuaki" name="submit" value="submit"-->
                        <!--                                   class="btn btn-default"/>-->
                        <!---->
                        <!--                        </form>-->
                        <!--                        <div id="message-nopbai" class="text-center">-->
                        <!--                            --><?php
                        //                            if (!empty($linkbaigiuaki)) {
                        //                                echo "<div><img src='$linkbaigiuaki' style='width: 75%;'/></div>";
                        //                            }
                        //                            ?>
                        <!--                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onclick="finishUpload()" data-dismiss="modal"
                                id="btn-hoan-tat">Hoan tat
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div id="survey-ck" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <form role="form">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Bạn vui lòng hoàn thành survey cuối kì giúp chúng mình nhé</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="khong-day" class='cauhoi'>Bạn nghĩ sao nếu colorME không tiếp tục dạy design
                                    (for marketers) nữa? *
                                    không?*</label>
                                <div class="radio">
                                    <label><input type="radio" name="khong-day" id="khong-day" value="0">Rất rất đáng
                                        tiếc; buồn. colorME thực sự mang lại cho tôi nhiều trải nghiệm tôi không thấy ở
                                        nơi khác.</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="khong-day" id="khong-day" value="1">Hơi đáng tiếc,
                                        colorME cũng để lại một chút ấn tượng.</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="khong-day" id="khong-day" value="2">Bình thường,
                                        không có gì đáng tiếc cả, vì colorME cũng hao hao như các nơi khác.</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="khong-day" id="khong-day" value="3">Miễn hỏi. Tôi
                                        thấy thất vọng với trải nghiệm tại colorME.</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hai-long" class='cauhoi'>Bạn hài lòng với những kiến thức Photoshop và Tư
                                    duy
                                    thiết kế học được ở colorME chứ? *
                                </label>

                                <div id="stars-rate-hai-long" class="starrr lead" data-rating='4'></div>
                                Cảm ơn bạn đã dành tặng <span id="count-rate-hai-long">4</span> sao cho chất lượng đào
                                tạo của colorME
                            </div>

                            <div class="form-group">
                                <label for="why-hai-long">Vì sao bạn chọn thang điểm trên?</label>
                                <input required type="text" class="form-control" id="why-hai-long" name="why-hai-long"/>
                            </div>

                            <div class="form-group">
                                <label for="gioi-thieu" class='cauhoi'>Khả năng bạn sẽ giới thiệu colorME với bạn
                                    bè/người thân là bao nhiêu? *
                                </label>
                                <div id="stars-gioi-thieu" class="starrr lead" data-rating='4'></div>
                                Cảm ơn bạn đã chọn <span id="count-gioi-thieu">4</span> sao
                            </div>

                            <div class="form-group">
                                <label for="why-gioi-thieu">Vì sao bạn chọn thang điểm trên?</label>
                                <input required type="text" class="form-control" id="why-gioi-thieu"
                                       name="why-gioi-thieu"/>
                            </div>

                            <div class="form-group">
                                <label for="rate-giang-vien" class='cauhoi'>Bạn sẽ tặng giảng viên mấy điểm cho chất
                                    lượng giảng dạy/ truyền đạt? *</label>
                                <div id="stars-rate-giang-vien" class="starrr lead" data-rating='4'></div>
                                Cảm ơn bạn đã tặng <span id="count-rate-giang-vien">4</span> sao cho giảng viên
                            </div>

                            <div class="form-group">
                                <label for="giang-vien-cai-thien">Giảng viên cần cải thiện những gì? *</label>
                                <input required type="text" class="form-control" id="giang-vien-cai-thien"
                                       name="giang-vien-cai-thien"/>
                            </div>

                            <div class="form-group">
                                <label for="rate-tro-giang" class='cauhoi'>Bạn sẽ tặng Trợ giảng mấy điểm cho chất lượng
                                    hỗ trợ trước, trong và sau lớp học? *</label>
                                <div id="stars-rate-tro-giang" class="starrr lead" data-rating='4'></div>
                                Cảm ơn bạn đã tặng <span id="count-rate-tro-giang">4</span> sao cho trợ giảng
                            </div>

                            <div class="form-group">
                                <label for="tro-giang-cai-thien">Trợ giảng cần cải thiện những gì? *</label>
                                <input required type="text" class="form-control" id="tro-giang-cai-thien"
                                       name="tro-giang-cai-thien"/>
                            </div>

                            <div class="form-group">
                                <label for="so-sanh" class='cauhoi'>Tổng thể, bạn thấy colorME đã mang lại cho bạn lượng
                                    kiến thức và trải nghiệm học tập như thế nào so với các nơi dạy thiết kế bạn đã biết
                                    (đã học)? *</label>
                                <div class="radio">
                                    <label><input type="radio" name="so-sanh" id="so-sanh" value="0">Hơn hẳn</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="so-sanh" id="so-sanh" value="1">Hơn một chút ít
                                        thôi</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="so-sanh" id="so-sanh" value="2">Cũng xêm
                                        xêm</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="so-sanh" id="so-sanh" value="3">Còn kém một
                                        chút</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="so-sanh" id="so-sanh" value="4">Kém xa</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="so-sanh" id="so-sanh" value="5">Mình không biết
                                        trung tâm nào
                                        khác nên không so sánh được</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ket-noi" class='cauhoi'>Bạn đã kết nối (làm quen) được với bao nhiêu bạn
                                    đồng môn ở colorME rồi? *</label>
                                <div class="radio">
                                    <label><input type="radio" name="ket-noi" id="ket-noi" value="0">Coi như hết rồi nha
                                        (ít cũng
                                        phải 80% các bạn) ^_^</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="ket-noi" id="ket-noi" value="1">Cũng kha khá (chắc
                                        (50-80% gì
                                        đó)</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="ket-noi" id="ket-noi" value="2">Hix, mình chẳng
                                        quen được là bao
                                        (khoảng 20-50% thôi)</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="ket-noi" id="ket-noi" value="3">Hầu như không nha
                                        (dưới 20%).
                                        Đội ngũ giảng viên colorME kết nối chúng mình tệ quá</label>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="se-tham-gia" class='cauhoi'>Bạn sẽ tham gia các lớp học khác của colorME
                                    trong
                                    tương lai chứ (Ví dụ khóa học làm video clip)? *</label>
                                <div class="radio">
                                    <label><input type="radio" name="se-tham-gia" id="se-tham-gia" value="0">Chắc chắn
                                        có</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="se-tham-gia" id="se-tham-gia" value="1">Xem xét đã
                                        nhỉ</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="se-tham-gia" id="se-tham-gia" value="2">Chắc chắn
                                        không</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ly-do-se-tham-gia">Lý do bạn chọn như trên? *</label>
                                <input required type="text" class="form-control" id="ly-do-se-tham-gia"
                                       name="ly-do-se-tham-gia"/>
                            </div>
                            <div class="form-group">
                                <label for="chia-se-nua">Còn gì nữa bạn muốn chia sẻ cùng colorME không? *</label>
                                <input required type="text" class="form-control" id="chia-se-nua"
                                       name="chia-se-nua"/>
                            </div>
                            <div class="form-group">
                                <label for="tham-gia-alumni">Chúng mình đã xây dựng colorME Alumni Network. Bạn tham gia
                                    ở link dưới nhé? *
                                    <br/>
                                    <a style="text-decoration: underline"
                                       href="https://www.facebook.com/groups/880400375369228/" target="_blank">colorME
                                        Alumni
                                        Network</a>
                                </label>
                                <div class="radio">
                                    <label><input type="radio" name="tham-gia-alumni" id="tham-gia-alumni"
                                                  value="0">Yes</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="tham-gia-alumni" id="tham-gia-alumni"
                                                  value="1">No</label>
                                </div>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" id="submit-survey-ck" class="btn btn-default"
                                    data-target="#modal-nopbai-ck"
                                    data-dismiss="modal">Nộp bài cuối kì
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </div>

        <?php
        foreach ($lectures as $lecture) {
            ?>
            <div class="x_panel tile">
                <div class="x_title">
                    <h2>Nộp bài buổi <?php echo $lecture->order ?></h2>
                    <div class="clearfix"></div>
                </div>
                <button style="width: 100%" type="button" class="btn btn-info btn-lg"
                        id="btn-nop-bai-buoi-<?php echo $lecture->order ?>">
                    Nộp bài buổi <?php echo $lecture->order ?>
                </button>


                <div class="x_content links" id="baitap-container-<?php echo $lecture->order ?>"
                     style="padding-left: 0;padding-right: 0" id="anh-buoi-<?php echo $lecture->order ?>">
                    <?php
                    foreach ($lecture->baitaps as $baitap) {
                        ?>


                        <a readonly="true" target="_blank" href="<?php echo base_url($baitap['source']); ?>"
                           data-gallery
                           id="bai-tap-<?php echo $baitap['id']; ?>"
                           class="grid-thumbnail baiTap"
                           style="background: url('<?php echo base_url($baitap['source']); ?>') 50% 50% no-repeat;background-size:cover">
                            <button type="button"
                                    style="opacity: 1;padding: 1px;background: white;"
                                    class="close"
                                    onclick="xoaBaiTap(<?php echo $baitap['id']; ?>)"
                                    data-dismiss="modal">&times;</button>

                        </a>


                        <?php
                    }
                    ?>

                </div>
            </div>
            <?php
        }
        ?>

    </div>

</div>

</div>
<!-- form wizard -->
<script type="text/javascript" src="public/template/hocvien/js/wizard/jquery.smartWizard.js"></script>
<script src="public/template/hocvien/js/dropzone/dropzone.js"></script>
<script type="text/javascript">
    function ajax_like(postid) {
        window.event.stopImmediatePropagation();
        window.event.preventDefault();


        $.ajax({
            url: "<?php echo base_url('hocvien/home/ajax_like') ?>",
            type: "POST",
            data: "postid=" + postid,
            success: function (data, textStatus, jqXHR) {
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
//        for (i = 0; i < posts.length; i++) {
//            alert(posts[i]);
//        }
    }
    var offset = 0;
    function click_baitap() {
        var source = $(this).attr('src');

//        var sourceDivId = $(this).attr('id');
        $('#bigImg').attr('src', source);
//        $('#bigImg').attr('divid', sourceDivId);
        $('#imageViewModal').modal('show');
    }
    //    $(".baiTap").click(click_baitap);
    $('#btn-modal-previous-image').click(function () {
        var sourceDivId = $('#bigImg').attr('divid');
        var preDiv = $("#" + sourceDivId).prev();
        var source = preDiv.find('img').attr('src');
        $('#bigImg').attr('divid', preDiv.attr('id'));
        $('#bigImg').attr('src', source);
    });

    $('#btn-modal-next-image').click(function () {
        var sourceDivId = $('#bigImg').attr('divid');
        var nextDiv = $("#" + sourceDivId).next();
        if (!nextDiv.is('div')) {
            offset += 4;
            dataString = "";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('hocvien/home/ajax_load_more_bt/') ?>/" + offset,
                data: dataString,
                cache: false,
                success: function (result) {
                    $('#bai-tap-container').append(result);


                }

            });

        } else {
            var source = nextDiv.find('img').attr('src');
            $('#bigImg').attr('divid', nextDiv.attr('id'));
            $('#bigImg').attr('src', source);
        }

    });
    function xoaBaiCk(id) {
        var dataString = 'id=' + id;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('hocvien/home/ajax_xoa_post') ?>",
            data: dataString,
            cache: false,
            success: function (result) {
                console.log("Đã xóa");
            }

        });

        $("a#bai-tap-" + id).remove();

        return false;
    }
    function finishUpload() {
        offset = 0;
        dataString = "";
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('hocvien/home/ajax_load_more_bt/') ?>/" + offset,
            data: dataString,
            cache: false,
            success: function (result) {
                $('#bai-tap-container').html(result);
                $("#bai-tap-container").on("click", '.links', function (event) {
                    event = event || window.event;
                    var target = event.target || event.srcElement,
                        link = target.src ? target.parentNode : target,
                        options = {index: link, event: event},
                        links = this.getElementsByTagName('a');
                    blueimp.Gallery(links, options);
                });
            }

//                    $('.links').each(function () {
//                        $(this).click(function (event) {
//                            event = event || window.event;
//                            var target = event.target || event.srcElement,
//                                link = target.src ? target.parentNode : target,
//                                options = {index: link, event: event},
//                                links = this.getElementsByTagName('a');
//                            blueimp.Gallery(links, options);
//                        });
//                    });
        });
    }

    function xoaBaiTap(id) {

        var container = "#baitap-container-" + id;
        if (confirm("Bạn có chắc chắn muốn xóa ảnh này?")) {
            xoaBaiCk(id);
            alert("Xóa thành công");
            finishUpload();
        }


        window.event.stopImmediatePropagation();
        window.event.preventDefault();

    }
    function chonAnh(id) {

        var container = "#baitap-container-" + id;
        var buttonChon = "#btn-chon-" + id;

        if ($(container).hasClass('links')) {
            $(buttonChon).html("Tắt");
            $(container).unbind('click');
        } else {
            $(buttonChon).html("Chọn ảnh");

        }
    }
    //    window.onload = resize_bai_tap_image();

    $(document).ready(function () {

//        $(window).resize(function(){
//            resize_bai_tap_image();
//        });
        $('.bai-tap').click(function () {
            $('#image-viewer').modal('show');
        });


        Dropzone.options.nopBaiCkDropzone = {
            acceptedFiles: "image/jpeg,image/png",
            success: function (file, response) {

                var json = JSON.parse(response);
                console.log(json['lectureOrder']);
                $('#baitap-container-' + json['lectureOrder']).append(json['img']);

//                $('#bai-tap-container').prepend(response);
//                $('#bai-tap-container div.btn-group-xoa').remove();

            },
            accept: function (file, done) {
                console.log(file);
                done();
            },
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    alert("No more files please!");
//                    this.removeAllFiles(true);
                });
            }
        };
        Dropzone.options.myAwesomeDropzone = {
            maxFiles: 1,
            acceptedFiles: "image/jpeg,image/png",
            success: function (file, response) {
                $('#anh-giua-ki').html(response);
            },
            accept: function (file, done) {
                console.log(file);
                done();
            },
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    alert("No more files please!");
                    this.removeAllFiles(true);
                });
            }
        };

        $('#submit-survey-ck').click(function () {

            var khongDay = $('#khong-day:checked').val();
            var rateHaiLong = $('#count-rate-hai-long').html();
            var whyHaiLong = $('#why-hai-long').val();
            var rateGioiThieu = $('#count-gioi-thieu').html();
            var whyGioiThieu = $('#why-gioi-thieu').val();
            var rateGiangVien = $('#count-rate-giang-vien').html();
            var giangVienCaiThien = $('#giang-vien-cai-thien').val();
            var rateTroGiang = $('#count-rate-tro-giang').html();
            var troGiangCaiThien = $('#tro-giang-cai-thien').val();
            var soSanh = $('#so-sanh:checked').val();
            var ketNoi = $('#ket-noi:checked').val();
            var seThamGia = $('#se-tham-gia:checked').val();
            var lyDoSeThamGia = $('#ly-do-se-tham-gia').val();
            var chiaSeNua = $('#chia-se-nua').val();
            var thamGiaAlumni = $('#tham-gia-alumni:checked').val();

//            var lydo = $("#lydokhac").val();
//            $('#lydo:checked').each(function () {
//                if (lydo === '') {
//                    lydo = lydo + $(this).val();
//                } else {
//                    lydo = lydo + ',' + $(this).val();
//                }
//            });


// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'khongday=' + khongDay + '&ratehailong=' + rateHaiLong + '&whyhailong=' + whyHaiLong
                + '&rategioithieu=' + rateGioiThieu + '&whygioithieu=' + whyGioiThieu + '&rategiangvien='
                + rateGiangVien + '&giangviencaithien=' + giangVienCaiThien
                + '&ratetrogiang=' + rateTroGiang + '&trogiangcaithien=' + troGiangCaiThien + '&studentid=' + '<?php echo $user['id']; ?>'
                + '&sosanh=' + soSanh + '&ketnoi=' + ketNoi + '&sethamgia=' + seThamGia + '&lydosethamgia=' + lyDoSeThamGia + "&chiasenua=" + chiaSeNua
                + '&thamgiaalumni=' + thamGiaAlumni;
            if (khongDay == '' || rateHaiLong == ''
                || whyHaiLong == '' || rateGioiThieu == ''
                || whyGioiThieu == '' || rateGiangVien == ''
                || rateGiangVien == '' || giangVienCaiThien == ''
                || rateTroGiang == '' || troGiangCaiThien == '' ||
                soSanh == '' || ketNoi == '' || seThamGia == '' || lyDoSeThamGia == '' || chiaSeNua == '' || thamGiaAlumni == '') {
                alert("bạn điền thiếu rồi, vui lòng kiểm tra lại nhé!");
            } else {
// AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('hocvien/home/receive_survey_ck') ?>",
                    data: dataString,
                    cache: false,
                    success: function (result) {
//                        $("#step-1").html(result);
//                            console.log(result);
                        $('#survey-ck').modal('hide');
                        $('#modal-nopbai-ck').modal('show');
//                        $(".actionBar .btn-success").removeClass('buttonDisabled');
                    }

                });
            }
            return false;

        });

        <?php
        foreach ($lectures as $lecture){
        ?>
        //nop bai buoi 1
        $('#btn-nop-bai-buoi-<?php echo $lecture->order ?>').click(function () {

            $('#lectureOrder').attr('value', <?php echo $lecture->order ?>);
            $('#modal-nopbai-ck').modal('show');

        });
        <?php
        }
        ?>

//nop bai cuoi ki
        $('#btn-nop-bai-ck').click(function () {
            if (<?php echo !empty($complete_survey_ck) ? $complete_survey_ck : 0; ?> == 1
            )
            {
                $('#modal-nopbai-ck').modal('show');
            }
            else
            {
                $('#survey-ck').modal('show');
            }
        });

//nop bai giua ki
        $('#btn-nop-bai-gk').click(function () {
            if (<?php echo !empty($complete_survey_one) ? $complete_survey_one : 0; ?> == 1
            )
            {
                $('#modal-nopbai').modal('show');
            }
            else
            {
                $('#myModal').modal('show');
            }
        });


        $('#btn-load-more').click(function () {
            offset += 4;
            dataString = "";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('hocvien/home/ajax_load_more_bt/') ?>/" + offset,
                data: dataString,
                cache: false,
                success: function (result) {
                    $('#bai-tap-container').append(result);

                }

//                    $('.links').each(function () {
//                        $(this).click(function (event) {
//                            event = event || window.event;
//                            var target = event.target || event.srcElement,
//                                link = target.src ? target.parentNode : target,
//                                options = {index: link, event: event},
//                                links = this.getElementsByTagName('a');
//                            blueimp.Gallery(links, options);
//                        });
//                    });
            });

        });


        $("#submit").click(function () {
            var lydo = $("#lydokhac").val();
            $('#lydo:checked').each(function () {
                if (lydo === '') {
                    lydo = lydo + $(this).val();
                } else {
                    lydo = lydo + ',' + $(this).val();
                }
            });

            var yeutochon = $("#yeutochonkhac").val();
            $('#yeutochon:checked').each(function () {
                if (yeutochon === '')
                    yeutochon = yeutochon + $(this).val();
                else
                    yeutochon = yeutochon + ',' + $(this).val();
            });

            var clb = $("#clb").val();
            var hailong = $("#count-existing").html();
            var noikhac = $("#noikhac").val();
            var dogood = $("#dogood").val();
            var improve = $("#improve").val();
            var workshop = $("#workshop").val();
            var chiase = $("#chiase").val();


// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'clb=' + clb + '&hailong=' + hailong + '&noikhac=' + noikhac
                + '&dogood=' + dogood + '&improve=' + improve + '&lydo=' + lydo + '&yeutochon=' + yeutochon
                + '&workshop=' + workshop + '&chiase=' + chiase + '&studentid=' + '<?php echo $user['id']; ?>';
//            alert(dataString);
            if (clb == '' || hailong == '' || noikhac == '' || dogood == '' || improve == '' || workshop == '' || chiase == '' || lydo == '' || yeutochon == '') {
                alert("Please Fill All Fields");
            } else {
// AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('hocvien/home/receive_survey') ?>",
                    data: dataString,
                    cache: false,
                    success: function (result) {
//                        $("#step-1").html(result);

                        $('#myModal').modal('hide');
                        $('#modal-nopbai').modal('show');
                        $(".actionBar .btn-success").removeClass('buttonDisabled');
                    }

                });
            }
            return false;

        });

        //        $("#uploadbaigiuaki").on('submit', function (e) {
        //            e.preventDefault();
        //            $("#message-nopbai").html('<img src="public/resources/images/page-loader.gif"/>');
        //            $.ajax({
        //                url: "<?php //echo base_url('hocvien/home/nop_baigiuaki') ?>//", // Url to which the request is send
        //                type: "POST",             // Type of request to be send, called as method
        //                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        //                contentType: false,       // The content type used when sending data to the server.
        //                cache: false,             // To unable request pages to be cached
        //                processData: false,        // To send DOMDocument or non processed data file it is set to false
        //                success: function (data)   // A function to be called if request succeeds
        //                {
        //                    $("#message-nopbai").html(data);
        //                    setTimeout(function () {
        //                        $(".alert").fadeOut().empty();
        //                    }, 3000);
        //                }
        //            });
        //        });

        //        $("#submitBaiGiuaki").click(function () {
        //
        //            var baigiuaki = $("#baigiuaki").val();
        //// Returns successful data submission message when the entered information is stored in database.
        //            var dataString = 'baigiuaki=' + baigiuaki;
        ////            alert(dataString);
        //            if (baigiuaki == '') {
        //                alert("Bạn chưa điền link bài giữa kì");
        //            } else {
        //                // AJAX Code To Submit Form.
        //                $.ajax({
        //                    type: "POST",
        //                    url: "<?php //echo base_url('hocvien/home/nop_baigiuaki') ?>//",
        //                    data: dataString,
        //                    cache: false,
        //                    success: function (result) {
        //                        $("#step-2").append(result);
        //                    }
        //                });
        //            }
        //            return false;
        //
        //        });
    })
    ;


</script>



