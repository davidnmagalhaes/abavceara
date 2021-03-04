<?php

     require_once('config.php');
    $idvisto = $_GET['id_visto'];
    $clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_vistos WHERE id_visto='$idvisto' AND clube='$clube';";
    

if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Solicitação removida com sucesso!');javascript:window.location='centraldevistos".$clube."'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>