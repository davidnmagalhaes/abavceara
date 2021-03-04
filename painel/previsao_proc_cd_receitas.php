<?php 
//Conexão com banco de dados
include_once("config.php");

$club = mysqli_real_escape_string($link,$_POST['club']);

/*Recebe as variáveis de cd_banco.php*/
$descricao = mysqli_real_escape_string($link,$_POST['descricao_receita']);
$data = mysqli_real_escape_string($link,$_POST['data_receita']);
$categoria = mysqli_real_escape_string($link,$_POST['categoria']); 

$valor = mysqli_real_escape_string($link,str_replace('.','',$_POST['valor_receita']));
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
			
		
		$sql .= "INSERT INTO rfa_prev_receitas (cat_prev_receitas, id_recorrente, recorrente, desc_prev_receitas, data_prev_receitas, valor_prev_receitas, clube) VALUES ('$categoria','$idrecorrente','$recorrente', '$descricao', '$datapgto', '$valorat', '$club');";
	}
}else{
	while ($currentDate >= $startDate) {

		$datapgto = date('Y-m-d',strtotime(date('Y-m-d',$currentDate).'-0 days'));
	
		$currentDate = strtotime( date('Y-m-d',$currentDate).' -1 month');
			
		
		$sql .= "INSERT INTO rfa_prev_receitas (cat_prev_receitas, id_recorrente, recorrente, desc_prev_receitas, data_prev_receitas, valor_prev_receitas, clube) VALUES ('$categoria','$idrecorrente','$recorrente', '$descricao', '$datapgto', '$valorat', '$club');";
	}
}
  



}else{
	$sql = "INSERT INTO rfa_prev_receitas (cat_prev_receitas, id_recorrente, recorrente, desc_prev_receitas, data_prev_receitas, valor_prev_receitas, clube) VALUES ('$categoria','$idrecorrente','$recorrente', '$descricao', '$data', '$valorat', '$club');";
}


	if ($link->multi_query($sql) === TRUE) {
		echo "<script>javascript:alert('Cadastro de receita prevista realizado com sucesso!');javascript:window.location='previsao_receitas.php'</script>";
	
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}

	$link->close();

?>