@extends('layouts.container')
<!--  -->
@section('Header')
<!--  -->
@parent
<!-- Aqui agregar todo el css y js  adicional que se requiera -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="{{ asset('../public/css/sidebar_liquidacion_gris.css') }}">
<!-- Azul o negro-->
<link rel="stylesheet" href="{{ asset('../public/css/tabs_liquidaciones.css') }}">
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
        $('#nPersonal').on('input', function () {
            var Nombres = [];
            var Rut = [];
            var urlAutocompletar = "{{ route('autocompletar') }}" + "?Nombre_Personal=" + $(this).val(); // limitar caracteres, minimo 3 o 2 

            $.getJSON(urlAutocompletar, function (Personal) {

                for (var x = 0; x < Personal.length; x++) {
                    Nombres.push(Personal[x].Nombre);
                    Rut.push(Personal[x].Rut);
                }
            });
            console.log(Nombres);
            console.log(Rut);

            $(this).autocomplete({
                source: Nombres,
                change: function () {}
            });

        });
    });
</script>
<!--
 
    <script src="{{ asset('../public/js/liquidacion.js')}}"></script>  NeverMInd
-->


@endsection @section('panel')
<!--  -->
@endsection @section('navbar')
<!--  -->
@endsection @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 cold-xs-1" id="sidebar">
            <div class="list-group panel ">
                <ul class="list-unstyled components">
                    <li>
                        <a href="#">Planilla de liquidacion</a>
                    </li>
                    <li>
                        <a href="#">Agregar Empleado</a>
                    </li>

                    <li>
                        <a href="#">Licencias</a>
                    </li>

                    <li>
                        <a href="#">AFP</a>
                    </li>
                    <li>
                        <a href="#">IPS</a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                    </li>
                    <li>
                        <a href="#">Impuesto a la renta</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 cold-xs-11" id="contenedor_tabs">
            <br>
            <div id="Tabs" class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h2 class="page-header">[Personal Seleccionado]</h2>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a href="#cPlanilla" data-toggle="tab" class="nav-link  active">Planilla</a>
                            </li>
                            <li class="nav-item">
                                <a href="#2a" data-toggle="tab" class="nav-link">Gratificaciones</a>
                            </li>
                            <li class="nav-item">
                                <a href="#3a" data-toggle="tab" class="nav-link">Descuentos</a>
                            </li>
                            <li class="nav-item">
                                <a href="#4a" data-toggle="tab" class="nav-link">Vista Previa</a>
                            </li>
                            <li class="nav-item ml-auto  justify-content-end">
                                <form class="form-inline">
                                    <input class=" form-control mr-sm-2" type="text" name="Nombre_Personal" id="nPersonal" data-action="{{ route('autocompletar') }}"
                                        placeholder="Nombre Empleado">
                                    <input type "text" name="Rut_Personal" id="Rut_Personal" hidden>
                                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </li>
                        </ul>
                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="cPlanilla">
                                <form>
                                    <table class="table table-striped table-bordered table-condensed ">
                                        <tr>
                                            <th colspan="2">Datos del empleado</th>
                                        </tr>
                                        <tr>
                                            <td>Nombre</td>
                                            <td><input type="text" size="65" class="" id="Nombre" name="nombre" disabled placeholder="Nombre empleado"
                                                    disable value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Rut</td>
                                            <td><input type="text" class="" disable placeholder="Rut" disabled id="Ruta" name="rut"
                                                    value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Sueldo base</td>
                                            <td><input type="text" class="" disabled name="lname" placeholder="Sueldo base" value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Sueldo bruto</td>
                                            <td><input type="text" class="" disabled name="lname" placeholder="Sueldo bruto"
                                                    value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Sueldo líquido</td>
                                            <td><input type="text" class="" disabled name="lname" placeholder="Sueldo líquido"
                                                    value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Horas de trabajo</td>
                                            <td><input type="text" class="" disabled name="HTrabajo" placeholder="Total horas"
                                                    value=""></td>
                                        </tr>
                                        <tr>
                                            <td>Valor hora</td>
                                            <td><input type="text" class="" disabled name="HTrabajo" placeholder="Valor" value="Valor_Hora()?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Tipo de contrato</td>
                                            <td><input type="text" class="" disabled name="Tipo_Contrato" placeholder="Tipo"
                                                    value="<? Tipo_Contrato();?>"></td>
                                        </tr>
                                        <tr>
                                            <td>N° de cargas</td>
                                            <td><input type="text" class="" disabled name="nCargas" placeholder="Cargas" value="<? nCargas();?>"></td>
                                        </tr>
                                    </table>
                                    <table class="table table-striped table-bordered table-condensed">
                                        <tr>
                                            <td>Cotizacion AFP:</td>
                                            <td><input type="text" class="" disabled name="lname" placeholder="Nombre AFP" value="<? nombre_AFP();?>"></td>
                                            <td><input type="text" class="" disabled name="lname" placeholder="SIS" value="<? Valor_AFP();?>"></td>
                                            <td><input type="text" class="" disabled placeholder="Tasa" name="lname" value="<? tasa_AFP();?>"></td>

                                            <tr>
                                                <td>Cotizacion de Salud:</td>

                                                <td><input type="text" class="" disabled name="lname" placeholder="Nombre ISAPRE"
                                                        value="<? nombre_ISAPRE();?>"></td>
                                                <td><input type="text" class="" disabled placeholder="Valor" name="lname" value="<? Valor_Isapre();?>"></td>
                                                <td><input type="text" class="" disabled name="lname" placeholder="%" value="<? tasa_ISAPRE();?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Total Bonos:</td>
                                                <td><input type="text" class="" disabled name="lname" value="<? Total_Bonos();?>"></td>
                                                <td colspan=2></td>
                                            </tr>
                                            <tr>
                                                <td>Total Descuentos:</td>
                                                <td><input type="text" class="" disabled name="lname" value="<? Total_Descuentos();?>"></td>
                                                <td colspan=2></td>
                                            </tr>
                                            <tr>
                                                <td>Total Asignaciones:</td>
                                                <td><input type="text" class="" disabled name="lname" value="<? Total_Asignacion();?>"></td>
                                                <td colspan=2></td>
                                            </tr>
                                            <tr>
                                                <td>Total Seguros:</td>
                                                <td><input type="text" class="" disabled name="lname" value="<? Valor_seguro_cesantia();?>"></td>
                                                <td colspan=2></td>
                                            </tr>
                                            <tr>
                                                <td colspan=2>
                                                    <button lass="boton_toggle" id="ModificarPlanilla">Modificar Planilla</button>
                                                </td>
                                            </tr>
                                    </table>
                                </form>
                                <div id="m_Planilla" style="display:none"> <!--  Modificar Empleado -->
                                    <h1>Modificar informacion empleado </h1>
                                    <form action="../resources//Modificar_Datos." method="post">
                                        <table>
                                            <tr>
                                                <th colspan="2">Datos empleado</th>
                                            </tr>
                                            <tr>
                                                <td>Nombre</td>
                                                <td style="text-align:left;"><input type="text" size="61" class="" id="Nombre" name="mNombre" placeholder="Nombre empleado"
                                                        value="<? Nombre();?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Rut</td>
                                                <td><input type="text" class="" placeholder="Rut" disabled id="Ruta" name="mRut"
                                                        value="<? mRut();?>"></td>
                                                <input type="text" class="" placeholder="Rut" hidden id="Ruta" name="mRut" value="<? mRut();?>">
                                            </tr>
                                            <tr>
                                                <td>Sueldo base</td>
                                                <td><input type="text" class="" name="mSueldo" placeholder="Sueldo base" value="<? mSueldo_Base();?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Horas de trabajo</td>
                                                <td><input type="text" class="" name="mHTrabajo" placeholder="Total horas" value="<? Hora();?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Valor hora</td>
                                                <td><input type="text" class="" name="mValorHora" placeholder="Valor" value="<? mValor_Hora()?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Tipo de contrato</td>
                                                <td>
                                                    <select name="mContrato">
                                         
                                                    </select>
                                                </td>
                                            </tr>
                                            <!--<tr>
                                                <td>N° de cargas</td>
                                                <td><input type="text" class="" name="nCargas" placeholder="Cargas" value="></td>
                                            </tr>    QUE NO SE UTILIZA  -->
                                            <tr>
                                                <td>Cotizacion AFP:</td>
                                                <td>
                                                    <select name="mAFP">
                                           
                                                    </select>
                                                </td>
                                                <tr>
                                                    <td>Cotizacion de Salud:</td>

                                                    <td>
                                                        <select name="mIPS">
                                         
                                                    </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <button type="submit" id="ModificarPlanilla">Modificar Planilla</button>
                                                </tr>
                                        </table>
                                    </form>
                                </div>


                            </div>

                            <div class="tab-pane" id="2a">
                                
                                <div class="jumbotron jumbotron-fluid">
                                    <div class="container">
                                        <h1 class="display-3">Kappa</h1>
                                        <p class="lead">GG</p>
                                        <hr class="my-2">
                                        <p>Por alguna razón, para hacer esto la vez anterior hicimos esto con php, para general las tablas dinamicamente, 
                                            Ahora hay que ver como implementarlo con laravel 
                                        </p>
                                        <p class="lead">
                                            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="3a">
                                <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
                            </div>
                            <div class="tab-pane" id="4a">
                                <h3>We use css to change the background color of the content to be equal to the tab</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection