
<form>
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="2">Datos del apoderado</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" size="65" id="Nombre" name="nombre" disabled placeholder="Nombre alumno" disable value="{{ session('Alumno')->Apoderado->Nombre }}"></td>
        </tr>
        <tr>
            <td>Rut</td>
            <td><input type="text" disable placeholder="Rut" disabled id="Ruta" name="rut" value="{{ session('Alumno')->Apoderado->Rut }}"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" disabled name="lname" placeholder="Fecha de nacimiento" value="{{ session('Alumno')->Apoderado->Email }}"></td>
        </tr>
        <tr>
            <td>Numero de telefono</td>
            <td><input type="text" disabled name="lname" placeholder="Domicilio" value="{{ session('Alumno')->Apoderado->Fono }}"></td>
        </tr>
        <tr>
            <td>Es del alumno</td>
            <td><input type="text" disabled name="lname" placeholder="Domicilio" value="{{ session('Alumno')->Apoderado->Relacion }}"></td>
        </tr>
        
    </table>
</form>


