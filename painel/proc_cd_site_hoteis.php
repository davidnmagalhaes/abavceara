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
	
$query = "SELECT * FROM rfa_site_hoteis WHERE clube='$club'";
$vertopo = mysqli_query($link, $query) or die(mysqli_error($link));
$row_vertopo = mysqli_fetch_assoc($vertopo);
$totalRows_vertopo = mysqli_num_rows($vertopo);

if($totalRows_vertopo <= 0){

$logo = 'img_hotel';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/hotel/';

mkdir($pastaimg, 0777, true);

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if($imglogo == NULL){
	$dirlogo = $pastaimg."avatarlogo.jpg";	
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;	
	}

	$sql = "INSERT INTO rfa_site_hoteis (nome_hotel, cep_hotel, endereco_hotel, numero_hotel, bairro_hotel, cidade_hotel, estado_hotel, telefone_hotel, email_hotel, imagem_hotel, clube) VALUES ('$titulo', '$cep', '$endereco','$numero', '$bairro','$cidade','$estado','$telefone','$email','$dirlogo', '$club');";
}else{


$logo = 'img_hotel';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/hotel/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];
	$dirlogo = $pastaimg.$data.$imglogo;	

	$sql = "INSERT INTO rfa_site_hoteis (nome_hotel, cep_hotel, endereco_hotel, numero_hotel, bairro_hotel, cidade_hotel, estado_hotel, telefone_hotel, email_hotel, imagem_hotel, clube) VALUES ('$titulo', '$cep', '$endereco','$numero', '$bairro','$cidade','$estado','$telefone','$email','$dirlogo', '$club');";

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Hotel cadastrado com sucesso!');javascript:window.location='hoteis".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>