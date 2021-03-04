<?php

     require_once('config.php');
    $idcia = $_GET['id_cia'];
	$clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_cias WHERE id_cia='$idcia' AND clube='$clube';";


if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Cia aérea removida com sucesso!');javascript:window.location='cias".$clube."'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>