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

	if($imglogo == NULL){
	$dirlogo = $pastaimg."avatarlogo.jpg";	
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;	
	}

	$sql = "INSERT INTO rfa_site_cias (nome_cia, cep_cia, endereco_cia, numero_cia, bairro_cia, cidade_cia, estado_cia, telefone_cia, email_cia, imagem_cia, clube) VALUES ('$titulo', '$cep', '$endereco','$numero', '$bairro','$cidade','$estado','$telefone','$email','$dirlogo', '$club');";
}else{


$logo = 'img_cia';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/cia/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];
	$dirlogo = $pastaimg.$data.$imglogo;	

	$sql = "INSERT INTO rfa_site_cias (nome_cia, cep_cia, endereco_cia, numero_cia, bairro_cia, cidade_cia, estado_cia, telefone_cia, email_cia, imagem_cia, clube) VALUES ('$titulo', '$cep', '$endereco','$numero', '$bairro','$cidade','$estado','$telefone','$email','$dirlogo', '$club');";

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Cia aérea cadastrada com sucesso!');javascript:window.location='cias".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>