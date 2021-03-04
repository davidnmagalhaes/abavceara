<?php

     require_once('config.php');
    $idouvidoria = $_GET['id_ouvidoria'];
    $clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_ouvidoria WHERE id_ouvidoria='$idouvidoria' AND clube='$clube';";
    

if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Solicitação removida com sucesso!');javascript:window.location='ouvidoria".$clube."'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>