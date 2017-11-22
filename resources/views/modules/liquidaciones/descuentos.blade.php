<?php
 use App\Http\Controllers\Busqueda_personal;
?>
    {{Busqueda_personal::CargarDescuentos()}}
    {{Busqueda_personal::CargarPrestamos()}}

<div class="table-responsive">
     <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="4"><h2>Descuentos del empleado</h2></th>
        </tr>
        <tr>
                <th>Nombre</th>
                <!--<th>Tipo</th>-->
                <th>Monto</th>
                <th>Eliminar</th>
            </tr>

        <br>
        {{Busqueda_personal::printDescuentosUsuario()}}
    </table>
</div>
<div class="table-responsive">
     <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="4"><h2>Credito y Prestamos del Empleadoo</h2></th>
        </tr>
        <tr>
                <th>Nombre</th>
                <th>Monto Mensual</th>
                <th>Fecha de Inicio</th>
                <th>Fecha Final</th>
                <th>Modificar</th>
        </tr>
        <br>
        {{Busqueda_personal::printPrestamos()}}
    </table>
</div>
<div class="table-responsive">
     <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="4"><h2>Agregar descuentos</h2></th>
        </tr>
        <br>
        {{Busqueda_personal::printDescuentos()}}
    </table>
</div>






<table class="table table-striped table-bordered table-condensed ">
            <tr>
                <th colspan="4"><h2>Crear Descuento</h2></th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Crear</th>
            </tr>

            <tr>
            <form action= {{route('AgregarDato')}} method="get">
            <td>
                <input type="text" class="entrega-dato" id="nDescuento" name="nDescuento" placeholder='Ingrese el nombre'>
                <input hidden id="id_Agregar" name="id_Agregar" value="4">
            </td>
            <td>
                <select id="tDescuento" name="tDescuento">
                    <option value='Legal'>Legal</option>
                    <option value='Varios'>Varios</option>
                </select>
            </td>
            <td><input type="submit" value=""></td>
            
            </tr>
            </form>
            </table>
            
            <br/>
            <h2>Agregar Credito o Prestamo </h2>
            <table class="table table-striped table-bordered table-condensed ">
            <tr>
                <th>Nombre</th>
                <th>Monto Mensual</th>
                <th>Fecha de Inicio</th>
                <th>Fecha Final</th>
                <th>Agregar</th>
            </tr>
            <form action= {{route('AgregarDato')}} method="get">
            <tr>
                <input hidden id="id_Agregar" name="id_Agregar" value="5">
                <td><input type="text" name="nCredito" class="entrega-dato" id="Nombre_nuevo_credito" placeholder='Ingrese el nombre del Credito'></input></td>
                <td><input type="number" name="mCredito" class="entrega-dato" id="Monto_nuevo_credito" placeholder='Monto Mensual del Prestamo'></input></td>
                <td><input type="date" name="iCredito" class="entrega-dato" id="Inicio_nuevo_credito" placeholder='Año/Mes/Dia'></input></td>
                <td><input type="date" name="fCredito" class="entrega-dato" id="Termino_nuevo_credito" placeholder='Año/Mes/Dia'></input></td>
                <td><input type="submit" value=""></td>
            </tr>
            </form>
            </table>
            
             
            <br/>
            <h2>Agregar Licencias </h2>
            <table class="table table-striped table-bordered table-condensed ">
            <tr>
                <th>Motivos</th>
                <th>Descuenta</th>
                <th>Fecha Inicial</th>
                <th>Fecha final</th>
                <th>Agregar</th>
            </tr>
            <form action= {{route('AgregarDato')}} method="get">
        
            <tr>
            <input hidden id="id_Agregar" name="id_Agregar" value="6">
            <td><input type="text" name="Motivo" class="entrega-dato" id="Motivo" placeholder='Motivo'></input></td>
            <td>
                    Si<input type="checkbox" name="tLicencia" value="True" class="entrega-dato" id="tLicencia"></input>
                    No<input type="checkbox" name="tLicencia" class="entrega-dato" value="False" id="tLicencia"></input>
            </td>
            <td><input type="date" name="iLicencia" class="entrega-dato" id="Inicio_Licencia" ></input></td>
            <td><input type="date" name="fLicencia" class="entrega-dato" id="Termino_Licencia" ></input></td>
            <td><input type="submit" value=""></td>

            </tr>
            </form>
            </table>

</div>