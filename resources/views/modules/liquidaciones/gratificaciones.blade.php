<?php
 use App\Http\Controllers\Busqueda_personal;
?>
      {{Busqueda_personal::CargarGratificaciones()}}
<div class="table-responsive">
     <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="4"><h2>Datos del empleado</h2></th>
        </tr>
        <br>
        {{Busqueda_personal::printGratificacionesUsuario()}}
    </table>
    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <th colspan="4"><h2>Agregar Gratificacion</h2></th>
        </tr>
        <br>
        {{Busqueda_personal::printGratificaciones()}}
    </table>    
    <br>
    <h2> Crear Gratificacion</h2>
    <table class="table table-striped table-bordered table-condensed ">
        <form action= {{route('AgregarDato')}} method="get">
        <tr>
            <th>Nombre Gratificacion</th>
            <th>Tipo Gratificacion</th>
            <th>Agregar</th>
        </tr>
        <br>
        <tr>
            <td>
                <input type="text"  id="Nombre_nueva_gratificacion" name="nGratificacion" placeholder='Ingresar el nombre'>
                <input hidden value="2" name="id_Agregar">
            </td>
            <td>
                <select id="Tipo_nueva_gratificacion" name="Tipo">
                    <option value='Imponible'>Imponible</option>
                    <option value='no Imponible'>No Imponible</option>
                </select>
            </td>
        <td><input type="submit" value=""></td>
        </form>
        </tr>
    </table>

</div>