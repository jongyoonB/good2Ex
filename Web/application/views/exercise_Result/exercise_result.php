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
                        pointPadding: 0.2,
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

        .point {
            cursor: pointer;
        }

        #check_point_info {
            display: none;
            position: absolute;
        }

        #check_point_info div {
            position: absolute;
        }

        .radio {
            padding-left: 20px;
        }

        .radio label {
            display: inline-block;
            position: relative;
            padding-left: 5px;
        }

        .radio label::before {
            content: "";
            display: inline-block;
            position: absolute;
            width: 17px;
            height: 17px;
            left: 0;
            margin-left: -20px;
            border: 1px solid #cccccc;
            border-radius: 50%;
            background-color: #fff;
            -webkit-transition: border 0.15s ease-in-out;
            -o-transition: border 0.15s ease-in-out;
            transition: border 0.15s ease-in-out;
        }

        .radio label::after {
            display: inline-block;
            position: absolute;
            content: " ";
            width: 11px;
            height: 11px;
            left: 3px;
            top: 3px;
            margin-left: -20px;
            border-radius: 50%;
            background-color: #555555;
            -webkit-transform: scale(0, 0);
            -ms-transform: scale(0, 0);
            -o-transform: scale(0, 0);
            transform: scale(0, 0);
            -webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
        }

        .radio input[type="radio"] {
            opacity: 0;
        }

        .radio input[type="radio"]:focus + label::before {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }

        .radio input[type="radio"]:checked + label::after {
            -webkit-transform: scale(1, 1);
            -ms-transform: scale(1, 1);
            -o-transform: scale(1, 1);
            transform: scale(1, 1);
        }

        .radio input[type="radio"]:disabled + label {
            opacity: 0.65;
        }

        .radio input[type="radio"]:disabled + label::before {
            cursor: not-allowed;
        }

        .radio.radio-inline {
            margin-top: 0;
        }

        .radio-primary input[type="radio"] + label::after {
            background-color: #428bca;
        }

        .radio-primary input[type="radio"]:checked + label::before {
            border-color: #428bca;
        }

        .radio-primary input[type="radio"]:checked + label::after {
            background-color: #428bca;
        }
    </style>
