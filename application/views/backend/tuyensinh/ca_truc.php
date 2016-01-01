<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">Đợt tuyển sinh</span>

            <div class="description">Quản lý các đợt tuyển sinh</div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="title">Thêm đợt tuyển sinh mới</div>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    if (!empty($insert_status)) {
                        echo $insert_status;
                    }
                    ?>
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="stt">Số thứ tự:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stt" name="stt"
                                       placeholder="Số thứ tự">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="starttime">Thời gian bắt đầu:</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="starttime" name="starttime"
                                       placeholder="Thời gian bắt đầu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="enddate">Thời gian kết thúc:</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="endtime" name="endtime"
                                       placeholder="Thời gian kết thúc">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="Tạo" class="btn btn-default" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="title">Danh sách các ca trực</div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="datatable table table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($ca_trucs as $ca_truc) {
                            ?>
                            <tr>
                                <td><?php echo $ca_truc['stt']; ?></td>
                                <td><?php echo $ca_truc['starttime']; ?></td>
                                <td><?php echo $ca_truc['endtime']; ?></td>
                                <td><a onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger" href="<?php echo 'backend/tuyensinh/ca_truc?id='.$ca_truc['catrucid']; ?>">Xóa</a> </td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Thời gian bắt đầu</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>