<?php 

/* archivo requerido para la conexcion la base de datos*/
require_once '../conect/valid_admin.php'; 

$accion = $_REQUEST;
$select_accion = $accion['funcion'] !='' ? $accion['funcion'] : '';


switch($select_accion) {
	case 'list_periodo':		
	periodo();
	break;
	case 'Tip-preg':
	TipoPreg();
	break;	   
	case 'Enunciado':
	enunciado();	
	break;	   
	case 'list-preg':
	listPreg();	 
	break;  
	default:
	return;
}

/* ------------Funcion optiene lista de periodos-------------*/
function periodo(){
	function get_p(){	   

	    $conn=getConn();

	    $q_periodo = $conn->query("SELECT id_periodo, fecha_p  FROM `Periodos`") or die(mysqli_error()); 

		$list_periodo = '<option value="">Elige una opción</option>';
		
		while($q_resltP = $q_periodo->fetch_array(MYSQLI_ASSOC))
		{
			
			$r_id = $q_resltP['id_periodo'];  
			$r_perd = $q_resltP['fecha_p'];

			/*------Resultado, se envia al archivo opcion.js----------------------*/	
			$list_periodo .= "<option value='$r_id'>$r_perd</option>";
		}

		return $list_periodo;		
	}
	echo get_p();
}


function TipoPreg(){
	function getTipoPreg(){  
		$conn = getConn();
		
		/*------Conculta, optiene listado de tipo de preguntas---------*/
		$q_tipo = $conn->query("SELECT Id_Tipo, Tipo  FROM `Tipos`") or die(mysqli_error()); 
		
		$list_tipo = '<option value="">Eliga una opción</option>';

		while($q_result = $q_tipo->fetch_array(MYSQLI_ASSOC))
		{
			
			$q_resul_t = utf8_encode($q_result['Tipo']);
			$q_resul_id = $q_result['Id_Tipo'];

			/*------Resultado, se envia al archivo opcion.js----------------------*/	
			$list_tipo .= "<option value='$q_resul_id'>$q_resul_t</option>";
		}

		return $list_tipo;

	}  
	echo getTipoPreg();
}

function enunciado(){
	function getEnunciado(){

		$conn = getConn();
		$id_Tipo = $_POST['Id_Tipo'];

		/*---------Realiza la consulta cuando es selecionado un tipo de pregunta-----------*/
		$q_enunciado = $conn->query("SELECT * FROM `Preguntas` WHERE Id_Tipo = $id_Tipo") or die(mysqli_error());
		
		$lista_enunciado = '<option value="">Elige una opción</option>';

		while($q_result = $q_enunciado->fetch_array(MYSQLI_ASSOC))
		{
			$q_resul_e = utf8_encode($q_result['Enunciado']);
			$q_resul_n = $q_result['Num_Pregunta'];

			/*Resultado, se madara al archivo opcion.js---------------------*/
			$lista_enunciado .= "<option  value='$q_resul_n'>$q_resul_n.- $q_resul_e</option>";
		}
		return $lista_enunciado;
	}
	echo getEnunciado();
}

function listPreg(){
	function getlisPreg(){
		$conn = getConn();
		
		/*------Conculta, optiene listado de tipo de preguntas---------*/
		$q_tip = $conn->query("SELECT Id_Tipo, Tipo  FROM `Tipos`") or die(mysqli_error()); 
		
		$lis_tip = '<option value="">Eliga una opción</option>';

		while($q_resul = $q_tip->fetch_array(MYSQLI_ASSOC))
		{
			
			$q_resl_t = utf8_encode($q_resul['Tipo']);
			$q_resl_id = $q_resul['Id_Tipo'];

			/*------Resultado, se envia al archivo opcion.js----------------------*/	
			$lis_tip .= "<option value='$q_resl_id'>$q_resl_t</option>";
		}

		return $lis_tip;
	}
	echo getlisPreg();
}






