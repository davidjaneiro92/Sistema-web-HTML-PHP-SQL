<?php 
 
	$codigo=$_GET['c'];
	echo"Eliminando código: $codigo<br>";

	include "conexao.php";

	$sql="DELETE FROM financeiro WHERE id = $codigo";

	//die($sql);

	mysqli_query($conexao,$sql)or
	die("Erro na exclusão do time $codigo: ".mysqli_error($conexao));	

	echo "$codigo excluido com sucesso.<hr>";	
?>
<a href='Listagem.php'>Listagem Financeiro</a>