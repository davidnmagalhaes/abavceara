<?php
class Transactions extends Sql
{
  public $despesasTotais;
  public $despesasTotaisMes;
  public $receitasTotais;
  public $receitasTotaisMes;
  public $mensalidadesTotais;
  public $mensalidadesTotaisMes;
  public $fundosTotais;
  public $fundosTotaisMes;
  public $bancosTotais;
  public $boletosTotais;
  public $receitasPrevistasMes;
  public $mensalidadePrevistasMes;
  public $boletosTotaisPrevistosMes;
  public $despesasPrevistasMes;
  public $fundosTotaisPrevistosMes;
  public $retiradasTotaisPrevistasMes;
  public $taxasTotaisBoletosPrevistasMes;
  public $taxasTotaisMensalidadesPrevistasMes;
  public $boletosTotaisMes;
  public $retiradasTotais;
  public $retiradasMes;
  public $taxasTotaisBoletos;
  public $taxasTotaisBoletosMes;
  public $taxasTotaisMensalidades;
  public $taxasTotaisMensalidadesMes;
  public $despesasTotaisPorBanco;
  public $receitasTotaisPorBanco;
  public $mensalidadesTotaisPorBanco;
  public $fundosTotaisPorBanco;
  public $bancosTotaisPorBanco;
  public $boletosTotaisPorBanco;
  public $retiradasTotaisPorBanco;
  public $taxasTotaisBoletosPorBanco;
  public $taxasTotaisMensalidadesPorBanco;
  public $despesasTotaisPassado;
  public $receitasTotaisPassado;
  public $mensalidadesTotaisPassado;
  public $fundosTotaisPassado;
  public $boletosTotaisPassado;
  public $retiradasTotaisPassado;
  public $taxasTotaisBoletosPassado;
  public $taxasTotaisMensalidadesPassado;
  

