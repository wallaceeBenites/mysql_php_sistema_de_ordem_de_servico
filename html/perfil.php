<?php

session_start();

if (!isset($_SESSION['email'])) { // IDENTIFICA SE USUARIO FEZ O LOGUIN, SE NÃO TIVER FEITO ENVIE PARA TELA DE LOGUIN, NÃO PERMITINDO A ENTRADA SEM LOGUIN E SENHA.

    header('Location: ../index.php');
}

require_once("../php/conexao.php");

// CONSULTA PARA OBTER A LISTA DE CHAMADOS 
$consulta_tabela_chamado = "SELECT * FROM chamado";
$resultado_consulta_tabela_chamado = mysqli_query($conexao, $consulta_tabela_chamado);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de serviço</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <header class="cabecalho"> <!-- NAVEGADOR CABEÇALHO -->
        <nav class="cabecalho_menu ">

            <a class="cabecalho__menu__link" href="perfil.php"> Home </a> <!-- LINK PAGINA Home(perfil.php) -->

            <a class="cabecalho__menu__link" href="criar_os.php"> Abrir Chamado </a> <!-- LINK PAGINA Abrir Chamado(criar_os.php) -->

            <a class="cabecalho__menu__link" href="categoria.php"> Configurações </a> <!-- LINK PAGINA Configurações(categoria.php) -->

            <a class="cabecalho__menu__link" href="../php/logout.php"> Sair </a> <!-- LINK PARA Sair(logout.php) -->


        </nav>
    </header>


    <main class="perfil">

        <div class="conteiner">

            <div class="pefil_chat_info">

                <h1 class="nome"> Wallace Ribeiro Benites</h1>

                <h3 class="cargo">CARGO: ADM </h3>
                <br>
                <h4 class="info">

                    <?php
                    echo "Email: {$_SESSION['email']}  ";  // MOSTRA O EMAIL DO USUARIO LOGADO 
                    ?>

                </h4>
                <h4 class="info">Celular: (61)98206-9825</h4>
                <h4 class="info">Data de Criação: 11/11/2000</h4>
                <h4 class="info">ID : 01</h4>

            </div>


            <section class="perfil_chamado">
                <h1> Chamados Abertos pelo Usario: </h1>
                <table class="perfil_chamado_tabela">
                    <tr class="perfil_chamado_tabela_linha">
                        <td>
                            <h4> Numero Chamado:</h4>
                        </td>
                        <td>
                            <h4> Pelo Usuario:</h4>
                        </td>
                        <td>
                            <h4> Data e Hora de Abertura:</h4>
                        </td>

                        <td>
                            <h4> Tipo de Serviço:</h4>
                        </td>
                        <td>
                            <h4> Prioridade:</h4>
                        </td>
                        <td>
                            <h4> Status:</h4>
                        </td>
                        <td>
                            <h4> Descrição Do Chamado:</h4>
                        </td>
                        <td>
                            <h4>Ações</h4>
                        </td>
                    <tr>

                        <?php
                        while ($linha_chamado = mysqli_fetch_assoc($resultado_consulta_tabela_chamado)) {  // LAÇO DE REPETIÇÃO PARA MOSTRA CONTEUDO TABELA DOS CHAMADOS  



                            // CONSULTA PARA TROCA O ID_TIPO_SERVICO(CHAVE ESTRANGEIRA) PELO NOME RESPECTIVO
                            $id_categoria = $linha_chamado['ID_TIPO_SERVICO'];
                            $consultanome_categoria = "SELECT NOME_AREA_SERVICO FROM categoria WHERE ID_TIPO_SERVICO = $id_categoria"; // SELECIONA NOME DA TABELA CATEGORIA ONDE O ID SEJA IGUAL A $id_categoria
                            $resultado_consulta_nome_categoria = mysqli_query($conexao, $consultanome_categoria);
                            $nome_categoria = mysqli_fetch_array($resultado_consulta_nome_categoria);


                            // CONSULTA PARA TROCA O ID_PRIORIDADE(CHAVE ESTRANGEIRA) PELO NOME RESPECTIVO
                            $id_prioridade = $linha_chamado['ID_PRIORIDADE'];
                            $consultanome_prioridade = "SELECT NOME_PRIORIDADE FROM prioridade WHERE ID_PRIORIDADE = $id_prioridade"; // SELECIONA NOME DA TABELA CATEGORIA ONDE O ID SEJA IGUAL A $id_prioridade
                            $resultado_consulta_nome_prioridade = mysqli_query($conexao, $consultanome_prioridade);
                            $nome_prioridade = mysqli_fetch_array($resultado_consulta_nome_prioridade);

                            // CONSULTA PARA TROCA O ID_STATUS(CHAVE ESTRANGEIRA) PELO NOME RESPECTIVO
                            $id_status = $linha_chamado['ID_STATUS'];
                            $consultanome_status = "SELECT NOME_STATUS FROM status WHERE ID_STATUS = $id_status"; // SELECIONA NOME DA TABELA CATEGORIA ONDE O ID SEJA IGUAL A $id_status
                            $resultado_consulta_nome_status = mysqli_query($conexao, $consultanome_status);
                            $nome_status = mysqli_fetch_array($resultado_consulta_nome_status);

                            // CONSULTA PARA TROCA O ID_USUARIO(CHAVE ESTRANGEIRA) PELO NOME RESPECTIVO
                            $id_usuario = $linha_chamado['ID_USUARIO'];
                            $consultanome_usuario = "SELECT NOME FROM usuario WHERE ID_USUARIO = $id_usuario"; // SELECIONA NOME DA TABELA CATEGORIA ONDE O ID SEJA IGUAL A $id_usuario
                            $resultado_consulta_nome_usuario = mysqli_query($conexao, $consultanome_usuario);
                            $nome_usuario = mysqli_fetch_array($resultado_consulta_nome_usuario);



                        ?>

                    <tr>
                        <td><?php echo htmlspecialchars($linha_chamado['ID_CHAMADO'], ENT_QUOTES, 'UTF-8');  ?></td>

                        <td><?php echo htmlspecialchars($nome_usuario['NOME'], ENT_QUOTES, 'UTF-8');  ?></td> <!-- MOSTRA NOME USANDO O ID  -->

                        <td><?php echo htmlspecialchars($linha_chamado['DATA_DE_ABERTURA'], ENT_QUOTES, 'UTF-8');  ?></td>

                        <td><?php echo htmlspecialchars($nome_categoria['NOME_AREA_SERVICO'], ENT_QUOTES, 'UTF-8');  ?></td> <!-- MOSTRA NOME USANDO O ID  -->

                        <td><?php echo htmlspecialchars($nome_prioridade['NOME_PRIORIDADE'], ENT_QUOTES, 'UTF-8');  ?></td> <!-- MOSTRA NOME USANDO O ID  -->

                        <td><?php echo htmlspecialchars($nome_status['NOME_STATUS'], ENT_QUOTES, 'UTF-8');  ?></td> <!-- MOSTRA NOME USANDO O ID  -->

                        <td><?php echo htmlspecialchars($linha_chamado['DESCRICAO_DO_CHAMADO'], ENT_QUOTES, 'UTF-8');  ?></td>

                        <td class="acoes">
                            <a class="bt_editar" href="../html/criar_os.php?ID_CHAMADO=<?php echo $linha_chamado['ID_CHAMADO']; ?>">✎</a> <!-- LINK BOTÃO PARA ENCAMINHAR O CONTEUDO DA LINHA PARA EDIÇÃO -->
                            <a class="bt_excluir" href="../php/escluir_chamado.php?ID_CHAMADO=<?php echo $linha_chamado['ID_CHAMADO']; ?>">⨂</a> <!-- LINK BOTÃO PARA ENCAMINHAR O CONTEUDO DA LINHA PARA EXCLUSÃO -->
                        </td>

                    </tr>

                <?php } ?>



                </table>

                <img class="logo_categoria" src="../assets/logo (2).png">



            </section>
        </div>
    </main>



</body>

</html>