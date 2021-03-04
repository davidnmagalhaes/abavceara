<?php

     require_once('config.php');
    $identidade = $_GET['id_entidade'];
	$clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_entidades WHERE id_entidade='$identidade' AND clube='$clube';";


if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Entidade removida com sucesso!');javascript:window.location='entidades".$clube."'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>