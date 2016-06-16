<?php
if (isset($_SESSION["user_info"])) {
    $user_info = $_SESSION["user_info"];
} else {
    $user_info = false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fullscreen HTML5 Page Background Video</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <title></title>
    <script src="/public/jquery-2.2.0/jquery-2.2.0.min.js"></script>
    <link rel="stylesheet" href="/public/icon/foundation-icons.css">
    <link rel="stylesheet" href="/public/css/foundation.min.css">
    <link rel="stylesheet" href="/public/css/foundation.css">
    <script src="/public/js/vendor/foundation.min.js" language="JavaScript"></script>
    <script>
        $(document).ready(function () {
            $("#joinBtn").click(function () {
                $("#join").slideDown("slow");
            });
        });
    </script>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <style>
        body {
            margin: 0;
            background: #000;
        }

        video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -100;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            background: url('/public/img/join/background.jpg') no-repeat;
            background-size: cover;
            -webkit-transition: 1s opacity;
            transition: 1s opacity;
        }

        #background {
            font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;
            font-weight: 100;
            background: rgba(0, 0, 0, 0.3);
            padding: 2rem;
            width: 33%;
            margin: 2rem;
            margin-right: 5rem;
            float: right;
            font-size: 1.2rem;
        }

        @media screen and (max-width: 500px) {
            div {
                width: 70%;
            }
        }

        @media screen and (max-device-width: 800px) {
            html {
                background: url(/public/img/join/background.jpg) #000 no-repeat center center fixed;
            }

            #bgvid {
                display: none;
            }
        }

        #join {
            display: none;
        }
    </style>
</head>
<body>

<video autoplay poster="/public/img/join/background.jpg" id="bgvid" loop>
    <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
    <source src="/public/video/login/background.mp4" type="video/mp4">
</video>

<div class="column row" id="background">
    <?php if (!$user_info) { ?>
        <form action="/sign/login/" enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="small-3 columns">
                    <label for="login_id" class="text-right middle">아이디</label>
                </div>
                <div class="small-9 columns">
                    <input type="text" id="login_id" name="login_id" required="required" value="kim">
                </div>
            </div>
            <div class="row">
                <div class="small-3 columns">
                    <label for="login_pass" class="text-right middle">패스워드</label>
                </div>
                <div class="small-9 columns">
                    <input type="text" id="login_pass" name="login_pass" required="required"
                           value="1234">
                </div>
            </div>
            <div class="row column">
                <div class="button-group" style="float: right">
                    <input type="submit" class="button" value="확인">
                    <button type="button" class="secondary button" id="joinBtn">회원가입</button>
                </div>
            </div>
        </form>

        <form action="/sign/signUp" enctype="multipart/form-data" method="post" id="join">

            <div class="row column">
                <label>아이디
                    <input type="text" id="u_id" name="u_id" required="required" value="ididid">
                </label>
            </div>
            <div class="row column">
                <label>비밀번호
                    <input type="password" id="u_pass" name="u_pass" required="required"
                           value="abcabc">
                </label>
            </div>
            <div class="row column">
                <label>비밀번호 확인
                    <input type="password" id="u_passCheck" name="u_passCheck" required="required"
                           value="abcabc">
                </label>
            </div>
            <div class="row column">
                <label>이메일
                    <input type="text" id="u_email" name="u_email" required="required" value="dddd@aaa.com">
                </label>
            </div>
            <div class="row column">
                <label>닉네임
                    <input type="text" id="u_nick" name="u_nick" required="required" value="bbbbbbbbb">
                </label>
            </div>
            <div class="row column">
                <label>몸무게
                    <input type="text" id="weight" name="u_weight" required="required" value="70">
                </label>
            </div>
            <div class="row column">
                <label>키
                    <input type="text" id="height" name="u_height" required="required" value="170">
                </label>
            </div>
            <div class="column row">
                <input type="submit" class="button" value="확인" style="float: right">
            </div>
        </form>

    <?php } else { ?>
        <span>로그인 완료</span>
        <form action="/sign/logout" method="post">
            <input type="submit" value="로그아웃">
        </form>
    <?php } ?>
</div>

<!--<div id="panel">Hello world!</div>-->

<script src="/public/js/vendor/foundation.min.js" language="JavaScript"></script>

<script>
    $(document).foundation();
</script>

</body>
</html>
