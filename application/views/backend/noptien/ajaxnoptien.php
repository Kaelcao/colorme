<?php


foreach ($students as $student) {
    $note = (empty($student->note)) ? "" : "(" . trim($student->note) . ")";
    if ($student->paid == -1) {
        $paid = "<a class='btn btn-info' href='" . base_url('backend/tien/thutien/' . $student->id) . "'>Nộp tiền</a>";
    } else {
        $paid = "<div class='text-success'>$student->paid $note</div>";
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
                        </tr>";
}
?>
<tr>
    <td colspan="6">
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
