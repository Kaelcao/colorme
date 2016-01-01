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
                            ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="card primary">
                                    <div class="card-body">
                                        <h4><?php echo format_date_from_db($ngay_truc['ngaytruc']) ?></h4>
                                        <?php
                                        foreach ($luot_trucs as $luot_truc) {
                                            if ($luot_truc['ngaytruc'] === $ngay_truc['ngaytruc']) {
                                                if ($luot_truc['status'] == 0) {
                                                    $status = "<span class='float-right'><a style='position: relative;bottom: 10px;' href='".$current_url."&luot_truc_id=" . $luot_truc['id'] . "' class='btn btn-success'>Đăng kí</a></span>";
                                                } else {
                                                    $status = "<span class='float-right'>" . $luot_truc['fullname'] . "</span>";
                                                }
                                                ?>
                                                <div
                                                    class="sub-title"><?php echo 'Ca ' . $luot_truc['stt'] . ': <strong>' . $luot_truc['starttime'] . "-" . $luot_truc['endtime'] . "</strong>" . $status ?></div>
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
