<?php 
    session_start();
    session_unset();
    session_destroy();


    die('<script type="text/javascript">
        alert("Logout Realizado Com Sucesso!");
        window.location.href = "../index.php";
        </script>');





?>