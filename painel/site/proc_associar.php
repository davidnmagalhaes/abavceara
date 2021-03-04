<?php 
//Conexão com banco de dados
include_once("../config.php");

/*Recebe as variáveis de cd_banco.php*/
$razao = mysqli_real_escape_string($link,$_POST['razao']);
$fantasia = mysqli_real_escape_string($link,$_POST['fantasia']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$cnpj = mysqli_real_escape_string($link,$_POST['cnpj']);
$endereco = mysqli_real_escape_string($link,$_POST['endereco']);
$numero = mysqli_real_escape_string($link,$_POST['numero']);
$bairro = mysqli_real_escape_string($link,$_POST['bairro']);
$cidade = mysqli_real_escape_string($link,$_POST['cidade']);
$estado = mysqli_real_escape_string($link,$_POST['estado']);
$cep = mysqli_real_escape_string($link,$_POST['cep']);
$titular= mysqli_real_escape_string($link,$_POST['titular']);
$emailtitular= mysqli_real_escape_string($link,$_POST['emailtitular']);
$financeiro= mysqli_real_escape_string($link,$_POST['financeiro']);
$emailfinanceiro= mysqli_real_escape_string($link,$_POST['emailfinanceiro']);
$telefone = mysqli_real_escape_string($link,$_POST['telefone']);
$clube = mysqli_real_escape_string($link,$_POST['clube']);

	$sql = "INSERT INTO rfa_site_associar (razao_associar, fantasia_associar, email_associar, cnpj_associar, titular_associar, endereco_associar, telefone_associar, clube, numero_associar, bairro_associar, cidade_associar, estado_associar, cep_associar, emailtitular_associar, financeiro_associar, emailfin_associar) VALUES ('$razao', '$fantasia', '$email', '$cnpj', '$titular', '$endereco', '$telefone', '$clube', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$emailtitular', '$financeiro', '$emailfinanceiro');";

	
	if ($link->multi_query($sql) === TRUE) {
		echo "<script>javascript:alert('Sua solicitação foi enviada com sucesso, solicitamos que aguarde nosso retorno!');javascript:window.location='associar".$clube."'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>