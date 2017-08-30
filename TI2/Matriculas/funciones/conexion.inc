<?php
define('DB_SERVER',"localhost");
define('DB_NAME',"matriculas_db");
define('DB_USER',"root");
define('DB_PASS',"wii360");
$dbconn= mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
mysqli_set_charset($dbconn,'utf8');
if(!$dbconn){
    echo "Error de conexión N° ".mysqli_connect_errno()."<br />";
    echo mysqli_connect_error();   
    exit;
}

?>