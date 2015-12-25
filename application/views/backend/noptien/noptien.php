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
                    <?php
                    if (isset($confirm)) {
                        echo "
                        $confirm;
                    ";
                    }
                    ?>


                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <tr>
                                <td colspan="2"><a href="<?php echo base_url('backend/student/danhsachnoptien'); ?>"
                                                   class="btn btn-primary">Quay về trang danh sách nộp tiền</a></td>
                            </tr>
                            <tr>
                                <td>Mã học viên</td>
                                <th id="thmahocvien">
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
                                <td>Số điện thoại</td>
                                <th><?php echo $student['phone'] ?></th>
                            </tr>

                            <?php

                            $temp =
                                "

                                        <tr>
                                            <td>Tên khóa học</td>
                                            <th>" . $class["coursename"] . "</th>
                                        </tr>
                                        <tr>
                                            <td>Thời gian học</td>
                                            <th>" . $class["studyday"] . "</th>
                                        </tr>
                                    ";
                            if (!empty($class["leadname"])) {
                                $temp .=
                                    "
                                        <tr>
                                            <td>Tên nhóm trưởng</td>
                                            <th>" . $class['leadname'] . "</th>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại nhóm trưởng</td>
                                            <th>" . $class['leadphone'] . "</th>
                                        </tr>
                                        ";
                            }
                            $temp .=
                                "<tr>
                                      <td>Học phí</td>
                                      <th>" . $class['price'] . " vnđ</th>
                                 </tr>";
                            echo $temp;

                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($paid < 0) {
            echo
            "
            <div class=\"row\">
            <div class=\"col-xs-12\">
                <div class=\"card\">
                    <div class=\"card-header\">
                        <div class=\"card-title\">
                            <div class=\"title\">Thu tiền</div>
                        </div>
                    </div>
                    <div class=\"card-body\">
                        <form class=\"form-horizontal\" method=\"post\">
                            <div class='alert alert-info text-center' style='color:white;background-color: #c50000'>
                            Mã học viên cuối cùng nhập: $lastestrealid
                            </div>

                            <div class=\"form-group\">
                                <label for=\"realid\" class=\"col-sm-3 control-label\">Mã sinh viên</label>

                                <div class=\"col-sm-5\">
                                    <input type=\"text\" class=\"form-control\" name='masinhvien' id=\"realid\"
                                           placeholder=\"Mã sinh viên\">
                                </div>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"hocphi\" class=\"col-sm-3 control-label\">Học phí</label>

                                <div class=\"col-sm-5\">
                                    <input type=\"number\" class=\"form-control\" id=\"hocphi\" name='hocphi' placeholder=\"Học Phí\">
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"note\" class=\"col-sm-3 control-label\">Ghi chú</label>

                                <div class=\"col-sm-5\">
                                    <textarea  class=\"form-control\" id=\"note\" name='note' placeholder=\"Ghi chú\">
                                    </textarea>
                                </div>
                            </div>


                            <div class=\"form-group\">
                                <div class=\"col-sm-offset-3 col-sm-5\">
                                    <button type=\"button\" class=\"btn btn-primary float-left\" data-toggle=\"collapse\"
                                            data-target=\"#demo\">Thu tiền
                                    </button>
                                    <div id=\"demo\" class=\"collapse\">

                                        <button id='btnxacnhan' name='btnxacnhan' value='xacnhannoptien' type=\"submit\" class=\"btn btn-danger float-left\">Xác
                                            nhận
                                        </button>
                                        <div class='alert-danger float-left' style='margin-left: 10px'>
                                            Kiểm tra kĩ chưa, không sửa lại được đâu đó!!!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            ";

        }
        ?>

    </div>
</div>
</div>
