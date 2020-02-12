<?php
// salvar como conexao.php
	$url = "localhost";
	$user = "root";
	$password = "";
	$db = "clinica";
	
	// 1 - Conectar no MySQL
	
	$con = mysqli_connect($url, $user, $password);
	
	// 2 - Abrir / Selecionar o banco
	mysqli_select_db($con, $db) or
		die(" Erro ao abrir o banco $db:" . mysqli_error($con));
	






?>