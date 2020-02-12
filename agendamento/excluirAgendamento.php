<?php 
	
	$codigo = $_GET['c'];
	echo "Eliminar time codigo: $codigo <br>";
	
	// 1 conectar no MYSQL(via PHP)
	
	$url = 'localhost';
	$user = 'root';
	$senha= '';
	
	$con = mysqli_connect($url, $user, $senha);
	
	$db = 'clinica';
	mysqli_select_db($con,$db)or
		die("erro naseleção do banco".
	mysqli_error($sql));

//criar a variavel c/ comando de exclusão

$sql="DELETE FROM cadAgd WHERE id = $codigo";

mysqli_query($con, $sql)or
die ("erro na exclusão do Agendamento $codigo:"
.mysqli_error($con));

// se chegou aqui - excluiu
echo "Agendamento $codigo excluido com sucesso. <hr>";
echo "<a href=' listaAgendameto.php'>listagem de Agendamento</a>";

?>