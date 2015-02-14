<div class="pull-left">
    <form id="form" method="get" action="exibe_dados">

        <h3>Entre Em Contato Com Nossa Equipe.</h3>

        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="text" name="email" placeholder="E-Mail"><br>
        <input type="text" name="assunto" placeholder="Assunto"><br>
        <textarea name="mensagem" placeholder="Mensagem"></textarea><br>

        <input type="submit" class="btn btn-primary" name="Enviar" value="Enviar">

    </form> 
</div>


<?php 

require_once 'config/conexaoDB.php';
$conexao = conexaoDB();

if (isset($conexao))
{
    $id = 5;
    $query = "select * from paginas where id = :id";
    $sql = $conexao->prepare($query);
    $sql->bindValue(":id", $id);
    $sql->execute();
    $array_pagina = $sql->fetch(PDO::FETCH_ASSOC);
    $conteudo = $array_pagina['conteudo'];
    $titulo = $array_pagina['pagina'];
    
}

?>
<div class="pull-right" id="contato">
    <h1> <?php echo (isset($titulo) ? $titulo : "");?> </h1>
    <h3><?php echo (isset($conteudo) ? $conteudo : "");?></h3>
</div>


 