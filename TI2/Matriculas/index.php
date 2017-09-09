<?php
// inicia la session de usuario
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

function verificar_login($user,$password,&$result){
    include("./php/conex.php");
    $query = mysqli_query($dbconn, "SELECT * FROM `tusuario` WHERE `Usuario` = 'admin' and `Password` = '$password'")or die (mysqli_error($dbconn)); # crea la consulta para buscar al usuario y su contraseña
    if(!$query){
        echo "error";
        exit(0);
    }
    $count = 0;
    if(!empty($row = mysqli_fetch_object($query))) # contiene el resultado de la consulta a la base de datos
    {
        $result = $row;
        return 1;
    }
    else
    {
        return 0;    
    }
}

if(isset($_POST['crear'])){
    agregar_usuario();
}

#  realiza la verificacion de login
if (!isset($_SESSION['Usuario'])){
    if(isset($_POST['login'])){
        if(verificar_login($_POST['Usuario'],$_POST['Password'],$result) == 1)
        {
            $_SESSION['Usuario'] = $result->Usuario;
            $_SESSION['ID_Usuario'] = $result->id_Usuario;
            echo '<script language= "JavaScript">location.href="index.php" </script>';
            header("location:index.php");
                }
        else{
            $_SESSION['no_entro'] = 1;
        }
    }   
    require './php/login.php';
}
else
{
    //Requiere que cargue el archivo conexion, con la informacion de la DB, para que el resto de la pagina carge.
    // Carga las variables y las funciones
	include './php/funciones.php';
    include "./Estructura/Estructura.php";
}
?>