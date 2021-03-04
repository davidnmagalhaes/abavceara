<?php
spl_autoload_register(function ($class) {
  require_once('class' . DIRECTORY_SEPARATOR . $class . '.php');
});

$transacoes = new Transactions;

echo $transacoes->totalDespesas(35);
echo "<br>";
echo $transacoes->totalReceitas(35);
echo "<br>";
echo $transacoes->totalMensalidades(35);
