<?php
	
	error_reporting(0);
	
	session_start();
	
	
	$_SESSION['id1'] = $_POST['id1'];
	$_SESSION['id'] = $_POST['id'];
	
	$_SESSION['id2'];
	
	
	include 'pasoDatosProtectora.php';
	
	if(isset($_SESSION['protectora'])){
		
		$prot=$_SESSION['protectora'];
		echo $prot;
	}
?>