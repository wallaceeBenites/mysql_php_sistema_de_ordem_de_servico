<?php 

 require_once("conexao.php");

 

    $id_cargo= mysqli_real_escape_string($conexao, $_POST['input_id']); // RECEBE A INFORMAÇÃO DO INPUT OCULTO  DE EDIÇÃO DE CHAMADO 

    $nome_cargo = mysqli_real_escape_string($conexao, $_POST["input_cargo"]); // RECEBE A INFORMAÇÃO DO FORMULARIO DE EDIÇÃO DE CHAMADO 
   
  
    


$query1  = "UPDATE cargo_autorizacao SET 
        NOME_CARGO ='$nome_cargo'
         WHERE ID_CARGO = '$id_cargo' "; // ATUALIZA AS INFORMAÇÕES USANDO REFERENCIA O ID 


$resultado_consulta = mysqli_query($conexao, $query1);


if ($resultado_consulta) {
    
    header('Location: ../html/mostra_categoria.php');  // ENVIAR PARA TELA HOME CASO TENHA DADO CERTO
    exit();
} else {
    echo " <h1>'Erro na EDIÇÃO : </h1> " . mysqli_error($conexao);
}

mysqli_close($conexao);


?>