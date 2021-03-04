<?php 
//Conexão com banco de dados
include_once("config.php");

$clube = $_POST['clube'];
$statusentrega = $_POST['statusentrega'];
$idassociar = $_POST['idassociar'];

if($statusentrega==1):
$qr = "SELECT * FROM rfa_site_associar WHERE clube='$clube' AND id_associar='$idassociar'";
$lis = mysqli_query($link, $qr) or die(mysqli_error($link));
$row_lis = mysqli_fetch_assoc($lis);

/*Recebe as variáveis de cd_socios.php*/
$nomesocio = $row_lis['razao_associar'];
$fantasia = $row_lis['fantasia_associar'];
$cnpj = $row_lis['cnpj_associar'];
$endereco = $row_lis['endereco_associar'];
$telefone = $row_lis['telefone_associar'];
$numero = $row_lis['numero_associar'];
$bairro = $row_lis['bairro_associar'];
$cidade = $row_lis['cidade_associar'];
$estado = $row_lis['estado_associar'];
$cep = $row_lis['cep_associar'];
$titular = $row_lis['titular_associar'];
$email = $row_lis['emailtitular_associar'];
$financeiro = $row_lis['financeiro_associar'];
$emailfin = $row_lis['emailfin_associar'];

$status = 1; //Significa Pendente inicialmente - STATUS DA MENSALIDADE

$cod = date('YmdHi').rand(10,99);
$datacadastro = date('Y-m-d');

$sql = "INSERT INTO rfs_socios (status_socio, status_cob,nome_socio, cpf_socio, email_socio, telefone_socio, data_cadastro, mensalidade_status, clube, ref_socio,  cep_socio, endereco_socio, numero_end_socio, bairro_socio, cidade_socio, estado_socio) VALUES ('1','1','$nomesocio', '$cnpj', '$email', '$telefone',  '$datacadastro', '$status', '$clube', '$cod',  '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$estado');";
$sql .= "INSERT INTO rfa_socios_filhos (nome_filho, id_socio) VALUES ('$titular', '$cod');";
$sql .= "DELETE FROM rfa_site_associar WHERE clube='$clube' AND id_associar='$idassociar';";
	
if ($link->multi_query($sql) === TRUE) {
		echo "<script>javascript:window.location='socios.php?clube=".$club."'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();
endif;
?>