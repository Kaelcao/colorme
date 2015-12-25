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
                            <div class="title">Sửa thông tin môn học</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <?php
                                if (isset($confirm)) {
                                    $url = base_url('backend/quanlylophoc/hienthilophoc');
                                    echo "<div class='text-center alert text-success'>$confirm     <a href='$url' class='text-capitalize btn btn-primary'>Back</a></div>";
                                }
                                ?>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="courseid">Mã môn học</label>
                                    <div class="col-md-4">
                                        <input id="courseid" name="courseid" type="text" placeholder="Mã môn học"
                                               value='<?php echo common_value_post($course['id']) ?>'
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="coursename">Tên môn</label>
                                    <div class="col-md-4">
                                        <input value='<?php echo common_value_post($course['name']) ?>' id="coursename"
                                               name="coursename" type="text" placeholder="Tên môn"
                                               class="form-control input-md">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="coursename">Người sửa/tạo</label>
                                    <div class="col-md-4">
                                        <input disabled
                                               value=' <?php echo common_value_post($course['nhanvien']['fullname']) ?> '
                                               id="nhanvien" name="nhanvien" type="text" placeholder="Tên môn"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="created">Ngày tạo</label>
                                    <div class="col-md-4">
                                        <input id="created" disabled
                                               value=' <?php echo common_value_post($course['created']) ?> '
                                               name="created" type="datetime" placeholder="Ngày tạo"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="category">Phân loại</label>
                                    <div class="col-md-4">
                                        <input id="category"
                                               value=' <?php echo common_value_post($course['category']) ?> '
                                               name="category" type="text" placeholder="Phân loại"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price">Học phí</label>
                                    <div class="col-md-4">
                                        <input id="price" value=' <?php echo common_value_post($course['price']) ?>'
                                               name="price" type="text" placeholder="Học phí"
                                               class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="mamau">Mã màu</label>
                                    <div class="col-md-4">
                                        <input id="mamau" value=' <?php echo common_value_post($course['mamau']) ?>'
                                               name="mamau" type="text" placeholder="Mã màu"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="duration">Độ dài khóa học (buổi)</label>
                                    <div class="col-md-4">
                                        <input id="duration"
                                               value=' <?php echo common_value_post($course['duration']) ?>'
                                               name="duration" type="text" placeholder="Độ dài khóa học (buổi)"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="chitieu">Chỉ tiêu</label>
                                    <div class="col-md-4">
                                        <input id="chitieu" value=' <?php echo common_value_post($course['chitieu']) ?>'
                                               name="chitieu" type="text" placeholder="Chỉ tiêu"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="updated">Ngày cập nhật</label>
                                    <div class="col-md-4">
                                        <input id="updated" value=' <?php echo common_value_post($course['updated']) ?>'
                                               name="updated" type="datetime" disabled placeholder="Ngày cập nhật"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="description">Mô tả</label>
                                    <div class="col-md-4">
                                        <input id="description"
                                               value=' <?php echo common_value_post($course['description']) ?>'
                                               name="description" type="text" placeholder="Mô tả"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="detail">Chi tiết</label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="detail"
                                                  name="detail"><?php echo common_value_post($course['detail']) ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkphanmemmac">Link phần mềm Mac</label>
                                    <div class="col-md-4">
                                        <input id="linkphanmemmac"
                                               value='<?php echo common_value_post($course['linkphanmemmac']) ?>'
                                               name="linkphanmemmac" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkphanmemwindow">Link phần mềm
                                        Windows</label>
                                    <div class="col-md-4">
                                        <input id="linkphanmemwindow"
                                               value=' <?php echo common_value_post($course['linkphanmemwindow']) ?>'
                                               name="linkphanmemwindow" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linktimeline">Link timeline</label>
                                    <div class="col-md-4">
                                        <input id="linktimeline"
                                               value=' <?php echo common_value_post($course['linktimeline']) ?>'
                                               name="linktimeline" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price">link nội quy</label>
                                    <div class="col-md-4">
                                        <input id="linknoiquy"
                                               value=' <?php echo common_value_post($course['linknoiquy']) ?>'
                                               name="linknoiquy" type="text" class="form-control input-md">

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

        <div class="row" id="suabuoihoc">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Sửa thông tin các buổi học</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên buổi</th>
                                <th>Mô tả</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <?php
                            foreach ($lectures as $lecture) {
                                $link=base_url("backend/quanlylophoc/update_lecture/".$course['id']."/".$lecture->id);
                                echo
                                "
                                <tr>
                                    <td>$lecture->order</td>
                                    <td>$lecture->name</td>
                                    <td>$lecture->description</td>
                                    <td>
                                        <a href='$link' class='btn btn-warning btn-round'>Sửa</a>
                                    </td>
                                </tr>
                                ";
                            }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
    </div>
</div>
