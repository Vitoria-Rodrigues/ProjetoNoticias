<?php

require_once ('../Global/global.php');


try{
//Está redirecionado a página inicial.
header("Location:../index.php");

//Está sendo instanciado 2 novos objetos.
$reporter = new Reporter();
$noticia = new Noticia();

//O objeto está chamando as funções set já com seus parâmetros.
$reporter->setNomeReporter($_POST['txtNome']);
$reporter->setCpfReporter($_POST['txtCpf']);
$reporter->setEmailReporter($_POST['txtEmail']);

$noticia->settituloNoticia($_POST['txttitulo']);
$noticia->setsubtituloNoticia($_POST['txtSubTitulo']);
$noticia->setdtNoticia($_POST['txtdata']);
$noticia->settextoNoticia($_POST['textoNoticia']);
$noticia->setidCategoria($_POST['idCategoria']);
$noticia->setidStatusNoticia($_POST['idStatusNoticia']);
$noticia->setidReporter($_POST['idReporter']);

//A varievel esta armezenando em array o valor passado pelo files.
$nomeImg = $_FILES['imgNoticia']['name'];
$imgNoticia = $_FILES['imgNoticia']['tmp_name'];

//Está guardando o caminho da imagem.
$caminhoImg = "./Imagens/".$nomeImg;
$caminhoFun = "../Imagens/".$nomeImg;

//Move um arquivo enviado para uma nova localição.
 move_uploaded_file($imgNoticia, $caminhoFun);


//Está setando as informações dentro do objeto instanciado.
$noticia->setfotoNoticia($caminhoImg);

//As funções de cadastro estão sendo chamadas.
echo $reporter->cadastrar($reporter);
echo $noticia->cadastrar($noticia);

}
catch(Exception $e){
    echo'<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>