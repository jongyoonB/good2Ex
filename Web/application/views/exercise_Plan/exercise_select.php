<!--exercise_select.php
선택한 부위 이름정보를 받아 exercise_point 테이블에서 exercise_point를 알아내어 exercise_info 테이블의 운동이름을 뽑아내어 운동 list에 보여준다.
운동 list의 운동을 선택했을 때 exercise_info 테이블의 exercise_number를 알아내어 exercise_movie_info 테이블의 movie_order와 movie_path를 받아온다.
운동이름, 운동 순서, 운동 셋트와 횟수는 세션에 저장한다.-->
<?php
if (isset($_SESSION["user_info"])) {
    $user_info = $_SESSION["user_info"];
    //echo "로그인중";
} else {
    $user_info = false;
}

//exit(var_dump($_SESSION['day']));
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <!-- <script src="/public/js/vendor/modernizr.js"></script>-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/buttons.css">
    <link rel="stylesheet" href="/public/font-awesome-4.6.3/css/font-awesome.min.css">
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

        .select_Part {
            text-align: center;

            /*
            background-color:white;
            border-color:white;
            border-top: 1px solid silver;
            border-bottom: 1px solid silver;
            border-left: 1px solid silver;
            border-right: 1px solid silver;*/
        }

        .modal_select_text {
            background-color: #1e87c3;
            color: white;
            text-align: center;

        }

        div {
            overflow: hidden;
            height: auto;
        }

        .part_Goal li:first-child { /*부위;목적*/
            border-left: none;
        }

        .routine_choise {
            color: white;
            text-align: center;
        }

        .routine_movie {
            height: 55%;
            background-color: #8b8b8b;
            border-top: 1px solid silver;
            border-bottom: 1px solid silver;
            border-left: 1px solid silver;
            border-right: 1px solid silver;
        }

        .level_routine_text {

            background-color: #1e87c3;
        }

        .part_style {
            text-align: center;

            color: #1e87c3;

            /* background-color: #e0e4ff;
             border-top: 1px solid silver;
             border-bottom: 1px solid silver;
             border-left: 1px solid silver;
             border-right: 1px solid silver;*/
        }

        .part_style:hover {
            color: white;
        }

        .routine_information_foot {
            overflow: auto;
            -webkit-overflow-scrolling: touch;
            position: relative;

            height: 20%;
            background-color: white;
            border-top: 1.5px solid #337ab7;
            border-bottom: 1.5px solid #337ab7;
            border-left: 1.5px solid #337ab7;
            border-right: 1.5px solid #337ab7;
        }

        .exercise_movie {
            width: 100%;
            height: 99%
        }

        div.pricing-circle {
            border-radius: 50%;
            height: 120px;
            width: 120px;
            line-height: 120px;
            text-align: center;
            font-size: 16pt;
            font-weight: 900;
            color: #ffffff;
        }

        .bg-success {
            background-color: #0092C8;
        }

        a.outline {
            font-size: 16pt;
        }

        a.outline:hover {
            font-size: 30px;
        }

        .routine_border {
            border-top: 1.5px solid #337ab7;
            border-bottom: 1.5px solid #337ab7;
            border-left: 1.5px solid #337ab7;
            border-right: 1.5px solid #337ab7;
        }

        .routine_border:hover {
            background-color: #337ab7;
            transition: all 0.35s;
        }

        .exercise_info_text {
            float: left;
        }


    </style>

    <!--  <div class="top-bar" id="headMenu">
        <div class="top-bar-left"id="headMenuL">
            <ul class="nav nav-pills" data-responsive-menu="accordion">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/main/exercise_Main" style="display: block">
                                <img alt="Brand" src="/public/img/logo.png" style="width: 50px">
                            </a>
                        </div>

                <li ><a href="/main/exercise_Go">운동시작</a></li>
                <li><a href="/main/exercise_Free">자유게시판</a></li>
                <li><a href="/main/exercise_QnA">QNA</a></li>
            <ul class="menu" style="float: right">
                <?php
    /*                if(isset($_SESSION["user_info"]))
                    {*/ ?>
                    <li><a class="btn btn-default navbar-btn">Logout</a></li>
                <?php /*}*/ ?>
            </ul>
            </ul>

        </div>
        </div>-->

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
                    <?php
                    /*                if(isset($_SESSION["user_info"]))
                                    {*/ ?>
                    <li><a href="/sign/logout">LOGOUT</a></li>
                    <?php /*}*/ ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

