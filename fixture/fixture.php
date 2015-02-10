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
            . "rota VARCHAR(255) CHARACTER SET 'utf8' NULL,"
            . "conteudo VARCHAR(255) CHARACTER SET 'utf8' NULL,"
            . "PRIMARY KEY(id));"
            
        );

echo " - OK\n";

echo "Inserindo Dados";

$super_array_pag = Array (
                             0 => Array (   "id" => 1, 
                                            "pagina" => "Home",  
                                            "rota" => "home",
                                            "conteudo" => " PHP é uma linguagem de criação de scripts embutida 
                                                           em HTML no servidor."
                                        ),

                             1 => Array (
                                            "id" => 2, 
                                            "pagina" => "Empresa",
                                            "rota" => "empresa",
                                            "conteudo" => "Empresa é uma instituição jurídica despersonalizada, "
                                                            . "caracterizada pela atividade econômica organizada, "
                                                            . "ou unitariamente"
                                                            . "estruturada."

                                        ),
    
                             2 => Array (
                                            "id" => 3, 
                                            "pagina" => "Produtos", 
                                            "rota" => "produtos",
                                            "conteudo" => "Temos os produtos da mais alta qualidade e pelo melhor preço"
                                                          . " do mercado brasileiro."
                                        ),
    
                             3 => Array (
                                            "id" => 4, 
                                            "pagina" => "Serviços", 
                                            "rota" => "servicos",
                                            "conteudo" => "Prestamos serviços as maiores empresas brasileiras "
                                                . "tendo em vista melhorar desempenho e eficiência de processos "
                                                . "otimizando a área de TI."
                                        ),
    
                              4 => Array (
                                            "id" => 5, 
                                            "pagina" => "Contato",
                                            "rota" => "contato",
                                            "conteudo" => null
                                  
                                         )
                          );

    for($x=0; $x<=4; $x++)
    {   
        $array = $super_array_pag[$x]; 
        $pagina = $array['pagina'];
        $conteudo = $array['conteudo'];
        $rota = $array['rota'];
        
        $sql = $conexao->prepare("INSERT INTO paginas (pagina, rota, conteudo) VALUES (:pagina, :rota, :conteudo);");
        $sql->bindParam(":pagina", $pagina);
        $sql->bindParam(":conteudo", $conteudo);
        $sql->bindParam(":rota", $rota);
        $sql->execute(); 
    }
    
echo " - OK\n";

echo "#### Concluído ####\n";
        
    