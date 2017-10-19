<form method='POST' id="form_agregar_empleado" action='{{ route('agregar_empleado') }}'>
    {{ csrf_field() }}
    <table class="table table-striped table-bordered table-condensed ">
        <tr>
            <th colspan="2">Datos del empleado</th>
        </tr>
        <tr>
            <td>Nombre completo</td>
            <td><input type="text" size="65" id="Nombre" name="nombre"  placeholder="Nombre" 
                    value=""></td>
        </tr>
        <tr>
            <td>Rut</td>
            <td><input type="text" placeholder="Rut"  id="Ruta" name="rut" value=""></td>
        </tr>
        <tr>
            <td>Fecha de nacimiento</td>
            <td><input type="date"  name="f_nacimiento" placeholder="Fecha" value=""></td>
        </tr>
        <tr>
            <td>Fecha de ingreso</td>
            <td><input type="date"  name="f_ingreso" placeholder="Fecha" value=""></td>
        </tr>
        
        <tr>
            <td>Tipo de contrato</td>
            <td>
                <select name="id_contrato">
                    <option value="1">INDEFINIDO</option>
                    <option value="2">A PLAZO FIJO</option>
                </select>
            </td>
        </tr>   
        
        <tr>
            <td>Sueldo base</td>
            <td><input type="text"  name="sueldo_base" placeholder="Sueldo" value=""></td>
        </tr>
        
        
        <tr>
            <td>AFP</td>
            <td>
                <select name="id_afp">
                    <option value="1">No Cotiza</option>
                    <option value="2">Capital</option>
                    <option value="3">Cuprum</option>
                    <option value="4">Hábitat</option>
                    <option value="5">PlanVital</option>
                    <option value="6">Próvida</option>
                    <option value="7">Modelo</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>ISAPRE</td>
            <td>
                <select name="id_isapre">
                    <option value="1">No Cotiza</option>
                    <option value="2">Fonasa</option>
                    <option value="3">Banmedica</option>
                    <option value="4">Colmena</option>
                    <option value="5">Consalud</option>
                    <option value="6">Cruz Blanca</option>
                    <option value="7">Ferrosalud</option>
                    <option value="8">Fundación</option>
                    <option value="9">Fusat</option>
                    <option value="10">MasVida</option>
                    <option value="11">Normedica</option>
                    <option value="12">Sfera</option>
                    <option value="13">Vida Tres</option>
                </select>
            </td>
        </tr>
        
        <tr>
            <td>Horas de trabajo (diario)</td>
            <td><input type="text"  name="horas_trabajo" placeholder="horas" value=""></td>
        </tr>

        <tr>
            <td>Paga por hora</td>
            <td><input type="text" placeholder="Cantidad"  id="Ruta" name="paga_hora" value=""></td>
        </tr>
        
        <tr>
            <td>Numero de cargas</td>
            <td><input type="text" placeholder="Cantidad"  id="Ruta" name="cargas" value=""></td>
        </tr>
        
    </table>
    
    
    <table id="table_empledos_agregar_fono" class="table table-striped table-bordered table-condensed">
        
        <tr>
            <th colspan="2">Numeros de telefono</th>
        </tr>
        
        <tr>
            <td><button class="btn btn-outline-secondary my-2 my-sm-0" type="button" id="add_fono">Añadir un numero</button></td>
        </tr>
        
    </table>
    
    
    <table id="table_empledos_agregar_cargo" class="table table-striped table-bordered table-condensed">
        
        <tr>
            <th colspan="2">Cargos</th>
        </tr>
        
        <tr>
            <td><button class="btn btn-outline-secondary my-2 my-sm-0" type="button" id="add_cargo">Añadir un cargo</button></td>
        </tr>
        
    </table>
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Registrar</button>
</form>