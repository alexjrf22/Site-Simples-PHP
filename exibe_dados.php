
<?php

    if (
            !isset($_GET["nome"]) || !isset($_GET["email"]) || !isset($_GET["assunto"]) 
            || !isset($_GET["mensagem"])
        )
    {

         echo "<p class='text-error'>Erro ao tentar enviar dados.</p>" . "<br>" .
              "<a href='http://localhost:8000/index.php?pagina=contato.php'>clique aqui</a>";
    }

    else if (
                empty($_GET["nome"]) || empty($_GET["email"]) || empty($_GET["assunto"]) 
                || empty($_GET["mensagem"])
            )
    {

         echo "<p class='text-error'>Preencha todos os campos.</p>" .  
              "<a href='http://localhost:8000/index.php?pagina=contato.php'>clique aqui</a>";
    }

    else if (!filter_var($_GET["email"], FILTER_VALIDATE_EMAIL))
    {
        echo "<p class='text-error'>E-Mail não é valido</p>" . 
             "<a href='http://localhost:8000/index.php?pagina=contato.php'>clique aqui</a>";
    }
    else
    {

        $nome     = strip_tags($_GET["nome"]);
        $email    = strip_tags($_GET["email"]);
        $assunto  = strip_tags($_GET["assunto"]);
        $mensagem = strip_tags($_GET["mensagem"]);


        echo "<h4 class='text-success'>Dados enviados com sucesso. abaixo seguem os dados que você enviou:</h4>" . 
             "<b>Nome:</b> " . $nome . "<br>".
             "<b>E-Mail:</b> " . $email . "<br>" .
             "<b>Assunto:</b> " . $assunto . "<br>" .
             "<b>Mensagem:</b> " . $mensagem . "<br><br>" .
             "<a href='http://localhost:8000/index.php?pagina=contato.php'>clique aqui</a>";

    }



          
