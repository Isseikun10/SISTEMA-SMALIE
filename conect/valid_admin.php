<?php
	require_once 'conect_bd.php'; 
	session_start();
	if(!ISSET($_SESSION['RFC'])){
		header('location:login.php');
	}
