<?php
require_once('./global.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <title>Noticias</title>
</head>

<body>
    <header>
        <h1><a href="index.php">Portal de Noticias</a></h1>
        <!--Formulario para acessar a area de cadastro de noticias-->
        <form method="post" action="valida-usuario.php">
            <div>
                <label>Login</label>
                <input type="text" name="tLogin" placeholder="Digite seu login" required>
            </div>
            <div>
                <label>senha</label>
                <input type="password" name="tSenha" placeholder="Digite sua senha" required>
            </div>
            <div>
                <input type="submit" value="Entrar" id="btn">
            </div>
        </form>
    </header>
    <!--Esta sendo exibido na tela os dados que foram cadastrados no banco.-->
    <main>
        <!--Esta sendo instanciado um objeto na variavel noticias.-->
        <?php $noticias = new Noticia();
        //A variavel listarNoticias está chamando a função listar.
        $listarNoticias = $noticias->listar();
        //O foreach passa por todo o listarNoticias e retorna todas as posições.
        foreach ($listarNoticias as $noticia) {
        ?>
            <div class="noticia">
                <h1><?= $noticia['tituloNoticia']; ?></h1>
                <h2><?= $noticia['subTituloNoticia']; ?></h2>
                <div class="descs">
                    <h3><?= $noticia['descCategoria']; ?></h3>
                    <h3 style="color:gray"><?= $noticia['descStatusNoticia'];  ?></h3>
                </div>
                <img id="img-noticia" src=<?= $noticia['fotoNoticia'];  ?>>
                <div class="text">
                    <p><?= $noticia['textoNoticia'];  ?></p>
                    <p>Autor(a): <?= $noticia['nomeReporter'];  ?></p>
                </div>
            </div>
        <?php } ?>
    </main>
    <footer>
        <h1 class="footer-titulo">Desenvolvido por:
            <p>Amanda Ornelas e Vitoria Rodrigues</p>
        </h1>
    </footer>
</body>

</html>