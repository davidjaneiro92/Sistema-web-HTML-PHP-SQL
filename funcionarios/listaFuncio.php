<?php	// Criar a pasta no WAMP 
		//	[10] LISTAGEM e salvar esta 
	header("Content-Type: text/html; charset=latin1");
	
	include "conexao.php";
			
	$comandoSQL = "SELECT * FROM funcionario";
	// Se quiser exibir a variavel na tela, retire as barras de comentario abaixo
	//echo $comandoSQL ;

	$registros = mysqli_query($con, $comandoSQL) or 
		die("Erro na execucução do comando de seleção de dados do MySQL:" . 
			mysqli_error($con) ) ;
	
	$linhas = mysqli_num_rows($registros) ;

	if ($linhas<1)
	{
	   die('Cadastro de funcionários está vazio!');
	}

	// Se chegou aqui � porque tem registros
	echo "Registros encontrados: $linhas <br>";	

	echo "<table border='1'>";
	echo "	<tr>";
	echo	"<th>ID</th>";
    echo	"<th>Nome</th>";
    echo	"<th>CPF</th>";
    echo	"<th>Email</th>";
    echo	"<th>Telefone</th>";
    echo	"<th>Sexo</th>";
    echo	"<th>Data nascimento</th>";
    echo	"<th>UF</th>";
    echo	"<th>Cidade</th>";
    echo	"<th>Escolaridade</th>";
    echo	"<th>Curso</th>";
    echo	"<th>Area Interesse</th>";
	echo "	<th colspan='2'>Acoes</th>";
	echo "	</tr>";

	for($n= 0 ; $n< $linhas; $n++)
	{
		$dados = mysqli_fetch_array($registros);
		$codigo 		= $dados['id'];
		$nome 			= $dados['nome'];
		$cpf 			= $dados['cpf'];
		$email 			= $dados['email'];
		$telefone 		= $dados['telefone'];
		$sexo 			= $dados['sexo'];
		$datanasci		= $dados['datanasc'];
		$uf 			= $dados['uf'];
		$cidade			= $dados['cidade'];
		$escolaridade	= $dados['escolaridade'];
		$curso 			= $dados['curso'];
		$areainteresse 	= $dados['areainteresse'];
 
		echo"<tr>";
		echo"<td>$codigo</td>";
		echo"<td>$nome</td>";
		echo"<td>$cpf</td>";
		echo"<td>$email</td>";
		echo"<td>$telefone</td>";
		echo"<td>$sexo</td>";
		echo"<td>$datanasci</td>";
		echo"<td>$uf</td>";
		echo"<td>$cidade</td>";
		echo"<td>$escolaridade</td>";
		echo"<td>$curso</td>";
		echo"<td>$areainteresse</td>";
		echo "<td> <a href='excluirFuncio.php?c=$codigo'> Excluir </a> </td>";
		echo "<td> <a href='alterarFuncio.php?c=$codigo'> Alterar </a> </td>";
		echo " </tr>";
	}

	echo "</table>";
	echo "Listagem Finalizada!!";
	?>
	<hr>
	<a href="cadFuncio.html">Cadastrar Funcionario</a>

