
<form>
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="2">Alergias</th>
        </tr>
        <tr>
            <td>Descripcion</td>
            <td><input type="text" size="70" id="Nombre" name="nombre" disabled placeholder="Nombre alumno" disable value="{{ session('Alumno')->Salud->Antc_Alergia }}"></td>
        </tr>
        
        
        <tr>
            <th colspan="2">Otros</th>
        </tr>
        <tr>
            <td>Descripcion</td>
            <td><input type="text" size="70" id="Nombre" name="nombre" disabled placeholder="Nombre alumno" disable value="{{ session('Alumno')->Salud->Antc_Salud }}"></td>
        </tr>

    </table>
</form>
