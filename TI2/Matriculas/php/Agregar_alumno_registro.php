<?php
require "./conex.php";
require "./funciones.php";
if(empty($_SESSION))
{
    session_start();
}
$sql_registro_alumno = "INSERT INTO matriculas_db.talumno 
(Rut, Nombre, F_nacimiento, F_ingreso, Direccion, Comuna, Curso, Curso_anterior, Establecimiento_ant, Activo, Repitente, Ingles, Estado, Repitio) 
VALUES 
('".$_POST['r_rut_alumno']."', '".$_POST['r_nombre_alumno']."', '".$_POST['r_fecha_nacimiento_alumno']."', '".$_POST['r_fecha_ingreso_alumno']."','".$_POST['r_domicilio_alumno']."', '".$_POST['r_comuna_alumno']."', '".$_POST['r_curso_actual_alumno']."','".$_POST['r_curso_anterior_alumno']."', '".$_POST['r_Establecimiento_alumno']."', 1,".(int)$_POST['r_repitente_alumno'].",".(int)$_POST['r_ingles_alumno'].", 'Neutral',".(int)$_POST['r_repitio_alumno'].")";

$sql_registro_padres = "INSERT INTO matriculas_db.tpadres 
(Rut, Nombre, F_nacimiento, Fono, Email, Vive_c_alu, Estudios, Ocupacion) 
VALUES 
('".$_POST['r_rut_madre']."', '".$_POST['r_nombre_madre']."', '".$_POST['r_fecha_nacimiento_madre']."', '".$_POST['r_fono_madre']."', '".$_POST['r_email_madre']."', ".(int)$_POST['r_viveconalumno_madre'].",'".$_POST['r_estudios_madre']."', '".$_POST['r_ocupacion_madre']."'),('".$_POST['r_rut_padre']."', '".$_POST['r_nombre_padre']."', '".$_POST['r_fecha_nacimiento_padre']."', '".$_POST['r_fono_padre']."', '".$_POST['r_email_padre']."', ".(int)$_POST['r_viveconalumno_padre'].",'".$_POST['r_estudio_padre']."', '".$_POST['r_ocupacion_padre']."')";

$sql_registro_rel_padres= "INSERT INTO matriculas_db.rel_talumno_tpadres 
(Rut_alu, Rut_padre, Parentesco) 
VALUES 
('".$_POST['r_rut_alumno']."', '".$_POST['r_rut_madre']."', 'Madre'),('".$_POST['r_rut_alumno']."', '".$_POST['r_rut_padre']."', 'Padre')";

$sql_registro_salud = "INSERT INTO matricula_db.tsalud
(Rut, Fono, Email, Alergia, p_Salud, Antc_Alergia, Antc_Salud) 
VALUES 
('".$_POST['r_rut_apoderado']."', '".$_POST['r_numero_accidente']."', '".$_POST['r_email_accidente']."', ".(int)$_POST['r_alergia_accidente'].",".(int)$_POST['r_problemassalud_accidente'].", '".$_POST['r_descripcion_alergia_accidente']."', '".$_POST['r_problemassalud_accidente']."')";
    
$sql_registro_apoderado = "INSERT INTO matriculas_db.tapoderado 
(Rut, Nombre, Email, Fono, Activo) 
VALUES 
('".$_POST['r_rut_apoderado']."','".$_POST['r_nombre_apoderado']."','".$_POST['r_email_apoderado']."', '".$_POST['r_fono_apoderado']."', 1)";

$sql_registro_rel_apoderado = "INSERT INTO matriculas_db.rel_talumno_tapoderado 
(Rut_apo, Rut_alu, Relacion)
VALUES
('".$_POST['r_nombre_apoderado']."', '".$_POST['r_rut_alumno']."', '".$_POST['r_relacion_alumno_apoderado']."')";

$Registro_alumno = mysqli_query($dbconn, $sql_registro_alumno);
if($Registro_alumno!=false)
{

    $Registro_padres = mysqli_query($dbconn,$sql_registro_alumno); 
    if($Registro_padres){
        $Registro_rel_padres = mysqli_query($dbconn,$sql_registro_rel_padres);    
    }
    else{
        echo "error en registro padres";
        exit(0);
    }
    $Registro_salud = mysqli_query($dbconn,$sql_registro_salud);
    $sql_registro_apoderado = mysqli_query($dbconn,$sql_registro_apoderado);
    if($sql_registro_apoderado){
        $Registro_rel_apoderado = mysqli_query($dbconn,$sql_registro_rel_apoderado);
    }
    else{
        echo "error en registro apoderado";
        exit(0);
    }

    header('location: ../index.php');  

}

else
{
    if(!$Registro_alumno){
        
        echo "falla en al agregar un alumno";
        exit(0);
    }
    
    $_SESSION["Error_Registro"] = true;
    header('location: ../html/tabs/Agregar_alumno.php');  
    
}


?>
