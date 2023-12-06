<?php 

 require_once("conexao.php");

 

    $id_usuario= mysqli_real_escape_string($conexao, $_POST['input_id']); // RECEBE A INFORMAÇÃO DO INPUT OCULTO  DE EDIÇÃO DE CHAMADO 

    $select_cargo = mysqli_real_escape_string($conexao, $_POST['select_cargo']); // RECEBE A INFORMAÇÃO DO FORMULARIO DE EDIÇÃO DE CHAMADO 

    $name = mysqli_real_escape_string($conexao, strtoupper($_POST["cadastro_input_name"])); // RECEBE A INFORMAÇÃO DO FORMULARIO DE EDIÇÃO DE CHAMADO 

    $email = mysqli_real_escape_string($conexao, $_POST["cadastro_input_email"]); // RECEBE A INFORMAÇÃO DO FORMULARIO DE EDIÇÃO DE CHAMADO 

    $senha = mysqli_real_escape_string($conexao, $_POST["cadastro_input_senha"]); // RECEBE A INFORMAÇÃO DO FORMULARIO DE EDIÇÃO DE CHAMADO 

    $telefone = mysqli_real_escape_string($conexao, $_POST["cadastro_input_telefone"]); // RECEBE A INFORMAÇÃO DO FORMULARIO DE EDIÇÃO DE CHAMADO 
   
  
    


$query1  = "UPDATE usuario SET 
        ID_CARGO ='$select_cargo',
        NOME = '$name',
        EMAIL = '$email',
        SENHA = '$senha',
        TELEFONE = '$telefone'
         WHERE ID_USUARIO  = '$id_usuario' "; // ATUALIZA AS INFORMAÇÕES USANDO REFERENCIA O ID 


$resultado_consulta = mysqli_query($conexao, $query1);


if ($resultado_consulta) {
    
    header('Location: ../html/administra_usuarios.php');  // ENVIAR PARA TELA administra usuarios CASO TENHA DADO CERTO
    exit();
} else {
    echo " <h1>'Erro na EDIÇÃO : </h1> " . mysqli_error($conexao);
}

mysqli_close($conexao);


?>