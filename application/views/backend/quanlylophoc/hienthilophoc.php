<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">Quản lý lớp học</span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Danh sách môn học</div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="card-title">
                            <a href="<?php echo base_url('backend/quanlylophoc/create_course'); ?>" class="btn btn-primary">Tạo Course</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên môn</th>
                                <th>Thời lượng</th>
                                <th>Phân loại</th>
                                <th>Mô tả</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($courses as $course) {
                                $i++;
                                $url = base_url("backend/quanlylophoc/update_monhoc/$course->id");
                                echo "
                            <tr>
                                <th scope=\"row\">$i</th>
                                <td><a href='$url' class='btn btn-default' style='background-color: $course->mamau;color: white;width: 100%'>$course->name</a></td>
                                <td>$course->duration</td>
                                <td>$course->category</td>
                                <td>$course->description</td>
                            </tr>
                            ";
                            }
                            ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Danh sách Lớp học</div>
                        </div>

                    </div>
                    <div class="card-body">
                        <select style="width: 150px">
                            <?php

                            foreach ($gens as $gen) {
                                echo "<option value=\"$gen->gen\">Khoá $gen->gen</option>";
                            }
                            echo "</optgroup>";

                            ?>
                        </select>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên lớp</th>
                                <th>Buổi học</th>
                                <th>Giảng viên</th>
                                <th>Trợ giảng</th>
                                <th>Chỉ tiêu đăng ký</th>
                                <th>Số người đã đăng ký</th>
                                <th>Số người đã nộp tiền</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($classes as $class) {
                                $url = base_url("backend/quanlylophoc/update_lophoc/$class->classid");
                                $kichhoat = "backend/quanlylophoc/sendkichhoat/" . $class->classid;
                                if ($class->activated==0) {
                                    $kichhoat = "<a href='$kichhoat' class='btn btn-default' style='background-color: #c50000;color: white;width: 100%'>Kích hoạt</a>";
                                } else {
                                    $kichhoat = "<a href='$kichhoat' disabled class='btn btn-default' style='background-color: #c50000;color: white;width: 100%'>Kích hoạt</a>";
                                }

                                $i++;
                                $isCheck = ($class->isopen == 0) ? "checked" : "unchecked";
                                $phantram = $class->songuoinoptien / $class->chitieu * 100;
                                echo "
                            <tr>
                                <th scope=\"row\">$i</th>
                                <td><a href='$url' class='btn btn-default' style='background-color: $class->mamau;color: white;width: 100%'>Lớp " . $class->gen . "." . $class->name . "</a></td>

                                <td>$class->studyday</td>
                                <td>$class->lecturername</td>
                                <td>$class->taname</td>
                                <td>$class->chitieu</td>
                                <td>$class->songuoidangky</td>
                                <td> <div class=\"progress\" style='background-color: #888888'>
                                            <div class=\"progress-bar\"   role=\"progressbar\" aria-valuenow=\"" . $class->songuoinoptien . "\" aria-valuemin=\"0\" aria-valuemax=\"" . $class->chitieu . "\" style=\"width: $phantram%;\">
                                                " . $class->songuoinoptien . "/" . $class->chitieu . "
                                            </div>
                                        </div>
                                </td>
                                <td>
                                <input onchange='dongmoform($class->classid)' $isCheck  type=\"checkbox\" data-toggle=\"toggle\" data-on=\"Đang mở form\" data-off=\"Đã đóng form\">

                                </td>
                                <td>
                                $kichhoat
                                </td>
                            </tr>
                            ";
                            }
                            ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">

    function dongmoform(classid, checked) {
        var e = window.event;
        var btn = e.target || e.srcElement;

        if (checked == 0) {
            checked = 1;
        } else {
            checked = 0;
        }
        var link = "<?php echo base_url("backend/quanlylophoc/ajaxdongbatform/"); ?>" + "/" + classid;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                $(btn).prop('checked', xhttp.responseText);
            }
        };
        xhttp.open("GET", link, true);
        xhttp.send();
    }
</script>
