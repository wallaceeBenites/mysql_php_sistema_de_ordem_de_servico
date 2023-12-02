<?php 

require_once("conexao.php");

if(isset($_GET['ID_CARGO'])){   // RECBE ID DO CARGO A SER EXCLUIDO 
  
    $idUsuario = $_GET['ID_CARGO'];

    $consultaDelete = "DELETE FROM cargo_autorizacao WHERE ID_CARGO =  $idUsuario";

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