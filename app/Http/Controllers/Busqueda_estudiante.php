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
                $Rut = request('Rut_Estudiante'); // Y Rut Del Alumno
                
                // Objeto Alumno
                $Alumno = new \stdClass();
                
                // Lo buscamos en la base de datos
                
                
                $Alumno->Datos = DB::table('tAlumnos')->where('Rut', '=',$Rut)->get()[0];
                
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
            
            $alu_rut = request('rut');
            
            $alumno = DB::table('tAlumnos')->where('Rut', '=',$alu_rut)->get();
            
            if ($alumno->isEmpty()){
                
                $alu_nombre =  request('nombre');
                $alu_f_nacimiento = request('f_nacimiento');
                $alu_f_ingreso = date('Y-m-d'); 
                $alu_direccion = request('direccion');
                $alu_comuna = request('comuna');
                $alu_curso = request('curso');
                $alu_curso_ant = request('curso_anterior');
                $alu_est_anterior = request('est_anterior');
                //$alu_repitente = request('');
                //$alu_cursos_repetidos = request('');
                //$alu_ingles = request('');
                //$alu_activo = request('');

                $apo_rut = request('ap_rut');
                $apo_nombre = request('ap_nombre');
                $apo_email = request('ap_email');
                $apo_fono = request('ap_fono');
                $rel_apo_alu = request('rel_apo_alu');
                //$apo_activo = request('');

                $pa_rut = request('pa_rut');
                $pa_nombre = request('pa_nombre');
                $pa_f_nacimiento = request('pa_f_nacimiento');
                $pa_fono = request('pa_fono');
                $pa_email = request('pa_email');
                $pa_vive = request('pa_vive');
                $pa_estudios = request('pa_estudios');
                $pa_ocupacion = request('pa_ocupacion');
                
                $ma_rut = request('ma_rut');
                $ma_nombre = request('ma_nombre');
                $ma_f_nacimiento = request('ma_f_nacimiento');
                $ma_fono = request('ma_fono');
                $ma_email = request('ma_email');
                $ma_vive = request('ma_vive');
                $ma_estudios = request('ma_estudios');
                $ma_ocupacion = request('ma_ocupacion');

                $he_nombre = request('he_nombre');
                $he_f_nacimiento = request('he_f_nacimiento');
                $he_ocupacion = request('he_ocupacion');
                $he_direccion = request('he_direccion');

                

                //$salud_baler = request('');
                //$salud_bsalu = request('');
                $salud_alergia = request('salud_alergia');
                $salud_otro = request('salud_otro');

                DB::table('tAlumnos')->insert(
                    ['Rut' => $alu_rut, 
                     'Nombre' => $alu_nombre, 
                     'F_nacimiento' => $alu_f_nacimiento,
                     'F_ingreso' => $alu_f_ingreso,
                     'Direccion' => $alu_direccion, 
                     'Comuna' => $alu_comuna, 
                     'Curso' => $alu_curso, 
                     'Curso_anterior' => $alu_curso_ant, 
                     'Establecimiento_ant' => $alu_est_anterior, 
                     'Repitente' => false, 
                     'Ingles' => false, 
                     'Activo' => true
                    ]
                );

                DB::table('tApoderados')->insert(
                    ['Rut' => $apo_rut, 
                     'Nombre' => $apo_nombre, 
                     'Email' => $apo_email, 
                     'Fono' => $apo_fono, 
                     'Activo' => true
                    ]
                );
   
                DB::table('tPadres')->insert([
                    ['Rut' => $pa_rut, 
                     'Nombre' => $pa_nombre, 
                     'F_nacimiento' => $pa_f_nacimiento, 
                     'Fono' => $pa_fono,
                     'Email' => $pa_email,
                     'Vive_c_alu' => $pa_vive,
                     'Estudios' => $pa_estudios,
                     'Ocupacion' => $pa_ocupacion
                    ],
                    ['Rut' => $ma_rut, 
                     'Nombre' => $ma_nombre, 
                     'F_nacimiento' => $ma_f_nacimiento, 
                     'Fono' => $ma_fono,
                     'Email' => $ma_email,
                     'Vive_c_alu' => $ma_vive,
                     'Estudios' => $ma_estudios,
                     'Ocupacion' => $ma_ocupacion
                    ]
                ]);
      
                for($i = 0; $i < count($he_nombre); ++$i){
                    DB::table('tHermanos')->insert(
                        ['Nombre' => $he_nombre[$i], 
                         'F_nacimiento' => $he_f_nacimiento[$i], 
                         'Ocupacion' => $he_ocupacion[$i], 
                         'Direccion' => $he_direccion[$i]
                        ]
                    );
                    
                    $he_id = DB::table('tHermanos')->select('id_Hermano')->where('Nombre', '=',$he_nombre[$i])->get()[0];
                    
                    DB::table('rel_tAlumnos_tHermanos')->insert(
                        ['id_Hermano' => $he_id->id_Hermano, 
                         'Rut' => $alu_rut
                        ]
                    );
                }

                DB::table('tSalud')->insert(
                    ['Rut' => $alu_rut, 
                     'Alergia' => true, 
                     'p_Salud' => true, 
                     'Antc_Alergia' => $salud_alergia, 
                     'Antc_Salud' => $salud_otro 
                    ]
                );

                DB::table('rel_tAlumnos_tApoderados')->insert(
                    ['Rut_apo' => $apo_rut, 
                     'Rut_alu' => $alu_rut, 
                     'Relacion' => $rel_apo_alu
                    ]
                );
  
                DB::table('rel_tAlumnos_tPadres')->insert(
                    ['Rut_padre' => $pa_rut, 
                     'Rut_alu' => $alu_rut, 
                     'Parentesco' => 'Padre'
                    ]
                );
                
                DB::table('rel_tAlumnos_tPadres')->insert(
                    ['Rut_padre' => $ma_rut, 
                     'Rut_alu' => $alu_rut, 
                     'Parentesco' => 'Madre'
                    ]
                );

                return back()->with('succ',"Se agrego con exito al alumno");    
                
            }else{
                return back()->with('Error',"Ya hay un alumno con ese rut registrado");  
            }
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
                    <table class="table table-striped table-bordered table-condensed ">
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
                    </table>
                ';
            }
            
            echo '
            <table class="table table-striped table-bordered table-condensed ">
                <tr>
                    <th colspan="2">Hermanos</th>
                </tr>
            </table>
            ';
            
            foreach($Hermanos as $Hermano){
                echo'
                    <table class="table table-striped table-bordered table-condensed ">
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
                    </table>
                    
                ';
            }
            
        }else{
             echo "Error mistico de la vida(No deberias acceder esta pagina de esta manera (?) ";
        }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}


