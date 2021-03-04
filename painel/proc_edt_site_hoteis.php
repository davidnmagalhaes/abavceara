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
$idhotel = $_POST['idhotel'];
	
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

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_hoteis SET nome_hotel = '$titulo', cep_hotel = '$cep', endereco_hotel = '$endereco', numero_hotel = '$numero', bairro_hotel = '$bairro',cidade_hotel = '$cidade', estado_hotel = '$estado', telefone_hotel = '$telefone', email_hotel = '$email' WHERE clube='$club' AND id_hotel = '$idhotel';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_hoteis SET nome_hotel = '$titulo', cep_hotel = '$cep', endereco_hotel = '$endereco', numero_hotel = '$numero', bairro_hotel = '$bairro',cidade_hotel = '$cidade', estado_hotel = '$estado', telefone_hotel = '$telefone', email_hotel = '$email', imagem_hotel = '$dirlogo' WHERE clube='$club' AND id_hotel = '$idhotel';";	
	}

	
}else{


$logo = 'img_hotel';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/hotel/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_hoteis SET nome_hotel = '$titulo', cep_hotel = '$cep', endereco_hotel = '$endereco', numero_hotel = '$numero', bairro_hotel = '$bairro',cidade_hotel = '$cidade', estado_hotel = '$estado', telefone_hotel = '$telefone', email_hotel = '$email' WHERE clube='$club' AND id_hotel = '$idhotel';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_hoteis SET nome_hotel = '$titulo', cep_hotel = '$cep', endereco_hotel = '$endereco', numero_hotel = '$numero', bairro_hotel = '$bairro',cidade_hotel = '$cidade', estado_hotel = '$estado', telefone_hotel = '$telefone', email_hotel = '$email', imagem_hotel = '$dirlogo' WHERE clube='$club' AND id_hotel = '$idhotel';";	
	}	

	

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Hotel atualizado com sucesso!');javascript:window.location='hoteis".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>