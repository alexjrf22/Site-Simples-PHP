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
                
            <li <?php echo ((isset($rota) && $rota == "home") || isset($rota) && empty($rota)) ? "class='active'" : ""; ?>><a href="home">Home</a></li>
  		<li <?php echo (isset($rota) && $rota == "empresa") ? "class='active'" : ""; ?>><a href="empresa">Empresa</a></li>
                <li <?php echo (isset($rota) && $rota == "produtos") ? "class='active'" : ""; ?>><a href="produtos">produtos</a></li>
  		<li <?php echo (isset($rota) && $rota == "servicos") ? "class='active'" : ""; ?>><a href="servicos">Serviços</a></li>
  		<li <?php echo (isset($rota) && $rota == "contato") ? "class='active'" : ""; ?>><a href="contato">Contato</a></li>

	</ul>




