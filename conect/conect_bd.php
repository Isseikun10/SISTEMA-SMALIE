<?php
function getConn(){ 
	$conn = new mysqli('localhost', 'creativ3_admin', 'JI8~6U.B8+sP', 'creativ3_SMALIEBD') or die(mysqli_error());
    if(!$conn){
	   die("Error: error de conexión con la Base de Datos!");
	}
 return $conn;
}

