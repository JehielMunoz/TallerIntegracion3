<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Busqueda_personal extends Controller
{
    //Autocompletar
    public function Autocompletar()
    {
            $Nombre = request('Nombre_Personal');
            $resultado = DB::table('tEmpleados')->where('Nombre', 'ILIKE','%' . $Nombre . '%')->get(['Rut','Nombre']); // Tal vez limitar resultado o caracteres minimos idk 
            return response()->json($resultado);
    }

    //Cargar Datos del empleado
    public static function CargarEmpleado(){
        if(request()->isMethod('post')){
            if(request()->filled('Rut_Personal')){ //add &&session('Empleado')->Datos->Rut when 
                $Nombre =  request('Nombre_Personal'); //Capturamos el nombre 
                $Rut = request('Rut_Personal'); // Y Rut Del empleado
                
                // Objeto empleado
                $Empleado = new \stdClass();
                
                // Lo buscamos en la base de datos
                $Empleado->Datos = DB::table('tEmpleados')->where('Rut', '=',$Rut)->get()[0];
                
                // Buscamos sus datos de AFP y los agregamos al objeto Empleado
                $Empleado->Afp=DB::table('tAFP')->where('id_AFP', '=',$Empleado->Datos->id_AFP)->get()[0];
                
                // Buscamos sus datos de Fonasa y los agregamos al objeto Empleado
                $Empleado->Isapre=DB::table('tISAPRE')->where('id_ISAPRE', '=',$Empleado->Datos->id_ISAPRE)->get()[0];
                
                // Buscamos sus contrato y los agregamos al objeto Empleado
                $Empleado->Contrato=DB::table('tContratos')->where('id_Contrato', '=',$Empleado->Datos->id_Contrato)->get()[0];
                
                //Agregar todo lo que calcula el sueldo & stuff
                /*$rEmpleado= request()->session()->get('Empleado');
                */
               
                request()->session()->put('Empleado',$Empleado);
                return back();

            }else{
                session()->forget('Empleado');
                return back()->with('Error',"No se pudo encontrar Empleado :^)");
                
            }
        }else{
            $Nombre = session('Empleado')->Datos->Nombre;
            $Rut = session('Empleado')->Datos->Rut;

            // Objeto empleado
            $Empleado = new \stdClass();
            
            // Lo buscamos en la base de datos
            $Empleado->Datos = DB::table('tEmpleados')->where('Rut', '=',$Rut)->get()[0];
            
            // Buscamos sus datos de AFP y los agregamos al objeto Empleado
            $Empleado->Afp=DB::table('tAFP')->where('id_AFP', '=',$Empleado->Datos->id_AFP)->get()[0];
            
            // Buscamos sus datos de Fonasa y los agregamos al objeto Empleado
            $Empleado->Isapre=DB::table('tISAPRE')->where('id_ISAPRE', '=',$Empleado->Datos->id_ISAPRE)->get()[0];
            
            // Buscamos sus contrato y los agregamos al objeto Empleado
            $Empleado->Contrato=DB::table('tContratos')->where('id_Contrato', '=',$Empleado->Datos->id_Contrato)->get()[0];
            
            //Agregar todo lo que calcula el sueldo & stuff
            /*$rEmpleado= request()->session()->get('Empleado');
            */
           
            request()->session()->put('Empleado',$Empleado);
            return back();

        }
    }

    public static function CargarGratificaciones(){
        /*      SELECT \"tEmpleados\".\"Rut\", \"tBonos\".\"Bono\", \"tBonos\".\"Activo\", \"tBonos\".\"id_Bono\", \"tBonos\".\"Imponible\",\"rel_tEmpleados_tBonos\".\"Monto\"
        FROM \"tBonos\"
        JOIN \"rel_tEmpleados_tBonos\" ON \"tBonos\".\"id_Bono\" = \"rel_tEmpleados_tBonos\".\"id_Bono\"
        JOIN \"tEmpleados\" ON \"rel_tEmpleados_tBonos\".\"Rut\" = \"tEmpleados\".\"Rut\" WHERE \"tEmpleados\".\"Rut\" = '$rut'::bpchar;";
        */
        $Rut = session('Empleado')->Datos->Rut;
            $GratificacionesUsuario= DB::table('tBonos')
            ->join('rel_tEmpleados_tBonos','tBonos.id_Bono', '=', 'rel_tEmpleados_tBonos.id_Bono')
            ->join('tEmpleados', 'rel_tEmpleados_tBonos.Rut', '=', 'tEmpleados.Rut')
            ->where('tEmpleados.Rut','=', $Rut)
            ->select('tBonos.Bono','tBonos.Activo','tBonos.id_Bono','tBonos.Imponible','rel_tEmpleados_tBonos.Monto')
            ->get();
            session('Empleado')->Gratificaciones= $GratificacionesUsuario;
    }

    public static function printGratificacionesUsuario(){
        if(session()->has('Empleado')){
            $IdG_Usuario= [];
            $GratificacionesUsuario = session('Empleado')->Gratificaciones;
            foreach($GratificacionesUsuario as $Gratificacion){
                
                echo "<form action='".route('BorrarDatos')."' method='get'>\n";
                echo "<input hidden id=\"id_Gratificacion\" name=\"id_Gratificacion\" value=$Gratificacion->id_Bono>\n";
                echo "<input hidden id=\"id_Borrar\" name=\"id_Borrar\" value=\"1\">\n";
                
                echo "<tr>\n";
                echo "<td>$Gratificacion->Bono</td>\n";
                echo "<td><input type=\"text\" disabled  placeholder=".$Gratificacion->Monto." ></td>\n";
                if($Gratificacion->Imponible=='t'){
                    echo"<td>Imponible</td>\n";                    
                }else{
                    echo"<td>No Imponible</td>\n";
                }

                echo "<td><input type=\"submit\" value=\"\"></td>\n"; // Boton para borrar, implementarlo 
                echo "</form>\n";
                
                echo "</tr>\n";
                array_push($IdG_Usuario,$Gratificacion->id_Bono);
            }
            session('Empleado')->GratificacionesId = $IdG_Usuario;
        }else{
             echo "Error mistico de la vida(No deberias acceder esta pagina de esta manera (?) ";
        }
    }

    public static function printGratificaciones(){
        /* "SELECT * 
            FROM public.\"tBonos\" 
            WHERE \"tBonos\".\"id_Bono\"  NOT IN 
            (SELECT \"tBonos\".\"id_Bono\" FROM public.\"rel_tEmpleados_tBonos\", public.\"tEmpleados\", public.\"tBonos\" WHERE \"tEmpleados\".\"Rut\" = \"rel_tEmpleados_tBonos\".\"Rut\" AND \"tBonos\".\"id_Bono\" = \"rel_tEmpleados_tBonos\".\"id_Bono\" AND \"tEmpleados\".\"Rut\" = '$rut');";
            */
        $Gratificaciones= DB::table('tBonos')
        ->whereNotIn('tBonos.id_Bono',session('Empleado')->GratificacionesId)->get();

        foreach($Gratificaciones as $Gratificacion){
            echo "<tr>\n";
            echo "<td>$Gratificacion->Bono</td>\n";
            if($Gratificacion->Imponible=='t'){
                echo "<td>Imponible</td>\n";
            }else{
                echo "<td>No imponible</td>\n";
            }
            echo "<form action='".route('AgregarDato')."' method='get'>\n";
            echo "<input hidden id=\"id_Gratificacion\" name=\"id_Gratificacion\" value=$Gratificacion->id_Bono>\n";
            echo "<input hidden id=\"id_Agregar\" name=\"id_Agregar\" value=\"1\">\n";
            
            echo "<td><input id='MontoGratificacion' name=\"MontoGratificacion\" type=\"number\" min='0' placeholder='Ingresar monto'></input></td>\n";
            echo "<td><input type=\"submit\" value=\"\"></td>\n"; // Boton para borrar, implementarlo 
            echo "</form>\n";
            echo "</tr>\n";
        }
    }   

    public static function CargarDescuentos(){
        /* SELECT * 
        FROM \"rel_tEmpleados_tDescuentos\"
         JOIN \"tEmpleados\" ON \"rel_tEmpleados_tDescuentos\".\"Rut\" = \"tEmpleados\".\"Rut\" 
         JOIN \"tDescuentos\" ON \"rel_tEmpleados_tDescuentos\".\"id_Descuento\" = \"tDescuentos\".\"id_Descuento\"
         WHERE \"tEmpleados\".\"Rut\" = '$rut'::bpchar;
         */
        $Rut = session('Empleado')->Datos->Rut; 
        $Descuentos= DB::table('rel_tEmpleados_tDescuentos')
        ->join('tEmpleados','rel_tEmpleados_tDescuentos.Rut', '=','tEmpleados.Rut')
        ->join('tDescuentos', 'rel_tEmpleados_tDescuentos.id_Descuento', '=', 'tDescuentos.id_Descuento')
        ->where('tEmpleados.Rut','=', $Rut)
        ->get();
        session('Empleado')->Descuentos= $Descuentos;
    
    }
    public static function CargarPrestamos(){
        $Rut = session('Empleado')->Datos->Rut; 
        $Prestamos = DB::table('tPrestamos')->where('tPrestamos.Rut','=',$Rut)->get();
        session('Empleado')->Prestamos= $Prestamos;
    }

    public static function printDescuentosUsuario(){
        $Descuentos = session('Empleado')->Descuentos;
        $IdD_Usuario= [];
        foreach($Descuentos as $Descuento){
            echo "<form action='".route('BorrarDatos')."' method='get'>\n";
            echo "<input hidden id=\"id_Descuento\" name=\"id_Descuento\" value=$Descuento->id_Descuento>\n";
            echo "<input hidden id=\"id_Borrar\" name=\"id_Borrar\" value=\"2\">\n";
            
            echo "<tr>\n";
            echo "<td>$Descuento->Descuento</td>\n";
            echo "<td><input type=\"text\" disabled  name=\"Mutual\" placeholder=$Descuento->Monto></td>\n";
            echo "<td><input type=\"submit\" value=\"\"></td>\n"; // Boton para borrar, implementarlo 
            echo "</tr>\n";
            echo "</form>\n";
            array_push($IdD_Usuario,$Descuento->id_Descuento);
            
        }
        session('Empleado')->DescuentosId = $IdD_Usuario;
        
    }
    public static function printDescuentos(){
        /* SELECT *FROM public.\"tDescuentos\" 
        WHERE \"tDescuentos\".\"id_Descuento\"   NOT IN 
        (SELECT \"tDescuentos\".\"id_Descuento\" FROM public.\"tEmpleados\", public.\"rel_tEmpleados_tDescuentos\", public.\"tDescuentos\" WHERE (\"tEmpleados\".\"Rut\" = \"rel_tEmpleados_tDescuentos\".\"Rut\" AND \"tDescuentos\".\"id_Descuento\" = \"rel_tEmpleados_tDescuentos\".\"id_Descuento\") 
        AND (\"tEmpleados\".\"Rut\" = '$rut')); 
            */
        $Descuentos= DB::table('tDescuentos')
        ->whereNotIn('tDescuentos.id_Descuento',session('Empleado')->DescuentosId)->get();

        foreach($Descuentos as $Descuento){
            echo "<form action='".route('AgregarDato')."' method='get'>\n";
            echo "<input hidden id=\"id_Descuento\" name=\"id_Descuento\" value=$Descuento->id_Descuento>\n";
            echo "<input hidden id=\"id_Agregar\" name=\"id_Agregar\" value=\"3\">\n";
            
            echo "<tr>\n";
            echo "<td>$Descuento->Descuento</td>\n";
            echo "<td>$Descuento->Tipo</td>\n";

            echo "<td><input id='MontoDescuento' name=\"MontoDescuento\" type=\"number\" min='0' placeholder='Ingresar monto' ></input></td>\n";
            echo "<td><input type=\"submit\" value=\"\"></td>\n"; // Boton para borrar, implementarlo 
            echo "</tr>\n";
            echo "</form>\n";
        }
    }

    public static function printPrestamos(){
        $Prestamos = session('Empleado')->Prestamos;
        $IdP_Usuario= [];
        foreach($Prestamos as $Prestamo){
            
            echo "<form action='".route('ModificarDatos')."' method='get'>\n";
            echo "<input hidden id=\"id_Prestamo\" name=\"id_Prestamo\" value=$Prestamo->id_Prestamo>\n";
            echo "<input hidden id=\"id_Modificar\" name=\"id_Modificar\" value=\"3\">\n";
            
            echo "<tr>\n";
            echo "<td>$Prestamo->Nombre</td>\n";
            echo "<td><input type=\"text\" name=\"mPrestamo\" placeholder=$Prestamo->Monto></td>\n";
            echo "<td><input type=\"date\" class=\"entrega-dato\"  name=\"iPrestamo\" value=$Prestamo->F_inicio></td>\n";
            echo "<td><input type=\"date\" class=\"entrega-dato\"  name=\"fPrestamo\" value=$Prestamo->F_final></td>\n";
            echo "<td><input type=\"submit\" value=\"Modificar\"></td>\n"; // Boton para borrar, implementarlo 
            echo "</tr>\n";
            echo "</form>\n";
            array_push($IdP_Usuario,$Prestamo->id_Prestamo);
            
        }
        session('Empleado')->PrestamosId = $IdP_Usuario;
        

    }

    
    public static function printAFPModificar(){ #Agregar valicadion or something lika that
        $AFPs = DB::table('tAFP')->get();
        foreach($AFPs as $AFP){
            if($AFP->id_AFP==(session('Empleado')->Datos->id_AFP)){
                echo "<option selected value=$AFP->id_AFP>$AFP->AFP</option>\n";
            }else{
                echo "<option value=$AFP->id_AFP>$AFP->AFP</option>\n";
                
            }
        }
    
    }
    public static function printIPSModificar(){ #Agregar valicadion or something lika that
        $ISAPREs = DB::table('tISAPRE')->get();
        foreach($ISAPREs as $ISAPRE){
            if($ISAPRE->id_ISAPRE==(session('Empleado')->Datos->id_ISAPRE)){
                echo "<option selected value=$ISAPRE->id_ISAPRE>$ISAPRE->ISAPRE</option>\n";
            }else{
                echo "<option value=$ISAPRE->id_ISAPRE>$ISAPRE->ISAPRE</option>\n";
                
            }
        }
    
    }
    public static function printContratoModificar(){ #Agregar valicadion or something lika that
        $Contratos = DB::table('tContratos')->get();
        foreach($Contratos as $Contrato){
            if($Contrato->id_Contrato==(session('Empleado')->Datos->id_Contrato)){
                echo "<option selected value=$Contrato->id_Contrato>$Contrato->Contrato</option>\n";
            }else{
                echo "<option value=$Contrato->id_Contrato>$Contrato->Contrato</option>\n";
            }
        }
    
    }
    //Modificar Datos del empleado
    public static function BorrarDatos(){  // Descuento y descuento maybe
        if(request()->isMethod('get')){
            if(request()->filled('id_Borrar')){
                // Variables usadas en general
                $Rut =  session('Empleado')->Datos->Rut;
                // id_Borrar == 1 = borrar gratificacion
                // id_Borrar == 2 = borrar descuento

                if(request('id_Borrar')==1 && request()->filled('id_Gratificacion')){
                    DB::table('rel_tEmpleados_tBonos')->where([
                       ['id_Bono','=',request('id_Gratificacion')],
                       ['Rut','=',$Rut] 
                    ])->delete();
                    self::CargarGratificaciones(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                    return back();
                }
                if(request('id_Borrar')==2 && request()->filled('id_Descuento')){    
                    DB::table('rel_tEmpleados_tDescuentos')->where([
                       ['id_Descuento','=',request('id_Descuento')],
                       ['Rut','=',$Rut] 
                    ])->delete();
                    self::CargarDescuentos(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                    return back();
                }


            }
            else{
                echo "kill your self"; // retroceder y mostrar error, revisar buscar empleado para darle formato al error
            }
        }
    }

    public static function AgregarDatos(){
        if(request()->isMethod('get')){
            if(request()->filled('id_Agregar')){
                // Variables usadas en general
                $Rut =  session('Empleado')->Datos->Rut;
                // id_Agregar == 1 = agregar gratificacion
                // id_Agregar == 2 = crear Gratificacion 
                // id_Agregar == 3 = agregar descuento
                // id_Agregar == 4 = crear descuento
                // id_Agregar == 5 = crear/agregar prestamo w/e
                // id_Agregar == 6 = crear/agregar licencia w/e

                if(request('id_Agregar')==1){
                    if(request()->filled('MontoGratificacion') && request()->filled('id_Gratificacion') ){ // si el monto existe inserta la gratificacion 
                        DB::table('rel_tEmpleados_tBonos')->insert(
                            ['Rut'=>$Rut,'id_Bono'=>request('id_Gratificacion'),'Monto'=>request('MontoGratificacion')]
                            );                        
                    }
                    self::CargarGratificaciones(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                    return back();
                }
                if(request('id_Agregar')==2){
                    if(request()->filled('nGratificacion') && request()->filled('Tipo')){
                        if(request('Tipo')=="Imponible"){
                            DB::table('tBonos')->insert(
                                ['Bono'=>request('nGratificacion'),'Imponible'=>'t','Activo'=>'t']
                            );
                        }else{
                            DB::table('tBonos')->insert(
                                ['Bono'=>request('nGratificacion'),'Imponible'=>'f','Activo'=>'t']
                            );
                        }
                    }
                    self::CargarGratificaciones(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                    return back();    
                }
                if(request('id_Agregar')==3){                    
                    if(request()->filled('MontoDescuento') && request()->filled('id_Descuento')){ // si el monto existe inserta el descuento
                        DB::table('rel_tEmpleados_tDescuentos')->insert(
                            ['id_Descuento'=>request('id_Descuento'),'Monto'=>request('MontoDescuento'),'Rut'=>$Rut]
                            );
                    }
                    self::CargarDescuentos(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                    return back();
                }
                if(request('id_Agregar')==4){                    
                    if(request()->filled('nDescuento') && request()->filled('tDescuento')){ 
                        DB::table('tDescuentos')->insert(
                            ['Descuento'=>request('nDescuento'),'Tipo'=>request('tDescuento'),'Activo'=>'t']
                            );
                    }
                    self::CargarDescuentos(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                    return back();
                }
                if(request('id_Agregar')==5){                    
                    if(request()->filled('nCredito') && request()->filled('mCredito')&& request()->filled('iCredito')&& request()->filled('fCredito')){ 
                        DB::table('tPrestamos')->insert(
                            ['Rut'=>$Rut,'Nombre'=>request('nCredito'),'F_inicio'=>request('iCredito'),'F_final'=>request('fCredito'),'Monto'=>request('mCredito')]
                            );
                    }
                    self::CargarDescuentos(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                    return back();
                }
                if(request('id_Agregar')==6){                    
                    if(request()->filled('Motivo') && request()->filled('tLicencia')&& request()->filled('iLicencia')&& request()->filled('fLicencia')){ 
                        $Fecha_Inicio = date_create(request('iLicencia'));
                        $Fecha_Final = date_create(request('fLicencia'));
                        $Diferencia_Dias = date_diff($Fecha_Inicio,$Fecha_Final);
                       # $Diferencia_Dias->format("%a"); # Calculamos la diferencia de dias
                    
                        DB::table('tLicencias')->insert(
                            ['Rut'=>$Rut,'Descuenta'=>request('tLicencia'),'Dias'=>$Diferencia_Dias->format("%a"),'F_inicio'=>request('iLicencia'),'F_final'=>request('fLicencia'),'Motivo'=>request('Motivo')]
                            );
                    }
                    self::CargarDescuentos(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                    return back();
                }

            }
            else{
                echo "kill your self"; // retroceder y mostrar error, revisar buscar empleado para darle formato al error
            }
        }
        
    }

    public static function ModificarDatos(){
        if(request()->isMethod('get')){
            if(request()->filled('id_Modificar')){
                $Rut = session('Empleado')->Datos->Rut;
                // id_Modificar == 1 // Modificar datos empleado
                // id Modificar == 2 // Modificar descuento
                // id Modificar == 3 // Modificar prestamo
                // id Modificar == 4 // Modificar Empleado
                // id Modificar == 5 // Modificar dias licencia
                // id Modificar == 6 // Desactivar Licencia
                if(request('id_Modificar')==2){
                    if(request()->filled('mDescuento') && request()->filled('id_Descuento')){ // si el monto existe inserta el descuento
                        DB::talbe('rel_tEmpleados_tDescuentos')
                        ->where([
                            ['id_Descuento','=',request('id_Descuento')],
                            ['Rut','=',$Rut]
                        ])
                        ->update(['Monto'=>request('mDescuento')]);
                    }
                }
                if(request('id_Modificar')==3){
                    if(request()->filled('mPrestamo') && request()->filled('id_Prestamo') && request()->filled('iPrestamo') && request()->filled('fPrestamo')){
                        DB::table('tPrestamos')->where([
                            ['id_Prestamo','=',request('id_Prestamo')],
                            ['Rut','=',$Rut]
                        ])
                        ->update([
                            'F_inicio'=>request('iPrestamo'),
                            'F_final'=>request('fPrestamo'),
                            'Monto'=>request('mPrestamo')
                        ]);
                        self::CargarDescuentos(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                        return back();
                    }
                }
                if(request('id_Modificar')==4){
                    if(request()->filled('mNombre') && request()->filled('mSueldo') && request()->filled('mHTrabajo') && request()->filled('mvHora') && request()->filled('mContrato') && request()->filled('mAFP') && request()->filled('mIPS')){
                        DB::table('tEmpleados')->where([
                            ['Rut','=',$Rut]
                        ])
                        ->update([
                            'Nombre'=>request('mNombre'),
                            'Sueldo_base'=>request('mSueldo'),
                            'N_horas'=>request('mHTrabajo'),
                            'Paga_por_hora'=>request('mvHora'),
                            'id_Contrato'=>request('mContrato'),
                            'id_AFP'=>request('mAFP'),
                            'id_ISAPRE'=>request('mIPS')
                        ]);
                        self::CargarEmpleado(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                        return back();
                    }
                
                }
                if(request('id_Modificar')=='5'){
                    if(request()->filled('id_Licencia') && request()->filled('rut_Licencia') && request()->filled('Fecha_Inicio') && request()->filled('Fecha_Final')){
                        $Fecha_Inicio = date_create(request('Fecha_Inicio'));
                        $Fecha_Final = date_create(request('Fecha_Final'));
                        $Diferencia_Dias = date_diff($Fecha_Inicio,$Fecha_Final);
                        DB::table('tLicencias')->where([
                            ['Rut','=',request('rut_Licencia')],
                            ['id_Licencia','=',request('id_Licencia')]
                         ])
                        ->update([
                            'F_final'=> request('Fecha_Final'),
                            'Dias' => $Diferencia_Dias->format("%a")

                        ]);
                        
                        self::CargarEmpleado(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                        return back();
                    }
                }
                if(request('id_Modificar')==6){
                    if(request()->filled('id_Licencia') && request()->filled('rut_Licencia')){
                        DB::table('tLicencias')->where([
                            ['Rut','=',request('rut_Licencia')],
                            ['id_Licencia','=',request('id_Licencia')]
                        ])
                        ->update([
                            'Activo'=> false
                        ]);
                        self::CargarEmpleado(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                        return back();
                    }
                }
                
                

            }
        }
    }

    public static function MostrarIPS(){
        $IPS = DB::table('tISAPRE')->get();
        foreach($IPS as $Ips){
            echo "<tr>\n";
            echo "<td>$Ips->ISAPRE</td>\n";
            echo "<td>$Ips->Tasa%</td>\n";
            echo "</tr>\n";
        }   
        
    }
    public static function MostrarAFP(){
        $AFP = DB::table('tAFP')->get();
        foreach($AFP as $Afp){
            echo "<tr>\n";
            echo "<td>$Afp->AFP</td>\n";
            echo "<td>$Afp->Tasa%</td>\n";
            echo "</tr>\n";
        }   
        
    }

    public static function MostrarContacto()
    {   
        
        
        if(!empty($_POST['c_Buscar']))
        {
            $query ="Select \"tEmpleados\".\"Rut\",\"tEmpleados\".\"Nombre\", \"tEmpleado_Fono\".\"N_telefono\" 
                      From \"tEmpleados\" Inner Join \"tEmpleado_Fono\" ON \"tEmpleados\".\"Rut\" = \"tEmpleado_Fono\".\"Rut\"
                      Where \"tEmpleados\".\"Nombre\" = '".$_POST['c_Buscar']."'
                      order by \"tEmpleados\".\"Rut\"";
        }
        else
        {
            $query = "Select \"tEmpleados\".\"Rut\",\"tEmpleados\".\"Nombre\", \"tEmpleado_Fono\".\"N_telefono\" 
                      From \"tEmpleados\" Inner Join \"tEmpleado_Fono\" ON \"tEmpleados\".\"Rut\" = \"tEmpleado_Fono\".\"Rut\"
                      order by \"tEmpleados\".\"Rut\"";
        }

        if(request()->filled("c_Buscar")){
            $Nombre = request("c_Buscar");
            $Empleados= DB::table('tEmpleados')
            ->join('tEmpleado_Fono','tEmpleados.Rut', '=', 'tEmpleado_Fono.Rut')
            ->where('tEmpleados.Nombre','=', $Nombre)
            ->select('tEmpleados.Rut','tEmpleados.Nombre','tEmpleado_Fono.N_telefono')
            ->get();
        }else{
            $Empleados= DB::table('tEmpleados')
            ->join('tEmpleado_Fono','tEmpleados.Rut', '=', 'tEmpleado_Fono.Rut')
            ->select('tEmpleados.Rut','tEmpleados.Nombre','tEmpleado_Fono.N_telefono')
            ->get();
        }
    
        foreach($Empleados as $Empleado){
            echo "<tr>\n";
            echo "<td>$Empleado->Rut</td>\n";    
            echo "<td>$Empleado->Nombre</td>\n";   
            echo "<td>$Empleado->N_telefono</td>\n";
            echo "</tr>\n";
        }    
    }

    public static function MostrarLicencias(){

        $Licencias = DB::table('tLicencias')->where("Activo",'=','t')->get();
        foreach($Licencias as $Licencia){
            echo "<tr>\n";
            echo "<form method=\"get\" action=".route('ModificarDatos').">\n";
            echo "<td><input id=\"rut_Licencia\" name=\"rut_Licencia\"  readonly value=\"$Licencia->Rut\"></td>\n";
            if($Licencia->Descuenta){
                echo "<td>Si</td>\n";
            }else{
                echo "<td>No</td>\n";
            }

            echo "<input name=\"id_Licencia\" hidden type=text value=\"".$Licencia->id_Licencia."\">\n";
            echo "<input hidden id=\"id_Modificar\" name=\"id_Modificar\" value=\"5\">\n";
            echo "<td><input name=\"motivo\" type=text readonly value=\"".$Licencia->Motivo."\"></td>\n";
            echo "<td><input name=\"dias\" type=text readonly value=\"".$Licencia->Dias."\"></td>\n";
            echo "<td><input type=\"date\" name=\"Fecha_Inicio\" value=\"$Licencia->F_inicio\" readonly></td>\n";
            echo "<td><input type=\"date\" name=\"Fecha_Final\" value=\"$Licencia->F_final\"></td>\n";
            echo "<td><button type=\"submit\">Modificar Dias</button></td>\n";
            echo "</form>\n";
            #form de desactvar
            echo "<form method=\"get\" action=".route('ModificarDatos').">\n";
            echo "<input hidden id=\"rut_Licencia\" name=\"rut_Licencia\" value=\"$Licencia->Rut\">\n";            
            echo "<input hidden id=\"id_Modificar\" name=\"id_Modificar\" value=\"6\">\n";
            echo "<input name=\"id_Licencia\" hidden type=text value=\"".$Licencia->id_Licencia."\">\n";
            echo "<td><button type=\"submit\">Desactivar Licencia</button></td>\n";
            echo "</form>\n";
            echo "</tr>\n";
        }
        
        
      
}
}












