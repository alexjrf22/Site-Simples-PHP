<?php

function addRota($rota, $permitidos)
{ 
    if (empty($rota))
    {
       return require_once 'src/home.php';
    }

    else if (in_array($rota, $permitidos))
    {
        return require_once ('src/' . $rota . '.php');    
    }

    else
    {   
        http_response_code(404);
        return require_once 'src/Erro.php';
    }

}