<?php	// salvar como gravarTime.php
if (! isset ($_POST ['id']))
die("Rotina chamada de forma incorreta!");
$codigo = $_POST ['id'];
$nome          = $_POST ['nome'];
$datanascimento       = $_POST ['datanascimento'];
$cro        = $_POST ['cro'];
$nomeDaMae        = $_POST ['nomeDaMãe'];
$nomeDoPai        = $_POST ['nomeDoPai'];
$endereco        = $_POST ['endereço'];
$bairro        = $_POST ['bairro'];
$cidade        = $_POST ['cidade'];
$estado        = $_POST ['estado'];
$cep        = $_POST ['cep'];
$telefone1        = (int)$_POST ['telefone1'];
$telefone2        = (int)$_POST ['telefone2'];
$celular        = (int)$_POST ['celular'];
$email        = $_POST ['email'];
$rg        = $_POST ['rg'];
$cpf        = $_POST ['cpf'];

    echo "<h2>Dados recebidos</h2>";
    echo "Nome do Doutor: $nome <br>"; 
echo "Data de Nacimento: $datanascimento <br>"; 
echo "Seu Cro: $cro <br>"; 
echo "Nome da Mãe: $nomeDaMae <br>"; 
echo "Nome do Pai: $nomeDoPai <br>";
echo "Endereço: $endereco <br>";
echo "Bairro: $bairro <br>";
echo "Cidade: $cidade <br>";
echo "Estado: $estado <br>";
echo "CEP: $cep <br>";
echo "Telefone 1: $telefone1<br>";
echo "Telefone 2: $telefone2 <br>";
echo "Celular: $celular <br>";
echo "RG: $rg <br>";
echo "CPF: $cpf <br>";
	



		// mostrar os dados do arquivo na tela
		

	//Conectar a string de alteração de dados
	include "conexao.php";
	
	
	// 3 - ceiando a string de alteração de dados
	$sql = "Update Doutor
SET
nome='$nome',
datanascimento='$datanascimento', 
cro='$cro',
nomeDaMae='$nomeDaMae',
nomeDoPai='$nomeDoPai',
endereco='$endereco',
bairro='$bairro',
cidade='$cidade',
estado='$estado',
cep='$cep',
telefone1='$telefone1',
telefone2='$telefone2',
celular='$celular',
email='$email',
rg ='$rg',
cpf='$cpf'";
	
	// finalizo com WHERE
	$sql = $sql ."WHERE id =$codigo";
	
	//die ("<hr>Comando SQL: <br> $sql <br>") ;
	
	// 4 - Enviando o comando de inserção para o MYSQL
	mysqli_query($con, $sql) or 
		die("Erro na inserção de registro no banco:" .
			mysqli_error($con) );
			
	echo "Dados gravados com sucesso!";
	
?>
<hr>
<a href= "listaDoutor.php"> Listagem de Doutores </a>







