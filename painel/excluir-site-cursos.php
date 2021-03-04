<?php

     require_once('config.php');
    $idcurso = $_GET['id_curso'];
	$clube = $_GET['clube'];
    
    $result_usuario = "DELETE FROM rfa_site_cursos WHERE id_curso='$idcurso' AND clube='$clube';";


if ($link->multi_query($result_usuario) === TRUE) {
		echo "<script>javascript:alert('Curso removido com sucesso!');javascript:window.location='cursos".$clube."'</script>";
	
	} else {
		echo "Error: " . $result_usuario . "<br>" . $link->error;
	}

	$link->close();
	
	
?>