<div class="container-fluid">
    <div class="side-body padding-top">

        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Danh sách chuyển tiền</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="datatable  table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Người chuyển</th>
                                <th>Người nhận</th>
                                <th>Số tiền</th>
                                <th>Thời gian chuyển</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($transfers as $transfer) {
                                $amount = format_currency($transfer->amount);
                                $i++;
                                echo "
                            <tr>
                                <th scope=\"row\">$i</th>
                                <td>$transfer->fromname</td>
                                <td>$transfer->toname</td>
                                <td>$amount</td>
                                <td>$transfer->transferedtime</td>
                            </tr>
                            ";
                            }
                            ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
