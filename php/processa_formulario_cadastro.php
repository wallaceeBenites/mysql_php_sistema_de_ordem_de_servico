<?php 
    require_once("conexao.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = mysqli_real_escape_string($conexao, $_POST["cadastro_input_name"]);
        $email = mysqli_real_escape_string($conexao, $_POST["cadastro_input_email"]);
        $senha_us = mysqli_real_escape_string($conexao, $_POST["cadastro_input_senha"]);
        $telefone = mysqli_real_escape_string($conexao, $_POST["cadastro_input_telefone"]);
        $data_atual = date('d/m/Y');
        $cargo = 3;
        
    }

    $query  = "INSERT INTO usuario (NOME,EMAIL,SENHA,TELEFONE,DATA_DE_CADASTRO,ID_CARGO) VALUES ('$nome','$email',' $senha_us','$telefone','$data_atual','$cargo')";

    $resultado = mysqli_query($conexao, $query);

    if($resultado){
        header('Location: ../index.php');
    exit();
    } else {
        echo "Erro na inserção: ". mysqli_error($conexao);
    }

    mysqli_close($conexao);

?>