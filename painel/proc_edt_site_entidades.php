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
$identidade = $_POST['identidade'];
	
$query = "SELECT * FROM rfa_site_entidades WHERE clube='$club'";
$vertopo = mysqli_query($link, $query) or die(mysqli_error($link));
$row_vertopo = mysqli_fetch_assoc($vertopo);
$totalRows_vertopo = mysqli_num_rows($vertopo);

if($totalRows_vertopo <= 0){

$logo = 'img_entidade';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/entidade/';

mkdir($pastaimg, 0777, true);

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_entidades SET nome_entidade = '$titulo', cep_entidade = '$cep', endereco_entidade = '$endereco', numero_entidade = '$numero', bairro_entidade = '$bairro',cidade_entidade = '$cidade', estado_entidade = '$estado', telefone_entidade = '$telefone', email_entidade = '$email' WHERE clube='$club' AND id_entidade = '$identidade';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_entidades SET nome_entidade = '$titulo', cep_entidade = '$cep', endereco_entidade = '$endereco', numero_entidade = '$numero', bairro_entidade = '$bairro',cidade_entidade = '$cidade', estado_entidade = '$estado', telefone_entidade = '$telefone', email_entidade = '$email', imagem_entidade = '$dirlogo' WHERE clube='$club' AND id_entidade = '$identidade';";	
	}

	
}else{


$logo = 'img_entidade';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/entidade/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_entidades SET nome_entidade = '$titulo', cep_entidade = '$cep', endereco_entidade = '$endereco', numero_entidade = '$numero', bairro_entidade = '$bairro',cidade_entidade = '$cidade', estado_entidade = '$estado', telefone_entidade = '$telefone', email_entidade = '$email' WHERE clube='$club' AND id_entidade = '$identidade';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_entidades SET nome_entidade = '$titulo', cep_entidade = '$cep', endereco_entidade = '$endereco', numero_entidade = '$numero', bairro_entidade = '$bairro',cidade_entidade = '$cidade', estado_entidade = '$estado', telefone_entidade = '$telefone', email_entidade = '$email', imagem_entidade = '$dirlogo' WHERE clube='$club' AND id_entidade = '$identidade';";	
	}	

	

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Entidade atualizada com sucesso!');javascript:window.location='entidades".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>