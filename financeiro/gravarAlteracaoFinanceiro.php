<?php	// salvar como gravarTime.php
if(! isset($_POST['id']))
		die("Rotina chamada de forma incorreta!");
	$codigo = $_POST['id'];
	
	$nome= $_POST ['nome'];
	$Atendimento= $_POST ['Atendimento'];
	$valor= (int)$_POST ['valor'];
	$Pagamento= $_POST['Pagamento'];
	$data= $_POST['data'];
	$Pago=0;  
    if (isset($_POST['Pago']) )
   	$Pago=$_POST['Pago'];

    echo "<h2>Dados recebidos</h2>";
    echo "Nome do Cliente: $nome <br>";
    echo "Tipo de Atendimento: $Atendimento <br>";
	echo "Valor: $valor<br>";
	echo "Tipo de Pagamento: $Pagamento <br>";
	echo "Data de Pagamento: $data <br>";
	
	
	if($Pago==1)
	{
		echo "Esta pago<br>";
		// comando 2
	}
	else
	{
		echo "Esta Devendo<br>";
	}
	if (strlen($nome) < 3)
	{
		echo "O nome deve ter pelo menos 3 caracteres. 
			  Informe novamente";
		die("Programa Cancelado");
	}
	

	//conecta no MYSQL e abre o banco
	include"conexao.php";
	
	// 3 - Criando a string de inserção de dados
	$sql ="UPDATE financeiro SET
	nome='$nome'	,
	Atendimento= '$Atendimento',
	valor='$valor',
	Pagamento='$Pagamento',
	data='$data',
	Pago='$Pago'";
	
	
	//finalizado com WHERE
	$sql=$sql."WHERE id=$codigo";
	//,icone='$nomeArquivo'
	//WHERE id=$codigo
	//echo "<hr>Comando SQL: <br> $sql <br>" ;
	
	// 4 - Enviando o comando de inserção para o MYSQL
	mysqli_query($conexao, $sql) or 
		die("Erro na inserção de registro no banco:" .
			mysqli_error($conexao) );
			
	echo "Dados gravados com sucesso!";
?>


<hr>
<a href="Listagem.php">Listagem Financeiro</a>