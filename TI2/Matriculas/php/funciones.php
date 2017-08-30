<?php
if(empty($_SESSION))
{
    session_start();
}

 if (!empty($_POST["Rut"])) 
{
     $_SESSION['Rut'] =  $_POST["Rut"];
     $_SESSION['Datos'] = get_Datos();
     $_SESSION['Nombre'] = trim($_SESSION['Datos']['Nombre']," ");  
     $_SESSION['Salud'] = get_Datos_tSalud();
}

#si no inicia en 0 la informacion // LO IDEAL SERIA DESTRUIR LAS VARIABLES CUANDO DEJEMOS DE USARLAS, AKA CUANDO LAS SUBIMOS A LA BASE DE DATOS. 
    function html_llamada($archivo){
        if (file_exists('./html/'.$archivo)) {
            include('./html/'.$archivo);
        }   
        else {
            exit(1);
        }

    }
    function php_llamada($archivo){
		if (file_exists('./php/'.$archivo)) {
			include('./php/'.$archivo);
			}
		else {
			exit(1);
			}	
	}
	// llama a partes de la pagina (cabeza, cuerpo y cierre)
	function get_Header()
	{  
		html_llamada("header.php");
	}
    
    // LLama a la estructura de la pagina(todas las paginas)
    function get_Estructura() 
	{
		html_llamada("estructura.php");
	}
    // LLama a la estructura de la pagina(todas las paginas)
    function get_Contenido() 
	{
		html_llamada("contenido.php");
	}
	function get_Footer(){
		html_llamada("footer.php");		
	}	
 #
    function get_session_rut(){
        if(!empty($_SESSION['Rut']))
        {
            echo json_encode($_SESSION["Rut"]);
        }
        else
        {
            echo ('""');    
        }
    }

#------------------------------------------------------------------------------
#---------------------Devuelve datos
#_-----------------------------------------------------------------------------
    function get_F_nacimiento_alumno(){
        if(!empty($_SESSION['Datos'])){
            echo $_SESSION['Datos']['F_nacimiento'];
        }
    }
    function get_F_ingreso_alumno(){
        if(!empty($_SESSION['Datos'])){
            echo $_SESSION['Datos']['F_ingreso'];
        }
    }
    function get_Direccion_alumno(){
        if(!empty($_SESSION['Datos'])){
            echo $_SESSION['Datos']['Direccion'];
        }
    }
    function get_Comuna_alumno(){
        if(!empty($_SESSION['Datos'])){
            echo $_SESSION['Datos']['Comuna'];
        }
    }
    function get_Curso_alumno(){
        if(!empty($_SESSION['Datos'])){
            echo $_SESSION['Datos']['Curso'];
        }
    }
    function get_Curso_anterior_alumno(){
        if(!empty($_SESSION['Datos'])){
            echo $_SESSION['Datos']['Curso_anterior'];
        }
    }
    function get_Establecimiento_ant_alumno(){
        if(!empty($_SESSION['Datos'])){
            echo $_SESSION['Datos']['Establecimiento_ant'];
        }
    }
    function get_Activo_alumno(){
        if(!empty($_SESSION['Datos'])){
            echo $_SESSION['Datos']['Activo'];
        }
    }
    function get_Repitente_alumno(){
        if(!empty($_SESSION['Datos'])){
            if($_SESSION['Datos']['Repitente']==0){
				echo "No.";
			}
			else{
				echo "Si.";
			};
        }
    }
    function get_Ingles_alumno(){
        if(!empty($_SESSION['Datos'])){
			if($_SESSION['Datos']['Ingles']==0){
				echo "No.";
			}
			else{
				echo "Si.";
			}
        }
    }    
    function get_Estado_alumno(){
        if(!empty($_SESSION['Datos'])){
            echo $_SESSION['Datos']['Estado'];
        }
    }
    function get_Fono_salud(){
        if(!empty($_SESSION['Salud'])){
            echo $_SESSION['Salud']['Fono'];
        }
    }
    function get_Email_salud(){
        if(!empty($_SESSION['Salud'])){
            echo $_SESSION['Salud']['Email'];
        }
    }
    function get_Alergia_salud(){
        if(!empty($_SESSION['Salud'])){
            echo $_SESSION['Salud']['Alergia'];
        }
    }
    function get_P_salud(){
        if(!empty($_SESSION['Salud'])){
            echo $_SESSION['Salud']['p_Salud'];
        }
    }
    function get_Antc_Alergia_salud(){
        if(!empty($_SESSION['Salud'])){
            echo $_SESSION['Salud']['Antc_Alergia'];
        }
    }
    function get_Antc_Salud_salud(){
        if(!empty($_SESSION['Salud'])){
            echo $_SESSION['Salud']['Antc_Salud'];
        }
    }
    
    
    
    


