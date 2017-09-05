<?php 
session_start();
if(!empty($_SESSION['Usuario']))
{   
        chdir("../../");
        require_once "./php/funciones.php";     
}
else
{
    header('location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Maqueta</title>
	<link type="text/css" rel="stylesheet" href="../../Resources/Style/estilo.css"/>
	<link rel="stylesheet" href="../../Resources/Style/tabs_style.css">
	<link rel="stylesheet" href="../../Resources/Style/tabs_style02.css">
	<script src="../Resources/Scripts/scripts.js"></script>
	<script src="../../Resources/Scripts/tabsO.js"></script>
	<script src="../../Resources/Scripts/tabs.js"></script>
	<script>
	$(function(){
		$("#tabs").tabs();
	});
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<body>
	<div id="top-header">
		<h1>Bienvenido</h1>
        <div >
            <form action="../../php/desconexion.php" method="post">
                <input type="submit" id="user-status" name="Desconectar" formmethod="post" Value="Cerrar Sesión">
            </form>
		</div>
	</div>
	<div class="menudiv">
		<a href="../../index.php">Matriculas</a>
		<a href="#">Zona de apoderados</a>
		<a href="Agregar_alumno.php">Agregar Alumno</a>
		<a href="Eliminar_alumno.php">Eliminar Alumno</a>
	</div>
        
    <div id="tabs" class="barradiv">
        <ul>
            <li class="button" id="tab-1" ><a href="#tabs-1">Planilla</a></li>
                <!--Agregar Botones//Listas//Tabs aquí, El contenido va en contenido.php.-->
        </ul>
    <form id="guardar_alumno" method="post" action="../../php/agregar_alumno_registro.php">
	<div id="tabs-1">
        <?php
            if(!empty($_SESSION["Error_Registro"]))
            {
                echo '<div class="divError">No se pudo agregar el empleado.</div>';
                unset($_SESSION["Error_Registro"]);
            }
        ?>
        <div class="divplanilla">
			<table> 
				<thead>Antecedentes alumno</thead>
				<tr> 
					<td>Nombre Alumno</td> 
					<td style="text-align:left;"><input type="text" name="r_nombre_alumno" required="required"></td> 
				</tr> 
				<tr> 
					<td>Rut</td> 
					<td><input type="number" name="r_rut_alumno" required="required"></td>
				</tr> 
				<tr> 
					<td>Fecha Nacimiento</td> 
					<td><input type="date"  name="r_fecha_nacimiento_alumno" required="required"></td>  
				</tr> 
				<tr> 
					<td>Domicilio</td> 
					<td><input type="text" name="r_domicilio_alumno" required="required"></td> 
				</tr>  
				<tr> 
					<td>Comuna</td> 
					<td><input type="text" name="r_comuna_alumno" required="required"></td> 
				</tr>
			</table>
			<table> 
				<thead>Antecedentes Academicos</thead>
				<tr> 
					<td>Curso anterior</td> 
					<td><input type="text" name="r_curso_anterior_alumno" required="required"></td> 
				</tr> 
				<tr> 
					<td>Establecimiento anterior</td> 
					<td><input type="text" name="r_Establecimiento_alumno" required="required"></td> 
				</tr> 
				<tr> 
					<td>Repitente</td> 
					<td><input type="text" name="r_repitente_alumno" required="required"></td>  
				</tr> 
                <tr> 
					<td>Numero de veces que ha repetido</td> 
					<td><input type="text" name="r_repitio_alumno" required="required"></td>  
				</tr> 
				<tr> 
					<td>Conoce palabras en ingles</td> 
					<td><input type="text" name="r_ingles_alumno" required="required"></td> 
				</tr> 
                <tr> 
					<td>Fecha de Ingreso al Establecimiento</td> 
					<td><input type="date"  name="r_fecha_ingreso_alumno" required="required"></td>  
				</tr>
                <tr> 
					<td>Curso actual</td> 
					<td><input type="text" name="r_curso_actual_alumno" required="required"></td> 
				</tr> 
			</table>
			<table>
				<thead>Antecedentes Familiares</thead>
				<tr> 
					<td>Nombre de la madre</td> 
					<td><input type="text" name="r_nombre_madre" required="required"></td>  
				</tr> 
				<tr> 
					<td>Rut</td> 
					<td><input type="number" name="r_rut_madre" required="required"></td> 
				</tr> 
				<tr> 
					<td>Fecha Nacimiento</td> 
					<td><input type="date" name="r_fecha_nacimiento_madre" required="required"></td> 
				</tr> 
				<tr> 
					<td>Fono madre</td> 
					<td><input type="number" name="r_fono_madre" ></td>  
				</tr>  
				<tr> 
					<td>Estudios</td> 
					<td><input type="text" name="r_estudios_madre" required="required"></td> 
				</tr>  
				<tr> 
					<td>Ocupacion</td> 
					<td><input type="text" name="r_ocupacion_madre" required="required"></td>  
				</tr>  
				<tr> 
					<td>Lugar de trabajo</td> 
					<td><input type="text" name="r_trabajo_madre" required="required"></td>  
				</tr>  
				<tr> 
					<td>Vive con el alumno</td> 
					<td><input type="radio" required value="1" name="r_viveconalumno_madre">Si
						<input type="radio" required value="0" name="r_viveconalumno_madre">No</td> 
				</tr>  
				<tr> 
					<td>E-mail</td> 
					<td><input type="email" name="r_email_madre" ></td>
				</tr> 
				<tr> 
					<td>Nombre del padre</td> 
					<td><input type="text" name="r_nombre_padre" required="required"></td>
				</tr> 
				<tr> 
					<td>Rut</td> 
					<td><input type="number" name="r_rut_padre" required="required"></td>
				</tr> 
				<tr> 
					<td>Fecha Nacimiento</td> 
					<td><input type="date" name="r_fecha_nacimiento_padre" required="required"></td>
				</tr> 
				<tr> 
					<td>Fono</td> 
					<td><input type="number" name="r_fono_padre"></td>
				</tr>  
				<tr> 
					<td>Estudios</td> 
					<td><input type="text" name="r_estudio_padre" required="required"></td>
				</tr>  
				<tr> 
					<td>Ocupacion</td> 
					<td><input type="text" name="r_ocupacion_padre" required="required"></td>
				</tr>  
				<tr> 
					<td>Lugar de trabajo</td> 
					<td><input type="text" name="r_trabajo_padre" required="required"></td>
				</tr>  
				<tr> 
					<td>Vive con el alumno</td> 
					<td><input type="radio" required value="1" name="r_viveconalumno_padre">Si
				    <input type="radio" required value="0" name="r_viveconalumno_padre">No</td>  
				</tr>  
				<tr> 
					<td>E-mail</td> 
					<td><input type="email" name="r_email_padre"></td>
				</tr> 
				<table border="1">
					<thead>Hermanos</thead>
					<tr>
						<td>Nombre</td><td>Edad</td><td>Ocupacion</td><td>lugar</td>
					</tr>
					<tr><td>1.-</td><td></td><td></td><td></td></tr>
					<tr><td>2.-</td><td></td><td></td><td></td></tr>
					<tr><td>3.-</td><td></td><td></td><td></td></tr>
					<tr><td>4.-</td><td></td><td></td><td></td></tr>
				</table>
			</table>
			<table>
				<thead>Antecedentes de salud y seguridad escolar</thead>
				<tr>
					<thead>En caso de accidente</thead>
					<td>Fono</td> 
					<td><input type="number" name="r_numero_accidente" required="required"></td> 
				</tr>
				<tr> 
					<td>E-mail</td> 
					<td><input type="email" name="r_email_accidente" required="required"></td>
				</tr>  
				<tr> 
					<td>Problemas de salud</td> 
					<td><input type="radio" name="r_problemassalud_accidente" value="1">Si
						<input type="radio" name="r_problemassalud_accidente" value="0">No</td> 
				</tr>
				<tr> 
					<td>Especifique</td> 
					<td><input required="required" type="text" name="r_descripcion_salud_accidente" required="required"></td>
				</tr>  
				<tr> 
					<td>Alergia</td> 
					<td><input type="radio" required value="1" name="r_alergia_accidente">Si
				    <input type="radio" required value="0" name="r_alergia_accidente">No</td> 
				</tr>
				<tr> 
					<td>Especifique</td> 
					<td><input type="text" name="r_descripcion_alergia_accidente" required="required"></td> 
				</tr>
			</table>
			<table>
				<thead>Responsable del rendimiento academico y conductual</thead>
				<tr> 
					<td>Nombre</td> 
					<td><input type="text" name="r_nombre_apoderado" required="required"></td>
				</tr> 
				<tr> 
					<td>Rut</td> 
					<td><input type="number" name="r_rut_apoderado" required="required"></td> 
				</tr> 
				<tr> 
					<td>Fono</td> 
					<td><input type="number" name="r_fono_apoderado" required="required"></td> 
				</tr>  
				<tr> 
					<td>Relacion alumno</td> 
					<td><input type="text" name="r_relacion_alumno_apoderado" required="required"></td>
				</tr> 
				<tr> 
					<td>E-mail</td> 
					<td><input type="text" name="r_email_apoderado" required="required"></td>
				</tr> 
                </table>
                </div>
            </div>
            <input type="submit" value="Guardar">
		  </form>
        </div>
	</body>
</html>