<?php	// salvar como gravarDoutor.php
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



$con=mysqli_connect ("localhost", "root", "");


mysqli_select_db($con,"clinica")or
die ("ERRO NA SELEÇÃO/ABERTURA DO BANCO:". mysqli_error ($con));
$sql = "INSERT INTO doutor
 (nome, datanascimento, cro, nomeDaMae, nomeDoPai, endereco, bairro, cidade, estado, cep, telefone1, telefone2, celular, email, rg, cpf) VALUES
 ('$nome' ,'$datanascimento', '$cro ', '$nomeDaMae', '$nomeDoPai', '$endereco', '$bairro', '$cidade', '$estado', '$cep', '$telefone1', '$telefone2', '$celular', '$email ','$rg', '$cpf')";
 mysqli_query($con,$sql);
?>
<hr>
<a href= "listaDoutor.php"> Listagem de Doutores </a>







