<style>
    p {
        color: red;
    }
</style>
<div class="container">
    <div class="login-box">
        <div>
            <div class="login-form row">
                <div class="col-sm-12 text-center login-header">
                    <a style="color: white;" href="<?php echo base_url(); ?>" title="Back to Home Page"> <i class="login-logo fa fa-connectdevelop fa-5x"></i></a>
                    <h4 class="login-title">Hệ thống quản lý Color ME</h4>
                </div>
                <div class="col-sm-12">
                    <div class="login-body">
                        <div class="progress hidden" id="login-progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active"
                                 role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 100%">
                                Log In...
                            </div>
                        </div>

                        <form method="post" action="">
                            <div class="control">
                                <input placeholder="Username" name="username" value="<?php echo common_value_post(isset($post_data['username'])?$post_data['username']:''); ?>" type="text" class="form-control" />
                                <?php echo form_error('username'); ?>
                            </div>
                            <div class="control">
                                <input type="password" placeholder="Password" value="<?php  echo common_value_post(isset($post_data['password'])?$post_data['password']:''); ?>" class="form-control" name="password"/>
                                <?php echo form_error('password'); ?>
                            </div>
                            <div class="login-button text-center">
                                <input type="submit" class="btn btn-primary" name="login" value="Login">
                            </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <span class="text-right"><a href="backend/auth/forgot" class="color-white">Forgot password?</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
