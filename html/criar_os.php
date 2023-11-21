<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa de Sugestões</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>

    <header class="cabecalho">
        <nav class="cabecalho_menu ">

            <a class="cabecalho__menu__link" href="perfil.php"> Home </a>
            <a class="cabecalho__menu__link" href="criar_os.php"> Abrir Chamado </a>
            <a class="cabecalho__menu__link" href=""> Sair </a>

        </nav>
    </header>



    <main class="perfil">

        <div class="conteiner2">

            <Section class="criar_chamado">
                <img class="logo_chamado" src="../assets/logo (2).png">
                <h1>Preencha as informações para criar o CHAMADO. </h1>

                <div class="tipo_servico_prioridade">
                    <div class="tipo_servico">
                        <h3 class="tipo_servico_prioridade_subtitulo">Tipo de serviço :</h3>
                        <select class="chamado_select" name="select">
                            <option value="1" selected>Hardware</option>
                            <option value="2"> software </option>
                            <option value="3">infraestrutura</option>
                        </select>
                    </div>

                    <div class="prioridade">
                        <h3 class="tipo_servico_prioridade_subtitulo">Prioridade:</h3>
                        <select class="chamado_select" name="select">
                            <option value="1">Alta Prioridade</option>
                            <option value="2">Media Prioridade</option>
                            <option value="3" selected>Baixa Prioridade</option>
                        </select>
                    </div>
                </div>

                <div class="descricao">

                    <textarea class="descricao_textarea" type="text" name="" id="" rows="10" cols="50"
                        placeholder="Faça uma descrição do problema.."></textarea>
                    <input class="descricao_bottom" type="button" value="Criar Chamado">




                </div>




            </Section>
            <div class="minha_redes">
                <h4>Seja claro na descrição do problema, o não entendimento do problema ocasionara o cancelamento do
                    chamado. Qualquer dúvida entrar em contato pelo WhatsApp (61) 98206-9825.</h4>

            </div>


        </div>

    </main>



</body>

</html>