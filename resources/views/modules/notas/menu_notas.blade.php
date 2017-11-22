<?php
  $nivel=DB::table('rel_tEmpleado_Curso')->where('Rut','=','152300867')->get();
?>
<div class="col-md-3 cold-xs-1" id="sidebar">
  <div class="list-group panel ">
    <ul class="list-unstyled components">
      @foreach ($nivel as $k)
      <li>
          <button style="width: 10em;" class="btn btn-primary btn-lg btn-block" name="btn-nivel" value="{{$k->Rut}}">{{$k->Curso}}</button>
      </li>
      <div style="height: 5px;"></div>
      @endforeach
    </ul> 
  </div>
</div>