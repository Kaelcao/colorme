
        <div class="col-xs-offset-2 col-xs-8">
            <h1 class="page-header row-title">
                ĐĂNG KÍ <?php echo $course['name'] ?>
                <img class="title-separator" src="public/template/frontend/images/title-separator.png"/>

                <p class="row-description"><?php echo $course['description'] ?></p>
            </h1>
        </div>
        <?php
        if (isset($confirm)) {
            echo "<div class='col-xs-12 alert alert-success'>$confirm</div>";
        }
        ?>
        <div class="col-xs-12">


            <form class="form-horizontal" role="form" id="regis-form" method="post">
                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('fullname'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label for="fullname" class="control-label">Họ và tên *</label>
                    <input type="text" value="<?php echo isset($fullname) ? $fullname : ""; ?>"
                           class="form-control has-error" id="fullname" name="fullname">
                    <?php if (!empty(form_error('fullname'))) {
                        echo '<div class="alert alert-danger error">' . form_error('fullname') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('gender'))) ? ' has-error' : 'has-success';
                }
                ?>">
                    <label class="control-label">Bạn là Adam hay Eva? *</label>


                    <div class="radio">
                        <label><input type="radio" <?php echo (isset($gender) && $gender == "Male") ? "checked" : ""; ?>
                                      name="gender" value="Male">Adam</label>
                    </div>
                    <div class="radio">
                        <label><input
                                type="radio" <?php echo (isset($gender) && $gender == "Female") ? "checked" : ""; ?>
                                name="gender" value="Female">Eva</label>
                    </div>
                    <?php if (!empty(form_error('gender'))) {
                        echo '<div class="alert alert-danger error">' . form_error('gender') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('dob'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Ngày Sinh</label>
                    <input value="<?php echo isset($dob) ? $dob : ""; ?>" type="date" class="form-control" id="dob"
                           name="dob">
                    <?php if (!empty(form_error('dob'))) {
                        echo '<div class="alert alert-danger error">' . form_error('dob') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('email'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Email của bạn? *</label>
                    <input type="email" class="form-control" value="<?php echo isset($email) ? $email : ""; ?>"
                           id="email" name="email">
                    <?php if (!empty(form_error('email'))) {
                        echo '<div class="alert alert-danger error">' . form_error('email') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('phone'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Số điện thoại *</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                           value="<?php echo isset($phone) ? $phone : ""; ?>">
                    <?php if (!empty(form_error('phone'))) {
                        echo '<div class="alert alert-danger error">' . form_error('phone') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('address'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Địa chỉ hiện tại *</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="<?php echo isset($address) ? $address : ""; ?>">
                    <?php if (!empty(form_error('address'))) {
                        echo '<div class="alert alert-danger error">' . form_error('address') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('position'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Bạn đang là? *</label>

                    <div class="radio">
                        <label><input
                                type="radio" <?php echo (isset($position) && $position == "Sinh Viên") ? "checked" : ""; ?>
                                name="position" value="Sinh Viên">Sinh Viên</label>
                    </div>
                    <div class="radio">
                        <label><input
                                type="radio" <?php echo (isset($position) && $position == "Học Sinh") ? "checked" : ""; ?>
                                name="position" value="Học Sinh">Học Sinh</label>
                    </div>
                    <div class="radio">
                        <label><input
                                type="radio" <?php echo (isset($position) && $position == "Người Đi Làm") ? "checked" : ""; ?>
                                name="position" value="Người Đi Làm">Người Đi Làm</label>
                    </div>
                    <?php if (!empty(form_error('position'))) {
                        echo '<div class="alert alert-danger error">' . form_error('position') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('workplace'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Nơi bạn đang học/làm *</label>
                    <input type="text" class="form-control" id="workplace"
                           value="<?php echo isset($workplace) ? $workplace : ""; ?>" name="workplace">
                    <?php if (!empty(form_error('workplace'))) {
                        echo '<div class="alert alert-danger error">' . form_error('workplace') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('facebook'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Link facebook của bạn *</label>
                    <input type="text" class="form-control" id="facebook"
                           value="<?php echo isset($facebook) ? $facebook : ""; ?>" name="facebook">
                    <?php if (!empty(form_error('facebook'))) {
                        echo '<div class="alert alert-danger error">' . form_error('facebook') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('howknow'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Bạn biết đến lớp học qua kênh nào? *</label>

                    <div class="radio">
                        <label><input type="radio"
                                      name="howknow" <?php echo (isset($howknow) && $howknow == "Bạn bè giới thiệu") ? "checked" : ""; ?>
                                      value="Bạn bè giới thiệu">Bạn bè giới thiệu</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio"
                                      name="howknow" <?php echo (isset($howknow) && $howknow == "Bài share trên FB của bạn") ? "checked" : ""; ?>
                                      value="Bài share trên FB của bạn">Bài share trên FB
                            của bạn</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio"
                                      name="howknow" <?php echo (isset($howknow) && $howknow == "Group trên FB nói về khóa học ở colorME") ? "checked" : ""; ?>
                                      value="Group trên FB nói về khóa học ở colorME">Group
                            trên FB nói về khóa học ở colorME</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="howknow"
                                      value="Email của colorME gửi mình" <?php echo (isset($howknow) && $howknow == "Email của colorME gửi mình") ? "checked" : ""; ?>>Email
                            của colorME
                            gửi mình</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="howknow"
                                      value="Chủ động vào fanpage colorME xem tin khóa mới" <?php echo (isset($howknow) && $howknow == "Chủ động vào fanpage colorME xem tin khóa mới") ? "checked" : ""; ?>>Chủ
                            động vào fanpage colorME xem tin khóa mới</label>
                    </div>
                    <?php if (!empty(form_error('howknow'))) {
                        echo '<div class="alert alert-danger error">' . form_error('howknow') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('classregis'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Bạn muốn học lớp nào? *</label>
                    <select name="classregis" class="form-control">
                        <option value="">Chọn Lớp</option>
                        <?php

                        foreach ($classes as $class) {
                            $phpdate = strtotime($class->startdate);
                            $day = date('D, jS M Y', $phpdate);
                            if ($class->isopen==0){
                                if (isset($classregis) && $classregis == $class->id) {
                                    echo "<option value=\"$class->id\" selected>$class->name, thời gian: $class->studyday, thời gian bắt đầu: $day</option>";
                                } else {
                                    echo "<option value=\"$class->id\">$class->name, thời gian: $class->studyday, thời gian bắt đầu: $day</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                    <?php if (!empty(form_error('classregis'))) {
                        echo '<div class="alert alert-danger error">' . form_error('classregis') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('leadname'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Tên Nhóm Trưởng (Nếu học nhóm 3 người trở lên)</label>
                    <input type="text" class="form-control" id="leadname" name="leadname"
                           value="<?php echo isset($leadname) ? $leadname : ""; ?>">
                    <?php if (!empty(form_error('leadname'))) {
                        echo '<div class="alert alert-danger error">' . form_error('leadname') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group
                <?php
                if (!empty($submit)) {
                    echo (!empty(form_error('leadphone'))) ? ' has-error' : 'has-success';
                }
                ?>
                ">
                    <label class="control-label">Số Điện Thoại Nhóm trưởng (Nếu học nhóm 3 người trở lên)</label>
                    <input type="dob" class="form-control" id="leadphone" name="leadphone"
                           value="<?php echo isset($leadphone) ? $leadphone : ""; ?>">
                    <?php if (!empty(form_error('leadphone'))) {
                        echo '<div class="alert alert-danger error">' . form_error('leadphone') . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" value="submit" class="btn btn-register-now">Submit</button>
                    <button type="reset" class="btn btn-learn-more">Reset</button>
                </div>
            </form>
        </div>
