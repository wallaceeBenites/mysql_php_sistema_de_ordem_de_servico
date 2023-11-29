<?php
session_start();

if (!isset($_SESSION['email'])) {

    header('Location: ../index.php');    // evita usuario acessar usando a URL 
}


require_once("../php/conexao.php");

////////////////////////////////////////////////////////////////////////////////////////////////////

$id_chamado = @$_GET['ID_CHAMADO'];


if($id_chamado) {
    $consulta = "SELECT * FROM chamado WHERE ID_CHAMADO = '$id_chamado'"; 

    $resultadoconsulta = mysqli_query($conexao, $consulta);          // consulta para editar 

    $linha_textarea = mysqli_fetch_assoc($resultadoconsulta);
}
/////////////////////////////////////////////////////////////////////////////////////////////////



//consulta para obter a lista de categoria 

$consulta1 = "SELECT * FROM categoria";
$resultado_da_consulta1 = mysqli_query($conexao, $consulta1);

//consulta para obtr a lista prioridade 

$consulta2 = "SELECT * FROM prioridade";
$resultado_da_consulta2 = mysqli_query($conexao, $consulta2);

//consulta para obtr a lista status 

$consulta3 = "SELECT * FROM status";
$resultado_da_consulta3 = mysqli_query($conexao, $consulta3);




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

    <header class="cabecalho">
        <nav class="cabecalho_menu ">

            <a class="cabecalho__menu__link" href="perfil.php"> Home </a>
            <a class="cabecalho__menu__link" href="criar_os.php"> Abrir Chamado </a>
            <a class="cabecalho__menu__link" href="categoria.php"> Configurações </a>
            <a class="cabecalho__menu__link" href="../php/logout.php"> Sair </a>

        </nav>
    </header>



    <main class="perfil">

        <div class="conteiner">

            <form id="" method="post"  <?php if(!$id_chamado){ ?> action="../php/processa_formulario_criar_os.php" <?php }else{ ?> action="../php/up_chamado.php"> <?php } ?> 

            

                <Section class="criar_chamado">
                    
                    <img class="logo_chamado" <?php if(!$id_chamado){ ?> src="../assets/logo (2).png" <?php } else { ?> src="../assets/logo_editar.png" <?php } ?> >

                    <h1><?php if(!$id_chamado){echo "Preencha as informações para criar o CHAMADO."; }else{ echo "Alterar Status e Descrição do CHAMADO."; }  ?>  </h1>

                    <div class="tipo_servico_prioridade">

                           <?php if(!$id_chamado){ ?>  <!--   diferenciar tela de criar chamado e de editar chamado  -->
                        <div class="tipo_servico">

                            <h3 class="tipo_servico_prioridade_subtitulo">Categoria :</h3>

                            <select class="chamado_select" name="select_categoria">

                                <?php while ($linha = mysqli_fetch_assoc($resultado_da_consulta1)) { ?>

                                    <option value="<?php echo $linha['ID_TIPO_SERVICO']; ?>">

                                        <?php echo htmlspecialchars($linha['NOME_AREA_SERVICO'], ENT_QUOTES, 'UTF-8');  ?>

                                    </option>

                                <?php } ?>

                            </select>

                        </div>

                        <div class="prioridade">

                            <h3 class="tipo_servico_prioridade_subtitulo">Prioridade:</h3>

                            <select class="chamado_select" name="select_prioridade">

                                <?php while ($linha = mysqli_fetch_assoc($resultado_da_consulta2)) { ?>

                                    <option value="<?php echo $linha['ID_PRIORIDADE']; ?>">

                                    <?php echo htmlspecialchars($linha['NOME_PRIORIDADE'], ENT_QUOTES, 'UTF-8');  ?>

                                    </option>


                                <?php } ?>


                            </select>

                        </div>

                        <?php } else{ ?>
                        <div class="prioridade">

                            <h3 class="tipo_servico_prioridade_subtitulo"> Status: </h3>

                            <select class="chamado_select" name="select_status">

                                <?php while ($linha = mysqli_fetch_assoc($resultado_da_consulta3)) { ?>

                                    <option value="<?php echo $linha['ID_STATUS']; ?>">

                                    <?php echo htmlspecialchars($linha['NOME_STATUS'], ENT_QUOTES, 'UTF-8');  ?>

                                    </option>


                                <?php } ?>


                            </select>

                        </div>

                        <?php } ?>

                    </div>

                    <div class="descricao">

                        <textarea maxlength="150" class="descricao_textarea" type="text" name="descrição_input" id="" rows="10" cols="50" placeholder=" Faça uma descrição do problema, Maximo 150 letras..."><?php echo @$linha_textarea['DESCRICAO_DO_CHAMADO']; ?></textarea>
                        

                        <?php if(!$id_chamado) { ?> <button class="descricao_bottom" type="submit" name="bt_editar_chamado">Criar Chamado</button>  <?php } 
                        else { ?> <a class="link_visualizar" href="perfil.php"> VOLTAR </a> <button class="descricao_bottom" type="submit" name="bt_criar_chamado">Editar Chamado</button>  <?php }  ?>
                       



                    </div>




                </Section>

                <div class="minha_redes">

                    <h4>Seja claro na descrição do problema, o não entendimento do problema ocasionara o cancelamento do
                        chamado. Qualquer dúvida entrar em contato pelo WhatsApp (61) 98206-9825.</h4>

                </div>
                    
                <!-- input pra enviar o id pro up_chamado.php -->
                <input type="hidden" name="input_id" value="<?php echo @$linha_textarea['ID_CHAMADO']; ?>"> 

            </form>

        </div>

    </main>



</body>

</html>