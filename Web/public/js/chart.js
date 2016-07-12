var routine = null;
var order = 0;
var final_order = 0;
var clear_score;
var clear_set;
var current_ex_name;
var next_ex_name;
var sended_score = 0;
var set_num = 1;
var min = 0;
var loaded;

function loadFirstExercise(tmp) {
    console.log("LoadFirstExercise");
    orderPlus("");
}

function reset_exercise(tmp){
    $.ajax({
        url: "/main/Delete_result_info",
        success: function (data) {
            console.log(data);
        }
    });
}

function orderPlus(temp)//운동 하나 끝나면 aPlus 호출해서 숫자 올림
{
    jQuery(function () {

        function order()//운동 하나 끝나면 aPlus 호출해서 숫자 올림
        {
            $.ajax({
                type: "POST",
                url: "/main/orderPlus",
                dataType: "json",
                success: function (data) {
                    routine = data;
                    exerciseGet();
                    return data;
                }
            });
        }

        //Call any jquery function
        order(); //jquery function
    });
    (jQuery);

}

function counter() {
    $('.counter').counter();
}


//$('#dd').click(function () {
//    var a = $(".counter").attr("data-stop");
//    a ++;
//    $(".counter").attr("data-stop", a);
//    $('.counter').counter();
//});

function exerciseGet() {
    console.log("order" + order + " / " + final_order);
    final_order = Number(routine.length);
    if (order < final_order) {
        document.getElementById('information').innerHTML =
            '<span style="font-size: 35px;color: gold">' + routine[order].exercise_name + '</span>';
        document.getElementById('information_set').innerHTML =

            "<span style='font-size: 25px;color: white'> 세트수 </span><span class='counter counter-analog' id='set_num' data-direction='up' data-format='99' data-stop='" + set_num + "'>" + set_num + "</span>"
            + '<span style="color: white;font-size: 20px;">&nbsp;/&nbsp;<span>' + "<span class='counter counter-analog' id='number_of_set' data-direction='up' data-format='99' data-stop='" + routine[order].number_of_set + "'>" + routine[order].number_of_set + "</span>";
        document.getElementById('information_count').innerHTML =
            "<span style='font-size: 25px;color: white;font-size: 20px;'> 운동횟수 </span><span class='counter counter-analog' id='count_num' data-direction='up' data-format='99' data-stop='" + sended_score + "'>" + sended_score + "</span>"
            + '<span style="color: white; font-size: 20px;">&nbsp;/&nbsp;</span>' + "<span class='counter counter-analog' id='number_of_count' data-direction='up' data-format='99' data-stop='" + routine[order].number_of_count + "'>" + routine[order].number_of_count + "</span>";

        counter();
        clear_score = Number(routine[order].number_of_count);
        clear_set = Number(routine[order].number_of_set);
        switch (Number(routine[order].exercise_numb)) {
            case 1:
            {
                current_ex_name = "Squart";
                break;
            }

            case 2:
            {
                current_ex_name = "Dumbel";
                break;
            }

            case 3:
            {
                current_ex_name = "Side";
                break;
            }

            case 4:
            {
                current_ex_name = "Lunge";
                break;
            }
        }
        console.log("setGet" + current_ex_name);

        u.getUnity().SendMessage("CoordinateMapper", "setGet" + current_ex_name, clear_set);
        u.getUnity().SendMessage("CoordinateMapper", "scoreGet" + current_ex_name, clear_score);

        progress_bars();
    }


    if (order + 1 < final_order) {

        switch (Number(routine[order + 1].exercise_numb)) {
            case 1:
            {
                next_ex_name = "Squart";
                break;
            }

            case 2:
            {
                next_ex_name = "Dumbel";
                break;
            }

            case 3:
            {
                next_ex_name = "Side";
                break;
            }

            case 4:
            {
                next_ex_name = "Lunge";
                break;
            }
            default:
            {
                break;
            }
        }

    }
    if (!loaded) {
        u.getUnity().SendMessage("SceneLoader", "LoadFirstScene", current_ex_name.toLowerCase());
        loaded = true;
        console.log("LoadFirstScene");
    }
    else {
        order++;
    }
    //make_chart()

}


