<?php 
//Conexão com banco de dados
include_once("config.php");

session_start();

$clube = $_SESSION['clube'];
$page = mysqli_real_escape_string($link,$_POST['page']);

//Busca ativo ou não ativo via post do formulário permissoes.php
$presidente = mysqli_real_escape_string($link,$_POST['presidente']);
$vicepresidente = mysqli_real_escape_string($link,$_POST['vicepresidente']);
$diretorsec = mysqli_real_escape_string($link,$_POST['diretorsec']);
$diretortes = mysqli_real_escape_string($link,$_POST['diretortes']);
$diretorsoc = mysqli_real_escape_string($link,$_POST['diretorsoc']);
$diretorpat = mysqli_real_escape_string($link,$_POST['diretorpat']);
$diretortur = mysqli_real_escape_string($link,$_POST['diretortur']);
$secexec = mysqli_real_escape_string($link,$_POST['secexec']);

//Níveis
$nivel_presidente = 2;
$nivel_vicepresidente = 3;
$nivel_diretorsec = 4;
$nivel_diretortes = 5;
$nivel_diretorsoc = 6;
$nivel_diretorpat = 7;
$nivel_diretortur = 8;
$nivel_secexec = 9;

//Queries dos níveis
$sq2 = "SELECT * FROM rfa_acesso_paginas WHERE nivel_acesso = '$nivel_presidente' AND pagina_id = '$page' AND clube = '$clube'";
$qpresidente = mysqli_query($link, $sq2) or die(mysqli_error($link));

$sq3 = "SELECT * FROM rfa_acesso_paginas WHERE nivel_acesso = '$nivel_vicepresidente' AND pagina_id = '$page' AND clube = '$clube'";
$qvicepresidente = mysqli_query($link, $sq3) or die(mysqli_error($link));

$sq4 = "SELECT * FROM rfa_acesso_paginas WHERE nivel_acesso = '$nivel_diretorsec' AND pagina_id = '$page' AND clube = '$clube'";
$qdiretorsec = mysqli_query($link, $sq4) or die(mysqli_error($link));

$sq5 = "SELECT * FROM rfa_acesso_paginas WHERE nivel_acesso = '$nivel_diretortes' AND pagina_id = '$page' AND clube = '$clube'";
$qdiretortes = mysqli_query($link, $sq5) or die(mysqli_error($link));

$sq6 = "SELECT * FROM rfa_acesso_paginas WHERE nivel_acesso = '$nivel_diretorsoc' AND pagina_id = '$page' AND clube = '$clube'";
$qdiretorsoc = mysqli_query($link, $sq6) or die(mysqli_error($link));

$sq7 = "SELECT * FROM rfa_acesso_paginas WHERE nivel_acesso = '$nivel_diretorpat' AND pagina_id = '$page' AND clube = '$clube'";
$qdiretorpat = mysqli_query($link, $sq7) or die(mysqli_error($link));

$sq8 = "SELECT * FROM rfa_acesso_paginas WHERE nivel_acesso = '$nivel_diretortur' AND pagina_id = '$page' AND clube = '$clube'";
$qdiretortur = mysqli_query($link, $sq8) or die(mysqli_error($link));

$sq9 = "SELECT * FROM rfa_acesso_paginas WHERE nivel_acesso = '$nivel_secexec' AND pagina_id = '$page' AND clube = '$clube'";
$qsecexec = mysqli_query($link, $sq9) or die(mysqli_error($link));

//Condição para Presidente
$totalRows_qpresidente = mysqli_num_rows($qpresidente);
if($totalRows_qpresidente <= 0){
	$sql .= "INSERT INTO rfa_acesso_paginas (nivel_acesso, pagina_id, consulta_acesso, clube) VALUES ('$nivel_presidente', '$page', '$presidente', '$clube');";
}else{
	$sql .= "UPDATE rfa_acesso_paginas SET consulta_acesso = '$presidente' WHERE clube = '$clube' AND nivel_acesso = '$nivel_presidente' AND pagina_id = '$page';";
}

