<?php

$BaseHtml =  $_SERVER["DOCUMENT_ROOT"]."/TallerIntegracion3/resources/";
include $BaseHtml."php/funciones.php";

$_SESSION['Usuario'] = "admin";
$_SESSION['Tipo'] = "administrador";

include $BaseHtml."html/header.php";
include $BaseHtml."html/estructura.php";
include $BaseHtml."html/contenido.php";
include $BaseHtml."html/footer.php";




?>