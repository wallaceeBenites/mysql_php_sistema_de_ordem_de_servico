<?php

session_start();

if (!isset($_SESSION['email'])) { // IDENTIFICA SE USUARIO FEZ O LOGUIN, SE NÃO TIVER FEITO ENVIE PARA TELA DE LOGUIN, NÃO PERMITINDO A ENTRADA SEM LOGUIN E SENHA.

    header('Location: ../index.php');
}

require_once("../php/conexao.php");

// CONSULTA PARA OBTER A LISTA DE CHAMADOS 
$consulta_tabela_chamado5 = "SELECT * FROM chamado";
$resultado_consulta_tabela_chamado5 = mysqli_query($conexao, $consulta_tabela_chamado5);
$num_rows5 = mysqli_num_rows($resultado_consulta_tabela_chamado5); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 



// CONSULTA PARA OBTER A LISTA DE CHAMADOS COM OCORRENCIA "Aguardando Execução" 
$consulta_tabela_chamado = "SELECT * FROM chamado WHERE ID_STATUS = '6'";
$resultado_consulta_tabela_chamado = mysqli_query($conexao, $consulta_tabela_chamado);
$num_rows = mysqli_num_rows($resultado_consulta_tabela_chamado); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 

// CONSULTA PARA OBTER A LISTA DE CHAMADOS COM OCORRENCIA "Cancelada" 
$consulta_tabela_chamado2 = "SELECT * FROM chamado WHERE ID_STATUS = '10'";
$resultado_consulta_tabela_chamado2 = mysqli_query($conexao, $consulta_tabela_chamado2);
$num_rows2 = mysqli_num_rows($resultado_consulta_tabela_chamado2); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 

// CONSULTA PARA OBTER A LISTA DE CHAMADOS COM OCORRENCIA "Em Execução" 
$consulta_tabela_chamado3 = "SELECT * FROM chamado WHERE ID_STATUS = '11'";
$resultado_consulta_tabela_chamado3 = mysqli_query($conexao, $consulta_tabela_chamado3);
$num_rows3 = mysqli_num_rows($resultado_consulta_tabela_chamado3); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 

// CONSULTA PARA OBTER A LISTA DE CHAMADOS COM OCORRENCIA "Concluído" 
$consulta_tabela_chamado4 = "SELECT * FROM chamado WHERE ID_STATUS = '12'";
$resultado_consulta_tabela_chamado4 = mysqli_query($conexao, $consulta_tabela_chamado4);
$num_rows4 = mysqli_num_rows($resultado_consulta_tabela_chamado4); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 



?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de serviço</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

            
            <h1 class="config_titulo">Relatorio Geral de Status</h1>
            <h3> Numero Total de Chamados <?php echo $num_rows5; ?> </h3>

            <div class="grafico">

                <canvas id="grafico"></canvas>

            </div>


            <script>
                const ctx = document.getElementById('grafico');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Aguardando Execução', 'Cancelado', 'Em Execução', 'Concluído', ],
                        datasets: [{
                            label: 'Status',
                            data: [<?php echo $num_rows; ?>, <?php echo $num_rows2; ?>, <?php echo $num_rows3; ?>, <?php echo $num_rows4; ?>],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>






        </div>
    </main>



</body>

</html>