/*
 function screenSize(data)
 {
 $(".content").css("width","500px");
 }
 */

function screenResize(data) {
    $(".col-md-8").css("width", "74%");
}


/*function cut_View(left,right) {
 if(left < 0)
 {
 left += 481;
 }
 if(right < 0)
 {
 right += 481;
 }
 console.log("right : " + right);
 console.log("left : " + left);
 }*/
function cut_view(left, right) {
    console.log("count : " + left);
    console.log("goal : " + right);
}
function cut_view2(left, right) {
    //console.log("SETcount : " + left);
    //console.log("SETgoal : " + right);
}

function sendTest(msg) {
    console.log("from unity says: " + msg);
}

/*function send_score(score) {
 if (sended_score != score) {
 sended_score = score;

 make_chart();

 }
 }*/

function set_score(){
    document.getElementById('information_count').innerHTML =
        "<span style='font-size: 20px'> 운동횟수 </span><span class='counter counter-analog' id='count_num' data-direction='up' data-format='99' data-stop='" + sended_score + "'>" + sended_score + "</span>"
        + '<span style="color: white;font-size: 20px;">&nbsp;/&nbsp;</span>' + "<span class='counter counter-analog' id='number_of_count' data-direction='up' data-format='99' data-stop='" + clear_score + "'>" + clear_score + "</span>";
    counter();
    console.log("Printed Score = " + sended_score);
}

function send_score(score, fail_body_point) { // 점수 받아옴
    if (sended_score != score) {
        sended_score = score;
        progress_bars();
        set_score();
        if (sended_score == Number(clear_score)) {
            sended_score = 0;
            ++set_num;
            console.log("SET INFO");
            console.log(set_num + " / " + clear_set);
            if (set_num > clear_set) {
                console.log("Send Data to Unity!");
                console.log("Change Scene!");
                if (order == final_order) {
                    console.log("finish Exercise");
                    //location.href="jycom.asuscomm.com:5080/main/exercise_Result";
                    u.getUnity().SendMessage("CoordinateMapper", "LoadScene", "end");
                }
                else {
                    newVal = 0;
                    set_num = 1;
                    console.log(next_ex_name);
                    u.getUnity().SendMessage("CoordinateMapper", "LoadScene", next_ex_name);
                }
            }
            else{
                setTimeout(set_score(), 1000);
                insert_set(set_num);
            }
            //ready -> current_ex_name -> setGet / scoreGet


        }

        console.log("fail point : " + fail_body_point);
        $.ajax({
            type: "post",
            url: "/main/insert_check_point",
            data: {
                order: order,
                body_point: fail_body_point
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
            }

        });

    }
}


function send_time(time) {
    console.log("sended Time : " + time);
    $.ajax({
        type: "post",
        url: '/main/save_time',
        data: {
            time: time
        },
        dataType: 'json',
        success: function (data) {
            console.log("now time" + data);
        },
        error: function (data, error, result) {
            console.log(data);
            console.log(result);
            console.log(error);
        }
    });
}


function get_score() {
    return sended_score;
}

function init_score(score) {
    sended_score = 0;
}

function insert_set(set_num) {
    document.getElementById('information_set').innerHTML =
        "<span style='font-size:20px;'> 세트수 </span><span class='counter counter-analog' id='set_num' data-direction='up' data-format='99' data-stop='" + set_num + "'>" + set_num + "</span>"
        + '<span style="color: white;font-size: 20px;">&nbsp;/&nbsp;</span>' + "<span class='counter counter-analog' id='number_of_set' data-direction='up' data-format='99' data-stop='" + clear_set + "'>" + clear_set + "</span>";
    counter();
}

