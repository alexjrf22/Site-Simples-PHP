<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Site Simples | <?php echo $rota; ?></title>
        <link rel="stylesheet" href="../app/css/bootstrap.min.css">
        <link rel="stylesheet" href="../app/css/estilo.css">
    </head>
    <body>

<!--menu principal-->

	<ul class="nav nav-tabs">
                
                <li <?php echo (isset($url[0]) && $url[0] == "home" || isset($url[0]) && $url[0] == "") ? "class='active'" : ""; ?>><a href="home">Home</a></li>
  		<li <?php echo (isset($url[0]) && $url[0] == "empresa") ? "class='active'" : ""; ?>><a href="empresa">Empresa</a></li>
                <li <?php echo (isset($url[0]) && $url[0] == "eprodutos") ? "class='active'" : ""; ?>><a href="produtos">produtos</a></li>
  		<li <?php echo (isset($url[0]) && $url[0] == "servicos") ? "class='active'" : ""; ?>><a href="servicos">Serviços</a></li>
  		<li <?php echo (isset($url[0]) && $url[0] == "contato") ? "class='active'" : ""; ?>><a href="contato">Contato</a></li>

	</ul>




