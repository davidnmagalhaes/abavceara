<?php
//Conexão com banco de dados
include_once("config.php");

/*Recebe as variáveis de cd_banco.php*/
$cod_question = $_GET['cod_question'];

$sql = "DELETE FROM rfa_questions WHERE cod_question='$cod_question';";

if ($link->multi_query($sql) === TRUE) {
  echo "<script>javascript:alert('Pergunta removida com sucesso!');javascript:window.location='questionarios'</script>";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();
