<?php 
//Conexão com banco de dados
include_once("config.php");

$club = $_POST['club'];
$titulo = mysqli_real_escape_string($link,$_POST['titulo']);
$descricao = mysqli_real_escape_string($link,$_POST['descricao']);

	
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

	if($imglogo == NULL){
	$dirlogo = $pastaimg."avatarlogo.jpg";	
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;	
	}

	$sql = "INSERT INTO rfa_site_vantagens (titulo_vantagens, descricao_vantagens, imagem_vantagens, clube) VALUES ('$titulo', '$descricao',  '$dirlogo', '$club');";
}else{


$logo = 'img_vantagem';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/vantagens/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];
	$dirlogo = $pastaimg.$data.$imglogo;	

	$sql = "INSERT INTO rfa_site_vantagens (titulo_vantagens, descricao_vantagens, imagem_vantagens, clube) VALUES ('$titulo', '$descricao',  '$dirlogo', '$club');";

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Vantagem cadastrada com sucesso!');javascript:window.location='vantagens".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>