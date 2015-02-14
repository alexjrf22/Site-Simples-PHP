<?php

require_once 'validaSession.php';
require_once 'arrayPag.php';
require_once '../../config/conexaoDB.php';

ini_set("display_errors", true);
error_reporting(E_ALL);

$msg =  "<p class='alert alert-success'>Seja bem vindo<b> " . $session_usuario . 
        "</b> ao painel de controle Site Simples PHP <a href='deslogar.php'>(Sair)</a></p>";

$array_paginas = retornaTabPag();
$conexao = conexaoDB();

if (isset($_POST['Salvar']) && isset($conexao))
{
    $texto = $_POST['editor1'];
    (int)$id_pagina = $_REQUEST['id'];
     
    if (isset($id_pagina) && isset($texto) && !empty($id_pagina))
    {
        $query = "update paginas set conteudo = :conteudo where id = :id";
        $sql = $conexao->prepare($query);
        $sql->bindParam(":conteudo", $texto);
        $sql->bindParam(":id", $id_pagina);
        $sql->execute(); 
        unset($texto);
        unset($id_pagina);
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=painelDeControle.php'>";
    }
    else
    {
        echo "<p class='alert alert-error'>Erro ao tentar alterar texto.</p>";
    }
      
    
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Site Simples | Conteúdo de paginas Site Simples PHP</title>
        <link rel="stylesheet" href="../../app/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../app/css/estilo.css">
    </head>
    <body>
        
<?php echo (isset($msg) ? $msg : "");?>

<h2>Segue Abaixo a Listagem de Páginas. Clique Sobre a Página Que Deseja Editar.</h2>

    <div class="tabbable tabs-left"> 
        
        <ul class="nav nav-tabs">
            
            <?php 
            
            $tab = 0;
            
            foreach ($array_paginas as $pagina):
              
                $tab++;
                $titulo = $pagina['pagina'];
            
            
            ?>
            
            <li><a href="<?php echo "#tab" . $tab; ?>" data-toggle="tab"><?php echo $titulo; ?></a></li>
            
            <?php endforeach; ?>
             
        </ul>
        
        <div class="tab-content">
           
              <?php 
            
                    $tab1 = 0;

                    foreach ($array_paginas as $pagina):
                      
                        $tab1++;
                        $conteudo = $pagina['conteudo']; 
                        $id = $pagina['id'];                      
            
                ?>
            
            <div class="tab-pane" id="<?php echo "tab" . $tab1; ?>"> 
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <textarea class="ckeditor" name="editor1">
                        <?php echo $conteudo;?>
                    </textarea><br>
                    <input type=hidden name="id" value="<?php echo $id; ?>">
                    <input type="submit" class="btn btn-primary" name="Salvar" value="Salvar">
                </form>
            </div>
           
            <?php endforeach; ?>
             
         </div>
            
        </div>
        
<div id="rodape">

<hr>   

<footer>

    <section id="direitos_reservados">"Todos os direitos reservados - <?php echo date("Y") . "\""; ?></section>

</footer>

</div>

            <script type="text/javascript" src="../../app/js/jquery.js"></script>
            <script type="text/javascript" src="../../app/js/bootstrap.min.js"></script>
            <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
        
    </body>
</html>