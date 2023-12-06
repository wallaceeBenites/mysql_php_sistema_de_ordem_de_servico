<?php
session_start();

if (!isset($_SESSION['email'])) {  // IDENTIFICA SE USUARIO FEZ O LOGUIN, SE NÃO TIVER FEITO ENVIE PARA TELA DE LOGUIN, NÃO PERMITINDO A ENTRADA SEM LOGUIN E SENHA. 

    header('Location: ../index.php');
}


require_once("../php/conexao.php");

// CONSULTA PARA OBTER A LISTA DE CATEGORIA PARA MOSTRAR NO SELECT 

$consulta1 = "SELECT * FROM cargo_autorizacao";
$resultado_da_consulta1 = mysqli_query($conexao, $consulta1);

//////////////////////////////////// PARTE RESPONSAVEL PELA EDIÇÃO DO USUARIO   ////////////////////////////////////////////////////////////////

$id_usuario = @$_GET['ID_USUARIO'];   // IDENTIFICA O ID DO USUARIO, SE ELE EXISTIR ELE ENTRA NA CONDICIONAL "if ($id_chamado)"


if ($id_usuario) {
    $consulta = "SELECT * FROM usuario WHERE ID_USUARIO = '$id_usuario'"; // CONSULTA PARA EDITAR 

    $resultadoconsulta = mysqli_query($conexao, $consulta);

    $linha_input = mysqli_fetch_assoc($resultadoconsulta);  // VARIAVEL PARA PODER PUXA AS INFORMAÇÕES DO CHAMADO QUE SERA EDITADO 
}



$consulta3 = "SELECT * FROM status";     // CONSULTA PARA OBTER A LISTA DE STATUS PARA MOSTRA NO SELECT  
$resultado_da_consulta3 = mysqli_query($conexao, $consulta3);

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

            <form id="" method="post" action="../php/up_usuario.php">



                <Section class="edição_usuario">

                    <img class="logo_chamado" src="../assets/logo_editar.png">

                    <h1> Edita Informações Do Usuario. </h1>

                    <h3 class="tipo_servico_prioridade_subtitulo">Cargo :</h3>

                    <select class="chamado_select" name="select_cargo"> <!-- SELECT PARA MOSTRA OPÇÕES DE CATEGORIA  -->

                        <?php while ($linha = mysqli_fetch_assoc($resultado_da_consulta1)) { ?>

                            <option value="<?php echo $linha['ID_CARGO']; ?>"> <!-- ENVIA ID CORRESPONDENTE AO NOME CATEGORIA -->

                                <?php echo htmlspecialchars($linha['NOME_CARGO'], ENT_QUOTES, 'UTF-8');  ?> <!-- MOSTRA NOME DA CATEGORIA  -->

                            </option>

                        <?php } ?>

                    </select>

                    <input class="pagina_loguin_input_nome" name="cadastro_input_name" type="text" placeholder="Nome de Usuário" maxlength="100" value="<?php echo @$linha_input['NOME']; ?>" required>

                    <input class="pagina_loguin_input" name="cadastro_input_email" type="email" placeholder="Email" maxlength="50" value="<?php echo @$linha_input['EMAIL']; ?>" required>

                    <input class="pagina_loguin_input" name="cadastro_input_senha" type="text" placeholder="Senha" maxlength="20" value="<?php echo @$linha_input['SENHA']; ?>" required>

                    <input class="pagina_loguin_input" id="telefone" name="cadastro_input_telefone" type="tel" placeholder="Telefone" maxlength="15" value="<?php echo @$linha_input['TELEFONE']; ?>" required>

                    <button onclick="escreve_alerta_chamado_editado()" class="descricao_bottom" type="submit" name="bt_editar_usuario">Editar Chamado</button>

                    <a class="link_visualizar" href="administra_usuarios.php"> VOLTAR </a>

                </Section>


                <!-- INPUT OCULTO AO USUARIO(NÃO APARECE NO FRONT) RESPONSAVEL POR ENVIAR O ID DO CHAMADO PARA O "up_chamado.php" PARA QUE SEJA EDITADO O CHAMADO COM RESPECTIVO ID -->
                <input type="hidden" name="input_id" value="<?php echo @$linha_input['ID_USUARIO']; ?>">

            </form>

        </div>

    </main>



</body>

</html>