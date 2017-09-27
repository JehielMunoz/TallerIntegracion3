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
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="4"><h2>Agregar Gratificacion</h2></th>
        </tr>
        <br>
        {{Busqueda_personal::printGratificaciones()}}
    </table>    
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="4"><h2>Crear Gratificacion</h2></th>
        </tr>
        <br>
        <tr>
            <td>
                <input type="text"  id="Nombre_nueva_gratificacion" name="Nombre_nueva_gratificacion" placeholder='Ingresar el nombre'></input>
            </td>
            <td>
                <select id="Tipo_nueva_gratificacion" name="Tipo_nueva_gratificacion">
                    <option value='Imponible'>Imponible</option>
                    <option value='no Imponible'>No Imponible</option>
                </select>
            </td>
        <td></td>
        
        </tr>
    </table>

</div>