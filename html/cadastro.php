<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de serviço</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <form class="cadastro_form" id="" method="post" action="../php/processa_formulario_cadastro.php">
    <main class="pagina">
    
        <section class="pagina_loguin_cadastro"> 

            <img class="pagina_loguin_logo" src="../assets/logo (2).png">
            
            <input class="pagina_loguin_input" name="cadastro_input_name" type="text" placeholder="Nome de Usuário">

            <input class="pagina_loguin_input" name="cadastro_input_email" type="email" placeholder="Email">

            <input class="pagina_loguin_input" name="cadastro_input_senha" type="password" placeholder="Senha">

            <input class="pagina_loguin_input" name="cadastro_input_telefone" type="tel" placeholder="Telefone">

            <button class="pagina_loguin_bottom" type="submit" name="bt_criar_conta">CRIAR</button>
            
            
            <a class="cadastro" href="../index.php">Já tem Conta? Entrar </a>
        </section>
    </main>
    </form>
</body>
</html>