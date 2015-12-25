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
                            <div class="title">Add New Course</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label for="id" class="col-sm-2 control-label">Course ID</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id" id="id"
                                           placeholder="Course ID"
                                           value="<?php echo common_value_post(isset($post_data['id']) ? $post_data['id'] : ''); ?>">
                                    <?php if (!empty(form_error('id'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('id') . '</div>';
                                    }
                                    ?>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Course Name</label>

                                <div class="col-sm-10">
                                    <input type="text"
                                           value="<?php echo common_value_post(isset($post_data['name']) ? $post_data['name'] : ''); ?>"
                                           class="form-control" name="name" id="name" placeholder="Course Name">

                                    <?php if (!empty(form_error('name'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('name') . '</div>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="duration" class="col-sm-2 control-label">Duration</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="duration" id="duration"
                                           placeholder="Course Duration"
                                           value="<?php echo common_value_post(isset($post_data['duration']) ? $post_data['duration'] : ''); ?>">

                                    <?php if (!empty(form_error('duration'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('duration') . '</div>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="level" class="col-sm-2 control-label">Level</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="level" name="level" placeholder="Level"
                                           value="<?php echo common_value_post(isset($post_data['level']) ? $post_data['level'] : ''); ?>">

                                    <?php if (!empty(form_error('level'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('level') . '</div>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description"
                                           placeholder="Description"
                                           value="<?php echo common_value_post(isset($post_data['description']) ? $post_data['description'] : ''); ?>">

                                    <?php if (!empty(form_error('description'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('description') . '</div>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="detail" class="col-sm-2 control-label">Detail</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="detail" name="detail"
                                           placeholder="Detail"
                                           value="<?php echo common_value_post(isset($post_data['detail']) ? $post_data['detail'] : ''); ?>">

                                    <?php if (!empty(form_error('detail'))) {
                                        echo '<div class="alert alert-danger error">' . form_error('detail') . '</div>';
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