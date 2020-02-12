<?php	
	
	if(! isset($_POST['id']))
		die("Rotina chamada de forma incorreta!");
	// salvar o codigo do agendamento em uma variavel
	$codigo = $_POST['id'];
	
	
	$pac		= $_POST['paciente'];
	$espe 		= $_POST['espe'];
	$medico 	= $_POST['medico'];
	$data		= $_POST['data'];
	$hora		= $_POST['hora'];
	$conf = 0;
	
	if( isset($_POST['confirmado']) )
		$conf = $_POST['confirmado'];
	
	echo "Nome do paciente: $pac <br>";
	echo "Nome do medico: $medico <br>";
	echo "Especialidade: $espe <br>" ;
	echo "Data: $data <br>" ;
	echo "Hora: $hora <br>" ;
	echo "Confirmado: $conf <br>" ;
	echo "<hr>";



if ($pac==""){
	echo "Atenção! Paciente Vazio.<br>";
die ("Encerrado");
}
if ($espe==""){
	echo "Atenção! Especialidade Vazia.<br>";
die ("Encerrado");
}
if ($medico=="") {
	echo "Atenção! Médico Vazio.<br>";
	die ("Encerrado!");
}
if ($data==""){
	echo "Atenção! Informe a data.<br>";
	die("Encerrado");
}
if ($hora==""){
	echo "Atenção! Informe a hora.<br>";
	die("Encerrado");
}

// 
	include "conexao.php";
	// 3 - Criando a string de alteraçao de dados


	$sql="UPDATE cadAgd 
		SET Paciente='$pac'		,
		Especialidade='$espe'	,
		Medico='$medico'		,
		Data='$data'			,
		Hora='$hora'			,
		Confirmado='$conf'		";
		
		//se o nome do arquivo foi informado/existe
		
		
	
	// Finalizo com o WHERE
	$sql = $sql . " WHERE id=$codigo ";
		
		
		
		
		
		
 
//$con = mysqli_connect ("localhost","root","");
//mysqli_set_charset($con,"utf8");



	//die("<hr>Comando SQL: <br> $sql <br>") ;
	
	// 4 - Enviando o comando de inserção para o MYSQL
	mysqli_query($con, $sql) or 
		die("Erro na inserção de registro no banco:" .
			mysqli_error($con) );
			
	echo "Dados gravados com sucesso!";
?>
<br>
<td><a href='listaAgendameto.php'>Lista Dos Agendamentos</a></td>
			<td><a href='agendamento.html'>Cadastra Novo Agendamentos</a></td>