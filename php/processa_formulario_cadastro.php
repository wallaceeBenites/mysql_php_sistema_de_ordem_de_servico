<?php
require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = mysqli_real_escape_string($conexao, strtoupper($_POST["cadastro_input_name"]));
    $email = mysqli_real_escape_string($conexao, $_POST["cadastro_input_email"]);
    $senha_us = mysqli_real_escape_string($conexao, $_POST["cadastro_input_senha"]); // RECEBE AS INFORMAÇÕES DO FORMULARIO DE CADASTRO 
    $telefone = mysqli_real_escape_string($conexao, $_POST["cadastro_input_telefone"]);
    $data_atual = date('d/m/Y');
    $cargo = 3;


    $sql_valida_email = "SELECT * FROM usuario WHERE EMAIL = '$email'"; // PESQUISA SE O EMAIL INFORMADO JA FOI CADASTRADO OU NÃO 
    $resultado_sql_valida_email = mysqli_query($conexao, $sql_valida_email);
    $num_rows1 = mysqli_num_rows($resultado_sql_valida_email); // IDENTIFICA O NUMERO DE LINHAS DA PESQUISA, SE NÃO TIVER NENHUM USUARIO COM ESSAS INFORMAÇÕES DEVOLVE 0 

    if ($num_rows1 > 0) {  // CASO O USUARIO ESTEJA TENTANDO CADASTRA UM EMAIL QUE JA ESTA SENDO USADO

        die('<script type="text/javascript">
        alert("Email Informado Já Está Em Uso!");
        window.location.href = "../html/cadastro.php";
        </script>');
    }

    $sql_valida_telefone = "SELECT * FROM usuario WHERE TELEFONE = '$telefone'"; // PESQUISA SE O TELEFONE INFORMADO JA FOI CADASTRADO OU NÃO 
    $resultado_sql_valida_telefone = mysqli_query($conexao, $sql_valida_telefone);
    $num_rows2 = mysqli_num_rows($resultado_sql_valida_telefone); // IDENTIFICA O NUMERO DE LINHAS DA PESQUISA, SE NÃO TIVER NENHUM USUARIO COM ESSAS INFORMAÇÕES DEVOLVE 0 

    if ($num_rows2 > 0) {  // CASO O USUARIO ESTEJA TENTANDO CADASTRA UM TELEFONE QUE JA ESTA SENDO USADO

        die('<script type="text/javascript">
        alert("Telefone Informado Já Está Em Uso!");
        window.location.href = "../html/cadastro.php";
        </script>');
    }

    $sql_valida_nome = "SELECT * FROM usuario WHERE NOME = '$nome'"; // PESQUISA SE O NOME DE USUARIO INFORMADO JA FOI CADASTRADO OU NÃO 
    $resultado_sql_valida_nome = mysqli_query($conexao, $sql_valida_nome);
    $num_rows3 = mysqli_num_rows($resultado_sql_valida_nome); // IDENTIFICA O NUMERO DE LINHAS DA PESQUISA, SE NÃO TIVER NENHUM USUARIO COM ESSAS INFORMAÇÕES DEVOLVE 0 

    if ($num_rows3 > 0) {  // CASO O USUARIO ESTEJA TENTANDO CADASTRA UM NOME DE USUARIO QUE JA ESTA SENDO USADO

        die('<script type="text/javascript">
        alert("Nome De Usuario Informado Já Está Em Uso!");
        window.location.href = "../html/cadastro.php";
        </script>');
    }
}

$query  = "INSERT INTO usuario (NOME,EMAIL,SENHA,TELEFONE,DATA_DE_CADASTRO,ID_CARGO) VALUES ('$nome','$email','$senha_us','$telefone','$data_atual','$cargo')"; // ENVIA PARA O BANCO DE DADOS 

$resultado = mysqli_query($conexao, $query);

if ($resultado) {

    echo '<script type="text/javascript">
        alert("Cadastro Realizado Com Sucesso! Você Sera Direcionado Para Tela De Loguin!");
        window.location.href = "../index.php";
    </script>';
    // header('Location: ../index.php');  // ENVIA PARA TELA DE LOGAR APOS CRIAR O PERFIL 
    // exit();
} else {
    echo "Erro na inserção: " . mysqli_error($conexao);
}

mysqli_close($conexao);
