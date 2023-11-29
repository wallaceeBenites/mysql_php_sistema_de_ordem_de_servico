<?php 

 require_once("conexao.php");

 

    $id_chamado1= mysqli_real_escape_string($conexao, $_POST['input_id']);

    $select_status = mysqli_real_escape_string($conexao, $_POST['select_status']);

    $descricao = mysqli_real_escape_string($conexao, $_POST["descrição_input"]);
   
  
    


$query1  = "UPDATE chamado SET 
        DESCRICAO_DO_CHAMADO ='$descricao',
        ID_STATUS = '$select_status'
         WHERE ID_CHAMADO = '$id_chamado1' ";


$resultado_consulta = mysqli_query($conexao, $query1);


if ($resultado_consulta) {
    
    header('Location: ../html/perfil.php');
    exit();
} else {
    echo " <h1>'Erro na EDIÇÃO : </h1> " . mysqli_error($conexao);
}

mysqli_close($conexao);


?>