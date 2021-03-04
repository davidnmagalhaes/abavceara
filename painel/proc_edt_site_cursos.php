<?php 
//Conexão com banco de dados
include_once("config.php");

$club = $_POST['club'];
$titulo = mysqli_real_escape_string($link,$_POST['titulo']);
$descricao = mysqli_real_escape_string($link,$_POST['descricao']);
$linkcompra = mysqli_real_escape_string($link,$_POST['link']);
$idcurso = $_POST['idcurso'];
	
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

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_cursos SET titulo_curso = '$titulo', descricao_curso = '$descricao', linkcompra_curso = '$linkcompra' WHERE clube='$club' AND id_curso = '$idcurso';";		
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_cursos SET titulo_curso = '$titulo', descricao_curso = '$descricao', imagem_curso = '$dirlogo',linkcompra_curso = '$linkcompra'  WHERE clube='$club' AND id_curso = '$idcurso';";	
	}

	
}else{


$logo = 'img_curso';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/cursos/';

/*Variáveis do upload do logotipo*/
	$imglogo = $_FILES[$logo]['name'];
	$templogo = $_FILES[$logo]['tmp_name'];

	if(empty($imglogo)){
	$sql = "UPDATE rfa_site_cursos SET titulo_curso = '$titulo', descricao_curso = '$descricao',linkcompra_curso = '$linkcompra' WHERE clube='$club' AND id_curso = '$idcurso';";
	}else{
	$dirlogo = $pastaimg.$data.$imglogo;
	$sql = "UPDATE rfa_site_cursos SET titulo_curso = '$titulo', descricao_curso = '$descricao', imagem_curso = '$dirlogo',linkcompra_curso = '$linkcompra' WHERE clube='$club' AND id_curso = '$idcurso';";	
	}	

	

}

	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($templogo,$dirlogo);
		echo "<script>javascript:alert('Curso atualizado com sucesso!');javascript:window.location='cursos".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>