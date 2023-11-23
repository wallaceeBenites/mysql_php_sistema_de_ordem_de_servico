<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <header class="cabecalho">
        <nav class="cabecalho_menu ">

            <a class="cabecalho__menu__link" href="perfil.php"> Home </a>
            <a class="cabecalho__menu__link" href="criar_os.php"> Abrir Chamado </a>
            <a class="cabecalho__menu__link" href="../php/logout.php"> Sair </a>

        </nav>
    </header>



    <main class="perfil">



        <div class="conteiner3">


            <img class="logo_categoria" src="../assets/logo (2).png">
            <h1 class="config_titulo">Configurar Opções do Chamado</h1>
            <div class="config_form">

                <form class="categoria" id="" action="../php/processa_formulario_categoria.php" method="post">

                    <label>
                        <input class="categoria_input" type="text" name="categoria" placeholder="Nova Tipo de serviço :">
                    </label>

                    <button class="categoria_buttom" type="submit" name="bt_categoria">Inserir Categoria</button>

                </form>
                <form class="prioridade_form" id="" action="../php/processa_formulario_prioridade.php" method="post">
                    <label>
                        <input class="categoria_input" type="text" name="prioridade" placeholder="Nova Tipo de Prioridade :">
                    </label>

                    <button class="categoria_buttom" type="submit" name="bt_prioridade">Inserir Prioridade</button>

                </form>

            </div>

        </div>

    </main>



</body>

</html>