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
            <a href="Elimininar_alumno.php">Eliminar Alumno</a>
        </div>
        <div id="tabs" class="barradiv">
            <ul>
                <li class="button" id="tab-1" ><a href="#tabs-1">Planilla</a></li>
            </ul>
            <div id="tabs-1">
                <div class="divplanilla">
                <form>
                    <table> 
                        <thead>Eliminacion de alumno</thead>
                        <tr><td>Rut alumno</td><td>Nombre</td><td>Curso</td><td></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="rut"></td>
                            <td><input type="text" name="nombre"></td>
                            <td><input type="text" name="curso"></td>
                            <td><button>Eliminar</button></td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
        </div>
	</body>
</html>