#-----------------------------------------------------------------------------------------------------------------------------
# funciones Para obtener la informacion de las personas
#-----------------------------------------------------------------------------------------------------------------------------
    function get_Personas(){ 
        include("conex.php");
        $query = mysqli_query($dbconn, "SELECT * FROM talumno ")or die(mysqli_error($dbconn));
        if (!$query) {
            echo "en el query.\n";
            exit;
        }
        while ($row = mysqli_fetch_assoc($query)) {
            
            $data [] = [$row["Rut"],$row["Nombre"]];   
        }
        echo json_encode($data);
    }
    function get_Datos(){
        include("conex.php");
        $query = mysqli_query($dbconn, "SELECT * FROM talumno where Rut = '".$_SESSION['Rut']."' ");
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
      
    function get_Datos_tSalud(){
        include("conex.php");
        $query = mysqli_query($dbconn, "SELECT Fono,Email,Alergia,p_Salud,Antc_Alergia,Antc_Salud FROM tsalud 
	WHERE Rut = '".$_SESSION['Rut']."' ");
        $row = mysqli_fetch_assoc($query);
        return $row;
        
    }
#---------------------------------------------------------------------------------------------------
# Funciones para mostrar los datos
#-----------------------------------------------------------------------------------------------------------------
    function Formato_Dinero($dinerint)
    {
    $string = $dinerint;
    $len = round(strlen($string)/3, 0, PHP_ROUND_HALF_DOWN);
    $contador = -3;
    for ($i=0; $i<($len);$i++)
    {
        $string = substr_replace($string,'.',$contador,0);
        $contador= $contador - 3 - 1;
    }                    // 3 por la separacion de los puntos. y 1 por el nuevo caracter que se agrega.
    
        if ($string[0]==".")
        {
            $string = substr($string,1);
        }
        
        $string = substr_replace($string,'$',0,0);
        
        return $string;        
    }
    
    function Formato_Rut($rut)
    {
        # Easy fix if the rut has less than 10 characters. strlen
        $rut = substr_replace($rut,'.',2,0);
        $rut = substr_replace($rut,'.',6,0);
        $rut = substr_replace($rut,'-',10,0);
        
        return $rut;
    }
   function Formato_Tel_Cel($telefono)
   {
        $telefono = substr_replace($telefono,' ',3,0);
        $telefono = substr_replace($telefono,' ',6,0); 
        $telefono = substr_replace($telefono,'(09) ',0,0); 
        return $telefono;
   }
    function Rut()
    {
      if (!empty($_SESSION["Rut"]))
        {
            echo Formato_Rut($_SESSION['Rut']);
        }     
    }
    function Nombre()
    {
      if (!empty($_SESSION["Nombre"]))
        {
            echo $_SESSION['Nombre'];
        }
	}
    function Fecha_de_ingreso(){
        if (!empty($_SESSION['Datos'])) 
       {      
            echo $_SESSION['Datos']["F_ingreso"];
        }
        
    }
#------------------------------------------------------------------------------------------------------------------------
# Estan funciones se tienen que  conectar a la base de datos por qué tienen que sacar informacion de otras tablas.
#------------------------------------------------------------------------------------------------------------------------
    function Mostrar_Contacto()
    {   
        
        include("conex.php");
        
        if(!empty($_POST['c_Buscar']))
        {
            $query ="";
        }
        else
        {
            $query = "";
        }
        $execQuery=mysqli_query($dbconn,$query);
        
        while($row = mysqli_fetch_assoc($execQuery))
        {
            echo "<tr>
                    <td>".Formato_Rut($row['Rut'])."</td>    
                    <td>".$row['Nombre']."</td>   
                    <td>".$row['N_telefono']."</td>    
                </tr>";
        }
        
    }
    
#-----------------------------------------------------------------------------------------------------------------------
#     conversion numeros
#-------------------------------------------------------------------------------------------------------------------

function numtoletras($xcifra)
{ 
$xarray = array(0 => "Cero",
1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE", 
"DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE", 
"VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA", 
100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
);
//
$xcifra = trim($xcifra);
$xlength = strlen($xcifra);
$xpos_punto = strpos($xcifra, ".");
$xaux_int = $xcifra;
$xdecimales = "00";
if (!($xpos_punto === false))
	{
	if ($xpos_punto == 0)
		{
		$xcifra = "0".$xcifra;
		$xpos_punto = strpos($xcifra, ".");
		}
	$xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
	$xdecimales = substr($xcifra."00", $xpos_punto + 1, 2); // obtengo los valores decimales
	}
 
$XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
$xcadena = "";
for($xz = 0; $xz < 3; $xz++)
	{
	$xaux = substr($XAUX, $xz * 6, 6);
	$xi = 0; $xlimite = 6; // inicializo el contador de centenas xi y establezco el l�mite a 6 d�gitos en la parte entera
	$xexit = true; // bandera para controlar el ciclo del While	
	while ($xexit)
		{
		if ($xi == $xlimite) // si ya lleg� al l�mite m�ximo de enteros
			{
			break; // termina el ciclo
			}
 
		$x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
		$xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dgitos)
		for ($xy = 1; $xy < 4; $xy++) // ciclo para revisar centenas, decenas y unidades, en ese orden
			{
			switch ($xy) 
				{
				case 1: // checa las centenas
					if (substr($xaux, 0, 3) < 100) // si el grupo de tres dgitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas
						{
						}
					else
						{
						$xseek = $xarray[substr($xaux, 0, 3)];
						if ($xseek)
							{
							$xsub = subfijo($xaux); 
							if (substr($xaux,0,3)==100) 
								$xcadena = " ".$xcadena." CIEN ".$xsub;
							else
								$xcadena = " ".$xcadena." ".$xseek." ".$xsub;
							$xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
							}
						else 
							{
							$xseek = $xarray[substr($xaux, 0, 1) * 100]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
							$xcadena = " ".$xcadena." ".$xseek;
							} // ENDIF ($xseek)
						} // ENDIF (substr($xaux, 0, 3) < 100)
					break;
				case 2: // checa las decenas (con la misma lgica que las centenas)
					if (substr($xaux, 1, 2) < 10){
                        
                    }
					else
						{
						$xseek = $xarray[substr($xaux, 1, 2)];
						if ($xseek)
							{
							$xsub = subfijo($xaux);
							if (substr($xaux, 1, 2) == 20){
								$xcadena = " ".$xcadena." VEINTE ".$xsub;
                                }
							else{
								$xcadena = " ".$xcadena." ".$xseek." ".$xsub;
                                }
							$xy = 3;
							}
						else
							{
							$xseek = $xarray[substr($xaux, 1, 1) * 10];
							if (substr($xaux, 1, 1) * 10 == 20)
								$xcadena = " ".$xcadena." ".$xseek;
							else	
								$xcadena = " ".$xcadena." ".$xseek." Y ";
							} // ENDIF ($xseek)
						} // ENDIF (substr($xaux, 1, 2) < 10)
					break;
				case 3: // checa las unidades
					if (substr($xaux, 2, 1) < 1) // si la unidad es cero, ya no hace nada
						{
						}
					else
						{
						$xseek = $xarray[substr($xaux, 2, 1)]; // obtengo directamente el valor de la unidad (del uno al nueve)
						$xsub = subfijo($xaux);
						$xcadena = " ".$xcadena." ".$xseek." ".$xsub;
						} // ENDIF (substr($xaux, 2, 1) < 1)
					break;
				} // END SWITCH
			} // END FOR
			$xi = $xi + 3;
		} // ENDDO
 
		if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
			$xcadena.= " DE";
 
		if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
			$xcadena.= " DE";
 
		// ----------- esta l�nea la puedes cambiar de acuerdo a tus necesidades o a tu pa�s -------
		if (trim($xaux) != "")
			{
			switch ($xz)
				{
				case 0:
					if (trim(substr($XAUX, $xz * 6, 6)) == "1")
						$xcadena.= "UN BILLON ";
					else
						$xcadena.= " BILLONES ";
					break;
				case 1:
					if (trim(substr($XAUX, $xz * 6, 6)) == "1")
						$xcadena.= "UN MILLON ";
					else
						$xcadena.= " MILLONES ";
					break;
				case 2:
					if ($xcifra < 1 )
						{
						$xcadena = "CERO PESOS ";
						}
					if ($xcifra >= 1 && $xcifra < 2)
						{
						$xcadena = "UN PESO ";
						}
					if ($xcifra >= 2)
						{
						$xcadena.= " PESOS "; // 
						}
					break;
				} // endswitch ($xz)
			} // ENDIF (trim($xaux) != "")
		// ------------------      en este caso, para M�xico se usa esta leyenda     ----------------
		$xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
		$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles 
		$xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
		$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles 
		$xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
		$xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
		$xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
	} // ENDFOR	($xz)
	return trim($xcadena);
} // END FUNCTION
 
 
function subfijo($xx)
	{ // esta funci�n regresa un subfijo para la cifra
	$xx = trim($xx);
	$xstrlen = strlen($xx);
	if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
		$xsub = "";
	//	
	if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
		$xsub = "MIL";
	//
	return $xsub;
	} 

?>
