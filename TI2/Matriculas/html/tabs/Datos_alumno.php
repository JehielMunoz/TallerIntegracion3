<?php
    if(file_exists('../../php/funciones.php'))
    {
        require '../../php/funciones.php';  # Obligatoriamente hay que volver a cargar las funciones, al cargar este documento con ajax. Es como si fuera un espacio diferente al index.php, por lo tanto. Todas las funciones que estan abajo no existen.
    }
        
?>
<div id="tabs-1">	   
	<div class ="divplanilla">
		<form>	
            <input type="text" hidden id="Rut" name="Rut" />
			<table>	
				<tr> 
					<td colspan="2"></td>
					<td><input type="text" name="lname" placeholder="Busqueda Alumno" id="Nombre_alumno_buscar">
            		    <input type="submit" id="Buscar_alumno" name="Buscar_alumno" value="Buscar"/></td>
				</tr>
				<tr>
					<td colspan="2">Nombre Alumno:</td>
					<td><input type="text" disabled name="lname" id="Nombre" placeholder="Nombre Alumno" value="<?php Nombre(); ?>"></td>
				</tr>
				<tr>
					<td colspan=2>Rut:</td>
					<td><input type="text" disabled name="lname" id="Ruta" placeholder="Rut" value="<?php Rut(); ?>"></td>
				</tr>
				<tr>
					<td colspan="2">Fecha de nacimiento:</td>
					<td><input type="text" disabled name="lname" placeholder="Fecha Nacimiento" value="<?php get_F_nacimiento_alumno(); ?>"></td>
				</tr>
				<tr>
					<td colspan="2">Domicilio:</td>
					<td><input type="text" disabled name="lname" placeholder="Domicilio" value="<?php get_Direccion_alumno(); ?>"></td>
				</tr>
				<tr>
					<td colspan="2">Comuna</td>
					<td><input type="text" disabled name="lname" placeholder="Comuna" value="<?php get_Comuna_alumno(); ?>"></td>
				</tr>
				
				<tr>
					<th colspan="3"><span>Antecedentes academicos</span></th>
				</tr>
				<tr>
					<td colspan="2">Curso anterior:</td>
					<td><input type="text" disabled name="lname" placeholder="Curso Anterior" value="<?php get_Curso_anterior_alumno(); ?>"></td>
				</tr>
				<tr>
					<td colspan="2">Establecimiento:</td>
					<td><input type="text" disabled name="lname" placeholder="Establecimiento" value="<?php get_Establecimiento_ant_alumno(); ?>"></td>
				</tr>
				<tr>
					<td colspan="2">Repitente: </td>
					<td><input type="text" disabled name="lname" placeholder="Repitente" value="<?php get_Repitente_alumno(); ?>"></td>
				</tr>
				<tr>
					<td colspan="2">Conocimiento de ingles:</td>
					<td><input type="text" disabled name="lname" placeholder="Conocimiento de ingles" value="<?php get_Ingles_alumno(); ?>"></td>
				</tr>
			</table>
		</form>
	</div>
</div>