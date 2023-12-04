<?php
session_start();

if (!isset($_SESSION['email'])) {  // IDENTIFICA SE USUARIO FEZ O LOGUIN, SE NÃO TIVER FEITO ENVIE PARA TELA DE LOGUIN, NÃO PERMITINDO A ENTRADA SEM LOGUIN E SENHA. 

    header('Location: ../index.php');
}

if ($_SESSION['id_cargo'] == 8) { // VERIFICA SE O CARGO QUE ESTA LOGADO É OQUE TEM AUTORIZAÇÃO

    //NADA

} else {

    header('Location: perfil.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/script.js" type="text/javascript"></script>

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
            <h1 class="config_titulo">Configurar Opções do Chamado</h1>
            <div class="config_form">

                <form class="categoria" id="" action="../php/processa_formulario_categoria.php" method="post"> <!-- FORMULARIO PARA CRIAR TIPO DE CATEGORIA  -->

                    <label>
                        <input class="categoria_input" type="text" name="categoria" placeholder="Adicionar Categoria ">
                    </label>

                    <button onclick="escreve_alerta_categoria()" class="categoria_buttom" type="submit" name="bt_categoria">Inserir Categoria</button>

                </form>

                <form class="prioridade_form" id="" action="../php/processa_formulario_prioridade.php" method="post"> <!-- FORMULARIO PARA CRIAR TIPO DE PRIORIDADE  -->
                    <label>
                        <input class="categoria_input" type="text" name="prioridade" placeholder="Adicionar Prioridade ">
                    </label>

                    <button onclick="escreve_alerta_prioridade()" class="categoria_buttom" type="submit" name="bt_prioridade">Inserir Prioridade</button>



                </form>

                <form class="prioridade_form" id="" action="../php/processa_formulario_status.php" method="post"> <!-- FORMULARIO PARA CRIAR TIPO DE STATUS (EXEMPLO CHAMADO CONCLUIDO ETC..)  -->
                    <label>
                        <input class="categoria_input" type="text" name="status" placeholder="Adicionar Status ">
                    </label>

                    <button onclick="escreve_alerta_status()" class="categoria_buttom" type="submit" name="bt_status">Inserir Status</button>



                </form>

                <form class="prioridade_form" id="" action="../php/processa_formulario_cargo.php" method="post"> <!-- FORMULARIO PARA CRIAR CARGO(ADM, TÉCNICO ETC ... ) -->
                    <label>
                        <input class="categoria_input" type="text" name="cargo" placeholder="Adicionar Cargo ">
                    </label>

                    <button onclick="escreve_alerta_cargo()" class="categoria_buttom" type="submit" name="bt_prioridade">Inserir Cargo</button>



                </form>




            </div>
            <a class="link_visualizar" href="mostra_categoria.php"> Visualizar Categorias e Prioridades </a> <!-- BOTÃO TIPO LINK PARA ENCAMINAHR O USUARIO PARA TELA DE VISUALIZAR TABELAS DO INTENS INSERIDOS NO BANCO DE DADOS -->
           


        </div>

    </main>



</body>



</html>