  //////////Cálculos totais//////////////
  /*Total de despesas pagas*/
  public function totalDespesas($clube)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor_pagar) as total FROM rfa_pagar WHERE clube=? AND status_pagar=? AND data_pagar<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->despesasTotais = $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de receitas pagas*/
  public function totalReceitas($clube)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor_receita) as total FROM rfa_receitas WHERE clube=? AND status_receita=? AND data_receita<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->receitasTotais = $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de mensalidades pagas subtraindo taxas*/
  public function totalMensalidades($clube)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor_mensalidade) as totalmensalidade FROM rfa_mensalidades WHERE clube=? AND pagamento=? AND data_pagamento<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->mensalidadesTotais = $dados['totalmensalidade'];
    return $dados['totalmensalidade'] == 0 ? 0.00 : $dados['totalmensalidade'];
  }

  /*Total de fundos pagos*/
  public function totalFundos($clube)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor_fundo) as totalfundo FROM rfa_fundos WHERE clube=? AND status_fundo=? AND data_fundo<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->fundosTotais = $dados['totalfundo'];
    return $dados['totalfundo'] == 0 ? 0.00 : $dados['totalfundo'];
  }

  /*Total de fundos pagos*/
  public function totalSaldosBancos($clube)
  {
    $sql = "SELECT SUM(saldo) as totalsaldo FROM rfa_bancos WHERE clube=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->bancosTotais = $dados['totalsaldo'];
    return $dados['totalsaldo'] == 0 ? 0.00 : $dados['totalsaldo'];
  }

  /*Boletos avulsos pagos*/
  public function totalBoletosAvulsos($clube)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor) as totalboletos FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?) AND data_pgto<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->boletosTotais = $dados['totalboletos'];
    return $dados['totalboletos'] == 0 ? 0.00 : $dados['totalboletos'];
  }

  /*Total de retiradas de fundos saindo das contas bancárias cadastradas*/
  public function totalRetiradas($clube)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor_retirada) as totalretirada FROM rfa_retirada WHERE clube=? AND data_retirada<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->retiradasTotais = $dados['totalretirada'];
    return $dados['totalretirada'] == 0 ? 0.00 : $dados['totalretirada'];
  }

  /*Total de taxas dos boletos avulsos pagos*/
  public function totalTaxasBoletos($clube)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?) AND data_pgto<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisBoletos = $dados['totaltaxas'];
    return $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
  }

  /*Total de taxas das mensalidades pagas*/
  public function totalTaxasMensalidades($clube)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_mensalidades WHERE clube=? AND pagamento=? AND data_pagamento<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisMensalidades = $dados['totaltaxas'];
    return $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
  }

  /*Total de inadimplências */
  public function totalInadimplencias($clube)
  {
    $hoje = new DateTime('NOW');
    $d = $hoje->format('Y-m-d');
    $sql = "SELECT SUM(valor_mensalidade) as valor FROM rfa_mensalidades WHERE clube=? AND pagamento=? AND data_mensalidade < ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 0, $d]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    return $dados['valor'] == 0 ? 0.00 : $dados['valor'];
  }

  //Saldo Geral 
  public function totalSaldo()
  {
    //Entradas
    $receitas = $this->receitasTotais;
    $mensalidades = $this->mensalidadesTotais;
    $bancos = $this->bancosTotais;
    $boletos = $this->boletosTotais;

    //Saídas
    $despesas = $this->despesasTotais;
    $fundos = $this->fundosTotais;
    $retiradas = $this->retiradasTotais;
    $taxasboletos = $this->taxasTotaisBoletos;
    $taxasmensalidades = $this->taxasTotaisMensalidades;

    //Somas
    $entradas = $receitas + $mensalidades + $bancos + $boletos;
    $saidas = $despesas + $fundos + $retiradas + $taxasboletos + $taxasmensalidades;

    return $entradas - $saidas;
  }

  //////////Cálculos com filtro de mês e ano//////////////

  /*Total de despesas por mês e ano*/
  public function totalDespesasMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_pagar) as total FROM rfa_pagar WHERE clube=? AND status_pagar=? AND MONTH(data_pagar)=? AND YEAR(data_pagar)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->despesasTotaisMes = $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de receitas pagas por mês e ano*/
  public function totalReceitasMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_receita) as total FROM rfa_receitas WHERE clube=? AND status_receita=? AND MONTH(data_receita)=? AND YEAR(data_receita)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->receitasTotaisMes = $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de mensalidades pagas por mês e ano*/
  public function totalMensalidadesMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_mensalidade) as totalmensalidade FROM rfa_mensalidades WHERE clube=? AND pagamento=? AND MONTH(data_pagamento)=? AND YEAR(data_pagamento)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->mensalidadesTotaisMes = $dados['totalmensalidade'];
    return $dados['totalmensalidade'] == 0 ? 0.00 : $dados['totalmensalidade'];
  }

  //Soma de receitas avulsas + mensalidades pagas do mês
  public function totalReceitaMensalidadeMes()
  {
    //Entradas
    $receitasMes = $this->receitasTotaisMes;
    $mensalidadesMes = $this->mensalidadesTotaisMes;

    //Somas
    $total = $receitasMes + $mensalidadesMes;

    return $total;
  }

  /*Total de fundos pagos por mês e ano*/
  public function totalFundosMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_fundo) as totalfundo FROM rfa_fundos WHERE clube=? AND status_fundo=? AND MONTH(data_fundo)=? AND YEAR(data_fundo)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->fundosTotaisMes = $dados['totalfundo'];
    return $dados['totalfundo'] == 0 ? 0.00 : $dados['totalfundo'];
  }

  /*Boletos avulsos pagos por mês e ano*/
  public function totalBoletosAvulsosMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor) as totalboletos FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?) AND MONTH(data_pgto)=? AND YEAR(data_pgto)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->boletosTotaisMes = $dados['totalboletos'];
    return $dados['totalboletos'] == 0 ? 0.00 : $dados['totalboletos'];
  }

  /*Total de retiradas de fundos saindo das contas bancárias cadastradas por mês e ano*/
  public function totalRetiradasMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_retirada) as totalretirada FROM rfa_retirada WHERE clube=? AND MONTH(data_retirada)=? AND YEAR(data_retirada)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->retiradasTotaisMes = $dados['totalretirada'];
    return $dados['totalretirada'] == 0 ? 0.00 : $dados['totalretirada'];
  }

  /*Total de taxas dos boletos avulsos pagos por mês e ano*/
  public function totalTaxasBoletosMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?) AND MONTH(data_pgto)=? AND YEAR(data_pgto)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisBoletosMes = $dados['totaltaxas'];
    return $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
  }

  /*Total de taxas das mensalidades pagas por mês e ano*/
  public function totalTaxasMensalidadesMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_mensalidades WHERE clube=? AND pagamento=? AND MONTH(data_pagamento)=? AND YEAR(data_pagamento)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisMensalidadesMes = $dados['totaltaxas'];
    return $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
  }

  /*Total de inadimplências por mês e ano*/
  public function totalInadimplenciasMes($clube, $mes, $ano)
  {
    $hoje = new DateTime('NOW');
    $d = $hoje->format('Y-m-d');
    $sql = "SELECT SUM(rfa_mensalidades.valor_mensalidade) as valor FROM rfa_mensalidades INNER JOIN rfs_socios ON rfa_mensalidades.id_socio=rfs_socios.id_socio WHERE rfa_mensalidades.clube=? AND MONTH(rfa_mensalidades.data_mensalidade) = ? AND YEAR(rfa_mensalidades.data_mensalidade) = ? AND rfa_mensalidades.data_mensalidade < ? AND rfa_mensalidades.pagamento=?  AND rfs_socios.status_socio=? AND rfs_socios.status_cob=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano, $d, 0, 1, 1]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->inadimplenciaTotalMes = $dados['valor'];
    return $dados['valor'] == 0 ? 0.00 : $dados['valor'];
  }

  public function totalSaidasMes()
  {
    //Saídas
    $despesasMes = $this->despesasTotaisMes;
    $fundosMes = $this->fundosTotaisMes;
    $retiradasMes = $this->retiradasTotaisMes;
    $taxasboletosMes = $this->taxasTotaisBoletosMes;
    $taxasmensalidadesMes = $this->taxasTotaisMensalidadesMes;

    $saidasMes = $despesasMes + $fundosMes + $retiradasMes + $taxasboletosMes + $taxasmensalidadesMes;

    return $saidasMes;
  }

  public function totalSaldoMes()
  {
    //Entradas
    $receitasMes = $this->receitasTotaisMes;
    $mensalidadesMes = $this->mensalidadesTotaisMes;
    $boletosMes = $this->boletosTotaisMes;

    //Saídas
    $despesasMes = $this->despesasTotaisMes;
    $fundosMes = $this->fundosTotaisMes;
    $retiradasMes = $this->retiradasTotaisMes;
    $taxasboletosMes = $this->taxasTotaisBoletosMes;
    $taxasmensalidadesMes = $this->taxasTotaisMensalidadesMes;

    //Somas
    $entradasMes = $receitasMes + $mensalidadesMes + $boletosMes;
    $saidasMes = $despesasMes + $fundosMes + $retiradasMes + $taxasboletosMes + $taxasmensalidadesMes;

    return $entradasMes - $saidasMes;
  }

  //////////////PREVISTOS/////////////////

  /*Total de despesas por mês e ano PREVISTAS*/
  public function totalDespesasMesPrevistas($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_pagar) as total FROM rfa_pagar WHERE clube=? AND MONTH(data_pagar)=? AND YEAR(data_pagar)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->despesasPrevistasMes = $dados['total'] == 0 ? 0.00 : $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de receitas por mês e ano PREVISTAS*/
  public function totalReceitasMesPrevistas($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_receita) as total FROM rfa_receitas WHERE clube=? AND status_receita=? AND MONTH(data_receita)=? AND YEAR(data_receita)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->receitasPrevistasMes = $dados['total'] == 0 ? 0.00 : $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de mensalidades previstas por mês e ano*/
  public function totalMensalidadesMesPrevistas($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_mensalidade) as totalmensalidade FROM rfa_mensalidades WHERE clube=? AND MONTH(data_mensalidade)=? AND YEAR(data_mensalidade)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->mensalidadesPrevistasMes = $dados['totalmensalidade'] == 0 ? 0.00 : $dados['totalmensalidade'];
    return $dados['totalmensalidade'] == 0 ? 0.00 : $dados['totalmensalidade'];
  }

  /*Boletos avulsos pagos por mês e ano*/
  public function totalBoletosAvulsosPrevistosMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor) as totalboletos FROM rfa_boletos WHERE clube=? AND MONTH(date_create)=? AND YEAR(date_create)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->boletosTotaisPrevistosMes = $dados['totalboletos'];
    return $dados['totalboletos'] == 0 ? 0.00 : $dados['totalboletos'];
  }

  /*Total de fundos pagos por mês e ano*/
  public function totalFundosPrevistosMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_fundo) as totalfundo FROM rfa_fundos WHERE clube=? AND MONTH(data_fundo)=? AND YEAR(data_fundo)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->fundosTotaisPrevistosMes = $dados['totalfundo'];
    return $dados['totalfundo'] == 0 ? 0.00 : $dados['totalfundo'];
  }

  /*Total de retiradas de fundos saindo das contas bancárias cadastradas por mês e ano*/
  public function totalRetiradasPrevistasMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_retirada) as totalretirada FROM rfa_retirada WHERE clube=? AND MONTH(data_retirada)=? AND YEAR(data_retirada)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->retiradasTotaisPrevistasMes = $dados['totalretirada'];
    return $dados['totalretirada'] == 0 ? 0.00 : $dados['totalretirada'];
  }

  /*Total de taxas dos boletos avulsos pagos por mês e ano*/
  public function totalTaxasBoletosPrevistasMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_boletos WHERE clube=? AND MONTH(date_create)=? AND YEAR(date_create)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisBoletosPrevistasMes = $dados['totaltaxas'];
    return $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
  }

  /*Total de taxas das mensalidades pagas por mês e ano*/
  public function totalTaxasMensalidadesPrevistasMes($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_mensalidades WHERE clube=? AND MONTH(data_mensalidade)=? AND YEAR(data_mensalidade)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisMensalidadesPrevistasMes = $dados['totaltaxas'];
    return $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
  }

  //Soma de receitas avulsas + mensalidades previstas do mês
  public function totalReceitaMensalidadePrevistaMes()
  {
    //Entradas
    $receitasMes = $this->receitasPrevistasMes;
    $mensalidadesMes = $this->mensalidadesPrevistasMes;
    $boletosMes = $this->boletosTotaisPrevistosMes;

    //Somas
    $total = $receitasMes + $mensalidadesMes + $boletosMes;

    return $total;
  }

  //Soma geral de despesas previstas do mês
  public function totalGeralDespesasPrevistasMes()
  {
    //Saídas
    $despesasMes = $this->despesasPrevistasMes;
    $fundosMes = $this->fundosTotaisPrevistosMes;
    $retiradasMes = $this->retiradasTotaisPrevistasMes;
    $taxasboletosMes = $this->taxasTotaisBoletosPrevistasMes;
    $taxasmensalidadesMes = $this->taxasTotaisMensalidadesPrevistasMes;

    $saidasMes = $despesasMes + $fundosMes + $retiradasMes + $taxasboletosMes + $taxasmensalidadesMes;

    $total = $saidasMes;

    return $total;
  }

  //////////CÁLCULOS TOTAIS POR BANCO//////////////
  /*Total de despesas pagas por banco*/
  public function totalDespesasPorBanco($clube, $banco)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor_pagar) as total FROM rfa_pagar WHERE clube=? AND status_pagar=? AND data_pagar<=? AND origem_pagar=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $today, $banco]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->despesasTotaisPorBanco = $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }
  
  /*Total de receitas pagas por banco*/
  public function totalReceitasPorBanco($clube, $banco)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor_receita) as total FROM rfa_receitas WHERE clube=? AND status_receita=? AND data_receita<=? AND destino_receita=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $today, $banco]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->receitasTotaisPorBanco = $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }
  

  /*Total de mensalidades pagas subtraindo taxas por banco*/
  public function totalMensalidadesPorBanco($clube, $ativomensalidade)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');

    $sql = "SELECT SUM(valor_mensalidade) as totalmensalidade FROM rfa_mensalidades WHERE clube=? AND pagamento=? AND data_pagamento<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->mensalidadesTotaisPorBanco = $ativomensalidade == 0 || $dados['totalmensalidade'] == 0 ? 0.00 : $dados['totalmensalidade'];
    return $ativomensalidade == 0 || $dados['totalmensalidade'] == 0 ? 0.00 : $dados['totalmensalidade'];
  }
  

  /*Total de fundos pagos por banco*/
  public function totalFundosPorBanco($clube, $banco)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor_fundo) as totalfundo FROM rfa_fundos WHERE clube=? AND status_fundo=? AND data_fundo<=? AND origem_fundo=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $today, $banco]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->fundosTotaisPorBanco = $dados['totalfundo'];
    return $dados['totalfundo'] == 0 ? 0.00 : $dados['totalfundo'];
  }
  

  /*Total de fundos pagos por banco*/
  public function totalSaldosBancosPorBanco($clube, $banco)
  {
    $sql = "SELECT SUM(saldo) as totalsaldo FROM rfa_bancos WHERE clube=? AND cod_banco=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $banco]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->bancosTotaisPorBanco = $dados['totalsaldo'];
    return $dados['totalsaldo'] == 0 ? 0.00 : $dados['totalsaldo'];
  }
  

  /*Boletos avulsos pagos por banco*/
  public function totalBoletosAvulsosPorBanco($clube, $ativomensalidade)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor) as totalboletos FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?) AND data_pgto<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->boletosTotaisPorBanco = $ativomensalidade == 0 || $dados['totalboletos'] == 0 ? 0.00 : $dados['totalboletos'];
    return $ativomensalidade == 0 || $dados['totalboletos'] == 0 ? 0.00 : $dados['totalboletos'];
  }
  

  /*Total de retiradas de fundos saindo das contas bancárias cadastradas por banco*/
  public function totalRetiradasPorBanco($clube, $banco)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(valor_retirada) as totalretirada FROM rfa_retirada WHERE clube=? AND data_retirada<=? AND origem_retirada=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $today, $banco]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->retiradasTotaisPorBanco = $dados['totalretirada'];
    return $dados['totalretirada'] == 0 ? 0.00 : $dados['totalretirada'];
  }
  

  /*Total de taxas dos boletos avulsos pagos por banco*/
  public function totalTaxasBoletosPorBanco($clube, $ativomensalidade)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?) AND data_pgto<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisBoletosPorBanco = $ativomensalidade == 0 || $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
    return $ativomensalidade == 0 || $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
  }
  

  /*Total de taxas das mensalidades pagas por banco*/
  public function totalTaxasMensalidadesPorBanco($clube, $ativomensalidade)
  {
    $date = new DateTime('NOW');
    $today = $date->format('Y-m-t');
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_mensalidades WHERE clube=? AND pagamento=? AND data_pagamento<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisMensalidadesPorBanco = $ativomensalidade == 0 || $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
    return $ativomensalidade == 0 || $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
  }
  

  //Saldo Geral 
  public function totalSaldoPorBanco()
  {

    //Entradas
    $receitas = $this->receitasTotaisPorBanco;
    $mensalidades = $this->mensalidadesTotaisPorBanco;
    $bancos = $this->bancosTotaisPorBanco;
    $boletos = $this->boletosTotaisPorBanco;

    //Saídas
    $despesas = $this->despesasTotaisPorBanco;
    $fundos = $this->fundosTotaisPorBanco;
    $retiradas = $this->retiradasTotaisPorBanco;
    $taxasboletos = $this->taxasTotaisBoletosPorBanco;
    $taxasmensalidades = $this->taxasTotaisMensalidadesPorBanco;

    //Somas
    $entradas = $receitas + $mensalidades + $bancos + $boletos;
    $saidas = $despesas + $fundos + $retiradas + $taxasboletos + $taxasmensalidades;

    return $entradas - $saidas;
  }


  //////////Cálculos totais para saldo geral do mês passado//////////////
  /*Total de despesas pagas*/
  public function setTotalSaldoMesPassado($clube, $mes, $ano)
  {

    $ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano));
    $data = $ano."-".$mes."-".$ultimo_dia;
    $dataatual = date('Y-m-d',strtotime($data));

    $date = new DateTime($dataatual);
    $interval = new DateInterval('P1M');
    $date->sub($interval);
    $today = $date->format('Y-m-t');

    $sql = "SELECT SUM(valor_pagar) as total FROM rfa_pagar WHERE clube=? AND status_pagar=? AND data_pagar<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->despesasTotaisPassado = $dados['total'] == 0 ? 0.00 : $dados['total'];
    
    $sql = "SELECT SUM(valor_receita) as total FROM rfa_receitas WHERE clube=? AND status_receita=? AND data_receita<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->receitasTotaisPassado = $dados['total'] == 0 ? 0.00 : $dados['total'];
    
    $sql = "SELECT SUM(valor_mensalidade) as totalmensalidade FROM rfa_mensalidades WHERE clube=? AND pagamento=? AND data_pagamento<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->mensalidadesTotaisPassado = $dados['totalmensalidade'] == 0 ? 0.00 : $dados['totalmensalidade'];
    
    $sql = "SELECT SUM(valor_fundo) as totalfundo FROM rfa_fundos WHERE clube=? AND status_fundo=? AND data_fundo<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->fundosTotaisPassado = $dados['totalfundo'] == 0 ? 0.00 : $dados['totalfundo'];
    
    $sql = "SELECT SUM(valor) as totalboletos FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?) AND data_pgto<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->boletosTotaisPassado = $dados['totalboletos'] == 0 ? 0.00 : $dados['totalboletos'];
    
    $sql = "SELECT SUM(valor_retirada) as totalretirada FROM rfa_retirada WHERE clube=? AND data_retirada<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->retiradasTotaisPassado = $dados['totalretirada'] == 0 ? 0.00 : $dados['totalretirada'];
    
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?) AND data_pgto<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisBoletosPassado = $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
    
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_mensalidades WHERE clube=? AND pagamento=? AND data_pagamento<=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $today]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisMensalidadesPassado = $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
    
  }

  //Saldo Geral do mês passado 
  public function totalSaldoMesPassado()
  {
    //Entradas
    $receitas = $this->receitasTotaisPassado;
    $mensalidades = $this->mensalidadesTotaisPassado;
    $bancos = $this->bancosTotais;
    $boletos = $this->boletosTotaisPassado;

    //Saídas
    $despesas = $this->despesasTotaisPassado;
    $fundos = $this->fundosTotaisPassado;
    $retiradas = $this->retiradasTotaisPassado;
    $taxasboletos = $this->taxasTotaisBoletosPassado;
    $taxasmensalidades = $this->taxasTotaisMensalidadesPassado;

    //Somas
    $entradas = $receitas + $mensalidades + $bancos + $boletos;
    $saidas = $despesas + $fundos + $retiradas + $taxasboletos + $taxasmensalidades;

    return $entradas - $saidas;
  }

}
