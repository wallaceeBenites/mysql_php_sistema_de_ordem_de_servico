<?php 

 require_once("conexao.php");

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $descricao = mysqli_real_escape_string($conexao, $_POST["descrição_input"]);
    
}

$query  = "INSERT INTO chamado (DESCRICAO_DO_CHAMADO) VALUES ('$descricao')";

$resultado = mysqli_query($conexao, $query);

if ($resultado) {
    
    header('Location: ../html/perfil.php');
    exit();
} else {
    echo " <h1>'Erro na inserção: </h1> " . mysqli_error($conexao);
}

mysqli_close($conexao);


?>