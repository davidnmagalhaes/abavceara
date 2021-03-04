<?php 
require_once __DIR__ . '/vendor/autoload.php';
include_once("../config.php");

$idsocio = $_GET['idsocio'];
$clube = $_GET['clube'];
$datahoje = date('Y-m-d');

$sqlclub = "SELECT * FROM rfa_clubes WHERE id_clube='$clube'";
$lisclub = mysqli_query($link, $sqlclub) or die(mysqli_error($link));
$row_lisclub = mysqli_fetch_assoc($lisclub);

$sqlsoc = "SELECT * FROM rfs_socios WHERE clube='$clube' AND id_socio='$idsocio'";
$lissoc = mysqli_query($link, $sqlsoc) or die(mysqli_error($link));
$row_lissoc = mysqli_fetch_assoc($lissoc);

$sqlisinad = "SELECT * FROM rfa_mensalidades WHERE clube='$clube' AND pagamento=0 AND data_mensalidade < '$datahoje' AND id_socio='$idsocio' ORDER BY data_mensalidade ASC";
$lisinadtotal = mysqli_query($link, $sqlisinad) or die(mysqli_error($link));
$totalRows_lisinadtotal = mysqli_num_rows($lisinadtotal);

$sqlisinads = "SELECT SUM(valor_mensalidade) as valortotal FROM rfa_mensalidades WHERE clube='$clube' AND pagamento=0 AND data_mensalidade < '$datahoje' AND id_socio='$idsocio' ORDER BY data_mensalidade ASC";
$lisinadtotals = mysqli_query($link, $sqlisinads) or die(mysqli_error($link));
$row_lisinadtotals = mysqli_fetch_assoc($lisinadtotals);
$totalRows_lisinadtotals = mysqli_num_rows($lisinadtotals);

$listadividas = "";
$countdividas = 0;
while($row_lisinadtotal = mysqli_fetch_assoc($lisinadtotal)){
    $countdividas += 1;
    $data1 = new DateTime($row_lisinadtotal['data_mensalidade']);
    $data2 = new DateTime($datahoje);

    $intervalo = $data1->diff( $data2 );

    $meses = ($intervalo->m)+1;
   

    $multa = $row_lisinadtotal['valor_mensalidade'] + (($row_lisinadtotal['valor_mensalidade'] * 2)/100);
    $juros = (($multa * ($meses))/100) + ($multa);

    $totalatualizado += $juros;
    
    $listadividas .= "<tr>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>".$countdividas."</td>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>".date('d/m/Y',strtotime($row_lisinadtotal['data_mensalidade']))."</td>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>R$ ".number_format($row_lisinadtotal['valor_mensalidade'],2,',','.')."</td>
        <td style='text-align:center; background: #e6e6e6; padding: 5px'>R$ ".number_format($juros,2,',', '.')."</td>
    </tr>";
}

 $html = "
 <fieldset>

 <h1>Relatório de Inadimplência - ".$row_lisclub['nome_clube']."</h1>
 <p style='text-align:center;'><strong>Associado:</strong> ".$row_lissoc['nome_socio']."</p>


<div style='width:100%;margin: 0 5px'>

<table style='width: 100%'>
<tr>
    <th style='text-align:center; background:#5f5f5f; color: #fff; padding: 5px'>Nº</th>
    <th style='text-align:center; background:#5f5f5f;  color: #fff; padding: 5px'>Vencimento</th>
    <th style='text-align:center; background:#5f5f5f; color: #fff; padding: 5px'>Mensalidade</th>
    <th style='text-align:center; background:#5f5f5f; color: #fff; padding: 5px'>Valor Atualizado</th>
</tr>
".$listadividas."
<tr>
    <th style='text-align:center; background:#5f5f5f; color: #fff; padding: 5px'></th>
    <th style='text-align:center; background:#5f5f5f;  color: #fff; padding: 5px'></th>
    <th style='text-align:center; background:#5f5f5f;  color: #fff; padding: 5px'>Total: R$ ".number_format($row_lisinadtotals['valortotal'],2,',','.')."</th>
    <th style='text-align:center; background:#5f5f5f; color: #fff; padding: 5px'>Total: R$ ".number_format($totalatualizado,2,',','.')."</th>
</tr>
</table>
<Br>
<p style='text-align:center'>* O valor atualizado tem adicional de 2% de multa + 1% ao mês</p>
</div>

<div style='text-align:center; margin: 50px auto;'><img src='../images/clube-digital.jpg' width='200' ></div>

 </fieldset>
 
 ";

$mpdf = new \Mpdf\Mpdf();
 $mpdf->SetDisplayMode('fullpage');
 $css = file_get_contents("css/estilo.css");
 $mpdf->WriteHTML($css,1);
 $mpdf->WriteHTML($html);
$mpdf->Output();

 exit;