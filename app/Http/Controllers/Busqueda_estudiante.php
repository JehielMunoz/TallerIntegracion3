<?php
namespace App\Http\Controllers;
header('content-type: application/json; charset=utf-8');

use Illuminate\Http\Request;
use DB;
use Log;
class Busqueda_estudiante extends Controller
{
    public function Autocompletar()
    {
            $Nombre = request('Nombre_Estudiante');
            $resultado = DB::table('tAlumnos')->where('Nombre', 'ILIKE','%' . $Nombre . '%')->get(['Rut','Nombre']); // Tal vez limitar resultado o caracteres minimos idk 
            $rut_t=$resultado[0];
            return response()->json($resultado);
    }

    public function CargarAlumno(){
        if(request()->isMethod('post')){
            if(request()->filled('Nombre_Estudiante')){
                $Nombre =  request('Nombre_Estudiante'); //Capturamos el nombre 
                //$Rut = request('Rut_Estudiante'); // Y Rut Del Alumno
                // Objeto Alumno
                $Alumno = new \stdClass();
                
                // Lo buscamos en la base de datos
                
                
                $Alumno->Datos = DB::table('tAlumnos')->where('Nombre', '=',$Nombre)->get()[0];
                $Rut=$Alumno->Datos->Rut;
                $datosapoderado = DB::table('tApoderados')
                    ->join('rel_tAlumnos_tApoderados','tApoderados.Rut', '=', 'rel_tAlumnos_tApoderados.Rut_apo')
                    ->join('tAlumnos', 'rel_tAlumnos_tApoderados.Rut_alu', '=', 'tAlumnos.Rut')
                    ->where('tAlumnos.Rut','=', $Rut)
                    ->select('tApoderados.Rut','tApoderados.Nombre','tApoderados.Email','tApoderados.Fono','rel_tAlumnos_tApoderados.Relacion')
                    ->get()[0];
                
                $Alumno->Apoderado = $datosapoderado;
                    
                $Alumno->Salud = DB::table('tSalud')->where('Rut', '=',$Rut)->get()[0];
                request()->session()->put('Alumno',$Alumno);
                return back();

            }else{
                session()->forget('Alumno');
                return back()->with('Error',"No se pudo encontrar Alumno.");
                
            }
        }
    }
    
    public function agregar_alumno(){
        if(request()->isMethod('post')){
            $nombre =  request('nombre');
        }
    }
    
    public static function Si_No($bDato){
        if($bDato){
            echo "Si";
        }else{
            echo "No";
        }
    }
    
    public static function Datos_familiares(){

        if(session()->has('Alumno')){
            $Rut = session('Alumno')->Datos->Rut;
            
            $Padres = DB::table('tPadres')
                    ->join('rel_tAlumnos_tPadres','tPadres.Rut', '=', 'rel_tAlumnos_tPadres.Rut_padre')
                    ->join('tAlumnos', 'rel_tAlumnos_tPadres.Rut_alu', '=', 'tAlumnos.Rut')
                    ->where('tAlumnos.Rut','=', $Rut)
                    ->select('tPadres.Rut','tPadres.Nombre','tPadres.F_nacimiento','tPadres.Fono','tPadres.Email','tPadres.Vive_c_alu','tPadres.Estudios','tPadres.Ocupacion','rel_tAlumnos_tPadres.Parentesco')
                    ->get();
            
            $Hermanos = DB::table('tHermanos')
                    ->join('rel_tAlumnos_tHermanos','tHermanos.id_Hermano', '=', 'rel_tAlumnos_tHermanos.id_Hermano')
                    ->join('tAlumnos', 'rel_tAlumnos_tHermanos.Rut', '=', 'tAlumnos.Rut')
                    ->where('tAlumnos.Rut','=', $Rut)
                    ->select('tHermanos.Nombre','tHermanos.F_nacimiento','tHermanos.Ocupacion','tHermanos.Direccion')
                    ->get();
            
            
            foreach($Padres as $Padre){
                echo '
                    <tr>
                        <th colspan="2">',$Padre->Parentesco,'</th>
                    </tr>
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" size="65" id="Rut" name="Rut" disabled placeholder="Rut" disable
                                value="',$Padre->Rut,'"></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" size="65" id="Nombre" name="nombre" disabled placeholder="Nombre padre" disable
                                value="',$Padre->Nombre,'"></td>
                    </tr>
                    <tr>
                        <td>Fecha de nacimiento</td>
                        <td><input type="text" size="65" id="F_nacimiento" name="F_nacimiento" disabled placeholder="Fecha de nacimiento" disable
                                value="',$Padre->F_nacimiento,'"></td>
                    </tr>
                    <tr>
                        <td>Numero de telefono</td>
                        <td><input type="text" size="65" id="Fono" name="Fono" disabled placeholder="Fono" disable
                                value="',$Padre->Fono,'"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" size="65" id="Nombre" name="nombre" disabled placeholder="Nombre padre" disable
                                value="',$Padre->Email,'"></td>
                    </tr>
                    <tr>
                        <td>Vive con el alumno</td>
                        <td><input type="text" size="65" id="Nombre" name="nombre" disabled placeholder="Nombre padre" disable
                                value="',self::Si_No($Padre->Vive_c_alu),'"></td>
                    </tr>
                    <tr>
                        <td>Estudios</td>
                        <td><input type="text" size="65" id="Nombre" name="nombre" disabled placeholder="Nombre padre" disable
                                value="',$Padre->Estudios,'"></td>
                    </tr>
                    <tr>
                        <td>Ocupacion</td>
                        <td><input type="text" size="65" id="Nombre" name="nombre" disabled placeholder="Nombre padre" disable
                                value="',$Padre->Ocupacion,'"></td>
                    </tr>
                ';
            }
            
            echo "
                <tr>
                    <th colspan='2'>Hermanos</th>
                </tr>
            ";
            
            foreach($Hermanos as $Hermano){
                echo'
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" size="65" id="Rut" name="Rut" disabled placeholder="Rut" disable
                                value="',$Hermano->Nombre,'"></td>
                    </tr>
                    <tr>
                        <td>Fecha de nacimiento</td>
                        <td><input type="text" size="65" id="Rut" name="F_nacimiento" disabled placeholder="F_nacimiento" disable
                                value="',$Hermano->F_nacimiento,'"></td>
                    </tr>
                    <tr>
                        <td>Ocupacion</td>
                        <td><input type="text" size="65" id="Rut" name="Rut" disabled placeholder="Rut" disable
                                value="',$Hermano->Ocupacion,'"></td>
                    </tr>
                    <tr>
                        <td>Direccion</td>
                        <td><input type="text" size="65" id="Rut" name="Rut" disabled placeholder="Rut" disable
                                value="',$Hermano->Direccion,'"></td>
                    </tr>
                    <tr>
                        <th colspan="2"></th>
                    </tr>
                ';
            }
            
        }else{
             echo "Error mistico de la vida(No deberias acceder esta pagina de esta manera (?) ";
        }
        
    }
}


