<?php
require_once("./php/conexao.php");

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
        <form class="pagina_loguin" action="" method="POST">




            <img class="pagina_loguin_logo" src="assets/logo (2).png">

            <label>
                <input class="pagina_loguin_input" type="email" name="email" placeholder="Email" required>
            </label>
            <label>
                <input class="pagina_loguin_input" type="password" name="senha" placeholder="Senha" required>
            </label>


            <?php if (isset($_POST['bt_logar'])) { // CONDICIONAL QUE VERIFICA SE EXISTE ALGUMA COISA SENDO ENVIADO PELO FORMULARIO 

                $email = mysqli_real_escape_string($conexao, $_POST["email"]); // EVITA MYSQL INJECTION DOS INPUTS 
                $senha = mysqli_real_escape_string($conexao, $_POST["senha"]); // EVITA MYSQL INJECTION DOS INPUTS

                $sql_valida = "SELECT * FROM usuario WHERE EMAIL = '$email' AND SENHA = '$senha'"; // PESQUISA USUARIO CORRESPONDENTE AO DADOS INSERIOS NO INPUT DE LOGUIN E SENHA 
                $resultado_sql_valida = mysqli_query($conexao, $sql_valida);
                $num_rows = mysqli_num_rows($resultado_sql_valida); // IDENTIFICA O NUMERO DE LINHAS DA PESQUISA, SE NÃO TIVER NENHUM USUARIO COM ESSAS INFORMAÇÕES DEVOLVE 0 

                if ($num_rows == 1) {   // COMPARA A TENTATIVA DE LOGUIN COM AS INFORMAÇÕES VINDAS DO BANCO 

                    if(!isset($_SESSION)){ // SE NÃO TIVE SESSION 
                        session_start(); // INICIA SESSION
                    }

                    $usuario_logado = mysqli_fetch_assoc($resultado_sql_valida); // PEGA TODAS A INFORMAÇÕES DO USUARIO 

                    $_SESSION['nome'] = $usuario_logado['NOME']; // JOGA AS INFORMAÇÕES DO USUARIO LOGADO NA VARIAVEL GLOBAL 

                    $_SESSION['email'] = $usuario_logado['EMAIL'];// JOGA AS INFORMAÇÕES DO USUARIO LOGADO NA VARIAVEL GLOBAL 

                    $_SESSION['id_cargo'] = $usuario_logado['ID_CARGO'];// JOGA AS INFORMAÇÕES DO USUARIO LOGADO NA VARIAVEL GLOBAL 

                    $_SESSION['telefone'] = $usuario_logado['TELEFONE'];// JOGA AS INFORMAÇÕES DO USUARIO LOGADO NA VARIAVEL GLOBAL
                    
                    $_SESSION['data_criacao'] = $usuario_logado['DATA_DE_CADASTRO'];// JOGA AS INFORMAÇÕES DO USUARIO LOGADO NA VARIAVEL GLOBAL

                    $_SESSION['id_usuario'] = $usuario_logado['ID_USUARIO'];// JOGA AS INFORMAÇÕES DO USUARIO LOGADO NA VARIAVEL GLOBAL

                        
                    header('location: ./html/perfil.php'); // CASO VERDADEIRO ENVIAR PARA PAGINA HOME 

                }else{ ?>

                    <p class="msg_senha_errada">Email ou Senha Incorretos</p>

            <?php  } 
                } ?>
            

            <button class="pagina_loguin_bottom" type="submit" name="bt_logar">ENTRAR</button>

            <a class="cadastro" href="html/cadastro.php">Criar Conta</a>

        </form>

    </main>

</body>

</html>