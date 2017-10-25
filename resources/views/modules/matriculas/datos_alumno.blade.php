<?php
 use App\Http\Controllers\Busqueda_estudiante;
?>
@if (session()->has('Alumno'))
<div id="Alumno">
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="2">Datos del alumno</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" size="65" id="Nombre" name="nombre" disabled placeholder="Nombre alumno" disable
                    value="{{ session('Alumno')->Datos->Nombre }}"></td>
        </tr>
        <tr>
            <td>Rut</td>
            <td><input type="text" disable placeholder="Rut" disabled id="Ruta" name="rut" value="{{ session('Alumno')->Datos->Rut }}"></td>
        </tr>
        <tr>
            <td>Fecha de nacimiento</td>
            <td><input type="text" disabled name="lname" placeholder="Fecha de nacimiento" value="{{ session('Alumno')->Datos->F_nacimiento }}"></td>
        </tr>
        <tr>
            <td>Domicilio</td>
            <td><input type="text" disabled name="lname" placeholder="Domicilio" value="{{ session('Alumno')->Datos->Direccion }}"></td>
        </tr>
        <tr>
            <td>Comuna</td>
            <td><input type="text" disabled name="lname" placeholder="Comuna" value="{{ session('Alumno')->Datos->Comuna }}"></td>
        </tr>

    </table>
    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <th colspan="2">Datos academicos</th>
        </tr>
        <tr>
            <td>Curso</td>
            <td><input type="text" disabled name="lname" placeholder="Curso" value="{{ session('Alumno')->Datos->Curso }}"></td>
        </tr>
        <tr>
            <td>Curso anterior</td>
            <td><input type="text" disabled name="lname" placeholder="Curso anterior" value="{{ session('Alumno')->Datos->Curso_anterior }}"></td>
        </tr>
        <tr>
            <td>Establecimiento anterior</td>
            <td><input type="text" disabled name="lname" placeholder="Establecimeinto" value="{{ session('Alumno')->Datos->Establecimiento_ant }}"></td>
        </tr>
        <tr>
            <td>Repitente</td>
            <td><input type="text" disabled name="lname" placeholder="Repitente" value="{{ Busqueda_estudiante::Si_No(session('Alumno')->Datos->Repitente)  }}"></td>
        </tr>
        <tr>
            <td>Ingles</td>
            <td><input type="text" disabled name="lname" placeholder="Ingles" value="{{  Busqueda_estudiante::Si_No(session('Alumno')->Datos->Ingles) }}"></td>
        </tr>
        <tr>
            <td>                
                <button type="submit" id="mAlumno">Modificar Alumnno</button>
            </td>
        </tr>
    </table>
</div>

<div id="m_Alumno" style="display:none">
    <!--  Modificar Alumno -->
    <h1>Modificar informacion alumno </h1>
        <table class="table table-striped table-bordered table-condensed">
            <tr>
                <th colspan="2">Datos alumno</th>
            </tr>
            <tr>
            <td><button style="display:none" class="boton_toggle" id="VolverAlumno">Volver</button></td>
        </tr>
            <tr>

        
            <form action="{{route('ModificarDatosAlumno')}}" method="get">
                <td>Nombre</td>
                <input hidden value="1" name="id_Modificar">

                <td style="text-align:left;"><input type="text" size="61" id="Nombre" name="mNombre" placeholder="{{ session('Alumno')->Datos->Nombre }}"></td>
            </tr>
            <tr>
                <td>Domicilio</td>
                <td><input type="text" name="mDomicilio" placeholder="{{ session('Alumno')->Datos->Direccion }}" ></td>
            </tr>
            <tr>
                <td>Comuna</td>
                <td><input type="text" name="mComuna" placeholder="{{ session('Alumno')->Datos->Comuna }}"></td>
            </tr>
            </table>
            <table class="table table-striped table-bordered table-condensed">
            <tr>
                <th colspan="2">Datos Academicos</th>
            </tr>
            <tr>
                <td>Curso</td>
                <td><input type="text" name="mCurso" placeholder="{{ session('Alumno')->Datos->Curso }}"></td>
            </tr>
            <tr>
                <td>Curso Anterior</td>
                <td><input type="text" name="mCursoAnterior" placeholder="{{ session('Alumno')->Datos->Curso_anterior }}"></td>
            </tr>
            <tr>
                <td>Establecimeinto anterior</td>
                <td><input type="text" name="mEstablecimiento" placeholder="{{ session('Alumno')->Datos->Establecimiento_ant }}"></td>
            </tr>
            <tr>
                <td>Repitente</td>
                <td>
                    <select name="mRepitente">
                            @if (session('Alumno')->Datos->Repitente))
                                <option selected value="TRUE">Si</option>"
                                <option value="FALSE">No</option>"
                            @else
                                <option value="TRUE">Si</option>"
                                <option selected value="FALSE">No</option>"
                            @endif
                    </select>
                </td>
            </tr>
            <!--<tr>
                                                <td>N° de cargas</td>
                                                <td><input type="text" name="nCargas" placeholder="Cargas" value="></td>
                                            </tr>    QUE NO SE UTILIZA  -->
            <tr>
                <td>Ingles</td>
                <td>
                    <select name="mIngles">
                            @if (session('Alumno')->Datos->Ingles))
                                <option selected value="TRUE">Si</option>"
                                <option value="FALSE">No</option>"
                            @else
                                <option value="TRUE">Si</option>"
                                <option selected value="FALSE">No</option>"
                            @endif                       
                    </select>
                </td>
             
                <tr>
                <td>
                    <button type="submit" id="ModificarAlumno">Modificar Alumno</button>
                </td>
                </tr>
        </table>
    </form>
</div>


    @else
        @include('modules/matriculas/noAlumno/')
@endif