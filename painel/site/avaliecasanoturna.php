<?php
//Conexão com banco de dados
include_once("../config.php");

$clube = $_GET['clube'];

$sql = "SELECT * FROM rfa_site_topo WHERE clube='$clube'";
$topo = mysqli_query($link, $sql) or die(mysqli_error($link));
$row_topo = mysqli_fetch_assoc($topo);
$totalRows_top = mysqli_num_rows($topo);

$sqlqt = "SELECT * FROM rfa_questions WHERE clube='$clube' AND type='1' AND category='casa_noturna'";
$questions = mysqli_query($link, $sqlqt) or die(mysqli_error($link));
$totalavaliacao = mysqli_num_rows($questions);

$sqlqt2 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND type='2' AND category='casa_noturna'";
$questions2 = mysqli_query($link, $sqlqt2) or die(mysqli_error($link));
$totalsatisfacao = mysqli_num_rows($questions2);

$sqlmemb = "SELECT * FROM rfs_socios WHERE clube='$clube' AND classif_socio='casa_noturna' ORDER BY nome_socio ASC";
$membros = mysqli_query($link, $sqlmemb) or die(mysqli_error($link));

$sblog = "SELECT * FROM rfa_site_blog WHERE clube='$clube' ORDER BY data_blog, hora_blog DESC LIMIT 2";
$blog = mysqli_query($link, $sblog) or die(mysqli_error($link));
$totalRows_blog = mysqli_num_rows($blog);

$sconteudo = "SELECT * FROM rfa_site_conteudo WHERE clube='$clube'";
$conteudo = mysqli_query($link, $sconteudo) or die(mysqli_error($link));
$row_conteudo = mysqli_fetch_assoc($conteudo);
$totalRows_conteudo = mysqli_num_rows($conteudo);

$sblog2 = "SELECT * FROM rfa_site_blog WHERE clube='$clube' ORDER BY data_blog, hora_blog DESC LIMIT 4";
$blog2 = mysqli_query($link, $sblog2) or die(mysqli_error($link));
$totalRows_blog2 = mysqli_num_rows($blog2);

?>

<!DOCTYPE html>
<html lang="pt-br">
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Site Metas -->
<title><?php echo $row_topo['title_seo']; ?></title>
<meta name="keywords" content="<?php echo $row_topo['keyword_seo']; ?>">
<meta name="description" content="<?php echo $row_topo['description_seo']; ?>">
<meta name="author" content="David Magalhães">

<?php include('head.php'); ?>

<script type="text/javascript">
  function fMasc(objeto, mascara) {
    obj = objeto
    masc = mascara
    setTimeout("fMascEx()", 1)
  }

  function fMascEx() {
    obj.value = masc(obj.value)
  }

  function mTel(tel) {
    tel = tel.replace(/\D/g, "")
    tel = tel.replace(/^(\d)/, "($1")
    tel = tel.replace(/(.{3})(\d)/, "$1)$2")
    if (tel.length == 9) {
      tel = tel.replace(/(.{1})$/, "-$1")
    } else if (tel.length == 10) {
      tel = tel.replace(/(.{2})$/, "-$1")
    } else if (tel.length == 11) {
      tel = tel.replace(/(.{3})$/, "-$1")
    } else if (tel.length == 12) {
      tel = tel.replace(/(.{4})$/, "-$1")
    } else if (tel.length > 12) {
      tel = tel.replace(/(.{4})$/, "-$1")
    }
    return tel;
  }

  function mCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, "")
    cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2")
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2")
    cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2")
    return cnpj
  }

  function mCPF(cpf) {
    cpf = cpf.replace(/\D/g, "")
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
    return cpf
  }

  function mCEP(cep) {
    cep = cep.replace(/\D/g, "")
    cep = cep.replace(/^(\d{2})(\d)/, "$1.$2")
    cep = cep.replace(/\.(\d{3})(\d)/, ".$1-$2")
    return cep
  }

  function mNum(num) {
    num = num.replace(/\D/g, "")
    return num
  }
</script>
<script>
  function somenteNumeros(e) {
    var charCode = e.charCode ? e.charCode : e.keyCode;
    // charCode 8 = backspace   
    // charCode 9 = tab
    if (charCode != 8 && charCode != 9) {
      // charCode 48 equivale a 0   
      // charCode 57 equivale a 9
      if (charCode < 48 || charCode > 57) {
        return false;
      }
    }
  }
</script>
</head>

