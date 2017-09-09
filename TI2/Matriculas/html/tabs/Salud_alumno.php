<?php
    if(file_exists('../../php/funciones.php'))
    {
        require '../../php/funciones.php';  # Obligatoriamente hay que volver a cargar las funciones, al cargar este documento con ajax. Es como si fuera un espacio diferente al index.php, por lo tanto. Todas las funciones que estan abajo no existen.
    }
        
?>
<div id="tabs-4"><br/>				<!-- Div Salud Alumno -->
	<div class ="divplanilla">
		<form>
			<table>
				<tr><th>Antecedentes de salud y seguridad escolar</th></tr>
				<tr>
					<td>En caso de accidente contactar (Nombre):</td>
					<td><input type="text" disabled name="lname" placeholder=""></td>					
				</tr>
				<tr>
					<td>Numero Telefonico:</td>
					<td><input type="text" disabled name="lname" placeholder="Fono" value="<?php get_Fono_salud(); ?>"></td>						
				</tr>
				<tr>
					<td>Correo Electronico:</td>
					<td><input type="text" disabled name="lname" placeholder="Email" value="<?php get_Email_salud(); ?>"></td>					
				</tr>
				<tr>
					<th>Problemas de salud</th>
				</tr>
				<tr>
					<td>Problemas de salud:</td>
					<td><input type="text" disabled name="lname" placeholder="Enfermedades" value="<?php get_P_salud(); ?>"></td>
				</tr>
				<tr>
					<td>Especifique:</td>
					<td><input type=""  name="lname" placeholder="" value="<?php get_Antc_Salud_salud(); ?>"></td>					
				</tr>
				<tr>
					<td>Alergias:</td>
					<td><input type="text" disabled name="lname" placeholder="Alergia " value="<?php get_Alergia_salud(); ?>"></td>
				</tr>
				<tr>
					<td>Especifique:</td>
					<td><input type="text"  name="lname" placeholder="" value="<?php get_Antc_Alergia_salud(); ?>"></td>					
				</tr>
			</table>
			<br/>
		</form>
	</div>
</div>