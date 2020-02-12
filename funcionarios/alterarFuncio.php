<html>
	<head>
		<title>Alteração Funcionário</title>
	</head>
	<style>
		body{
			background-image:url(fundo.jpg);
			background-attachment:fixed;
			background-size:100%;
		
		}
	</style>	
	<h2>Alteração do Funcionário</h2>
	<body>
	<?php
		if (! isset ($_GET['c']))
			die("Rotina chamada de forma incorreta!");
			
			$codigo = $_GET['c'];
			
			include "conexao.php";
			
			$sql = "SELECT * FROM funcionario WHERE id=$codigo";
			
			$registro = mysqli_query($con,$sql) or
				die("Problemas na seleção do Funcionario:" . mysqli_error($con));
				
			$linhas = mysqli_num_rows($registro);
			
			if ($linhas < 1)
				die("Funcionario: $codigo nao encontrado. Foi Excluido?");
			$dados = mysqli_fetch_array($registro);
			
			
			$nome 			= $dados['nome'];
			$cpf 			= $dados['cpf'];
			$email 			= $dados['email'];
			$telefone 		= $dados['telefone'];
			$sexo 			= $dados['sexo'];
			$datanasci		= $dados['datanasc'];
			$uf 			= $dados['uf'];
			$cidade 		= $dados['cidade'];
			$escolaridade 	= $dados['escolaridade'];
			$curso 			= $dados['curso'];
			$areainteresse 	= $dados['areainteresse'];
	
			?>	
		
		<form	action="gravarAlteracaoFuncio.php"
				method="POST"
				enctype="multipart/form-data">
				
		<input	type="hidden"
				name="id"
				value="<?php echo $codigo;?>">
	
	Nome Completo<br>
	<input type="text" name="nome" id="Nome" maxlength="40" value="<?php echo $nome;?>" size="42"><br>
	Favor informar o nome completo sem abreviações.<br><br>
	
	Informe seu CPF<br>
	<input	type="text" name="cpf" id="cpf" maxlength="14" value="<?php echo $cpf;?>" size="30" 
			placeholder="XXX.XXX.XXX.XX"><br>Por gentileza utilizar ponto.<br><br>

	E-mail<br>
	<input type="text" name="email" id="E-mail" maxlength="40" value="<?php echo $email;?>" size="50"><br>
	
	
	Telefone<br>
	<input type="tel" name="telefone" id="Telefone" maxlength="13" value="<?php echo $telefone;?>" size="15" placeholder="DD- Número"><br><br>
	
	<?php 
		$opcM="";
		$opcF="";
		if ($sexo=="M")$opcM="checked";
		if ($sexo=="F")$opcF="checked";
		?>
		Sexo
			<input type="radio" name="sexo" id="sexo" value="M"<?php echo $opcM;?>>Masculino
			<input type="radio" name="sexo" id="sexo" value="F"<?php echo $opcF;?>>Feminino		
