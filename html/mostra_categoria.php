<?php

session_start();

if (!isset($_SESSION['email'])) { // IDENTIFICA SE USUARIO FEZ O LOGUIN, SE NÃO TIVER FEITO ENVIE PARA TELA DE LOGUIN, NÃO PERMITINDO A ENTRADA SEM LOGUIN E SENHA.

    header('Location: ../index.php');
}

if ($_SESSION['id_cargo'] == 8) { // VERIFICA SE O CARGO QUE ESTA LOGADO É OQUE TEM AUTORIZAÇÃO

    //NADA

} else {

    header('Location: perfil.php');
}


require_once("../php/conexao.php");

// CONSULTA PARA OBTER A LISTA DE CATEGORIA 
$consulta1 = "SELECT * FROM categoria";
$resultadoConsulta1 = mysqli_query($conexao, $consulta1);
$num_rows1 = mysqli_num_rows($resultadoConsulta1); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 


// CONSULTA PARA OBTER A LISTA DE PRIORIDADE  
$consulta2 = "SELECT * FROM prioridade";
$resultadoConsulta2 = mysqli_query($conexao, $consulta2);
$num_rows2 = mysqli_num_rows($resultadoConsulta2); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 


// CONSULTA PARA OBTER A LISTA DE STATUS  
$consulta3 = "SELECT * FROM status";
$resultadoConsulta3 = mysqli_query($conexao, $consulta3);
$num_rows3 = mysqli_num_rows($resultadoConsulta3); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 


// CONSULTA PARA OBTER A LISTA DE CARGO 
$consulta4 = "SELECT * FROM cargo_autorizacao";
$resultadoConsulta4 = mysqli_query($conexao, $consulta4);
$num_rows4 = mysqli_num_rows($resultadoConsulta4); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="../styles/style.css">


</head>

