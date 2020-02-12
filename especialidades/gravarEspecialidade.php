<?php
$espec	=	$_POST['especialidade'];
$trat	=	$_POST['tratamento'];
$val	=	(int)$_POST['valor'];
$desc	=	$_POST['descricao'];
$dat 	=  	$_POST['data'];
$ativo	=	0;
if (isset($_POST['ativo']))
	$ativo = $_POST['ativo'];

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

 $sql = "INSERT INTO especialidade (Especialidade,Tratamento,Valor,Ativo,Descricao,Data,Icone) VALUES
 ('$espec','$trat','$val','$ativo','$desc','$dat','$nomeArquivo')";
 mysqli_query($conexao,$sql);







?>
<hr>
<a href="cadEspecialidade.html">Cadastrar Nova Especialidade</a>