<?php

function retornaTabPag()
{
     require_once '../../config/conexaoDB.php';

    $conexao = conexaoDB();

    if (isset($conexao) and !empty($conexao))
    {
        $query = "select * from paginas";
        $sql   = $conexao->prepare($query);
        $sql->execute();
        $array_paginas = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        return $array_paginas;
        
    }  
}