</head>
<body>
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
<!--                <li><a href="/main/exercise_Free">자유게시판</a></li>-->
<!--                <li><a href="/main/exercise_QnA">QNA</a></li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                /*                if(isset($_SESSION["user_info"]))
                                {*/ ?>
                <li><a href="/sign/logout">LOGOUT</a></li>
                <?php /*}*/ ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row" style="margin: auto">
        <div class="col-lg-3">
            <div class="row" style="background-color: #a4caca; margin: auto; margin-bottom: 15px">
                <div style="padding: 20px 0px 20px 30px; box-shadow: 0px 2px 3px #cccccc;">
                    <p style="font-size: 25px;">운동시간</p>

                    <p class="text-center" style="font-size: 90px;">
                        <?php
                        for ($i = 0; $i < count($exercise_time); $i++) {
                            if ($i == count($exercise_time) - 1)
                                echo "<strong class='time_count'>$exercise_time[$i]</strong>";
                            else
                                echo "<strong class='time_count'>$exercise_time[$i]</strong>:";
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="row"
                 style="background-image:url('/public/img/exercise/Kcal.jpg'); background-size: cover;  margin: auto; background-repeat: no-repeat;margin-bottom: 15px; color: white;">
                <div style="padding: 20px 0px 20px 30px; box-shadow: 0px 2px 3px #cccccc;">
                    <p style="font-size: 25px;text-align: center">칼로리 정보</p>

                    <p style="font-size: 75px;text-align: center">
                        <strong id="calorie_count" style="color: #d2ff00;"><?php echo $calorie_info ?></strong>Kcal
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="row"
                 style="background-color: #b4bdc4; margin: auto; padding: 10px;  padding-top: 20px; box-shadow: 0px 2px 3px #cccccc;">
                <div class="col-md-6" style="padding-right: 0;">
                    <div class="row">
                        <div style="width:90%; position: relative;  margin-left: 10px;" id="human">
                            <img src="/public/img/exercise/musle_icon_2.png"
                                 style="width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left: 0;">
                    <div class="row" style="margin-bottom: 150%">
<!--                        <div class="btn-group" data-toggle="buttons" style="float: right">-->
<!--                            <label class="btn btn-default round btn-md" id="point_check">-->
<!--                                <input type="radio" name="menu" autocomplete="off">지적사항-->
<!--                            </label>-->
<!--                            <label class="btn btn-default round btn-md" id="muscle">-->
<!--                                <input type="radio" name="options" autocomplete="off">근육-->
<!--                            </label>-->
<!--                        </div>-->
                        <div class="btn-group" data-toggle="buttons" style="float: right">
                            <label class="btn btn-default round btn-md" id="point_check">
                                <input type="radio" name="menu" autocomplete="off">지적사항
                            </label>
<!--                            <label class="btn btn-default round btn-md" id="muscle">-->
<!--                                <input type="radio" name="options" autocomplete="off">근육-->
<!--                            </label>-->
                        </div>
                    </div>
                    <div class="row" style="padding-right: 15px;">
                        <div class="panel panel-default" style="font-size: 20px">
                            <!-- Default panel contents -->
                            <div class="panel-heading">운동 목록</div>
                            <!-- List group -->
                            <ul class="list-group">
                                <?php
                                for ($i = 0; $i < count($_SESSION['now_routine']); $i++) {
                                    $value = $i + 1;
                                    echo "<li class='list-group-item'>";
                                    echo "<div class='radio' style='margin: 0; padding:0; padding-left: 20px'>";
                                    echo "<input type='radio' class='exercise_info' name='radio' id='radio{$value}' value='{$_SESSION['now_routine'][$i]->exercise_name}' disabled=''>";
                                    echo "<label for='radio{$value}'>{$_SESSION['now_routine'][$i]->exercise_name}</label></div></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row" style="background-color: rgba(84, 130, 130, 0.3); margin: auto; margin-bottom: 15px">
                <div style="padding: 20px 0px 20px 30px; box-shadow: 0px 2px 3px #cccccc;">
                    <p style="font-size: 25px; color: white">오늘 수행한 운동</p>
                    <?php
                    for ($i = 0; $i < count($_SESSION['now_routine']); $i++) {
                        $plus = $i + 1;
                        echo "<p style='font-size: 20px'><span class='label label-default' style='margin: 0px 10px 0px 10px'>$plus</span>{$_SESSION['now_routine'][$i]->exercise_name}</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="row" style="background-color: white; margin: auto; margin-bottom: 15px">
                <div style="padding: 20px 30px 10px 30px; box-shadow: 0px 2px 3px #cccccc;">
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

<div class="row">
    <div style="width: 40%;" id="check_point_info"></div>
</div>

<script>
    $(document).ready(function () {

        var result = '<?= json_encode($position_check_on_today)?>';
        console.log(result);
        var position_check_on_today = JSON.parse(result);

//        result = '//= json_encode($position_check_on_another_day)?>//';
        //console.log(result);
        //var position_check_on_another_day = JSON.parse(result);

        <?php
        echo "var now_routine_info = " . json_encode($_SESSION['now_routine']) . ";"
        ?>


        //console.log("posi" + position_check_on_today);
        //console.log("ana" + position_check_on_another_day);
        var today_check, recent_check;
        var point_numb, exercise_name;

        $('#calorie_count').each(function () {
            $(this).prop('Counter', 0).animate({
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

        $('.btn').click(
            function () {

                if(!position_check_on_today)
                    alert("지적사항이 없습니다!");

                $('.exercise_info').removeAttr("disabled");
                $('#radio1').attr("checked", "");

                var menu = $(this).attr("id");
                //alert(id);

                if (menu == "point_check") {
                    $('.point').remove();

                    exercise_name = $('#radio1').attr("value");

                    point_numb = find_point(exercise_name);

                    console.log(point_numb);

                    drow_point(point_numb);

                    point_hover();

                } else if (menu == 'muscle') {
                    $('.point').remove();

                }

                $('.exercise_info').click(
                    function () {
                        //console.log(this);

                        exercise_name = $(this).attr("value");

                        $('.point').remove();

                        point_numb = find_point(exercise_name);
                        drow_point(point_numb);

                        point_hover();

                    }
                );

            });

        function find_point(exercise_name) {
            var value1 = Array();
            var value_count = 0;
            for (var i = 0; i < position_check_on_today.length; i++) {
                if (exercise_name == position_check_on_today[i].exercise_name) {
                    value1[value_count] = position_check_on_today[i].point_numb;

                    value_count++;
                }
            }

//            var value2 = Array();
//            value_count = 0;
//            for (var i = 0; i < position_check_on_another_day.length; i++) {
//                if (exercise_name == position_check_on_another_day[i].exercise_name) {
//                    value2[value_count] = position_check_on_another_day[i].point_numb;
//
//                    value_count++;
//                }
//            }
//
//            var value = value1.concat(value2);
           var value = value1;

            var point_numb = [];
            $.each(value, function (i, el) {
                if ($.inArray(el, point_numb) === -1) point_numb.push(el);
            });

            return point_numb;
        }

        function drow_point(point_numb) {
            for (var i = 0; i < point_numb.length; i++) {

                // 왼쪽 팔꿈치
                if (i == 0) {
                    //console.log(i);
                    $("#human").append("<div style='position: absolute; top: 35%; left: 18%;'><span class='point glyphicon glyphicon-record' id='" + i + "' style='font-size: 30px; color: #0064a2; opacity: 0.5'></span></div>");

                    // 오른쪽 팔꿈치
                } else if (i == 1) {
                    $("#human").append("<div style='position: absolute; top: 35%; left: 70%;'><span class='point glyphicon glyphicon-record' id='" + i + "' style='font-size: 30px; color: #0064a2; opacity: 0.5'></span></div>");

                    // 왼쪽 손목
                } else if (i == 2) {
                    //$("#human").append("<div style='position: absolute; top: 48%; left: 10%;'><span class='point glyphicon glyphicon-record' id='" + i + "' style='font-size: 30px; color: #0064a2; opacity: 0.5'></span></div>");

                    // 오른쪽 손목
                } else if (i == 3) {
                   // $("#human").append("<div style='position: absolute; top: 48%; left: 79%'><span class='point glyphicon glyphicon-record' id='" + i + "' style='font-size: 30px; color: #0064a2; opacity: 0.5'></span></div>");

                    // 무릎
                } else if (i == 4) {
                    $("#human").append("<div style='position: absolute; top: 67%; left: 34%;'><span class='point glyphicon glyphicon-record' id='" + i + "' style='font-size: 30px; color: #0064a2; opacity: 0.5'></span></div>");

                    // 상체
                } else if (i == 5) {
                    $("#human").append("<div style='position: absolute; top: 14%; left: 24%; width: 52%; height: 26%;' class='point' id='" + i + "'></div>");

                    // 다리
                } else if (i == 6) {
                    $("#human").append("<div style='position: absolute; top: 40%; left: 36%; width: 30%; height: 52%;' class='point' id='" + i + "'></div>");

                }

            }
        }

        function point_hover() {

            $('.point').hover(
                function (event) {
                    $(this).css('opacity', '1');

                    var point_numb = $(this).attr("id");

                    today_check = [];
                    recent_check = [];

                    for (var i = 0; i < position_check_on_today.length; i++) {
                        if (exercise_name == position_check_on_today[i]['exercise_name'] && point_numb == position_check_on_today[i]['point_numb'])
                        {
                            today_check[position_check_on_today[i]['position_check']] = position_check_on_today[i]['position_count'];
                        }
                    }

//                    for (var i = 0; i < position_check_on_another_day.length; i++) {
//                        if (exercise_name == position_check_on_another_day[i]['exercise_name'] && point_numb == position_check_on_another_day[i]['point_numb'])
//                            recent_check[position_check_on_another_day[i]['position_check']] = position_check_on_another_day[i]['position_count'];
//                    }

                    i = 0;
                    var categories = [];
                    for (var value1 in today_check) {
//                        for (var value2 in recent_check) {
//                            if (value1 == value2) {
                                //console.log(value1);
                                categories.push(value1);
                                console.log(categories);
//                            }
//                        }
                    }

                    var new_point = [];
                    var no_point = [];
                    if (categories.length > 0) {
                        var today_data = [];
                        for (var value in today_check) {
                            var flag = false;
                            for (var i = 0; i < categories.length; i++) {
                                if (categories[i] == value) {
                                    //console.log("같을 때 : " + value);
                                    flag = true;
                                    var data = today_check[value] - 0;
                                    today_data.push(data);
                                }
                            }

                            if(!flag)
                            {
                                //console.log("다를때");
                                //console.log(value);
                                var data = value;

                                new_point.push(data);
                                //console.log("dddd"+new_point);
                            }

                        }


                        //console.log(new_point);
//                        var recent_data = [];
//                        for (var value in recent_check) {
//                            var flag = false;
//                            for (var i = 0; i < categories.length; i++) {
//                                if (categories[i] == value) {
//                                    //console.log("같을 때2 : " + value);
//                                    flag = true;
//                                    var data = recent_check[value] - 0;
//                                    recent_data.push(data);
//                                }
//                            }
//
//                            if(!flag)
//                            {
//                                //console.log("다를때2");
//                                //console.log(value);
//                                var data = value;
//                                no_point.push(data);
//                                //console.log(no_point);
//                                 //console.log(new_point);
//                            }
//
//                        }
                        $("#check_point_info").empty();
                        $("#check_point_info").append("<div id='check_point'></div>");

                        check(categories, today_data);
//                        check(categories, today_data, recent_data);

                    } else {
                        $("#check_point_info").empty();
                    }


//                    if (no_point.length > 0) {
//                        $("#check_point_info").append("<div class='row'><div id='no_point'>전에 받은 지적사항</div></div>");
//
//                        for(var i=0; i<no_point.length; i++){
//                            $("#no_point").append("<p></p>");
//                        }
//
//                        //console.log("ddd");
//                    }
//
//                    if (new_point.length > 0) {
//                        $("#check_point_info").append("<div class='row'><div id='new_point'>새로 받은 지적사항</div></div>");
//
//                        for(var i=0; i<new_point.length; i++){
//                            $("#new_point").append("<p></p>");
//                        }
//                        //console.log("d");
//                    }

                    var left = event.pageX - $(this).offset().left + 30;
                    var top = event.pageY - $(this).offset().top + 500;
                    $('#check_point_info').css({top: top, left: left}).show();

                },
                function () {
                    $(this).css('opacity', '0.5');

                    $('#check_point_info').hide();
                }
            );
        }

        function check(categories, today_data) {
//        function check(categories, today_data, recent_data) {

            var height;
            if (categories.length == 1) {
                height = 170;
            } else if (categories.length == 2) {
                height = 250;
            }

            $(function () {
                $('#check_point').highcharts({
                    chart: {
                        type: 'bar',
                        height: height
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
                    xAxis: {
                        categories: categories,
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: null,
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: false,
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'left',
                        verticalAlign: 'bottom',
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [
//                        {
//                        name: '이전',
//                        data: recent_data
//                    },
                        {
                        name: '현재',
                        data: today_data
                    }]
                });
            });
        }


    });
</script>

<script src="/public/graph/highcharts.js" language="JavaScript"></script>
<script src="/public/js/highcharts-more.js" language="JavaScript"></script>
<script src="/public/graph/exporting.js" language="JavaScript"></script>
</body>
</html>