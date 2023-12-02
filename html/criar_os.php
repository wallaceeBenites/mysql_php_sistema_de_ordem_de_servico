<?php
session_start();

if (!isset($_SESSION['email'])) {  // IDENTIFICA SE USUARIO FEZ O LOGUIN, SE NÃO TIVER FEITO ENVIE PARA TELA DE LOGUIN, NÃO PERMITINDO A ENTRADA SEM LOGUIN E SENHA. 

    header('Location: ../index.php');     
}


require_once("../php/conexao.php");

//////////////////////////////////// PARTE RESPONSAVEL PELA EDIÇÃO DO CHAMADO   ////////////////////////////////////////////////////////////////

$id_chamado = @$_GET['ID_CHAMADO'];   // IDENTIFICA O ID DO CHAMADO, SE ELE EXISTIR ELE ENTRA NA CONDICIONAL "if ($id_chamado)"


if ($id_chamado) {
    $consulta = "SELECT * FROM chamado WHERE ID_CHAMADO = '$id_chamado'"; // CONSULTA PARA EDITAR 

    $resultadoconsulta = mysqli_query($conexao, $consulta);           

    $linha_textarea = mysqli_fetch_assoc($resultadoconsulta);  // VARIAVEL PARA PODER PUXA AS INFORMAÇÕES DO CHAMADO QUE SERA EDITADO 
}

 

$consulta3 = "SELECT * FROM status";     // CONSULTA PARA OBTER A LISTA DE STATUS PARA MOSTRA NO SELECT  
$resultado_da_consulta3 = mysqli_query($conexao, $consulta3);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// CONSULTA PARA OBTER A LISTA DE CATEGORIA PARA MOSTRAR NO SELECT 

$consulta1 = "SELECT * FROM categoria";
$resultado_da_consulta1 = mysqli_query($conexao, $consulta1);

// CONSULTA PARA OBTER A LISTA DE PRIORIDADE PARA MOSTRAR NO SELECT 

