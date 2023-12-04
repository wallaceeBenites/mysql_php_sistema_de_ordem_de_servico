<?php 

require_once("conexao.php");

if(isset($_GET['ID_USUARIO'])){ // RECBE ID DO USUARIO A SER EXCLUIDO 

    $idUsuario = $_GET['ID_USUARIO'];

    $consultaDelete = "DELETE FROM usuario WHERE ID_USUARIO = $idUsuario";

    $resultadoDelete = mysqli_query($conexao, $consultaDelete);

    if($resultadoDelete){
        header('Location: ../html/administra_usuarios.php');
    } else {
        echo "erro ao excluir" . mysqli_error($conexao);
    }
}else{
    echo "Id não fornecido";
}

?>