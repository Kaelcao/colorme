<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">

        </div>


        <div class="row">            

            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Sửa thông tin buổi học</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if (!empty($message)) {
                            echo $message;
                        }
                        ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <?php
                                if (isset($confirm)) {
                                    $url = base_url('backend/quanlylophoc/hienthilophoc');
                                    echo "<div class='text-center alert alert-success text-success'>$confirm     <a href='$url' class='text-capitalize btn btn-primary'>Back</a></div>";
                                }
                                ?>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="id">Tên lớp</label>

                                    <div class="col-md-4">
                                        <input id="name" name="name" type="text"
                                               value='<?php echo common_value_post($lecture['name']) ?>'
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="description">Mô tả</label>

                                    <div class="col-md-4">
                                        <textarea
                                            id="description" name="description" type="text" rows="4"
                                            class="form-control input-md"><?php echo common_value_post($lecture['description']) ?></textarea>

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkgiaotrinh">Giáo trình</label>

                                    <div class="col-md-4">
                                        <input id="linkgiaotrinh"
                                               value=' <?php echo common_value_post($lecture['linkgiaotrinh']) ?> '
                                               name="linkgiaotrinh"
                                               type="datetime" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkyoutube">Youtube</label>

                                    <div class="col-md-4">
                                        <input id="linkyoutube"
                                               value='<?php echo $lecture['linkyoutube']; ?>'
                                               name="linkyoutube" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkanh">Ảnh</label>
                                    <div class="col-md-4">
                                        <p>Kích cỡ tối đa 2 Mb: Kích thước cần là: 800x600</p>
                                        <input type="file" name="userfile" size="20"/>
                                    </div>

                                </div>

                                <div class="form-group">


                                    <div class="col-md-4 col-md-offset-4">

                                        <img src="<?php echo common_value_post($lecture['linkanh']) ?>" width="400"/>
                                    </div>

                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="order">Số thứ tự buổi</label>

                                    <div class="col-md-4">
                                        <input id="order"
                                               value=' <?php echo common_value_post($lecture['order']) ?>'
                                               name="order" type="text"
                                               class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="button1id"></label>

                                    <div class="col-md-8">
                                        <input id="submit" name="submit" type="submit" class="btn btn-success"
                                               value="submit"/>


                                        <button id="reset" name="reset" type="reset" class="btn btn-danger">Reset
                                        </button>
                                        <a id="back" name="back"
                                           href="<?php echo base_url("backend/quanlylophoc/update_monhoc/$courseid#suabuoihoc") ?>"
                                           class="btn btn-primary">Trở về
                                        </a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Giáo trình cho giảng viên</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div id="message"></div>
                            <button id="save" class="btn btn-default">Save</button>

                        </div>
                        <textarea id="soangiaotrinh">  
                            <?php echo $lecture['giaotrinh']; ?>
                        </textarea>

                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Giáo trình cho học viên</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div id="message-hocvien"></div>
                            <button id="savegiaotrinhhocvien" class="btn btn-default">Save</button>

                        </div>
                        <textarea id="giaotrinhhocvien">  
                            <?php echo $lecture['giaotrinhhocvien']; ?>
                        </textarea>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<script src="//cdn.ckeditor.com/4.5.6/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('soangiaotrinh', {
        height: 600
    });
    CKEDITOR.replace('giaotrinhhocvien', {
        height: 600
    });
    $("#savegiaotrinhhocvien").click(function () {
        var giaotrinh = CKEDITOR.instances.giaotrinhhocvien.getData();
        ;
        $.post("<?php echo base_url('backend/quanlylophoc/ajax_update_giaotrinh_hocvien') ?>",
                {
                    giaotrinhhocvien: giaotrinh,
                    lectureid: <?php echo $lecture['id'] ?>
                },
                function (data, status) {
                    $('#message-hocvien').html(data);
                    setTimeout(function () {
                        $(".alert").fadeOut().empty();
                    }, 3000);
                });
    });
    $("#save").click(function () {
        var giaotrinh = CKEDITOR.instances.soangiaotrinh.getData();
        ;
        $.post("<?php echo base_url('backend/quanlylophoc/ajax_update_giaotrinh') ?>",
                {
                    giaotrinh: giaotrinh,
                    lectureid: <?php echo $lecture['id'] ?>
                },
                function (data, status) {
                    $('#message').html(data);
                    setTimeout(function () {
                        $(".alert").fadeOut().empty();
                    }, 3000);
                });
    });
    setTimeout(function () {
        $(".alert").fadeOut().empty();
    }, 2000);

</script>