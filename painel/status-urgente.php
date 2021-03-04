<?php 
//Conexão com banco de dados
include_once("config.php");

$statusurgente = mysqli_real_escape_string($link,$_POST['statusurgente']);
$clube = mysqli_real_escape_string($link,$_POST['clube']);

if($statusurgente == 1){
	$status = "Habilitadas";
}else{
	$status = "Desabilitadas";
}

$sql = "UPDATE rfa_clubes SET status_urgente = '$statusurgente' WHERE id_clube='$clube'";
	
if ($link->multi_query($sql) === TRUE) {
		echo "<script>javascript:alert('As notícias urgentes estão ".$status."!');javascript:window.location='site-urgente.php'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>