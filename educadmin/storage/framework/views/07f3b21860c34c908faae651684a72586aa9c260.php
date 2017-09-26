<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('../public/css/container.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('../public/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
      .anim {display:none;}
    </style>
    <script>
    $( document ).ready(function() {
      $( ".anim" ).fadeIn( "slow" );
    });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">EducaAdmin</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

            <!-- Authentication Links -->
          <?php if(auth()->guard()->guest()): ?>
            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
          <?php else: ?>
            <li class="dropdown">         
              <a href="#" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li>
                  <a class='dropdown-item' href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                      <?php echo e(csrf_field()); ?>

                    </form>
                </li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>

      </div>
    </nav>
   <div class="anim container-fluid w-75" style="margin-top: 5em;">
        
        <?php echo $__env->yieldContent('navbar'); ?>
        <?php $__env->startSection('panel'); ?> 
          <h1>Panel de administración</h1>

          <section class="row text-center placeholders">
          <?php if (Auth::user()->rol == '1'){ ?>
            
            <div class="col-sm-6">
            <div class="card card-block">
              <a href="<?php echo e(url('/liquidaciones')); ?>">
                <img src="<?php echo e(asset('../public/images/liquidaciones.png')); ?>" width="224" height="200" class="img-fluid rounded-circle" alt="Liquidaciones de sueldo">
              </a>
              <h4>Liquidaciones</h4>
              <div class="text-muted">Modulo 1</div>
            </div>
            </div>

            <div class="col-sm-6">
            <div class="card card-block">
              <a href="<?php echo e(url('recursos-humanos')); ?>">
                <img src="<?php echo e(asset('../public/images/rrhh.png')); ?>" width="200" height="200" class="img-fluid rounded-circle" alt="Administración de recursos humanos">
              </a>
              <h4>RR.HH</h4>
              <span class="text-muted">Modulo 3</span>
            </div>
            </div>
            <h3>Area supervisor</h3>
            <?php } ?>


            <?php if (Auth::user()->rol == '2'){ ?>
            <div class="col-sm-6">
            <div class="card card-block">
              <a href="<?php echo e(url('/matriculas')); ?>">
                <img src="<?php echo e(asset('../public/images/matriculas.png')); ?>" width="200" height="200" class="img-fluid rounded-circle" alt="Administración de matrículas">
              </a>
              <h4>Matrículas</h4>
              <span class="text-muted">Modulo 2</span>
            </div>
            </div>
            <h3>Area Administrador</h3>
            <?php } ?>

            <?php if (Auth::user()->rol == '3'){ ?>
            <div class="col-sm-6">
            <div class="card card-block">
              <a href="<?php echo e(url('/notas')); ?>">  
                <img src="<?php echo e(asset('../public/images/notas.png')); ?>" width="200" height="200" class="img-fluid rounded-circle" alt="Administración notas alumnado">
              </a>
              <h4>Notas</h4>
              <span class="text-muted">Modulo 4</span>
            </div>
            </div>
            <h3>Area profesor</h3>
            <?php } ?>
          </section>
        <?php echo $__env->yieldSection(); ?>
        <?php echo $__env->yieldContent('content'); ?>


    </div>
          
          
         

        
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../public/js/jquery.min.js"><\/script>')</script>-->
    <script src="<?php echo e(asset('../public/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('../public/js/bootstrap.min.js')); ?>"></script>
 
</body>
</html>