</head>


<body>

<?php
if ('exercise_Plan/exercise_select') {
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
        <span class="fa fa-plus-square list-group-item active" style="width: 100%" aria-hidden="true"><a href="#">
                운동선택</a></span>
        <span class="fa fa-calendar list-group-item" style="width: 100%" aria-hidden="true"><a href="#"> 날짜선택</a></span>
        <span class="fa fa-check-square-o list-group-item" style="width: 100%" aria-hidden="true"><a href="#"> 계획완료</a></span>
    </div>
<?php } ?>
<div class="container-fluid">
    <div class="row" style="margin: auto">
        <div class="select_Part col-md-3">
            <div class="row" style="margin: auto">
                <div class="btn-group" role="group">
                    <button class="btn btn-primary raised" id="partICON" data-toggle="modal" data-target="#myModal"
                            style="color:white;">부위
                    </button>

                    <!-- 모달 팝업 -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">부위 선택</h4>
                                </div>
                                <div class="modal-body">

                                    <img src="/public/img/exercise/musle_icon.png" height="auto" alt="사람 이모티콘"
                                         usemap="#imgMap"/>
                                    <map id="imgMap">
                                        <a shape="rect" coords="159,82,217,138" alt="왼어깨" title="왼어깨"
                                           onclick="part_Click('Thigh')"></a>
                                        <a shape="rect" coords="354,76,298,121" alt="오른어깨" title="오른어깨"
                                           onclick="part_Click('Thigh')"></a>
                                        <input type="hidden" value="어깨" id="Thigh">
                                        <a shape="rect" coords="187,221,254,357" alt="왼허벅지" title="왼허벅지"
                                           onclick="part_Click('Shoulder')"></a>
                                        <a shape="rect" coords="322,241,257,356" alt="오른허벅지" title="오른허벅지"
                                           onclick="part_Click('Shoulder')"></a>
                                        <input type="hidden" value="허벅지" id="Shoulder">
                                    </map>
                                </div>
                                <div class="modal-footer">
                                    <h3 class="modal_select_text">선택부위</h3>

                                    <h3 class="selectPartText" style="text-align: center; color:#1e87c3 "></h3>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary raised" style="background-color:lightblue; color:#007299 ">
                        목적
                    </button>
                </div>
            </div>
            <div class="row" style="margin: auto">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div style="display: inline-block"
                             class="part_style selectPartText pricing-circle bg-success"></div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin: auto">
                <div class="tt panel panel-success">
                    <div class="panel-heading" style="background-color: #1e87c3;color: white;"><h5>난이도</h5></div>
                    <div class="panel-body">
                        <div class="row" style="margin: auto">
                            <div class="col-md-4" id="e_part">
                                <a id="high" class="part_style outline" name="routine_level"
                                   style="border: 2px solid gray; color: gray;">상</a>
                                <input type="hidden" class="exer">
                            </div>
                            <div class="col-md-4" id="e_part">
                                <a id="middle" class="part_style outline" name="routine_level"
                                   style="margin-right: 10%;border: 2px solid gray; color: gray;">중</a>
                                <input type="hidden" class="exer">
                            </div>
                            <div class="col-md-4" id="e_part">
                                <a id="low" class="part_style outline" name="routine_level"
                                   style="border: 2px solid gray; color: gray;">하</a>
                                <input type="hidden" class="exer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--    <div style="display: inline-block;">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#" data-toggle="tab"style="width:100%;">그래프</a></li>
                        <li><a href="#" data-toggle="tab" style="width:100%;">사진 모음</a>
                        </li>
                    </ul>
                </div>-->

            <!--<div style="margin-top: 25%"> 부위 선택 벡업
                <img src="/public/img/exercise/musle_icon.png" width="90%" height="auto" alt="사람 이모티콘" usemap="#imgMap" />

                <map id="imgMap">
                    <a shape="rect"  coords="51,24,71,40"  alt="왼어깨"  title="왼어깨" onclick="part_Click('Thigh')"></a>
                    <a shape="rect"  coords="116,23,97,43"   alt="오른어깨"  title="오른어깨"  onclick="part_Click('Thigh')"></a>
                    <input type="hidden" value="어깨" id="Thigh">
                    <a shape="rect"  coords="63,79,84,117"  alt="왼허벅지"title="왼허벅지" onclick="part_Click('Shoulder')"></a>
                    <a shape="rect"  coords="104,77,84,115"  alt="오른허벅지"   title="오른허벅지" onclick="part_Click('Shoulder')"></a>
                    <input type="hidden" value="허벅지" id="Shoulder">
                </map>
            </div>-->


            <!--    <a class="part_style"id="Thigh" >허벅지</a>
                <a class="part_style"id="Shoulder">어깨</a>
                <a class="part_style"id="#">등</a>
            -->


            <!-- <div class="tt panel panel-success">
                 <div class="panel-heading" style="background-color: #3498db">
                     <h5 style="color: white;font-weight: 900">난이도</h5>
                 </div>

                 <div id="e_part">
                     <a id="high" class="part_style" name="routine_level">상</a>
                     <input type="hidden" class="exer">

                     <a id="middle" class="part_style" name="routine_level">중</a>
                     <input type="hidden" class="exer">

                     <a id="low" class="part_style" name="routine_level">하</a>
                     <input type="hidden" class="exer">
                 </div>
             </div>-->

            <div class="row" style="margin: auto">
                <div class="tt panel panel-success">
                    <div class="panel-heading" style="background-color: #1e87c3;color: white;"><h5>루틴 선택</h5></div>
                    <div class="panel-body">

                        <div class="routine_choise" id="routine_choise">
                        </div>

                    </div>
                </div>
            </div>
            <div class="row" style="margin: auto">
                <div class="btn-group" role="group" style="text-align: center">
                    <form class="exercise_info_form" action='/main/exercise_date' method='post'>
                        <input type=hidden id=qwe name='qwe'>
                        <input class="btn btn-primary btn-lg" type=submit value='완료'>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="routine_movie" id="r__info">
                    <!--  <a class="w3-btn-floating" onclick="plusDivs(-1)">&#10094;</a>
                      <a class="w3-btn-floating" onclick="plusDivs(+1)">&#10095;</a>-->
                    <!--   <ul class="bxslider">
                           <li>
                               <iframe src="../../../public/video/exercise/dumbel.mp4" width="80%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                           </li>
                           <li>
                               <iframe src="../../../public/video/exercise/side.mp4"  width="80%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                           </li>
                       </ul>-->
                    <!--  <ul class="bxslider">
                          <li>
                              <video src="../../../public/video/exercise/dumbel.mp4" class="exercise_movie" autoplay muted controls frameborder="0"  allowFullScreen></video>

                          </li>
                          <li>
                              <video src="../../../public/video/exercise/side.mp4" class="exercise_movie" autoplay muted controls frameborder="0" allowFullScreen></video>
                          </li>
                      </ul>-->
                    <video id="exercise_movie_run" class="exercise_movie" controls autoplay loop></video>
                    <!--<video src="../../../public/video/exercise/side.mp4" class="exercise_movie" controls loop></video>-->
                </div>
            </div>
            <div class="row">
                <div class="routine_information_foot" id="routine_information_foot">
                    <div class="row">
                        <form class="routine_form0">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    /*    $(document).ready(function () {

     $("#e_part").hide();
     $("#Thigh").click(function () {
     /!*   $a = $("#Thigh").html();*!/
     $a = $(".Thigh2").val();
     /!*        $("#Thigh").css("background-color","cornflowerblue");
     $("#Shoulder").css("background-color","#e0e4ff");
     $("#Shoulder").mouseover(function(){
     $(this).css("background-color","cornflowerblue")
     });
     $("#Shoulder").mouseout(function(){
     $(this).css("background-color","#e0e4ff")
     });*!/
     $("#e_part").show();
     $(".exer").attr("value", $a);
     });
     $("#Shoulder").click(function () {
     $a = $("#Shoulder").html();
     $a=$().val();
     $("#Shoulder").css("background-color","cornflowerblue");
     $("#Thigh").css("background-color","#e0e4ff");

     $("#e_part").show();
     $(".exer").attr("value", $a);
     });
     });*/
    $(document).ready(function () {

    });


    /* $("#e_part").hide();*/

    function part_Click(name) {
        var a = $("#" + name).val();
        /*       $("#e_part").show();*/
        $(".exer").attr("value", a);
        $(".selectPartText").html("<p>" + a + "</p>");
    }

    $('#high').click(function () {
        $("#middle").css("border", "solid 2px gray");
        $("#middle").css("color", "gray");
        $("#low").css("border", "solid 2px gray");
        $("#low").css("color", "gray");
        $("#high").css("border", "solid 3px red");
        $("#high").css("color", "red");
        $(".selectLevelText").html("<p>상</p>");
        var level = $(this).html();
        var part = $(".exer").val();
        $('#routine_nameH').hide();
        $('#routine_nameM').hide();
        $('#routine_nameL').hide();
        $.ajax({
            type: "POST",
            url: "/main/exercise_Select_Part",
            data: {
                level: level,
                part: part
            }, success: function (data) {

                var routine_info = JSON.parse(data);
                console.log(routine_info);
                $('#routine_choise').html("<form id='test1'></form>");
                for (var i = 0; i < routine_info.length; i++) {
                    var form = $('<form class="routine_border"></form>').addClass("routine" + i).attr({id: "routine" + i});
                    $('<a id="routine_nameH" class="part_style" onclick="aClickRoutine(this.parentNode.id)"></a>').attr("routine_index", routine_info[i].routine_list_index).html(routine_info[i].routine_name).appendTo(form);
                    $('#test1').append(form);
                }
            }, error: function (request, status, error) {
            }
        });
    });

    $('#middle').click(function () {
        $("#high").css("border", "solid 2px gray");
        $("#high").css("color", "gray");
        $("#low").css("border", "solid 2px gray");
        $("#low").css("color", "gray");
        $("#middle").css("border", "solid 3px #eb8f34");
        $("#middle").css("color", "#eb8f34");
        var level = $(this).html();
        var part = $(".exer").val();
        $('#routine_nameH').hide();
        $('#routine_nameM').hide();
        $('#routine_nameL').hide();
        $.ajax({
            type: "POST",
            url: "/main/exercise_Select_Part",
            data: {
                level: level,
                part: part
            }, success: function (data) {

                var routine_info = JSON.parse(data);
                console.log(routine_info);
                $('#routine_choise').html("<form id='test1'></form>");
                for (var i = 0; i < routine_info.length; i++) {
                    var form = $('<form class="routine_border"></form>').addClass("routine" + i).attr({id: "routine" + i});
                    $('<a id="routine_nameH" class="part_style" onclick="aClickRoutine(this.parentNode.id)"></a>').attr("routine_index", routine_info[i].routine_list_index).html(routine_info[i].routine_name).appendTo(form);
                    $('#test1').append(form);
                }
            }, error: function (request, status, error) {
            }
        });
    });

    $('#low').click(function () {
        $("#high").css("border", "solid 2px gray");
        $("#high").css("color", "gray");
        $("#middle").css("border", "solid 2px gray");
        $("#middle").css("color", "gray");
        $("#low").css("border", "solid 3px #00bf6f");
        $("#low").css("color", "#00bf6f");
        var level = $(this).html();
        var part = $(".exer").val();
        $('#routine_nameH').hide();
        $('#routine_nameM').hide();
        $('#routine_nameL').hide();
        $.ajax({
            type: "POST",
            url: "/main/exercise_Select_Part",
            data: {
                level: level,
                part: part
            }, success: function (data) {

                var routine_info = JSON.parse(data);
                console.log(routine_info);
                $('#routine_choise').html("<form id='test1'></form>");
                for (var i = 0; i < routine_info.length; i++) {
                    var form = $('<form class="routine_border"></form>').addClass("routine" + i).attr({id: "routine" + i});
                    $('<a id="routine_nameH" class="part_style" onclick="aClickRoutine(this.parentNode.id)"></a>').attr("routine_index", routine_info[i].routine_list_index).html(routine_info[i].routine_name).appendTo(form);
                    $('#test1').append(form);
                }
            }, error: function (request, status, error) {
            }
        });
    });

    function aClickRoutine(id) {//루틴 명 선택시 선택 표시
        $('.routine_border').css('border', 'solid 2px white');
        var r = $("#" + id);
        r.css("border", "solid 2px #337ab7");
        r.css("color", "#337ab7");
    }

    /* $(document).on('click','#routne'+i,function(){
     var r = $(this).attr("routine"+i);
     r.css("border","solid 2px gray");
     r.css("color","gray");
     });*/

    $(document).on('click', '#routine_nameH', function () {
        var r_index = $(this).attr("routine_index");
        $.ajax({
            type: "POST",
            url: "/main/exercise_Select_routine",
            data: {
                routine_list_index: r_index
            }, success: function (data) {
                var routine_exercise_info = JSON.parse(data);
                console.log(routine_exercise_info);
                $('#routine_information_foot').html("<form class='routine_form0'></form>");
                for (var i = 0; i < routine_exercise_info.length; i++) {
                    if (i == routine_exercise_info.length - 1) {
                        $('#exercise_movie_run').attr({src: routine_exercise_info[i].movie_path});
                    }
                    var form = $('<form style="float: left"></form>').addClass("exercise_form" + i);
                    $('<h1 class="exercise_info_text"></h1>').text(routine_exercise_info[i].exercise_name).appendTo(form);
                    $('<br>').appendTo(form);
                    $('<br>').appendTo(form);
                    $('<br>').appendTo(form);
                    $('<p class="exercise_info_text" style="display: inline"></p>').text(routine_exercise_info[i].exercise_info).appendTo(form);
                    $('<br>').appendTo(form);
                    $('<br>').appendTo(form);
                    $('<p class="text-center"></p>').text("세트수 :" + routine_exercise_info[i].number_of_set + "     세트당 횟수 :" + routine_exercise_info[i].number_of_count).appendTo(form);
                    /* $('<p class="info_text_css"></p>').text("세트당 횟수 :" + routine_exercise_info[i].number_of_count).appendTo(form);*/
                    $('<button type="button" class="btn btn-success round center-block" onclick="movie_CTL(this.id)"></button>').attr('id', 'exercise_movie' + i).text('운동 영상').appendTo(form);
                    $('<input type="hidden"/>').attr("id", "exercise_movie_hidden" + i).val(routine_exercise_info[i].movie_path).appendTo(form);
                    $('<br>').appendTo(form);
                    $('<br>').appendTo(form);
                    $('.routine_form0').after(form);
                }

                /*    $(".exercise_info_form").append("<form action='./exercise_Preview' method='post'>" +
                 "<input type=hidden id=qwe name='qwe'>" +
                 "<input type=submit value='완료'>" +
                 "</from>");*/

                $('#qwe').val(r_index);
            }, error: function (request, status, error) {
            }
        });
    });

    function movie_CTL(name) {
        var num = name.substring(14, 15);
        var id_name = "exercise_movie_hidden" + num;
        var movie_path = $("#" + id_name).val();
        $('#exercise_movie_run').attr({src: movie_path});
    }

    /* $(document).on('click','#exercise_movie',function(){
     var e_movie = $(this).attr("path");
     //        window.alert(e_movie);
     $.ajax({
     type: "POST",
     url: "/main/exercise_Select_routine",
     data: {
     exercise_movie_index: e_movie
     }, success: function (data) {
     var movie_exercise_info;
     console.log(movie_exercise_info);
     $('#routine_movie').html("<video src='/public/video/exercise/dumbel.mp4' class='exercise_movie'></video>");


     }, error: function (request, status, error) {
     }
     });
     });*/
    /*
     function testest(q) {
     var test = q;
     $.ajax({
     type: "POST",
     url: "/main/exercise_Preview",
     data: {
     select_routine_info: test
     }, success: function (data) {

     }, error: function (request, status, error) {
     }
     });
     }*/

    $(document).on('click', '#routine_nameM', function () {
        var r_index = $(this).attr("routine_index");
        $.ajax({
                type: "POST",
                url: "/main/exercise_Select_routine",
                data: {
                    routine_list_index: r_index
                }, success: function (data) {
                    var routine_exercise_info = JSON.parse(data);
                    console.log(routine_exercise_info);
                    $('#routine_information_foot').html("<form class='routine_form0'></form>");
                    for (var i = 0; i < routine_exercise_info.length; i++) {
                        if (i == routine_exercise_info.length - 1) {
                            $('#exercise_movie_run').attr({src: routine_exercise_info[i].movie_path});
                        }
                        var form = $('<form style="float: left"></form>').addClass("exercise_form" + i);
                        $('<h1 class="exercise_info_text"></h1>').text(routine_exercise_info[i].exercise_name).appendTo(form);
                        $('<br>').appendTo(form);
                        $('<br>').appendTo(form);
                        $('<br>').appendTo(form);
                        $('<p class="exercise_info_text" style="display: inline"></p>').text(routine_exercise_info[i].exercise_info).appendTo(form);
                        $('<br>').appendTo(form);
                        $('<br>').appendTo(form);
                        $('<p class="text-center"></p>').text("세트수 :" + routine_exercise_info[i].number_of_set + "     세트당 횟수 :" + routine_exercise_info[i].number_of_count).appendTo(form);
                        /* $('<p class="info_text_css"></p>').text("세트당 횟수 :" + routine_exercise_info[i].number_of_count).appendTo(form);*/
                        $('<button type="button" class="btn btn-success round center-block" onclick="movie_CTL(this.id)"></button>').attr('id', 'exercise_movie' + i).text('운동 영상').appendTo(form);
                        $('<input type="hidden"/>').attr("id", "exercise_movie_hidden" + i).val(routine_exercise_info[i].movie_path).appendTo(form);
                        $('<br>').appendTo(form);
                        $('<br>').appendTo(form);
                        $('.routine_form0').after(form);
                    }
                    /* $(".exercise_info_form").append("<form action='./exercise_Preview' method='post'>" +
                     "<input type=hidden id=qwe name='qwe'>" +
                     "<input type=submit value='완료'>" +
                     "</from>");*/
                    $('#qwe').val(r_index);
                }, error: function (request, status, error) {

                }
            }
        );
    });
    $(document).on('click', '#routine_nameL', function () {
        var r_index = $(this).attr("routine_index");
        $.ajax({
                type: "POST",
                url: "/main/exercise_Select_routine",
                data: {
                    routine_list_index: r_index
                }, success: function (data) {
                    var routine_exercise_info = JSON.parse(data);
                    console.log(routine_exercise_info);
                    $('#routine_information_foot').html("<form class='routine_form0'></form>");
                    for (var i = 0; i < routine_exercise_info.length; i++) {
                        if (i == routine_exercise_info.length - 1) {
                            $('#exercise_movie_run').attr({src: routine_exercise_info[i].movie_path});
                        }
                        var form = $('<form style="float: left"></form>').addClass("exercise_form" + i);
                        $('<h1 class="exercise_info_text"></h1>').text(routine_exercise_info[i].exercise_name).appendTo(form);
                        $('<br>').appendTo(form);
                        $('<br>').appendTo(form);
                        $('<br>').appendTo(form);
                        $('<p class="exercise_info_text" style="display: inline"></p>').text(routine_exercise_info[i].exercise_info).appendTo(form);
                        $('<br>').appendTo(form);
                        $('<br>').appendTo(form);
                        $('<p class="text-center"></p>').text("세트수 :" + routine_exercise_info[i].number_of_set + "     세트당 횟수 :" + routine_exercise_info[i].number_of_count).appendTo(form);
                        /* $('<p class="info_text_css"></p>').text("세트당 횟수 :" + routine_exercise_info[i].number_of_count).appendTo(form);*/
                        $('<button type="button" class="btn btn-success round center-block" onclick="movie_CTL(this.id)"></button>').attr('id', 'exercise_movie' + i).text('운동 영상').appendTo(form);
                        $('<input type="hidden"/>').attr("id", "exercise_movie_hidden" + i).val(routine_exercise_info[i].movie_path).appendTo(form);
                        $('<br>').appendTo(form);
                        $('<br>').appendTo(form);
                        $('.routine_form0').after(form);
                    }
                    /*     $(".exercise_info_form").append("<form action='./exercise_Preview' method='post'>" +
                     "<input type=hidden id=qwe name='qwe'>" +
                     "<input type=submit value='완료'>" +
                     "</from>");*/
                    $('#qwe').val(r_index);
                }, error: function (request, status, error) {

                }
            }
        );
    });
</script>
<!--<script> 비디오 슬라이드 전 파일
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length} ;
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }
</script>-->
<!--<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            video: true,
            useCSS: false
        });
    });
</script>
--></body>
<script type="text/javascript" src="/public/jquery-2.2.0/jquery-2.2.0.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
</html>