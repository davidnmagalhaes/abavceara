<?php
$page = 5;

include('config-header.php');

//Avaliação Agência
$sqlag1 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='agencia' AND type='1'";
$agencia1 = mysqli_query($link, $sqlag1) or die(mysqli_error($link));

//Satisfação Agência
$sqlag2 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='agencia' AND type='2'";
$agencia2 = mysqli_query($link, $sqlag2) or die(mysqli_error($link));

//Avaliação Hotel
$sqlht1 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='hotel' AND type='1'";
$hotel1 = mysqli_query($link, $sqlht1) or die(mysqli_error($link));

//Satisfação Hotel
$sqlht2 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='hotel' AND type='2'";
$hotel2 = mysqli_query($link, $sqlht2) or die(mysqli_error($link));

//Avaliação Parque Temático
$sqlpq1 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='parque' AND type='1'";
$parque1 = mysqli_query($link, $sqlpq1) or die(mysqli_error($link));

//Satisfação Parque Temático
$sqlpq2 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='parque' AND type='2'";
$parque2 = mysqli_query($link, $sqlpq2) or die(mysqli_error($link));

//Avaliação Restaurante
$sqlrt1 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='restaurante' AND type='1'";
$restaurante1 = mysqli_query($link, $sqlrt1) or die(mysqli_error($link));

//Satisfação Restaurante
$sqlrt2 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='restaurante' AND type='2'";
$restaurante2 = mysqli_query($link, $sqlrt2) or die(mysqli_error($link));

//Avaliação Casa Noturna
$sqlcn1 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='casa_noturna' AND type='1'";
$casanoturna1 = mysqli_query($link, $sqlcn1) or die(mysqli_error($link));

//Satisfação Casa Noturna
$sqlcn2 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='casa_noturna' AND type='2'";
$casanoturna2 = mysqli_query($link, $sqlcn2) or die(mysqli_error($link));

//Avaliação Barraca de Praia
$sqlbp1 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='barraca' AND type='1'";
$barraca1 = mysqli_query($link, $sqlbp1) or die(mysqli_error($link));

//Satisfação Barraca de Praia
$sqlbp2 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='barraca' AND type='2'";
$barraca2 = mysqli_query($link, $sqlbp2) or die(mysqli_error($link));

//Avaliação Operadora
$sqlop1 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='operadora' AND type='1'";
$operadora1 = mysqli_query($link, $sqlop1) or die(mysqli_error($link));

