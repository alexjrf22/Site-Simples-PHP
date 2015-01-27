<?php 

require_once 'config/rotas.php';

$permitidos = [
       
                    "home"          => "home",
                    "contato"       => "contato",
                    "empresa"       => "empresa",
                    "produtos"      => "produtos",
                    "servicos"      => "servicos",
                    "exibe_dados"   => "exibe_dados"
                    
              ];

$rota = url();

require_once 'src/menu.php';

require_once 'config/config.php';

if (isset($rota) && isset($permitidos))
{
    addRota($rota, $permitidos);
}
require_once 'src/rodape.php';
    



       
        
