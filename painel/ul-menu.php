<ul class="list-unstyled navbar__list">


    <li class="active has-sub">
        <a href="home<?php if ($_GET['clube']) {
                            echo $clube;
                        } ?>">
            <i class="fas fa-tachometer-alt"></i>Vis&atilde;o Geral
        </a>
    </li>


    <?php
    $page_notificacao = 2;
    $qmenu2 = "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
    $ssmenu2 = mysqli_query($link, $qmenu2) or die(mysqli_error($link));
    $row_ssmenu2 = mysqli_fetch_assoc($ssmenu2);
    if ($row_ssmenu2['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1) {
    ?>
        <li>
            <a href="inbox<?php if ($_GET['clube']) {
                                echo $clube;
                            } ?>">
                <i class="fas fa-bell"></i>Notifica&ccedil;&otilde;es</a>
            <?php
            $usi = $_SESSION['id_usuario'];
            $snot = "SELECT * FROM rfa_notificacao WHERE id_usuario='$usi' AND (notificacao='0' OR notificacao='2')";
            $notify = mysqli_query($link, $snot) or die(mysqli_error($link));
            $totalRows_notify = mysqli_num_rows($notify);

            if ($totalRows_notify > 0) {
                echo "<span class='inbox-num'>" . $totalRows_notify . "</span>";
            } else {
            }
            ?>




        </li>
    <?php } ?>


    <?php
    $page_notificacao = 3;
    $qmenu3 = "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
    $ssmenu3 = mysqli_query($link, $qmenu3) or die(mysqli_error($link));
    $row_ssmenu3 = mysqli_fetch_assoc($ssmenu3);
    if ($row_ssmenu3['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1) {
    ?>
        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-dollar-sign"></i>Financeiro
                <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                </span>
            </a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="previsao<?php if ($_GET['clube']) {
                                            echo $clube;
                                        } ?>">
                        Previsão</a>
                </li>

                <li>
                    <a href="banco<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Contas</a>
                </li>


                <!--<li>
                                    <a href="a-receber.php">
                                        A receber</a>
                                </li>-->



                <li>
                    <a href="despesas<?php if ($_GET['clube']) {
                                            echo $clube;
                                        } ?>">
                        Despesas</a>
                </li>

                <li>
                    <a href="receitas<?php if ($_GET['clube']) {
                                            echo $clube;
                                        } ?>">
                        Receitas</a>
                </li>

                <li>
                    <a href="fundos<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Fundos</a>
                </li>

                <li>
                    <a href="retiradas<?php if ($_GET['clube']) {
                                            echo $clube;
                                        } ?>">
                        Retiradas</a>
                </li>

                <li>
                    <a href="mensalidadespagas<?php if ($_GET['clube']) {
                                                    echo $clube;
                                                } ?>">
                        Mensalidades Pagas</a>
                </li>
                <li>
                    <a href="boletosemitidos<?php if ($_GET['clube']) {
                                                echo $clube . "-1";
                                            } ?>">
                        Boletos</a>
                </li>
            </ul>
        </li>
    <?php } ?>


    <!-- Modal -->
    <div class="modal fade" id="modalparceiros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Escolha uma página</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="#" class="btn btn-primary">Hotéis</a>
                    <a href="#" class="btn btn-primary">Parques Temáticos</a>
                    <a href="#" class="btn btn-primary">Cias Aéreas</a>
                    <a href="#" class="btn btn-primary">Entidades</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                </div>
            </div>
        </div>
    </div>


    <?php
    $page_notificacao = 4;
    $qmenu4 = "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
    $ssmenu4 = mysqli_query($link, $qmenu4) or die(mysqli_error($link));
    $row_ssmenu4 = mysqli_fetch_assoc($ssmenu4);
    if ($row_ssmenu4['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1) {
    ?>
        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="far fa-window-restore"></i>Site
                <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                </span>
            </a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="urgente<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        <i class="fas fa-exclamation-triangle"></i> Notícias Urgentes</a>
                </li>
                <li>
                    <a href="topo<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Topo</a>
                </li>
                <li>
                    <a href="slides<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Slides</a>
                </li>
                <li>
                    <a href="paginas<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Páginas</a>
                </li>
                <li>
                    <a href="vantagens<?php if ($_GET['clube']) {
                                            echo $clube;
                                        } ?>">
                        Vantagens</a>
                </li>
                <li>
                    <a href="blog<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Blog</a>
                </li>
                <li>
                    <a href="conteudo<?php if ($_GET['clube']) {
                                            echo $clube;
                                        } ?>">
                        Conte&uacute;do</a>
                </li>
                <li>
                    <a href="galeria<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Galeria de Presidentes</a>
                </li>
                <li>
                    <a href="centraldevistos<?php if ($_GET['clube']) {
                                                echo $clube;
                                            } ?>">
                        Central de Vistos</a>
                </li>
                <li>
                    <a href="questionarios<?php if ($_GET['clube']) {
                                                echo $clube;
                                            } ?>">
                        Questionários</a>
                </li>
                <li>
                    <a href="cursos<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Cursos</a>
                </li>
                <li>
                    <a href="ouvidoria<?php if ($_GET['clube']) {
                                            echo $clube;
                                        } ?>">
                        Ouvidoria</a>
                </li>

            </ul>
        </li>
    <?php } ?>

    <?php
    $page_notificacao = 5;
    $qmenu5 = "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
    $ssmenu5 = mysqli_query($link, $qmenu5) or die(mysqli_error($link));
    $row_ssmenu5 = mysqli_fetch_assoc($ssmenu5);
    if ($row_ssmenu5['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1) {
    ?>


        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-users"></i>Associados
                <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                </span>
            </a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="socios<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">Associados</a>
                </li>
                <li>
                    <a href="solicitacoesassoc<?php if ($_GET['clube']) {
                                                    echo $clube;
                                                } ?>">
                        Solicitações</a>
                </li>


            </ul>

        </li>
    <?php } ?>

    <?php
    $page_notificacao = 6;
    $qmenu6 = "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
    $ssmenu6 = mysqli_query($link, $qmenu6) or die(mysqli_error($link));
    $row_ssmenu6 = mysqli_fetch_assoc($ssmenu6);
    if ($row_ssmenu6['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1) {
    ?>
        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-handshake"></i>Reuni&otilde;es
                <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                </span>
            </a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="reuniao<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Agendar Reuniões</a>
                </li>
                <li>
                    <a href="pauta<?php if ($_GET['clube']) {
                                        echo $clube;
                                    } ?>">
                        Pauta e Atas</a>
                </li>

                <li>
                    <a href="datasimportantes<?php if ($_GET['clube']) {
                                                    echo $clube;
                                                } ?>">
                        Datas Importantes</a>
                </li>
            </ul>

        </li>
    <?php } ?>

    <?php
    /*$page_notificacao = 6;
                        $qmenu6= "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
                        $ssmenu6 = mysqli_query($link, $qmenu6) or die(mysqli_error($link));
                        $row_ssmenu6 = mysqli_fetch_assoc($ssmenu6);
                        if($row_ssmenu6['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1){*/
    ?>
    <!--<li class="has-sub">
                            <a class="js-arrow" href="#" title="Bando de Cadeiras de Rodas" data-toggle="tooltip">
                                <i class="fab fa-accessible-icon"></i>Banco de C.R.
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                    
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                        <a href="reuniao.php<?php if ($_GET['clube']) {
                                                                echo '?clube=' . $clube;
                                                            } ?>">
                                            Solicitações</a>
                                    </li>
                                <li>
                                    <a href="pauta.php<?php if ($_GET['clube']) {
                                                            echo '?clube=' . $clube;
                                                        } ?>">
                                        Doadores</a>
                                </li>
                                <li>
                                    <a href="pauta.php<?php if ($_GET['clube']) {
                                                            echo '?clube=' . $clube;
                                                        } ?>">
                                        Formulários</a>
                                </li>
                                <li>
                                    <a href="pauta.php<?php if ($_GET['clube']) {
                                                            echo '?clube=' . $clube;
                                                        } ?>">
                                        Itens de doação</a>
                                </li>
                                
                                
                            </ul>
                            
                        </li>-->
    <?php //} 
    ?>

    <?php
    /*
                        $page_notificacao = 7;
                        $qmenu7= "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
                        $ssmenu7 = mysqli_query($link, $qmenu7) or die(mysqli_error($link));
                        $row_ssmenu7 = mysqli_fetch_assoc($ssmenu7);
                        if($row_ssmenu7['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1){*/
    ?>
    <!--<li class="has-sub">
                            <a class="js-arrow" href="socios.php">
                                <i class="fas fa-map-marker-alt"></i>Localizar clubes
                                
                            </a>
                            
                        </li>-->
    <?php //} 
    ?>

    <?php
    $page_notificacao = 8;
    $qmenu8 = "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
    $ssmenu8 = mysqli_query($link, $qmenu8) or die(mysqli_error($link));
    $row_ssmenu8 = mysqli_fetch_assoc($ssmenu8);
    if ($row_ssmenu8['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1) {
    ?>
        <li class="has-sub">
            <a href="integracao<?php if ($_GET['clube']) {
                                    echo $clube;
                                } ?>">
                <i class="fas fa-inbox"></i>Integra&ccedil;&atilde;o

            </a>

        </li>
    <?php } ?>

    <?php
    $page_notificacao = 9;
    $qmenu9 = "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
    $ssmenu9 = mysqli_query($link, $qmenu9) or die(mysqli_error($link));
    $row_ssmenu9 = mysqli_fetch_assoc($ssmenu9);
    if ($row_ssmenu9['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1) {
    ?>
        <li class="has-sub">
            <a href="equipe<?php if ($_GET['clube']) {
                                echo $clube;
                            } ?>">
                <i class="far fa-address-book"></i>Equipe

            </a>

        </li>
    <?php } ?>

    <?php
    $page_notificacao = 11;
    $qmenu11 = "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
    $ssmenu11 = mysqli_query($link, $qmenu11) or die(mysqli_error($link));
    $row_ssmenu11 = mysqli_fetch_assoc($ssmenu11);
    if ($row_ssmenu11['consulta_acesso'] == 1 || $_SESSION['funcao'] == 1) {
    ?>

        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-wrench"></i>Configurações
                <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                </span>
            </a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="configuracoes<?php if ($_GET['clube']) {
                                                echo $clube;
                                            } ?>">
                        Configuração</a>
                </li>

                <li>
                    <a href="permissoes<?php if ($_GET['clube']) {
                                            echo $clube;
                                        } ?>">
                        Permiss&otilde;es</a>
                </li>


            </ul>

        </li>

    <?php } ?>


    <?php
    $page_notificacao = 10;
    $qmenu10 = "SELECT * FROM rfa_acesso_paginas WHERE clube='$clube' AND nivel_acesso = '$funcao' AND pagina_id = '$page_notificacao'";
    $ssmenu10 = mysqli_query($link, $qmenu10) or die(mysqli_error($link));
    $row_ssmenu10 = mysqli_fetch_assoc($ssmenu10);
    if ($_SESSION['funcao'] == 1) {
    ?>
        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-cog"></i>Administra&ccedil;&atilde;o
                <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                </span>
            </a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="setemail">
                        Envio de E-mails</a>
                </li>

                <li>
                    <a href="usuarios">
                        Usu&aacute;rios</a>
                </li>

                <li>
                    <a href="formaspagamentos">
                        Formas de Pagamento</a>
                </li>
                <li>
                    <a href="planos">
                        Planos</a>
                </li>
                <li>
                    <a href="propagandas">
                        Propagandas</a>
                </li>

            </ul>

        </li>
    <?php } ?>






    <li class="has-sub">
        <a href="login-seguro/logout.php">
            <i class="fas fa-sign-out-alt"></i>Sair

        </a>

    </li>

</ul>