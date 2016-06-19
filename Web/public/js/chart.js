var routine=null;
var order = 0;
var final_order = 0;
var clear_score;
var clear_set;
var current_ex_name;
var next_ex_name;
var sended_score = 0;
var set_num=1;
var min=0;

$(document).ready(function(){
    u.getUnity().SendMessage("CoordinateMapper", "LoadScene", "end");

});



function orderPlus(temp)//운동 하나 끝나면 aPlus 호출해서 숫자 올림
{
    console.log("!");
    console.log(temp);

    jQuery(function(){

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
    });(jQuery);

}

function exerciseGet()
{
    console.log("order" + order + " / " + final_order);
    final_order = Number(routine.length);
    if(order < final_order)
    {
        document.getElementById('information').innerHTML=
            '<h3 style="color: #00bf6f">' + routine[order].exercise_name +'</h3>'+
            '<h4> 세트수 : ' + routine[order].number_of_set +
            '  운동 횟수 : ' + routine[order].number_of_count +'</h4>';

        clear_score = Number(routine[order].number_of_count);
        clear_set = Number(routine[order].number_of_set);
        switch (Number(routine[order].exercise_numb)){
            case 1:{
                current_ex_name = "Squart";
                break;
            }

            case 2:{
                current_ex_name = "Dumbel";
                break;
            }

            case 3:{
                current_ex_name ="Side";
                break;
            }

            case 4:{
                current_ex_name ="Lunge";
                break;
            }
        }
        console.log("setGet"+current_ex_name);

        u.getUnity().SendMessage("CoordinateMapper", "setGet"+current_ex_name, clear_set);
        u.getUnity().SendMessage("CoordinateMapper", "scoreGet"+current_ex_name, clear_score);

    }

    if(order+1 < final_order)
    {
        document.getElementById('nextInformation').innerHTML =
            '<h3 style="color: #00bf6f">'+ routine[order+1].exercise_name +'</h3>'+
            ' <h4>세트수 : ' + routine[order+1].number_of_set +
            ' 운동 횟수 : ' + routine[order+1].number_of_count +'</h4>';
        switch (Number(routine[order+1].exercise_numb)){
            case 1:{
                next_ex_name = "Squart";
                break;
            }

            case 2:{
                next_ex_name = "Dumbel";
                break;
            }

            case 3:{
                next_ex_name ="Side";
                break;
            }

            case 4:{
                next_ex_name ="Lunge";
                break;
            }
        }

    }
    else
    {
        document.getElementById('nextInformation').innerHTML= '끝';
    }
    order++;
    make_chart()

}


/*
 function screenSize(data)
 {
 $(".content").css("width","500px");
 }
 */

function screenResize(data)
{
    $(".col-md-8").css("width","74%");
}


function cut_View(left,right) {
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
}
function cut_view(left,right) {
    console.log("count : " + left);
    console.log("goal : " + right);
}
function cut_view2(left,right) {
    //console.log("SETcount : " + left);
    //console.log("SETgoal : " + right);
}

function sendTest(msg){
    console.log("from unity says: " + msg);
}

/*function send_score(score) {
 if (sended_score != score) {
 sended_score = score;

 make_chart();

 }
 }*/

function send_score(score, fail_body_point) {
    if (sended_score != score) {
        sended_score = score;

        make_chart();
        console.log(fail_body_point);
        $.ajax({
            type: "post",
            url: "/main/insert_check_point",
            data: {
                order:order,
                body_point: fail_body_point
            },
            dataType: "json",
            success: function(data){
                console.log(data);
            }

        });

    }
}


function send_time(time){
    console.log("sended Time : "+time);
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
    sended_score = score;
}

function insert_set(set_num) {
    document.getElementById("set").innerHTML = set_num+"세트";
}

function move_Page(temp){
    location.href="http://localhost/main/exercise_Result";
}


function make_chart() {
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
}


/*
 function sleep(ms){
 ts1 = new Date().getTime() + ms;
 do ts2 = new Date().getTime(); while (ts2<ts1);
 }*/
