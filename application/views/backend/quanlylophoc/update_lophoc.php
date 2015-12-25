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
                            <div class="title">Sửa thông tin lớp học</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <?php
                                if (isset($confirm)) {
                                    $url = base_url('backend/quanlylophoc/hienthilophoc');
                                    echo "<div class='text-center alert alert-success text-success'>$confirm     <a href='$url' class='text-capitalize btn btn-primary'>Back</a></div>";
                                }
                                ?>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="id">Mã lớp</label>

                                    <div class="col-md-4">
                                        <input readonly id="id" name="id" type="text"
                                               value='<?php echo common_value_post($class['id']) ?>'
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="id">Tên lớp</label>

                                    <div class="col-md-4">
                                        <input id="name" name="name" type="text"
                                               value='<?php echo common_value_post($class['name']) ?>'
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="studentnumbers">Chỉ tiêu</label>

                                    <div class="col-md-4">
                                        <input value='<?php echo common_value_post($class['studentnumbers']) ?>'
                                               id="studentnumbers" name="studentnumbers" type="text"
                                               class="form-control input-md">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="nhanvien">Người sửa/tạo</label>

                                    <div class="col-md-4">
                                        <input disabled
                                               value=' <?php echo common_value_post($class['nhanvien']['fullname']) ?> '
                                               id="nhanvien" name="nhanvien" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="room">Phòng học</label>

                                    <div class="col-md-4">
                                        <input id="room"
                                               value=' <?php echo common_value_post($class['room']) ?> ' name="room"
                                               type="datetime" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="startdate">Ngày khai giảng</label>

                                    <div class="col-md-4">
                                        <input id="startdate"
                                               value='<?php echo date("Y-m-d", strtotime($class['startdate'])) ?>'
                                               name="startdate" type="date" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="gen">Khóa</label>

                                    <div class="col-md-4">
                                        <input id="gen" value=' <?php echo common_value_post($class['gen']) ?>'
                                               name="gen" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="studyday">Thời gian học</label>

                                    <div class="col-md-4">
                                        <input id="studyday"
                                               value=' <?php echo common_value_post($class['studyday']) ?>'
                                               name="studyday" type="text" placeholder="Mã màu"
                                               class="form-control input-md">
                                    </div>
                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="chitieu">Môn học</label>

                                    <div class="col-md-4">
                                        <select id="courseid" name="courseid" class="form-control">
                                            <?php
                                            foreach ($courses as $course) {
                                                $selected = ($course->id == $class['courseid']) ? "selected" : "";
                                                echo "
                        <option $selected value='$course->id'>$course->name</option>
                        ";
                                            }
                                            ?>


                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="lecturerid">Giảng viên</label>

                                    <div class="col-md-4">
                                        <select id="lecturerid" name="lecturerid" class="form-control">
                                            <?php
                                            foreach ($nhanviens as $nhanvien) {
                                                $selected = ($nhanvien->id == $class['lecturerid']) ? "selected" : "";
                                                echo "
                        <option $selected value='$nhanvien->id'>$nhanvien->fullname</option>
                        ";
                                            }
                                            ?>


                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="taid">Trợ giảng</label>

                                    <div class="col-md-4">
                                        <select id="taid" name="taid" class="form-control">
                                            <?php
                                            foreach ($nhanviens as $nhanvien) {
                                                $selected = ($nhanvien->id == $class['taid']) ? "selected" : "";
                                                echo "
                        <option $selected value='$nhanvien->id'>$nhanvien->fullname</option>
                        ";
                                            }
                                            ?>


                                        </select>

                                    </div>
                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="updated">Ngày cập nhật</label>

                                    <div class="col-md-4">
                                        <input id="updated"
                                               value=' <?php echo common_value_post($class['updated']) ?>'
                                               name="updated" type="datetime" disabled placeholder="Ngày cập nhật"
                                               class="form-control input-md">

                                    </div>
                                </div>


                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="button1id"></label>

                                    <div class="col-md-8">
                                        <button id="submit" name="submit" type="submit" class="btn btn-success">Xac
                                            nhan
                                        </button>
                                        <button id="reset" name="reset" type="reset" class="btn btn-danger">Reset
                                        </button>
                                    </div>
                                </div>

                            </fieldset>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="lecture">
            <div class="col-xs-12">
                <div class="card">

                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Danh sách các buổi học</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php
                        if ($status == 1){
                            echo "<div id=\"lectureContainer\" class=\"alert alert-success text-center text-capitalize\">Sửa thành công</div>";
                        }
                        ?>

                        <form action="<?php echo base_url('backend/quanlylophoc/update_day/'.$classid); ?>" method="post">
                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th>Số thứ tự</th>
                                    <th>Tên buổi</th>
                                    <th>Số học viên</th>
                                    <th>Ngày học</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php

                                foreach ($lectures as $lecture) {
                                    $day = date("Y-m-d", strtotime($lecture->day));
                                    echo
                                    "
                  <tr>
                    <td>$lecture->order</td>
                    <td>$lecture->name</td>
                    <td>$lecture->students</td>
                    <td><input type='date' class='form-control' name='$lecture->id' value='$day' /></td>
                  </tr>
                  ";
                                }
                                ?>

                                </tbody>

                            </table>
                            <div>
                                <input type="submit" class="btn btn-primary" id="btnSubmit" value="submit"></td>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<script>

    setTimeout(function(){
        $("#lectureContainer").fadeOut().empty();
    },3000);


</script>