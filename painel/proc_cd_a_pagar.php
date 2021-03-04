<?php 
//Conexão com banco de dados
include_once("config.php");

$user = mysqli_real_escape_string($link,$_POST['user']);
$club = mysqli_real_escape_string($link,$_POST['club']);

$qv = "SELECT * FROM rfa_bancos WHERE clube='$club' AND conta_mensalidade='1'";
$verifica = mysqli_query($link, $qv) or die(mysqli_error($link));
$row_verifica = mysqli_fetch_assoc($verifica);	
$totalRows_verifica = mysqli_num_rows($verifica);

if($totalRows_verifica <= 0){echo "<script>javascript:alert('Não há uma conta bancária principal cadastrada! Você será redirecionado para cadastrar em conta...');javascript:window.location='cd_banco.php'</script>";
}else{

$por = mysqli_real_escape_string($link,$_POST['por']);
$destino = mysqli_real_escape_string($link,$_POST['origem_pagar']);
$descricao = mysqli_real_escape_string($link,$_POST['descricao_pagar']);
$data = mysqli_real_escape_string($link,$_POST['data_pagar']);
$status = mysqli_real_escape_string($link,$_POST['status_pagar']);

$datacadastro = date('Y-m-d');

$valor = mysqli_real_escape_string($link,str_replace('.','',$_POST['valor_pagar']));
$valorat = str_replace(',','.',$valor);

$recorrente = mysqli_real_escape_string($link,$_POST['recorrente']);

if($recorrente==1){
$idrecorrente = date('YmdHi').rand(10,99);
$datainicial = $_POST['datainicial_recorrencia'];
$datafinal = $_POST['datafinal_recorrencia'];
$diavencimento = $_POST['diavencimento_recorrencia'];

$dataini = $datainicial."-".$diavencimento;
$datafim = $datafinal."-".$diavencimento;

$startDate = strtotime($dataini);
$endDate   = strtotime($datafim);

$currentDate = $endDate;

if($diavencimento>=28){
	while ($currentDate >= $startDate) {

		$datapgto = date('Y-m-t',strtotime(date('Y-m-d',$currentDate).'-2 days'));
	
		$currentDate = strtotime( date('Y-m-d',$currentDate).' -1 month');
			
		
		$sql .= "INSERT INTO rfa_pagar (id_recorrente, recorrente, origem_pagar, descricao_pagar, data_pagar, status_pagar, valor_pagar, por_pagar, user, data_cadastro, clube) VALUES ('$idrecorrente','$recorrente','$destino', '$descricao', '$datapgto', '$status', '$valorat', '$por', '$user', '$datacadastro', '$club');";
	}
}else{
	while ($currentDate >= $startDate) {

		$datapgto = date('Y-m-d',strtotime(date('Y-m-d',$currentDate).'-0 days'));
	
		$currentDate = strtotime( date('Y-m-d',$currentDate).' -1 month');
			
		
		$sql .= "INSERT INTO rfa_pagar (id_recorrente, recorrente, origem_pagar, descricao_pagar, data_pagar, status_pagar, valor_pagar, por_pagar, user, data_cadastro, clube) VALUES ('$idrecorrente','$recorrente','$destino', '$descricao', '$datapgto', '$status', '$valorat', '$por', '$user', '$datacadastro', '$club');";
	}
}
  



}else{
	$sql = "INSERT INTO rfa_pagar (id_recorrente, origem_pagar, descricao_pagar, data_pagar, status_pagar, valor_pagar, por_pagar, user, data_cadastro, clube) VALUES ('$idrecorrente','$destino', '$descricao', '$data', '$status', '$valorat', '$por', '$user', '$datacadastro', '$club');";
}


	
	if ($link->multi_query($sql) === TRUE) {
		echo "<script>javascript:alert('Cadastro de conta a pagar realizado com sucesso!');javascript:window.location='a-pagar.php'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();
}
?>