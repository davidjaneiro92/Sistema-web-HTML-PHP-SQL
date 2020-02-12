<?php	
	
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
$conexao = mysqli_connect ("localhost","root","");
mysqli_set_charset($conexao,"utf8");
mysqli_select_db($conexao, "clinica") or 
die ("Erro de seleção/abertura do banco:".mysqli_error($conexao));
 $sql = "INSERT INTO cadAgd (Paciente,Especialidade,Medico,Data,Hora,Confirmado) VALUES
 ('$pac','$espe','$medico','$data','$hora','$conf')";
 mysqli_query($conexao,$sql);
	
	
	
?>
<td><a href='agendamento.html'>Cadastra Novo Agendamentos</a></td>
<td><a href='listaAgendameto.php'>Lista Dos Agendamentos</a></td>

