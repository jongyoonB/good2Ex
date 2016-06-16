<!--<!--exerciseResult.php
탭 네비게이션의 목록 생성 시, 세션에 저장되어 있는 운동 이름 이용
세션에 저장된 운동명을 이용하여 exercise_info 테이블에서 exercise_number를 받고 현재 세션에 저장되어있는 운동횟수,
현재 날짜 정보를 이용하여 exercise_record테이블에 현재 운동날짜(exercise_date)의 clear_count를 저장한다.
exercise_record 테이블에서 현재 날짜를 이용하여  user_routine_info 테이블에서 routine_list_index를 받아오고 그것으로 exercise_number와 number_of_count를 받아와서 달성률을 계산하여 그래프를 출력한다.
세션에 저장된 운동정보와 현재 날짜로 user_position_record 테이블에서 현재날짜와 현재 이전의 날짜(position_check_date)의 check_point_index를 받아 position_checkpoint 테이블에서 position_check를 가져온다.-->

<html>
<head>
    <script src="/public/jquery-2.2.0/jquery-2.2.0.min.js"></script>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/buttons.css" rel="stylesheet">
    <script src="/public/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        $(function () {
            $('#achievement_count').highcharts({
                chart: {
                    type: 'column',
                    height: 330
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: [
                        <?php
                        foreach ($achievement_count as $row) {
                            echo "'{$row->exercise_name}',";
                        }
                        ?>
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '횟수'
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
                tooltip: {
                    headerFormat: '<span style="font-size:15px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} :</td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.3,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: '목표 횟수',
                    data: [
                        <?php
                        foreach ($achievement_count as $row) {
                            echo "{$row->target_count},";
                        }
                        ?>
                    ]

                }, {
                    name: '달성 횟수',
                    data: [
                        <?php
                        foreach ($achievement_count as $row) {
                            echo "{$row->clear_count},";
                        }
                        ?>
                    ]

                }]
            });
        });
    </script>

    <style>
        body {
            background-color: #ececec;
        }

        /*.point {*/
        /*cursor: pointer;*/
        /*}*/

        #check_point_info {
            display: none;
            position: absolute;
        }

        #check_point_info div {
            position: absolute;
        }
    </style>
