<?php header("Content-type: text/css"); 

session_start();

if (!isset($_SESSION['email'])) { // IDENTIFICA SE USUARIO FEZ O LOGUIN, SE NÃO TIVER FEITO ENVIE PARA TELA DE LOGUIN, NÃO PERMITINDO A ENTRADA SEM LOGUIN E SENHA.

    header('Location: ../index.php');
}

require_once("../php/conexao.php");

// CONSULTA PARA OBTER A LISTA DE CHAMADOS 
$consulta_tabela_chamado = "SELECT * FROM chamado";
$resultado_consulta_tabela_chamado = mysqli_query($conexao, $consulta_tabela_chamado);
$num_rows = mysqli_num_rows($resultado_consulta_tabela_chamado); // IDENTIFICA O NUMERO DE LINHAS DA TABELA 

?>

.conteiner9{
    background-color: rgba(0,0,0,.6);
    margin: 0% 10%;
    border-left: 1px solid whitesmoke;
    border-right: 1px solid whitesmoke;
    display: flex;
    flex-direction: column;
    align-items: center;

     <?php if($num_rows < 4){ ?>  <!--  CONDICIONAL PARA COLCOAR O VH SO QUANDO TIVER MAIS DE 3 LINHAS  -->
        height: 100vh;
        <?php } ?>
    
    gap: 20px;

}


