<html>

<head> 
<title>Alteração de Pacientes</title>
</head>

	<body>
		<h2>Alteração de Pacientes</h2>
		<?php
			if( ! isset($_GET['c']) )
				die("Rotina chamada de forma incorreta!");
			
			// Colocar o código do paciente numa variável
			$codigo = $_GET['c'];

			// Conectar no MYSQL e abrir o banco
			include "conexao.php";
			
			// Criar a variável SQL de seleção de dados
			$sql="SELECT * FROM paciente WHERE iDpaciente=$codigo";
			//echo "$sql";
			// Mostrar a variável com o comando na tela
			// pra testar no console do MYSQL
			// se não funcionar: arruma o comando
			// se funcionar: comenta a linha de baixo
			//die($sql);
			
			$registro = mysqli_query($conexao, $sql) or 
				die("Problemas na seleção do 
						paciente:" . 
							mysqli_error($conexao) );
							
			// Verificar se tem ao menos um time
			$linhas = mysqli_num_rows($registro);
			
			// Achou?
			if($linhas < 1)
				die( "Paciente $id não encontrado. Foi excluído?");
			
			// Chegou até aqui - então achou um time/registro
			$dados = mysqli_fetch_array($registro);
			
			// colocando os dados em variáveis
			$id    = $dados['iDpaciente'];
			$cpf   = $dados['cpf'];
			$nome  = $dados['nome'];
			$nasc  = $dados['nascimento'];
			$cas   = $dados['casado'];
			$sex   = $dados['Sexo'];
			$cad   = $dados['dataRegistro'];			
			$conv  = $dados['convenio'];	
			$prof  = $dados['profissao'];
			$end   = $dados['endereco'];
			$cep   = $dados['cep'];
			$num   = $dados['numero'];				
			$comp  = $dados['complemento'];			
			$cid   = $dados['cidade'];
			$bair  = $dados['bairro'];
			$est   = $dados['estado'];
			$tel   = $dados['telefone'];
			$cel   = $dados['telefone_celular'];
			$nomeArquivo = $dados['arquivo'];
			$obs   = $dados['obs'];
?>
		
		
		<hr>
			<form
			action = "gravarAlteracaoPaciente.php"
			method = "post"
			enctype = "multipart/form-data">
		    
			<input type="hidden" name="id" id="id" maxlength="6" size="10" required value = "<?php echo $id;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 Nome do Paciente:
			 <input type="text" name="nome" id="nome" maxlength="90" size="25" value = "<?php echo $nome;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 CPF:
			 <input type="text" name="cpf" id="cpf" maxlength="11" size="25" required value = "<?php echo $cpf;?>"><br>
			 Data de Nascimento:
			 <input type="date" name="nasc" id="nasc" value = "<?php echo $nasc;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			Casado:
			<?php 
			if ($cas==1)
				echo '<input type="checkbox" name ="cas" id ="cas" 
							value="1" checked>&nbsp;&nbsp;';
			else
				echo '<input type="checkbox" name ="cas" id ="cas" 
							value="1">&nbsp;&nbsp;';
			?> 
						
			<?php
			 $checkM = "";
			 $checkF = "";
			 
			 if($sex == "Masculino") $checkM = "checked";
			 if($sex == "Feminino")  $checkF = "checked";
			 ?>
			 Sexo:
			 <input type="radio" <?php echo $checkM;?> name="sex" id="sex" value="Masculino"> Masculino
			 <input type="radio" <?php echo $checkF;?> name="sex" id="sex" value="Feminino">Feminino<hr>

			 Data de Cadastro:
			 <input type="date" name="cad" id="cad" value = "<?php echo $cad;?>">
			 Convênio Odontológico:
			 <input type="text" name="conv" id="conv" maxlength="20" list="ltconv" size="25" value = "<?php echo $conv?>">
                <datalist  id="ltconv">
				<option value="Green line">
				<option value="Amil Odonto">
				<option value="Santa Helena">
				<option value="Unimed Odonto">
				<option value="Unidonto">
				<option value="Odonto Prev">
				<option value="Protest Dental Plus">
				<option value="Inter Odonto">
				<option value="Met life">
				</datalist>


			 Profissão:
			 <input type="text" name="prof" id="prof" maxlength="20" list="ltprof" size="25" value = "<?php echo $prof;?>">
			 <datalist  id="ltprof">
				<option value="Advogado">
				<option value="Médico">
				<option value="Motorista">
				<option value="Professor">
				<option value="Programador">
				<option value="Chefe de cozinha">
				<option value="Empresário">
				<option value="Faxineiro">
				<option value="Garçon">
			</datalist><hr>
				
			Endereço:
			<input type="text" name="end" id="end" maxlength="99" size="45" value = "<?php echo $end;?>">
			CEP:
			<input type="text" name="cep" id="end" maxlength="8" size="15" value = "<?php echo $cep;?>">
            numero
			<input type="text" name="num" id="num" maxlength="6" size="5" value = "<?php echo $num;?>">
            Complemento 
			<input type="text" name="comp" id="comp" maxlength="6" size="5" value = "<?php echo $comp;?>"><br><br>
            Cidade:
			<input type="text" name="cid" id="cid" maxlength="30" list="ltcid" size="25" value = "<?php echo $cid;?>">
			 <datalist  id="ltcid">
				<option value="São Paulo">
				<option value="Sãnto André">
				<option value="São Bernardo">
				<option value="São Caetano">
				<option value="Maua">
				<option value="Ribeirão Pires">
				<option value="Guarulhos">
			</datalist>
           Bairro:
		   <input type="text" name="bair" id="bair" maxlength="30" size="15" value = "<?php echo $bair;?>">
		   Estado:
		   <input type="text" name="est" id="est" maxlength="2" list="ltest" size="5" value = "<?php echo $est;?>"><br><br>
		   	 <datalist  id="ltcid">
				<option value="SP">
				<option value="RJ">
				<option value="MG">
				<option value="GO">
				<option value="BA">
				<option value="RO">
				<option value="ES">
			</datalist>
           Telefone:		   
		   <input type="text" name="tel" id="tel" maxlength="11" size="25" value = "<?php echo $tel;?>"><br><br>
           Telefone celular:
		   <input type="text" name="cel" id="cel" maxlength="11" size="25" value = "<?php echo $cel;?>"><hr>
		   <hr>
		   <?php
			echo "Arquivo Atual: $nomeArquivo <br>";
				//Arquivo foi informado?/gravado?
				
				if ($nomeArquivo !=="")
				{
					echo "<img src='pastaDestino/$nomeArquivo'>";
				}
			?>
		   
		   Enviar Foto>
		   <input type="file" name="fot" value = "<?php echo $nomeArquivo;?>">
		   Observações:
           <textarea name="obs" style="width:800px; height:150px;"><?php echo $obs;?></textarea><hr>
		   <input type="submit" value="Alterar">
		   <input type="reset"  value="Limpar">
		   </form>
	 </body>
</html>
		   <a href='Pa_Listagem.php'>volar a Listagem de Pacientes</a>