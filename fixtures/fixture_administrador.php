<?php

require_once '../config/conexaoDB.php';

echo "#### Executando Fixture ####\n";

$conexao = conexaoDB();

echo "Removendo Tabela";

$conexao->query("DROP TABLE IF EXISTS administrador");
echo " - OK\n";

echo "Criando tabela";
$conexao->query
        (
            "CREATE TABLE administrador("
            . "id INT NOT NULL AUTO_INCREMENT,"
            . "usuario VARCHAR(45) CHARACTER SET 'utf8' NULL,"
            . "senha VARCHAR(60),"
            . "PRIMARY KEY(id, usuario));"
            
        );

echo " - OK\n";

echo "Inserindo Dados";

$usuario = "code.education";
$senha = password_hash("code", PASSWORD_DEFAULT);

$sql = $conexao->prepare("INSERT INTO administrador (usuario, senha) VALUES (:usuario, :senha);");
$sql->bindParam(":usuario", $usuario);
$sql->bindParam(":senha", $senha);
$sql->execute(); 
 
echo " - OK\n";

echo "#### Concluído ####\n";
        
    
