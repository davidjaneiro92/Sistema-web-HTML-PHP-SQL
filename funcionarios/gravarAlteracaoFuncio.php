<?php	
if(! isset ($_POST['id']))
		die("Rotina chamada de forma incorreta");

	$codigo = $_POST['id']; 
    
	$nome			= $_POST['nome'];
	$cpf			= $_POST['cpf'];
	$email			= $_POST['email'];
	$telefone		= $_POST['telefone'];
	$sexo			= $_POST['sexo'];
	$datanascimento = $_POST['data'];
	$uf				= $_POST['uf'];
	$cidade			= $_POST['cidade'];
	$escolaridade	= $_POST['escolaridade'];
	$curso			= $_POST['curso'];
	$areainteresse 	= $_POST['areainteresse'];

    
	echo "Nome Completo: $nome <br>";
	echo "Informe seu CPF: $cpf <br>" ;
	echo "E-mail: $email <br>" ;
	echo "Sexo: $sexo <br>" ;
	echo "Data de Nascimento: $datanascimento <br>" ;
	echo "UF: $uf <br>" ;
	echo "cidade: $cidade<br>";
	echo "Escolaridade: $escolaridade <br>" ;
	echo "Curso Superior/Cursando: $curso <br>" ;
	echo "Área de interesse: $areainteresse <br>" ;
	

	include "conexao.php";
	
	// 3 - Criando a string de insersao de dados
	$sql ="UPDATE funcionario
					SET 
					nome = '$nome' ,
					cpf = '$cpf' ,
					email = '$email' ,
					telefone = '$telefone' , 
					sexo = '$sexo' ,
					datanasc = '$datanascimento' ,
					uf= '$uf' ,
					cidade= '$cidade' ,
					escolaridade = '$escolaridade' ,
					curso = '$curso' , 
					areainteresse = '$areainteresse'";
	
					
	$sql = $sql . "WHERE id =$codigo ";
	//die("<hr>Comando SQL: <br> $sql <br>");
	
	
	
	
	// 4 - Enviando o comando de insersao para o MYSQL
	mysqli_query($con, $sql) or 
		die("Erro na insersao de registro no banco:" .
			mysqli_error($con) );
			
	echo "Dados gravados com sucesso!";
	?>
	<hr>
	<a href="listaFuncio.php">Lista de Funcionário</a> 