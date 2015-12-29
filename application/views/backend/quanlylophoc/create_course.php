<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Sửa thông tin môn học</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <?php
                                if (isset($confirm)) {
                                    $url = base_url('backend/quanlylophoc/hienthilophoc');
                                    echo "<div class='text-center alert text-success'>$confirm     <a href='$url' class='text-capitalize btn btn-primary'>Back</a></div>";
                                }
                                ?>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="id">Mã môn học</label>
                                    <div class="col-md-4">
                                        <input id="courseid" name="id" type="text" placeholder="Mã môn học"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Tên môn</label>
                                    <div class="col-md-4">
                                        <input id="coursename"
                                               name="name" type="text" placeholder="Tên môn"
                                               class="form-control input-md">

                                    </div>
                                </div>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="category">Phân loại</label>
                                    <div class="col-md-4">
                                        <input id="category"
                                               name="category" type="text" placeholder="Phân loại"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price">Học phí</label>
                                    <div class="col-md-4">
                                        <input id="price" name="price" pattern="^\d+(\.|\,)\d{2}$" type="number"
                                               placeholder="Học phí"
                                               class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="mamau">Mã màu</label>
                                    <div class="col-md-4">
                                        <input id="mamau" name="mamau" type="text" placeholder="Mã màu"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="duration">Độ dài khóa học (buổi)</label>
                                    <div class="col-md-4">
                                        <input id="duration" name="duration" type="number"
                                               placeholder="Độ dài khóa học (buổi)"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="chitieu">Chỉ tiêu</label>
                                    <div class="col-md-4">
                                        <input id="chitieu" name="chitieu" type="number" placeholder="Chỉ tiêu"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="description">Mô tả</label>
                                    <div class="col-md-4">
                                        <input id="description"
                                               name="description" type="text" placeholder="Mô tả"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="detail">Chi tiết</label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="detail"
                                                  name="detail"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkphanmemmac">Link phần mềm Mac</label>
                                    <div class="col-md-4">
                                        <input id="linkphanmemmac"
                                               name="linkphanmemmac" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkphanmemwindow">Link phần mềm
                                        Windows</label>
                                    <div class="col-md-4">
                                        <input id="linkphanmemwindow"
                                               name="linkphanmemwindow" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linktimeline">Link timeline</label>
                                    <div class="col-md-4">
                                        <input id="linktimeline"

                                               name="linktimeline" type="text" class="form-control input-md">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price">link nội quy</label>
                                    <div class="col-md-4">
                                        <input id="linknoiquy" name="linknoiquy" type="text"
                                               class="form-control input-md">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price">Trạng thái</label>
                                    <div class="col-md-4">
                                        <select name="inRegister" style="width: 200px">
                                                <option value="1"> Cho phép đăng kí</option>
                                                <option value="0">Khoá đăng kí</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="button1id"></label>
                                    <div class="col-md-8">
                                        <input id="submit" name="submit" type="submit" class="btn btn-success"
                                               value="Xác nhận"/>
                                        <button id="reset" name="reset" type="reset" class="btn btn-danger">Reset
                                        </button>
                                    </div>
                                </div>

                            </fieldset>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
    </div>
</div>
