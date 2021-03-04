<?php 
//Conexão com banco de dados
include_once("config.php");

$user = mysqli_real_escape_string($link,$_POST['user']);
$club = mysqli_real_escape_string($link,$_POST['club']);

$qv = "SELECT * FROM rfa_rc_doacoes WHERE clube='$club'";
$verifica = mysqli_query($link, $qv) or die(mysqli_error($link));
$row_verifica = mysqli_fetch_assoc($verifica);	
$totalRows_verifica = mysqli_num_rows($verifica);

$datacadastro = date('Y-m-d');

	$sql = "INSERT INTO rfa_rc_doacoes (nome_doador, email_doador, fonedoador, cep_doador, enddoador, numdoador, uf_doador, cid_doador, nasc_doador, cel_doador, cpf_doador, rg_doador, id_item_doacao, tmp_uso_item, mod_uso_item, desc_item, clube) VALUES ('$nomedoador', '$emaildoador', '$fonedoador', '$fonedoador', '$cepdoador', '$enddoador', '$numdoador', '$ufdoador','$ciddoador','$ciddoador', '$nascdoador', '$celdoador', '$cpfdoador', '$rgdoador','$iditemdoacao', '$tmpusoitem', 'mod_item', '$descitemm', '$clube');";

	
	if ($link->multi_query($sql) === TRUE) {
		echo "<script>javascript:alert('Cadastro de doações realizado com sucesso!');javascript:window.location='doacoes.php'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>