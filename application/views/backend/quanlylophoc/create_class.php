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

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="id">Tên lớp</label>

                                    <div class="col-md-4">
                                        <input id="name" name="name" type="text"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="studentnumbers">Chỉ tiêu</label>

                                    <div class="col-md-4">
                                        <input id="studentnumbers" name="studentnumbers" type="text"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="room">Phòng học</label>

                                    <div class="col-md-4">
                                        <input id="room"
                                               type="datetime" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="startdate">Ngày khai giảng</label>

                                    <div class="col-md-4">
                                        <input id="startdate"
                                               name="startdate" type="date" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="gen">Khóa</label>

                                    <div class="col-md-4">
                                        <input id="gen"
                                               name="gen" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="studyday">Thời gian học</label>

                                    <div class="col-md-4">
                                        <input id="studyday"
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

                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="button1id"></label>
                                    <div class="col-md-8">
                                        <input id="submit" name="submit" type="submit" value="Xác nhận" class="btn btn-success"/>
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
    </div>
</div>
</div>
<script>

    setTimeout(function () {
        $("#lectureContainer").fadeOut().empty();
    }, 3000);


</script>