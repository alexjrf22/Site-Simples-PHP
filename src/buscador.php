<?php

ini_set("display_errors", true);
error_reporting(E_ALL);

require_once 'config/conexaoDB.php';

$busca = strip_tags("%". $_GET['busca']."%");

$conexao = conexaoDB();

if (isset($busca) && !empty($busca) && isset($conexao))
{

    try
    {
            $query = "select * from paginas where conteudo like :busca or pagina like :busca";
            $sql = $conexao->prepare($query);
            $sql->bindParam(":busca", $busca);
            $sql->execute();
            $pagina_busca = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            if (!empty($pagina_busca))
            {   
                
                $x = 0;
                
                while(isset($pagina_busca[$x]) && $pagina_busca[$x] != "")
                {   
                    
                    $array_busca = $pagina_busca[$x];
                    $href = isset($array_busca)? $array_busca['rota'] : null; 
                    $mostrar_busca = isset($array_busca)? $array_busca['pagina'] : null; 
                    $x++;
                    echo "<a href='". $href . "'>$mostrar_busca</a><br>";
                }
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
