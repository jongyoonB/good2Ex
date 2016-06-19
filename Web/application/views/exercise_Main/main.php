<!--main.html

레벨, 닉네임, 스탬프 정보
- user테이블에서 로그인 세션을 이용하여 프로필 사진, level, nick를 뽑아옴

스탬프 정보
- challenge_complete_list 테이블에서 로그인 세션을 이용하여 사용자의 challenge번호 개수를 뽑아옴

몸무게
- 로그인 세션을 이용하여 weight 테이블에서 date, weight 정보를 뽑아 그것을 토대로 그래프를 그려냄

달성률
- 로그인 세션을 이용하여 exercise_record 테이블에서 exercise_number, target_count, clear_count 정보를 뽑아 그것을 토대로 그래프를 그려냄

9. 오늘의 운동계획
- 로그인 세션을 이용하여 exercise_record 테이블에서 target_count 정보를 뽑아냄

10. 게시판
- 로그인 세션을 이용하여 board 테이블에서 board_category가 board인 target_count 정보를 뽑아냄

11. QnA
- 로그인 세션을 이용하여 board 테이블에서 board_category가 qna인 target_count 정보를 뽑아냄
-->
<?php
if (isset($_SESSION["user_info"])) {
    $user_info = $_SESSION["user_info"];
} else {
    $user_info = false;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/public/js/vendor/jquery.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <title></title>
    <link rel="stylesheet" href="/public/icon/foundation-icons.css">
    <link rel="stylesheet" href="/public/css/foundation.min.css">
    <link rel="stylesheet" href="/public/css/foundation.css">
    <script src="/public/jquery-2.2.0/jquery-2.2.0.min.js"></script>
    <script type="text/javascript">

        $(function () {

            // Create the chart
            $('#container2').highcharts({
                chart: {
                    type: 'column',
                    height: 422
                },
                title: {
                    text: '달성률'
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
                    height: 422
                },
                title: {
                    text: 'BMI'
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
    <script>
        history.pushState(null, null, location.href);
        window.onpopstate = function (event) {
            history.go(1);
        }
    </script>

    <style>
        body {
        @import url(http://fonts.googleapis.com/css?family=Noto+Sans);

            font-family: 'Noto Sans', sans-serif;
        }

        .liquidFillGaugeText {
            font-family: Helvetica;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="top-bar" style="background-color: white">
    <div class="top-bar-left">
        <img src="/public/img/logo.png" style="margin-left:10px; width: 15%">
    </div>
    <div class="top-bar-right">
        <a href="/main/exercise_Free">자유게시판</a>
        <a href="/main/exercise_QnA">QNA</a>
    </div>
</div>

<div class="row expanded callout primary"
     style="border-color:#0097dc; background-color: #0097dc;">
    <div class="small-2 large-2 columns" style="margin-left: 5%">
        <img src="/public/img/main/exerciseStart.png"
             style="max-width: 60%; display: block; margin-left: auto; margin-right: auto">
        <a href="/main/exercise_Go"><p class="text-center" style="color: white; font-size: 20px">운동시작</p></a>
    </div>

    <div class="small-2 large-2 columns" style="margin-left: 20%">
        <img src="/public/img/main/exercisePlan.png"
             style="max-width: 60%; display: block; margin-left: auto; margin-right: auto">
        <!--    <a href="/main/exercise_Plan"><p class="text-center" style="color : WHITE; font-size: 20px" ;">운동 계획</p></a>
     -->      <a data-target="#layerpop" data-toggle="modal">
            <p class="text-center" style="color : WHITE; font-size: 20px" ;">운동 계획</p>
        </a>
        <div class="modal fade" id="layerpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">운동 계획</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <a class="selectPlan" href="/main/exercise_Beginner_date"><div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="/public/img/exercise/beginner.png" style="height: 20%">
                                        <div class="caption">
                                            <h3 style="text-align: center">초보자 모드</h3>
                                            <p class="lead">운동에 자신이 없는 당신에게 완벽한 운동 계획을 만들어 줍니다.</p>


                                        </div>
                                    </div>
                                </div></a>

                            <a class="selectPlan" href="/main/exercise_Plan">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="/public/img/exercise/myself.jpg" style="height: 20%">
                                        <div class="caption">
                                            <h3 style="text-align: center">혼자 계획하기</h3>
                                            <p class="lead">운동에 대한 기본적인 지식을 갖추셨나요? 그럼 스스로 운동계획을 세워보세요!</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="selectPlan" href="/main/exercise_date"><div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="/public/img/exercise/calendar.jpg" style="height: 20%">
                                        <div class="caption">
                                            <h3 style="text-align: center">운동 날짜 보기</h3>
                                            <p class="lead">계획한 운동을 확인하고 싶거나 수정,삭제하고 싶으신가요? 여기서 확인하세요!</p>
                                        </div>
                                    </div>
                                </div></a>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="small-2 large-2 columns" style="margin-right: 5%">
        <img src="/public/img/main/graph.png"
             style="max-width: 60%; display: block; margin-left: auto; margin-right: auto">
        <a href="/main/exercise_Bodycheck"><p class="text-center" style="color : WHITE; font-size: 20px" ;">마이 헬스 다이어리</p></a>
    </div>
</div>

<div class="row expanded">
    <div class="large-4 columns"style="">

        <div class="column row"
             style="padding-left:10px; padding-right:10px; margin-bottom: 15px; border: 3px solid #E3E5E8;">
            <div id="container"></div>
        </div>

        <!--        <div class="column row"
             style="border: 3px solid #E3E5E8; padding-right: 5px; padding-left: 5px; margin-bottom: 15px">
            <table>
                <thead>
                <tr>
                    <th>게시판</th>
                </tr>
                </thead>
                <tbody>
                <?php
        /*                foreach ($board_info as $row) {
                            echo "<tr><td>" . $row->title . "</td></tr>";

                        }
                        */?>
                </tbody>
            </table>
        </div>-->

    </div>
    <div class="large-4 columns">

        <div class="column row" style="padding: 10px; margin-bottom: 15px; border: 3px solid #E3E5E8;">
            <div class="large-5 columns text-center">
                <?php
                echo "<img src='$user_info->pic' style='border:2px solid #666666; margin-top: 10px; margin-bottom: 7px; width: 90%'><br>";

                for ($i = 0; $i < count($user_info->level); $i++) {
                    echo "<i class='fi-star' style='color:yellow; font-size: 25px;'></i>";
                }

                ?>
            </div>
            <div class="large-4 columns text-center" style="margin-top: 17px">
                <?php
                echo "<span><h5><strong>$user_info->nick</strong></h5></span><br>";
                echo "<span><h7><i class='fi-trophy' style='color:sandybrown; font-size: 50px'></i> x $user_info->stamp</h7></span>";
                ?>
            </div>
            <div class="large-3 columns text-right">
                <i class="fi-widget" style="font-size: 47px;"></i>
                <i class="fi-torsos" style="color: gray; font-size: 47px"></i>
                <a href="/sign/logout">
                    <i class="fi-power" style="font-size: 47px; color: red;"></i>
                </a>
            </div>
        </div>

        <div class="column row" style="margin-bottom: 15px; border: 3px solid #E3E5E8;">
            <p class="text-center" style="padding-top: 10px">오늘의 운동 계획</p>
            <?php if ($exercise_plan) { ?>

                <table style="text-align: center; ">
                    <tr style="font-weight: bold">
                        <td>운동 이름</td>
                        <td>세트<br> 수</td>
                        <td>1세트 당<br> 횟수</td>
                    </tr>
                    <?php
                    foreach ($exercise_plan as $row) {
                        echo "<tr><td>" . $row->exercise_name . "</td>";
                        echo "<td>" . $row->number_of_set . "</td>";
                        echo "<td>" . $row->number_of_count . "</td>";
                    }
                    ?>
                </table>
            <?php } else { ?>
                <p class="text-center" style="padding-top: 10px">존재하지 않습니다.</p>
            <?php } ?>
        </div>

    </div>
    <div class="large-4 columns"style="">
        <div class="column row" style="margin-bottom: 15px; border: 3px solid #E3E5E8;">
            <div id="container2"></div>
        </div>

        <!--     <div class="column row" style="border: 3px solid #E3E5E8;  padding-right: 5px; padding-left: 5px">
            <table>
                <thead>
                <tr>
                    <th>QnA</th>
                </tr>
                </thead>
                <tbody>
                <?php
        /*                foreach ($qna_info as $row) {
                            echo "<tr><td>" . $row->title . "</td></tr>";

                        }
                        */?>
                </tbody>
            </table>
        </div>-->
    </div>
</div>

<div class="row">
    <div class="small-10 small-centered columns" style="background-color: #3adb76">

    </div>
</div>

<script src="/public/graph/highcharts.js" language="JavaScript"></script>
<script src="/public/graph/drilldown.js" language="JavaScript"></script>

</body>

<script src="/public/js/bootstrap.min.js"></script>
</html>