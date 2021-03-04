<?php 
//Conexão com banco de dados
include_once("config.php");

$club = $_POST['club'];
$titulo = mysqli_real_escape_string($link,$_POST['titulo']);
$descricao = mysqli_real_escape_string($link,$_POST['descricao']);
$linkcompra = mysqli_real_escape_string($link,$_POST['link']);
	
$query = "SELECT * FROM rfa_site_cursos WHERE clube='$club'";
$vertopo = mysqli_query($link, $query) or die(mysqli_error($link));
$row_vertopo = mysqli_fetch_assoc($vertopo);
$totalRows_vertopo = mysqli_num_rows($vertopo);

if($totalRows_vertopo <= 0){

$logo = 'img_curso';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/cursos/';

mkdir($pastaimg, 0777, true);

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if($imglogo == NULL){
	$dirlogo = $pastaimg."avatarlogo.jpg";	
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;	
	}

	$sql = "INSERT INTO rfa_site_cursos (titulo_curso, descricao_curso, imagem_curso,linkcompra_curso, clube) VALUES ('$titulo', '$descricao',  '$dirlogo','$linkcompra', '$club');";
}else{


$logo = 'img_curso';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/cursos/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];
	$dirlogo = $pastaimg.$data.$imglogo;	

	$sql = "INSERT INTO rfa_site_cursos (titulo_curso, descricao_curso, imagem_curso,linkcompra_curso, clube) VALUES ('$titulo', '$descricao',  '$dirlogo','$linkcompra', '$club');";

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Curso cadastrado com sucesso!');javascript:window.location='cursos".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>