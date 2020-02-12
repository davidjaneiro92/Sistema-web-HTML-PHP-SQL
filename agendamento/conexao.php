<?php	// salvar como conexao.php
	$url="localhost";
	$user="root";
	$password = "";
	$db = "clinica";

	
	// 1 - Conectar no MYSQL
	$con = mysqli_connect($url, $user, $password);
	
	// 2 - Abrir / Selecionar o banco
	mysqli_select_db($con, $db) or 
		die("Erro ao abrir o banco $db:" . 
			mysqli_error($con) );

mysqli_set_charset($con,"utf8");
?>