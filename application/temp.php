<div class="x_panel tile">
    <div class="x_title">
        <h2>Nộp bài cuối kì (6 files jpg/png)</h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <button style="width: 100%" type="button" class="btn btn-info btn-lg" id="btn-nop-bai-ck">Nộp bài cuối
            kì
        </button>
        <div id="anh-ck">
            <?php
            if (!empty($bai_cks)) {
                foreach ($bai_cks as $bai_ck) {
                    ?>

                    <div id="<?php echo $bai_ck['id']; ?>"
                         style='position: relative;margin-left:10px;margin-top:10px;top:48px;'>
                        <button type='button' class='btn btn-primary' style='float: left' data-toggle='collapse'
                                data-target='#btn-xac-nhan-<?php echo $bai_ck['id']; ?>'>Xóa
                        </button>


                        <div id='btn-xac-nhan-<?php echo $bai_ck['id']; ?>' class='collapse'>

                            <button class='btn btn-danger' onclick="xoaBaiCk(<?php echo $bai_ck['id']; ?>)">Xác
                                nhận
                            </button>
                        </div>


                    </div>
                    <img src="<?php echo base_url($bai_ck['source']) ?>" id="img<?php echo $bai_ck['id']; ?>"
                         style="width:100%;margin-bottom:5px;"/>
                    <?php
                }
            }

            ?>


        </div>

    </div>
</div>

<div class="x_panel tile">
    <div class="x_title">
        <h2>Nộp bài tập giữa kì (1 file jpg/png)</h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <button style="width: 100%" type="button" class="btn btn-info btn-lg" id="btn-nop-bai-gk">Nộp bài giữa
            kì
        </button>
        <div id="anh-giua-ki">
            <?php echo !empty($linkbaigiuaki) ? '<img src="' . base_url($linkbaigiuaki) . '" style="width:100%"/>' : ""; ?>
        </div>
    </div>
</div>

INSERT INTO `cm_album`( `studentid`, `lectureOrder`)
(SELECT cm_post.studentid, cm_post.lectureOrder
from cm_post
GROUP BY studentid, lectureOrder)

UPDATE `cm_post` p
set albumid = (select id
from cm_album where p.studentid = cm_album.studentid and p.lectureOrder = cm_album.lectureOrder )


