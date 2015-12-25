<div class="container-fluid" id="main-content">
    <div class="side-body">
        <div class="page-title">
            <span class="title"><?php echo $table_name; ?></span>

            <div class="description"><?php echo $table_description; ?></div>
        </div>
        <div class="row">

            <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Tìm kiếm theo tên" id="tele_sale_searchbox"/>


                <table class="table table-striped">
                    <!--                    <td id='called" . $student->id . $student->classid . "'>$called</td>-->
                    <thead>
                    <tr>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Lịch học</th>
                        <th>Số lần gọi</th>
                        <th>Hành động</th>
                        <th>Ghi chú</th>
                        <th>Ngày hẹn</th>
                        <th>Người gọi</th>
                    </tr>
                    </thead>
                    <tbody id="tablebody">
                    <?php

                    foreach ($students as $student) {


                        /*
                         * 0: Chua goi
                         * 1: Da goi
                         * 2: Dang goi
                         */

                        $called = $student->called;
                        $class = ($called == 2) ? "calledbutton" : "";

                        if ($called == 0) {
                            $called = "Chưa gọi";
                        } else if ($called == 1) {
                            $called = "Đã gọi";
                        } else {
                            $called = "Đang gọi";
                        }
                        $disabled = ($student->called == 1 || $student->called == 2) ? "disabled" : "";
                        $disabled2 = (($student->called == 2 && $user['id'] != $student->callerid) || ($student->called == 1)) ? "disabled" : "";
                        $linkthongtin = base_url('backend/student/detail_student');
                        echo

                            "<tr>
                                <td>$student->fullname</td>
                                <td>$student->dob</td>
                                <td>$student->phone</td>

                                <td>$student->classname $student->studyday</td>
                                <td id='" . $student->id . $student->classid . "'>$student->numberofcall</td>

								<td>
                                    <div class=\"btn-group\">
                                        <a class='btn btn-info' href='$linkthongtin/".$student->id."/".$student->classid."/$numberpages/$numberrows/$courseid'>Thông tin</a>
                                        <button id='addcall" . $student->id . $student->classid . "'  class='btn btn-warning " . $class . "' $disabled2 onclick=\"addCall('" . $student->id . "','" . $student->classid . "'," . $numberpages . "," . $numberrows . ",'" . $courseid . "')\">$called</button>
                                        <button $disabled2 class='btn btn-primary' $disabled onclick=\"confirmCall(this,'" . $student->id . "', '" . $student->classid . "')\">Đã Gọi</button>
                                    </div>
								</td>
								<td>$student->notegoidien</td>
								<td>$student->ngayhen</td>
								<td id='caller" . $student->id . $student->classid . "'>$student->caller</td>
                        </tr>";
                    }
                    ?>

                    </tbody>
                </table>
                <div class="paging">

                    <a href="<?php echo base_url("backend/student/students_tele_sale/$courseid/1") ?>"><i
                            class="fa fa-backward"></i> </a>
                    <?php
                    $var = 5;
                    if ($page > 1) {
                        $pre_page = $page - 1;
                        echo '<a href="' . base_url("backend/student/students_tele_sale/$courseid/$pre_page") . '" ><i class="fa fa-chevron-left"></i> </a>';
                    }
                    if ($page - $var > 1) {
                        $i = $page - $var;
                    } else {
                        $i = 1;
                    }
                    if ($page + $var < $total) {
                        $end = $page + $var;
                    } else {
                        $end = $total;
                    }
                    for (; $i <= $end; $i++) {
                        if ($i == $page) {
                            echo '<a class="selected" href="' . base_url("backend/student/students_tele_sale/$courseid/$i") . '" >' . $i . ' </a>';
                        } else {
                            echo '<a href="' . base_url("backend/student/students_tele_sale/$courseid/$i") . '" >' . $i . ' </a>';
                        }

                    }
                    if ($page < $total) {
                        $page_after = $page + 1;
                        echo '<a href="' . base_url("backend/student/students_tele_sale/$courseid/$page_after") . '" ><i class="fa fa-chevron-right"></i> </a>';
                    }

                    ?>
                    <a href="<?php echo base_url("backend/student/students_tele_sale/$courseid/$total") ?>"><i
                            class="fa fa-forward"></i> </a>


                </div>

            </div>

        </div>

    </div>
</div>
<script>

    setInterval(function () {
        loadData();
    }, 2000);

    $('#tele_sale_searchbox').on('input', function (e) {
        loadData();
    });

    function loadData() {
        var xhttp = new XMLHttpRequest();
        var searchstr = $("#tele_sale_searchbox").val();
        var link = "<?php echo base_url('backend/student/reloadstudent/');?>" + "/" + "<?php echo $courseid ?>" + "/" + "<?php echo "$numberpages/$numberrows"?>"+"/"+ searchstr;
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("tablebody").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", link, true);
        xhttp.send();
    }

    function confirmCall(e, studentid, classid) {
//        var target = e.target;
        if (confirm("Bạn có chắc là đã gọi không?")) {
            e.disabled = true;
            var numbercallsid = studentid + "" + classid;
            var id = "called" + studentid + "" + classid;
            var btnaddCallid = "addcall" + studentid + "" + classid;
            var link = "<?php echo base_url('backend/student/confirm_call/');?>" + "/" + classid + "/" + studentid;
            var xhttp = new XMLHttpRequest();
            document.getElementById(btnaddCallid).disabled = true;
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById(id).innerHTML = xhttp.responseText;
                    if (document.getElementById(numbercallsid).innerHTML == 0)
                        document.getElementById(numbercallsid).innerHTML = 1;

                }
            };
            xhttp.open("GET", link, true);
            xhttp.send();
        }
    }

    function addCall(studentid, classid, numberpages, numberrows, courseid) {
        if (confirm("Bạn có chắc bấm nút này không?")) {
            var isCalling;
            var id = studentid + "" + classid;
            var btnaddCallid = "addcall" + studentid + "" + classid;
            var callerid = "caller" + studentid + "" + classid;
            if (document.getElementById(btnaddCallid).innerHTML.localeCompare("Chưa gọi") == 0) {
                var link = "<?php echo base_url('backend/student/add_call/');?>" + "/" + classid + "/" + studentid;
                document.getElementById(btnaddCallid).className += " calledbutton";
                isCalling = true;
            } else {
                var link = "<?php echo base_url('backend/student/end_call/');?>" + "/" + classid + "/" + studentid;
                $("#" + btnaddCallid).removeClass("calledbutton");
                isCalling = false;
            }


            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    var obj = JSON.parse(xhttp.responseText);
                    if (document.getElementById(btnaddCallid).innerHTML.localeCompare("Chưa gọi") == 0) {
                        document.getElementById(id).innerHTML = obj['numbercalls'];
                        document.getElementById(callerid).innerHTML = obj['caller'];
                        document.getElementById(btnaddCallid).innerHTML = obj['called'];
                    } else {
                        document.getElementById(btnaddCallid).innerHTML = obj['callestatus'];
                    }
                }
            };
            xhttp.open("GET", link, true);
            xhttp.send();
            if (isCalling)
                window.location = "<?php echo base_url('backend/student/detail_student') ?>" + "/" + studentid + "/" + classid + "/" + numberpages + "/" + numberrows + "/" + courseid;
        }
    }
</script>
