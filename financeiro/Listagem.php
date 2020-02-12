<?php
include "conexao.php";
	$sql = "SELECT * FROM financeiro"; 		
$registros = mysqli_query ($conexao, $sql) or
die ("Erro na seleção de dados!!".
		mysqli_error ($conexao));
		
		
		$linhas = mysqli_num_rows ($registros);
		if ($linhas<1)
			die ( "O cadastro está vazio!");
	$linhas = mysqli_num_rows($registros);
	if($linhas<1)
		die("O cadastro está vazio!");
	$contador = 0;
	echo "<table border='1'>";
	echo "       <tr>";
	echo "		 <th>Código</th>";
	echo "		 <th>Nome</th>";
	echo "		 <th>Atendimento</th>";
	echo "		 <th>Valor</th>";
	echo "		 <th>Pagamento</th>";
	echo "		 <th>Data</th>";
	echo "		 <th>Pago</th>";
	echo "	        <th colspan='2'>Ações</th>";
	echo "       </tr>";
	
	
	while($contador<$linhas)
	{
		$dados = mysqli_fetch_array($registros);
		$codigo=$dados['id'];
		$nome=$dados['Nome'];
		$Atendimento=$dados['Atendimento'];
		$valor=$dados['Valor'];
		$Pagamento=$dados['Pagamento'];
		$data=$dados['Data'];
		$Pago=$dados['Pago'];
		echo "<tr>";
		
		echo"<td>$codigo</td>";
		echo"<td>$nome</td>";
		echo"<td>$Atendimento</td>";
		echo"<td>$valor</td>";
		echo"<td>$Pagamento</td>";
		echo"<td>$data</td>";
		echo"<td>$Pago</td>";
		echo "<td> <a href= 'excluirFinanceiro.php?c=$codigo'> Excluir</a> </td>";
		echo "<td> <a href= 'alterarFinanceiro.php?c=$codigo'> Alterar</a> </td>";
		echo"</tr>";
		
		
		
		$contador++;
		
	}
	echo "</table>";
?>
<a href="cadFinanceiro.html"><br>Cadastro Financeiro</a>