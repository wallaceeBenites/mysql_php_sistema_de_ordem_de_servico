<?php 
    require_once("conexao.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = mysqli_real_escape_string($conexao, $_POST["cadastro_input_name"]);
        $email = mysqli_real_escape_string($conexao, $_POST["cadastro_input_email"]);
        $senha_us = mysqli_real_escape_string($conexao, $_POST["cadastro_input_senha"]);
        $telefone = mysqli_real_escape_string($conexao, $_POST["cadastro_input_telefone"]);
        
    }

    $query  = "INSERT INTO usuario (NOME,EMAIL,SENHA,TELEFONE) VALUES ('$nome','$email',' $senha_us','$telefone')";

    $resultado = mysqli_query($conexao, $query);

    if($resultado){
        header('Location: ../index.php');
    exit();
    } else {
        echo "Erro na inserção: ". mysqli_error($conexao);
    }

    mysqli_close($conexao);

?>