<html>
<head>
<title> CADASTRO DE ESPECIALIDADE</title>

</head>
<h2>CADASTRO DE ESPECIALIDADE</h2>
<body>
<?php 
		if (! isset ($_GET['c'])) die ("Rotina chamada de forma incorreta!!!");
		
		$codigo= $_GET['c'];
		include "conexao.php";
		
		$sql= "SELECT * FROM especialidade WHERE ID=$codigo";	
		
		//die ($sql);
		$registros = mysqli_query($conexao, $sql) or die ('Problema na seleção do time: '. mysqli_error($conexao));
		$linhas = mysqli_num_rows($registros);
		if ($linhas < 1)
			die ("Especialidade $codigo não encontrado. Foi excluido? ");
		
		$dados = mysqli_fetch_array($registros);
		$especialidade	= $dados['Especialidade'];
		$tratamento		= $dados['Tratamento'];
		$valor			= $dados['Valor'];
		$ativo			= $dados['Ativo'];
		$descricao		= $dados['Descricao'];
		$data			= $dados['Data'];
		$icone			= $dados['Icone'];
		
		?>


<form action="gravarAlteracaoEspecialidade.php"
		method="post"
		enctype="multipart/form-data" >
		
<input type="hidden" name="id" value="<?php echo $codigo;?>">

Especialidade:
	<input type="text"
	name="especialidade"
	id="especialidade"
	list="opcespec"
	maxlength="30"
	size="30"
	value="<?php echo "$especialidade"; ?>"> <br><br>
	
	<datalist id="opcespec">
	<option value="Endodontia">
	<option value="Periodontia">
	<option value="Ortodontia">
	<option value="Implantodontia">
	<option value="Dentística">
	<option value="Estomatologia">
	<option value="Odontopediatria">
	<option value="Radiologia Odontológica">
	</datalist>

<?php		
			$opcRPD="";
			$opcPDG="";
			$opcAD="";
			$opcID="";
			$opcRD="";
			$opcPD="";
			$opcP="";
			$opcRX="";
			
			
			if($tratamento =="Remoção Polpa Dentária")	$opcRPD="selected";
			if($tratamento =="Pigmentação Da Gengiva")	$opcPDG="selected";
			if($tratamento =="Aparelho Dentário")		$opcAD="selected";
			if($tratamento =="Implante Dentário")		$opcID="selected";
			if($tratamento =="Restauração Dentária") 	$opcRD="selected";
			if($tratamento =="Prevenção Dentária") 		$opcPD="selected";
			if($tratamento =="Prevenção") 				$opcP="selected";
			if($tratamento =="Raio-X") 					$opcRX="selected";
			?>
			
			Tratamento:
				<select name="tratamento" id="tratamento">
				<option value="Remoção Polpa Dentária"<?php echo $opcRPD; ?>	>1-Remoção Polpa Dentária</option>
				<option value="Pigmentação Da Gengiva"<?php echo $opcPDG; ?>	>2-Pigmentação Da Gengiva</option>
				<option value="Aparelho Dentário"	  <?php echo $opcAD; ?>	>3-Aparelho Dentário	 </option>
				<option value="Implante Dentário"	  <?php echo $opcID; ?>	>4-Implante Dentário	 </option>
				<option value="Restauração Dentária"  <?php echo $opcRD; ?>	>5-Restauração Dentária	 </option>
				<option value="Prevenção Dentária"	  <?php echo $opcPD; ?>	>6-Prevenção Dentária	 </option>
				<option value="Prevenção"			  <?php echo $opcP; ?>		>7-Prevenção			 </option>
				<option value="Raio-X"				  <?php echo $opcRX; ?>	>8-Raio-X				 </option>
			</select><br><br>
	
Valor R$:
	<input type="number"
	name="valor"
	value="<?php echo "$valor"; ?>"
	id="valor"
	list="valoresEspc"
	min="0"
	max="1000"> <br><br>
	
	<datalist id="valoresEspc">
	<option value="100">
	<option value="200">
	<option value="300">
	<option value="400">
	<option value="500">
	</datalist>
	
	<?php 
			if ($ativo == 1)
				echo '<input type="checkbox" name="ativo" id="ativo" value="1" checked>';
			else
				echo '<input type="checkbox" name="ativo" id="ativo" value="1">';
			?>
			Ativo <br>
	
Descrição:
	<textarea
	name="descricao"
	id="descricao"
	maxlength="500"
	size="500"
	cols='70' rows='10' ><?php echo "$descricao"?>
	</textarea> <br><br>
	
Data de Inclusão:
	<input type="date"
	name="data"
	value="<?php echo "$data"; ?>"
	id="data"><br><br>

<?php
			echo "Arquivo Atual: $icone<br>";
			if ($icone !=="")
			{
				echo "<img src='icones/$icone'>";
			}		
			
			?>	
Ícone:
	<input	type="file" name="icone"><br><hr>
	
	<input type="button" value="Voltar" onClick="history.go(-1)">
	<input type="submit" value="Alterar">
	<input type="reset" value="Limpar">
	
</body>
</html>