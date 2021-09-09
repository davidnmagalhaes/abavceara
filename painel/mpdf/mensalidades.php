<?php
require_once __DIR__ . '/vendor/autoload.php';
include_once("../config.php");

$clube = $_GET['clube'];
$mes = $_GET['mes'];
$ano = $_GET['ano'];

$sqlisinad = "SELECT * FROM rfa_mensalidades INNER JOIN rfs_socios ON rfa_mensalidades.id_socio = rfs_socios.id_socio WHERE rfa_mensalidades.clube='$clube' AND MONTH(rfa_mensalidades.data_mensalidade) = '$mes' AND YEAR(rfa_mensalidades.data_mensalidade) = '$ano' ORDER BY rfa_mensalidades.data_mensalidade ASC";
$lisinadtotal = mysqli_query($link, $sqlisinad) or die(mysqli_error($link));
$totalRows_lisinadtotal = mysqli_num_rows($lisinadtotal);

$countdividas = 0;
while ($row_lisinadtotal = mysqli_fetch_assoc($lisinadtotal)) {
  $countdividas += 1;

  switch ($row_lisinadtotal['tipo_pagamento']) {
    case 1:
      $tipopagamento = "Boleto";
      break;

    case 2:
      $tipopagamento = "Dinheiro";
      break;

    case 3:
      $tipopagamento = "Transferência";
      break;

    case 4:
      $tipopagamento = "Cheque";
      break;
  }

  $listadividas .= "<tr>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>" . $countdividas . "</td>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>" . $row_lisinadtotal['nome_socio'] . "</td>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>" . date('d/m/Y', strtotime($row_lisinadtotal['data_pagamento'])) . "</td>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>" . date('d/m/Y', strtotime($row_lisinadtotal['data_mensalidade'])) . "</td>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>R$ " . number_format($row_lisinadtotal['valor_mensalidade'], 2, ',', '.') . "</td>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>" . $tipopagamento . "</td>
    </tr>";
}

$html = "
 <fieldset>

 <h1>Relatório de Mensalidades de " . $mes . "/" . $ano . "</h1>
 
 <table>
 <tr>
  <th></th>
  <th>Associado</th>
  <th>Pagamento</th>
  <th>Mensalidade</th>
  <th>Valor</th>
  <th>Tipo</th>
 </tr>
" . $listadividas . "
</table>

 </fieldset>
 
 ";

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("css/estilo.css");
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();

exit;
