<?php

     require_once('config.php');
    $idparque = $_GET['id_parque'];
	$clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_parques WHERE id_parque='$idparque' AND clube='$clube';";


if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Parque removido com sucesso!');javascript:window.location='parques".$clube."'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>