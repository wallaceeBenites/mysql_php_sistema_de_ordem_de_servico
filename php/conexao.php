<?php  
// CREDENCIAIS
$host = 'localhost';
$usuario = 'root';
$senha = "";
$banco = "ti_os";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);


if(!$conexao){
    die("Falha na conexão" . mysqli_connect_error()); // CASO TENHA FALHA NA CREDENCIAIS 
}





?>