<?php 
//Conexão com banco de dados
include_once("config.php");
  
$idreceita = $_GET['idreceita'];
$club = $_GET['clube'];
$tiporecorre = $_GET['tiporecorre'];
$idrecorrente = $_GET['idrecorrente'];

$qr = "SELECT * FROM rfa_prev_retiradas WHERE clube='$club' AND id_prev_retiradas='$idretirada'";
$pegavalor = mysqli_query($link, $qr) or die(mysqli_error($link));
$row_pegavalor = mysqli_fetch_assoc($pegavalor);
$valorpag = $row_pegavalor['valor_retiradas'];


	if($tiporecorre=="only" || empty($tiporecorre)){
		$sql = "DELETE FROM rfa_prev_receitas WHERE id_prev_receitas='$idreceita' AND clube='$club';";
	}else{
		$sql = "DELETE FROM rfa_prev_receitas WHERE clube='$club' AND id_recorrente='$idrecorrente';";
	}

	
	if ($link->multi_query($sql) === TRUE) {
		echo "<script>javascript:alert('Sua receita prevista foi removida com sucesso!');javascript:window.location='previsao_receitas.php'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>