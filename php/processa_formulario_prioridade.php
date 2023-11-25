<?php 

    require_once("conexao.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = mysqli_real_escape_string($conexao, $_POST["prioridade"]);
        
    }

    $query  = "INSERT INTO prioridade (NOME_PRIORIDADE) VALUES ('$nome')";

    $resultado = mysqli_query($conexao, $query);

    if($resultado){
        header('Location: ../html/categoria.php');
        exit();
    } else {
        echo "Erro na inserção: ". mysqli_error($conexao);
    }

    mysqli_close($conexao);

?>