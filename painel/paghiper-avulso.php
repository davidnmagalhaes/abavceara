<?php 

include_once("config.php");

$clube = $_POST['clube'];

$sql = "SELECT * FROM rfa_clubes WHERE id_clube='$clube'";
$listachave = mysqli_query($link, $sql) or die(mysqli_error($link));
$row_listachave = mysqli_fetch_assoc($listachave);
$chavepaghiper = $row_listachave['paghiper_appkey'];


$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['phone'];
$parcelas = $_POST['parcelas'];
$vencimento = date('Y-m-d', strtotime($_POST['date']));
$descricao = $_POST['descricao'];
$percdesconto = $_POST['desconto_cob'];
$pagamentoate = $_POST['pagamentoate_cob'];
$datecreate = date("Y-m-d H:i:s");
$preco = $_POST['valor'];
$statuspgto = 0;

// Transforma em centavos
$valor1 = str_replace(',','',$preco);
$valor = str_replace('.','',$valor1);

$desconto = ($valor * $percdesconto) /100;

$multa = $_POST['multa'];
$juros = $_POST['juros'];

// Código para emitir boleto no Paghiper
$qtdparcelas = $parcelas;
$divideparcela = $valor / $qtdparcelas;
$valorboleto = number_format($divideparcela/100,2,",", ".");

$sql = "";
$parcela = 0; // Não Alterar DEVE SEMPRE INICIAR EM 0 
$parcelaf = $qtdparcelas; // numero de parcelas que deseja o carne
$dataHoje = date('Y-m-d'); //não alterar, busca a data atual
$diavencimento = date('Y-m-d', strtotime($vencimento)); // Data do vencimento da primeira parcela, em formato Universal Y-M-D
while ($parcela < $parcelaf): // laço que calcula a quantidade de vezes que deve requisitar os boletos.
    if ($parcela > 0):
        $novovencimento = date('Y-m-d', strtotime('+ ' . $parcela . ' months', strtotime($diavencimento)));
    else:
        $novovencimento = $diavencimento;
    endif;
    $parcelan = $parcela + 1; // $parcelan serve para exibir corretamente o numero de parcelas do carne.
    $data1 = new DateTime($novovencimento);
    $data2 = new DateTime($dataHoje);

    $intervalo = $data1->diff($data2); // CALCULA A DIFERENÇA DE DATAS, PARA TRAZER O RESULTADOS EM DIAS CORRIDOS
    $vencimentoBoleto = $intervalo->days;

$codboleto = date("YmdHis").rand(10,99);
$data = array(
  'apiKey' => $chavepaghiper,
  'order_id' => $codboleto, // código interno do lojista para identificar a transacao.
  'payer_email' => $email,
  'payer_name' => $nome, // nome completo ou razao social
  'payer_cpf_cnpj' => $cpf, // cpf ou cnpj
  'payer_phone' => $telefone, // fixou ou móvel
  //'payer_street' => 'Av Brigadeiro Faria Lima',
  //'payer_number' => '1461',
  //'payer_complement' => 'Torre Sul 4º Andar',
  //'payer_district' => 'Jardim Paulistano',
  //'payer_city' => 'São Paulo',
  //'payer_state' => 'SP', // apenas sigla do estado
  //'payer_zip_code' => '01452002',
  'notification_url' => 'https://abavceara.com.br/painel/retorno_paghiper_avulso.php?id='.$clube,
  'discount_cents' => '0', // em centavos
  'shipping_price_cents' => '0', // em centavos
  //'shipping_methods' => 'PAC',
  'fixed_description' => true,
  'type_bank_slip' => 'boletoA4', // formato do boleto
  'days_due_date' => $vencimentoBoleto, // dias para vencimento do boleto
  'late_payment_fine' => $multa,// Percentual de multa após vencimento.
  'per_day_interest' => $juros, // Juros após vencimento.
  'early_payment_discounts_cents' => $desconto,//Valor de desconto em centavos
  'open_after_day_due' => $pagamentoate,
  'items' => array(
      array ('description' => $descricao,
      'quantity' => '1',
'item_id' => '1',
'price_cents' => $divideparcela), // em centavos

),
);
$data_post = json_encode( $data );
$url = "http://api.paghiper.com/transaction/create/";
$mediaType = "application/json"; // formato da requisição
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
// captura o http code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpCode == 201):
// CÓDIGO 201 SIGNIFICA QUE O BOLETO FOI GERADO COM SUCESSO
//echo $result;

// Exemplo de como capturar a resposta json
$transaction_id = $json['create_request']['transaction_id'];
$url_slip = $json['create_request']['bank_slip']['url_slip'];
$digitable_line = $json['create_request']['bank_slip']['digitable_line'];
$url_slip_pdf = $json['create_request']['bank_slip']['url_slip'];
echo "<a href='".$url_slip_pdf."/pdf' target='_blank'><strong>Visualizar PDF</strong></a>";
echo $resulta = file_get_contents($url_slip);

$sql .= "INSERT INTO rfa_boletos (cod_boleto, nome, email, cpf, telefone, parcelas, vencimento, descricao, percdesconto, pagamentoate, clube, date_create, status_pgto, link_boleto, valor) VALUES ('$codboleto','$nome', '$email', '$cpf', '$telefone', '$parcelas', '$vencimento', '$descricao', '$percdesconto', '$pagamentoate','$clube', '$datecreate', '$statuspgto', '$url_slip_pdf', '$valorboleto');";

else:
//Esse trecho acessa a URL do boleto e exibe o conteudo na pagina, de acordo com a quantidade de parcelas, na hora da impressão ja gera a paginação.
     //echo $result;   
	 echo "Infelizmente estamos com uma instabilidade em nossa emiss&atilde;o de boletos online!";
endif;

$parcela ++; // incrementa a contagem de parcelas, para que assim o laço se encerre na quantidade certa de parcelas 
endwhile; // fim do laço

$link->multi_query($sql);

?>

		

