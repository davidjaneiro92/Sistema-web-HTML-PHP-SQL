<?php
if(! isset ($_POST['id']))
		die("Rotina chamada de forma incorreta");

	$codigo = $_POST['id'];


$espec	=	$_POST['especialidade'];
$trat	=	$_POST['tratamento'];
$val	=	(int)$_POST['valor'];
$desc	=	$_POST['descricao'];
$dat 	=  	$_POST['data'];
$ativo	=	0;
if (isset($_POST['ativo']))
	$ativo = $_POST['ativo'];

echo "<h2>Dados recebidos</h2>";
echo "Especialidade: $espec<br>";
echo "Tratamento: $trat<br>";
echo "Valor: R$ $val<br>";
echo "Ativo: $ativo<br>";
echo "Descrição: $desc<br>";
echo "Data de Inclusão: $dat<br>";

if ($espec==""){
	echo "Atenção! Especialidade Vazia.<br>";
die ("Encerrado");
}
if ($trat=="") {
	echo "Atenção! Tratamento Vazio.<br>";
	die ("Encerrado!");
}
if ($val>500){
	echo "Valor Inválido!<br>";
	die("Encerrado!");
}
if ($desc==""){
	echo "Atenção! Informe a descrição.<br>";
	die("Encerrado");
}
if ($dat==""){
	echo "Atenção! Informe a data de inclusão.<br>";
	die("Encerrado");
}
$nomeArquivo 	= 	$_FILES['icone']['name'];
$tipoArquivo 	= 	$_FILES['icone']['type'];
$tamanhoArquivo = 	$_FILES['icone']['size'];
$nomeTemporario = 	$_FILES['icone']['tmp_name'];


if ($nomeArquivo <> "")
{
	
	echo "<hr>";
	echo"Nome Arq (Original): $nomeArquivo<br>";
	echo "Tipo: $tipoArquivo<br>";
	echo "Tamanho: $tamanhoArquivo<br>";
	echo "Nome (temp) : $nomeTemporario<br>";


$nomeFinal = "icones/$nomeArquivo";
if (move_uploaded_file($nomeTemporario,$nomeFinal))
	echo "Arquivo transferido com sucesso!<br>";
else 
	echo"Erro na transferencia do arquivo<br>";
}

include "conexao.php";

 $sql = "UPDATE especialidade SET 
	especialidade='$espec',
	tratamento=	'$trat',
	valor='$val',
	ativo='$ativo',
	descricao='$desc',
	data='$dat' ";
	
	if ($nomeArquivo !=="")
	$sql = $sql . ",icone='$nomeArquivo' ";
	$sql = $sql . " WHERE id=$codigo ";
	// die ("<hr>Comando SQL: <br> $sql <br>");
	
 mysqli_query($conexao,$sql) or
 die("Erro na inserção de registro no banco:" .
			mysqli_error($conexao) );
			
	echo "Dados gravados com sucesso!";

?>
<a href="listagem.php"><br>Listagem de Especialidades</a>