<?php 

	$nome= $_POST ['nome'];
	$Atendimento= $_POST ['Atendimento'];
	$valor= (int)$_POST ['valor'];
	$Pagamento= $_POST['Pagamento'];
	$data= $_POST['data'];
	$Pago=0;
	
	if(isset($_POST['Pago']) )
		$Pago=$_POST['Pago'];
	
	echo"O nome do paciente é:$nome<br>";
	echo"Atendimento:$Atendimento<br>";
	echo"O valor é:$valor<br>";
	echo"Pagamento:$Pagamento<br>";
	echo"$data<br>";
	echo"Está pago:$Pago<br>";

	if(strlen($nome) <3 )
	{
		echo"Atenção - nome do paciente < 3 caracteres.<br>";
		die("Insira as informações !");
	}
	if($Atendimento=="")
	{
		echo"O campo de atendimento esta vazio!! <br>";
		echo("Insira as informações !");
	}
	if($Pagamento=="")
	{
		echo"O campo de tipo de pagamento esta vazio!! <br>";
		echo("Insira as informações !");
	}
	if(($valor<0)||($valor>9999))
	{
		echo"Valor invalido !! <br>";
		echo("Insira as informações !");
	}
if($data=="")
	{
		echo"Insira a data de pagamento!! <br>";
		echo("Insira as informações !");
	}
		
		include "conexao.php";
		$sql=
		"INSERT INTO financeiro
		(Nome,Atendimento,Valor,Pagamento,Data,Pago)VALUES
		('$nome','$Atendimento','$valor','$Pagamento','$data','$Pago')";
		//echo"Comando SQL:<br>$sql<hr>";

		mysqli_query($conexao,$sql);
		echo"Registro gravado com sucesso!";
?>
<a href="cadFinanceiro.html"</a><br>Cadastrar Financeiro<br>