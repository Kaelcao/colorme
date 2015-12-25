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