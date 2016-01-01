<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">Phân công trực</span>

            <div class="description">Đăng kí lịch trực trong đợt tuyển sinh</div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Thêm đợt tuyển sinh mới</div>
                </div>
            </div>
            <div class="card-body ">
                <div class="row no-margin">
                    <?php
                    foreach ($ngay_trucs as $ngay_truc) {
                        ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="card primary">
                                <div class="card-body">
                                    <h4><?php echo format_date_from_db($ngay_truc['ngaytruc']) ?></h4>
                                    <?php
                                    foreach ($luot_trucs as $luot_truc) {
                                        if ($luot_truc['ngaytruc'] === $ngay_truc['ngaytruc']) {
                                            if ($luot_truc['status'] == 0) {
                                                $status = "<span class='float-right'>Chưa có ng trực</span>";
                                            } else {
                                                $status = "<span class='float-right'>".$luot_truc['fullname']."</span>";
                                            }
                                            ?>
                                            <div
                                                class="sub-title"><?php echo 'Ca '.$luot_truc['stt'].': <strong>'.$luot_truc['starttime'] . "-" . $luot_truc['endtime'] . "</strong>" . $status ?></div>
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
    </div>
</div>
