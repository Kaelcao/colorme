<div class="container-fluid">
    <div class="side-body padding-top">

        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Danh sách học viên đã nộp tiền</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="datatable  table-striped">
                            <thead>
                            <tr>
                                <th>#</th>

                                <th>Mã học viên</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Học phí</th>
                                <th>Thời gian nộp</th>
                                <th>Người thu tiền</th>
                                <th>Thông tin</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($hocviennoptien as $student) {
                                $linkthongtin = base_url('backend/student/detail_student');
                                $numberpages = 0;
                                $numberrows = 10;
                                $courseid = $student->courseid;
                                $i++;
                                $paid = format_currency($student->paid);
                                echo "
                            <tr>
                                <th scope=\"row\">$i</th>
                                 <td>$student->realid</td>
                                <td>$student->fullname</td>
                                <td>$student->email</td>
                                <td>$paid</td>
                                <td>$student->paidtime</td>
                                <td>$student->tennguoithu</td>
                                <td><a class='btn btn-info' href='$linkthongtin/".$student->id."/".$student->classid."/$numberpages/$numberrows/$courseid'>Thông tin</a></td>
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
