<html> <!-- salvar como cadTimes.html na pasta
		C:\WAMP\WWW\[08-07.10.2019] FORM-PRJ1 -->
	<head>
		<title>Alteração Financeiro</title>
	</head>
	<body>
		<h2>Alteração Financeiro</h2>
		<?php
			if(!isset($_GET['c']))
				die("Rotina chamada de forma incorreta!");
			//Colocar o código do time numa variavel
			$codigo=$_GET['c'];
			
			//Conectar no MYSQL e abrir o banco
			include "conexao.php";
			
			//Criar a variavel SQL de seleção de dados
			$sql="SELECT * FROM financeiro WHERE id=$codigo";
			
			//Mostrar a veriavel com o comando na tela
			//pra testar no console MYSQL//se nao funcionar: arruma o comando
			//se funcionar: comenta a linha de baixo
			//die ($sql);
			$registros=mysqli_query($conexao,$sql)or
			die("Problemas no financeiro: ".mysqli_error($conexao));
			
			//Verificar se tem ao menos um time
			$linhas= mysqli_num_rows($registros);
			
			//Achou?
			if($linhas<1)
				die("O $codigo nao encontrado. Foi excluido?");
			
			//Chegou até aq - então achou um time/registro
			$dados = mysqli_fetch_array($registros);
			
			//Colocando os dados em variaveis
				$nome=$dados['Nome'];
				$atendimento=$dados['Atendimento'];
				$valor=$dados['Valor'];
				$pagamento=$dados['Pagamento'];
				$data=$dados['Data'];
				$pago=$dados['Pago'];				;
			
		?>
		<form	action="gravarAlteracaoFinanceiro.php"
				method="post"
				enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $codigo;?>">
			Nome do Cliente:
			<input type-="text" name="nome"
								id="nome" maxlength="30"
								size="30"
								value="<?php echo $nome;?>"><p>								
						
								
		
			Tipo de Atendimento:
			<input type="text" name="Atendimento"
				   id="Atendimento" maxlength="30"
				   list="Atend"
				   size="30"
				   value="<?php echo $atendimento; ?>">&nbsp;&nbsp;&nbsp;&nbsp;
			       <datalist id="Atend">
				   <option value="Avalia?">
				   <option value="Remo? Polpa Dentaria">
				   <option value="Aparelho Dentario">
				   <option value="Pigmenta? de Gengiva">
				   <option value="Implante Dentario">
				   <option value="Restaura? Dentaria">
				   <option value="Preven? Dentaria">
				   <option value="Limpeza">
				   <option value="Documenta?">
				</datalist>
				
			
				
				Valor:
			<input type="number" name="valor"
				   id="valor" maxlength="25"
				   size="25"
				   value="<?php echo $valor;?>"><p>
					
				
			Tipo de Pagamento:
			<input type="text" name="Pagamento"
								id="Pagamento" maxlength="30"
								list="Pag"
								size="30"
								value="<?php echo $pagamento;?>"><p>
								<datalist id="Pag">
								<option value="Cart">
								<option value="Dinheiro">
								<option value="Boleto">
								<option value="Convenio">
								<option value="Parcelado">
								</datalist>
			Data de Pagamento:
			<input type="date"
			name="data"
			id="data"
			value="<?php echo $data;?>">&nbsp;&nbsp;&nbsp;&nbsp;
			
			<?php
			if ($pago == 1)
				echo '<input type="checkbox" name="Pago" id="Pago" value="1" checked>';
			else
				echo '<input type="checkbox" name="Pago" id="Pago" value="1">';
			?>
			Pago <p>
			
			<input type="submit" value="Alterar">
			<input type="reset" value="Limpar Dados">
		</form>
	</body>
</html>