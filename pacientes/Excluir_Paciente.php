<?php	

	$id = $_GET['c'];
	
	echo "Eliminando Paciente codigo: $id <br>";
	
	// 1 - Conectar no MYSQL (via PHP)
	include "conexao.php";

	mysqli_select_db($conexao, $db) or 
		die("Erro na selecaodo do banco:" . 
				mysqli_error($sql)  );
				
	// 3 - Criar a variavel c/ comando de exclusao
	$sql="DELETE FROM paciente WHERE iDpaciente = $id";
	
	// Testando o comando (comente depois)
	//die($sql);
	
	// 4 - Mandar o MYSQL executar o comando ($sql)
	mysqli_query($conexao, $sql) or 
		die("Erro na exclusao do Paciente $id: " 
			. mysqli_error($conexao)   );
			
	// Se chegou aqui - excluiu
	echo "Paciente $id excluido com sucesso. <hr>";
	echo "<a href='Pa_Listagem.php'>Listagem de Pacientes</a>";
?>