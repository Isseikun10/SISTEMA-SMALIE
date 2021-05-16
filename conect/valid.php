<?php
	require_once 'conect_bd.php';
	session_start();
	if(!ISSET($_SESSION['Num_Control'])){
		header('location:login.php');		
	}