<br><br>			
	
	Data de Nascimento<br>
	<input type="date" name="data" id="date" value="<?php echo $datanasci;?>" ><br><br>
	<?php
			$opcaoAC =""; 
			$opcaoAL =""; 
			$opcaoAP =""; 
			$opcaoAM ="";
			$opcaoBA =""; 
			$opcaoCE =""; 
			$opcaoDF =""; 
			$opcaoES =""; 
			$opcaoGO =""; 
			$opcaoMA ="";
			$opcaoMT =""; 
			$opcaoMS ="";
			$opcaoMG =""; 
			$opcaoPA =""; 
			$opcaoPB =""; 
			$opcaoPR =""; 
			$opcaoPE =""; 
			$opcaoPI =""; 
			$opcaoRJ ="";
			$opcaoRN ="";
			$opcaoRS =""; 
			$opcaoRO =""; 
			$opcaoRR =""; 
			$opcaoSC ="";
			$opcaoSP ="";
			$opcaoSE =""; 
			$opcaoTO =""; 
			
			if ($uf=="AC")
			$opcaoAC ="selected";
			if ($uf=="AL")
			$opcaoAL ="selected";
			if ($uf=="AP")
			$opcaoAP ="selected";
			if ($uf=="AM")
			$opcaoAM ="selected";
			if ($uf=="BA")
			$opcaoBA ="selected";
			if ($uf=="CE")
			$opcaoCE ="selected";
			if ($uf=="DF")
			$opcaoDF ="selected";
			if ($uf=="ES")
			$opcaoES ="selected";
			if ($uf=="GO")
			$opcaoGO="selected";
			if ($uf=="MA")
			$opcaoMA ="selected";
			if ($uf=="MT")
			$opcaoMT ="selected";
			if ($uf=="MS")
			$opcaoMS ="selected";
			if ($uf=="MG")
			$opcaoMG ="selected";
			if ($uf=="PA")
			$opcaoPA ="selected";
			if ($uf=="PB")
			$opcaoPB ="selected";
			if ($uf=="PR")
			$opcaoPR ="selected";
			if ($uf=="PE")
			$opcaoPE ="selected";
			if ($uf=="PI")
			$opcaoPI ="selected";
			if ($uf=="RJ")
			$opcaoRJ ="selected";
			if ($uf=="RN")
			$opcaoRN ="selected";
			if ($uf=="RS")
			$opcaoRS ="selected";
			if ($uf=="RO")
			$opcaoRO ="selected";
			if ($uf=="RR")
			$opcaoRR ="selected";
			if ($uf=="SC")
			$opcaoSC="selected";
			if ($uf=="SP")
			$opcaoSP ="selected";
			if ($uf=="SE")
			$opcaoSE ="selected";
			if ($uf=="TO")
			$opcaoTO ="selected";
		
			?>

	UF<br>
	<select name="uf" id="uf">
		<option value="AC"<?php echo $opcaoAC; ?> >AC</option>	
		<option value="AL"<?php echo $opcaoAL; ?> >AL</option> 
		<option value="AP"<?php echo $opcaoAP; ?> >AP</option>	
		<option value="AM"<?php echo $opcaoAM; ?> >AM</option>	
		<option value="BA"<?php echo $opcaoBA; ?> >BA</option>	
		<option value="CE"<?php echo $opcaoCE; ?> >CE</option>
		<option value="DF"<?php echo $opcaoDF; ?> >DF</option>	
		<option value="ES"<?php echo $opcaoES; ?> >ES</option>	
		<option value="GO"<?php echo $opcaoGO; ?> >GO</option>	
		<option value="MA"<?php echo $opcaoMA; ?> >MA</option>	
		<option value="MT"<?php echo $opcaoMT; ?> >MT</option>	
		<option value="MS"<?php echo $opcaoMS; ?> >MS</option>
		<option value="MG"<?php echo $opcaoMG; ?> >MG</option>	
		<option value="PA"<?php echo $opcaoPA; ?> >PA</option>	
		<option value="PB"<?php echo $opcaoPB; ?> >PB</option>	
		<option value="PR"<?php echo $opcaoPR; ?> >PR</option>	
		<option value="PE"<?php echo $opcaoPE; ?> >PE</option>
		<option value="PI"<?php echo $opcaoPI; ?> >PI</option>	
		<option value="RJ"<?php echo $opcaoRJ; ?> >RJ</option>	
		<option value="RN"<?php echo $opcaoRN; ?> >RN</option>	
		<option value="RS"<?php echo $opcaoRS; ?> >RS</option>	
		<option value="RO"<?php echo $opcaoRO; ?> >RO</option>
		<option value="RR"<?php echo $opcaoRR; ?> >RR</option>	
		<option value="SC"<?php echo $opcaoSC; ?> >SC</option>	
		<option value="SP"<?php echo $opcaoSP; ?> >SP</option>	
		<option value="SE"<?php echo $opcaoSE; ?> >SE</option>	
		<option value="TO"<?php echo $opcaoTO; ?> >TO</option>
	</select><br><br>
	
	Cidade<br>
	<input type="text" name="cidade" id="cidade" maxlength="40" value="<?php echo $cidade; ?>" size="40" placeholder="Informar nome completo da cidade"><br><br>
	
	Escolaridade<br>
	<input type="text" name="escolaridade" id="escolaridade" maxlength="40" value="<?php echo $escolaridade; ?>" size="40" placeholder="Informar escolaridade"><br><br>
	
	Curso Superior/Cursando<br>
	<input type="text" name="curso" id="curso" maxlength="30" value="<?php echo $curso;?>" size="35" 
	placeholder="Se tiver, qual está cursando / formação ."><br><br>
	
	
	Àrea de Interesse<br>
	<textarea name="areainteresse" id="areainteresse"
					rows="5" cols="80"><?php echo "$areainteresse" ?> </textarea>
			<hr>
	
	<input type="submit" value="Alterar">
	<input type="reset" value="Limpar dados">
	
		</form>
	</body>
</html>