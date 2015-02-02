<?php

require_once 'config/conexaoDB.php';
require_once 'config/rotas.php';

$rota = url();
$conexao = conexaoDB();

if (isset($rota) && isset($conexao))
{

$query = "select * from paginas where pagina = :pagina";

$sql = $conexao->prepare($query);
$sql->bindValue("pagina", $rota);
$sql->execute();

$pagina = $sql->fetch(PDO::FETCH_ASSOC);

$conteudo = $pagina['conteudo'];

}
else
{
    http_response_code(404);
    return require_once ('src/Erro.php');
}

?>

<h1><?php echo $conteudo ?></h1>




