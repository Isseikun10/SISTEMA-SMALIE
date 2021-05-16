<?php

require_once '../conect/valid_admin.php'; 

$accion = $_REQUEST;
$select_accion = $accion['funcion'] !='' ? $accion['funcion'] : '';


switch($select_accion) {
	case 'agregar':		
	preg_agregar();
	break;
	case 'actualizar':
	preg_update();
	break;	   
	case 'eliminar':
	preg_eliminar();
	break;
	case 'logout':
	logout();
	break;
	default:
	return;
}


function preg_agregar() {
	if(ISSET($_POST['Guardar_preg'])){ 
		$conn = getConn();

		$num_pregunta = $_POST['Num_Pregunta'];
		$enunciado = $_POST['Enunciado'];
		$tipo_preg = $_POST['list'];


		$qpreg = $conn->query("SELECT `Num_Pregunta`  FROM `Preguntas` WHERE `Num_Pregunta` = $num_pregunta ") or die(mysqli_error());
		$r_preg = $qpreg->fetch_array();	        

		if($r_preg['Num_Pregunta'] == $num_pregunta){
			echo "existente";				
		} 

		else {	

			$p_actual = fopen("Dat/periodo.dat", "r");
			while (!feof($p_actual)){
				$r_periodo = fgets($p_actual);
			}
			fclose($p_actual);	

			$isert_preg = $conn->query("INSERT INTO `Preguntas` VALUES( $num_pregunta, '$enunciado', $tipo_preg)") or die(mysqli_error());			
			$isert_res = $conn->query("INSERT INTO `Resultados` VALUES( $num_pregunta,'$r_periodo',0,0,0,0)") or die(mysqli_error());
			echo "guardada";			
		} 
	}
}

function preg_update() {
	if(ISSET($_POST['edit_pregunta'])){ 
		$conn = getConn();

		$num_pregunta = $_POST['Num_Pregunta'];
		$enunciado = $_POST['Enunciado'];
		$tipo_preg = $_POST['list'];

		$qpreg = $conn->query("UPDATE `Preguntas` SET  `Enunciado` = '$enunciado', `Id_Tipo` = '$tipo_preg'  WHERE  `Num_Pregunta` = $num_pregunta ") or die(mysqli_error());	
		echo "actualizada";
	}
}

function preg_eliminar() {		
	$conn = getConn();

	$Num_Pregunta = $_POST['eliminar_preg'];

	$q_eliminar = $conn->query("DELETE FROM `Preguntas` WHERE `Num_Pregunta` = $Num_Pregunta") or die(mysqli_error());

	echo "eliminada";
}


function logout() {
	session_start(); 
    session_destroy(); 
    header('location:../index.html'); 
}
