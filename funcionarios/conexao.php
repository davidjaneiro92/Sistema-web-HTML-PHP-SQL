<?php
$url="localhost";
$user="root";
$password="";
$db="clinica";
$con = mysqli_connect ($url, $user, $password);
mysqli_select_db($con,$db) or
	die ("Erro de seleção do banco $db:".
		mysqli_error($con));
?>