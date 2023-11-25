<?php
session_start();

if (!isset($_SESSION['email'])) {

    header('Location: ../index.php'); // evita usuario acessar usando a URL 
}

require_once("../php/conexao.php");

//consulta para obter a lista de chamados
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

            <section class="pefil_chat">

                <img class="pefil_chat_foto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsV3qhbgKTZE4ZopMBX2Jt_nhkm0ekaOW9th80tqTnylU9v39zSoy5RxGCOcFdDOS7UCM&usqp=CAU">
                <div class="pefil_chat_info">
                    <h1 class="nome"> Wallace Ribeiro Benites</h1>

                    <h3 class="cargo">CARGO: ADM </h2>
                        <br>
                        <h4 class="info">

                            <?php
                            echo "Email: {$_SESSION['email']}  ";  // mostra o email da variavel email 
                            ?>

                        </h4>
                        <h4 class="info">Celular: (61)98206-9825</h4>
                        <h4 class="info">Data de Criação: 11/11/2000</h4>
                        <h4 class="info">ID : 01</h4>
                </div>

            </section>
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
                            <h4> Data de Abertura:</h4>
                        </td>
                        <td>
                            <h4> Hora de Abertura:</h4>
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
                            <h4> Descrição:</h4>
                    <tr>

                    <?php
                        while ($linha_chamado = mysqli_fetch_assoc($resultado_consulta_tabela_chamado)) {
                        ?>

                    <tr>
                        <td><?php echo htmlspecialchars($linha_chamado['ID_CHAMADO'], ENT_QUOTES, 'UTF-8');  ?></td>
                        <td><?php echo htmlspecialchars($linha_chamado['ID_USUARIO'], ENT_QUOTES, 'UTF-8');  ?></td>
                        <td><?php echo htmlspecialchars($linha_chamado['DATA_DE_ABERTURA'], ENT_QUOTES, 'UTF-8');  ?></td>
                        <td><?php echo htmlspecialchars($linha_chamado['HORA'], ENT_QUOTES, 'UTF-8');  ?></td>
                        <td><?php echo htmlspecialchars($linha_chamado['ID_TIPO_SERVICO'], ENT_QUOTES, 'UTF-8');  ?></td>
                        <td><?php echo htmlspecialchars($linha_chamado['ID_PRIORIDADE'], ENT_QUOTES, 'UTF-8');  ?></td>
                        <td><?php echo htmlspecialchars($linha_chamado['ID_STATUS'], ENT_QUOTES, 'UTF-8');  ?></td>
                        <td><?php echo htmlspecialchars($linha_chamado['DESCRICAO_DO_CHAMADO'], ENT_QUOTES, 'UTF-8');  ?></td>
                    </tr>

                <?php } ?>
 


                </table>

                <img class="logo_categoria" src="../assets/logo (2).png">



            </section>
        </div>
    </main>



</body>

</html>