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

require_once("../php/conexao.php"); // CONECTA COM BANCO 

// CONSULTA PARA OBTER A LISTA DE USUARIOS  
$consulta_usuario = "SELECT * FROM usuario";
$resultado_consulta_usuario = mysqli_query($conexao, $consulta_usuario);


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
            <h1 class="config_titulo">Administrar Usuários</h1>
            <div class="config_form_adm_usuario">

                <table class="perfil_chamado_tabela">

                    <tr class="perfil_chamado_tabela_linha">



                        <th> Id Usuario </th>
                        <th> Nome do Usuario </th>

                        <th> Senha Do Usuario </th>
                        <th> Data De Cadastro </th>
                        <th> Cargo Do Usuario </th>
                        <th> Telefone </th>
                        <th> Email </th>

                        <th>Ações</th>

                    </tr>

                    <?php while ($linha = mysqli_fetch_assoc($resultado_consulta_usuario)) { ?> <!-- LAÇO DE REPETIÇÃO PARA MOSTRA CONTEUDO TABELA USUARIO  -->

                        <?php

                        // CONSULTA PARA TROCA O ID_CARGO(CHAVE ESTRANGEIRA) PELO NOME RESPECTIVO
                        $id_cargo = $linha['ID_CARGO'];
                        $consultanome_cargo = "SELECT NOME_CARGO FROM cargo_autorizacao WHERE ID_CARGO = $id_cargo"; // SELECIONA NOME DA TABELA cargo_autorizacao ONDE O ID SEJA IGUAL A $id_cargo
                        $resultado_consulta_nome_cargo = mysqli_query($conexao, $consultanome_cargo);
                        $nome_cargo = mysqli_fetch_array($resultado_consulta_nome_cargo);

                        ?>

                        <tr>

                            <td><?php echo htmlspecialchars($linha['ID_USUARIO'], ENT_QUOTES, 'UTF-8');  ?></td>
                            <td><?php echo htmlspecialchars($linha['NOME'], ENT_QUOTES, 'UTF-8');  ?></td>
                            <td><?php echo htmlspecialchars($linha['SENHA'], ENT_QUOTES, 'UTF-8');  ?></td>
                            <td><?php echo htmlspecialchars($linha['DATA_DE_CADASTRO'], ENT_QUOTES, 'UTF-8');  ?></td>
                            <td><?php echo htmlspecialchars($nome_cargo['NOME_CARGO'], ENT_QUOTES, 'UTF-8');  ?></td>
                            <td><?php echo htmlspecialchars($linha['TELEFONE'], ENT_QUOTES, 'UTF-8');  ?></td>
                            <td><?php echo htmlspecialchars($linha['EMAIL'], ENT_QUOTES, 'UTF-8');  ?></td>

                            <td>
                                <a class="bt_excluir" href="../php/excluir_usuario.php?ID_USUARIO=<?php echo $linha['ID_USUARIO']; ?>">⨂</a> <!-- LINK BOTÃO PARA ENCAMINHAR O CONTEUDO DA LINHA PARA EXCLUSÃO -->

                                <a class="bt_editar" href="../html/edita_administra_usuarios.php?ID_USUARIO=<?php echo $linha['ID_USUARIO']; ?>">✎</a> <!-- LINK BOTÃO PARA ENCAMINHAR O CONTEUDO DA LINHA PARA EDIÇÃO -->
                            </td> 
                        </tr>

                    <?php } ?>


                </table>




            </div>


        </div>

    </main>



</body>



</html>