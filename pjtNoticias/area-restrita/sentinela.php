<!--O arquivo sentinela filtra quem tem autorização para logar.
 Nesse caso, só poderão acessar o cadastro de noticias quem possuir o login: adm e a senha: 123.-->
<?php
    //Ele abre uma sessão.
    session_start();
    //Só poderá logar se você tiver um login e senha autorizados.
    if(($_SESSION['login-session'] != 'adm') || 
    ($_SESSION['senha-session'] != '123')){
     //Se o login não for aceito, o usuário será redirecionado a página inicial.    
        header("Location: ../index.php");
    }
?>
