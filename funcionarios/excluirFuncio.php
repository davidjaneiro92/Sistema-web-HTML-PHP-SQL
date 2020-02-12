<?php	

	$codigo = $_GET['c'];
	echo "Vou excluir o funcionario $codigo <br>";

	include "conexao.php";
	
	//	3 - criar a variável com o comando de de exclusao
	$sql = "DELETE FROM funcionario WHERE $codigo";
	
	// Mostrando o comando na tela p/testar
	//die($sql);
	
	// 4 - enviar a variavel de comando para o MYSQL
	mysqli_query($con, $sql) or 
		die("Erro na elimina~ção do funcionario 
			codigo $codigo: " . 
				mysqli_error($con) );
				
	// 5 - Se chegou até aqui - deletou :)
	echo "Registro $codigo excluido com sucesso!<hr>";
	echo "<a href='listaFuncio.php'>Listagem de Funcionário</a>"; 
	
?>