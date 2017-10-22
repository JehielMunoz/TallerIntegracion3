<form method='POST' id="form_agregar_alumno" action='{{ route('agregar_alumno') }}'>
    {{ csrf_field() }}


    <table class="table table-striped table-bordered table-condensed ">
        
        <tr>
            <th colspan="2">Padre</th>
        </tr>
        <tr>
            <td>Nombre *</td>
            <td><input maxlength="70"  type="text" size="65" id="Nombre" name="pa_nombre" placeholder="Nombre"  value=""  ></td>
        </tr>
        <tr>
            <td>Rut *</td>
            <td><input class="input_rut" maxlength="15"  type="text"  placeholder="Rut" id="Ruta" name="pa_rut" value="" ></td>
        </tr>
        <tr>
            <td>Fecha de nacimiento</td>
            <td><input type="date"  name="pa_f_nacimiento" placeholder="Fecha de nacimiento" value=""></td>
        </tr>
        <tr>
            <td>Numero de telefono</td>
            <td><input class="input_fono" maxlength="15"  type="text" name="pa_fono" placeholder="Telefono" value=""></td>
        </tr>
        <tr>
            <td>Correo electronico</td>
            <td><input maxlength="50"  type="email" name="pa_email" placeholder="Email" value=""></td>
        </tr>
        <tr>
            <td>Vive con el alumno</td>
            <td><input type="checkbox" name="pa_vive"></td>
        </tr>        
        <tr>
            <td>Estudios alcanzados</td>
            <td><input maxlength="20"  type="text" name="pa_estudios" placeholder="Estudios" value=""></td>
        </tr>
        <tr>
            <td>Ocupacion</td>
            <td><input maxlength="50"  type="text" name="pa_ocupacion" placeholder="Ocupacion" value=""></td>
        </tr>
    
    </table>
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="2">Madre</th>
        </tr>
        <tr>
            <td>Nombre *</td>
            <td><input maxlength="70"  type="text" size="65" id="Nombre" name="ma_nombre" placeholder="Nombre"  value="" ></td>
        </tr>
        <tr>
            <td>Rut *</td>
            <td><input class="input_rut" maxlength="15"  type="text"  placeholder="Rut" id="Ruta" name="ma_rut" value="" ></td>
        </tr>
        <tr>
            <td>Fecha de nacimiento</td>
            <td><input type="date"  name="ma_f_nacimiento" placeholder="Fecha de nacimiento" value=""></td>
        </tr>
        <tr>
            <td>Numero de telefono</td>
            <td><input class="input_fono" maxlength="15"  type="text" name="ma_fono" placeholder="Telefono" value=""></td>
        </tr>
        <tr>
            <td>Correo electronico</td>
            <td><input maxlength="50"  type="email" name="ma_email" placeholder="Email" value=""></td>
        </tr>
        <tr>
            <td>Vive con el alumno</td>
            <td><input type="checkbox" name="ma_vive"></td>
        </tr>        
        <tr>
            <td>Estudios alcanzados</td>
            <td><input maxlength="20"  type="text" name="ma_estudios" placeholder="Estudios" value=""></td>
        </tr>
        <tr>
            <td>Ocupacion</td>
            <td><input maxlength="50"  type="text" name="ma_ocupacion" placeholder="Ocupacion" value=""></td>
        </tr>
        
    </table>
    <table class="table table-striped table-bordered table-condensed ">
        
        <tr id="div_hermanos">
            <th colspan="2">Hermanos</th>
        </tr>
        <tr><td colspan="2"></td></tr>
        
        <tr>
            <td><button class="btn btn-outline-secondary my-2 my-sm-0" type="button" id="add_hermano">Añadir un hermano</button></td>
        </tr>
    </table>
