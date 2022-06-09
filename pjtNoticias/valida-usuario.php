<?php
    //Validação de usuário, se o usuário for autorizado ele vai para a area-restrita,
    //Se não for autorizado, ele volta a página inicial.
    $login = $_POST ['tLogin'];
    $senha = $_POST ['tSenha'];

    if(($login == 'adm') && ($senha == '123')){
        session_start();
        $_SESSION ['login-session'] = $login;
        $_SESSION ['senha-session'] = $senha;
        header("Location: area-restrita/index-area-restrita.php");
    }
    else{
        header("Location: index.php");
    }
?>