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
                    if (!empty($insert_status)){
                        echo $insert_status;
                    }
                    ?>
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Tên đợt tuyển sinh:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tên đợt tuyển sinh">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="startdate">Ngày bắt đầu:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="startdate" name="startdate" placeholder="Ngày bắt đầu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="enddate">Ngày kết thúc:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="enddate" name="enddate" placeholder="Ngày bắt đầu">
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
                        <div class="title">Danh sách các đợt tuyển sinh</div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="datatable table table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Tên đợt tuyển sinh</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($dot_tuyen_sinhs as $dot_tuyen_sinh) {
                            ?>
                            <tr>
                                <td><?php echo $dot_tuyen_sinh['name']; ?></td>
                                <td><?php echo $dot_tuyen_sinh['startdate']; ?></td>
                                <td><?php echo $dot_tuyen_sinh['enddate']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Tên đợt tuyển sinh</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>