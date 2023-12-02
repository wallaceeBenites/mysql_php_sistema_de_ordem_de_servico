<?php 

 require_once("conexao.php");

 

    $id_chamado1= mysqli_real_escape_string($conexao, $_POST['input_id']); // RECEBE A INFORMAÇÃO DO INPUT OCULTO  DE EDIÇÃO DE CHAMADO 

    $select_status = mysqli_real_escape_string($conexao, $_POST['select_status']); // RECEBE A INFORMAÇÃO DO FORMULARIO DE EDIÇÃO DE CHAMADO 

    $descricao = mysqli_real_escape_string($conexao, $_POST["descrição_input"]); // RECEBE A INFORMAÇÃO DO FORMULARIO DE EDIÇÃO DE CHAMADO 
   
  
    


$query1  = "UPDATE chamado SET 
        DESCRICAO_DO_CHAMADO ='$descricao',
        ID_STATUS = '$select_status'
         WHERE ID_CHAMADO = '$id_chamado1' "; // ATUALIZA AS INFORMAÇÕES USANDO REFERENCIA O ID 


$resultado_consulta = mysqli_query($conexao, $query1);


if ($resultado_consulta) {
    
    header('Location: ../html/perfil.php');  // ENVIAR PARA TELA HOME CASO TENHA DADO CERTO
    exit();
} else {
    echo " <h1>'Erro na EDIÇÃO : </h1> " . mysqli_error($conexao);
}

mysqli_close($conexao);


?>