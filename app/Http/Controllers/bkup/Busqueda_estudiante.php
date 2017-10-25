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

    
    
    
    
    public static function CargarAlumno(){
        if(request()->isMethod('post')){
            if(request()->filled('Rut_Estudiante')){
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
        }else{
            //$Nombre =  request('Nombre_Estudiante'); //Capturamos el nombre 
            $Rut = session('Alumno')->Datos->Rut; // Y Rut Del Alumno
            
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

        }
    }
    
    public static function ModificarDatos(){
        if(request()->isMethod('get')){
            if(request()->filled('id_Modificar')){
                $Rut = session('Alumno')->Datos->Rut;
                // id_Modificar == 1 // Modificar datos alumno
                if(request('id_Modificar')==1){
                    if(request()->filled('mNombre') && request()->filled('mDomicilio') && request()->filled('mComuna') && request()->filled('mCurso') && request()->filled('mCursoAnterior') && request()->filled('mEstablecimiento') && request()->filled('mRepitente') && request()->filled('mIngles')){
                        DB::table('tAlumnos')->where([
                            ['Rut','=',$Rut]
                        ])
                        ->update([
                            'Nombre'=>request('mNombre'),
                            'Direccion'=>request('mDomicilio'),
                            'Comuna'=>request('mComuna'),
                            'Curso'=>request('mCurso'),
                            'Curso_anterior'=>request('mCursoAnterior'),
                            'Establecimiento_ant'=>request('mEstablecimiento'),
                            'Repitente'=>request('mRepitente'),
                            'Ingles'=>request('mIngles')
                        ]);
                        self::CargarAlumno(); //self hace referencia a la misma clase, necesito estudiar clases JAJAJAJA :^) 
                        return back();
                    }
                }
            }
        }
    }

    
/*
    public function messages(){
        return [
            'rut.required' => 'El campo Rut del estudiante es obligatorio.',
            'nombre.required' => 'El campo Nombre del estudiante es obligatorio.',
            'f_nacimiento.required' => 'El campo Fecha de nacimiento del estudiante es obligatorio.',
            'direccion.required' => 'El campo Direccion del estudiante es obligatorio.',
            'curso.required' => 'El campo Curso del estudiante es obligatorio.',
            'curso_anterior.required' => 'El campo Curso anterior del estudiante es obligatorio.',
            'est_anterior.required' => 'El campo Establecimento anterior del estudiante es obligatorio.',
            'ap_rut.required' => 'El campo Rut del apoderado es obligatorio.',
            'ap_nombre.required' => 'El campo Nombre del apoderado es obligatorio.',
            'ap_fono.required' => 'El campo Telefono del apoderado es obligatorio.',
            'pa_rut.required' => 'El campo Rut del padre es obligatorio.',
            'pa_nombre.required' => 'El campo Nombre del padre es obligatorio.',
            'ma_rut.required' => 'El campo Rut del madre es obligatorio.',
            'ma_nombre.required' => 'El campo Nombre de la madre es obligatorio.'
        ];
    }
    
*/    
    
    public function limpiar_rut($rut){
        $rut = str_replace('.', '', $rut);
        $rut = str_replace('-', '', $rut);
        $rut = str_replace(' ', '', $rut);
        return $rut;
    }
    
    
    public function validar_rut($rut){
        
        $digs= array();
        $num=array(2,3,4,5,6,7);
        $suma=0;
        $verificador1 = substr($rut,-1);
        $rut = substr($rut,0,-1);
        $juicio = false;
        
        for($i=0;$i<strlen($rut);++$i){
            array_push($digs,intval($rut[strlen($rut)-1-$i]));
        }
        $i=0;        
        foreach($digs as $dig){
            $suma=$suma+($dig*$num[$i]);
            if($num[$i]==7){
                $i=0;
            }
            else{
                $i = $i+1;
            }
        }
        $verificador2 = 11-($suma % 11);
        $verificador2 = strval($verificador2);
        if($verificador2 == '11'){
            $verificador2 = '0';
        }
        if($verificador2 == '10'){
            $verificador2 = 'k';
        }
        
        if($verificador1 == $verificador2){
            $juicio = true;
        }
        
        return $juicio;
    }
    
    public function agregar_alumno(){
        
                
        $this->validate(request(),[
            'rut' => 'required|max:15',
            'nombre' => 'required|max:70',
            'f_nacimiento' => 'required',
            'direccion' => 'required|max:100',
            'comuna' => 'max:40',
            'curso' => 'required|max:20',
            'curso_anterior' => 'required|max:20',
            'est_anterior' => 'required|max:70',
            
            'ap_rut' => 'required|max:15',
            'ap_nombre' => 'required|max:70',
            'ap_email' => 'max:40',
            'ap_fono' => 'required|max:20',
            'rel_apo_alu' => 'max:30',
            
            'pa_rut' => 'required|max:15',
            'pa_nombre' => 'required|max:70',
            'pa_fono' => 'max:15',
            'pa_email' => 'max:50',
            'pa_estudios' => 'max:20',
            'pa_ocupacion' => 'max:50',
            
            'ma_rut' => 'required|max:15',
            'ma_nombre' => 'required|max:70',
            'ma_fono' => 'max:15',
            'ma_email' => 'max:50',
            'ma_estudios' => 'max:20',
            'ma_ocupacion' => 'max:50',
            
            'he_nombre' => 'max:70',
            'he_ocupacion' => 'max:50',
            'he_direccion' => 'max:50',
            
            'salud_alergia' => 'max:500',
            'salud_otro' => 'max:500'            
        ]);
        
        
        if(request()->isMethod('post')){
            
            $alu_rut = request('rut');
            $apo_rut = request('ap_rut');
            $pa_rut = request('pa_rut');
            $ma_rut = request('ma_rut');
            
            
            
            $alu_rut = $this->limpiar_rut($alu_rut);
            $cond = $this->validar_rut($alu_rut);
            if(!$cond){
                return back()->with('Error',"El Rut del alumno es invalido ");
            }
            
            $apo_rut = $this->limpiar_rut($apo_rut);
            $cond = $this->validar_rut($apo_rut);
            if(!$cond){
                return back()->with('Error',"El Rut del apoderado es invalido ");
            }
            
            $pa_rut = $this->limpiar_rut($pa_rut);
            $cond = $this->validar_rut($pa_rut);
            if(!$cond){
                return back()->with('Error',"El Rut del padre es invalido ");
            }
            
            $ma_rut = $this->limpiar_rut($ma_rut);
            $cond = $this->validar_rut($ma_rut);
            if(!$cond){
                return back()->with('Error',"El Rut de la madre es invalido ");
            }
            
            
            
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

                
                $apo_nombre = request('ap_nombre');
                $apo_email = request('ap_email');
                $apo_fono = request('ap_fono');
                $rel_apo_alu = request('rel_apo_alu');
                //$apo_activo = request('');

                
                $pa_nombre = request('pa_nombre');
                $pa_f_nacimiento = request('pa_f_nacimiento');
                $pa_fono = request('pa_fono');
                $pa_email = request('pa_email');
                $pa_vive = request('pa_vive');
                if($pa_vive == NULL){
                    $pa_vive = false;
                }
                $pa_estudios = request('pa_estudios');
                $pa_ocupacion = request('pa_ocupacion');
                
                
                $ma_nombre = request('ma_nombre');
                $ma_f_nacimiento = request('ma_f_nacimiento');
                $ma_fono = request('ma_fono');
                $ma_email = request('ma_email');
                $ma_vive = request('ma_vive');
                if($ma_vive == NULL){
                    $ma_vive = false;
                }
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


