<?php

require_once '../config/conexaoDB.php';

echo "#### Executando Fixture ####\n";

$conexao = conexaoDB();

echo "Removendo Tabela";

$conexao->query("DROP TABLE IF EXISTS paginas");
echo " - OK\n";

echo "Criando tabela";
$conexao->query
        (
            "CREATE TABLE paginas("
            . "id INT NOT NULL AUTO_INCREMENT,"
            . "pagina VARCHAR(45) CHARACTER SET 'utf8' NULL,"
            . "conteudo VARCHAR(255) CHARACTER SET 'utf8' NULL,"
            . "PRIMARY KEY(id));"
            
        );

echo " - OK\n";

echo "Inserindo Dados";


$array = array("Home", "Empresa", "Produtos", "Serviços");
    
    for($x=0; $x<=3; $x++)
    {
        $pagina = $array[$x];
        $conteudo = $array[$x];
        $sql = $conexao->prepare("INSERT INTO paginas (pagina, conteudo) VALUES (:pagina, :conteudo);");
        $sql->bindParam(":pagina", $pagina);
        $sql->bindParam(":conteudo", $conteudo);
        $sql->execute(); 
    }
    
echo " - OK\n";

echo "#### Concluído ####\n";
        
      