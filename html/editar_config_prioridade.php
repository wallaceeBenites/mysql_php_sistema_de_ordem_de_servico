<?php
session_start();

if (!isset($_SESSION['email'])) {  // IDENTIFICA SE USUARIO FEZ O LOGUIN, SE NÃO TIVER FEITO ENVIE PARA TELA DE LOGUIN, NÃO PERMITINDO A ENTRADA SEM LOGUIN E SENHA. 

    header('Location: ../index.php');
}


require_once("../php/conexao.php");

//////////////////////////////////// PARTE RESPONSAVEL PELA EDIÇÃO DA PRIORIDADE  ////////////////////////////////////////////////////////////////

$id_prioridade = @$_GET['ID_PRIORIDADE'];   // IDENTIFICA O ID DO USUARIO, SE ELE EXISTIR ELE ENTRA NA CONDICIONAL "if ($id_chamado)"


if ($id_prioridade) {
    $consulta = "SELECT * FROM prioridade WHERE ID_PRIORIDADE = '$id_prioridade'"; // CONSULTA PARA EDITAR 

    $resultadoconsulta = mysqli_query($conexao, $consulta);

    $linha_input = mysqli_fetch_assoc($resultadoconsulta);  // VARIAVEL PARA PODER PUXA AS INFORMAÇÕES DO CHAMADO QUE SERA EDITADO 
}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de serviço</title>
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

                <a class="cabecalho__menu__link" href="graficos.php"> Relatorio </a> <!-- LINK PARA Sair(logout.php) -->

            <?php } ?>


            <a class="cabecalho__menu__link" href="../php/logout.php"> Sair </a> <!-- LINK PARA Sair(logout.php) -->


        </nav>
    </header>



    <main class="perfil">

        <div class="conteiner">

            <form id="" method="post" action="../php/up_prioridade.php">



                <Section class="edição_usuario">

                    <img class="logo_chamado" src="../assets/logo_editar.png">

                    <h1> Edita Informações </h1>

                    <h3 class="tipo_servico_prioridade_subtitulo">Edição :</h3>

                    <input class="pagina_loguin_input" name="input_prioridade" type="text" placeholder="Nome" maxlength="100" value="<?php echo @$linha_input['NOME_PRIORIDADE']; ?>" required>
                    <button class="descricao_bottom" type="submit" name="bt_editar_usuario">Editar</button>

                    <a class="link_visualizar" href="mostra_categoria.php"> VOLTAR </a>

                </Section>


                <!-- INPUT OCULTO AO USUARIO(NÃO APARECE NO FRONT) RESPONSAVEL POR ENVIAR O ID DO CHAMADO PARA O "up_chamado.php" PARA QUE SEJA EDITADO O CHAMADO COM RESPECTIVO ID -->
                <input type="hidden" name="input_id" value="<?php echo @$linha_input['ID_PRIORIDADE']; ?>">

            </form>

        </div>

    </main>



</body>

</html>