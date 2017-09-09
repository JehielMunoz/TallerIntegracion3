<!DOCTYPE html>
<html lang="es">
<head>
	<title>Maqueta</title>
	<link type="text/css" rel="stylesheet" href="./Resources/Style/estilo.css"/>
	<link rel="stylesheet" href="./Resources/Style/tabs_style.css">
	<link rel="stylesheet" href="./Resources/Style/tabs_style02.css">
	<script src="./Resources/Scripts/jquery-3.1.1.min.js"></script>
	<script src="./Resources/Scripts/scripts.js"></script>
	<script src="./Resources/Scripts/tabsO.js"></script>
	<script src="./Resources/Scripts/tabs.js"></script>
    <script src="./Resources/Scripts/Asignar_datos_db.js"></script>
	<script>
		$(function() {
            console.log( "1readysss!" );
		});
		$(function(){
			$("#tabs").tabs();
		});
		var id_nombre = <?php get_Personas();?>; 
        var id = [];
        var nombre = [];
		$(function() {            
			for (var x = 0; x < id_nombre.length; x++)
			{
				id.push(id_nombre[x][0]) ;    
				nombre.push(id_nombre[x][1]) ;    
			}                        
			$( "#Nombre_alumno_buscar" ).autocomplete({
			source: nombre,
			change: function(){   // Esto detecta el canbio en el campo de texto. Cuando se usa el autocompletado. Funcioa en chrome y firefox.
				AsignarId($(this));
				}
			});
		});
		
		$(function(){ 
           $("#Buscar_alumno,#tab-1").click(function(){ // Esto maneja el ajax.  Hace una consulta por post y remplaza la planilla con la respuesta del pust.
               var url = "./html/tabs/Datos_alumno.php";
               var Accion = "nada";
               $.ajax({
                   type:"POST",
                   url:url,
                   data: {Rut: $("#Rut").val(),AutoNombre:$("#Nombre_alumno_buscar").val()}, // Datos del post. Los cuales recupera del campo rut y nombre.
                   success: function (data) { // Si la consulta tiene exito.
                    $("#tabs-1").html(data); // Remplzasa el contedio del div tabs-1
                    }
            
               });
            return false; // Igual  que al validar formularios, devuelve falso para que se ejecute el enviar del form.
           });
        });
        $(function(){ 
           $("#btn-buscar,#tab-2").click(function(){ // Esto maneja el ajax.  Hace una consulta por post y remplaza la planilla con la respuesta del pust.
               var url = "./html/tabs/Apoderado_alumno.php";
               $.ajax({
                   type:"POST",
                   url:url,
                   data: {Rut: $("#Rut").val(),AutoNombre:$("#Nombre_alumno_buscar").val()}, // Datos del post. Los cuales recupera del campo rut y nombre.
                   success: function (data) { // Si la consulta tiene exito.
                    $("#tabs-2").html(data); // Remplzasa el contedio del div tabs-1
                    }
            
               });
            return false; // Igual  que al validar formularios, devuelve falso para que se ejecute el enviar del form.
           });
        });
        $(function(){ 
           $("#btn-buscar,#tab-3").click(function(){ // Esto maneja el ajax.  Hace una consulta por post y remplaza la planilla con la respuesta del pust.
               var url = "./html/tabs/Antecedentes_Familiares_alumno.php";
               $.ajax({
                   type:"POST",
                   url:url,
                   data: {Rut: $("#Rut").val(),AutoNombre:$("#Nombre_alumno_buscar").val()}, // Datos del post. Los cuales recupera del campo rut y nombre.
                   success: function (data) { // Si la consulta tiene exito.
                    $("#tabs-3").html(data); // Remplzasa el contedio del div tabs-1
                    }
            
               });
            return false; // Igual  que al validar formularios, devuelve falso para que se ejecute el enviar del form.
           });
        });
        $(function(){ 
           $("#btn-buscar,#tab-4").click(function(){ // Esto maneja el ajax.  Hace una consulta por post y remplaza la planilla con la respuesta del pust.
               var url = "./html/tabs/Salud_alumno.php";
               $.ajax({
                   type:"POST",
                   url:url,
                   data: {Rut: $("#Rut").val(),AutoNombre:$("#Nombre_alumno_buscar").val()}, // Datos del post. Los cuales recupera del campo rut y nombre.
                   success: function (data) { // Si la consulta tiene exito.
                    $("#tabs-4").html(data); // Remplzasa el contedio del div tabs-1
                    }
            
               });
            return false; // Igual  que al validar formularios, devuelve falso para que se ejecute el enviar del form.
           });
        });
        
        
        
		$(function(){ 
           $("#tab-5").click(function(){ // Esto maneja el ajax. Cuando hago click en el boton para buscar. Hace una consulta por post y remplaza la planilla con la respuesta del pust.
               var url = "./html/tabs/Vista_Previa_ajax.php";
               $.ajax({
                   type:"POST",
                   url:url,
                   data: {Rut:$("#Rut").val(),AutoNombre:$("#Nombre_alumno_buscar").val()}, // Datos del post. Los cuales recupera del campo rut y nombre.
                   success: function (data) { // Si la consulta tiene exito.
                    $("#tabs-5").html(data); // Remplzasa el contedio del div tabs-1
                    }
            
               });
            return false; // Igual  que al validar formularios, devuelve falso para que se ejecute el enviar del form.
           });
        });
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>