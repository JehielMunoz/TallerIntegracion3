<body>
	<div id="top-header">
		<h1>Bienvenido</h1>
		<div >
            <form action="./php/desconexion.php" method="post">
                <input type="submit" id="user-status" name="Desconectar" formmethod="post" Value="Cerrar Sesión">
            </form>
		</div>
	</div>
	<div class="menudiv">
		<a href="index.php">Matriculas</a>
		<a href="#">Zona de apoderados</a>
		<a href="./html/tabs/Agregar_alumno.php">Agregar Alumno</a>
		<a href="./html/tabs/Eliminar_alumno.php">Eliminar Alumno</a>
	</div>
	<div id="tabs" class="barradiv">
	
			<ul>
				<li class="button"><a id="tab-1" href="#tabs-1">Datos alumno</a></li>
				<li class="button"><a id="tab-2" href="#tabs-2">Apoderado</a></li> 
				<li class="button"><a id="tab-3" href="#tabs-3">Antecedentes Familiares</a></li>
				<li class="button"><a id="tab-4" href="#tabs-4">Salud Alumno</a></li> 
				<li class="button"><a id="tab-5" href="#tabs-5">Vista previa</a></li>
			</ul>
<?php 
    include('./html/tabs/Datos_alumno.php');
    include('./html/tabs/Apoderado_alumno.php');
    include('./html/tabs/Antecedentes_Familiares_alumno.php');
    include('./html/tabs/Salud_alumno.php');
    include('./html/tabs/Vista_previa.php');
    echo "\n </div>";
    
?>