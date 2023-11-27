<?php 

 require_once("conexao.php");

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $select_categoria = mysqli_real_escape_string($conexao, $_POST['select_categoria']);

    $select_prioridade = mysqli_real_escape_string($conexao, $_POST['select_prioridade']);

    $descricao = mysqli_real_escape_string($conexao, $_POST["descrição_input"]);
   
    
}

$query1  = "INSERT INTO chamado (ID_TIPO_SERVICO, ID_PRIORIDADE, DESCRICAO_DO_CHAMADO) VALUES ('$select_categoria','$select_prioridade','$descricao')";
// $query2  = "INSERT INTO chamado (ID_PRIORIDADE) VALUES ('$select_prioridade')";
// $query3  = "INSERT INTO chamado (DESCRICAO_DO_CHAMADO) VALUES ('$descricao')";

$resultado1 = mysqli_query($conexao, $query1);
// $resultado2 = mysqli_query($conexao, $query2);
// $resultado3 = mysqli_query($conexao, $query3);

if ($resultado1) {
    
    header('Location: ../html/perfil.php');
    exit();
} else {
    echo " <h1>'Erro na inserção: </h1> " . mysqli_error($conexao);
}

mysqli_close($conexao);


?>