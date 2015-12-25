<div class="container-fluid">
    <div class="side-body padding-top">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div>
                    <div class="card red summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-users fa-3x"></i>

                            <div class="content">
                                <div class="title"><?php echo $songuoidangky; ?></div>
                                <div class="sub-title">Số người đăng kí khóa mới</div>

                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="card yellow summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-comments fa-3x"></i>

                            <div class="content">
                                <div class="title"><?php echo $songuoidathu ?></div>
                                <div class="sub-title">Người đã thu tiền</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="card green summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-tags fa-3x"></i>

                            <div class="content">
                                <div class="title"><?php echo empty($tongsotien) ? format_currency(0) : format_currency($tongsotien); ?></div>
                                <div class="sub-title">Số tiền đã thu</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="card blue summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-share-alt fa-3x"></i>

                            <div class="content">
                                <div class="title"><?php echo $nguoichuagoi; ?></div>
                                <div class="sub-title">Số người chưa gọi</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div>
                    <div class="card red summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-phone fa-3x"></i>

                            <div class="content">
                                <div class="title"><?php echo $songuoichuadongtien ?></div>
                                <div class="sub-title">người đã gọi và chưa đóng tiền</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="card yellow summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-comments fa-3x"></i>

                            <div class="content">
                                <div class="title"><?php echo format_currency($tienthuhomnay); ?></div>
                                <div class="sub-title">Tổng số tiền thu hôm nay</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="card green summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-tags fa-3x"></i>

                            <div class="content">
                                <div class="title"><?php echo format_currency($tiendangcam); ?></div>
                                <div class="sub-title">Số tiền chưa bàn giao</div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="card blue summary-inline">
                        <div class="card-body">
                            <i class="icon fa fa-phone fa-3x"></i>

                            <div class="content">
                                <div class="title"><?php echo $solangoi ?></div>
                                <div class="sub-title">người đã gọi</div>


                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Số người đăng kí theo ngày</div>
                        </div>
                    </div>
                    <div class="card-body no-padding">
                        <canvas id="line-chart-nguoidangki" class="chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">thời gian đăng kí nhiều nhất (Giờ)</div>
                        </div>
                    </div>
                    <div class="card-body no-padding">
                        <canvas id="line-chart-maxtime" class="chart"></canvas>
                    </div>
                    <!--                    <div class="card-footer">-->
                    <!--                        <div class="row">-->
                    <!--                            <div class="col-xs-6 text-right">Số người đăng kí theo ngày</div>-->
                    <!--                            <div class="col-xs-2 chuthich" style="background-color: #1ABC9C"></div>-->
                    <!--                        </div>-->
                    <!--                        <div class="row">-->
                    <!--                            <div class="col-xs-6 text-right">Thời gian đăng kí nhiều nhất(giờ)</div>-->
                    <!--                            <div class="col-xs-2 chuthich" style="background-color: #c0392b"></div>-->
                    <!--                        </div>-->
                    <!---->
                    <!--                    </div>-->
                </div>
            </div>
            <!--            <div class="col-sm-6 col-xs-12">-->
            <!--                <div class="card">-->
            <!--                    <div class="card-header">-->
            <!--                        <div class="card-title">-->
            <!--                            <div class="title">Bar Chart</div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="card-body no-padding">-->
            <!--                        <canvas id="bar-chart" class="chart"></canvas>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class=" card card-success">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title"><i class="fa fa-money"></i> Hoạt động gần đây</div>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    <div class="card-body no-padding">
                        <ul class="message-list">
                            <?php
                            $link = base_url('backend/quanlytaichinh/danhsachchuyentien');
                            $i = 0;

                            foreach ($transfers as $transfer) {
                                $money = format_currency($transfer->amount);
                                $i++;
                                echo "
                            <a href=\"$link\">
                            <li>
                                <img src=\"".base_url($transfer->fromavatar)."\" class=\"profile-img pull-left\" style='margin-right:10px'>
                                <img src=\"".base_url($transfer->toavatar)."\" class=\"profile-img pull-left\" style='margin-right:10px'>
                                <div class=\"message-block\">
                                    <div><span class=\"message-datetime\">$transfer->transferedtime</span>
                                    </div>
                                    <div class=\"message\"><strong>$transfer->fromname</strong> đã bàn giao cho <strong>$transfer->toname</strong> khoản tiền <strong>$money</strong>
                                    </div>
                                </div>
                            </li>
                        </a>
                                                    ";
                            }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class=" card card-info">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title"><i class="fa fa-user-plus "></i> Học viên đóng tiền gần đây</div>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    <div class="card-body no-padding">
                        <ul class="message-list">
                            <?php
                            $link = base_url('backend/quanlytaichinh/danhsachdanoptien');
                            $i = 0;

                            foreach ($hocviennoptienhomnay as $student) {
                                $money = format_currency($student->paid);
                                $i++;
                                echo "
                            <a href=\"$link\">
                            <li>
                                <img src=\"".base_url($student->avatar)."\" class=\"profile-img pull-left\">
                                <div class=\"message-block\">
                                    <div><span class=\"message-datetime\">$student->paidtime</span>
                                    </div>
                                    <div class=\"message\">Học viên <strong>$student->fullname</strong> đã nộp học phí là <strong>$money</strong> cho <strong>$student->tennguoithu</strong>
                                    </div>
                                </div>
                            </li>
                        </a>
                                                    ";
                            }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>

            <script>
                (function () {
                    $(function () {
                        var ctx, data, myLineChart, options;
                        Chart.defaults.global.responsive = true;
                        ctx = $('#line-chart-nguoidangki').get(0).getContext('2d');
                        options = {
                            scaleShowGridLines: true,
                            scaleGridLineColor: "rgba(0,0,0,.05)",
                            scaleGridLineWidth: 1,
                            scaleShowHorizontalLines: true,
                            scaleShowVerticalLines: true,
                            showTooltips: true,
                            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
                            bezierCurve: false,
                            bezierCurveTension: 0.4,
                            pointDot: true,
                            pointDotRadius: 4,
                            animation: true,

                            // Number - Number of animation steps
                            animationSteps: 60,

                            // String - Animation easing effect
                            // Possible effects are:
                            // [easeInOutQuart, linear, easeOutBounce, easeInBack, easeInOutQuad,
                            //  easeOutQuart, easeOutQuad, easeInOutBounce, easeOutSine, easeInOutCubic,
                            //  easeInExpo, easeInOutBack, easeInCirc, easeInOutElastic, easeOutBack,
                            //  easeInQuad, easeInOutExpo, easeInQuart, easeOutQuint, easeInOutCirc,
                            //  easeInSine, easeOutExpo, easeOutCirc, easeOutCubic, easeInQuint,
                            //  easeInElastic, easeInOutSine, easeInOutQuint, easeInBounce,
                            //  easeOutElastic, easeInCubic]
                            animationEasing: "easeInOutQuart",
                            pointDotStrokeWidth: 1,
                            pointHitDetectionRadius: 20,
                            datasetStroke: true,
                            datasetStrokeWidth: 2,
                            datasetFill: false,
                            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                        };
                        data = {
                            labels: [
                                <?php
                                    foreach ($days as $day){
                                    if (end($days)->regisdate!=$day->regisdate){
                                        echo "'$day->regisdate',";
                                    }else {
                                        echo "'$day->regisdate'";
                                    }

                                    }
                                    ?>


                            ],
                            datasets: [
                                {
                                    label: "Số người đăng kí theo ngày",

                                    strokeColor: "#1ABC9C",
                                    pointColor: "#1ABC9C",
                                    pointStrokeColor: "#fff",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "#1ABC9C",
                                    data: [
                                        <?php
                                    foreach ($days as $day){
                                    if (end($days)->regisdate!=$day->regisdate){
                                        echo "'$day->number',";
                                    }else {
                                        echo "'$day->number'";
                                    }

                                    }
                                    ?>
                                    ]
                                }
                            ]
                        };
                        myLineChart = new Chart(ctx).Line(data, options);
                    });
                    $(function () {
                        var ctx, data, myLineChart, options;
                        Chart.defaults.global.responsive = true;
                        ctx = $('#line-chart-maxtime').get(0).getContext('2d');
                        options = {
                            scaleShowGridLines: true,
                            scaleGridLineColor: "rgba(0,0,0,.05)",
                            scaleGridLineWidth: 1,
                            scaleShowHorizontalLines: true,
                            scaleShowVerticalLines: true,
                            showTooltips: true,
                            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
                            bezierCurve: false,
                            bezierCurveTension: 0.4,
                            pointDot: true,
                            pointDotRadius: 4,
                            animation: true,

                            // Number - Number of animation steps
                            animationSteps: 60,

                            // String - Animation easing effect
                            // Possible effects are:
                            // [easeInOutQuart, linear, easeOutBounce, easeInBack, easeInOutQuad,
                            //  easeOutQuart, easeOutQuad, easeInOutBounce, easeOutSine, easeInOutCubic,
                            //  easeInExpo, easeInOutBack, easeInCirc, easeInOutElastic, easeOutBack,
                            //  easeInQuad, easeInOutExpo, easeInQuart, easeOutQuint, easeInOutCirc,
                            //  easeInSine, easeOutExpo, easeOutCirc, easeOutCubic, easeInQuint,
                            //  easeInElastic, easeInOutSine, easeInOutQuint, easeInBounce,
                            //  easeOutElastic, easeInCubic]
                            animationEasing: "easeInOutQuart",
                            pointDotStrokeWidth: 1,
                            pointHitDetectionRadius: 20,
                            datasetStroke: true,
                            datasetStrokeWidth: 2,
                            datasetFill: false,
                            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                        };
                        data = {
                            labels: [
                                <?php
                                    for($i=0;$i<23;$i++){
                                    echo $i.",";
                                    }

                                ?>
                                23

                            ],
                            datasets: [
                                {
                                    label: "thời gian đăng kí nhiều nhất(Giờ)",
                                    strokeColor: "#e74c3c",
                                    pointColor: "#c0392b",
                                    pointStrokeColor: "#fff",
                                    pointHighlightFill: "#fff",
                                    pointHighlightStroke: "#22A7F0",
                                    data: [
                                        <?php
                                           for($i=0;$i<23;$i++){
                                           echo $hours[$i].",";
                                           }
                                            echo $hours[23];
                                       ?>
                                    ]
                                }
                            ]
                        };
                        myLineChart = new Chart(ctx).Line(data, options);
                    });

                }).call(this);

            </script>