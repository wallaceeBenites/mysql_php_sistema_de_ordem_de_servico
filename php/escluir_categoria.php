<?php 

require_once("conexao.php");

if(isset($_GET['ID_TIPO_SERVICO'])){

    $idUsuario = $_GET['ID_TIPO_SERVICO'];

    $consultaDelete = "DELETE FROM categoria WHERE ID_TIPO_SERVICO = $idUsuario";

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