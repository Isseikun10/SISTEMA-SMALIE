
<!DOCTYPE html>

    <?php        
        require_once 'conect/valid.php'; $conn = getConn();
        
        $periodo = fopen("procesos/Dat/periodo.dat", "r");
        while (!feof($periodo)){
            $periodo_actual = fgets($periodo);
        }
        fclose($periodo);
            
        $sql1 = $conn->query("SELECT Periodo FROM Control") or die(mysqli_error());
        $mostrar1=$sql1->fetch_array();
        $Num_Control=$_SESSION['Num_Control'];
        $Checar = $conn->query("SELECT checar FROM Control WHERE Num_Control = '$Num_Control' && Periodo = '$periodo_actual'") or die(mysqli_error());
        $mostrarChecar=$Checar->fetch_array();
                
        if($mostrarChecar['checar']=="Pendiente")
        { 
    ?>

<html lang="es">
<head>


<script language="JavaScript"> 

function pregunta(e)
{ 
    if (confirm('¿Estas seguro de enviar estas respuestas de su encuesta?'))
	{ 
		return true; 
	}
	else
	{
		return false;
	} 
}

</script> 


    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Encuesta SMALIE </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main1.css" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="css/pix_style.css" />
    <link rel="stylesheet" type="text/css" href="css/main1.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="css/animations.min.css" rel="stylesheet" type="text/css" media="all" />

    <script src="main.js"></script>
    <script src="js/jquery-1.11.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/velocity.min.js"></script>
    <script src="js/velocity.ui.min.js"></script>
    <script src="js/appear.min.js" type="text/javascript"></script>
    <script src="js/animations.min.js" type="text/javascript"></script>
    <script src="js/plugins.js?v=1.0.1"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js_demo/custom-demo.js?v=1.0.2"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

    <br>

    <div class="container1">

    <h6 align="right"><a class="btn d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="procesos/funciones_query.php?funcion=logout"> Cerrar Sesión</a></h6>
        <img src="img/header.png" width="1000px" height="80px" class="centrado"/>
    </div>


    <div class="container">


    <h5 align="middle"> Periodo: <?php echo utf8_encode($mostrar1['Periodo']);?> </h5>

    <?php


    $q_trabajador = $conn->query("SELECT * FROM Trabajador INNER JOIN Area ON Trabajador.Cod_Area = Area.Cod_Area INNER JOIN Departamento ON Trabajador.Cod_Departamento = Departamento.Cod_Departamento WHERE Num_Control='$Num_Control';") or die(mysqli_error());
    $f_trabajador = $q_trabajador->fetch_array();

    ?>

    <h5 align="middle"> El área de adscripción es: <?php echo utf8_encode($f_trabajador['Nombre_Area'])?>   </h5>
    <h5 align="middle"> Carrera: <?php echo utf8_encode($f_trabajador['Nombre_Departamento'])?>             </h5>

    <?php

    $sql3 = $conn->query("SELECT * FROM `Preguntas`;") or die(mysqli_error());

    while($mostrar3=$sql3->fetch_array())
            {
            $Num_Pregunta=$mostrar3['Num_Pregunta'];
            $Enunciado=$mostrar3['Enunciado'];

    ?>

        <form name="formularioDatos" enctype="multipart/form-data" method="post" action="enviar.php">

        <p class="lead">
        
        <div class="pix-green-yellow-2 big-text pix-margin-bottom-10">  
        <span class="pix_edit_text"> <?php echo $Num_Pregunta.".-";?><?php echo utf8_encode($Enunciado);?> </h6> 
        </div>

        &nbsp; <input name="pregunta<?php echo($Num_Pregunta);?>" type="radio" value="Excelente" required="required"><span class="pix_edit_text"> Excelente </span>
        &nbsp;&nbsp;&nbsp;&nbsp; <input name="pregunta<?php echo($Num_Pregunta);?>" type="radio" value="Bueno" required="required"><span class="pix_edit_text"> Bueno </span>
        &nbsp;&nbsp;&nbsp;&nbsp; <input  name="pregunta<?php echo($Num_Pregunta);?>" type="radio" value="Regular" required="required"><span class="pix_edit_text"> Regular </span>
        &nbsp; <input  name="pregunta<?php echo($Num_Pregunta);?>" type="radio" value="Deficiente" required="required"><span class="pix_edit_text"> Deficiente </span>
    </p>

    <?php

    }

    ?>

    <br>

    <div align="center">
            
    <input type="submit" name="submit" value="Enviar Respuestas" class="btn green-blue-bg btn-md small-text pix-white pix-margin-top-13 pix-margin-right-13 pix-inline-block pix-margin-bottom-15" style="background-color: #1FB930" onclick="return pregunta();" required="required">

    <input type="reset" value="Borrar Respuestas" class="btn green-blue-bg btn-md small-text pix-white pix-margin-top-13 pix-margin-right-13 pix-inline-block pix-margin-bottom-15" style="background-color: #F30501">

    </div>

    </form>
    <br>
        <img src="img/banners.png" width="900px" height="65px" class="centrado" />

    <br>

    <div class="footer">
        <div class="col-md-12 col-xs-12">
            <div class="pix-padding-v-25 text-center">
                <span class="pix_edit_text pix-black-gray-light">Creative Solution Copyright © 2018  All Rights Reserved</span>
            </div>
        </div>
    </div>

</body>
</html>

    <?php
    }

    else
    {
        header("location:verificar.php"); 
    }

    ?>