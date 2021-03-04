<?php 
//Conexão com banco de dados
include_once("config.php");

$club = mysqli_real_escape_string($link,$_POST['club']);
$texto = mysqli_real_escape_string($link,$_POST['texto']);

if(empty($_FILES['documento'])){
	$sql = "UPDATE rfa_site_conteudo SET vistos='$texto' WHERE clube='$club';";
}else{

$doc = 'documento';
$data = date("d-m-Y-H-i");
$pastaimg = 'images/documentos/';

/*Variáveis do upload do destaque*/
	$imgvisto = $_FILES[$doc]['name'];
	$tempvisto = $_FILES[$doc]['tmp_name'];
	$dirvisto = $pastaimg.$data.$imgvisto;

	$sql = "UPDATE rfa_site_conteudo SET vistos='$texto', doc_visto='$dirvisto' WHERE clube='$club';";
}
	
	if ($link->multi_query($sql) === TRUE) {
		move_uploaded_file($tempvisto,$dirvisto);
		echo "<script>javascript:alert('Conteúdo atualizado com sucesso!');javascript:window.location='texto-vistos.php?clube=".$club."'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>