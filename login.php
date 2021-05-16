<!DOCTYPE html>
<?php 
session_start();
if(ISSET($_SESSION['clave'])){
  header('location:home.php');
}
?>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 shrink-to-fit=no">
  <title>SMALIE</title>
  <link rel="icon" href="img/smalie.ico"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>   
</style>
<body style="background-color:#00bfff;">
  <div class="container">         
    <div class="card card-container">   
      <img id="profile-img" class="profile-img-card" src="img/login.png">        
      <p id="profile-name" class="profile-name-card"></p>
      <div class="row">
        <div class="col-lg-12">                  
          <form id="valid_login" name="valid_login" role="form" method="post">
            <label>Tipo de Usuario:</label>
            <div class="input-group-prepend">
              <select id="usr" name="usr" class="form-control" required="">
                <option value="usr_admin">Administrador</option>
                <option value="usr_e">Usuario Encuesta</option>
              </select>
            </div>
            <div class="form-group has-feedback">
              <i class="fa fa-user form-control-feedback"></i>
              <input type="text" class="form-control" name="num_control" id="num_control"  placeholder="Número de Control">
            </div>
            <div class="form-group has-feedback">
              <i class="fa fa-key form-control-feedback"></i>
              <input type="password" class="form-control" name="rfc" id="rfc" placeholder="RFC XXXXXXXXXXXXX" maxlength="13">
            </div>
            <div class="col-xs-12 form-group">     
              <button type="submit" name="login-submit" id="login-submit"  class="form-control btn btn-signin"><span class="spinner"><i class="icon-spin icon-refresh" id="spinner"></i></span>Ingresar
              </button>
            </div>
            <div class="alert alert-danger" role="alert" id="error" style="display: none; margin-top: 22%;">...</div>
          </form>
        </div>
      </div>
    </div>
  </div>     
</body>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/valid_login.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
</html>