<?php
//exit(var_dump($_SESSION['user_info']));
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>

    <script src="/public/jquery-2.2.0/jquery-2.2.0.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript">

        $(function () {

            // Create the chart
            $('#container2').highcharts({
                chart: {
                    type: 'column',
                    height: 300
                },
                title: {
                    text: null
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: null
                    }
                },
                legend: {
                    enabled: false
                },

                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                navigation: {
                    buttonOptions: {
                        enabled: false
                    }
                },
                credits: {
                    enabled: false
                },
                series: [
                    {
                        name: '목표 횟수',
                        data: [
                            <?php
                            foreach ($achievement_rate as $row) {
                                echo "{name: '$row->exercise_name',";
                                echo "y: $row->target_count,";
                                echo "drilldown: '$row->exercise_name-target_count'},";
                            }
                            ?>
                        ]
                    }, {
                        name: '달성 횟수',
                        data: [
                            <?php
                            foreach ($achievement_rate as $row) {
                                echo "{name: '$row->exercise_name',";
                                echo "y: $row->clear_count,";
                                echo "drilldown: '$row->exercise_name-clear_count'},";
                            }
                            ?>
                        ]
                    }],
                drilldown: {
                    activeAxisLabelStyle: {
                        textDecoration: 'none',
                    },
                    activeDataLabelStyle: {
                        textDecoration: 'none',
                    },
                    allowPointDrilldown: false,
                    series: [<?php
                        //exit(var_dump($achievement_rate));
                        foreach ($achievement_rate as $row1) {
                            echo "{";
                            echo "name: '목표 횟수',";
                            echo "id: '$row1->exercise_name-target_count',";
                            echo "data: [";
                            foreach ($achievement_rate_by_date as $row2) {
                                if ($row1->exercise_name == $row2->exercise_name) {
                                    echo "['$row2->exercise_date', $row2->target_count],";
                                }
                            }
                            echo "]},";
                        }

                        foreach ($achievement_rate as $row1) {
                            echo "{";
                            echo "name: '달성 횟수',";
                            echo "id: '$row1->exercise_name-clear_count',";
                            echo "data: [";
                            foreach ($achievement_rate_by_date as $row2) {
                                if ($row1->exercise_name == $row2->exercise_name) {
                                    echo "['$row2->exercise_date', $row2->clear_count],";
                                }
                            }
                            echo "]},";
                        }
                        ?>]
                }
            });
        });

        $(function () {
            $('#container').highcharts({
                chart: {
                    type: 'area',
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: [<?php
                        foreach ($BMI_info as $row) {
                            echo "'" . $row->date . "'" . ",";
                        }
                        ?>]
                },
                yAxis: {
                    title: {
                        text: null
                    },
                    plotLines: [{ // summer months - treat from/to as numbers
                        color: '#ffe400',
                        width: 2,
                        value: 18.5,
                    }, { // summer months - treat from/to as numbers
                        color: '#1fda11',
                        width: 2,
                        value: 23,
                    }, { // summer months - treat from/to as numbers
                        color: '#ff5e00',
                        width: 2,
                        value: 25,
                    }, { // summer months - treat from/to as numbers
                        color: '#ff0000',
                        width: 2,
                        value: 30,
                    }]
                },
                plotOptions: {

                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },
                navigation: {
                    buttonOptions: {
                        enabled: false
                    }
                },
                legend: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    valueSuffix: 'kg'
                },
                series: [{
                    name: 'BMI',
                    marker: {
                        symbol: 'circle'
                    },
                    data: [<?php
                        foreach ($BMI_info as $row) {
                            echo $row->BMI . ",";
                        }
                        ?>]

                }]
            });
        });
    </script>

    <style>
        @font-face {
            font-family: HANYG0230;
            src: url('../../../public/fonts/HANYGO230.ttf'); format('truetype');
        }
        /*
         * Base structure
         */

        /* Move down content because we have a fixed navbar that is 50px tall */
        body {
            padding-top: 50px;
        }

        /*
         * Global add-ons
         */

        .sub-header {
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        /*
         * Top navigation
         * Hide default border to remove 1px line.
         */
        .navbar-fixed-top {
            border: 0;
        }

        /*
         * Sidebar
         */

        /* Hide for mobile, show later */
        .sidebar {
            display: none;
        }

        @media (min-width: 768px) {
            .sidebar {
                position: fixed;
                top: 51px;
                bottom: 0;
                left: 0;
                z-index: 1000;
                display: block;
                padding: 20px;
                overflow-x: hidden;
                overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
                background-color: #f5f5f5;
                border-right: 1px solid #eee;
            }
        }

        /* Sidebar navigation */
        .nav-sidebar {
            margin-right: -21px; /* 20px padding + 1px border */
            margin-bottom: 20px;
            margin-left: -20px;
        }

        .nav-sidebar > li > a {
            padding-right: 20px;
            padding-left: 20px;
        }

        .nav-sidebar > .active > a,
        .nav-sidebar > .active > a:hover,
        .nav-sidebar > .active > a:focus {
            color: #fff;
            background-color: #428bca;
        }

        /*
         * Main content
         */

        .main {
            padding: 20px;
        }

        @media (min-width: 768px) {
            .main {
                padding-right: 40px;
                padding-left: 40px;
            }
        }

        .main .page-header {
            margin-top: 0;
        }

        /*
         * Placeholder dashboard ideas
         */

        .placeholders {
            margin-bottom: 30px;
            text-align: center;
        }

        .placeholders h4 {
            margin-bottom: 0;
        }

        .placeholder {
            margin-bottom: 20px;
        }

        .placeholder img {
            display: inline-block;
            border-radius: 50%;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/main/exercise_Main" style="display: block">
                <img alt="Brand" src="/public/img/logo.png" style="width: 50px;height: auto"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/main/exercise_Go"  style="font-family: HANYG0230">운동시작</a></li>
                <li><a href="/main/exercise_Free"  style="font-family: HANYG0230">자유게시판</a></li>
                <li><a href="/main/exercise_QnA"  style="font-family: HANYG0230">QNA</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                /*                if(isset($_SESSION["user_info"]))
                                {*/ ?>
                <li><a href="#"  style="font-family: HANYG0230">LOGOUT</a></li>
                <?php /*}*/ ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-3 sidebar">
            <div class="row" style="padding-bottom:20px; border-bottom: 2px solid #eee">
                <div class="col-md-6">
                    <?php
                    echo "<img src='{$_SESSION['user_info']->pic}' style='border:2px solid #666666; width: 90%'><br>";
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    echo "<h3 style='font-family: HANYG0230'><strong>{$_SESSION['user_info']->nick}</strong></h3><br>";
                    ?>
                </div>
            </div>
            <ul class="nav nav-sidebar" style="text-align: center; font-size: 20px">
                <li><a href="#" style="font-family: HANYG0230">프로필</a>
                </li>
                <li><a href="#"  style="font-family: HANYG0230">회원정보설정</a></li>
                <li class="active" style="font-family: HANYG0230"><a href="#">BodyCheck</a></li>
                <li><a href="#" style="font-family: HANYG0230">도전과제</a></li>
                <li><a href="#" style="font-family: HANYG0230">랭킹</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-9 main">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#graph" data-toggle="tab" style="font-family: HANYG0230">그래프</a></li>
                <li><a href="#picture" data-toggle="tab" style="font-family: HANYG0230">사진 모음</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="border-color: #e5e5e5; border-style: solid; border-width: 0px 1px 1px 1px;">
                <div class="tab-pane active" id="graph">
                    <p style="font-family: HANYG0230;padding: 10px; padding-left: 20px; padding-top: 20px; border-bottom: 1px solid #eee; font-size: 25px">
                        BMI</p>
                    <div id="container" style="width: 90%; margin: auto"></div>

                    <p style="font-family: HANYG0230;padding: 10px; padding-left: 20px; padding-top: 30px; border-bottom: 1px solid #eee; font-size: 25px">
                        달성률</p>
                    <div id="container2" style="width: 90%; margin: auto"></div>

                </div>
                <div class="tab-pane" id="picture">
                    <h2 class="sub-header">Section title</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,001</td>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <td>1,002</td>
                                <td>amet</td>
                                <td>consectetur</td>
                                <td>adipiscing</td>
                                <td>elit</td>
                            </tr>
                            <tr>
                                <td>1,003</td>
                                <td>Integer</td>
                                <td>nec</td>
                                <td>odio</td>
                                <td>Praesent</td>
                            </tr>
                            <tr>
                                <td>1,003</td>
                                <td>libero</td>
                                <td>Sed</td>
                                <td>cursus</td>
                                <td>ante</td>
                            </tr>
                            <tr>
                                <td>1,004</td>
                                <td>dapibus</td>
                                <td>diam</td>
                                <td>Sed</td>
                                <td>nisi</td>
                            </tr>
                            <tr>
                                <td>1,005</td>
                                <td>Nulla</td>
                                <td>quis</td>
                                <td>sem</td>
                                <td>at</td>
                            </tr>
                            <tr>
                                <td>1,006</td>
                                <td>nibh</td>
                                <td>elementum</td>
                                <td>imperdiet</td>
                                <td>Duis</td>
                            </tr>
                            <tr>
                                <td>1,007</td>
                                <td>sagittis</td>
                                <td>ipsum</td>
                                <td>Praesent</td>
                                <td>mauris</td>
                            </tr>
                            <tr>
                                <td>1,008</td>
                                <td>Fusce</td>
                                <td>nec</td>
                                <td>tellus</td>
                                <td>sed</td>
                            </tr>
                            <tr>
                                <td>1,009</td>
                                <td>augue</td>
                                <td>semper</td>
                                <td>porta</td>
                                <td>Mauris</td>
                            </tr>
                            <tr>
                                <td>1,010</td>
                                <td>massa</td>
                                <td>Vestibulum</td>
                                <td>lacinia</td>
                                <td>arcu</td>
                            </tr>
                            <tr>
                                <td>1,011</td>
                                <td>eget</td>
                                <td>nulla</td>
                                <td>Class</td>
                                <td>aptent</td>
                            </tr>
                            <tr>
                                <td>1,012</td>
                                <td>taciti</td>
                                <td>sociosqu</td>
                                <td>ad</td>
                                <td>litora</td>
                            </tr>
                            <tr>
                                <td>1,013</td>
                                <td>torquent</td>
                                <td>per</td>
                                <td>conubia</td>
                                <td>nostra</td>
                            </tr>
                            <tr>
                                <td>1,014</td>
                                <td>per</td>
                                <td>inceptos</td>
                                <td>himenaeos</td>
                                <td>Curabitur</td>
                            </tr>
                            <tr>
                                <td>1,015</td>
                                <td>sodales</td>
                                <td>ligula</td>
                                <td>in</td>
                                <td>libero</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/public/graph/highcharts.js" language="JavaScript"></script>
<script src="/public/graph/drilldown.js" language="JavaScript"></script>
</body>
</html>

