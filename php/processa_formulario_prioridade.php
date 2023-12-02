<?php 

    require_once("conexao.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){ // RECEBE A INFORMAÇÃO DO FORMULARIO DE CRIAR PRIORIDADE 

        $nome = mysqli_real_escape_string($conexao, $_POST["prioridade"]);
        
    }

    $query  = "INSERT INTO prioridade (NOME_PRIORIDADE) VALUES ('$nome')";

    $resultado = mysqli_query($conexao, $query);

    if($resultado){
        header('Location: ../html/categoria.php'); // ENVIAR PARA TELA DE CRIAR CATEGORIA CASO TENHA DADO CERTO
        exit();
    } else {
        echo "Erro na inserção: ". mysqli_error($conexao);
    }

    mysqli_close($conexao);

?>