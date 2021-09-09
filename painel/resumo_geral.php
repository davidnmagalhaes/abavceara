<?php
spl_autoload_register(function ($class) {
  require_once('class' . DIRECTORY_SEPARATOR . $class . '.php');
});

$clube = 35;
$transacoes = new Transactions; 

/*echo $transacoes->totalDespesasPorBanco($clube, 1172285296)."<br>";
echo $transacoes->totalReceitasPorBanco($clube, 1172285296)."<br>";
echo $transacoes->totalMensalidadesPorBanco($clube, 1)."<br>";
echo $transacoes->totalFundosPorBanco($clube, 1172285296)."<br>";
echo $transacoes->totalSaldosBancosPorBanco($clube, 1172285296)."<br>";
echo $transacoes->totalBoletosAvulsosPorBanco($clube, 1)."<br>";
echo $transacoes->totalRetiradasPorBanco($clube, 1172285296)."<br>";
echo $transacoes->totalTaxasBoletosPorBanco($clube, 1)."<br>";
echo $transacoes->totalTaxasMensalidadesPorBanco($clube, 1)."<br>";

echo $transacoes->totalSaldoPorBanco();*/

echo "<h2>Dados totais acumulativos</h2>";
echo "Despesas: " . $transacoes->totalDespesas($clube);
echo "<br>";
echo "Receitas: " . $transacoes->totalReceitas($clube);
echo "<br>";
echo "Mensalidades: " . $transacoes->totalMensalidades($clube);
echo "<br>";
echo "Fundos: " . $transacoes->totalFundos($clube);
echo "<br>";
echo "Saldos iniciais dos bancos: " . $transacoes->totalSaldosBancos($clube);
echo "<br>";
echo "Boletos avulsos: " . $transacoes->totalBoletosAvulsos($clube);
echo "<br>";
echo "Retiradas: " . $transacoes->totalRetiradas($clube);
echo "<br>";
echo "Inadimplencias: " . $transacoes->totalInadimplencias($clube);
echo "<br>";
echo "Taxas de boletos: " . $transacoes->totalTaxasBoletos($clube);
echo "<br>";
echo "Taxas de mensalidades: " . $transacoes->totalTaxasMensalidades($clube);
echo "<br><br>";
echo "Saldo Total: " . $transacoes->totalSaldo();
echo "<br><br><br>";

$filtromes = 4;
$filtroano = 2021;
echo "<h2>Dados do mês</h2>";
echo "Despesas por mês: " . $transacoes->totalDespesasMes($clube, $filtromes, $filtroano);
echo "<br>";
echo "Despesas previstas por mês: " . $transacoes->totalDespesasMesPrevistas($clube, $filtromes, $filtroano);
echo "<br>";
echo "Receitas: " . $transacoes->totalReceitasMes($clube, $filtromes, $filtroano);
echo "<br>";
echo "Receitas Previstas: " . $transacoes->totalReceitasMesPrevistas($clube, $filtromes, $filtroano);
echo "<br>";
echo "Mensalidades: " . $transacoes->totalMensalidadesMes($clube, $filtromes, $filtroano);
echo "<br>";
echo "Mensalidades previstas: " . $transacoes->totalMensalidadesMesPrevistas($clube, $filtromes, $filtroano);
echo "<br>";
echo "Fundos: " . $transacoes->totalFundosMes($clube, $filtromes, $filtroano);
echo "<br>";
echo "Boletos avulsos: " . $transacoes->totalBoletosAvulsosMes($clube, $filtromes, $filtroano);
echo "<br>";
echo "Retiradas: " . $transacoes->totalRetiradasMes($clube, $filtromes, $filtroano);
echo "<br>";
echo "Taxas de boletos: " . $transacoes->totalTaxasBoletosMes($clube, $filtromes, $filtroano);
echo "<br>";
echo "Taxas de mensalidades: " . $transacoes->totalTaxasMensalidadesMes($clube, $filtromes, $filtroano);
echo "<br><br>";
echo "Inadimplências do mês: " . $transacoes->totalInadimplenciasMes($clube, $filtromes, $filtroano);
echo "<br><br>";
echo "Saldo total do mês: " . $transacoes->totalSaldoMes();
