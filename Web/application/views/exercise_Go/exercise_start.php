<!--exerciseStart.php
로그인 세션과 현재날짜를 토대로 user_routine_info 테이블의 routine_list_index를 이용하여 exercise_order 테이블의 exercise_order와 exercise_repeat_number 테이블의 number_of_set, number_of_count, exercise_info 테이블의 exercise_name과 exercise_info을 이용하여 현재운동정보와 다음운동 정보를 출력한다.
수행한 운동명과 횟수는 세션에 저장한다.-->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script src="/public/jquery-2.2.0/jquery-2.2.0.min.js"></script>
    <script src="/public/jquery-2.2.0/jquery-2.2.0.js"></script>

    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
        <!--
        var unityObjectUrl = "http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject2.js";
        if (document.location.protocol == 'https:')
            unityObjectUrl = unityObjectUrl.replace("http://", "https://ssl-");
        document.write('<script type="text\/javascript" src="' + unityObjectUrl + '"><\/script>');
        -->
    </script>
    <script type="text/javascript">
        <!--


        var config = {


            width: $("#unityPlayer").width(),
            height: $("#unityPlayer").height(),
            height: 660,
            params: {logoimage: "/public/img/logo.png", enableDebugging: "1"}

        };

        var u = new UnityObject2(config);

        jQuery(function () {

            var $missingScreen = jQuery("#unityPlayer").find(".missing");
            var $brokenScreen = jQuery("#unityPlayer").find(".broken");
            $missingScreen.hide();
            $brokenScreen.hide();

            u.observeProgress(function (progress) {
                switch (progress.pluginStatus) {
                    case "broken":
                        $brokenScreen.find("a").click(function (e) {
                            e.stopPropagation();
                            e.preventDefault();
                            u.installPlugin();
                            return false;
                        });
                        $brokenScreen.show();
                        break;
                    case "missing":
                        $missingScreen.find("a").click(function (e) {
                            e.stopPropagation();
                            e.preventDefault();
                            u.installPlugin();
                            return false;
                        });
                        $missingScreen.show();
                        break;
                    case "installed":
                        $missingScreen.remove();
                        break;
                    case "first":
                        break;
                }
            });
            u.initPlugin(jQuery("#unityPlayer")[0], "../application/views/exercise_Go/Desktop.unity3d");
        });
        -->
    </script>
    <style type="text/css">
        <!--
        body {
            font-family: Helvetica, Verdana, Arial, sans-serif;

            text-align: center;
        }

        a:link, a:visited {
            color: #000;
        }

        a:active, a:hover {
            color: #666;
        }

        p.header span {
            font-weight: bold;
        }

        div.broken,
        div.missing {
            margin: auto;
            position: relative;
            top: 50%;
            width: 193px;
        }

        div.broken a,
        div.missing a {
            height: 63px;
            position: relative;
            top: -31px;
        }

        div.broken img,
        div.missing img {
            border-width: 0px;
        }

        div.broken {
            display: none;
        }

        div#unityPlayer {

            cursor: default;
   /*         height: 100%;
            width: 100%;*/
        }
/*
        div.startBody {
            !* border-top: 1px solid black;
             border-right: 1px solid black;
             border-left: 1px solid black;
             border-bottom: 1px solid black;*!
            width: 100%;
            height: 100%;
        }*/

        /*div.migi {
            margin-left: auto;
            width: 27%;
            height: 660px;
        }*/

        .set {
            font-size: 35px;
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
                <li><a href="/main/exercise_Free">자유게시판</a></li>
                <li><a href="/main/exercise_QnA">QNA</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                /*                if(isset($_SESSION["user_info"]))
                                {*/ ?>
                <li><a href="#">LOGOUT</a></li>
                <?php /*}*/ ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container-fluid">
    <div class="row" style="margin: auto">

        <div class="col-md-8">
            <div class="row" style="margin: auto">
                <div id="unityPlayer">
                    <div class="missing">
                        <a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now!">
                            <img alt="Unity Web Player. Install now!"
                                 src="http://webplayer.unity3d.com/installation/getunity.png" width="193" height="63"/>
                        </a>
                    </div>
                    <div class="broken">
                        <a href="http://unity3d.com/webplayer/"
                           title="Unity Web Player. Install now! Restart your browser after install.">
                            <img alt="Unity Web Player. Install now! Restart your browser after install."
                                 src="http://webplayer.unity3d.com/installation/getunityrestart.png" width="193"
                                 height="63"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin: auto">
            <div class="col-md-3">

                <div class="row" style="margin: auto">
                    <div class="panel panel-success">
                        <div class="panel-heading"style="padding:1px 1px; background-color: #3498db;color: white">
                            <h3>현재 운동 정보</h3>
                        </div>
                        <div class="panel-body" style="height: 116px;padding: 1px" id="information">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row" style="margin: auto">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="padding: 1px 1px; background-color: #3498db;color: white"><p class="set" id="set">1세트</p></div>
                        <div class="graph">
                            <div class="panel-body" style="height: 195px;padding: 1px" id="container-speed"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">

                <div class="row" style="margin: auto">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="padding: 1px 1px;background-color: #3498db;color: white">
                            <h3>다음 운동 정보</h3>
                        </div>
                        <div class="panel-body"style="height: 116px;padding: 1px;" id="nextInformation">
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
</body>
<script src="/public/js/bootstrap.min.js"></script>

<script src="../../../public/js/highcharts.js"></script>
<script src="../../../public/js/highcharts-more.js"></script>
<script src="../../../public/js/solid-gauge.js"></script>
<script src="../../../public/js/ex_info.js"></script>
<script src="../../../public/js/chart.js"></script>



</html>

