<?php 
//É um alto carregaento de páginas e verifica se existe retorno.
spl_autoload_register('carregarClasse');

function carregarClasse($nomeClasse){
    if(file_exists('../classes/'.$nomeClasse.'.php')){
        require_once('../classes/'.$nomeClasse.'.php');
    }
}
?>
