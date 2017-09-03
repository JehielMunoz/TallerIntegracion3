$(document).ready(Main);
function Main() {
  $("button[name='BTN-log']").click(Validar_log);
}
function Validar_log() {
  var user = $("#user").val();
  var pass = $("#pass").val();
  if(user == ""){
    $('#user').focus();
    $("#resultado").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Cuidado!</strong> Necesitas ingresar un usuario. </div>');
  }else if(pass == ""){
    $('#pass').focus();
    $("#resultado").html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Cuidado!</strong> Necesitas ingresar una contraseña. </div>');
  }else{
    $("#resultado").html("<a href='./portal.php'>aca</a>");
  }
}