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
  public $boletosTotaisMes;
  public $retiradasTotais;
  public $retiradasMes;
  public $taxasTotaisBoletos;
  public $taxasTotaisBoletosMes;
  public $taxasTotaisMensalidades;
  public $taxasTotaisMensalidadesMes;

  //////////Cálculos totais//////////////
  /*Total de despesas pagas*/
  public function totalDespesas($clube)
  {
    $sql = "SELECT SUM(valor_pagar) as total FROM rfa_pagar WHERE clube=? AND status_pagar=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->despesasTotais = $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de receitas pagas*/
  public function totalReceitas($clube)
  {
    $sql = "SELECT SUM(valor_receita) as total FROM rfa_receitas WHERE clube=? AND status_receita=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->receitasTotais = $dados['total'];
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de mensalidades pagas subtraindo taxas*/
  public function totalMensalidades($clube)
  {
    $sql = "SELECT SUM(valor_mensalidade) as totalmensalidade FROM rfa_mensalidades WHERE clube=? AND pagamento=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->mensalidadesTotais = $dados['totalmensalidade'];
    return $dados['totalmensalidade'] == 0 ? 0.00 : $dados['totalmensalidade'];
  }

  /*Total de fundos pagos*/
  public function totalFundos($clube)
  {
    $sql = "SELECT SUM(valor_fundo) as totalfundo FROM rfa_fundos WHERE clube=? AND status_fundo=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2]);
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
    $sql = "SELECT SUM(valor) as totalboletos FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->boletosTotais = $dados['totalboletos'];
    return $dados['totalboletos'] == 0 ? 0.00 : $dados['totalboletos'];
  }

  /*Total de retiradas de fundos saindo das contas bancárias cadastradas*/
  public function totalRetiradas($clube)
  {
    $sql = "SELECT SUM(valor_retirada) as totalretirada FROM rfa_retirada WHERE clube=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->retiradasTotais = $dados['totalretirada'];
    return $dados['totalretirada'] == 0 ? 0.00 : $dados['totalretirada'];
  }

  /*Total de taxas dos boletos avulsos pagos*/
  public function totalTaxasBoletos($clube)
  {
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_boletos WHERE clube=? AND (status_pgto=? OR status_pgto=?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, 2]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->taxasTotaisBoletos = $dados['totaltaxas'];
    return $dados['totaltaxas'] == 0 ? 0.00 : $dados['totaltaxas'];
  }

  /*Total de taxas das mensalidades pagas*/
  public function totalTaxasMensalidades($clube)
  {
    $sql = "SELECT SUM(taxa) as totaltaxas FROM rfa_mensalidades WHERE clube=? AND pagamento=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1]);
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
    $datahoje = date('Y-m-d');
    $sql = "SELECT SUM(rfa_mensalidades.valor_mensalidade) as valor FROM rfa_mensalidades INNER JOIN rfs_socios ON rfa_mensalidades.id_socio=rfs_socios.id_socio WHERE rfa_mensalidades.clube=? AND MONTH(rfa_mensalidades.data_mensalidade) = ? AND YEAR(rfa_mensalidades.data_mensalidade) = ? AND rfa_mensalidades.data_mensalidade < ? AND rfa_mensalidades.pagamento=?  AND rfs_socios.status_socio=? AND rfs_socios.status_cob=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano, $datahoje, 0, 1, 1]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    $this->inadimplenciaTotalMes = $dados['valor'];
    return $dados['valor'] == 0 ? 0.00 : $dados['valor'];
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
    $sql = "SELECT SUM(valor_pagar) as total FROM rfa_pagar WHERE clube=? AND status_pagar=? AND MONTH(data_pagar)=? AND YEAR(data_pagar)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de receitas por mês e ano PREVISTAS*/
  public function totalReceitasMesPrevistas($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_receita) as total FROM rfa_receitas WHERE clube=? AND status_receita=? AND MONTH(data_receita)=? AND YEAR(data_receita)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    return $dados['total'] == 0 ? 0.00 : $dados['total'];
  }

  /*Total de mensalidades previstas por mês e ano*/
  public function totalMensalidadesMesPrevistas($clube, $mes, $ano)
  {
    $sql = "SELECT SUM(valor_mensalidade) as totalmensalidade FROM rfa_mensalidades WHERE clube=? AND MONTH(data_mensalidade)=? AND YEAR(data_mensalidade)=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, $mes, $ano]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    return $dados['totalmensalidade'] == 0 ? 0.00 : $dados['totalmensalidade'];
  }
}
