<?php
	$host  = "localhost";
	$userd = "root";
	$passw = "";
	$based = "matriculas_db";
    $mysqli = new mysqli($host,$userd,$passw,$based);
	$dbconn = mysqli_connect($host,$userd,$passw,$based);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $mysqli->set_charset("utf8");
?>