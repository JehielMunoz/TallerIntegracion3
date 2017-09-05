<!DOCTYPE html>
<html lang="es">
<head>
	<title>Maqueta</title>
	<link type="text/css" rel="stylesheet" href="../Resources/Style/estilo.css"/>
	<link rel="stylesheet" href="../Resources/Style/tabs_style.css">
	<link rel="stylesheet" href="../Resources/Style/tabs_style02.css">
	<script src="../Resources/Scripts/scripts.js"></script>
	<script src="../Resources/Scripts/tabsO.js"></script>
	<script src="../Resources/Scripts/tabs.js"></script>
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
		<div id="user-status">
			Cerrar Sesion
		</div>
	</div>
	<div class="menudiv">
		<a href="../index.php">Matriculas</a>
		<a href="#">Zona de apoderados</a>
		<a href="add.php">Agregar Alumno</a>
		<a href="delete.php">Eliminar Alumno</a>
	</div>
		<div id="tabs" class="barradiv">
			<form>
				<table> 
					<th>Antecedentes alumno</th>
					<tr> 
						<td>Nombre Alumno</td> 
						<td style="text-align:left;"><input type="text"></td> 
					</tr> 
					<tr> 
						<td>Rut</td> 
						<td><input type="number"></td> 
					</tr> 
					<tr> 
						<td>Fecha Nacimiento</td> 
						<td><input type="date"></td> 
					</tr> 
					<tr> 
						<td>Domicilio</td> 
						<td><input type="text" ></td> 
					</tr>  
					<tr> 
						<td>Comuna</td> 
						<td><input type="text"></td> 
					</tr>
					<th>Antecedentes Academicos</th>
					<tr> 
						<td>Curso anterior</td> 
						<td><input type="text"></td> 
					</tr> 
					<tr> 
						<td>Establecimiento</td> 
						<td><input type="text"></td> 
					</tr> 
					<tr> 
						<td>Repitente</td> 
						<td><input type="text"></td> 
					</tr> 
					<tr> 
						<td>Conoce palabras en ingles</td> 
						<td><input type="text" ></td> 
					</tr> 
					<th colspan="2">Antecedentes Familiares</th>
					<tr> 
					<th colspan="2">Datos de la Madre</th>
					</tr><tr>
						<td>Nombre de la madre</td> 
						<td><input type="text"></td> 
					</tr> 
					<tr> 
						<td>Rut</td> 
						<td><input type="number"></td> 
					</tr> 
					<tr> 
						<td>Fecha Nacimiento</td> 
						<td><input type="date"></td> 
					</tr> 
					<tr> 
						<td>Fono</td> 
						<td><input type="number" ></td> 
					</tr>  
					<tr> 
						<td>Estudios</td> 
						<td><input type="text"></td> 
					</tr>  
					<tr> 
						<td>Ocupacion</td> 
						<td><input type="text"></td> 
					</tr>  
					<tr> 
						<td>Lugar de trabajo</td> 
						<td><input type="text"></td> 
					</tr>  
					<tr> 
						<td>Vive con el alumno</td> 
						<td><input type="radio">Si
							<input type="radio">No</td> 
					</tr>  
					<tr> 
						<td>E-mail</td> 
						<td><input type="email"></td> 
					</tr> 
					<tr> 
						<th colspan="2">Datos del Padre</th>
					</tr>
					<tr>
						<td>Nombre del padre</td> 
						<td><input type="text"></td> 
					</tr> 
					<tr> 
						<td>Rut</td> 
						<td><input type="number"></td> 
					</tr> 
					<tr> 
						<td>Fecha Nacimiento</td> 
						<td><input type="date"></td> 
					</tr> 
					<tr> 
						<td>Fono</td> 
						<td><input type="number" ></td> 
					</tr>  
					<tr> 
						<td>Estudios</td> 
						<td><input type="text"></td> 
					</tr>  
					<tr> 
						<td>Ocupacion</td> 
						<td><input type="text"></td> 
					</tr>  
					<tr> 
						<td>Lugar de trabajo</td> 
						<td><input type="text"></td> 
					</tr>  
					<tr> 
						<td>Vive con el alumno</td> 
						<td><input type="radio">Si
							<input type="radio">No</td> 
					</tr>  
					<tr> 
						<td>E-mail</td> 
						<td><input type="email"></td> 
					</tr> 
						<th>Hermanos</th>
						<tr>
							<td>Nombre</td><td>Edad</td><td>Ocupacion</td><td>lugar</td>
						</tr>
						<tr><td>1.-</td><td></td><td></td><td></td></tr>
						<tr><td>2.-</td><td></td><td></td><td></td></tr>
						<tr><td>3.-</td><td></td><td></td><td></td></tr>
						<tr><td>4.-</td><td></td><td></td><td></td></tr>
					<th>Antecedentes de salud y seguridad escolar</th>
					<tr>
						<th>En caso de accidente</th>
						<td>Fono</td> 
						<td><input type="number" ></td> 
					</tr>
					<tr> 
						<td>E-mail</td> 
						<td><input type="email"></td> 
					</tr>  
					<tr> 
						<td>Problemas de salud</td> 
						<td><input type="radio">Si
							<input type="radio">No</td> 
					</tr>
					<tr> 
						<td>Especifique</td> 
						<td><input type="text"></td> 
					</tr>  
					<tr> 
						<td>Alergia</td> 
						<td><input type="radio">Si
							<input type="radio">No</td> 
					</tr>
					<tr> 
						<td>Especifique</td> 
						<td><input type="text"></td> 
					</tr>
					<th>Responsable del rendimiento academico y conductual</th>
					<tr> 
						<td>Nombre</td> 
						<td><input type="text"></td> 
					</tr> 
					<tr> 
						<td>Rut</td> 
						<td><input type="number"></td> 
					</tr> 
					<tr> 
						<td>Fono</td> 
						<td><input type="number" ></td> 
					</tr>  
					<tr> 
						<td>Relacion alumno</td> 
						<td><input type="text"></td> 
					</tr> 
					<tr> 
						<td>E-mail</td> 
						<td><input type="email"></td> 
					</tr> 
				</table>
			</form>
		</div>
	</body>
</html>