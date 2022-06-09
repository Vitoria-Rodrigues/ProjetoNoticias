<?php
require_once('../Global/global.php');
include_once("sentinela.php");
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
        <h1><a href="../index.php">Portal de Noticias</a></h1>
        <p><a href="../logout.php">Sair</a></p>
    </header>
    <main>
        <h1>Cadastro de matérias</h1>
        <section>
            <?php
            //Faz o tratamento das exceções e se ocorrer algum erro, ele o retorna.
            try {
                //Estão sendo instanciados 3 novos objetos.
                $statusNoticia = new StatusNoticia();
                $categoria = new Categoria();
                $reporter = new Reporter();

                //Estão sendo chamadas as funções de listar e o reporter esta agregando um valor mais.
                $idReporter = count($reporter->listar()) + 1;
                $listaStatus = $statusNoticia->listar();
                $listaCategoria = $categoria->listar();
            } catch (Exception $e) {
                echo '<pre>';
                print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }
            ?>
            <!--Formulário para o cadastro das noticias-->
            <form method="POST" action="../classes/cadastrar.php" enctype="multipart/form-data">
                <article class="caixa1">
                    <div>
                        <h1>Categoria</h1>
                        <!--Está chamando na tela a variavel listaCategoria.-->
                        <?= $listaCategoria ?>
                    </div>
                    <div>
                        <h1>Status da noticia</h1>
                        <!--Está chamando na tela a variavel listaStatus.-->
                        <?= $listaStatus ?>
                    </div>
                </article>
                <article class="caixa2">
                    <div>
                        <h2>Cadastro de repórter</h2>

                        <input type="hidden" name="idReporter" value="<?= $idReporter ?>">
                        <label>Nome</label>
                        <input type="text" name="txtNome" required>
                        <label>CPF</label>
                        <input type="text" name="txtCpf" required>
                        <label>Email</label>
                        <input type="Email" name="txtEmail" required>
                    </div>
                    <section>
                        <h2>Cadastro de noticia</h2>

                        <label>Titulo</label>
                        <input type="text" name="txttitulo">
                        <label>SubTitulo</label>
                        <input type="text" name="txtSubTitulo">

                        <div>
                            <label>Data de publição</label>
                            <input type="date" name="txtdata">
                            <label>Foto da noticia</label>

                            <input type="file" id="imgNoticia" name="imgNoticia">

                        </div>

                        <label>Noticia:</label>
                        <textarea id="textoNoticia" name="textoNoticia" rows="15" cols="100"></textarea>
                    </section>
                </article>
                <input type="submit" value="Enviar" class="btn">
            </form>
        </section>
    </main>
</body>
<footer>
    <h1 class="footer-titulo">Desenvolvido por:
        <p>Amanda Ornelas e Vitoria Rodrigues</p>
    </h1>
</footer>

</html>