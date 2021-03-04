<?php 
//Conexão com banco de dados
include_once("../config.php");

/*Recebe as variáveis de cd_banco.php*/
$nome = mysqli_real_escape_string($link,$_POST['nome']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$telefone = mysqli_real_escape_string($link,$_POST['telefone']);

$clube = mysqli_real_escape_string($link,$_POST['clube']);

$doc = 'documento';
$data = date("d-m-Y-H-i");
$pastaimg = '../images/sites/clube'.$clube.'/conteudo/';

/*Variáveis do upload do destaque*/
	$imgvisto = $_FILES[$doc]['name'];
	$tempvisto = $_FILES[$doc]['tmp_name'];
	$dirvisto = $pastaimg.$data.$imgvisto;


	$sql = "INSERT INTO rfa_site_vistos (nome_visto, email_visto, telefone_visto, documento_visto, clube) VALUES ('$nome','$email','$telefone','$dirvisto','$clube');";

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($tempvisto,$dirvisto);
		echo "<script>javascript:alert('Sua solicitação foi enviada com sucesso, solicitamos que aguarde nosso retorno!');javascript:window.location='vistos".$clube."'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>