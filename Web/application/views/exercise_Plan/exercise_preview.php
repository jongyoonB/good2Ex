<!--exercise_preview.php
루틴저장 시, 세션에 저장된 운동이름을 이용하여 exercise_info 테이블의 exercise_number를 알아내고 세션에 저장된 운동셋트와 횟수를 exercise_repeat_number 테이블의 number_of_set와 number_of_count에 저장한다.
세션에 저장된 운동 순서는 아까 저장한 exercise_repeat_number의 number_set_index를 받아 exercise_order 테이블의 exercise_order에 저장한다.
루틴이름 설정 시, exercise_order 테이블의 routine_list_index를 가져와 routine_list 테이블에 routine_name을 저장한다.-->
<?php
if (isset($_SESSION["user_info"])) {
    $user_info = $_SESSION["user_info"];
    //echo "로그인중";
} else {
    $user_info = false;
}
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <!-- <script src="/public/js/vendor/modernizr.js"></script>-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/buttons.css">
    <script src="/public/js/vendor/jquery.js"></script>

    <!-- bxSlider Javascript file -->

    <!-- bxSlider CSS file -->

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <style>
        @font-face {
            font-family: HANYG0230;
            src: url('../../../public/fonts/HANYGO230.ttf'); format('truetype');
        }
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

            width: 83%;
            height: 80%;
            margin-left: 17%;
        }
        .border_chart{
            border-top: 1px solid silver;
            border-bottom: 1px solid silver;
            border-left: 1px solid silver;
            border-right: 1px solid silver;
        }

    </style>

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
                    <li><a href="/main/exercise_Go" style="font-family: HANYG0230">운동시작</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/sign/logout" style="font-family: HANYG0230">LOGOUT</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

</head>
<body>
<!-- Requires Foundation 4 | visit http://foundation.zurb.com to download -->


<!-- Main Page Content and Sidebar -->
<?php
if ('exercise_Plan/exercise_preview') {
    ?>
    <!--<div class="asideSelect">
        <aside>
            <ul>
                <li style="padding: 15%"><a href="#">날짜 선택</a></li>
                <li style="background-color: #5bc0de; padding: 15%"><a href="#" style="color: white">운동 선택</a></li>
                <li style="padding: 15%"><a href="#">계획 완료</a></li>
            </ul>
        </aside>
    </div>-->

    <div class="list-group" style="width: 15%;float: left;text-align: center;">
        <span class="fa fa-calendar list-group-item" style="width: 100%" aria-hidden="true"><a href="#"> 날짜선택</a></span>
        <span class="fa fa-plus-square list-group-item" style="width: 100%" aria-hidden="true"><a href="#">
                운동선택</a></span>
        <span class="fa fa-check-square-o list-group-item active" style="width: 100%" aria-hidden="true"><a href="#">
                계획완료</a></span>
    </div>
<?php } ?>
<div class="preview_body">
    <h1  style="font-family: HANYG0230">운동 계획이 완료 되었습니다!</h1>

    <?php
    //exit(var_dump($user_complete_info));
    for($i=0; $i < count($user_complete_info); $i++){
        foreach ($user_complete_info[$i] as $row) {
            echo "<table class='table'>";
            echo "<tr style='font-family: HANYG0230;text-align: center;background-color: #1e87c3;color: white'><td>날짜</td><td>루틴 이름</td><td>운동 이름</td><td>운동 설명</td><td>횟수</td><td>세트</td></tr>";
            echo "<tr class='border_chart'><td>". $row->routine_date . "</td>";
            echo "<td style='font-family: HANYG0230;width: 15%;text-align: center'>". $row->routine_name . "</td>";
            echo "<td style='font-family: HANYG0230;width: 17%;text-align: center'>". $row->exercise_name . "</td>";
            echo "<td style='font-family: HANYG0230'>". $row->exercise_info . "</td>";
            echo "<td style='font-family: HANYG0230;width: 5%;text-align: center'>". $row->number_of_count . "</td>";
            echo "<td style='font-family: HANYG0230;width: 5%;text-align: center'>".  $row->number_of_set . "</td>";
            echo "</table>";
        }
    }
    ?>
    <a class="btn btn-primary raised" href="/main/exercise_Main" role="button" style="font-family: HANYG0230">완료</a>
</div>
<br>
<br>
</body>
</html>