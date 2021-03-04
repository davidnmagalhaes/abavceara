<?php
include_once("config.php");
//include($arquivo);
$id = $_GET['id'];

$sql = "SELECT * FROM rfa_clubes WHERE id_clube='$id'";
$listainfo = mysqli_query($link, $sql) or die(mysqli_error($link));
$row_listainfo = mysqli_fetch_assoc($listainfo);
$apikeyclub = $row_listainfo['paghiper_appkey'];
$tokenclub = $row_listainfo['paghiper_token'];
$taxaclub = $row_listainfo['paghiper_taxa'];

$data = array (
	'transaction_id' => $_POST['transaction_id'],
	'notification_id' => $_POST['notification_id'],
	'apiKey' => $apikeyclub,
	'token' => $tokenclub,
);

$data;

$data_post = json_encode( $data );
$url = "https://api.paghiper.com/transaction/notification/";
$mediaType = "application/json";
$charSet = "UTF-8";
$headers = array();
$headers[] = "Accept: ".$mediaType;
$headers[] = "Accept-Charset: ".$charSet;
$headers[] = "Accept-Encoding: ".$mediaType;
$headers[] = "Content-Type: ".$mediaType.";charset=".$charSet;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
$json = json_decode($result, true);

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$vr = $json['status_request']['value_cents_paid']; //Valor do pedido
$valorpedido = number_format($vr/100,2,",", ".");
$npedido = $json['status_request']['order_id']; //número do pedido

$datapg = date('Y-m-d');
$datapgto = date('Y-m-d', strtotime("+3 days",strtotime($datapg))); 

$mesref = date('Y-m-d',strtotime($year."-".$month."-".$diavenc)); //mês de referencia da mensalidade

	if($json['status_request']['result'] == 'success'):

					if($json['status_request']['status'] == 'pending'):

					// aqui voce ira colocar o codigo PHP que deseja executar assim que o boleto é gerado, caso ja salve os dados na hora de criar o boleto nao precisa executar nada aqui

					
					elseif($json['status_request']['status'] == 'paid'):

					//Codigo que sera executado assim que ocorrer a alteração de status para pago.
					$result = "UPDATE rfa_boletos SET taxa='$taxaclub', valor = '$valorpedido', status_pgto = '1', data_pagamento = '$datapgto' WHERE cod_boleto = '$npedido'";
					
					mysqli_multi_query($link, $result);
					

					elseif($json['status_request']['status'] == 'completed'):

                    $result = "UPDATE rfa_boletos SET status_pgto = '2' WHERE cod_boleto = '$npedido'";
					
					mysqli_multi_query($link, $result);
					

					elseif($json['status_request']['status'] == 'canceled'):
					
                    $result = "UPDATE rfa_boletos SET status_pgto = '3' WHERE cod_boleto = '$npedido'";
					
                    mysqli_multi_query($link, $result);
					
					else:
					
				
					
					endif;

	else:
					
		// no caso de não encontrar a notificação		
					
	endif;
?>