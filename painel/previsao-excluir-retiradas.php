<?php 
//Conexão com banco de dados
include_once("config.php");
  
$idretirada = $_GET['idretirada'];
$club = $_GET['clube'];
$tiporecorre = $_GET['tiporecorre'];
$idrecorrente = $_GET['idrecorrente'];

$qr = "SELECT * FROM rfa_prev_retiradas WHERE clube='$club' AND id_prev_retiradas='$idretirada'";
$pegavalor = mysqli_query($link, $qr) or die(mysqli_error($link));
$row_pegavalor = mysqli_fetch_assoc($pegavalor);
$valorpag = $row_pegavalor['valor_retiradas'];


	if($tiporecorre=="only" || empty($tiporecorre)){
		$sql = "DELETE FROM rfa_prev_retiradas WHERE id_prev_retiradas='$idretirada' AND clube='$club';";
	}else{
		$sql = "DELETE FROM rfa_prev_retiradas WHERE clube='$club' AND id_recorrente='$idrecorrente';";
	}

	
	if ($link->multi_query($sql) === TRUE) {
		echo "<script>javascript:alert('Sua retirada prevista foi removida com sucesso!');javascript:window.location='previsao_retiradas.php'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>