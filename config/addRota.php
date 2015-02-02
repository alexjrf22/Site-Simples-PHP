<?php

function addRota($rota, $permitidos, $permitidas_conteudo)
{ 
    if (empty($rota))
    {
       return require_once ('src/conteudo.php');
    }

    else if (in_array($rota, $permitidos))
    {
        return require_once ('src/' . $rota . '.php');    
    }
    
    else if (in_array($rota, $permitidas_conteudo))
    {
        return require_once ('src/conteudo.php');;
    }

    else
    {   
        http_response_code(404);
        return require_once ('src/Erro.php');
    }

}