<?php
    if(file_exists('../../php/funciones.php'))
    {
        require '../../php/funciones.php';  # Obligatoriamente hay que volver a cargar las funciones, al cargar este documento con ajax. Es como si fuera un espacio diferente al index.php, por lo tanto. Todas las funciones que estan abajo no existen.
    }
        
?>
<div id="tabs-3"> 					<!--Div Antecedentes Familiares-->
			<div class ="divplanilla">
				<form>
					<table>
                        <?php 
                        include("../../php/conex.php");
                        $query = mysqli_query($dbconn, "SELECT rap.Parentesco, tp.Rut ,tp.Nombre, tp.F_nacimiento,tp.Fono, tp.Email, tp.Vive_c_alu, tp.Estudios, tp.Ocupacion  FROM tpadres tp JOIN rel_talumno_tpadres rap on tp.Rut= rap.Rut_padre JOIN talumno ta on rap.Rut_alu = ta.Rut WHERE ta.Rut ='".$_SESSION['Rut']."' ");
                        if($query){
                            while($row = mysqli_fetch_assoc($query)){
                                echo "<th>Antecedentes Familiares.</th>";
								echo "<tr>";
									echo "<td>Nombre Madre</td>";
                                    echo "<td><input type='text' disabled name='lname' placeholder='Nombre' value='".$row['Nombre']."'></td>";
                                    echo "<td><input type='text' disabled name='lname' placeholder='Rut' value='".$row['Rut']."'></td>";
                                    echo "<td><input type='text' disabled name='lname' placeholder='Fecha Nacimiento' value='".$row['F_nacimiento']."'></td>";
                                    echo "<td><input type='text' disabled name='lname' placeholder='Telefono' value='".$row['Fono']."'></td>";	
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td><input type='text' disabled name='lname' placeholder='Estudios' value='".$row['Estudios']."'></td>";
                                    echo "<td></td>";
                                    echo "<td><input type='text' disabled name='lname' placeholder='Ocupacion' value='".$row['Ocupacion']."'></td>";
                                    echo "<td><input type='text' disabled name='lname' placeholder='Vive con el Alumno' value='".$row['Vive_c_alu']."'></td>";					
                                echo "</tr>";
                            }
                        }
                        ?>
					</table>
					<br/>
				</form>
			</div>
		</div>