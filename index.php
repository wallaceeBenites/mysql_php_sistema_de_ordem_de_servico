<?php


$email_bd = "wallacepuck@gmail.com"; // Aqui sera um array conectado ao banco 
$senha_bd = "123"; // Aqui sera um array conectado ao banco


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ordem de serviço </title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <main class="pagina">
        <form class="pagina_loguin" action="index.php" method="POST">

            


            <img class="pagina_loguin_logo" src="assets/logo (2).png">

            <label>
                <input class="pagina_loguin_input" type="email" name="email" placeholder="EMAIL">
            </label>
            <label>
                <input class="pagina_loguin_input" type="password" name="senha" placeholder="Senha">
            </label>

                <?php if (isset($_POST['bt_logar'])) {

                session_start();

                $email = $_POST['email'];
                $senha = $_POST['senha'];

                $_SESSION['email'] = $email;

                if ($email == $email_bd && $senha == $senha_bd) {         // valida o loguin 

                    header('location: ./html/perfil.php');
                } else { ?>
                    <p class="msg_senha_errada" >Email ou Senha Incorretos</p>
              <?php  }
            } ?>

            <button class="pagina_loguin_bottom" type="submit" name="bt_logar">ENTRAR</button>

            <a class="cadastro" href="html/cadastro.php">Criar Conta</a>

        </form>
        <div id="senha_errada"> </div>
    </main>

</body>

</html>