<?php
require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = mysqli_real_escape_string($conexao, $_POST["cargo"]);
}

$query  = "INSERT INTO cargo_autorizacao (NOME_CARGO) VALUES ('$nome')";

$resultado = mysqli_query($conexao, $query);

if ($resultado) {
    
    header('Location: ../html/categoria.php');
    exit();
} else {
    echo " <h1>'Erro na inserção: </h1> " . mysqli_error($conexao);
}

mysqli_close($conexao);


?>