$consulta2 = "SELECT * FROM prioridade";
$resultado_da_consulta2 = mysqli_query($conexao, $consulta2);





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

            <form id="" method="post" <?php if (!$id_chamado) { ?> action="../php/processa_formulario_criar_os.php" <?php } else { ?> action="../php/up_chamado.php"> <?php } ?>  <!-- CONDICIONAL PARA ENVIAR FORMULARIO PARA "processa_formulario_criar_os.php" CASO ESTEJA CRIANDO UM CHAMADO OU ENVIAR PARA "up_chamado.php" CASO ESTEJA EDITANDO UM CHAMADO  -->



            <Section class="criar_chamado">

                <img class="logo_chamado" <?php if (!$id_chamado) { ?> src="../assets/logo (2).png" <?php } else { ?> src="../assets/logo_editar.png" <?php } ?>> <!-- CONDICIONAL PARA MUDA A IMAGEM, QUANDO CRIAR CHAMADO MOSTRA "logo (2).png" E QUANDO EDITAR MOSTRAR "logo_editar.png"  -->

                <h1><?php if (!$id_chamado) {
                        echo "Preencha as informações para criar o CHAMADO.";    // CONDICIONAL PARA MUDA TITULO, QUANDO CRIAR CHAMADO MOSTRAR "Preencha as informações para criar o CHAMADO" E QUANDO E EDITAR MOSTRA "Alterar Status e Descrição do CHAMADO"
                    } else {
                        echo "Alterar Status e Descrição do CHAMADO.";
                    }  ?> </h1>

                <div class="tipo_servico_prioridade">

                    <?php if (!$id_chamado) { ?> <!-- CONDICIONAL PARA MUDAR OS SELECT, QUANDO CRIAR CHAMADO MOSTRA 2 SELECT DE Categoria E Prioridade E QUANDO EDITAR CHAMADO MOSTRA O SELECT DE Status -->
                        <div class="tipo_servico">

                            <h3 class="tipo_servico_prioridade_subtitulo">Categoria :</h3>

                            <select class="chamado_select" name="select_categoria">  <!-- SELECT PARA MOSTRA OPÇÕES DE CATEGORIA  -->

                                <?php while ($linha = mysqli_fetch_assoc($resultado_da_consulta1)) { ?> 

                                    <option value="<?php echo $linha['ID_TIPO_SERVICO']; ?>">  <!-- ENVIA ID CORRESPONDENTE AO NOME CATEGORIA -->

                                        <?php echo htmlspecialchars($linha['NOME_AREA_SERVICO'], ENT_QUOTES, 'UTF-8');  ?> <!-- MOSTRA NOME DA CATEGORIA  -->

                                    </option>

                                <?php } ?>

                            </select>

                        </div>


                        <div class="prioridade">

                            <h3 class="tipo_servico_prioridade_subtitulo">Prioridade:</h3>

                            <select class="chamado_select" name="select_prioridade"> <!-- SELECT PARA MOSTRA OPÇÕES DE PRIORIDADE  -->

                                <?php while ($linha = mysqli_fetch_assoc($resultado_da_consulta2)) { ?> <!-- LAÇO DE REPETIÇÃO PARA MOSTRA CONTEUDO DO SELECT PRIORIDADE  -->

                                    <option value="<?php echo $linha['ID_PRIORIDADE']; ?>"> <!-- ENVIA ID  CORRESPONDENTE AO NOME PRIORIDADE -->

                                        <?php echo htmlspecialchars($linha['NOME_PRIORIDADE'], ENT_QUOTES, 'UTF-8');  ?>  <!-- MOSTRA NOME DA PRIORIDADE  -->

                                    </option>

                                <?php } ?>

                            </select>

                        </div>




                    <?php } else { ?>  <!-- else DA CONDICIONAL PARA MUDAR OS SELECT, QUANDO CRIAR CHAMADO MOSTRA 2 SELECT DE Categoria E Prioridade E QUANDO EDITAR CHAMADO MOSTRA O SELECT DE Status -->
                        <div class="prioridade">

                            <h3 class="tipo_servico_prioridade_subtitulo"> Status: </h3>

                            <select class="chamado_select" name="select_status"> <!-- SELECT PARA MOSTRA OPÇÕES DE STATUS  -->

                                <?php while ($linha = mysqli_fetch_assoc($resultado_da_consulta3)) { ?> <!-- LAÇO DE REPETIÇÃO PARA MOSTRA CONTEUDO DO SELECT STATUS  -->

                                    <option value="<?php echo $linha['ID_STATUS']; ?>"> <!-- ENVIA ID  CORRESPONDENTE AO NOME STATUS -->

                                        <?php echo htmlspecialchars($linha['NOME_STATUS'], ENT_QUOTES, 'UTF-8');  ?> <!-- MOSTRA NOME DA STATUS  -->

                                    </option>


                                <?php } ?>


                            </select>

                        </div>

                    <?php } ?>

                </div>

                <div class="descricao">                                                                                                                                                          
                    <!-- TEXTAREA QUE ENVIAR DESCRIÇÃO DO CHAMADO OU TEXTO MODIFICADO CASO SEJA UMA EDIÇÃO  -->
                    <textarea maxlength="150" class="descricao_textarea" type="text" name="descrição_input" id="" rows="10" cols="50" placeholder=" Faça uma descrição do problema, Maximo 150 letras..."><?php echo @$linha_textarea['DESCRICAO_DO_CHAMADO']; ?></textarea>  <!--  @$linha_textarea SERVE PARA MOSTRA O TEXTO DO CHAMADO QUE VAI SER EDITADO -->

                     <!-- CONDICIONAL QUE MOSTRA BOTÃO DE CRIAR O CHAMADO QUANDO FOR CRIAR CHAMADO E BOTÃO EDITAR E LINK VOLTAR PARA QUANDO FOR EDITAR CHAMADO  -->                       
                    <?php if (!$id_chamado) { ?> <button class="descricao_bottom" type="submit" name="bt_editar_chamado">Criar Chamado</button> <?php } else { ?> <a class="link_visualizar" href="perfil.php"> VOLTAR </a> <button class="descricao_bottom" type="submit" name="bt_criar_chamado">Editar Chamado</button> <?php }  ?>




                </div>




            </Section>

            <div class="minha_redes">

                <h4>Seja claro na descrição do problema, o não entendimento do problema ocasionara o cancelamento do <!-- TEXTO PARA DA CREDIBILIDADE KKKKKKKK -->
                    chamado. Qualquer dúvida entrar em contato pelo WhatsApp (61) 98206-9825.</h4>

            </div>

             <!-- INPUT OCULTO AO USUARIO(NÃO APARECE NO FRONT) RESPONSAVEL POR ENVIAR O ID DO CHAMADO PARA O "up_chamado.php" PARA QUE SEJA EDITADO O CHAMADO COM RESPECTIVO ID -->
            <input type="hidden" name="input_id" value="<?php echo @$linha_textarea['ID_CHAMADO']; ?>"> 

            </form>

        </div>

    </main>



</body>

</html>