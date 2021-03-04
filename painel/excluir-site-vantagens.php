<?php

     require_once('config.php');
    $idvantagens = $_GET['id_vantagens'];
	$clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_vantagens WHERE id_vantagens='$idvantagens' AND clube='$clube';";


if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Vantagem removida com sucesso!');javascript:window.location='vantagens".$clube."'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>