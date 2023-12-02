<?php
require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // RECEBE A INFORMAÇÃO DO FORMULARIO DE CRIAR CARGO 

    $nome = mysqli_real_escape_string($conexao, $_POST["cargo"]);
}

$query  = "INSERT INTO cargo_autorizacao (NOME_CARGO) VALUES ('$nome')";

$resultado = mysqli_query($conexao, $query);

if ($resultado) {
    
    header('Location: ../html/categoria.php'); // ENVIAR PARA TELA DE CRIAR CATEGORIA CASO TENHA DADO CERTO 
    exit();
} else {
    echo " <h1>'Erro na inserção: </h1> " . mysqli_error($conexao);
}

mysqli_close($conexao);


?>
