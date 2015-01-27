<?php 

define(DIR, 'src/');

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

require_once DIR . 'menu.php';

require_once 'config/config.php';

addRota($rota, $permitidos);

require_once DIR . 'rodape.php';
    



       
        
