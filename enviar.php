<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8" />
<meta http-equiv="refresh" content="6; URL=procesos/funciones_query.php?funcion=logout">

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
<br>
    <img src="img/header.png" width="1000px" height="80px" class="centrado"/>
</div>

<br>

<div class="container">
    <?php       
              
        $periodo = fopen("procesos/Dat/periodo.dat", "r");
        while (!feof($periodo)){
            $periodo_actual = fgets($periodo);
        }
        fclose($periodo);        
    ?>

<h2 align="middle"> Agradecemos su participación en la encuesta de Mejora de Ambiente Laboral del periodo <?php echo $periodo_actual?>.</h2>
<h2 align="middle"> En unos momentos se redirigirá a la página principal del sistema SMALIE.             </h2>


    <p class="lead">    
    
    <div class="pix-green-yellow-2 big-text pix-margin-bottom-10">  
        
        <h6 align="middle" ><span class="pix_edit_text"> Nota: Las respuestas enviadas dentro del sistema son confidenciales, nadie tiene acceso a ellas. </span> </h6>
        <img src="img/encuesta.png" width="300px" height="175px" class="centrado" />
    </div>
  </p>

<br>
<br>
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
error_reporting(E_ALL ^ E_NOTICE);

require_once 'conect/valid.php'; $conn = getConn();

        $periodo = fopen("procesos/Dat/periodo.dat", "r");
        while (!feof($periodo)){
            $periodo_actual = fgets($periodo);
        }
        fclose($periodo);

$Num_Control=$_SESSION['Num_Control'];

$sql = $conn->query("SELECT * FROM `Preguntas` ") or die(mysqli_error()); // Se crea una variable sql en la cual se hara una sentencia Select

while($mostrar=$sql->fetch_array())
	{
		$Num_Pregunta=$mostrar['Num_Pregunta']; // Esta linea me ayuda a obtener el número de pregunta
		$respuestas[]=$_POST['pregunta'.$Num_Pregunta];
		//echo $_POST['pregunta'.$Num_Pregunta]."<br>"; // Esta línea me ayuda a imprmir las respuestas

	} // FIN DEL WHILE

// Este for me ayuda a mostrar las respuesta obtenidas de la encuesta
for ($i=0; $i < $Num_Pregunta ; $i++) 
{
	//echo "<br/> Pregunta ".($i+1)." respuesta: ".$respuestas[$i];


// Se insertan los datos conforme a la respuesta en cada regunta correspondiente 
	if($respuestas[$i]=="Excelente")
	{
		$InsertarExcelente=$conn->query("UPDATE `Resultados` SET Cont_Excelente=(Cont_Excelente+1) WHERE Num_Pregunta=".($i+1)." AND Periodo='$periodo_actual';") or die(mysqli_error());	
	}

	if($respuestas[$i]=="Bueno")
	{
		$InsertarBueno=$conn->query("UPDATE `Resultados` SET Cont_Bueno=(Cont_Bueno+1) WHERE Num_Pregunta=".($i+1)." AND Periodo='$periodo_actual';") or die(mysqli_error());		
	}

	if($respuestas[$i]=="Regular")
	{
		$InsertarRegular=$conn->query("UPDATE `Resultados` SET Cont_Regular=(Cont_Regular+1) WHERE Num_Pregunta=".($i+1)." and Periodo='$periodo_actual';") or die(mysqli_error());	
	}

	if($respuestas[$i]=="Deficiente")
	{
		$InsertarDeficiente=$conn->query("UPDATE `Resultados` SET Cont_Deficiente=(Cont_Deficiente+1) WHERE Num_Pregunta=".($i+1)." and Periodo='$periodo_actual';") or die(mysqli_error());	
	}

}

/*
$InsertarChecar=$conn->query("SELECT sum(Cont_Excelente+Cont_Bueno+Cont_Regular+Cont_Deficiente)/count(Num_Pregunta) 'El total de encuestas realizadas son' FROM Resultados WHERE Periodo='Ago 2018/Ene 2019';") or die(mysqli_error());
$mostrarContador=$InsertarChecar->fetch_array();
*/

/*
echo("<br>");
echo "<br> El contador de encuesta realizadas es: ".$mostrarContador['El total de encuestas realizadas son'];
*/

$q_admin = $conn->query("SELECT checar FROM `Control` WHERE `Num_Control` = '$Num_Control'") or die(mysqli_error());
$v_admin = $q_admin->fetch_array();

if ($v_admin['checar']=="Pendiente")
{
	$Encuesta=$conn->query("UPDATE `Control` SET `checar`= 'Realizado' WHERE `Num_Control`='$Num_Control' && Periodo= '$periodo_actual';") or die(mysqli_error());   
} 

else 
{
	$Encuesta=$conn->query("INSERT INTO `Control` (`IdControl`,`Periodo`, `Num_Control`, `checar`) VALUES (null,'$periodo_actual','$Num_Control','Realizado');") or die(mysqli_error()); 
} 

 

?>

