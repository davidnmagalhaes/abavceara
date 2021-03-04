<?php
class Transactions extends Sql
{
  /*Total de despesas pagas*/
  public function totalDespesas($clube)
  {
    $sql = "SELECT SUM(valor_pagar) as total FROM rfa_pagar WHERE clube=? AND status_pagar=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    return number_format($dados['total'], 2, ',', '.');
  }

  /*Total de receitas pagas*/
  public function totalReceitas($clube)
  {
    $sql = "SELECT SUM(valor_receita) as total FROM rfa_receitas WHERE clube=? AND status_receita=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 2]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    return number_format($dados['total'], 2, ',', '.');
  }

  /*Total de mensalidades pagas*/
  public function totalMensalidades($clube)
  {
    $sql = "SELECT (SUM(valor_mensalidade) - SUM(taxa)) as totalmensalidade FROM rfa_mensalidades WHERE clube=? AND tipo_pagamento=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$clube, 1]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    return number_format($dados['totalmensalidade'], 2, ',', '.');
  }
}
