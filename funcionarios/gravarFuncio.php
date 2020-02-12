<?php
	$nome			= $_POST['nome'];
	$cpf			= $_POST['cpf'];
	$email			= $_POST['email'];
	$telefone		= $_POST['telefone'];
	$sexo			= $_POST['sexo'];
	$datanasc	    = $_POST['data'];
	$uf				= $_POST['uf'];
	$cidade			= $_POST['cidade'];
	$escolaridade	= $_POST['escolaridade'];
	$curso			= $_POST['curso'];
	$areainteresse 	= $_POST['areainteresse'];
	 
	echo "<h2>Dados recebidos</h2>";
   
	echo "Nome Completo: $nome <br>";
	echo "Informe seu CPF: $cpf <br>" ;
	echo "E-mail: $email <br>" ;
	echo "Telefone: $telefone <br>" ;
	echo "Sexo: $sexo <br>" ;
	echo "Data nasc: $datanasc <br>" ;
	echo "UF: $uf <br>";
	echo "cidade: $cidade <br>" ;
	echo "Escolaridade: $escolaridade <br>" ;
	echo "Curso Superior/Cursando: $curso <br>" ;
	echo "Área de interesse: $areainteresse <br>" ;
	echo "<hr>";
	

	include "conexao.php";
	
	// 3 - Criando a string de insersaoo de dados
	$sql = "INSERT INTO funcionario
	(nome,cpf,email,telefone,sexo,datanasc,uf,cidade,escolaridade,curso,areainteresse) 
	VALUES
	('$nome','$cpf','$email','$telefone','$sexo','$datanasc','$uf','$cidade','$escolaridade','$curso','$areainteresse')";
	
	
	// 4 - Enviando o comando de insersao para o MYSQL
	mysqli_query($con, $sql) or 
		die("Erro na insersao de registro no banco:" .
			mysqli_error($con) );
			
	echo "Dados gravados com sucesso!";
	?>
	<hr>
	<a href="listaFuncio.php">Lista de Funcionário</a>