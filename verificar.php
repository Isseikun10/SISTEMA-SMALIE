<!DOCTYPE html>

<?php
error_reporting(E_ALL ^ E_NOTICE);

require_once 'conect/conect_bd.php'; $conn = getConn(); 
?>


<html lang="es">
<head>

<meta charset="utf-8" />
<meta http-equiv="refresh" content="5; URL=procesos/funciones_query.php?funcion=logout">

<title> Encuesta SMALIE </title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="main1.css" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="css/pix_style.css" />
    <link rel="stylesheet" type="text/css" href="css/main1.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="css/animations.min.css" rel="stylesheet" type="text/css" media="all" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<br>

<div class="container1">
<br>
    <img src="img/header.png" width="1000px" height="80px" class="centrado"/>
</div>

<br>

<div class="container">

<h2 align="middle"> ¡Usuario ya a realizado la encuesta!. </h2>
<h2 align="middle"> En unos momentos se redirigirá a la página principal del sistema SMALIE.      </h2>


    <p class="lead">    
    
    <div class="pix-green-yellow-2 big-text pix-margin-bottom-10">  
    <img src="img/encuesta.png" width="300px" height="175px" class="centrado" />
        
    </div>
  </p>

<br>
        <img src="img/banners.png" width="900px" height="65px" class="centrado" />

<div class="footer">
    <div class="col-md-12 col-xs-12">
        <div class="pix-padding-v-25 text-center">
            <span class="pix_edit_text pix-black-gray-light">Creative Solution Copyright © 2018  All Rights Reserved</span>
        </div>
    </div>
</div>
</body>
</html>