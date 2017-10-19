<?php
 use App\Http\Controllers\Busqueda_estudiante;
?>
@if (session()->has('Alumno'))

<form>
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
    </table>
</form>


<div id="m_Planilla" style="display:none">
    <!--  Modificar Alumno -->
    <h1>Modificar informacion alumno </h1>
    <form action="../resources//Modificar_Datos." method="post">
        <table>
            <tr>
                <th colspan="2">Datos alumno</th>
            </tr>
            <tr>
                <td>Nombre</td>
                <td style="text-align:left;"><input type="text" size="61" id="Nombre" name="mNombre" placeholder="Nombre alumno" value="<? Nombre();?>"></td>
            </tr>
            <tr>
                <td>Rut</td>
                <td><input type="text" placeholder="Rut" disabled id="Ruta" name="mRut" value="<? mRut();?>"></td>
                <input type="text" placeholder="Rut" hidden id="Ruta" name="mRut" value="<? mRut();?>">
            </tr>
            <tr>
                <td>Sueldo base</td>
                <td><input type="text" name="mSueldo" placeholder="Sueldo base" value="<? mSueldo_Base();?>"></td>
            </tr>
            <tr>
                <td>Horas de trabajo</td>
                <td><input type="text" name="mHTrabajo" placeholder="Total horas" value="<? Hora();?>"></td>
            </tr>
            <tr>
                <td>Valor hora</td>
                <td><input type="text" name="mValorHora" placeholder="Valor" value="<? mValor_Hora()?>"></td>
            </tr>
            <tr>
                <td>Tipo de contrato</td>
                <td>
                    <select name="mContrato">
                                         
                                                    </select>
                </td>
            </tr>
            <!--<tr>
                                                <td>N° de cargas</td>
                                                <td><input type="text" name="nCargas" placeholder="Cargas" value="></td>
                                            </tr>    QUE NO SE UTILIZA  -->
            <tr>
                <td>Cotizacion AFP:</td>
                <td>
                    <select name="mAFP">
                                           
                                                    </select>
                </td>
                <tr>
                    <td>Cotizacion de Salud:</td>

                    <td>
                        <select name="mIPS">
                                         
                                                    </select>
                    </td>
                </tr>
                <tr>
                    <button type="submit" id="ModificarPlanilla">Modificar Planilla</button>
                </tr>
        </table>
    </form>
</div>


    @else
        @include('modules/matriculas/noAlumno/')
@endif