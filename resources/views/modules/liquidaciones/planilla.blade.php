@if (session()->has('Empleado'))

<form>
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="2">Datos del empleado</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" size="65" id="Nombre" name="nombre" disabled placeholder="Nombre empleado" disable
                    value="{{ session('Empleado')->Datos->Nombre }}"></td>
        </tr>
        <tr>
            <td>Rut</td>
            <td><input type="text" disable placeholder="Rut" disabled id="Ruta" name="rut" value="{{ session('Empleado')->Datos->Rut }}"></td>
        </tr>
        <tr>
            <td>Sueldo base</td>
            <td><input type="text" disabled name="lname" placeholder="Sueldo base" value="{{ session('Empleado')->Datos->Sueldo_base }}"></td>
        </tr>
        <tr>
            <td>Sueldo bruto</td>
            <td><input type="text" disabled name="lname" placeholder="Sueldo bruto" value="{{ session('Empleado')->Datos->Sueldo_base }}"></td>
        </tr>
        <tr>
            <td>Sueldo líquido</td>
            <td><input type="text" disabled name="lname" placeholder="Sueldo líquido" value="{{ session('Empleado')->Datos-> Sueldo_base }}"></td>
        </tr>
        <tr>
            <td>Horas de trabajo</td>
            <td><input type="text" disabled name="HTrabajo" placeholder="Total horas" value="{{ session('Empleado')->Datos->N_horas }}"></td>
        </tr>
        <tr>
            <td>Valor hora</td>
            <td><input type="text" disabled name="vHora" placeholder="Valor" value="{{ session('Empleado')->Datos->Paga_por_hora }}"></td>
        </tr>
        <tr>
            <td>Tipo de contrato</td>
            <td><input type="text" disabled name="Tipo_Contrato" placeholder="Tipo" value="{{session('Empleado')->Contrato->Contrato }}"></td>
        </tr>
        <tr>
            <td>N° de cargas</td>
            <td><input type="text" disabled name="nCargas" placeholder="Cargas" value="{{ session('Empleado')->Datos->Cargas }}"></td> <!-- Sacar????-->
        </tr>
    </table>
    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <td>Cotizacion AFP:</td>
            <td><input type="text" disabled name="lname" placeholder="Nombre AFP" value="{{ session('Empleado')->Afp->AFP }}"></td>
            <td><input type="text" disabled name="lname" placeholder="SIS" value="{{ session('Empleado')->Afp->SIS }}"></td>
            <td><input type="text" disabled placeholder="Tasa" name="lname" value="{{ session('Empleado')->Afp->Tasa }}"></td>

            <tr>
                <td>Cotizacion de Salud:</td>

                <td><input type="text" disabled name="lname" placeholder="Nombre ISAPRE" value="{{ session('Empleado')->Isapre->ISAPRE }}"></td>
                <td><input type="text" disabled placeholder="Valor" name="lname" value="Calcuclar Valor con la tasa"></td>
                <td><input type="text" disabled name="lname" placeholder="%" value="{{ session('Empleado')->Isapre->Tasa }}"></td>
            </tr>
            <tr>
                <td>Total Bonos:</td>
                <td><input type="text" disabled name="lname" value="Calcular"></td>
                <td colspan=2></td>
            </tr>
            <tr>
                <td>Total Descuentos:</td>
                <td><input type="text" disabled name="lname" value="Calcular"></td>
                <td colspan=2></td>
            </tr>
            <tr>
                <td>Total Asignaciones:</td>
                <td><input type="text" disabled name="lname" value="Calcalar"></td>
                <td colspan=2></td>
            </tr>
            <tr>
                <td>Total Seguros:</td>
                <td><input type="text" disabled name="lname" value="Calcular"></td>
                <td colspan=2></td>
            </tr>
            <tr>
                <td colspan=2>
                    <button lass="boton_toggle" id="ModificarPlanilla">Modificar Planilla</button>
                </td>
            </tr>
    </table>
</form>
<div id="m_Planilla" style="display:none">
    <!--  Modificar Empleado -->
    <h1>Modificar informacion empleado </h1>
    <form action="../resources//Modificar_Datos." method="post">
        <table>
            <tr>
                <th colspan="2">Datos empleado</th>
            </tr>
            <tr>
                <td>Nombre</td>
                <td style="text-align:left;"><input type="text" size="61" id="Nombre" name="mNombre" placeholder="Nombre empleado" value="<? Nombre();?>"></td>
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
        @include('modules/liquidaciones/noEmpleado/')
@endif