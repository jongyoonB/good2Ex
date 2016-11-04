<!--exerciseStart.php
로그인 세션과 현재날짜를 토대로 user_routine_info 테이블의 routine_list_index를 이용하여 exercise_order 테이블의 exercise_order와 exercise_repeat_number 테이블의 number_of_set, number_of_count, exercise_info 테이블의 exercise_name과 exercise_info을 이용하여 현재운동정보와 다음운동 정보를 출력한다.
수행한 운동명과 횟수는 세션에 저장한다.-->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script src="/public/jquery-2.2.0/jquery-2.2.0.min.js"></script>
    <script src="/public/jquery-2.2.0/jquery-2.2.0.js"></script>
    <script src="/public/js/jquery-ui.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="/public/js/fusioncharts.js"></script>
    <!--<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>-->
    <!--<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>-->

    <link href="/public/css/jquery.counter-analog.css" media="screen" rel="stylesheet" type="text/css"/>
    <script src="/public/js/jquery.counter.js" type="text/javascript"></script>
    <link href="/public/css/flipclock.css" rel="stylesheet">

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
            params: {
                logoimage: "/public/img/logo.png",
                progressbarimage: "/public/img/progress-bar-frame.png",
                enableDebugging: "1",
            }

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

    <script src="/public/js/flipclock.min.js"></script>

    <style type="text/css">
        @font-face {
            font-family: HANYG0230;
            src: url('../../../public/fonts/HANYGO230.ttf'); format('truetype');
        }

        <!--
        body {
            font-family: Helvetica, Verdana, Arial, sans-serif;
            height: 940px;

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

        .set {
            font-size: 30px;
        }

        .part {
            border-radius: 50%;
        }

        #progressbar {
            height: 25px;
            border: solid #ccc 3px;
            box-shadow: 0 1px 2px #fff, 0 -1px 1px #666, inset 0 -1px 1px rgba(0, 0, 0, 0.5), inset 0 1px 1px rgba(255, 255, 255, 0.8);
            -moz-box-shadow: 0 1px 2px #fff, 0 -1px 1px #666, inset 0 -1px 1px rgba(0, 0, 0, 0.5), inset 0 1px 1px rgba(255, 255, 255, 0.8);
            -webkit-box-shadow: 0 1px 2px #fff, 0 -1px 1px #666, inset 0 -1px 1px rgba(0, 0, 0, 0.5), inset 0 1px 1px rgba(255, 255, 255, 0.8);
        }

        #progressbar > div {
            width: 40%; /* Adjust with JavaScript */
            height: 18px;
            background: -moz-linear-gradient(top, #7e95bf 0%, #113448 100%); /* firefox */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #7e95bf), color-stop(100%, #113448));
        }

        [class$="creditgroup"] {
            display: none;
        }
    </style>
</head>
<body>


