<?php 

 require_once("conexao.php");

 if ($_SERVER["REQUEST_METHOD"] == "POST") {  // RECEBE A INFORMAÇÃO DO FORMULARIO DE CRIAR CHAMADO 

    $select_categoria = mysqli_real_escape_string($conexao, $_POST['select_categoria']);

    $select_prioridade = mysqli_real_escape_string($conexao, $_POST['select_prioridade']);

    $descricao = mysqli_real_escape_string($conexao, $_POST["descrição_input"]);
   
    $status_chamado = 6;

    
    $data_atual = date('d/m/Y H:i:s', strtotime('-4 hour'));

    $usuarioo = 8;

    
}

$query1  = "INSERT INTO chamado (ID_TIPO_SERVICO, ID_PRIORIDADE, DESCRICAO_DO_CHAMADO, ID_STATUS, DATA_DE_ABERTURA, ID_USUARIO) VALUES ('$select_categoria','$select_prioridade','$descricao','$status_chamado','$data_atual','$usuarioo')";


$resultado1 = mysqli_query($conexao, $query1);


if ($resultado1) {
    
    header('Location: ../html/perfil.php'); // ENVIAR PARA TELA HOME CASO TENHA DADO CERTO
    exit();
} else {
    echo " <h1>'Erro na inserção: </h1> " . mysqli_error($conexao);
}

mysqli_close($conexao);


?>