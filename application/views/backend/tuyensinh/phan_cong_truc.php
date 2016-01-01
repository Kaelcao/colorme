<div class="container-fluid">

    <div class="side-body">
        <div class="page-title">
            <span class="title">Phân công trực</span>

            <div class="description">Đăng kí lịch trực trong đợt tuyển sinh</div>
        </div>
        <?php
        if ($message = $this->session->flashdata('message')) {
            echo $message;
        }
        ?>
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Chọn đợt tuyển sinh</div>
                </div>
            </div>
            <div class="card-body">
                <form method="get">
                    <div class="form-group">
                        <select class="form-control" name="dot_tuyen_sinh">
                            <?php
                            foreach ($dot_tuyen_sinhs as $dot_tuyen_sinh) {
                                $selected = '';
                                if ($dot_tuyen_sinh['id'] == $dot_tuyen_sinh_id) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option <?php echo $selected; ?>
                                    value="<?php echo $dot_tuyen_sinh['id'] ?>"><?php echo $dot_tuyen_sinh['name'] . ", từ " . $dot_tuyen_sinh['startdate'] . " đến " . $dot_tuyen_sinh['enddate']; ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>
                    <input type="submit" class="btn btn-default" value="Chọn"/>
                </form>
            </div>
        </div>
        <?php
        if (!empty($luot_trucs)) {
            ?>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="title">Lịch trực</div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row no-margin">
                        <?php
                        foreach ($ngay_trucs as $ngay_truc) {
                            $date = $ngay_truc['ngaytruc'];
                            ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="card primary">
                                    <div class="card-body" style="border: #D9D9D9 1px solid;background:#FAFAFA;">
                                        <h2><?php echo rebuild_date('l', strtotime($date)) ?></h2>
                                        <h4>
                                            <?php echo rebuild_date('jS F Y', strtotime($date)); ?>
                                        </h4>
                                        <?php
                                        foreach ($luot_trucs as $luot_truc) {
                                            if ($luot_truc['ngaytruc'] === $ngay_truc['ngaytruc']) {
                                                if ($luot_truc['status'] == 0) {
                                                    ?>
                                                    <div class='sub-title'>
                                                        <a style='width:100%;position: relative;bottom: 10px;'
                                                           href='<?php echo $current_url . "&luot_truc_id=" . $luot_truc['id'] ?>'
                                                           class='btn btn-success'>
                                                            <?php echo 'Ca ' . $luot_truc['stt'] . ': <strong>' . date('h\hm', strtotime($luot_truc['starttime'])) . "-" . date('h\hm', strtotime($luot_truc['endtime'])) . "</strong>" ?>
                                                            Bấm để Đăng kí
                                                        </a>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class='sub-title'>
                                                        <div class="btn btn-default" disabled
                                                             style="width: 100%;color: white;background-color:<?php echo $luot_truc['mamau']; ?>"><?php echo 'Ca ' . date('h\hm', strtotime($luot_truc['starttime'])) . ': <strong>' . $luot_truc['starttime'] . "-" . date('h\hm', strtotime($luot_truc['endtime'])) . "</strong>" ?>  <?php echo $luot_truc['fullname']; ?></div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<script>
    setTimeout(function () {
        $(".alert").fadeOut().empty();
    }, 3000);
</script>
