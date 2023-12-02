<?php 

require_once("conexao.php");

if(isset($_GET['ID_STATUS'])){ // RECBE ID DO STATUS A SER EXCLUIDO 

    $idUsuario = $_GET['ID_STATUS'];

    $consultaDelete = "DELETE FROM status WHERE ID_STATUS = $idUsuario";

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