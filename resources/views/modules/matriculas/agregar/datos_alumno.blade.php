<form method='POST' action='{{ route('agregar_alumno') }}'>
    {{ csrf_field() }}
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="2">Datos del alumno</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" size="65" id="Nombre" name="nombre"  placeholder="Nombre alumno" 
                    value=""></td>
        </tr>
        <tr>
            <td>Rut</td>
            <td><input type="text" placeholder="Rut"  id="Ruta" name="rut" value=""></td>
        </tr>
        <tr>
            <td>Fecha de nacimiento</td>
            <td><input type="date"  name="lname" placeholder="Fecha de nacimiento" value=""></td>
        </tr>
        <tr>
            <td>Domicilio</td>
            <td><input type="text"  name="lname" placeholder="Domicilio" value=""></td>
        </tr>
        <tr>
            <td>Comuna</td>
            <td><input type="text"  name="lname" placeholder="Comuna" value=""></td>
        </tr>

    </table>
    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <th colspan="2">Datos academicos</th>
        </tr>
        <tr>
            <td>Curso</td>
            <td><input type="text"  name="lname" placeholder="Curso" value=""></td>
        </tr>
        <tr>
            <td>Curso anterior</td>
            <td><input type="text"  name="lname" placeholder="Curso anterior" value=""></td>
        </tr>
        <tr>
            <td>Establecimiento anterior</td>
            <td><input type="text"  name="lname" placeholder="Establecimeinto" value=""></td>
        </tr>
    </table>
