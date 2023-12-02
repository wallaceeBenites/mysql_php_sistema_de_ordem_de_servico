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

                <?php if (isset($_POST['bt_logar'])) { // RECEBE AS INFORMAÇÕES DOS INPUTS DE LOGUIN E VALIDA 

                session_start(); // INICIA SESSION 

                $email = $_POST['email']; // ENVIA O CONTEUDO DO INPUT PARA VARIAVEL 
                $senha = $_POST['senha']; // ENVIA O CONTEUDO DO INPUT PARA VARIAVEL 

                $_SESSION['email'] = $email;

                if ($email == $email_bd && $senha == $senha_bd) {   // COMPARA A TENTATIVA DE LOGUIN COM AS INFORMAÇÕES VINDAS DO BANCO 

                    header('location: ./html/perfil.php'); // CASO VERDADEIRO ENVIAR PARA PAGINA HOME 
                } else { ?>
                    <p class="msg_senha_errada" >Email ou Senha Incorretos</p> <!-- CASO FALSO MANTE NA MESMA TELA E INFORMA QUE LOGUIN ESTA ERRADO  -->
              <?php  }
            } ?>

            <button class="pagina_loguin_bottom" type="submit" name="bt_logar">ENTRAR</button>

            <a class="cadastro" href="html/cadastro.php">Criar Conta</a>

        </form>
        
    </main>

</body>

</html>