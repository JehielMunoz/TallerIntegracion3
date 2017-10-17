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
    public function CargarEmpleado(){
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
                
                echo "<form action='".route('BorrarDatos')."' method='get'>";
                echo "<input hidden id=\"id_Gratificacion\" name=\"id_Gratificacion\" value=$Gratificacion->id_Bono>";
                echo "<input hidden id=\"id_Borrar\" name=\"id_Borrar\" value=\"1\">";
                
                echo "<tr>";
                echo "<td>$Gratificacion->Bono</td>";
                echo "<td><input type=\"text\" disabled  placeholder=".$Gratificacion->Monto." ></td>";
                if($Gratificacion->Imponible=='t'){
                    echo"<td>Imponible</td>";                    
                }else{
                    echo"<td>No Imponible</td>";
                }

                echo "<td><input type=\"submit\" value=\"\"></td>"; // Boton para borrar, implementarlo 
                echo "</form>";
                
                echo "</tr>";
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
            echo "<tr>";
            echo "<td>$Gratificacion->Bono</td>";
            if($Gratificacion->Imponible=='t'){
                echo "<td>Imponible</td>";
            }else{
                echo "<td>No imponible</td>";
            }
            echo "<form action='".route('AgregarDato')."' method='get'>";
            echo "<input hidden id=\"id_Gratificacion\" name=\"id_Gratificacion\" value=$Gratificacion->id_Bono>";
            echo "<input hidden id=\"id_Agregar\" name=\"id_Agregar\" value=\"1\">";
            
            echo "<td><input id='MontoGratificacion' name=\"MontoGratificacion\" type=\"number\" min='0' placeholder='Ingresar monto'></input></td>";
            echo "<td><input type=\"submit\" value=\"\"></td>"; // Boton para borrar, implementarlo 
            echo "</form>";
            echo "</tr>";
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
            echo "<form action='".route('BorrarDatos')."' method='get'>";
            echo "<input hidden id=\"id_Descuento\" name=\"id_Descuento\" value=$Descuento->id_Descuento>";
            echo "<input hidden id=\"id_Borrar\" name=\"id_Borrar\" value=\"2\">";
            
            echo "<tr>";
            echo "<td>$Descuento->Descuento</td>";
            echo "<td><input type=\"text\" disabled  name=\"Mutual\" placeholder=$Descuento->Monto></td>";
            echo "<td><input type=\"submit\" value=\"\"></td>"; // Boton para borrar, implementarlo 
            echo "</tr>";
            echo "</form>";
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
            echo "<form action='".route('AgregarDato')."' method='get'>";
            echo "<input hidden id=\"id_Descuento\" name=\"id_Descuento\" value=$Descuento->id_Descuento>";
            echo "<input hidden id=\"id_Agregar\" name=\"id_Agregar\" value=\"3\">";
            
            echo "<tr>";
            echo "<td>$Descuento->Descuento</td>";
            echo "<td>$Descuento->Tipo</td>";
            
            echo "<td><input id='MontoDescuento' name=\"MontoDescuento\" type=\"number\" min='0' placeholder='Ingresar monto' ></input></td>";
            echo "<td><input type=\"submit\" value=\"\"></td>"; // Boton para borrar, implementarlo 
            echo "</tr>";
            echo "</form>";
        }
    }

    public static function printPrestamos(){
        $Prestamos = session('Empleado')->Prestamos;
        $IdP_Usuario= [];
        foreach($Prestamos as $Prestamo){
            
            echo "<form action='".route('ModificarDatos')."' method='get'>";
            echo "<input hidden id=\"id_Prestamo\" name=\"id_Prestamo\" value=$Prestamo->id_Prestamo>";
            echo "<input hidden id=\"id_Modificar\" name=\"id_Modificar\" value=\"3\">";
            
            echo "<tr>";
            echo "<td>$Prestamo->Nombre</td>";
            echo "<td><input type=\"text\" name=\"mPrestamo\" placeholder=$Prestamo->Monto></td>";
            echo "<td><input type=\"date\" class=\"entrega-dato\"  name=\"iPrestamo\" value=$Prestamo->F_inicio></td>";
            echo "<td><input type=\"date\" class=\"entrega-dato\"  name=\"fPrestamo\" value=$Prestamo->F_final></td>";
            echo "<td><input type=\"submit\" value=\"Modificar\"></td>"; // Boton para borrar, implementarlo 
            echo "</tr>";
            echo "</form>";
            array_push($IdP_Usuario,$Prestamo->id_Prestamo);
            
        }
        session('Empleado')->PrestamosId = $IdP_Usuario;
        

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
                    if(request()->filled('dLicencia') && request()->filled('tLicencia')&& request()->filled('iLicencia')&& request()->filled('fLicencia')){ 
                        DB::table('tLicencias')->insert(
                            ['Rut'=>$Rut,'Descuenta'=>request('tLicencia'),'Dias'=>request('dLicencia'),'F_inicio'=>request('iLicencia'),'F_final'=>request('fLicencia')]
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
            }
        }
    }
}












