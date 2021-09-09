<?php
//Conexão com banco de dados
include_once("../config.php");

$codidentification = date("YmdHis") . rand(10, 99);

$nome = mysqli_real_escape_string($link, $_POST['nome']);
$categoria = mysqli_real_escape_string($link, $_POST['categoria']);
$idade = mysqli_real_escape_string($link, $_POST['idade']);
$profissao = mysqli_real_escape_string($link, $_POST['profissao']);
$sexo = mysqli_real_escape_string($link, $_POST['sexo']);
$escolaridade = mysqli_real_escape_string($link, $_POST['escolaridade']);
$avaliacao = $_POST['avaliacao'];

$clube = mysqli_real_escape_string($link, $_POST['clube']);

$sql = "INSERT INTO rfa_answer_identification (cod_identification, name, age, profission, gender, school, clube) VALUES ('$codidentification', '$name', '$idade', '$profissao', '$sexo', '$escolaridade', '$clube');";

$count = 1;
foreach ($avaliacao as $key => $avaliar) {
  $count++;
  $codanswer = date("YmdHis") . $count;
  switch ($avaliar) {
    case "nt":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, nt_important,cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_0":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_0, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_10":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_10, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_20":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_20, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_30":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_30, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_40":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q40, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_50":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_50, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_60":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_60, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_70":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_70, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_80":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_80, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_90":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_90, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "q_100":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, q_100, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;

    case "mn":
      $sql .= "INSERT INTO rfa_answer_question (cod_answer, cod_question, mn_important, cod_identification, clube) VALUES ('$codanswer','$key',1,'$codidentification','$clube');";
      break;
  }
}

if ($link->multi_query($sql) === TRUE) {
  echo "<script>javascript:alert('Obrigado por sua avaliação!');javascript:window.location='avalieagencia" . $clube . "'</script>";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}
$link->close();
