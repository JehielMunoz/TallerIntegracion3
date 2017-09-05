<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EducaAdmin</title>
  <!-- ################################# -->
  <link rel="stylesheet" href="./assets/css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" href="./assets/css/style_x.css">
  <!-- ################################# -->
  <!-- ################################# -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
</head>
<body>
  <div class="container w-50 w_top-5">
    <div id="resultado"></div>
    <div class="card text-center card-outline-success">
      <div class="card-header ">
        <h5 class="text-uppercase text-center">Ingreso</h5>
      </div>
      <div class="card-block">
        <div id="resultado"></div>
        <div class="form-group">
          <input type="email" class="form-control input-lg" id="user" placeholder="Ingrese su email..." autofocus="">
        </div>
        <div class="form-group">
          <input type="password" class="form-control input-lg" id="pass" placeholder="Ingrese su contraseña...">
        </div>
        <hr/>
        <div class="form-group">
          <button id="BTN-log" name="BTN-log" href="#" class="btn btn-lg btn-block btn-info">Iniciar Sesión</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/w_data.js"></script>
</body>
</html>