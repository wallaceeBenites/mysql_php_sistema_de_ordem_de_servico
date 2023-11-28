<?php

session_start();

if (!isset($_SESSION['email'])) {

    header('Location: ../index.php'); // evita usuario acessar usando a URL 
}


require_once("../php/conexao.php");

//consulta para obter a lista de categoria 

$consulta1 = "SELECT * FROM categoria";
$resultadoConsulta1 = mysqli_query($conexao, $consulta1);

$num_rows1 = mysqli_num_rows($resultadoConsulta1);


//consulta para obtr a lista prioridade 

$consulta2 = "SELECT * FROM prioridade";
$resultadoConsulta2 = mysqli_query($conexao, $consulta2);
$num_rows2 = mysqli_num_rows($resultadoConsulta2);

//consulta para obtr a lista status 

$consulta3 = "SELECT * FROM status";
$resultadoConsulta3 = mysqli_query($conexao, $consulta3);
$num_rows3 = mysqli_num_rows($resultadoConsulta3);

//consulta para obtr a lista status 

$consulta4 = "SELECT * FROM cargo_autorizacao";
$resultadoConsulta4 = mysqli_query($conexao, $consulta4);
$num_rows4 = mysqli_num_rows($resultadoConsulta4);

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

    <header class="cabecalho">
        <nav class="cabecalho_menu ">

            <a class="cabecalho__menu__link" href="perfil.php"> Home </a>
            <a class="cabecalho__menu__link" href="criar_os.php"> Abrir Chamado </a>
            <a class="cabecalho__menu__link" href="categoria.php"> Configurações </a>
            <a class="cabecalho__menu__link" href="../php/logout.php"> Sair </a>
        </nav>
    </header>



    <main class="perfil">



        <div class="conteiner3">

            <img class="logo_categoria" src="../assets/logo (2).png">
            <h1 class="config_titulo">Visualizar Opções do Chamado</h1>

            <div class="config_form">

                <?php if ($num_rows1 == 0) { ?> <!--  Faz aparecer imagem de uma lupa quando não tem nenhuma linha no banco  -->

                    <div class="nenhum_resultado" id="aparece1">

                        <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo">

                        <p>Nenhum Resultado Encontrado Para Categoria</p>

                    </div>

                <?php } else {   ?>

                    <table id="tabela_categoria" class="tabela_categoria">

                        <tr class="tabela_categoria_linha">



                            <th> Nome Categoria </th>
                            <th>Ações</th>

                        </tr>

                        <?php while ($linha = mysqli_fetch_assoc($resultadoConsulta1)) { ?>


                            <tr>


                                <td><?php echo htmlspecialchars($linha['NOME_AREA_SERVICO'], ENT_QUOTES, 'UTF-8');  ?></td>
                                <td> <a class="bt_excluir" href="../php/escluir_categoria.php?ID_TIPO_SERVICO=<?php echo $linha['ID_TIPO_SERVICO']; ?>">⨂</a> </td>
                            </tr>

                        <?php } ?>

                    </table>

                <?php } ?>


                <?php if ($num_rows2 == 0) { ?> <!--  Faz aparecer imagem de uma lupa quando não tem nenhuma linha no banco  -->

                    <div class="nenhum_resultado" id="aparece1">

                        <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo">

                        <p>Nenhum Resultado Encontrado Para Prioridade </p>

                    </div>

                <?php } else { ?>


                    <table id="tabela_prioridade" class="tabela_categoria">

                        <tr class="tabela_categoria_linha">



                            <th>Nome Prioridade</th>
                            <th>Ações</th>

                        </tr>

                        <?php while ($linha = mysqli_fetch_assoc($resultadoConsulta2)) { ?>

                            <tr>

                                <td> <?php echo htmlspecialchars($linha['NOME_PRIORIDADE'], ENT_QUOTES, 'UTF-8'); ?> </td>
                                <td> <a class="bt_excluir" href="../php/escluir_prioridade.php?ID_PRIORIDADE=<?php echo $linha['ID_PRIORIDADE']; ?>">⨂</a> </td>

                            </tr>

                        <?php } ?>

                    </table>


                <?php } ?>


                <?php if ($num_rows3 == 0) {  ?> <!--  Faz aparecer imagem de uma lupa quando não tem nenhuma linha no banco  -->

                    <div class="nenhum_resultado" id="aparece1">

                        <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo">

                        <p>Nenhum Resultado Encontrado Para Status</p>

                    </div>

                <?php  } else { ?>


                    <table id="tabela_categoria" class="tabela_categoria">

                        <tr class="tabela_categoria_linha">



                            <th> Nome Status </th>
                            <th>Ações</th>

                        </tr>

                        <?php while ($linha = mysqli_fetch_assoc($resultadoConsulta3)) { ?>

                            <tr>



                                <td><?php echo htmlspecialchars($linha['NOME_STATUS'], ENT_QUOTES, 'UTF-8');  ?></td>
                                <td> <a class="bt_excluir" href="../php/escluir_status.php?ID_STATUS=<?php echo $linha['ID_STATUS']; ?>">⨂</a> </td>
                            </tr>

                        <?php } ?>


                    </table>

                <?php } ?>


                <?php if ($num_rows4 == 0) { ?> <!--  Faz aparecer imagem de uma lupa quando não tem nenhuma linha no banco  -->

                    <div class="nenhum_resultado" id="aparece1">

                        <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo">

                        <p>Nenhum Resultado Encontrado Para Cargo</p>

                    </div>

                <?php } else {   ?>

                    <table id="tabela_prioridade" class="tabela_categoria">

                        <tr class="tabela_categoria_linha">



                            <th>Nome Cargo</th>
                            <th>Ações</th>

                        </tr>

                        <?php while ($linha = mysqli_fetch_assoc($resultadoConsulta4)) { ?>

                            <tr>



                                <td> <?php echo htmlspecialchars($linha['NOME_CARGO'], ENT_QUOTES, 'UTF-8');  ?> </td>
                                <td> <a class="bt_excluir" href="../php/escluir_cargo.php?ID_CARGO=<?php echo $linha['ID_CARGO']; ?>">⨂</a> </td>
                            </tr>

                        <?php } ?>

                    </table>

                <?php } ?>

            </div>



            <a class="link_visualizar" href="categoria.php">Voltar </a>


        </div>

    </main>





</body>



</html>