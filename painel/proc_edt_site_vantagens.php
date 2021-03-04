<?php 
//Conexão com banco de dados
include_once("config.php");

$club = $_POST['club'];
$titulo = mysqli_real_escape_string($link,$_POST['titulo']);
$descricao = mysqli_real_escape_string($link,$_POST['descricao']);
$idvantagens = $_POST['idvantagens'];
	
$query = "SELECT * FROM rfa_site_vantagens WHERE clube='$club'";
$vertopo = mysqli_query($link, $query) or die(mysqli_error($link));
$row_vertopo = mysqli_fetch_assoc($vertopo);
$totalRows_vertopo = mysqli_num_rows($vertopo);

if($totalRows_vertopo <= 0){

$logo = 'img_vantagem';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/vantagens/';

mkdir($pastaimg, 0777, true);

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_vantagens SET titulo_vantagens = '$titulo', descricao_vantagens = '$descricao', data_blog = '$datadia' WHERE clube='$club' AND id_vantagens = '$idvantagens';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_vantagens SET titulo_vantagens = '$titulo', descricao_vantagens = '$descricao', imagem_blog = '$dirlogo' WHERE clube='$club' AND id_vantagens = '$idvantagens';";	
	}

	
}else{


$logo = 'img_vantagem';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/vantagens/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_vantagens SET titulo_vantagens = '$titulo', descricao_vantagens = '$descricao' WHERE clube='$club' AND id_vantagens = '$idvantagens';";
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_vantagens SET titulo_vantagens = '$titulo', descricao_vantagens = '$descricao', imagem_vantagens = '$dirlogo' WHERE clube='$club' AND id_vantagens = '$idvantagens';";	
	}	

	

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Vantagem atualizada com sucesso!');javascript:window.location='vantagens".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>