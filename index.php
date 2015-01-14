<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Site Simples | Home</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>

<?php 
     
    if (isset($_GET["pagina"]))
    {
        $pagina = $_GET["pagina"];
    }
    else
    {
        $pagina = "";
    }
    
    require_once("menu.php"); 

    $paginas = array(
                        "home.php", "contato.php", "empresa.php", "produtos.php", 
                        "servicos.php", "index.php"
                    );


    //se pagina estiver em branco incluir home.php
    if (empty($pagina))
    {
        require_once ("home.php");
    }
    //se a pagina não pertencer ao array de paginas pre-determinadas dr erro de pagina não encontrada
    else if (!in_array ($pagina, $paginas))
    {
       die("Erro 404 Página não encontrada.");

    }
    //se encontrou a pagina no array adicionar ao index.php
    else
    {
        require_once ($pagina);
    }
    
    require_once 'rodape.php';
    
   ?>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
     </body>
</html>
       
        
