<?php

require_once 'config/conexaoDB.php';
require_once 'config/rotas.php';

$rota = url();

if (isset($rota) && empty($rota))
{
    $rota = "home";
}

$conexao = conexaoDB();

if (isset($rota) && isset($conexao))
{

    try
    {
            $query = "select * from paginas where pagina = :pagina";
            $sql = $conexao->prepare($query);
            $sql->bindValue("pagina", $rota);
            $sql->execute();
            $pagina = $sql->fetch(PDO::FETCH_ASSOC);
            $conteudo = $pagina['conteudo'];
            $titulo   = $pagina['pagina'];

    } 
    catch (\PDOException $e)
    {
        die ("Erro código: " . $e->getCode() . ": " . $e->getMessage() . "\n" . $e->getTraceAsString);
    }
    
}
else
{
    http_response_code(404);
    return require_once ('src/Erro.php');
}

?>

<h1><?php echo $titulo ?></h1>

<section id="conteudo_principal">
    <p id="conteudo"><?php echo $conteudo ?></p>
</section>




