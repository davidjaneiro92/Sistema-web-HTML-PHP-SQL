<html>

<head>
<title> Alteração de Doutores </title>
</head>
<h2>  Alteração de Doutores </h2>
<body>
<?php
if (! isset ($_GET ['c']))
	die ("Rotina chamda de forma errada");

$codigo = $_GET['c'];

include  "conexao.php";
$sql = "SELECT * FROM doutor WHERE id=$codigo";
$registro = mysqli_query($con, $sql) or die ("Problemas na
			seleção do Doutor :" . mysql_error($con));
$linhas = mysqli_num_rows($registro);
			if($linhas < 1){
				die(" Time $codigo não encontrado. Foi excluído?"); 
			}
$dados = mysqli_fetch_array($registro);
$codigo=$dados ['id'];
	$nome=$dados ['nome'];
	$datanascimento=$dados ['datanascimento'];
	$cro=$dados ['cro'];
	$nomeDaMae=$dados ['nomeDaMae'];
	$nomeDoPai=$dados ['nomeDoPai'];
	$endereco=$dados	['endereco'];
	$bairro=$dados ['bairro'];
	$cidade=$dados ['cidade'];
	$estado=$dados ['estado'];
	$cep=$dados ['cep'];
	$telefone1=$dados ['telefone1'];
	$telefone2=$dados ['telefone2'];
	$celular=$dados ['celular'];
	$email=$dados ['email'];
	$rg=$dados ['rg'];
	$cpf=$dados ['cpf'];
	




?>


<form action= "gravarAlteracaoDoutor.php"
	  method= "post" 
	  enctype= "multipart/form-data">
	  
<input type="hidden"
name= "id"
value= "<?php echo $codigo;?>">
	  
Nome:
<input type ="text" name= "nome"
id= "nome" maxlength= "50"
size= "50"
value= "<?php echo $nome;?>"> <br><br>

Data De Nascimento:
<input type="date" name="datanascimento"
id="datanascimento"value= "<?php echo $datanascimento;?>"> <br><br>
			 
CRO:
<input type="text" name="cro"
id="cro" maxlength="50"
list="ConselhoRegionalDeOdontologia"
size="50"value= "<?php echo $cro;?>"> <br><br>
<datalist id="ConselhoRegionalDeOdontologia">
</datalist>
 
Nome Da Mãe: 
<input type="text" name="nomeDaMãe"
id="nomeDaMae" maxlength= "50"
size= "50" value= "<?php echo $nomeDaMae;?>"> <br><br>
				
Nome Do Pai: 
<input type="text" name="nomeDoPai"
id="nomeDoPai" maxlength= "50"
size= "50"value= "<?php echo $nomeDoPai;?>"> <br><br>
	<hr>
Endereço:
<input type="text" name= "endereço"
id= "endereco"	maxlength= "50"
size= "50" value= "<?php echo $endereco;?>"> <br><br>
		
Bairro:										   
<input type="text" name= "bairro"
id= "bairro"    maxlength= "30"
size= "30"value= "<?php echo $bairro;?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Cidade:
<input type="text" name="cidade"
id="cidade"	    maxlength= "30"
size="30"value= "<?php echo $cidade;?>"> <br><br>
Estado:												
<input type="text" name="estado"
id="estado" maxlength="30"
list="estado"
size="30" value= "<?php echo $estado;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<datalist id="estado">
<option value="São Paulo">
</datalist> 

Cep:
<input type="text" name="cep"
id="cep" maxlength="9"
size="9"value= "<?php echo $cep;?>"> <br><br>
<hr>
Telefone 1:
<input type="text" name= "telefone1"
id="telefone1" maxlength="13"
size="13" value= "<?php echo $telefone1;?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Telefone 2:
<input type="text" name= "telefone2"
id="telefone2" maxlength="13"
size="13" value= "<?php echo $telefone2;?>"> <br><br>
Celular:
<input type="text" name= "celular"
id="celular" maxlength="13"
size="13" value= "<?php echo $celular;?>"> <br><br>
<hr>
			   
E-mail:
<input type="text" name="email"
id="email" maxlength="30"
size="30" value= "<?php echo $email;?>"><br><br>
RG:
<input type="text" name="rg"
id="rg" maxlength="10"
size="10"value= "<?php echo $rg;?>"> <br><br>

CPF:
<input type="text" name="cpf"
id="cpf" maxlength="11"
size="13"value= "<?php echo $cpf;?>"> <br> <br>

	<hr>
<input type="submit" value="Alterar"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Limpar Dados">



	   
		
</form>

</body>
</html>