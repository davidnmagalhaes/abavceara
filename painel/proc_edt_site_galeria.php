<?php 
//Conexão com banco de dados
include_once("config.php");

$idgaleria = mysqli_real_escape_string($link,$_POST['idgaleria']);
$club = mysqli_real_escape_string($link,$_POST['club']);
$nomepresidente = mysqli_real_escape_string($link,$_POST['nome_presidente']);
$anorotarioi = mysqli_real_escape_string($link,$_POST['ano_rotario_i']);
$anorotariof = mysqli_real_escape_string($link,$_POST['ano_rotario_f']);
$sexo = mysqli_real_escape_string($link,$_POST['sexo']);
	
$query = "SELECT * FROM rfa_site_galeria WHERE clube='$club'";
$vertopo = mysqli_query($link, $query) or die(mysqli_error($link));
$row_vertopo = mysqli_fetch_assoc($vertopo);
$totalRows_vertopo = mysqli_num_rows($vertopo);

if($totalRows_vertopo <= 0){

$presidente = 'img_presidente';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/galeria/';

mkdir($pastaimg, 0777, true);

/*Variáveis do upload do logotipo*/
	$imgpresidente = $_FILES[$presidente]['name'];
	$temppresidente = $_FILES[$presidente]['tmp_name'];

	if(empty($imgpresidente)){
	$sql = "UPDATE rfa_site_galeria SET nome_presidente = '$nomepresidente', ano_rotario_i = '$anorotarioi', ano_rotario_f = '$anorotariof',  sexo = '$sexo' WHERE clube='$club' AND cod_galeria='$idgaleria';";
	}else{
	$dirpresidente = $pastaimg.$data.$imgpresidente;
	$sql = "UPDATE rfa_site_galeria SET nome_presidente = '$nomepresidente', ano_rotario_i = '$anorotarioi', ano_rotario_f = '$anorotariof', imagem_presidente = '$dirpresidente', sexo = '$sexo' WHERE clube='$club' AND cod_galeria='$idgaleria';";	
	}

	
}else{


$presidente = 'img_presidente';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/sites/clube'.$club.'/galeria/';

/*Variáveis do upload do logotipo*/
	$imgpresidente = $_FILES[$presidente]['name'];
	$temppresidente = $_FILES[$presidente]['tmp_name'];

	if(empty($imgpresidente)){
	$sql = "UPDATE rfa_site_galeria SET nome_presidente = '$nomepresidente', ano_rotario_i = '$anorotarioi', ano_rotario_f = '$anorotariof',  sexo = '$sexo' WHERE clube='$club' AND cod_galeria='$idgaleria';";
	}else{
	$dirpresidente = $pastaimg.$data.$imgpresidente;
	$sql = "UPDATE rfa_site_galeria SET nome_presidente = '$nomepresidente', ano_rotario_i = '$anorotarioi', ano_rotario_f = '$anorotariof', imagem_presidente = '$dirpresidente', sexo = '$sexo' WHERE clube='$club' AND cod_galeria='$idgaleria';";
	}	

	

}

	
	if ($link->multi_query($sql) === TRUE) {
		//move_uploaded_file($temppresidente,$dirpresidente);
		echo "<script>javascript:alert('Presidente atualizado com sucesso!');javascript:window.location='site-galeria.php'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>