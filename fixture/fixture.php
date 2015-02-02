<?php

require_once '../config/conexaoDB.php';

echo "#### Executando Fixture ####\n";

$conexao = conexaoDB();

echo "Removendo Tabela";

$conexao->query("DROP TABLE IF EXISTS teste");
echo " - OK\n";

echo "Criando tabela";
$conexao->query
        (
            "CREATE TABLE teste("
            . "id INT NOT NULL AUTO_INCREMENT,"
            . "nome VARCHAR(45) CHARACTER SET 'utf8' NULL,"
            . "PRIMARY KEY(id));"
            
        );
echo " - OK\n";

echo 'Inserindo Dados';

for ($x=0; $x <= 9; $x++)
{
    $nome = "Teste {$x}";
    $sql = $conexao->prepare("INSERT INTO teste (nome) VALUES (:nome);");
    $sql->bindParam(":nome", $nome);
    $sql->execute();
}

echo " - OK\n";

echo "#### Concluído ####\n";
        
