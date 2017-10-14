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
            if(request()->filled('Rut_Personal')){
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
                
                echo "<form action='".route('BorrarDato')."' method='get'>";
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
            
            echo "<td><input id='Monto' name=\"Monto\" type=\"number\" min='0' placeholder='Ingresar monto'></input></td>";
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
    public static function printDescuentosUsuario(){
        $Descuentos = session('Empleado')->Descuentos;
        $IdD_Usuario= [];
        foreach($Descuentos as $Descuento){
            echo "<tr>";
            echo "<td>$Descuento->Descuento</td>";
            echo "<td><input type=\"text\" disabled  name=\"Mutual\" placeholder=$Descuento->Monto></td>";
            echo "</tr>";
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
            echo "<tr>";
            echo "<td>$Descuento->Descuento</td>";
            if($Descuento->Tipo=='legal'){
                echo "<td>Legal</td>";
            }else{
                echo "<td>Varios</td>";
            }
            echo "<td><input id='Descuento".$Descuento->id_Descuento."' type=\"number\" min='0' placeholder='Ingresar monto' ></input></td>";
            echo "<td></td>";  // Agregar funcionalidad para agregar Gratificaciones; 
            echo "</tr>";
        }
    }

    //Modificar Datos del empleado
    public static function BorrarDato(){  // Gratificacion y descuento maybe
        if(request()->isMethod('get')){
            if(request()->filled('id_Borrar') && request()->filled('id_Gratificacion')){
                // Variables usadas en general
                $Rut =  session('Empleado')->Datos->Rut;

                if(request('id_Borrar')==1){
                    DB::table('rel_tEmpleados_tBonos')->where([
                       ['id_Bono','=',request('id_Gratificacion')],
                       ['Rut','=',$Rut] 
                    ])->delete();
                    self::CargarGratificaciones(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                    return back();
                }

            }
            else{
                echo "kill your self"; // retroceder y mostrar error, revisar buscar empleado para darle formato al error
            }
        }
    }

    public static function AgregarDatoGratificacion(){
        if(request()->isMethod('get')){
            if(request()->filled('id_Agregar')){
                // Variables usadas en general
                $Rut =  session('Empleado')->Datos->Rut;
                // id_Agregar == 1 = agregar gratificacion
                // id_Agregar == 2 = crear Gratificacion 

                if(request('id_Agregar')==1){
                    if(request()->filled('Monto') && request()->filled('id_Gratificacion') ){ // si el monto existe inserta la gratificacion 
                        DB::table('rel_tEmpleados_tBonos')->insert(
                            ['Rut'=>$Rut,'id_Bono'=>request('id_Gratificacion'),'Monto'=>request('Monto')]
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

            }
            else{
                echo "kill your self"; // retroceder y mostrar error, revisar buscar empleado para darle formato al error
            }
        }
        
    }
}





