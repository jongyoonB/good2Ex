function idCheck()
{
  var a = $('#u_id').val();
  var urlSt = "/ajaxC/idCheck/" + a;
  console.log(urlSt);
  $.ajax({
    url: urlSt,
    type: 'get',
    success: function (data) {
      $('#u_id_R').html("");
      if(data) {
        $('#u_id_R').append("가능");
      }else {
        $('#u_id_R').append("중복");
      }
    }
  });
}

function nickCheck()
{
  var a = $('#u_nick').val();
  var urlSt = "/ajaxC/nickCheck/" + a;
  $.ajax({
    url: urlSt,
    type: 'get',
    success: function (data) {
      $('#u_nick_R').html("");
      if(data) {
        $('#u_nick_R').append("가능");
      }else {
        $('#u_nick_R').append("중복");
      }
    }
  });
}

function passCheck()
{
  var pass = $('#u_pass').val();
  var check = $('#u_passCheck').val();
  $('#u_pass_R').html("");
  if(pass === check)
  {
    $('#u_pass_R').append("가능");
  }
  else
  {
    $('#u_pass_R').append("다름");
  }
}

$('#u_id').keyup(function () {
  var inputLength = $(this).val().length;
  var minlength = 3;
  var maxlength = 17;
  if(inputLength > minlength && inputLength < maxlength)
  {
    idCheck();
  }
  else if(inputLength < minlength)
  {
    $('#u_id_R').html("");
    $('#u_id_R').append("글자 수가 작습니다.");
  }
  else
  {
    $('#u_id_R').html("");
    $('#u_id_R').append("글자 수가 깁니다.");
  }
});



$('#u_pass').keyup(function() {
  var inputLength = $(this).val().length;
  var minlength = 3;
  var maxlength = 17;

  if(inputLength > minlength && inputLength < maxlength)
  {
    $('#u_pass_RR').html("");
    $('#u_pass_RR').append("가능합니다.");
  }
  if(inputLength < minlength)
  {
    $('#u_pass_RR').html("");
    $('#u_pass_RR').append("글자 수가 작습니다.");
  }
  else if(inputLength > maxlength)
  {
    $('#u_pass_RR').html("");
    $('#u_pass_RR').append("글자 수가 깁니다.");
  }
});

$('#u_nick').keyup(function () {
  nickCheck();
});

$('#u_passCheck').keyup(function () {
  passCheck();
});
