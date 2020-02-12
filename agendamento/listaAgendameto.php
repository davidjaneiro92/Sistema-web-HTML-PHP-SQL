<html>
	<head>
		<title>...</title>
	</head>
	<body>
	<?php	// Criar a pasta no WAMP 
		//	[10] LISTAGEM e salvar esta 
		//	página como listaAgendamento.php 
	header("Content-Type: text/html; charset=latin1");
	
	$con = mysqli_connect('localhost' , 'root', '');

	mysqli_select_db($con , "clinica") or
		die("Falha na seleção do banco de dados:" .
			mysqli_error($con) );
			
	$comandoSQL = "SELECT * FROM cadAgd" ;
	// Se quiser exibir a variável na tela, retire as barras de comentário abaixo
	// echo $comandoSQL ;

	$registros = mysqli_query($con, $comandoSQL) or 
		die("Erro na execução do comando de seleção de dados do MySQL:" . 
			mysqli_error($con) ) ;
	
	$linhas = mysqli_num_rows($registros) ;

	if ($linhas<1)
	{
	   die('Cadastro de Agendamento está vazio!');
	}

	// Se chegou aqui é porque tem registros
	echo "Registros encontrados: $linhas <br>";	

	echo "<table border='1'>";
	echo "	<tr>";
echo"	<th> codigo</th>";
echo"	<th> Nome do paciente</th>";
echo"	<th> Especialidade</th>";
echo"	<th> Medico</th>";
echo"	<th> Data</th>";
echo"	<th> Hora </th>";
echo"	<th>Esta confirmado</th>";
echo "	   <th colspan='2'>Acoes</th>";
	echo "	</tr>";

	for($n= 0 ; $n< $linhas; $n++)
	{
		$dados = mysqli_fetch_array($registros);
	$codigo		=$dados['id'];
	$pac		=$dados['Paciente'];
	$espe		=$dados['Especialidade'];
	$medico		=$dados['Medico'];
	$data		=$dados['Data'];
	$hora 		=$dados['Hora'];
	$conf 		=$dados['Confirmado'];

		echo "	<tr>";
	echo "<td>$codigo</td>";
	echo "<td>$pac</td>";
	echo "<td>$espe</td>";
	echo "<td>$medico</td>";
	echo "<td>$data</td>";
	echo "<td>$hora</td>";
	echo "<td>$conf</td>";
		

		echo "	   <td> <a href='excluirAgendamento.php?c=$codigo'> Excluir </a> </td>";
		echo "	   <td> <a href='alterarAgendamento.php?c=$codigo'> Alterar </a> </td>";
		echo " </tr>";
	}

	echo "</table>";
	echo "Listagem Finalizada!!";
?>

	<hr>
	<a href="agendamento.html">Cadastrar novo Agendamento</a>
	
	</body>
</html>