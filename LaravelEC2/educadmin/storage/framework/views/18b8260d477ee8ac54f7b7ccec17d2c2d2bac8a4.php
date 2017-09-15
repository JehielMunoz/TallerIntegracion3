<?php $__env->startSection('panel'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
	.div_deck_h{
		height: 22em;
	}
	.i_mgn_top{
		margin-top: 0.7em;
	}
	.div_mgn_top{
		margin-top: 1.2em;
	}
	.btn_mgn_top{
		margin-top: 1.5em;
	}
</style>
<div class="card-deck div_deck_h">
  <div class="card text-center">
  	<i class="fa fa-book fa-5x i_mgn_top" aria-hidden="true"></i>
    <div class="card-block div_mgn_top">
      <h4 class="card-title">Formulario de Inscripción de Alumno</h4>
      <a href="<?php echo e(url('formulario_matricula')); ?>" class="btn btn-outline-info btn_mgn_top" role="button">Ir a Formulario</a>
    </div>
  </div>
  <div class="card text-center">
  	<i class="fa fa-address-book fa-5x i_mgn_top" aria-hidden="true"></i>
    <div class="card-block div_mgn_top">
      <h4 class="card-title">Descripción de Matrícula de Alumno.-</h4>
      <a href="#" class="btn btn-outline-info btn_mgn_top" role="button">Ir a Formulario</a>
    </div>
  </div>
  <div class="card text-center">
  	<i class="fa fa-bug fa-5x i_mgn_top" aria-hidden="true"></i>
    <div class="card-block div_mgn_top">
      <h4 class="card-title">Otra Seccion importate!</h4>
      <a href="#" class="btn btn-outline-info btn_mgn_top" role="button">Ir a Formulario</a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.container', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>