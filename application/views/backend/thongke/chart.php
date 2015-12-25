<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title">Thống kê đăng kí</span>

            <div class="description">Thông tin đăng kí</div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
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
            <div class="col-sm-6 col-xs-12">
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
<!--        <div class="row">-->
<!--            <div class="col-sm-6 col-xs-12">-->
<!--                <div class="card">-->
<!--                    <div class="card-header">-->
<!--                        <div class="card-title">-->
<!--                            <div class="title">Radar Chart</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="card-body no-padding">-->
<!--                        <canvas id="radar-chart" class="chart"></canvas>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-6 col-xs-12">-->
<!--                <div class="card">-->
<!--                    <div class="card-header">-->
<!--                        <div class="card-title">-->
<!--                            <div class="title">Polar Area Chart</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="card-body no-padding">-->
<!--                        <canvas id="polar-area-chart" class="chart"></canvas>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-sm-6 col-xs-12">-->
<!--                <div class="card">-->
<!--                    <div class="card-header">-->
<!--                        <div class="card-title">-->
<!--                            <div class="title">Pie & Doughnut Chart</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="card-body no-padding">-->
<!--                        <canvas id="pie-chart" class="chart"></canvas>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="page-title">-->
<!--            <span class="title">Card Jumbotron</span>-->
<!---->
<!--            <div class="description">Chart.js in Jumbotron Header, recommend using in dashboard pages.</div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-sm-6 col-xs-12">-->
<!--                <div class="card">-->
<!--                    <div class="card-header">-->
<!--                        <div class="card-title">-->
<!--                            <div class="title">Line Chart</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="card-body">-->
<!--                        <div class="card primary">-->
<!--                            <div class="card-jumbotron no-padding">-->
<!--                                <canvas id="jumbotron-line-chart" class="chart no-padding"></canvas>-->
<!--                            </div>-->
<!--                            <div class="card-body">-->
<!--                                <h4>Lorem Ipsum</h4>-->
<!--                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
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
                legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
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
                legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
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
                        label: "thời gian đăng kí nhiều nhất(Giờ)",
                        strokeColor: "#e74c3c",
                        pointColor: "#c0392b",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#22A7F0",
                        data: [
                            <?php
                        foreach ($hours as $hour){
                        if (end($hours)->regisdate!=$hour->regisdate){
                            echo "'$hour->maxhour',";
                        }else {
                            echo "'$hour->maxhour'";
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
            var ctx, data, myBarChart, option_bars;
            Chart.defaults.global.responsive = true;
            ctx = $('#bar-chart').get(0).getContext('2d');
            option_bars = {
                scaleBeginAtZero: true,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: false,
                barShowStroke: true,
                barStrokeWidth: 1,
                barValueSpacing: 5,
                barDatasetSpacing: 3,
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
            };
            data = {
                labels: [


                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'
                ],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(26, 188, 156,0.6)",
                        strokeColor: "#1ABC9C",
                        pointColor: "#1ABC9C",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#1ABC9C",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }, {
                        label: "My Second dataset",
                        fillColor: "rgba(34, 167, 240,0.6)",
                        strokeColor: "#22A7F0",
                        pointColor: "#22A7F0",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#22A7F0",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            myBarChart = new Chart(ctx).Bar(data, option_bars);
        });

        $(function () {
            var ctx, data, myBarChart, option_bars;
            Chart.defaults.global.responsive = true;
            ctx = $('#radar-chart').get(0).getContext('2d');
            option_bars = {
                scaleBeginAtZero: true,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: false,
                barShowStroke: false,
                barStrokeWidth: 0,
                barValueSpacing: 5,
                barDatasetSpacing: 1,
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
            };
            data = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(26, 188, 156,0.2)",
                        strokeColor: "#1ABC9C",
                        pointColor: "#1ABC9C",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#1ABC9C",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }, {
                        label: "My Second dataset",
                        fillColor: "rgba(34, 167, 240,0.2)",
                        strokeColor: "#22A7F0",
                        pointColor: "#22A7F0",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#22A7F0",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            myBarChart = new Chart(ctx).Radar(data, option_bars);
        });

        $(function () {
            var ctx, data, myPolarAreaChart, option_bars;
            Chart.defaults.global.responsive = true;
            ctx = $('#polar-area-chart').get(0).getContext('2d');
            option_bars = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 2,
                scaleBackdropPaddingX: 2,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
            };
            data = [
                {
                    value: 300,
                    color: "#FA2A00",
                    highlight: "#FA2A00",
                    label: "Red"
                }, {
                    value: 50,
                    color: "#1ABC9C",
                    highlight: "#1ABC9C",
                    label: "Green"
                }, {
                    value: 100,
                    color: "#FABE28",
                    highlight: "#FABE28",
                    label: "Yellow"
                }, {
                    value: 40,
                    color: "#999",
                    highlight: "#999",
                    label: "Grey"
                }, {
                    value: 120,
                    color: "#22A7F0",
                    highlight: "#22A7F0",
                    label: "Blue"
                }
            ];
            myPolarAreaChart = new Chart(ctx).PolarArea(data, option_bars);
        });

        $(function () {
            var ctx, data, myLineChart, options;
            Chart.defaults.global.responsive = true;
            ctx = $('#pie-chart').get(0).getContext('2d');
            options = {
                showScale: false,
                scaleShowGridLines: false,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 0,
                scaleShowHorizontalLines: false,
                scaleShowVerticalLines: false,
                bezierCurve: false,
                bezierCurveTension: 0.4,
                pointDot: false,
                pointDotRadius: 0,
                pointDotStrokeWidth: 2,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 4,
                datasetFill: true,
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
            };
            data = [
                {
                    value: 300,
                    color: "#FA2A00",
                    highlight: "#FA2A00",
                    label: "Red"
                }, {
                    value: 50,
                    color: "#1ABC9C",
                    highlight: "#1ABC9C",
                    label: "Green"
                }, {
                    value: 100,
                    color: "#FABE28",
                    highlight: "#FABE28",
                    label: "Yellow"
                }
            ];
            myLineChart = new Chart(ctx).Pie(data, options);
        });

        $(function () {
            var ctx, data, myLineChart, options;
            Chart.defaults.global.responsive = true;
            ctx = $('#jumbotron-line-chart').get(0).getContext('2d');
            options = {
                showScale: false,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: true,
                bezierCurve: false,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
            };
            data = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(34, 167, 240,0.2)",
                        strokeColor: "#22A7F0",
                        pointColor: "#22A7F0",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#22A7F0",
                        data: [28, 48, 40, 45, 76, 65, 90]
                    }
                ]
            };
            myLineChart = new Chart(ctx).Line(data, options);
        });

    }).call(this);

</script>