<div class="container-fluid">
    <div class="row" style="margin: auto; margin-bottom: 10px; height:110px;background-color:#3498db;">
        <div class="col-md-3">
            <div class="row" style="margin: auto">
                <div style="font-family: HANYG0230;padding: 0px; float: left;margin-top: 20px;height: 85px">
                    <img src="../../../public/img/exercise/start_logo.png"><span
                        style="font-size: 40px;color: white">&nbsp; 운동하기 좋은날</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row" style="margin: auto">
                <div
                    style="font-family: HANYG0230;height: 80px;padding: 1px;margin-top: 20px;height: 85px;float:right; margin-top: 30px"
                    id="information"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row" style="margin: auto">
                <!--                    <div style="font-family: HANYG0230;height: 80px;padding: 0px;margin-top: 25px;height: 85px"
                                         id="information_set">

                                    </div>-->
                <div id="information_set"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row" style="margin: auto">
                <!--                    <div style="font-family: HANYG0230;height: 80px;padding: 0px;margin-top: 25px;height: 85px"
                                         id="information_count">

                                    </div>-->
                <div id="information_count"></div>
            </div>
        </div>
    </div>
    <div class="row" style="margin: auto">
        <div class="col-md-8" style="padding-left: 0;padding-right: 10px">
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
        <div class="col-md-3" style="width: 26%;padding-left: 0;padding-right: 0">
            <div class="row" style="margin: auto">
                <div class="panel panel-success">
                    <div class="panel-body"
                         style="font-family: HANYG0230; padding-bottom: 1px; height: 611px">
                        <div class="row" style="border-bottom: 1px solid #d8d8d8; padding-bottom: 18px">
                            <div class="col-md-6">
                                <div id="chart-container" style="width: 100%"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="chart-container2" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="row" style="position: relative;">
                            <img src="/public/img/muscle/muscle.png"
                                 style="width : 90%;margin-top: 10px; filter: drop-shadow(0px 0px 2px #666666);">

                            <div id="deltoid_left" class="part" style='position: absolute;'></div>
                            <div id="deltoid_right" class="part" style='position: absolute;'></div>
                        </div>
                    </div>
                    <div class="panel-footer" style="padding:1px 1px; background-color: #3498db;color: white">
                        <p style="font-family: HANYG0230; font-size: 25px">근육 센서</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin: auto">
        <p style="font-size : 30px; font-family: HANYG0230; text-align: left;">진행률(<span id="percent">0%</span>)</p>

        <div class="row" style="padding: 0">
            <div class="col-md-10 col-md-offset-1" style="padding: 0;">
                <div id="runner" style="width:0%;">
                    <img src="/public/img/exercise/running.gif" style="width:70px; float: right">
                </div>
            </div>
        </div>
        <div class="row" style="padding: 0">
            <div class="col-md-1 col-md-offset-11" style="padding:0; margin-top : -103px">
                <img src="/public/img/exercise/flag.gif" style="width: 80%; float: left">
            </div>
        </div>

        <div class="row" style="padding: 0">
            <div class="col-md-10 col-md-offset-1" style="padding:0; margin-top : -35px">
                <div class="row" style="padding: 0;">
                    <div class="col-md-2" style="padding:0;">
                        <img src="/public/img/exercise/flag.png" style="width: 10%; float: right">
                    </div>
                    <div class="col-md-2" style="padding:0;">
                        <img src="/public/img/exercise/flag.png" style="width: 10%; float: right">
                    </div>
                    <div class="col-md-2" style="padding:0;">
                        <img src="/public/img/exercise/flag.png" style="width: 10%; float: right">
                    </div>
                    <div class="col-md-2" style="padding:0;">
                        <img src="/public/img/exercise/flag.png" style="width: 10%; float: right">
                    </div>
                    <div class="col-md-2" style="padding:0;">
                        <img src="/public/img/exercise/flag.png" style="width: 10%; float: right">
                    </div>
                </div>
                <div class="row" style="padding: 0;">
                    <div id="progressbar" style="padding: 0;">
                        <div id="myBar" style="width:0%"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    var UnityLoaded;

    function UnityReady(temp) {
        UnityLoaded = true;
        console.log("Is Unity Loaded? : " + UnityLoaded);
    }
    $(document).ready(function () {
        console.log("Draw Gauge Chart");
        FusionCharts.ready(function () {
            var csChart = new FusionCharts({
                type: 'vled',
                renderAt: 'chart-container',
                id: 'cpu-linear-gauge',
                width: '150',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "좌측 삼각근",
                        "subcaptionFontBold": "0",
                        "lowerLimit": "0",
                        "upperLimit": "100",
                        "lowerLimitDisplay": "Bad",
                        "upperLimitDisplay": "Good",
                        "numberSuffix": "%",
                        "showValue": "0",
                        "showBorder": "0",
                        "showShadow": "0",
                        "tickMarkDistance": "5",
                        "alignCaptionWithCanvas": "1",
                        "captionAlignment": "center",
                        "bgcolor": "#ffffff",
                        "baseFont": "HANYG0230",
                        "baseFontSize": "15"
                    },
                    "colorRange": {
                        "color": [{
                            "minValue": "0",
                            "maxValue": "30",
                            "code": "#8e0000"
                        }, {
                            "minValue": "30",
                            "maxValue": "70",
                            "code": "#f2c500"
                        }, {
                            "minValue": "70",
                            "maxValue": "100",
                            "code": "#1aaf5d"
                        }]
                    },
                    "value": "92"
                }
                /*"events": {
                 "rendered": function (evtObj, argObj) {
                 var intervalVar = setInterval(function () {
                 if (part_num == 1) {
                 var prcnt = parseInt((power / 1024) * 100, 10);
                 FusionCharts.items["cpu-linear-gauge"].feedData("value=" + prcnt);
                 }
                 }, 10);
                 }
                 }*/
            })
                .render();

            var csChart2 = new FusionCharts({
                type: 'vled',
                renderAt: 'chart-container2',
                id: 'cpu-linear-gauge2',
                width: '150',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "우측 삼각근",
                        "subcaptionFontBold": "0",
                        "lowerLimit": "0",
                        "upperLimit": "100",
                        "lowerLimitDisplay": "Bad",
                        "upperLimitDisplay": "Good",
                        "numberSuffix": "%",
                        "showValue": "0",
                        "showBorder": "0",
                        "showShadow": "0",
                        "tickMarkDistance": "5",
                        "alignCaptionWithCanvas": "1",
                        "captionAlignment": "center",
                        "bgcolor": "#ffffff",
                        "baseFont": "HANYG0230",
                        "baseFontSize": "15"
                    },
                    "colorRange": {
                        "color": [{
                            "minValue": "0",
                            "maxValue": "30",
                            "code": "#8e0000"
                        }, {
                            "minValue": "30",
                            "maxValue": "70",
                            "code": "#f2c500"
                        }, {
                            "minValue": "70",
                            "maxValue": "100",
                            "code": "#1aaf5d"
                        }]
                    },
                    "value": "92"
                }
                /*"events": {
                 "rendered": function (evtObj, argObj) {
                 var intervalVar2 = setInterval(function () {
                 if (part_num == 2) {
                 var prcnt = parseInt((power / 1024) * 100, 10);
                 FusionCharts.items["cpu-linear-gauge2"].feedData("value=" + prcnt);
                 }
                 }, 10);
                 }
                 }*/
            })
                .render();
        });


        /*setInterval(function(){
            if (UnityLoaded) {

                var part_num = parseInt(Math.floor(Math.random() * (3-1) + 1)); //1, 2
                var power = parseInt(Math.floor(Math.random() * (1024- 500) + 500)); // data : 0~1024

                console.log("part : " + part_num);
                console.log("power : " + power);
                // 근육 센서(이미지)
                if (power != 0) {
                    var part;

                    /!*if (part_num == 1) {
                     if (current_ex_name == "Dumbel") {
                     if (power >= 500) {
                     console.log("send Muscle Failed Message to " + current_ex_name);
                     u.getUnity().SendMessage("CoordinateMapper", "muscleFail", "");
                     }
                     }
                     else if (current_ex_name == "Side") {
                     if (power >= 600) {
                     console.log("send Muscle Failed Message to " + current_ex_name);
                     u.getUnity().SendMessage("CoordinateMapper", "muscleFail", "");
                     }
                     }
                     }
                     *!/


                    if (part_num == 1) {
                        part = '#deltoid_left';
                        var prcnt = parseInt((power / 1024) * 100, 10);
                        //FusionCharts.items["cpu-linear-gauge"].feedData("value=" + prcnt);
                        FusionCharts.items["cpu-linear-gauge"].setData(prcnt, "value");
                        FusionCharts.items["cpu-linear-gauge"].render();
                    }
                    else if (part_num == 2) {
                        part = '#deltoid_right';
                        var prcnt = parseInt((power / 1024) * 100, 10);
                        //FusionCharts.items["cpu-linear-gauge2"].feedData("value=" + prcnt);
                        //FusionCharts.items["cpu-linear-gauge2"].setData(prcnt, "value");
                        FusionCharts.items["cpu-linear-gauge2"].render();
                    }



                    //console.log("part name : " + part);


//                        if (power <= 341) {
//                            $(part).css("width", "16px");
//                            $(part).css("height", "16px");
//                            $(part).css('background-color', '#66b132');
//                            $(part).css("box-shadow", "0px 0px 10px #66b132");
//                        }
//                        else if (power <= 682) {
//                            $(part).css("width", "32px");
//                            $(part).css("height", "32px");
//                            $(part).css('background-color', '#f9bb04');
//                            $(part).css("box-shadow", "0px 0px 10px #f9bb04");
//                        }
//                        else if (power <= 1024) {
//                            $(part).css("width", "48px");
//                            $(part).css("height", "48px");
//                            $(part).css('background-color', '#a8184b');
//                            $(part).css("box-shadow", "0px 0px 10px #a8184b");
//                        }
//
//                        if(part_num == 1 && power <= 341){
//                            $(part).css("top", "26.5%");
//                            $(part).css("left", "23.5%");
//                        }
//                        else if(part_num == 1 && power <= 682){
//                            $(part).css("top", "25.5%");
//                            $(part).css("left", "22.5%");
//                        }
//                        else if(part_num == 1 && power <= 1024){
//                            $(part).css("top", "24%");
//                            $(part).css("left", "21%");
//                        }
//                        else if(part_num == 2 && power <= 341){
//                            $(part).css("top", "21%");
//                            $(part).css("left", "36%");
//                        }
//                        else if(part_num == 2 && power <= 682){
//                            $(part).css("top", "19.5%");
//                            $(part).css("left", "34.5%");
//                        }
//                        else if(part_num == 2 && power <= 1024){
//                            $(part).css("top", "18%");
//                            $(part).css("left", "33%");
//                        }

                    if (power >= 750) {
                        $(part).css("width", "48px");
                        $(part).css("height", "48px");
                        $(part).css('background-color', '#a8184b');
                        $(part).css("box-shadow", "0px 0px 10px #a8184b");
                    }
                    else {
                        $(part).css("width", "32px");
                        $(part).css("height", "32px");
                        $(part).css('background-color', '#f9bb04');
                        $(part).css("box-shadow", "0px 0px 10px #f9bb04");
                    }

                    if (part_num == 1 && power < 750) {
                        $(part).css("top", "25.5%");
                        $(part).css("left", "22.5%");
                    }
                    else if (part_num == 1 && power >= 750) {
                        $(part).css("top", "24%");
                        $(part).css("left", "21%");
                    }

                    else if (part_num == 2 && power < 750) {
                        $(part).css("top", "19.5%");
                        $(part).css("left", "34.5%");
                    }
                    else if (part_num == 2 && power >= 750) {
                        $(part).css("top", "18%");
                        $(part).css("left", "33%");
                    }
                    runEffect(part);

                    $("#effect").hide();

                }
            }

        },100);
*/













        // run the currently selected effect
        function runEffect(part) {
            // run the effect
            //console.log("run effect : " + part);
            $(part).show("scale", "percent: 100", 50);

            callback(part);
        }

        //callback function to bring a hidden box back
        function callback(part) {
            setTimeout(function () {
                $(part).hide("scale", "percent: 0", 50);
            }, 300);
        }

        var socket = io('http://127.0.0.1:3000');
        //var socket = io('http://jycom.asuscomm.com:5300');
        socket.on('fromserver', function () {
            console.log('socket connected');
            socket.emit('fromclient', 'Hello From WEB');
        });

        {
            socket.on('toWeb', function (data) {
                if (UnityLoaded && data != null) {

                    var part_num = parseInt(data.data.toString().substr(0, 4), 2); //1, 2
                    var power = parseInt(data.data.toString().substr(4, 12), 2); // data : 0~1024

                    console.log("data : " + data.data.toString());
                    console.log("part : " + part_num);
                    console.log("power : " + power);
                    // 근육 센서(이미지)
                    if (power != 0) {
                        var part;

                        /*if (part_num == 1) {
                            if (current_ex_name == "Dumbel") {
                                if (power >= 500) {
                                    console.log("send Muscle Failed Message to " + current_ex_name);
                                    u.getUnity().SendMessage("CoordinateMapper", "muscleFail", "");
                                }
                            }
                            else if (current_ex_name == "Side") {
                                if (power >= 600) {
                                    console.log("send Muscle Failed Message to " + current_ex_name);
                                    u.getUnity().SendMessage("CoordinateMapper", "muscleFail", "");
                                }
                            }
                        }
*/


                        if (part_num == 1) {
                            part = '#deltoid_left';
                            var prcnt = parseInt((power / 1024) * 100, 10);
                            //FusionCharts.items["cpu-linear-gauge"].feedData("value=" + prcnt);
                            FusionCharts.items["cpu-linear-gauge"].setData(prcnt, "value");
                            //FusionCharts.items["cpu-linear-gauge"].render();
                        }
                        else if (part_num == 2) {
                            part = '#deltoid_right';
                            var prcnt = parseInt((power / 1024) * 100, 10);
                            //FusionCharts.items["cpu-linear-gauge2"].feedData("value=" + prcnt);
                            FusionCharts.items["cpu-linear-gauge2"].setData(prcnt, "value");
                            //FusionCharts.items["cpu-linear-gauge2"].render();
                        }
                        //console.log("part name : " + part);


//                        if (power <= 341) {
//                            $(part).css("width", "16px");
//                            $(part).css("height", "16px");
//                            $(part).css('background-color', '#66b132');
//                            $(part).css("box-shadow", "0px 0px 10px #66b132");
//                        }
//                        else if (power <= 682) {
//                            $(part).css("width", "32px");
//                            $(part).css("height", "32px");
//                            $(part).css('background-color', '#f9bb04');
//                            $(part).css("box-shadow", "0px 0px 10px #f9bb04");
//                        }
//                        else if (power <= 1024) {
//                            $(part).css("width", "48px");
//                            $(part).css("height", "48px");
//                            $(part).css('background-color', '#a8184b');
//                            $(part).css("box-shadow", "0px 0px 10px #a8184b");
//                        }
//
//                        if(part_num == 1 && power <= 341){
//                            $(part).css("top", "26.5%");
//                            $(part).css("left", "23.5%");
//                        }
//                        else if(part_num == 1 && power <= 682){
//                            $(part).css("top", "25.5%");
//                            $(part).css("left", "22.5%");
//                        }
//                        else if(part_num == 1 && power <= 1024){
//                            $(part).css("top", "24%");
//                            $(part).css("left", "21%");
//                        }
//                        else if(part_num == 2 && power <= 341){
//                            $(part).css("top", "21%");
//                            $(part).css("left", "36%");
//                        }
//                        else if(part_num == 2 && power <= 682){
//                            $(part).css("top", "19.5%");
//                            $(part).css("left", "34.5%");
//                        }
//                        else if(part_num == 2 && power <= 1024){
//                            $(part).css("top", "18%");
//                            $(part).css("left", "33%");
//                        }

                        if (power >= 750) {
                            $(part).css("width","60px");
                            $(part).css("height", "60px");
                            $(part).css('background-color', '#a8184b');
                            $(part).css("box-shadow", "0px 0px 10px #a8184b");
                        }
                        else {
                            $(part).css("width", "50px");
                            $(part).css("height", "50px");
                            $(part).css('background-color', '#f9bb04');
                            $(part).css("box-shadow", "0px 0px 10px #f9bb04");
                        }

                        if (part_num == 1 && power < 750) {
                            $(part).css("top", "55%");
                            $(part).css("left", "18%");
                        }
                        else if (part_num == 1 && power >= 750) {
                            $(part).css("top", "56%");
                            $(part).css("left", "17%");
                        }

                        else if (part_num == 2 && power < 750) {
                            $(part).css("top", "55%");
                            $(part).css("left", "70%");
                        }
                        else if (part_num == 2 && power >= 750) {
                            $(part).css("top", "56%");
                            $(part).css("left", "71%");
                        }
                        runEffect(part);

                        $("#effect").hide();

                    }
                }
            });
        }



    });

</script>
</body>
<script src="/public/js/chart.js"></script>

</html>
