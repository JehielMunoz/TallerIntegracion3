<?php

use App\Http\Controllers\Busqueda_personal;

?>
@if (session()->has('Empleado'))


<div id="Planilla">
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
        <tr>{{Busqueda_personal::cal_Total_Imponible()}}
         
            <td>Sueldo bruto</td>
            <td><input type="text" disabled name="lname" placeholder="Sueldo bruto" value="{{session('Empleado')->Datos->Total_Haberes}}"></td>
        </tr>
        <tr>{{Busqueda_personal::cal_Total_Descuentos()}}{{Busqueda_personal::Liquido_Pagar()}}
            <td>Sueldo líquido</td>
            <td><input type="text" disabled name="lname" placeholder="Sueldo líquido" value="{{ session('Empleado')->Datos->Liquido_Pagar }}"></td>
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
            <td><input type="text" disabled name="lname" placeholder="SIS" value="Calcular Tasa"></td>
            <td><input type="text" disabled placeholder="Tasa" name="lname" value="{{ session('Empleado')->Afp->Tasa }}"></td>

            <tr>
                <td>Cotizacion de Salud:</td>

                <td><input type="text" disabled name="lname" placeholder="Nombre ISAPRE" value="{{ session('Empleado')->Isapre->ISAPRE }}"></td>
                <td><input type="text" disabled placeholder="Valor" name="lname" value="Calcular Valor con la tasa"></td>
                <td><input type="text" disabled name="lname" placeholder="%" value="{{ session('Empleado')->Isapre->Tasa }}"></td>
            </tr>
            <tr>
                <td>Total Bonos:</td>
                <td><input type="text" disabled name="lname" value="{{session('Empleado')->Datos->Total_Bonos}}"></td>
                <td colspan=2></td>
            </tr>
            <tr>
                <td>Total Descuentos:</td>
                <td><input type="text" disabled name="lname" value="{{session('Empleado')->Datos->Total_Descuentos}}"></td>
                <td colspan=2></td>
            </tr>
            <tr>
                <td>Total Asignaciones:</td>
                <td><input type="text" disabled name="lname" value="{{session('Empleado')->Datos->Asignacion_Familiar}}"></td>
                <td colspan=2></td>
            </tr>
            <tr>
                <td>Total Seguros:</td>
                <td><input type="text" disabled name="lname" value="{{session('Empleado')->Datos->Total_Seguro}}"></td>
                <td colspan=2></td>
            </tr>
            <tr>
                <td colspan=2>
                    <button class="boton_toggle" id="mPlanilla">Modificar Planilla</button>
                </td>
            </tr>
    </table>
</div>
<div id="m_Planilla" style="display:none">
    <!--  Modificar Empleado -->
    <h1>Modificar informacion empleado </h1>
        <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="2">Datos del empleado</th>
        </tr>
        <tr>
            <td><button style="display:none" class="boton_toggle" id="VolverPlanilla">Volver</button></td>
        </tr>
        <form id="fModificar" action="{{route('ModificarDatos')}}" method="get">
            <input hidden value="4" name="id_Modificar">

        <tr>
            <td>Nombre</td>
            <td><input type="text" size="65" id="Nombre" name="mNombre" placeholder="{{ session('Empleado')->Datos->Nombre }}"></td>
        </tr>
       <!-- <tr>
            <td>Rut</td>
            <td><input type="text" placeholder="Rut"  id="Ruta" name="mRut" placeholder="{{ session('Empleado')->Datos->Rut }}"></td>
        </tr> -->
        <tr>
            <td>Sueldo base</td>
            <td><input type="text"  name="mSueldo"  placeholder="{{ session('Empleado')->Datos->Sueldo_base }}"></td>
        </tr>
      
        <tr>
            <td>Horas de trabajo</td>
            <td><input type="text"  name="mHTrabajo"  placeholder="{{ session('Empleado')->Datos->N_horas }}"></td>
        </tr>
        <tr>
            <td>Valor hora</td>
            <td><input type="text"  name="mvHora"  placeholder="{{ session('Empleado')->Datos->Paga_por_hora }}"></td>
        </tr>
        <tr>
                <td>Tipo de contrato</td>
                <td>
                    <select name="mContrato">
                         {{ Busqueda_personal::printContratoModificar() }}
        
                    </select>
                </td>
        </tr>
         <tr>
                <td>Cotizacion AFP:</td>
                <td>
                    <select name="mAFP">
                      {{Busqueda_personal::printAFPModificar()}}
                                                    </select>
                </td>
            </tr>
                <tr>
                    <td>Cotizacion de Salud:</td>

                    <td>
                        <select name="mIPS">
                      {{Busqueda_personal::printIPSModificar()}}
                                         
                                                    </select>
                    </td>
                </tr>
                <tr>
                    <td>                
                    <button type="submit" id="ModificarPlanilla">Modificar Planilla</button>
                    </td>
                </tr>
    </table>
    </form>		
</div>


    @else
        @include('modules/liquidaciones/noEmpleado/')
@endif