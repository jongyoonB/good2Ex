<!--exercise_date.php
exercise_date 정보로 달력에 표시
아이콘 클릭 시, 해당 날짜의 정보와 로그인 세션을 이용하여 user_routine_info 테이블의 routine_list_index를 받아서 그것을 통하여 exercise_order 테이블의 exercise_order와 exercise_repeat_number 테이블의 number_of_set, number_of_count의 정보를 받아 옴
수정버튼 클릭 시, 해당 날짜의 정보와 로그인 세션을 이용하여 user_routine_info 테이블의 routine_list_index를 받아서 그것을 통하여 exercise_order 테이블의 exercise_order와 exercise_repeat_number 테이블의 number_of_set, number_of_count의 정보 수정
삭제 버튼 클릭 시, 해당 날짜의 정보와 로그인 세션을 이용하여 user_routine_info 테이블의 routine_list_index를 받아서 그것을 통하여 exercise_order 테이블의 exercise_order와 exercise_repeat_number 테이블의 number_of_set, number_of_count의 정보 삭제
-->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <title>Calendar</title>

    <link rel="stylesheet" href="/public/css/exercise_date.css">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <style>

        a:hover {
            color: blue;
            text-decoration: none
        }

        ul {
            list-style: none;
        }

        div {
            overflow: hidden;
            height: auto;
        }

        .part_Goal li:first-child { /*부위;목적*/
            border-left: none;
        }

        /*여기서부터 preview css*/
        .preview_body {
            text-align: center;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
            position: relative;

            width: 85%;
            height: 80%;
            background-color: #5bc0de;
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
                <li><a href="/main/exercise_Free">자유게시판</a></li>
                <li><a href="/main/exercise_QnA">QNA</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                /*                if(isset($_SESSION["user_info"]))
                                {*/ ?>
                <li><<a href="/sign/logout">LOGOUT</a></li>
                <?php /*}*/ ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="list-group" style="width: 15%;float: left;text-align: center;">
    <span class="fa fa-plus-square list-group-item" style="width: 100%" aria-hidden="true"><a href="#"> 운동선택</a></span>
    <span class="fa fa-calendar list-group-item active" style="width: 100%" aria-hidden="true"><a href="#">
            날짜선택</a></span>
    <span class="fa fa-check-square-o list-group-item" style="width: 100%" aria-hidden="true"><a href="#">
            계획완료</a></span>
    <button type="button" id="nextButton" class="btn btn-success" style="text-align: center; margin-top: 10px">날짜 선택 완료</button>
</div>



<div style="margin:auto; width:80%; margin-bottom: 10px; float: left">
    <?php
    echo $calendar;
    ?>
</div>


<script src="/public/jquery-2.2.0/jquery-2.2.0.min.js" language="JavaScript"></script>
<script>
    var addDay = new Array();

    function get_day($date) {

        var date = String($date);
        var year = date.substring(0, 4);
        var month = date.substring(4, 6);
        var day = date.substring(6, date.length);

        date = year + '-' + month + '-' + day;

        console.log(year);
        console.log(month);
        console.log(day);

        var today = new Date();
        var this_year = today.getFullYear();
        var this_month = today.getMonth() + 1; //January is 0!
        var this_day = today.getDate();

        if ((this_year > year || this_month > month) || this_day == month && this_day > day) {
            alert('오늘 날짜보다 이전입니다.');
        } else {
            var id = '.' + day;
            var flag = false;
            var order = 0;

            $(id).css('background-color', 'white');

            if (addDay.length == 0) {
                addDay.push(date);
            } else {
                for (var i = 0; i < addDay.length; i++) {
                    if (addDay[i] == date) {
                        order = i;
                        flag = true;
                        console.log(order);
                    }
                }
                if (flag) {
                    $(id).css('background-color', '#DEF');
                    addDay.splice(order, 1);
                    flag = false;
                } else {
                    addDay.push(date);
                }
            }

            console.log(addDay);
        }

    }

    $('.btn').click(function () {
        if (addDay.length == 0) {
            alert("날짜를 선택해주세요");
        } else {
            $.ajax({
                type: "post",
                url: '/main/save_routine',
                data: {
                    days: addDay
                },
                dataType: 'json',
                success: function (data) {
                    location.replace('/main/exercise_Preview/');

                },
                error: function (data, error, result) {
                    console.log(data);
                    console.log(result);
                    console.log(error);
                }
            });
        }
    });


</script>

<script>
    $('.day').click(function () {

        var this_id = $(this).attr('id');
        var date = this_id;
        var year = date.substring(0, 4);
        var month = date.substring(4, 6);
        var day = date.substring(6, date.length);
        var new_id = '#' + date;

        date = year + '-' + month + '-' + day;

        $.ajax({
            type: "post",
            url: '/main/get_exercise_plan',
            data: {
                date: date
            },
            dataType: 'json',
            success: function (data) {
                var Rplan = data;
                console.log(data);
                var dd = Rplan.length;
                $('.modal-content').html("<div class='modal-header'>" +
                    "<button type='button' class='close'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>" +
                    "<h4 class='modal-title' id='myModalLabel'>운동 계획</h4>" +
                    "</div>" +
                    "<div class='modal-body' id='exercise_modal'>" +
                    "</div>" +
                    "<div class='modal-footer'>" +
                    "<button type='button' class='btn btn-default' onclick='update_Exercise()'>수정</button>" +
                    "<button type='button' class='btn btn-default' onclick='delete_Exercise()'>삭제</button>" +
                    "<input type='hidden' id='exercise_hidden_date'>" +
                    "</div>");
                for (var i = 0; i < Rplan.length; i++) {
                    var form = $('<form></form>').addClass("exercise_form" + i);
                    $('<h3 style="text-align: center"></h3>').text("운동 이름 :" + Rplan[i].exercise_name).appendTo(form);
                    $('<h3 style="text-align: center"></h3>').text("세트수 :" + Rplan[i].number_of_set + "     세트당 횟수 :" + Rplan[i].number_of_count).appendTo(form);
                    $('<br>').appendTo(form);
                    $('<br>').appendTo(form);
                    $('#exercise_modal').after(form);
                }
                $('#exercise_hidden_date').val(date);
            },
            error: function (data, error, result) {
                console.log(data);
                console.log(result);
                console.log(error);
            }
        });
    });

    function update_Exercise()
    {
        var date = $('#exercise_hidden_date').val();
        var year = date.substring(0, 4);
        var month = date.substring(5, 7);
        var day = date.substring(8, date.length);

        $('.modal-content').html("<div class='modal-header'>" +
            "<button type='button' class='close'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>" +
            "<h4 class='modal-title' id='myModalLabel'>Modal title</h4>" +
            "</div>" +
            "<div class='modal-body' id='exercise_modal'>" +
            "<input type='hidden' id='click_date'>" +
            "<input type='date' id='exercise_update_date'>" +
            "</div>" +
            "<div class='modal-footer'>" +
            "<button type='button' class='btn btn-default' onclick='update_ExerciseR()'>확인</button>" +
            "</div>");
        $('#click_date').attr({value: date});

    }

    function update_ExerciseR()
    {
        var date = $('#exercise_update_date').val();
        var click = $('#click_date').val();

        $.ajax({
            type: "post",
            url: '/main/update_exercise',
            data: {
                date: click, nextdate: date
            },
            dataType: 'json',
            success: function(data) {
                location.href="http://jycom.asuscomm.com:5080/main/exercise_Beginner_date";
            },
            error: function(err) {
                location.href="http://jycom.asuscomm.com:5080/main/exercise_Beginner_date";
            }
        });
    }

    function delete_Exercise()
    {
        var date = $('#exercise_hidden_date').val();
        var year = date.substring(0, 4);
        var month = date.substring(5, 7);
        var day = date.substring(8, date.length);
        $.ajax({
            type: "post",
            url: '/main/delete_exercise',
            data: {
                date: date
            },
            dataType: 'json',
            success: function(data) {
                location.href="http://jycom.asuscomm.com:5080/main/exercise_Beginner_date";
            },
            error: function(err) {
                location.href="http://jycom.asuscomm.com:5080/main/exercise_Beginner_date";
            }
        });
    }


    //    function hover($date) {
    //        console.log($date);
    //
    //        var date = String($date);
    //        var year = date.substring(0, 4);
    //        var month = date.substring(4, 6);
    //        var day = date.substring(6, date.length);
    //
    //        date = year + '-' + month + '-' + day;
    //
    //        $.ajax({
    //            type: "post",
    //            url: '/main/get_exercise_plan',
    //            data: {
    //                date: date
    //            },
    //            dataType: 'json',
    //            success: function (data) {
    //                console.log(data);
    //
    //
    //                var title = $( "#"+day ).attr( "data-content", "dd");
    //            },
    //            error: function (data, error, result) {
    //                console.log(data);
    //                console.log(result);
    //                console.log(error);
    //            }
    //        });
    //
    //    }
    //    $(document).ready(function(){
    //console.log("d");
    //        $('[data-toggle="popover"]').popover({
    //            trigger: 'hover',
    //            title : "운동 계획"
    //        });
    //    });
</script>

<div></div>
<script src="/public/js/bootstrap.min.js"></script>
</body>
</html>