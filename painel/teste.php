<?php
$npedido = "1-11-2019-8";
$pd = explode('-',$npedido);

$soc =  $pd[0]; //Sócio
$month = $pd[1]; //Mês
$year = $pd[2]; //Ano
$us = $pd[3]; //Usuário

echo $soc;
echo "<br>";
echo $month;
echo "<br>";
echo $year;
echo "<br>";
echo $us;
?>