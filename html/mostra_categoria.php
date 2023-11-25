<?php

session_start();

if (!isset($_SESSION['email'])) {

    header('Location: ../index.php'); // evita usuario acessar usando a URL 
}


require_once("../php/conexao.php");

//consulta para obter a lista de categoria 
$consulta1 = "SELECT * FROM categoria";
$resultadoConsulta1 = mysqli_query($conexao, $consulta1);

// $num_rows = mysqli_num_rows($resultadoConsulta1);
//  echo $num_rows."Rows\n"; 

//consulta para obtr a lista prioridade 

$consulta2 = "SELECT * FROM prioridade";
$resultadoConsulta2 = mysqli_query($conexao, $consulta2);

//consulta para obtr a lista status 

$consulta3 = "SELECT * FROM status";
$resultadoConsulta3 = mysqli_query($conexao, $consulta3);

//consulta para obtr a lista status 

$consulta4 = "SELECT * FROM cargo_autorizacao";
$resultadoConsulta4 = mysqli_query($conexao, $consulta4);




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="../styles/style.css">
    <!-- <script src="" type="text/javascript"> </script>  Tentativa de Style display Property -->
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

             <?php  if(true){ ?>
                
                <div class="nenhum_resultado" id="aparece1">
                    <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo">
                    <p>Nenhum Resultado Encontrado</p>
                </div> <?php } else{   ?>
                <table id="tabela_categoria" class="tabela_categoria">
                    <tr class="tabela_categoria_linha">
                        <th> Id </th>
                        <th> Nome categoria </th>
                    </tr>
                    <tr>
                        <?php
                        while ($linha = mysqli_fetch_assoc($resultadoConsulta1)) {
                        ?>

                    <tr>
                        <td><?php echo $linha['ID_TIPO_SERVICO']; ?></td>
                        <td><?php echo htmlspecialchars($linha['NOME_AREA_SERVICO'], ENT_QUOTES, 'UTF-8');  ?></td>
                    </tr>

                <?php } ?>

                




                </table>
                
                     <?php    } ?>

                <table id="tabela_prioridade" class="tabela_categoria">
                    <tr class="tabela_categoria_linha">
                        <th> Id </th>
                        <th>Nome Prioridade</th>
                    </tr>

                    <?php
                    while ($linha2 = mysqli_fetch_assoc($resultadoConsulta2)) {
                    ?>

                        <tr>
                            <td><?php echo $linha2['ID_PRIORIDADE']; ?></td>
                            <td><?php echo htmlspecialchars($linha2['NOME_PRIORIDADE'], ENT_QUOTES, 'UTF-8');  ?></td>
                        </tr>

                    <?php } ?>




                </table>

                <!-- <div class="nenhum_status" id="aparece2">
                    <img class="lupa_imagem" src="../assets/lupa.png" alt="logotipo">
                    <p>Nenhum Resultado Encontrado</p>
                </div> -->

                <table id="tabela_categoria" class="tabela_categoria">
                    <tr class="tabela_categoria_linha">
                        <th> Id </th>
                        <th> Nome Status </th>
                    </tr>
                    <tr>
                        <?php
                        while ($linha = mysqli_fetch_assoc($resultadoConsulta3)) {
                        ?>

                    <tr>
                        <td><?php echo $linha['ID_STATUS']; ?></td>
                        <td><?php echo htmlspecialchars($linha['NOME_STATUS'], ENT_QUOTES, 'UTF-8');  ?></td>
                    </tr>

                <?php } ?>


                </table> 
                
                <table id="tabela_prioridade" class="tabela_categoria">
                    <tr class="tabela_categoria_linha">
                        <th> Id </th>
                        <th>Nome Cargo</th>
                    </tr>

                    <?php
                    while ($linha4 = mysqli_fetch_assoc($resultadoConsulta4)) {
                    ?>

                        <tr>
                            <td><?php echo $linha4['ID_CARGO']; ?></td>
                            <td><?php echo htmlspecialchars($linha4['NOME_CARGO'], ENT_QUOTES, 'UTF-8');  ?></td>
                        </tr>

                    <?php } ?>




                </table>

            </div>

            

            <a class="link_visualizar" href="categoria.php">Votlar </a>


        </div>

    </main>





</body>



</html>