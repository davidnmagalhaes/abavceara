<?php 
//Conexão com banco de dados
include_once("config.php");

$club = $_POST['club'];
$titulo = mysqli_real_escape_string($link,$_POST['titulo']);
$descricao = mysqli_real_escape_string($link,$_POST['descricao']);
$idurgente = $_POST['idurgente'];

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Fortaleza');

$datadia = strftime('%F');
$hora = strftime('%R');
$por = mysqli_real_escape_string($link,$_POST['por']);

	
$query = "SELECT * FROM rfa_site_urgente WHERE clube='$club'";
$vertopo = mysqli_query($link, $query) or die(mysqli_error($link));
$row_vertopo = mysqli_fetch_assoc($vertopo);
$totalRows_vertopo = mysqli_num_rows($vertopo);

if($totalRows_vertopo <= 0){

$logo = 'img_urgente';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/urgente/';

mkdir($pastaimg, 0777, true);

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_urgente SET titulo_urgente = '$titulo', descricao_urgente = '$descricao', data_urgente = '$datadia', hora_urgente = '$hora', por_urgente = '$por' WHERE clube='$club' AND id_urgente = '$idurgente';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_urgente SET titulo_urgente = '$titulo', descricao_urgente = '$descricao', data_urgente = '$datadia', hora_urgente = '$hora', por_urgente = '$por', imagem_urgente = '$dirlogo' WHERE clube='$club' AND id_urgente = '$idurgente';";	
	}

	
}else{


$logo = 'img_urgente';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/urgente/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_urgente SET titulo_urgente = '$titulo', descricao_urgente = '$descricao', data_urgente = '$datadia', hora_urgente = '$hora', por_urgente = '$por' WHERE clube='$club' AND id_urgente = '$idurgente';";
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_urgente SET titulo_urgente = '$titulo', descricao_urgente = '$descricao', data_urgente = '$datadia', hora_urgente = '$hora', por_urgente = '$por', imagem_urgente = '$dirlogo' WHERE clube='$club' AND id_urgente = '$idurgente';";	
	}	

	

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Post atualizado com sucesso!');javascript:window.location='site-urgente.php'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>