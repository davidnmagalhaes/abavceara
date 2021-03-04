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
$idparque = $_POST['idparque'];
	
$query = "SELECT * FROM rfa_site_parques WHERE clube='$club'";
$vertopo = mysqli_query($link, $query) or die(mysqli_error($link));
$row_vertopo = mysqli_fetch_assoc($vertopo);
$totalRows_vertopo = mysqli_num_rows($vertopo);

if($totalRows_vertopo <= 0){

$logo = 'img_parque';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/parque/';

mkdir($pastaimg, 0777, true);

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_parques SET nome_parque = '$titulo', cep_parque = '$cep', endereco_parque = '$endereco', numero_parque = '$numero', bairro_parque = '$bairro',cidade_parque = '$cidade', estado_parque = '$estado', telefone_parque = '$telefone', email_parque = '$email' WHERE clube='$club' AND id_parque = '$idparque';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_parques SET nome_parque = '$titulo', cep_parque = '$cep', endereco_parque = '$endereco', numero_parque = '$numero', bairro_parque = '$bairro',cidade_parque = '$cidade', estado_parque = '$estado', telefone_parque = '$telefone', email_parque = '$email', imagem_parque = '$dirlogo' WHERE clube='$club' AND id_parque = '$idparque';";	
	}

	
}else{


$logo = 'img_parque';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/parque/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_parques SET nome_parque = '$titulo', cep_parque = '$cep', endereco_parque = '$endereco', numero_parque = '$numero', bairro_parque = '$bairro',cidade_parque = '$cidade', estado_parque = '$estado', telefone_parque = '$telefone', email_parque = '$email' WHERE clube='$club' AND id_parque = '$idparque';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_parques SET nome_parque = '$titulo', cep_parque = '$cep', endereco_parque = '$endereco', numero_parque = '$numero', bairro_parque = '$bairro',cidade_parque = '$cidade', estado_parque = '$estado', telefone_parque = '$telefone', email_parque = '$email', imagem_parque = '$dirlogo' WHERE clube='$club' AND id_parque = '$idparque';";	
	}	

	

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Parque atualizado com sucesso!');javascript:window.location='parques".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>