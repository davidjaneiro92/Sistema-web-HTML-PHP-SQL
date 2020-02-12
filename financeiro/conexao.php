<?php	
	$url="localhost";
	$user="root";
	$password="";
	$db="clinica";
	$conexao=mysqli_connect($url,$user,$password);
	mysqli_select_db($conexao,$db)or
	die("Erro ao abrir o banco $db:".mysqli_error($conexao));