<html>	
	<head>
		<title>Alteração do AGENDAMENTO</title>
	</head>
	
	<body>
		<h2>Alteração do AGENDAMENTO</h2>
		<?php
			if( ! isset($_GET['c']) )
				die("Rotina chamada de forma incorreta!!!!!!");
			
			// Colocar o código do time numa variável
			$codigo = $_GET['c'];
			
			// Conectar no MYSQL e abrir o banco
			include "conexao.php";
			
			// Criar a variável SQL de seleção de dados
			$sql="SELECT * FROM cadAgd WHERE id=$codigo";
			
			// Mostrar a variável com o comando na tela
			// pra testar no console do MYSQL
			// se não funcionar: arruma o comando
			// se funcionar: comenta a linha de baixo
			//die($sql);
			
			$registro = mysqli_query($con, $sql) or 
				die("Problemas na seleção do 
						agendamento:" . 
							mysqli_error($con) );
							
			// Verificar se tem ao menos um time
			$linhas = mysqli_num_rows($registro);
			
			// Achou?
			if($linhas < 1)
				die( "Agendamento $codigo não encontrado. Foi excluído?");
			
			// Chegou até aqui - então achou um time/registro
			$dados = mysqli_fetch_array($registro);
			
			
			// colocando os dados em variáveis
			$pac		=	$dados['Paciente']			;
			$espe		=	$dados['Especialidade']		;
			$medico		=	$dados['Medico']			;
			$data		=	$dados['Data']				;
			$hora		=	$dados['Hora']				;
			$conf		=	$dados['Confirmado']		;
		?>
		
		<form 	action="gravarAlteracaoAgendamento.php"
				method="post"
				enctype="multipart/form-data">
				
				<input 	type="hidden" 
					name="id"
					value="<?php echo $codigo;?>">
				
			Paciente:
			<input 	type="text" name="paciente"
					id="paciente" maxlength="80"
					list="pac"
					value="<?php echo $pac;?>"
					size="80"> <br><br>
				<datalist id="pac">
				<option value="João de Jesus Santos">
				<option value="Maria Robenita Ferreira">
				<option value="José Paulo Fernandes">
			</datalist>
				
			Especialidade
			<input 	type="text" name="espe"
					id="espe" maxlength="20"
					list="especialidade"
					value="<?php echo $espe;?>"
					size="20"> <br><br>
			
			<datalist id="especialidade">
				<option value="Opcespec">
				<option value="Endodontia">
				<option value="Ortodontia">
				<option value="Implantodontia">
				<option value="Dentística">
				<option value="Estomatologia">
				<option value="ontoprdiatria">
				<option value="Radiologia Odontológica">
			</datalist>
			
			Nome do Medico
			<input 	type="text" name="medico"
					id="medico" maxlength="80"
					list="nomeMedico"
					required
					value="<?php echo $medico;?>"
					size="80"> <br><br>
			
			<datalist id="nomeMedico">
				<option value="Maria Aparecida">
				<option value="Vinicius silva santos">
				<option value="Pedro João Thorres">
				<option value="Thomas Danilos de Jesus">
				<option value="wagner Silva Santos">
			</datalist>
			
			Data :
			<input  type="date" name="data"
			value="<?php echo $data;?>"
			id="data">
			
			Horário:
			<input type="time" name="hora"
			value="<?php echo $hora;?>"
			id="hora"> <br><br>
			
			<?php
				$check0 ="";
				$check1 ="";
				
				if($conf =="0")  $check0  ="checked";
				if($conf =="1") $check1 ="checked";
			?>
			
			<input 	type="radio" <?php echo $check1;?>  name="confirmado" id="confirmado"  value="1">Confirmado
			<input 	type="radio" <?php echo $check0;?> name="confirmado" id="confirmado" value="0">Nâo Confirmado
			
			
			
			<br><br><br>
			<input type="submit" value="Alterar">
			<input type="reset" value="Limpar Dados">	<br><br>
			
			<td><a href='listaAgendameto.php'>Lista Dos Agendamentos</a></td>
			<td><a href='agendamento.html'>Cadastra Novo Agendamentos</a></td>
		</form>
	</body>
</html>