<body>

    <header class="cabecalho"> <!-- NAVEGADOR CABEÇALHO -->
        <nav class="cabecalho_menu ">

            <a class="cabecalho__menu__link" href="perfil.php"> Home </a> <!-- LINK PAGINA Home(perfil.php) -->

            <a class="cabecalho__menu__link" href="criar_os.php"> Abrir Chamado </a> <!-- LINK PAGINA Abrir Chamado(criar_os.php) -->

            <?php if ($_SESSION['id_cargo'] == 8) { ?> <!-- PERMITE O ACESSO SOMENTE PARA O CARGO ADM  -->

                <a class="cabecalho__menu__link" href="categoria.php"> Configurações </a> <!-- LINK PAGINA Configurações(categoria.php) -->

                <a class="cabecalho__menu__link" href="administra_usuarios.php"> Administrar Usuários </a>

            <?php } ?>

            <a class="cabecalho__menu__link" href="../php/logout.php"> Sair </a> <!-- LINK PARA Sair(logout.php) -->


        </nav>
    </header>



    <main class="perfil">



        <div class="conteiner3">

            <img class="logo_categoria" src="../assets/logo (2).png">
            <h1 class="config_titulo">Visualizar Opções do Chamado</h1>

            <div class="config_form">


                <?php if ($num_rows1 == 0) { ?> <!-- CONDICIONAL QUE FAZ APARECE UMA IMAGEM DE UMA LUPA CASO NÃO TENHA CONTEUDO PARA APARECER NA TABELA  -->

                    <div class="nenhum_resultado" id="aparece1">

                        <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo"> <!-- DIV PARA MOSTRA MENSAGEM CASO NENHUM RESULTAOD ENCONTRADO   -->

                        <p>Nenhum Resultado Encontrado Para Categoria</p>

                    </div>

                <?php } else {   ?> <!-- else DA CONDICIONAL QUE FAZ APARECE UMA IMAGEM DE UMA LUPA CASO NÃO TENHA CONTEUDO PARA APARECER NA TABELA(MOSTRA TABELA)  -->


                    <table id="tabela_categoria" class="tabela_categoria">

                        <tr class="tabela_categoria_linha">



                            <th> Categoria </th>
                            <th>Ações</th>

                        </tr>

                        <?php while ($linha = mysqli_fetch_assoc($resultadoConsulta1)) { ?> <!-- LAÇO DE REPETIÇÃO PARA MOSTRA CONTEUDO TABELA CATEGORIA  -->


                            <tr>


                                <td><?php echo htmlspecialchars($linha['NOME_AREA_SERVICO'], ENT_QUOTES, 'UTF-8');  ?></td>
                                <td>
                                    <a class="bt_editar" href="../html/editar_config_categoria.php?ID_TIPO_SERVICO=<?php echo $linha['ID_TIPO_SERVICO']; ?>">✎</a> <!-- LINK BOTÃO PARA ENCAMINHAR O CONTEUDO DA LINHA PARA EDIÇÃO -->

                                    <a class="bt_excluir" href="../php/escluir_categoria.php?ID_TIPO_SERVICO=<?php echo $linha['ID_TIPO_SERVICO']; ?>">⨂</a>
                                </td> <!-- LINK PARA ENVIAR INFORMAÇÕES DA TABELA PARA O ARQUIVO DE EXCLUIR LINHA "escluir_categoria.php" -->
                            </tr>

                        <?php } ?>

                    </table>

                <?php } ?>



                <?php if ($num_rows2 == 0) { ?> <!-- CONDICIONAL QUE FAZ APARECE UMA IMAGEM DE UMA LUPA CASO NÃO TENHA CONTEUDO PARA APARECER NA TABELA  -->

                    <div class="nenhum_resultado" id="aparece1">

                        <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo"> <!-- DIV PARA MOSTRA MENSAGEM CASO NENHUM RESULTAOD ENCONTRADO   -->

                        <p>Nenhum Resultado Encontrado Para Prioridade </p>

                    </div>

                <?php } else { ?> <!-- else DA CONDICIONAL QUE FAZ APARECE UMA IMAGEM DE UMA LUPA CASO NÃO TENHA CONTEUDO PARA APARECER NA TABELA(MOSTRA TABELA)  -->


                    <table id="tabela_prioridade" class="tabela_categoria">

                        <tr class="tabela_categoria_linha">



                            <th>Prioridade</th>
                            <th>Ações</th>

                        </tr>

                        <?php while ($linha = mysqli_fetch_assoc($resultadoConsulta2)) { ?> <!-- LAÇO DE REPETIÇÃO PARA MOSTRA CONTEUDO TABELA PRIORIDADE  -->

                            <tr>

                                <td> <?php echo htmlspecialchars($linha['NOME_PRIORIDADE'], ENT_QUOTES, 'UTF-8'); ?> </td>
                                <td>
                                    <a class="bt_editar" href="../html/editar_config_prioridade.php?ID_PRIORIDADE=<?php echo $linha['ID_PRIORIDADE']; ?>">✎</a> <!-- LINK BOTÃO PARA ENCAMINHAR O CONTEUDO DA LINHA PARA EDIÇÃO -->
                                    <a class="bt_excluir" href="../php/escluir_prioridade.php?ID_PRIORIDADE=<?php echo $linha['ID_PRIORIDADE']; ?>">⨂</a>
                                </td> <!-- LINK PARA ENVIAR INFORMAÇÕES DA TABELA PARA O ARQUIVO DE EXCLUIR LINHA "escluir_categoria.php" -->

                            </tr>

                        <?php } ?>

                    </table>


                <?php } ?>



                <?php if ($num_rows3 == 0) {  ?> <!-- CONDICIONAL QUE FAZ APARECE UMA IMAGEM DE UMA LUPA CASO NÃO TENHA CONTEUDO PARA APARECER NA TABELA  -->

                    <div class="nenhum_resultado" id="aparece1">

                        <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo"> <!-- DIV PARA MOSTRA MENSAGEM CASO NENHUM RESULTAOD ENCONTRADO   -->

                        <p>Nenhum Resultado Encontrado Para Status</p>

                    </div>

                <?php  } else { ?> <!-- else DA CONDICIONAL QUE FAZ APARECE UMA IMAGEM DE UMA LUPA CASO NÃO TENHA CONTEUDO PARA APARECER NA TABELA(MOSTRA TABELA)  -->


                    <table id="tabela_categoria" class="tabela_categoria">

                        <tr class="tabela_categoria_linha">



                            <th>  Status </th>
                            <th>Ações</th>

                        </tr>

                        <?php while ($linha = mysqli_fetch_assoc($resultadoConsulta3)) { ?> <!-- LAÇO DE REPETIÇÃO PARA MOSTRA CONTEUDO TABELA STATUS  -->

                            <tr>



                                <td><?php echo htmlspecialchars($linha['NOME_STATUS'], ENT_QUOTES, 'UTF-8');  ?></td>
                                <td>
                                    <a class="bt_editar" href="../html/editar_config_status.php?ID_STATUS=<?php echo $linha['ID_STATUS']; ?>">✎</a> <!-- LINK BOTÃO PARA ENCAMINHAR O CONTEUDO DA LINHA PARA EDIÇÃO -->

                                    <a class="bt_excluir" href="../php/escluir_status.php?ID_STATUS=<?php echo $linha['ID_STATUS']; ?>">⨂</a>
                                </td> <!-- LINK PARA ENVIAR INFORMAÇÕES DA TABELA PARA O ARQUIVO DE EXCLUIR LINHA "escluir_categoria.php" -->
                            </tr>

                        <?php } ?>


                    </table>

                <?php } ?>



                <?php if ($num_rows4 == 0) { ?> <!-- CONDICIONAL QUE FAZ APARECE UMA IMAGEM DE UMA LUPA CASO NÃO TENHA CONTEUDO PARA APARECER NA TABELA  -->

                    <div class="nenhum_resultado" id="aparece1">

                        <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo"> <!-- DIV PARA MOSTRA MENSAGEM CASO NENHUM RESULTAOD ENCONTRADO   -->

                        <p>Nenhum Resultado Encontrado Para Cargo</p>

                    </div>

                <?php } else {   ?> <!-- else DA CONDICIONAL QUE FAZ APARECE UMA IMAGEM DE UMA LUPA CASO NÃO TENHA CONTEUDO PARA APARECER NA TABELA(MOSTRA TABELA)  -->

                    <table id="tabela_prioridade" class="tabela_categoria">

                        <tr class="tabela_categoria_linha">



                            <th> Cargo</th>
                            <th>Ações</th>

                        </tr>

                        <?php while ($linha = mysqli_fetch_assoc($resultadoConsulta4)) { ?> <!-- LAÇO DE REPETIÇÃO PARA MOSTRA CONTEUDO TABELA CARGO  -->

                            <tr>



                                <td> <?php echo htmlspecialchars($linha['NOME_CARGO'], ENT_QUOTES, 'UTF-8');  ?> </td>
                                <td>
                                    <a class="bt_editar" href="../html/editar_config_cargo.php?ID_CARGO=<?php echo $linha['ID_CARGO']; ?>">✎</a> <!-- LINK BOTÃO PARA ENCAMINHAR O CONTEUDO DA LINHA PARA EDIÇÃO -->
                                    <a class="bt_excluir" href="../php/escluir_cargo.php?ID_CARGO=<?php echo $linha['ID_CARGO']; ?>">⨂</a>
                                </td> <!-- LINK PARA ENVIAR INFORMAÇÕES DA TABELA PARA O ARQUIVO DE EXCLUIR LINHA "escluir_categoria.php" -->
                            </tr>

                        <?php } ?>

                    </table>

                <?php } ?>


            </div>



            <a class="link_visualizar" href="categoria.php">Voltar </a> <!-- LINK PARA VOLTAR A TELA DE INSERIR CONTEUDO DAS TABELAS  -->


        </div>

    </main>





</body>



</html>