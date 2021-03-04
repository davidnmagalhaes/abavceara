<?php 
//Conexão com banco de dados
include_once("../config.php");

/*Recebe as variáveis de cd_banco.php*/
$nomedemandante = mysqli_real_escape_string($link,$_POST['nomedemandante']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$sexo = mysqli_real_escape_string($link,$_POST['sexo']);
$tipo = mysqli_real_escape_string($link,$_POST['tipo']);
$cpf = mysqli_real_escape_string($link,$_POST['cpf']);
$cnpj = mysqli_real_escape_string($link,$_POST['cnpj']);
$cep = mysqli_real_escape_string($link,$_POST['cep']);
$logradouro = mysqli_real_escape_string($link,$_POST['logradouro']);
$numero = mysqli_real_escape_string($link,$_POST['numero']);
$bairro = mysqli_real_escape_string($link,$_POST['bairro']);
$cidade = mysqli_real_escape_string($link,$_POST['cidade']);
$estado = mysqli_real_escape_string($link,$_POST['estado']);
$pais = mysqli_real_escape_string($link,$_POST['pais']);
$complemento = mysqli_real_escape_string($link,$_POST['complemento']);
$tipotelefone = mysqli_real_escape_string($link,$_POST['tipo_telefone']);
$telefone = mysqli_real_escape_string($link,$_POST['telefone']);
$tipodemanda = mysqli_real_escape_string($link,$_POST['tipo_demanda']);
$assunto = mysqli_real_escape_string($link,$_POST['assunto']);
$descricao = mysqli_real_escape_string($link,$_POST['descricao']);
$tiporesposta = mysqli_real_escape_string($link,$_POST['tipo_resposta']);

$clube = mysqli_real_escape_string($link,$_POST['clube']);

$doc = 'documento';
$data = date("d-m-Y-H-i");
$pastaimg = '../images/sites/clube'.$clube.'/conteudo/';

/*Variáveis do upload do destaque*/
	$imgvisto = $_FILES[$doc]['name'];
	$tempvisto = $_FILES[$doc]['tmp_name'];
	$dirvisto = $pastaimg.$data.$imgvisto;


	$sql = "INSERT INTO rfa_site_ouvidoria (nome_ouvidoria, email_ouvidoria, sexo_ouvidoria, tipo_ouvidoria, cpf_ouvidoria, cnpj_ouvidoria, cep_ouvidoria, logradouro_ouvidoria, bairro_ouvidoria, cidade_ouvidoria, estado_ouvidoria,complemento_ouvidoria, numero_ouvidoria, pais_ouvidoria, tptelefone_ouvidoria, telefone_ouvidoria, tpdemanda_ouvidoria, assunto_ouvidoria, descricao_ouvidoria,  documento_ouvidoria, tiporesposta_ouvidoria, clube) VALUES ('$nomedemandante','$email','$sexo','$tipo','$cpf','$cnpj','$cep','$logradouro','$bairro','$cidade','$estado','$complemento','$numero','$pais','$tipotelefone','$telefone','$tipodemanda','$assunto','$descricao','$dirvisto','$tiporesposta','$clube');";

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($tempvisto,$dirvisto);
		echo "<script>javascript:alert('Sua solicitação foi enviada com sucesso, solicitamos que aguarde nosso retorno!');javascript:window.location='ouvidoria".$clube."'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>