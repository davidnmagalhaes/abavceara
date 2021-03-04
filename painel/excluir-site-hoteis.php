<?php

     require_once('config.php');
    $idhotel = $_GET['id_hotel'];
	$clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_hoteis WHERE id_hotel='$idhotel' AND clube='$clube';";


if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Hotel removido com sucesso!');javascript:window.location='hoteis".$clube."'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>