<body class="game_info" data-spy="scroll" data-target=".header">

  <section id="top">
    <?php include('header.php'); ?>

    <div class="inner-page-banner">
      <div class="container">
        <h1 class="titulo-topo">Avalie uma casa noturna</h1>
      </div>
    </div>
  </section>

  <section id="contant" class="contant main-heading team">
    <div class="row">
      <div class="container">
        <div class="contact">

          <div class="col-md-12">
            <div class="contact-us">
              <form method="post" class="comments-form" action="proc_avaliacao.php" enctype="multipart/form-data">
                <h1>Preencha os dados abaixo:</h1>
                <input type="hidden" name="clube" value="<?php echo $clube; ?>">
                <div class="row" style="margin-bottom: 25px">
                  <div class="col-1">
                    <select name="categoria" style="width: 100%; padding: 10px 15px; border: solid #ccc 1px;">
                      <option selected disabled>Escolha uma casa noturna...</option>
                      <?php while ($row_membros = mysqli_fetch_array($membros)) { ?>
                        <option value="<?php echo $row_membros['id_socio']; ?>"><?php echo $row_membros['nome_socio']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                </div>
                <div class="row">
                  <div class="col">
                    <input type="text" id="nome" name="nome" placeholder="Nome completo..." required>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <input type="text" id="idade" name="idade" placeholder="Idade..." required>
                  </div>
                  <div class="col">
                    <input type="text" id="profissao" name="profissao" placeholder="Profissão..." required>
                  </div>
                </div>



                <div class="row">
                  <div class="col-12 col-md-6">
                    <select name="sexo" style="width: 100%; padding: 10px 15px; border: solid #ccc 1px;">
                      <option selected disabled>Sexo...</option>
                      <option value="m">Masculino</option>
                      <option value="f">Feminino</option>
                      <option value="n">Prefiro não dizer</option>
                    </select>
                  </div>
                  <div class="col-12 col-md-6">
                    <select name="escolaridade" style="width: 100%; padding: 10px 15px; border: solid #ccc 1px;" required>
                      <option selected disabled>Escolaridade...</option>
                      <option value="ensino-medio">Ensino fundamental</option>
                      <option value="ensino-medio">Ensino médio</option>
                      <option value="ensino-superior">Ensino superior</option>
                      <option value="pos-graduacao">Pós-gradução</option>
                    </select>
                  </div>
                </div>

                <?php if ($totalavaliacao > 0) : ?>
                  <h1 style="margin-top: 35px">Avaliação</h1>
                  <h3>Avalie a IMPORTÂNCIA de cada item para a qualidade deste estabelecimento. Itens mais importantes recebem mais pontos.</h3>

                  <div class="table-responsive">
                    <?php while ($row_questions = mysqli_fetch_array($questions)) { ?>
                      <table style="width: 100%; border: solid 1px #c5c5c5; margin-bottom: 35px">
                        <tr>
                          <th style="width: 20%; padding: 5px"><?php echo $row_questions['question']; ?></th>
                          <td style="width: 10%;">Nada Importante </td>
                          <td style="width: 5%;">0</td>
                          <td style="width: 5%;">10</td>
                          <td style="width: 5%;">20</td>
                          <td style="width: 5%;">30</td>
                          <td style="width: 5%;">40</td>
                          <td style="width: 5%;">50</td>
                          <td style="width: 5%;">60</td>
                          <td style="width: 5%;">70</td>
                          <td style="width: 5%;">80</td>
                          <td style="width: 5%;">90</td>
                          <td style="width: 5%;">100</td>
                          <td style="width: 15%;">Muito importante</td>
                        </tr>
                        <tr>
                          <th style="width: 20%; padding: 5px"></th>
                          <td style="width: 10%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="nt" value="nt" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_0" value="q_0" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_10" value="q_10" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_20" value="q_20" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_30" value="q_30" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_40" value="q_40" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_50" value="q_50" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_60" value="q_60" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_70" value="q_70" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_80" value="q_80" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_90" value="q_90" /></td>
                          <td style="width: 5%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="q_100" value="q_100" /></td>
                          <td style="width: 15%;"><input type="radio" name="avaliacao[<?php echo $row_questions['cod_question']; ?>]" id="mn" value="mn" /></td>
                        </tr>
                      </table>
                    <?php } ?>
                  </div>
                <?php endif; ?>

                <?php if ($totalsatisfacao > 0) : ?>
                  <h1 style="margin-top: 35px">Grau de Satisfação</h1>
                  <h3>Indique o seu GRAU DE SATISFAÇÃO com o serviço prestado por um estabelecimento de hospedagem em relação a cada item.</h3>

                  <div class="table-responsive">
                    <?php while ($row_questions2 = mysqli_fetch_array($questions2)) { ?>
                      <table style="width: 100%; border: solid 1px #c5c5c5; margin-bottom: 35px">
                        <tr>
                          <th style="width: 20%; padding: 5px"><?php echo $row_questions2['question']; ?></th>
                          <td style="width: 10%;">Muito insatisfeito </td>
                          <td style="width: 5%;">0</td>
                          <td style="width: 5%;">10</td>
                          <td style="width: 5%;">20</td>
                          <td style="width: 5%;">30</td>
                          <td style="width: 5%;">40</td>
                          <td style="width: 5%;">50</td>
                          <td style="width: 5%;">60</td>
                          <td style="width: 5%;">70</td>
                          <td style="width: 5%;">80</td>
                          <td style="width: 5%;">90</td>
                          <td style="width: 5%;">100</td>
                          <td style="width: 15%;">Muito satisfeito</td>
                        </tr>
                        <tr>
                          <th style="width: 20%; padding: 5px"></th>
                          <td style="width: 10%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 5%;"><input type="radio" /></td>
                          <td style="width: 15%;"><input type="radio" /></td>
                        </tr>
                      </table>
                    <?php } ?>
                  </div>
                <?php endif; ?>

                <input class="thbg-color" type="submit" value="Solicitar" style="background: #40a02e; color: #fff">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include('footer.php'); ?>

  <!-- ALL JS FILES -->
  <script src="js/all.js"></script>
  <!-- ALL PLUGINS -->
  <script src="js/custom.js"></script>
</body>

</html>