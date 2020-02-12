<?php
$codigo =$_GET['c'];
echo"Eliminando Especialidade código: $codigo<br>";

include "conexao.php";
	
$sql = "DELETE FROM especialidade WHERE id=$codigo";
mysqli_query($conexao,$sql) or
	die ("Erro na exclusão da especialidade $codigo: ". mysqli_error($con));
	
echo "Especialidade $codigo excluido com sucesso.<hr>";
		echo"<a href='listagem.php'>Listagem de Especialidade</a>";

?>