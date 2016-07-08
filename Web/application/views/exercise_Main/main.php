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
    <link rel="stylesheet" href="/public/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/icon/foundation-icons.css">
    <link rel="stylesheet" href="/public/css/foundation.min.css">
    <link rel="stylesheet" href="/public/css/foundation.css">
    <script src="/public/jquery-2.2.0/jquery-2.2.0.min.js"></script>
    <script>
        $(function () {

            $('#slide-submenu').on('click', function () {
                $(this).closest('.list-group').fadeOut('slide', function () {
                    $('.mini-submenu').fadeIn();
                });

            });

            $('.mini-submenu').on('click', function () {
                $(this).next('.list-group').toggle('slide');
                $('.mini-submenu').hide();
            })
        })

    </script>


    <style>
        @font-face {
            font-family: HANYG0230;
            src: url('../../../public/fonts/HANYGO230.ttf'); format('truetype');
        }

        body {
        @import url(http://fonts.googleapis.com/css?family=Noto+Sans);
            overflow-y: hidden;
            font-family: 'Noto Sans', sans-serif;
        }

        .liquidFillGaugeText {
            font-family: Helvetica;
            font-weight: bold;
        }

        .menu_shadow:hover {
            text-decoration: none;
            text-shadow: 1px 1px #2d2d2d;
        }

        .mini-submenu {
            display: none;
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid rgba(0, 0, 0, 0.9);
            border-radius: 4px;
            padding: 9px;
            /*position: relative;*/
            width: 42px;

        }

        .mini-submenu:hover {
            cursor: pointer;
        }

        .mini-submenu .icon-bar {
            border-radius: 1px;
            display: block;
            height: 2px;
            width: 22px;
            margin-top: 3px;
        }

        .mini-submenu .icon-bar {
            background-color: #000;
        }

        #slide-submenu {
            background: rgba(0, 0, 0, 0.45);
            display: inline-block;
            padding: 0 8px;
            border-radius: 4px;
            cursor: pointer;
        }
        .navbar-fat {
            position: absolute;
            background: -webkit-linear-gradient(0deg,rgba(0,0,0,0) 0,rgba(0,0,0,.5) 100%);
            background: linear-gradient(0deg,rgba(0,0,0,0) 0,rgba(0,0,0,.5) 100%);
            padding: 20px 60px 20px 20px;
        }
        .navbar-clean {
            background: 0 0;
        }
    </style>
</head>
<body>

<head>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="../../../public/img/main/mainPage.jpg" alt="...">

            <div class="carousel-caption">
            </div>
        </div>

        <div class="item">
            <img src="../../../public/img/main/mainPage2.jpg" alt="...">

            <div class="carousel-caption">
            </div>
        </div>

        <div class="item">
            <img src="../../../public/img/main/mainPage3.jpg" alt="...">

            <div class="carousel-caption">
            </div>
        </div>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="row expanded callout primary"
     style="border-color:#5f5f5f; background-color: #5f5f5f;">

    <div class="small-2 large-4 columns">
        <!--    <a href="/main/exercise_Plan"><p class="text-center" style="color : WHITE; font-size: 20px" ;">운동 계획</p></a>
     --> <a data-target="#layerpop" data-toggle="modal" class="menu_shadow">
            <p class="text-center"
               style="color : palevioletred; font-size: 33px; letter-spacing:-2px; font-family: HANYG0230">
                <img src="../../../public/img/main/calendar.png">
                Schedule
            </p>
        </a>

        <div class="modal fade" id="layerpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"style="font-family: HANYG0230">운동 계획</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!--        <a class="selectPlan" href="/main/exercise_Beginner_date"><div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <img src="/public/img/exercise/beginner.png" style="height: 20%">
                                                <div class="caption">
                                                    <h3 style="text-align: center">초보자 모드</h3>
                                                    <p class="lead">운동에 자신이 없는 당신에게 완벽한 운동 계획을 만들어 줍니다.</p>


                                                </div>
                                            </div>
                                        </div></a>-->

                            <a class="selectPlan" href="/main/exercise_Plan">
                                <div class="col-sm-6 col-md-6">
                                    <div class="thumbnail">
                                        <img src="/public/img/exercise/myself.jpg" style="height: 20%">

                                        <div class="caption">
                                            <h3 style="text-align: center;font-family: HANYG0230">혼자 계획하기</h3>

                                            <p class="lead" style="font-family: HANYG0230">운동에 대한 기본적인 지식을 갖추셨나요? 그럼 스스로 운동계획을 세워보세요!</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="selectPlan" href="/main/exercise_date">
                                <div class="col-sm-6 col-md-6">
                                    <div class="thumbnail">
                                        <img src="/public/img/exercise/calendar.jpg" style="height: 20%">

                                        <div class="caption">
                                            <h3 style="text-align: center;font-family: HANYG0230">운동 날짜 보기</h3>

                                            <p class="lead" style="font-family: HANYG0230">계획한 운동을 확인하고 싶거나 수정,삭제하고 싶으신가요? 여기서 확인하세요!</p>
                                        </div>
                                    </div>
                                </div>
                            </a>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" style="font-family: HANYG0230" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="small-2 large-4 columns">
        <a href="/main/exercise_Go" class="menu_shadow">
            <p class="text-center"
               style="letter-spacing:-2px; color: palevioletred; font-size: 33px; font-family: HANYG0230">
                <img src="../../../public/img/main/exericseStart.png">
                Exercise Start
            </p>
        </a>
    </div>

    <div class="small-2 large-4 columns">
        <a href="/main/exercise_Bodycheck" class="menu_shadow">
            <p class="text-center"
               style="color : palevioletred; font-size: 33px; letter-spacing:-2px;  font-family: HANYG0230">
                <img src="../../../public/img/main/chart.png">
                History</p>
        </a>
    </div>
</div>

<!--<div class="row">
    <div class="large-4 columns">

        <div class="column row" style="padding: 10px; margin-bottom: 15px; border: 3px solid #E3E5E8;">
            <div class="large-5 columns text-center">
                <?php
/*                echo "<img src='$user_info->pic' style='border:2px solid #666666; margin-top: 10px; margin-bottom: 7px; width: 90%'><br>";

                for ($i = 0; $i < count($user_info->level); $i++) {
                    echo "<i class='fi-star' style='color:yellow; font-size: 25px;'></i>";
                }

                */?>
            </div>
            <div class="large-4 columns text-center" style="margin-top: 17px">
                <?php
/*                echo "<span><h5><strong>$user_info->nick</strong></h5></span><br>";
                echo "<span><h7><i class='fi-trophy' style='color:sandybrown; font-size: 50px'></i> x $user_info->stamp</h7></span>";
                */?>
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
            <?php /*if ($exercise_plan) { */?>

                <table style="text-align: center; ">
                    <tr style="font-weight: bold">
                        <td>운동 이름</td>
                        <td>세트<br> 수</td>
                        <td>1세트 당<br> 횟수</td>
                    </tr>
                    <?php
/*                    foreach ($exercise_plan as $row) {
                        echo "<tr><td>" . $row->exercise_name . "</td>";
                        echo "<td>" . $row->number_of_set . "</td>";
                        echo "<td>" . $row->number_of_count . "</td>";
                    }
                    */?>
                </table>
            <?php /*} else { */?>
                <p class="text-center" style="padding-top: 10px">존재하지 않습니다.</p>
            <?php /*} */?>
        </div>

    </div>-->
<script src="/public/graph/highcharts.js" language="JavaScript"></script>
<script src="/public/graph/drilldown.js" language="JavaScript"></script>

<script src="/public/js/bootstrap.min.js"></script>

</body>

</html>