//Satisfação Operadora
$sqlop2 = "SELECT * FROM rfa_questions WHERE clube='$clube' AND category='operadora' AND type='2'";
$operadora2 = mysqli_query($link, $sqlop2) or die(mysqli_error($link));

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistema de Gestão do Rotary Fortaleza Alagadiço">
  <meta name="author" content="David Magalhães">
  <meta name="keywords" content="rotary alagadiço, rotary fortaleza alagadiço, fortaleza alagadiço">

  <!-- Title Page-->
  <title><?php echo $nomeclube; ?></title>

  <?php include("head.php"); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!--Mask Money-->
  <script language="javascript">
    function moeda(a, e, r, t) {
      let n = "",
        h = j = 0,
        u = tamanho2 = 0,
        l = ajd2 = "",
        o = window.Event ? t.which : t.keyCode;
      if (13 == o || 8 == o)
        return !0;
      if (n = String.fromCharCode(o),
        -1 == "0123456789".indexOf(n))
        return !1;
      for (u = a.value.length,
        h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
      ;
      for (l = ""; h < u; h++)
        -
        1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
      if (l += n,
        0 == (u = l.length) && (a.value = ""),
        1 == u && (a.value = "0" + r + "0" + l),
        2 == u && (a.value = "0" + r + l),
        u > 2) {
        for (ajd2 = "",
          j = 0,
          h = u - 3; h >= 0; h--)
          3 == j && (ajd2 += e,
            j = 0),
          ajd2 += l.charAt(h),
          j++;
        for (a.value = "",
          tamanho2 = ajd2.length,
          h = tamanho2 - 1; h >= 0; h--)
          a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
      }
      return !1
    }
  </script>

</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <div class="page-wrapper">

    <?php include("menu-desktop.php"); ?>

    <!-- PAGE CONTAINER-->
    <div class="page-container2">
      <!-- HEADER DESKTOP-->
      <?php include("topo.php"); ?>

      <?php include("menu-mobile.php"); ?>

      <!-- END HEADER DESKTOP-->

      <div class="main-content">
        <div class="col-lg-12">
          <!-- USER DATA-->
          <div class="user-data m-b-30">

            <h3 class="title-3 m-b-30">
              <i class="far fa-life-ring"></i>Questionários
            </h3>

            <br>

            <input type="hidden" name="user" value="<?php echo $_SESSION['id_usuario']; ?>">
            <input type="hidden" name="club" value="<?php if ($_GET['clube']) {
                                                      echo $clube;
                                                    } else {
                                                      echo $clube;
                                                    } ?>">


            <div class="table-responsive ">
              <table class="table">
                <thead>
                  <tr>
                    <td>Formulário</td>
                    <td style="text-align:center">Questões</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="table-data__info">
                        <h6>Formulário Avaliação de Agências</h6>
                      </div>
                    </td>
                    <td align="center">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#agencias">
                        <i class="fas fa-list-ul"></i>
                      </a>
                    </td>
                  </tr>

                  <div class="modal fade" id="agencias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Questões para agências</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">

                          <form method="post" action="proc-cd-question.php">
                            <input type="hidden" name="category" value="agencia" />
                            <input type="hidden" name="clube" value="<?php echo $clube; ?>" />
                            <div class="row">
                              <div class="col">
                                <label>Pergunta:</label>
                                <input type="text" class="form-control" name="question" required />
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <label>Tipo de pergunta:</label>
                                <select class="form-control" name="type" required>
                                  <option value="1">Avaliação</option>
                                  <option value="2">Satisfação</option>
                                </select>
                              </div>
                            </div>
                            <div class="row mt-4 mb-4">
                              <div class="col text-center">
                                <button class="btn btn-success">Cadastrar</button>
                              </div>
                            </div>
                          </form>

                          <h3 class="mb-3">Avaliação</h3>
                          <?php while ($row_agencia1 = mysqli_fetch_array($agencia1)) {
                          ?>
                            <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                              <div class="col-8" style="padding: 3px 10px 3px 10px">
                                <?php echo $row_agencia1['question']; ?>
                              </div>
                              <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                              <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_agencia1['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                            </div>
                          <?php
                          } ?>

                          <h3 class="mb-3 mt-3">Satisfação</h3>
                          <?php while ($row_agencia2 = mysqli_fetch_array($agencia2)) {
                          ?>
                            <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                              <div class="col-8" style="padding: 3px 10px 3px 10px">
                                <?php echo $row_agencia2['question']; ?>
                              </div>
                              <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                              <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_agencia2['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                            </div>
                          <?php
                          } ?>

                          <div>
                            <div class="modal-footer" style="border-top: 0">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <tr>
                        <td>
                          <div class="table-data__info">
                            <h6>Formulário Avaliação de Hotéis</h6>
                          </div>
                        </td>
                        <td align="center">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#hoteis">
                            <i class="fas fa-list-ul"></i>
                          </a>
                        </td>
                      </tr>

                      <div class="modal fade" id="hoteis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Questões para hotéis</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">

                              <form method="post" action="proc-cd-question.php">
                                <input type="hidden" name="category" value="hotel" />
                                <input type="hidden" name="clube" value="<?php echo $clube; ?>" />
                                <div class="row">
                                  <div class="col">
                                    <label>Pergunta:</label>
                                    <input type="text" class="form-control" name="question" required />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <label>Tipo de pergunta:</label>
                                    <select class="form-control" name="type" required>
                                      <option value="1">Avaliação</option>
                                      <option value="2">Satisfação</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row mt-4 mb-4">
                                  <div class="col text-center">
                                    <button class="btn btn-success">Cadastrar</button>
                                  </div>
                                </div>
                              </form>

                              <h3 class="mb-3">Avaliação</h3>
                              <?php while ($row_hotel1 = mysqli_fetch_array($hotel1)) {
                              ?>
                                <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                  <div class="col-8" style="padding: 3px 10px 3px 10px">
                                    <?php echo $row_hotel1['question']; ?>
                                  </div>
                                  <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                  <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_hotel1['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                </div>
                              <?php
                              } ?>

                              <h3 class="mb-3 mt-3">Satisfação</h3>
                              <?php while ($row_hotel2 = mysqli_fetch_array($hotel2)) {
                              ?>
                                <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                  <div class="col-8" style="padding: 3px 10px 3px 10px">
                                    <?php echo $row_hotel2['question']; ?>
                                  </div>
                                  <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                  <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_hotel2['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                </div>
                              <?php
                              } ?>

                              <div>
                                <div class="modal-footer" style="border-top: 0">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <tr>
                            <td>
                              <div class="table-data__info">
                                <h6>Formulário Avaliação de Operadoras</h6>
                              </div>
                            </td>
                            <td align="center">
                              <a href="#" data-bs-toggle="modal" data-bs-target="#operadoras">
                                <i class="fas fa-list-ul"></i>
                              </a>
                            </td>
                          </tr>

                          <div class="modal fade" id="operadoras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Questões para operadoras</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">

                                  <form method="post" action="proc-cd-question.php">
                                    <input type="hidden" name="category" value="operadora" />
                                    <input type="hidden" name="clube" value="<?php echo $clube; ?>" />
                                    <div class="row">
                                      <div class="col">
                                        <label>Pergunta:</label>
                                        <input type="text" class="form-control" name="question" required />
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                        <label>Tipo de pergunta:</label>
                                        <select class="form-control" name="type" required>
                                          <option value="1">Avaliação</option>
                                          <option value="2">Satisfação</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="row mt-4 mb-4">
                                      <div class="col text-center">
                                        <button class="btn btn-success">Cadastrar</button>
                                      </div>
                                    </div>
                                  </form>

                                  <h3 class="mb-3">Avaliação</h3>
                                  <?php while ($row_operadora1 = mysqli_fetch_array($operadora1)) {
                                  ?>
                                    <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                      <div class="col-8" style="padding: 3px 10px 3px 10px">
                                        <?php echo $row_operadora1['question']; ?>
                                      </div>
                                      <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                      <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_operadora1['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                    </div>
                                  <?php
                                  } ?>

                                  <h3 class="mb-3 mt-3">Satisfação</h3>
                                  <?php while ($row_operadora2 = mysqli_fetch_array($operadora2)) {
                                  ?>
                                    <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                      <div class="col-8" style="padding: 3px 10px 3px 10px">
                                        <?php echo $row_operadora2['question']; ?>
                                      </div>
                                      <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                      <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_operadora2['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                    </div>
                                  <?php
                                  } ?>

                                  <div>
                                    <div class="modal-footer" style="border-top: 0">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <tr>
                                <td>
                                  <div class="table-data__info">
                                    <h6>Formulário Avaliação de Barracas de Praia</h6>
                                  </div>
                                </td>
                                <td align="center">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#barracas">
                                    <i class="fas fa-list-ul"></i>
                                  </a>
                                </td>
                              </tr>

                              <div class="modal fade" id="barracas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Questões para barracas de praia</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                    </div>
                                    <div class="modal-body">

                                      <form method="post" action="proc-cd-question.php">
                                        <input type="hidden" name="category" value="barraca" />
                                        <input type="hidden" name="clube" value="<?php echo $clube; ?>" />
                                        <div class="row">
                                          <div class="col">
                                            <label>Pergunta:</label>
                                            <input type="text" class="form-control" name="question" required />
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <label>Tipo de pergunta:</label>
                                            <select class="form-control" name="type" required>
                                              <option value="1">Avaliação</option>
                                              <option value="2">Satisfação</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="row mt-4 mb-4">
                                          <div class="col text-center">
                                            <button class="btn btn-success">Cadastrar</button>
                                          </div>
                                        </div>
                                      </form>

                                      <h3 class="mb-3">Avaliação</h3>
                                      <?php while ($row_barraca1 = mysqli_fetch_array($barraca1)) {
                                      ?>
                                        <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                          <div class="col-8" style="padding: 3px 10px 3px 10px">
                                            <?php echo $row_barraca1['question']; ?>
                                          </div>
                                          <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                          <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_barraca1['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                        </div>
                                      <?php
                                      } ?>

                                      <h3 class="mb-3 mt-3">Satisfação</h3>
                                      <?php while ($row_barraca2 = mysqli_fetch_array($barraca2)) {
                                      ?>
                                        <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                          <div class="col-8" style="padding: 3px 10px 3px 10px">
                                            <?php echo $row_barraca2['question']; ?>
                                          </div>
                                          <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                          <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_barraca2['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                        </div>
                                      <?php
                                      } ?>

                                      <div>
                                        <div class="modal-footer" style="border-top: 0">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <tr>
                                    <td>
                                      <div class="table-data__info">
                                        <h6>Formulário Avaliação de Parques Temáticos</h6>
                                      </div>
                                    </td>
                                    <td align="center">
                                      <a href="#" data-bs-toggle="modal" data-bs-target="#parques">
                                        <i class="fas fa-list-ul"></i>
                                      </a>
                                    </td>
                                  </tr>

                                  <div class="modal fade" id="parques" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Questões para parques temáticos</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">

                                          <form method="post" action="proc-cd-question.php">
                                            <input type="hidden" name="category" value="parque" />
                                            <input type="hidden" name="clube" value="<?php echo $clube; ?>" />
                                            <div class="row">
                                              <div class="col">
                                                <label>Pergunta:</label>
                                                <input type="text" class="form-control" name="question" required />
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col">
                                                <label>Tipo de pergunta:</label>
                                                <select class="form-control" name="type" required>
                                                  <option value="1">Avaliação</option>
                                                  <option value="2">Satisfação</option>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="row mt-4 mb-4">
                                              <div class="col text-center">
                                                <button class="btn btn-success">Cadastrar</button>
                                              </div>
                                            </div>
                                          </form>

                                          <h3 class="mb-3">Avaliação</h3>
                                          <?php while ($row_parque1 = mysqli_fetch_array($parque1)) {
                                          ?>
                                            <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                              <div class="col-8" style="padding: 3px 10px 3px 10px">
                                                <?php echo $row_parque1['question']; ?>
                                              </div>
                                              <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                              <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_parque1['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                            </div>
                                          <?php
                                          } ?>

                                          <h3 class="mb-3 mt-3">Satisfação</h3>
                                          <?php while ($row_parque2 = mysqli_fetch_array($parque2)) {
                                          ?>
                                            <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                              <div class="col-8" style="padding: 3px 10px 3px 10px">
                                                <?php echo $row_parque2['question']; ?>
                                              </div>
                                              <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                              <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_parque2['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                            </div>
                                          <?php
                                          } ?>

                                          <div>
                                            <div class="modal-footer" style="border-top: 0">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <tr>
                                        <td>
                                          <div class="table-data__info">
                                            <h6>Formulário Avaliação de Casas Noturnas</h6>
                                          </div>
                                        </td>
                                        <td align="center">
                                          <a href="#" data-bs-toggle="modal" data-bs-target="#casasnoturnas">
                                            <i class="fas fa-list-ul"></i>
                                          </a>
                                        </td>
                                      </tr>

                                      <div class="modal fade" id="casasnoturnas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Questões para casas noturnas</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                            </div>
                                            <div class="modal-body">

                                              <form method="post" action="proc-cd-question.php">
                                                <input type="hidden" name="category" value="casa_noturna" />
                                                <input type="hidden" name="clube" value="<?php echo $clube; ?>" />
                                                <div class="row">
                                                  <div class="col">
                                                    <label>Pergunta:</label>
                                                    <input type="text" class="form-control" name="question" required />
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col">
                                                    <label>Tipo de pergunta:</label>
                                                    <select class="form-control" name="type" required>
                                                      <option value="1">Avaliação</option>
                                                      <option value="2">Satisfação</option>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="row mt-4 mb-4">
                                                  <div class="col text-center">
                                                    <button class="btn btn-success">Cadastrar</button>
                                                  </div>
                                                </div>
                                              </form>

                                              <h3 class="mb-3">Avaliação</h3>
                                              <?php while ($row_casanoturna1 = mysqli_fetch_array($casanoturna1)) {
                                              ?>
                                                <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                                  <div class="col-8" style="padding: 3px 10px 3px 10px">
                                                    <?php echo $row_casanoturna1['question']; ?>
                                                  </div>
                                                  <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                                  <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_casanoturna1['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                                </div>
                                              <?php
                                              } ?>

                                              <h3 class="mb-3 mt-3">Satisfação</h3>
                                              <?php while ($row_casanoturna2 = mysqli_fetch_array($casanoturna2)) {
                                              ?>
                                                <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                                  <div class="col-8" style="padding: 3px 10px 3px 10px">
                                                    <?php echo $row_casanoturna2['question']; ?>
                                                  </div>
                                                  <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                                  <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_casanoturna2['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                                </div>
                                              <?php
                                              } ?>

                                              <div>
                                                <div class="modal-footer" style="border-top: 0">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <tr>
                                            <td>
                                              <div class="table-data__info">
                                                <h6>Formulário Avaliação de Restaurantes</h6>
                                              </div>
                                            </td>
                                            <td align="center">
                                              <a href="#" data-bs-toggle="modal" data-bs-target="#restaurantes">
                                                <i class="fas fa-list-ul"></i>
                                              </a>
                                            </td>
                                          </tr>

                                          <div class="modal fade" id="restaurantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Questões para restaurantes</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                                </div>
                                                <div class="modal-body">

                                                  <form method="post" action="proc-cd-question.php">
                                                    <input type="hidden" name="category" value="restaurante" />
                                                    <input type="hidden" name="clube" value="<?php echo $clube; ?>" />
                                                    <div class="row">
                                                      <div class="col">
                                                        <label>Pergunta:</label>
                                                        <input type="text" class="form-control" name="question" required />
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col">
                                                        <label>Tipo de pergunta:</label>
                                                        <select class="form-control" name="type" required>
                                                          <option value="1">Avaliação</option>
                                                          <option value="2">Satisfação</option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="row mt-4 mb-4">
                                                      <div class="col text-center">
                                                        <button class="btn btn-success">Cadastrar</button>
                                                      </div>
                                                    </div>
                                                  </form>

                                                  <h3 class="mb-3">Avaliação</h3>
                                                  <?php while ($row_restaurante1 = mysqli_fetch_array($restaurante1)) {
                                                  ?>
                                                    <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                                      <div class="col-8" style="padding: 3px 10px 3px 10px">
                                                        <?php echo $row_restaurante1['question']; ?>
                                                      </div>
                                                      <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                                      <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_restaurante1['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                                    </div>
                                                  <?php
                                                  } ?>

                                                  <h3 class="mb-3 mt-3">Satisfação</h3>
                                                  <?php while ($row_restaurante2 = mysqli_fetch_array($restaurante2)) {
                                                  ?>
                                                    <div class="row" style="border-bottom: 1px solid #d6d6d6; margin-bottom: 5px">
                                                      <div class="col-8" style="padding: 3px 10px 3px 10px">
                                                        <?php echo $row_restaurante2['question']; ?>
                                                      </div>
                                                      <div class="col-2" style="padding: 3px 10px 3px 10px"><i class="fas fa-pencil-alt"></i></div>
                                                      <div class="col-2" style="padding: 3px 10px 3px 10px"><a href="excluir-question.php?cod_question=<?php echo $row_restaurante2['cod_question'] ?>"><i class="far fa-trash-alt"></i></a></div>
                                                    </div>
                                                  <?php
                                                  } ?>

                                                  <div>
                                                    <div class="modal-footer" style="border-top: 0">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                </tbody>
              </table>
            </div>
          </div>
          <!-- END USER DATA-->
        </div>
      </div>

      <?php include("footer.php"); ?>

      <!-- END PAGE CONTAINER-->
    </div>

  </div>

  <?php include("scripts-footer.php"); ?>

</body>

</html>
<!-- end document-->