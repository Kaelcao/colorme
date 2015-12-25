<?php
    if (!empty($confirm)){
        unset($post_data);
    }
?>
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title"><?php echo $table_name; ?></span>

            <div class="description"><?php echo $table_description; ?></div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Add New Student</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label for="id" class="col-sm-2 control-label">Student ID</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id" id="id"
                                           placeholder="Student ID"
                                           value="<?php echo common_value_post(isset($post_data['id']) ? $post_data['id'] : ''); ?>">
                                    <?php if (!empty(form_error('id'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('id') . '</div>';
                                    }
                                    ?>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="fullname" class="col-sm-2 control-label">Full Name</label>

                                <div class="col-sm-10">
                                    <input type="text"
                                           value="<?php echo common_value_post(isset($post_data['fullname']) ? $post_data['fullname'] : ''); ?>"
                                           class="form-control" name="fullname" id="fullname" placeholder="Full Name">

                                    <?php if (!empty(form_error('fullname'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('fullname') . '</div>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="dob" class="col-sm-2 control-label">Date of Birth</label>

                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="dob" id="dob"
                                           placeholder="Date of Birth"
                                           value="<?php echo common_value_post(isset($post_data['dob']) ? $post_data['dob'] : ''); ?>">

                                    <?php if (!empty(form_error('dob'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('dob') . '</div>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                           value="<?php echo common_value_post(isset($post_data['email']) ? $post_data['email'] : ''); ?>">

                                    <?php if (!empty(form_error('email'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('email') . '</div>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Work Place/University</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="workplace" name="workplace"
                                           placeholder="Work Place/University"
                                           value="<?php echo common_value_post(isset($post_data['workplace']) ? $post_data['workplace'] : ''); ?>">

                                    <?php if (!empty(form_error('workplace'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('workplace') . '</div>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Position</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="position" name="position"
                                           placeholder="Position"
                                           value="<?php echo common_value_post(isset($post_data['position']) ? $post_data['position'] : ''); ?>">

                                    <?php if (!empty(form_error('position'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('position') . '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Phone Number</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           placeholder="Phone Number"
                                           value="<?php echo common_value_post(isset($post_data['phone']) ? $post_data['phone'] : ''); ?>">

                                    <?php if (!empty(form_error('phone'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('phone') . '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Address</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="Address"
                                           value="<?php echo common_value_post(isset($post_data['address']) ? $post_data['address'] : ''); ?>">

                                    <?php if (!empty(form_error('address'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('address') . '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    <input type="reset" name="reset" class="btn btn-danger"/>
                                </div>
                                <?php if (!empty($confirm)) {
                                    echo '<div class="col-xs-12"><div class="alert alert-success error">' . $confirm . '</div></div>' ;
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>