<form method='POST' id="form_agregar_item" action='{{ route('agregar_item') }}'>
    {{ csrf_field() }}
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="2">Datos del item</th>
        </tr>
        <tr>
            <td>Tipo </td>
            <td><input maxlength="50" type="text" size="65" id="Tipo" name="tipo"  placeholder="ej: Silla" 
                    value=""></td>
        </tr>
        <tr>
            <td>Serial </td>
            <td><input maxlength="20" type="text" placeholder="Codigo serial"  name="serial" value="" ></td>
        </tr>
        <tr>
            <td>Sector </td>
            <td><input maxlength="60" type="text" size="65" id="Sector" name="sector"  placeholder="Sector del item" 
                    value=""></td>
        </tr>
        <tr>
            <td>Subvencion </td>
            <td><input maxlength="50" type="text" size="65" id="Subvencion" name="subvencion"  placeholder="Subvencion" 
                    value=""></td>
        </tr>
        <tr>
            <td>Nº Boleta/factura </td>
            <td><input maxlength="70" type="text" size="65" id="N_Boleta" name="n_boleta"  placeholder="Numero de boleta o factura" 
                    value=""></td>
        </tr>
        <tr>
            <td>Fecha de Boleta/factura</td>
            <td><input type="date"  name="f_factura" placeholder="Fecha de nacimiento" value="" ></td>
        </tr>
        <tr>
            <td>Proveedor </td>
            <td><input maxlength="70" type="text" size="65" name="proveedor"  placeholder="Nombre del Proveedor" 
                    value=""></td>
        </tr>
        <tr>
            <td>RUT Proveedor </td>
            <td><input maxlength="20" type="text" size="65" name="rut_proveedor"  placeholder="RUT del Proveedor" 
                    value=""></td>
        </tr>
        <tr>
            <td>Descripcion </td>
            <td><input maxlength="200" type="text" size="65" name="descripcion"  placeholder="Descripcion del item" 
                    value=""></td>
        </tr>
        <tr>
            <td>Estado </td>
            <td><input maxlength="50" type="text" size="65" name="estado"  placeholder="Estado del item" 
                    value=""></td>
        </tr>
        
    </table>
    
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Registrar</button>
</form>

