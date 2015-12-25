<div class="container-fluid" id="main-content">
    <div class="side-body">
        <div class="page-title">
            <span class="title"><?php echo $table_name; ?></span>

            <div class="description"><?php echo $table_description; ?></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-primary" href="<?php echo base_url('backend/student/add_student');?>">Add New Student</a>
            </div>

            <div class="col-sm-12">

                <?php
                if (!empty($delete_status)) {
                    if ($delete_status == 1)
                        echo "<div class='alert alert-success'>Delete Successfully</div>";
                    else if ($delete_status==2){
                        echo "<div class='alert alert-danger'>Delete Failed</div>";
                    }
                }
                ?>
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Phone Number</th>
						<th>Action</th>						
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($students as $student) {
                        echo
                            "<tr>
                                <td>$student->realid</td>
                                <td>$student->fullname</td>
                                <td>$student->email</td>
                                <td>$student->dob</td>
                                <td>$student->phone</td>
								<td>
                                    <div class=\"btn-group\">
                                        <a class='btn btn-info' href='".base_url('backend/student/detail_student/'.$student->id)."'>Detail</a>
                                        <a class='btn btn-primary' href='".base_url('backend/student/update_student/'.$student->id)."'>Update</a>
                                        <a class='btn btn-danger' onclick='return confirm(\"Are You Sure?\")' href='" . base_url('backend/student/delete_student/' . $student->id . '/' . $page) . "'>Delete</a>
                                    </div>
								</td>
                        </tr>";
                    }
                    ?>

                    </tbody>
                </table>
                <div class="paging">
                    <a href="<?php echo base_url("backend/student/show_all_students/1")?>" ><i class="fa fa-backward"></i> </a>
                    <?php
                    $var = 5;
                    if ($page > 1) {
                        $pre_page = $page - 1;
                        echo '<a href="' . base_url("backend/student/show_all_students/$pre_page") . '" ><i class="fa fa-chevron-left"></i> </a>';
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
                            echo '<a class="selected" href="' . base_url("backend/student/show_all_students/$i") . '" >' . $i . ' </a>';
                        } else {
                            echo '<a href="' . base_url("backend/student/show_all_students/$i") . '" >' . $i . ' </a>';
                        }

                    }
                    if ($page < $total) {
                        $page_after = $page + 1;
                        echo '<a href="' . base_url("backend/student/show_all_students/$page_after") . '" ><i class="fa fa-chevron-right"></i> </a>';
                    }

                    ?>
                    <a href="<?php echo base_url("backend/student/show_all_students/$total")?>" ><i class="fa fa-forward"></i> </a>


                </div>

            </div>

        </div>
    </div>
</div>
