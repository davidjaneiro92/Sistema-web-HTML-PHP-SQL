<?php // salvar como excluirTime.php
 
	//echo"Pagina de exclusão!!";
	$codigo = $_GET['c'];
	echo"Eliminando Doutor código: $codigo<br>";
	//1- Conectar no MYSQL (via PHP)
	$url='localhost';
	$user= 'root';
	$senha='';
	
	$con=mysqli_connect($url, $user, $senha);
	// 2- Abrir o banco de dados
	$db='clinica';
	
	mysqli_select_db($con,$db)or 
	die("Erro na seleção do banco: ".mysqli_error($sql));
	
	//3- Criar a variavel c/ comando de exclusao
	$sql="DELETE FROM Doutor WHERE id = $codigo";
	//testando o comando(comente depois)
	//die($sql);
	
	//4- Mandar o MYSQL executar o comando($sql)
	mysqli_query($con,$sql)or
	die("Erro na exclusão do Doutor $codigo: ". mysqli_error($con));
	
	//Se chegou aqui - excluiu
	echo "Doutor $codigo excluido com sucesso.<hr>";
	echo"<a href='listaClinica.php'>Listagem de Doutores</a>";
	
 
?>