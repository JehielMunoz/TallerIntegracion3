<?php $__env->startSection('panel'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar'); ?>
<nav class="col-sm-3 col-md-2 d-none d-sm-block sidebar" style="position:fixed;padding-top:-10em">
  <ul class="nav nav-pills flex-column navbar navbar-light" style="background-color: #e3f2fd;border-radius: 1em;">
    <li class="nav-item">
      <a class="nav-link" href="#">Agregar Nuevo Empleado <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Planilla Liquidación</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Licencias</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">AFP</a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link" href="#">IPS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Contacto</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Impuesto Único a la Renta</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"></a>
    </li>
  </ul>
</nav>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="pull-right" style="margin-top:-1em;">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
<main class="col-sm-8 ml-sm-auto col-md-10 pt-3" role="main"  style="margin-top: -3em;">
<h2>Listado de Liquidaciones.-</h2>
          <div class="table-responsive" >
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>RUT</th>
                  <th>Sueldo Base</th>
                  <th>Sueldo Bruto</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody>
            </table>
          </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.container', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>