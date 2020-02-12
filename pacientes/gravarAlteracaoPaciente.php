<?php

	if (! isset($_POST['id']))
	die("Rotina chamada de forma incorreta!");
    $codigo = $_POST['id'];
		
	

	$nome  = $_POST['nome'];
	$cpf   = $_POST['cpf'];
	$nasc  = $_POST['nasc'];	
	$cas   = 0;
	if (isset($_POST['cas']) )
	$cas=$_POST['cas'];
	$sex   = $_POST['sex'];
	$cad   = $_POST['cad'];			
	$conv  = $_POST['conv'];	
	$prof  = $_POST['prof'];
	$end   = $_POST['end'];
	$cep   = $_POST['cep'];
	$num   = (int)$_POST['num'];				
	$comp  = $_POST['comp'];			
	$cid   = $_POST['cid'];
	$bair  = $_POST['bair'];
	$est   = $_POST['est'];
	$tel   = (int)$_POST['tel'];
	$cel   = (int)$_POST['cel'];
	$fot   = $_FILES['fot'];
	$obs   = $_POST['obs'];
	
echo "Nome do Paciente: $nome<br>";
echo "CPF: $cpf<br>";
echo "Data de nascimento: $nasc<br>";
echo "Casado: $cas<br>";
echo "Data de cadastro: $cad <br>";
echo "Sexo: $sex<br>";
echo "Convênio:$conv<br>" ; 
echo "Profissão:$prof <hr>";
echo "Endereço: $end<br>";
echo "CEP: $cep<br>";
echo "Número: $num<br>";
echo "Complemento:$comp<br>";
echo "Cidade: $cid<br>";
echo "Bairro: $bair<br>";
echo "Estado: $est<br>";
echo "Telefone:$tel<br>"; 
echo "Celular: $cel<br>";
echo " OBS: $obs<br>";
	
	if (strlen($nome) < 3)
	{
	echo "O nome deve ter pelo menos 3 caracteres. Informe novamente<br>";
	die("Programa Cancelado");
	}
	if (strlen($cpf) < 11)
	{
	echo "O CPF deve conter 11 numeros! Informe novamente<hr>";
	die("Programa Cancelado");
	}
	if (strlen($cep) < 8)
	{
	echo "<hr> O CEP deve conter 8 numeros, favor Informe novamente<hr>";
	die("Programa Cancelado");
	}
	$nomeArquivo = $_FILES['fot'] ['name'];
	$tipoArquivo = $_FILES['fot'] ['type'];
	$tamanhoArquivo = $_FILES['fot'] ['size'];
	$nomeTemporario = $_FILES['fot'] ['tmp_name'];
  
	if($nomeArquivo !=="")
	{

		   echo "<hr>";
		   echo "nome Arq (original): $nomeArquivo<br>";
		   echo "tipo: $tipoArquivo <br>";
		   echo "tamanho: $tamanhoArquivo<br>";
           echo "Nome (temp ): $nomeTemporario<br>";
		   
	$nomeFinal = "pastaDestino/" . $_FILES['fot'] ['name'];
	if ( move_uploaded_file($nomeTemporario, $nomeFinal) )
	echo 'arquivo transferido p/ a pasta pastaDestino. <br>';
		else
	echo "Ocorreu algum erro ao tentar mover o
	arquivo de foto para > pastaDestino.<br>";
	}	
	//Conecta no MYSQL  e abre o banco
		
		include "conexao.php";
		
	// criando string de alteração de dados
	
		$sql = "UPDATE paciente SET
			nome='$nome',
			cpf='$cpf',			 
			nascimento = '$nasc', 
			casado = '$cas',
			sexo = '$sex',
			dataRegistro = '$cad',
			convenio = '$conv',
			profissao = '$prof',
			endereco = '$end',
			cep = '$cep',
			numero = '$num', 
			complemento = '$comp',
			cidade = '$cid', 
			bairro = '$bair',
			estado = '$est',
			telefone = '$tel', 
			telefone_celular = '$cel', 
			obs = '$obs'";

			/*se o nome do arquivo foi informado/existe
			    atualizar o campo da tabela com ele*/
				
		if($nomeArquivo !=="")
		$sql = $sql . ",arquivo='$nomeArquivo'";
	
				//finalizo com o WHERE 
		$sql = $sql . " WHERE iDpaciente=$codigo";
		
		//printar comando na tela para testar no Console MYSQL, se dar certo tirar o comentario
		//	die ("<hr>Comando SQL:<br> $sql <br>");
	

		// 4 - Enviando o comando de inserção para o MYSQL
		mysqli_query($conexao, $sql) or 
		die("Erro na inserção de registro no banco:" . mysqli_error($conexao) );
		
		echo " Dados gravados com sucesso!";
?>
 <a href="Pa_Listagem.php"><br>Listagem de Pacientes</a>