function move_Page(temp) {
    location.href = "http://localhost/main/exercise_Result";
}


function progress_bars() {

    console.log("dd");
    var progress_percent = (((clear_score * (set_num - 1) + sended_score) * 1.0 / (clear_set * clear_score)).toFixed(1)) * 100;

    console.log("dddd"+ progress_percent);
    var width = document.getElementById("percent").innerHTML;

    if (width)
        width = width.replace("%", "");
    else
        width = 0;

    var id = setInterval(frame, 50);

    function frame() {
        if (width >= progress_percent) {
            clearInterval(id);

        } else {
            width++;

            $("#myBar").css("width", width + "%");
            $("#runner").css("width", width + "%");

            if (progress_percent == 100) {
                setTimeout(function () {
                    width = 0;
                    $("#myBar").css("width", width + "%");
                    $("#runner").css("width", width + "%");

                    document.getElementById("percent").innerHTML = 0 + '%';
                    clearInterval(id);
                }, 1000);
            }


            document.getElementById("percent").innerHTML = width * 1 + '%';
        }
    }
};


/*function make_chart() {
 $(function () {
 var gaugeOptions = {

 chart: {
 type: 'solidgauge',
 height:190
 },

 title: null,

 pane: {
 center: ['50%', '85%'],
 size: '150%',
 startAngle: -90,
 endAngle: 90,
 background: {
 backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
 innerRadius: '60%',
 outerRadius: '100%',
 shape: 'arc'
 }
 },

 // the value axis
 yAxis: {
 stops: [
 [0.1, '#DF5353'], // green
 [0.5, '#DDDF0D'], // yellow
 [0.9, '#55BF3B'] // red
 ],
 lineWidth: 0,
 minorTickInterval: null,
 tickPixelInterval: 400,
 tickWidth: 0,
 title: {
 y: -70
 },
 labels: {
 y: 16
 }
 },

 plotOptions: {
 solidgauge: {
 dataLabels: {
 y: 5,
 borderWidth: 0,
 useHTML: false
 }
 }
 }
 };

 // The speed gauge
 $('#container-speed').highcharts(Highcharts.merge(gaugeOptions, {
 yAxis: {
 min: min,
 max: clear_score,
 },

 credits: {
 enabled: false
 },

 series: [{
 data: [0],
 dataLabels: {
 format: '<div style="text-align:center"><span style="font-size:25px;color:' +
 ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span></div>'
 },
 enableMouseTracking: false
 }]

 }));

 // Bring life to the dials

 // Speed
 var chart = $('#container-speed').highcharts(),
 point,
 newVal,
 inc;
 //set_num=1;

 if (chart) {
 inc = get_score();
 //console.log(inc);

 point = chart.series[0].points[0];
 newVal = point.y + inc;
 point.update(newVal);
 console.log("SCORE INFO");
 console.log(newVal + " / " + clear_score);
 if (newVal == Number(clear_score)) {
 newVal = 0;
 sended_score =0;
 ++set_num;
 console.log("SET INFO");
 console.log(set_num + " / " + clear_set);
 if(set_num>clear_set)
 {
 console.log( "Send Data to Unity!" );
 console.log( "Change Scene!" );
 if(order == final_order)
 {
 console.log("finish Exercise");
 //location.href="jycom.asuscomm.com:5080/main/exercise_Result";
 u.getUnity().SendMessage("CoordinateMapper", "LoadScene", "end");


 }
 else
 {
 newVal = 0;
 set_num = 1;
 console.log(next_ex_name);
 u.getUnity().SendMessage("CoordinateMapper", "LoadScene", next_ex_name);
 }
 }
 //ready -> current_ex_name -> setGet / scoreGet

 insert_set(set_num);
 setTimeout(function(){ point.update(newVal);}, 1000);

 }

 }


 });
 }*/


/*
 function sleep(ms){
 ts1 = new Date().getTime() + ms;
 do ts2 = new Date().getTime(); while (ts2<ts1);
 }*/