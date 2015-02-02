<?php 

require_once './config/conexaoDB.php';

$conexao = conexaoDB();

ini_set("display_errors", true);
error_reporting(E_ALL);

require_once 'config/rotas.php';

$rota = url();

require_once 'src/menu.php';

require_once 'config/rotasPermitidas.php';

require_once 'config/addRota.php';

if (isset($rota) && isset($permitidos) && isset($permitidas_conteudo))
{
    addRota($rota, $permitidos, $permitidas_conteudo);
}

require_once 'src/rodape.php';
    



       
        