</head>
<body>
<?php
//exit(var_dump($achievement_count));
?>
<nav class="navbar navbar-default">
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
                <li><a href="/main/exercise_Go">운동시작</a></li>
                <li><a href="/main/exercise_Free">자유게시판</a></li>
                <li><a href="/main/exercise_QnA">QNA</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                /*                if(isset($_SESSION["user_info"]))
                                {*/ ?>
                <li><a href="/sign/logout">LOGOUT</a></li>
                <?php /*}*/ ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row" style="margin: auto">
        <div class="col-lg-3">
            <div class="row" style="background-color: #a4caca; margin: auto; margin-bottom: 15px">
                <div style="padding: 20px 0px 20px 30px; box-shadow: 0px 2px 3px #cccccc;">
                    <p style="font-size: 25px; color: white">오늘 수행한 운동</p>
                    <?php
                    for ($i = 0; $i < count($_SESSION['now_routine']); $i++) {
                        $plus = $i + 1;
                        echo "<p style='font-size: 22px'><span class='label label-default' style='margin: 0px 10px 0px 10px'>$plus</span>{$_SESSION['now_routine'][$i]->exercise_name}</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="row"
                 style="background-image:url('/public/img/exercise/Kcal.jpg'); background-size: cover;  margin: auto; background-repeat: no-repeat;margin-bottom: 15px; color: white;">
                <div style="padding: 20px 0px 20px 30px; box-shadow: 0px 2px 3px #cccccc;">
                    <p style="font-size: 25px">칼로리 정보</p>
                    <p style="font-size: 70px">
                        <strong id="calorie_count" style="color: #d2ff00"><?php echo $calorie_info ?></strong>Kcal
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="row"
                 style="background-color: #b4bdc4; margin: auto; margin-bottom: 15px; padding: 10px; box-shadow: 0px 2px 3px #cccccc;">
                <div class="col-md-7" style="padding-right: 0">
                    <div class="row">
                        <div style="width:82%; margin-right:10px; float:right; position: relative" id="human">
                            <img src="/public/img/exercise/musle_icon_2.png"
                                 style="width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-md-5" style="padding-left: 0;">
                    <div class="row" style="margin-bottom: 195%">
                        <div class="btn-group" data-toggle="buttons" style="float: right">
                            <label class="btn btn-default round btn-md" id="point_check">
                                <input type="radio" name="options" autocomplete="off">지적사항
                            </label>
                            <label class="btn btn-default round btn-md" id="muscle">
                                <input type="radio" name="options" autocomplete="off">근육
                            </label>
                        </div>
                    </div>
                    <div class="row" style="padding-right: 20px;">
                        <div class="exercise_list panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading" style="font-size: 20px">운동 목록</div>
                            <table class="table table-hover">
                                <?php
                                for ($i = 0; $i < count($_SESSION['now_routine']); $i++) {
                                    if ($i == 0)
                                        $color = '#57b79c';
                                    elseif ($i == 1)
                                        $color = 'f982e4';

                                    echo "<tr class='exercise_info {$i}' id='{$_SESSION['now_routine'][$i]->exercise_name}'><td><span class='glyphicon glyphicon-ok-circle' style='color: {$color}' aria-hidden='true'></span> {$_SESSION['now_routine'][$i]->exercise_name}</td></tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row" style="background-color: rgba(84, 130, 130, 0.3); margin: auto; margin-bottom: 15px">
                <div style="padding: 30px 0px 30px 40px; box-shadow: 0px 2px 3px #cccccc;">
                    <p style="font-size: 25px; ">운동시간</p>
                    <p class="text-center" style="font-size: 70px">
                        <strong class="time_count">00</strong>:<strong class="time_count">06</strong>:<strong
                            class="time_count">50</strong></p>
                </div>
            </div>
            <div class="row" style="background-color: white; margin: auto; margin-bottom: 15px">
                <div style="padding: 30px 30px 10px 40px; box-shadow: 0px 2px 3px #cccccc;">
                    <p style="font-size: 25px; margin-bottom: 20px">목표 달성</p>
                    <div id="achievement_count"></div>
                </div>
            </div>
            <div class="row">
                <!--                <div id="check_point_graph_another_day"></div>-->
                <!--                <div id="check_point_graph_today"></div>-->
            </div>
        </div>
    </div>
</div>

<div>
    <div id="check_point_info">
        <div id="container" style="width: 20%"></div>
    </div>
</div>

<script>
    $(document).ready(function () {

        var exercise_name;
        var exercise_info = Array();
        var result = '<?= json_encode($position_check_on_today)?>';
        var position_check_on_today = JSON.parse(result);

        //console.log(position_check_on_today);

        var result = '<?= json_encode($position_check_on_another_day)?>';
        var position_check_on_another_day = JSON.parse(result);

        $('#calorie_count').each(function () {
            $(this).prop('Counter', 10).animate({
                Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

        $('.time_count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    if (now < 10) {
                        $(this).text("0" + Math.ceil(now));
                    } else {
                        $(this).text(Math.ceil(now));
                    }

                }
            });
        });
        //$(id).css('background-color', '#DEF');


        //var exercise_info = true;
        $('.btn').click(
            function () {
                var id = $(this).attr("id");
                //alert(id);

                if (id == "point_check") {
                    $('.point').remove();

                    var value = Array();
                    for (var i = 0; i < position_check_on_today.length; i++) {
                        value[i] = position_check_on_today[i]['point_numb'];
                    }

//                    for (var i = 0; i < position_check_on_another_day.length; i++) {
//                        value[i] = position_check_on_another_day[i]['point_numb'];
//                    }

                    var point_numb = [];
                    $.each(value, function (i, el) {
                        if ($.inArray(el, point_numb) === -1) point_numb.push(el);
                    });

                    //console.log(point_numb);

                    for (var i = 0; i < point_numb.length; i++) {

                        // 왼쪽 팔꿈치
                        if (i == 0) {
                            $("#human").append("<div style='position: absolute; top: 35%; left: 18%;'><span class='point glyphicon glyphicon-record' style='font-size: 30px; color: #0064a2; opacity: 0.8'></span></div>");

                            // 오른쪽 팔꿈치
                        } else if (i == 1) {
                            $("#human").append("<div style='position: absolute; top: 35%; left: 70%;'><span class='point glyphicon glyphicon-record' style='font-size: 30px; color: #0064a2; opacity: 0.8'></span></div>");

                            // 왼쪽 손목
                        } else if (i == 2) {
                            $("#human").append("<div style='position: absolute; top: 48%; left: 10%;'><span class='point glyphicon glyphicon-record' style='font-size: 30px; color: #0064a2; opacity: 0.8'></span></div>");
                            $(".point:last").addClass(i);

                            // 오른쪽 손목
                        } else if (i == 3) {
                            $("#human").append("<div style='position: absolute; top: 48%; left: 79%'><span class='point glyphicon glyphicon-record' style='font-size: 30px; color: #0064a2; opacity: 0.8'></span></div>");

                            // 무릎
                        } else if (i == 4) {
                            $("#human").append("<div style='position: absolute; top: 67%; left: 34%;'><span class='point glyphicon glyphicon-record' style='font-size: 30px; color: #0064a2; opacity: 0.8'></span></div>");

                            // 상체
                        } else if (i == 5) {
                            $("#human").append("<div style='position: absolute; top: 14%; left: 24%; width: 52%; height: 26%;' class='point'></div>");

                            // 다리
                        } else if (i == 6) {
                            $("#human").append("<div style='position: absolute; top: 40%; left: 36%; width: 30%; height: 52%;' class='point'></div>");

                        }

                    }

                } else if (id == 'muscle') {
                    $('.point').remove();

                }

                $('.exercise_info').click(
                    function () {

                        //console.log(this);
                        exercise_name = $(this).attr("id");
                        //console.log(position_check_on_today);

                        $('.point').remove();

                        var value1 = Array();
                        var value_count = 0;
                        for (var i = 0; i < position_check_on_today.length; i++) {
                            if(exercise_name == position_check_on_today[i].exercise_name){
                                value1[value_count] = position_check_on_today[i].point_numb;

                                value_count++;
                            }
                        }

                        //console.log(value1);

//                        value_count = 0;
//                        var value2 = new Array();
//                        for (var i = 0; i < position_check_on_another_day.length; i++) {
//                            if(exercise_name == position_check_on_another_day[i]['exercise_name'])
//                            value2[value_count] = position_check_on_another_day[i].point_numb;

//                        value_count++;
//                        }
//
//                        var value = value1.concat(value2);
                        //console.log(value1[0]);

                        var point_numb = [];
                        $.each(value1, function (i, el) {
                            if ($.inArray(el, point_numb) === -1) point_numb.push(el);
                        });

                        //console.log(point_numb);
                        for (var i = 0; i < point_numb.length; i++) {

                            // 왼쪽 팔꿈치
                            if (i == 0) {
                                //console.log(i);
                                $("#human").append("<div style='position: absolute; top: 35%; left: 18%;'><span class='point glyphicon glyphicon-record' id='"+i+"' style='font-size: 30px; color: #0064a2; opacity: 1'></span></div>");

                                // 오른쪽 팔꿈치
                            } else if (i == 1) {
                                $("#human").append("<div style='position: absolute; top: 35%; left: 70%;'><span class='point glyphicon glyphicon-record' id='"+i+"' style='font-size: 30px; color: #0064a2; opacity: 1'></span></div>");

                                // 왼쪽 손목
                            } else if (i == 2) {
                                $("#human").append("<div style='position: absolute; top: 48%; left: 10%;'><span class='point glyphicon glyphicon-record' id='"+i+"' style='font-size: 30px; color: #0064a2; opacity: 1'></span></div>");

                                // 오른쪽 손목
                            } else if (i == 3) {
                                $("#human").append("<div style='position: absolute; top: 48%; left: 79%'><span class='point glyphicon glyphicon-record' id='"+i+"' style='font-size: 30px; color: #0064a2; opacity: 1'></span></div>");

                                // 무릎
                            } else if (i == 4) {
                                $("#human").append("<div style='position: absolute; top: 67%; left: 34%;'><span class='point glyphicon glyphicon-record' id='"+i+"' style='font-size: 30px; color: #0064a2; opacity: 1'></span></div>");

                                // 상체
                            } else if (i == 5) {
                                $("#human").append("<div style='position: absolute; top: 14%; left: 24%; width: 52%; height: 26%;' class='point' id='"+i+"'></div>");

                                // 다리
                            } else if (i == 6) {
                                $("#human").append("<div style='position: absolute; top: 40%; left: 36%; width: 30%; height: 52%;' class='point' id='"+i+"'></div>");

                            }

                        }

                        var result = $(this).attr("class");
                        var split = result.split(' ');
                        var order = split[split.length - 1];

                        if (order == 0)
                            $('.point').css('color', '#57b79c');
                        else if(order == 1)
                            $('.point').css('color', '#f982e4');

                        $('.point').css('opacity', '0.3');

                        $('.point').hover(
                            function (event) {
                                $(this).css('opacity', '1');

                                var point_numb = $(this).attr("id");

                                //console.log(position_check_on_today);

                                var value_count = 0;
                                //exercise_info['exercise_name']=[];
                                for (var i = 0; i < position_check_on_today.length; i++) {
                                    exercise_name[value_count]=position_check_on_today[i]['exercise_name'];
                                    console.log(exercise_info['exercise_name']);
//                                    if (exercise_name == position_check_on_today[i]['exercise_name']) {
//                                        //console.log(position_check_on_today[i]);
//                                        check[value_count] = position_check_on_today[i];
//
//                                    }
                                    value_count++;
                                }
                                console.log(exercise_name);

//                                for (var i = 0; i < position_check_on_another_day.length; i++) {
//                                    if (point_numb == position_check_on_another_day[i]['point_numb']) {
//                                        var check2 = position_check_on_another_day[i];
//                                    }
//                                }
                        var left = event.pageX - $(this).offset().left + 300;

                        var top = event.pageY - $(this).offset().top + 300;
                        $('#check_point_info').css({top: top, left: left}).show();

                                //console.log(check2);


                            },
                            function () {
                                $(this).css('opacity', '0.3');

                                $('#check_point_info').hide();
                            }
                        );

                    }
                );

            });

// Data gathered from http://populationpyramid.net/germany/2015/
        $(function () {
            //console.log(exercise_info);
            // Age categories
            var categories = ['덤벨 숄더 플레스', '사이드 레터럴 레이즈'];
            $(document).ready(function () {
                $('#container').highcharts({
                    chart: {
                        type: 'bar',
                        height: 230
                    },
                    title: {
                        text: null
                    },
                    subtitle: {
                        text: null
                    },
                    navigation: {
                        buttonOptions: {
                            enabled: false
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    xAxis: [{
                        categories: categories,
                        reversed: false,
                        labels: {
                            step: 1
                        }
                    }, { // mirror axis on right side
                        opposite: true,
                        reversed: false,
                        categories: categories,
                        linkedTo: 0,
                        labels: {
                            step: 1
                        }
                    }],
                    yAxis: {
                        title: {
                            text: '체크 횟수'
                        },
                        labels: {
                            formatter: function () {
                                return Math.abs(this.value);
                            }
                        }
                    },

                    plotOptions: {
                        series: {
                            stacking: 'normal',
                            dataLabels: {
                                enabled: true,
                                formatter: function () {
                                    return Highcharts.numberFormat(Math.abs(this.point.y), 0);
                                }
                            }
                        }
                    },

                    tooltip: false,

                    series: [{
                        name: '이전',
                        data: [-2, -6]
                    }, {
                        name: '현재',
                        data: [2, 6]
                    }]
                });
            });

        });

    });
</script>

<script src="/public/graph/highcharts.js" language="JavaScript"></script>
<script src="/public/graph/highcharts-more.js" language="JavaScript"></script>
<script src="/public/graph/exporting.js" language="JavaScript"></script>
</body>
</html>