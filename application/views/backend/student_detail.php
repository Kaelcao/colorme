<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">Student Information</span>

            <div class="description">Information of Students includes Course detail, Personal information</div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">THÔNG TIN CÁ NHÂN</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>Mã học viên</td>
                                <th>
                                    <?php
                                    if (!empty($student['realid']))
                                        echo $student['realid'];
                                    else {
                                        echo 'Chưa khởi tạo';
                                    }
                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <td>Họ và tên</td>
                                <th><?php echo $student['fullname'] ?></th>
                            </tr>
                            <tr>
                                <td>Ngày sinh</td>
                                <th><?php echo $student['dob'] ?></th>
                            </tr>
                            <tr>
                                <td>Giới tính</td>
                                <th><?php echo $student['gender'] ?></th>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <th><?php echo $student['email'] ?></th>
                            </tr>
                            <tr>
                                <td>Nơi làm việc/học tập</td>
                                <th><?php echo $student['workplace'] ?></th>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <th><?php echo $student['address'] ?></th>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <th><?php echo $student['phone'] ?></th>
                            </tr>
                            <tr>
                                <td>Vị trí công tác</td>
                                <th><?php echo $student['position'] ?></th>
                            </tr>
                            <tr>
                                <td>Ngày khởi tạo</td>
                                <th><?php echo $student['created'] ?></th>
                            </tr>
                            <tr>
                                <td>Biết đến ColorME qua</td>
                                <th><?php echo $student['howknow'] ?></th>
                            </tr>
                            <tr>
                                <td>Facebook</td>
                                <th><?php echo $student['facebook'] ?></th>
                            </tr>
                        </table>
                        <!--                        <a class='btn btn-primary'-->
                        <!--                           href="-->
                        <?php //echo base_url('backend/student/update_student/' . $student['id']); ?><!--">Update-->
                        <!--                            Personal Information</a>-->
                        <!--                        <a class='btn btn-danger' onclick='return confirm("Are You Sure?")'-->
                        <!--                           href="-->
                        <?php //echo base_url('backend/student/delete_student/' . $student['id']); ?><!--">Delete-->
                        <!--                            This Student</a>-->
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">KHÓA HỌC ĐĂNG KÍ</div>
                        </div>
                        <div class="card-body">

                            <?php
                            foreach ($classes as $class) {
                                $temp =
                                    "
                                    <table class=\"table table-striped table-bordered\">
                                        <tr>
                                            <td>Tên khóa học</td>
                                            <th>$class->name</th>
                                        </tr>
                                        <tr>
                                            <td>Mô tả</td>
                                            <th>$class->description</th>
                                        </tr>
                                        <tr>
                                            <td>Loại khóa học</td>
                                            <th>$class->category</th>
                                        </tr>
                                        <tr>
                                            <td>Thời gian đăng kí</td>
                                            <th>$class->registime</th>
                                        </tr>
                                        <tr>
                                            <td>Số buổi</td>
                                            <th>$class->duration</th>
                                        </tr>
                                        <tr>
                                            <td>Thời gian học</td>
                                            <th>$class->studyday</th>
                                        </tr>
                                        <tr>
                                            <td>Số lượng học viên mỗi lớp</td>
                                            <th>$class->studentnumbers</th>
                                        </tr>
                                    ";
                                if (!empty($class->leadname)) {
                                    $temp .=
                                        "
                                        <tr>
                                            <td>Tên nhóm trưởng</td>
                                            <th>$class->leadname</th>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại nhóm trưởng</td>
                                            <th>$class->leadphone</th>
                                        </tr>
                                        ";
                                }
                                $temp .=
                                    "
                                        <tr>
                                            <td>Học phí</td>
                                            <th>$class->price vnđ</th>
                                        </tr>
                                        <tr>
                                            <td>Học phí đã đóng</td>
                                            <th>$class->paid vnđ</th>
                                        </tr>
                                        ";
                                echo $temp . "</table>";

                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                        <form class="form-horizontal" action="" method="post">

                            <div class="form-group">
                                <label for="ngayhen" class="col-sm-3 control-label">Ngày hẹn</label>

                                <div class="col-sm-5">
                                    <input type="date" value="<?php
                                    echo isset($student['ngayhen']) ? date("Y-m-d", strtotime($student['ngayhen'])) : "";
                                    ?>" class="form-control" name='ngayhen' id="ngayhen">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="note" class="col-sm-3 control-label">Ghi chú</label>

                                <div class="col-sm-5">
                                            <textarea class="form-control" id="notegoidien" name='notegoidien'><?php
                                                echo isset($student['notegoidien']) ? $student['notegoidien'] : "";
                                                ?></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5
                                        ">
                                    <button type="button" class="btn btn-primary float-left
                                        " data-toggle="collapse"
                                            data-target="#demo">Xác nhận
                                    </button>
                                    <div id="demo" class="collapse">
                                        <button id='btnxacnhan' name='btnxacnhan' value='btnxacnhan'
                                                type="submit" class="btn btn-danger float-left
                                            ">Xác
                                            nhận
                                        </button>
                                        <div class='alert-danger float-left' style='margin-left: 10px'>
                                            Kiểm tra kĩ chưa
                                        </div>
                                    </div>
                                    <?php

                                    ?>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
