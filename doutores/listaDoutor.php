<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db ($con,'clinica') or 
die ("ERRO NA SELEÇÃO/ ABERTURA DO BANCO." . mysqli_error ($con));
$sql = "SELECT* FROM Doutor";
mysqli_query ($con, $sql);
$registros= mysqli_query ($con,$sql) or
die ("ERRO NA SELEÇÃO DE DADOS!!".
mysqli_error ($con));
$linhas = mysqli_num_rows ($registros);
if($linhas<1)
	die("Cadastro de Doutores está vazio!!");
$linhas= mysqli_num_rows ($registros);
if ($linhas<1)
	die ("Cadastro de Doutores está vazio!!");
$contador = 0;
	echo "<table border='1'>";
	echo "       <tr>";
	echo "		 <th>Código</th>";
	echo "		 <th>Nome</th>";
	echo "		 <th>Data de nascimento</th>";
	echo "		 <th>CRO</th>";
	echo "		 <th>Nome da mãe</th>";
	echo "		 <th>Nome do Pai</th>";
	echo "		 <th>Endereço</th>";
	echo "		 <th>Bairro</th>";
	echo "		 <th>Cidade</th>";
	echo "		 <th>Estado</th>";
	echo "		 <th>Cep</th>";
	echo "		 <th>Telefone 1</th>";
	echo "		 <th>Telefone 2</th>";
	echo "		 <th>Celular</th>";
	echo "		 <th>Email	</th>";
	echo "		 <th>RG </th>";
	echo "		 <th>CPF </th>";	
	echo "	   <th colspan='2'>Ações</th>";
	echo "		 </th>";
	
	while ($contador<$linhas)
	{
	$dados = mysqli_fetch_array ($registros);
    $codigo=$dados ['id'];
	$nome=$dados ['nome'];
	$datanascimento=$dados ['datanascimento'];
	$cro=$dados ['cro'];
	$nomeDaMae=$dados ['nomeDaMae'];
	$nomeDoPai=$dados ['nomeDoPai'];
	$endereco=$dados	['endereco'];
	$bairro=$dados ['bairro'];
	$cidade=$dados ['cidade'];
	$estado=$dados ['estado'];
	$cep=$dados ['cep'];
	$telefone1=$dados ['telefone1'];
	$telefone2=$dados ['telefone2'];
	$celular=$dados ['celular'];
	$email=$dados ['email'];
	$rg=$dados ['rg'];
	$cpf=$dados ['cpf'];
	echo "<tr>";
	echo"<td>$codigo</td>";
		echo"<td>$nome</td>";
		echo"<td>$datanascimento</td>";
		echo"<td>$cro</td>";
		echo"<td>$nomeDaMae</td>";
		echo"<td>$nomeDoPai</td>";
		echo"<td>$endereco</td>";
		echo"<td>$bairro</td>";
		echo"<td>$cidade</td>";
		echo"<td>$estado</td>";
		echo"<td>$cep</td>";
		echo"<td>$telefone1</td>";
		echo"<td>$telefone2</td>";
		echo"<td>$celular</td>";
		echo"<td>$email</td>";
		echo"<td>$rg</td>";
		echo"<td>$cpf</td>";
		
		echo "<td> <a href= 'excluirClinica.php?c=$codigo'> Excluir</a> </td>";
		echo "	   <td> <a href='alterarDoutor.php?c=$codigo'> Alterar </a> </td>";
		echo"</tr>";
		
		
		
		$contador++;
		
	}
	echo "</table>";










?>