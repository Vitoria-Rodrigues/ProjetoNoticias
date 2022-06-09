<?php
//A sessão é iniciada e destruída. Voltando a página inicial.
    session_start();
    unset($_SESSION['login-session']);
    unset($_SESSION['senha-session']);
    session_destroy();
    header("Location: index.php")
?>