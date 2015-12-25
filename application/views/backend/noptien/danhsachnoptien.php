<div class="container-fluid" id="main-content">
    <div class="side-body">
        <div class="page-title">
            <span class="title"><?php echo $table_name; ?></span>

            <div class="description"><?php echo $table_description; ?></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <label for="email">Tìm kiếm học viên:</label>
                        <input type="Text" class="form-control" id="searchbox"/>
                    </div>
                </form>
            </div>

            <div class="col-sm-12">

                <?php
                if (!empty($delete_status)) {
                    if ($delete_status == 1)
                        echo "<div class='alert alert-success'>Delete Successfully</div>";
                    else if ($delete_status == 2) {
                        echo "<div class='alert alert-danger'>Delete Failed</div>";
                    }
                }
                ?>
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>Mã học viên</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <!--                        <th>Hiện đang là</th>-->
                        <!--                        <th>Nơi làm việc/học tập</th>-->
                        <th>Số điện thoại</th>
                        <th>Đã nộp</th>
                        <th>Người thu tiền</th>
                    </tr>
                    </thead>
                    <tbody id="noptienbody">
                    <?php


                    foreach ($students as $student) {

                        $note = (empty(trim($student->note))) ? "" : "(" . trim($student->note) . ")";
                        if ($student->paid == -1) {
                            $paid = "<a class='btn btn-info' href='" . base_url('backend/tien/thutien/' . $student->id) . "'>Nộp tiền</a>";
                        } else {
                            $money = format_currency($student->paid);
                            $paid = "<div class='text-success'>$money $note</div>";
                        }
                        echo
                        "<tr>
                                <td>$student->realid</td>
                                <td>$student->fullname</td>
                                <td>$student->email</td>
                                <td>$student->address</td>
                                <td>$student->phone</td>

								<td>

                                    <div class=\"btn-group\">
                                        $paid
                                    </div>
								</td>
								<td>$student->tennguoithu</td>
                        </tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="7">
                            <div class="paging">
                                <a href="<?php echo base_url("backend/student/danhsachnoptien/1") ?>"><i
                                        class="fa fa-backward"></i> </a>
                                <?php
                                $var = 5;
                                if ($page > 1) {
                                    $pre_page = $page - 1;
                                    echo '<a href="' . base_url("backend/student/danhsachnoptien/$pre_page") . '" ><i class="fa fa-chevron-left"></i> </a>';
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
                                        echo '<a class="selected" href="' . base_url("backend/student/danhsachnoptien/$i") . '" >' . $i . ' </a>';
                                    } else {
                                        echo '<a href="' . base_url("backend/student/danhsachnoptien/$i") . '" >' . $i . ' </a>';
                                    }

                                }
                                if ($page < $total) {
                                    $page_after = $page + 1;
                                    echo '<a href="' . base_url("backend/student/danhsachnoptien/$page_after") . '" ><i class="fa fa-chevron-right"></i> </a>';
                                }

                                ?>
                                <a href="<?php echo base_url("backend/student/danhsachnoptien/$total") ?>"><i
                                        class="fa fa-forward"></i> </a>


                            </div>
                        </td>
                    </tr>

                    </tbody>

                </table>


            </div>

        </div>
    </div>
</div>
<script>

    $('#searchbox').on('input', function (e) {
        loadDoc($('#searchbox').val());
    });
    function loadDoc(search) {
        $link = "<?php echo base_url('backend/student/ajaxnoptien')?>" + "/" + search;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("noptienbody").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("GET", $link, true);
        xhttp.send();
    }
</script>