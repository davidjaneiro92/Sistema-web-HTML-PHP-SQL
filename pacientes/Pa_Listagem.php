<?php	
	// 1 - Conectar no MYSQL via PHP
	include "conexao.php";
			
	// 3 - Criar a variável com o comando SQL
	$sql = "SELECT * FROM paciente";
	
	// Coloque em aspas abaixo após testar
	//die($sql);
	
	// 4- Enviar o comando (variavel $sql) p/o MYSQL
	$registros = mysqli_query($conexao, $sql) or 
		die("Erro na seleção de dados!!" . 
				mysqli_error($conexao)  );
	
	// 5 - Contando quantas linhas tem em $registros
	$linhas = mysqli_num_rows($registros);
	
	// tabela vazia ? para e avisa
	if($linhas <1)
		die("Cadastro de times está vazio!!<hr> <a href='CadPacientes.html'>Voltar para Cadastro de Pacientes.</a>");
	
	// Se chegou até aqui é pq tem registros/linhas
	
	// Varrer $registros e mostrar linha a linha
	$contador = 0;
	
	echo "<table border='1'>";
	echo "		<tr>";
	echo "			<th>iDpaciente</th>";
	echo "			<th>cpf</th>";
	echo "			<th>nome</th>";
	echo "			<th>nascimento</th>";
	echo "			<th>casado</th>";
	echo "			<th>sexo</th>";
	echo "			<th>dataRegistro</th>";
	echo "			<th>convenio</th>";
	echo "			<th>profissao</th>";
	echo "			<th>endereco</th>";
	echo "			<th>cep</th>";
	echo "			<th>numero</th>";
	echo "			<th>complemento</th>";
	echo "			<th>cidade</th>";
	echo "			<th>bairro</th>";
	echo "			<th>estado</th>";
	echo "			<th>telefone</th>";
	echo "			<th>telefone_celular</th>";
	echo "			<th>arquivo</th>";
	echo "			<th>obs</th>";
	echo "	        <th colspan='2'>Ações</th>";
	echo "		</tr>";  


	while($contador < $linhas)
	{
		// mostrar uma linha de registro aqui
		// pega uma linha de $registros
		// separar as colunas
		$dados = mysqli_fetch_array($registros);
		
		// mostrar os dados das colunas
		//echo "Código: " . $dados['iDpaciente'] . "<br>";
		
		// criando variáveis com os dados das cols.
		$id         	  = $dados['iDpaciente'];
		$cpf       		  = $dados['cpf'];
		$nome      	      = $dados['nome'];
		$nascimento		  = $dados['nascimento'];
		$casado			  = $dados['casado'];
		$sexo	    	  = $dados['Sexo'];
		$dataRegistro 	  = $dados['dataRegistro'];
		$convenio     	  = $dados['convenio'];
		$profissao    	  = $dados['profissao'];
		$endereco    	  = $dados['endereco'];
		$cep         	  = $dados['cep'];
		$numero      	  = $dados['numero'];
		$complemento 	  = $dados['complemento'];
		$cidade      	  = $dados['cidade'];
		$bairro       	  = $dados['cidade'];
		$estado     	  = $dados['estado'];
		$telefone         = $dados['telefone'];
		$telefone_celular = $dados['telefone_celular'];
		$arquivo		  = $dados['arquivo'];
		$obs 			  = $dados['obs'];


		// abrir uma nova linha
		echo "<tr>";
		
		// abrir as células
		echo "	<td>$id</td>";
		echo "	<td>$cpf</td>";
		echo "	<td>$nome</td>";
		echo "	<td>$nascimento</td>";
		echo "	<td>$casado</td>";
		echo "	<td>$sexo</td>";
		echo "	<td>$dataRegistro</td>";
		echo "	<td>$convenio</td>";
		echo "	<td>$profissao</td>";
		echo "	<td>$endereco</td>";
		echo "	<td>$cep</td>";
		echo "	<td>$numero</td>";
		echo "	<td>$complemento</td>";
		echo "	<td>$cidade</td>";
		echo "	<td>$bairro</td>";
		echo "	<td>$estado</td>";
		echo "	<td>$telefone</td>";
		echo "	<td>$telefone_celular</td>";
		echo "	<td> <img src='pastaDestino/$arquivo'> </td>";
		echo "	<td>$obs</td>";
		echo "  <td> <a href='Excluir_Paciente.php?c=$id'>Excluir</a> </td>";
		echo "	<td> <a href='alterarPaciente.php?c=$id'> Alterar </a> </td>";

		// fechar a linha
		echo "</tr>";
		
		$contador++;
	}
		echo "</table><hr>";
		echo "<a href='CadPacientes.html'>Voltar para Cadastro de Pacientes.</a>";


?>


