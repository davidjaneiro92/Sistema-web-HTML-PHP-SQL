<?php
include "conexao.php";
	
$sql = "SELECT * FROM especialidade";

$registros = mysqli_query($conexao, $sql) or
	die ("Erro na seleção de dados!" . mysqli_error($conexao));
	
$linhas = mysqli_num_rows($registros);
if ($linhas <1)
{
die ("Cadastro de especialidade está vazio!");
}
echo "Registros encontrados: $linhas <br>";

echo"<table border='3'>";
echo"<tr>";
echo"<th>Código</th>";
echo"<th>Especialidade</th>";
echo"<th>Tratamento</th>";
echo"<th>Valor</th>";
echo"<th>Ativo</th>";
echo"<th>Descrição</th>";
echo"<th>Data de Inclusão</th>";
echo"<th>Ícone</th>";
echo "	   <th colspan='2'>Ações</th>";
echo"</tr>";

for ($n=0; $n < $linhas;$n++)
{
	$dados = mysqli_fetch_array($registros);
	
	$codigo			= $dados['ID'];
	$especialidade	= $dados['Especialidade'];
	$tratamento		= $dados['Tratamento'];
	$valor			= $dados['Valor'];
	$ativo			= $dados['Ativo'];
	$descricao		= $dados['Descricao'];
	$data			= $dados['Data'];
	$icone			= $dados['Icone'];
	
	echo"<tr>";
	echo"<td>$codigo</td>";
	echo"<td>$especialidade</td>";
	echo"<td>$tratamento</td>";
	echo"<td>$valor</td>";
	echo"<td>$ativo</td>";
	echo"<td>$descricao</td>";
	echo"<td>$data</td>";	
	if ($icone<> "")
			echo "	   <td> <img src='icones/$icone'> </td>";
		else
			echo "<td> </td>";
	echo"<td><a href='excluirespec.php?c=$codigo'>Excluir</a></td>";
	echo "	   <td> <a href='alterarEspecialidade.php?c=$codigo'> Alterar </a> </td>";
	echo"</tr>";
	
}
echo"</table>";
echo "Listagem Finalizada!!";
?>
<hr>
<a href="cadEspecialidade.html">Cadastrar Nova Especialidade</a>