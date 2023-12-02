<?php 
    session_start();
    session_unset();
    session_destroy();


    header('Location: ../index.php');  // ENVIA PARA TELA DE LOGUIN APOS FEITO O LOGOUT 





?>