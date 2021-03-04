<?php
//Conexão com banco de dados
include_once("config.php");

$codquestion = date("YmdHis") . rand(10, 99);
$clube = mysqli_real_escape_string($link, $_POST['clube']);
$question = mysqli_real_escape_string($link, $_POST['question']);
$type = mysqli_real_escape_string($link, $_POST['type']);
$category = mysqli_real_escape_string($link, $_POST['category']);

$sql = "INSERT INTO rfa_questions (cod_question, question, type, category, clube) VALUES ('$codquestion','$question', '$type', '$category', '$clube');";

if ($link->multi_query($sql) === TRUE) {
  echo "<script>javascript:alert('Cadastro de pergunta realizado com sucesso!');javascript:window.location='questionarios'</script>";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();