//Condição para Secretário
$totalRows_qvicepresidente = mysqli_num_rows($qvicepresidente);
if($totalRows_qvicepresidente <= 0){
	$sql .= "INSERT INTO rfa_acesso_paginas (nivel_acesso, pagina_id, consulta_acesso, clube) VALUES ('$nivel_vicepresidente', '$page', '$vicepresidente', '$clube');";
}else{
	$sql .= "UPDATE rfa_acesso_paginas SET consulta_acesso = '$vicepresidente' WHERE clube = '$clube' AND nivel_acesso = '$nivel_vicepresidente' AND pagina_id = '$page';";
}

//Condição para Contador
$totalRows_qdiretorsec = mysqli_num_rows($qdiretorsec);
if($totalRows_qdiretorsec <= 0){
	$sql .= "INSERT INTO rfa_acesso_paginas (nivel_acesso, pagina_id, consulta_acesso, clube) VALUES ('$nivel_diretorsec', '$page', '$diretorsec', '$clube');";
}else{
	$sql .= "UPDATE rfa_acesso_paginas SET consulta_acesso = '$diretorsec' WHERE clube = '$clube' AND nivel_acesso = '$nivel_diretorsec' AND pagina_id = '$page';";
}

//Condição para Secretário Executivo
$totalRows_qdiretortes = mysqli_num_rows($qdiretortes);
if($totalRows_qdiretortes <= 0){
	$sql .= "INSERT INTO rfa_acesso_paginas (nivel_acesso, pagina_id, consulta_acesso, clube) VALUES ('$nivel_diretortes', '$page', '$diretortes', '$clube');";
}else{
	$sql .= "UPDATE rfa_acesso_paginas SET consulta_acesso = '$diretortes' WHERE clube = '$clube' AND nivel_acesso = '$nivel_diretortes' AND pagina_id = '$page';";
}

//Condição para Secretário Tesoureiro
$totalRows_qdiretorsoc = mysqli_num_rows($qdiretorsoc);
if($totalRows_qdiretorsoc <= 0){
	$sql .= "INSERT INTO rfa_acesso_paginas (nivel_acesso, pagina_id, consulta_acesso, clube) VALUES ('$nivel_diretorsoc', '$page', '$diretorsoc', '$clube');";
}else{
	$sql .= "UPDATE rfa_acesso_paginas SET consulta_acesso = '$diretorsoc' WHERE clube = '$clube' AND nivel_acesso = '$nivel_diretorsoc' AND pagina_id = '$page';";
}

$totalRows_qdiretorpat = mysqli_num_rows($qdiretorpat);
if($totalRows_qdiretorpat <= 0){
	$sql .= "INSERT INTO rfa_acesso_paginas (nivel_acesso, pagina_id, consulta_acesso, clube) VALUES ('$nivel_diretorpat', '$page', '$diretorpat', '$clube');";
}else{
	$sql .= "UPDATE rfa_acesso_paginas SET consulta_acesso = '$diretorpat' WHERE clube = '$clube' AND nivel_acesso = '$nivel_diretorpat' AND pagina_id = '$page';";
}

$totalRows_qdiretortur = mysqli_num_rows($qdiretortur);
if($totalRows_qdiretortur <= 0){
	$sql .= "INSERT INTO rfa_acesso_paginas (nivel_acesso, pagina_id, consulta_acesso, clube) VALUES ('$nivel_diretortur', '$page', '$diretortur', '$clube');";
}else{
	$sql .= "UPDATE rfa_acesso_paginas SET consulta_acesso = '$diretortur' WHERE clube = '$clube' AND nivel_acesso = '$nivel_diretortur' AND pagina_id = '$page';";
}

$totalRows_qsecexec = mysqli_num_rows($qsecexec);
if($totalRows_qsecexec <= 0){
	$sql .= "INSERT INTO rfa_acesso_paginas (nivel_acesso, pagina_id, consulta_acesso, clube) VALUES ('$nivel_secexec', '$page', '$secexec', '$clube');";
}else{
	$sql .= "UPDATE rfa_acesso_paginas SET consulta_acesso = '$secexec' WHERE clube = '$clube' AND nivel_acesso = '$nivel_secexec' AND pagina_id = '$page';";
}


	
	if ($link->multi_query($sql) === TRUE) {
		echo "<script>javascript:alert('Permissões configuradas com sucesso!');javascript:window.location='permissoes.php'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>