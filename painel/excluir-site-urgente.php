<?php

     require_once('config.php');
    $idurgente = $_GET['id_urgente'];
	$clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_urgente WHERE id_urgente='$idurgente' AND clube='$clube';";


if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Post removido com sucesso!');javascript:window.location='site-urgente.php'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>