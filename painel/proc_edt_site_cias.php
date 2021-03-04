<?php 
//Conexão com banco de dados
include_once("config.php");

$club = $_POST['club'];
$titulo = mysqli_real_escape_string($link,$_POST['titulo']);
$cep = mysqli_real_escape_string($link,$_POST['cep']);
$endereco = mysqli_real_escape_string($link,$_POST['endereco']);
$numero = mysqli_real_escape_string($link,$_POST['numero']);
$bairro = mysqli_real_escape_string($link,$_POST['bairro']);
$cidade = mysqli_real_escape_string($link,$_POST['cidade']);
$estado = mysqli_real_escape_string($link,$_POST['estado']);
$telefone = mysqli_real_escape_string($link,$_POST['telefone']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$idcia = $_POST['idcia'];
	
$query = "SELECT * FROM rfa_site_cias WHERE clube='$club'";
$vertopo = mysqli_query($link, $query) or die(mysqli_error($link));
$row_vertopo = mysqli_fetch_assoc($vertopo);
$totalRows_vertopo = mysqli_num_rows($vertopo);

if($totalRows_vertopo <= 0){

$logo = 'img_cia';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/cia/';

mkdir($pastaimg, 0777, true);

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_cias SET nome_cia = '$titulo', cep_cia = '$cep', endereco_cia = '$endereco', numero_cia = '$numero', bairro_cia = '$bairro',cidade_cia = '$cidade', estado_cia = '$estado', telefone_cia = '$telefone', email_cia = '$email' WHERE clube='$club' AND id_cia = '$idcia';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_cias SET nome_cia = '$titulo', cep_cia = '$cep', endereco_cia = '$endereco', numero_cia = '$numero', bairro_cia = '$bairro',cidade_cia = '$cidade', estado_cia = '$estado', telefone_cia = '$telefone', email_cia = '$email', imagem_cia = '$dirlogo' WHERE clube='$club' AND id_cia = '$idcia';";	
	}

	
}else{


$logo = 'img_cia';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/cia/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_cias SET nome_cia = '$titulo', cep_cia = '$cep', endereco_cia = '$endereco', numero_cia = '$numero', bairro_cia = '$bairro',cidade_cia = '$cidade', estado_cia = '$estado', telefone_cia = '$telefone', email_cia = '$email' WHERE clube='$club' AND id_cia = '$idcia';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_cias SET nome_cia = '$titulo', cep_cia = '$cep', endereco_cia = '$endereco', numero_cia = '$numero', bairro_cia = '$bairro',cidade_cia = '$cidade', estado_cia = '$estado', telefone_cia = '$telefone', email_cia = '$email', imagem_cia = '$dirlogo' WHERE clube='$club' AND id_cia = '$idcia';";	
	}	

	

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Cia aérea atualizada com sucesso!');javascript:window.location='cias".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>