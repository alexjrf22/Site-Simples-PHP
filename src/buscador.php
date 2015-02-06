<?php

ini_set("display_errors", true);
error_reporting(E_ALL);

require_once 'config/conexaoDB.php';

$busca = strip_tags($_GET['busca']);

$conexao = conexaoDB();

if (isset($busca) && !empty($busca) && isset($conexao))
{

    try
    {
            $query = "select * from paginas where pagina = :pagina";
            $sql = $conexao->prepare($query);
            $sql->bindValue("pagina", $busca);
            $sql->execute();
            $pagina = $sql->fetch(PDO::FETCH_ASSOC);
            
            if (isset($pagina) && !empty($pagina))
            {                 
                $pagina = isset($pagina)? $pagina['pagina'] : null;     
                echo "<a href='". $pagina . "'>$pagina</a>";
            }
            else
            {
                echo 'Sem resultados para essa busca. Tente novamente com outros termos.';
            }
                
            
            

    } 
    catch (\PDOException $e)
    {
        die ("Erro código: " . $e->getCode() . ": " . $e->getMessage() . "\n" . $e->getTraceAsString);
    }
    
}
else
{
    echo 'Erro ao tentar efetuar busca. Tente novamente.';
}

?>

<?php  ?>
