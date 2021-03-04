<?php

     require_once('config.php');
    $idassociar = $_GET['id_associar'];
    $clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_associar WHERE id_associar='$idassociar' AND clube='$clube';";
    

if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Solicitação removida com sucesso!');javascript:window.location='solicitacoesassoc".$clube."'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>