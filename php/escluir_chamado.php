<?php 

require_once("conexao.php");

if(isset($_GET['ID_CHAMADO'])){

    $idUsuario = $_GET['ID_CHAMADO'];

    $consultaDelete = "DELETE FROM chamado WHERE ID_CHAMADO = $idUsuario";

    $resultadoDelete = mysqli_query($conexao, $consultaDelete);

    if($resultadoDelete){
        header('Location: ../html/perfil.php');
    } else {
        echo "erro ao excluir" . mysqli_error($conexao);
    }
}else{
    echo "Id não fornecido";
}

?>