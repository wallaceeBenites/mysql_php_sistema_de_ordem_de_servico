<?php 

require_once("conexao.php");

if(isset($_GET['ID_PRIORIDADE'])){ // RECBE ID DA PRIORIDADE A SER EXCLUIDA

    $idUsuario = $_GET['ID_PRIORIDADE'];

    $consultaDelete = "DELETE FROM prioridade WHERE ID_PRIORIDADE = $idUsuario";

    $resultadoDelete = mysqli_query($conexao, $consultaDelete);

    if($resultadoDelete){
        header('Location: ../html/mostra_categoria.php');
    } else {
        echo "erro ao excluir" . mysqli_error($conexao);
    }
}else{
    echo "Id não fornecido";
}

?>