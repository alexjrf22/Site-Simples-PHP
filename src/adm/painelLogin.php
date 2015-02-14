<?php

ini_set("display_errors", true);
error_reporting(E_ALL);

    if (isset($_POST['Autenticar']))
    {
        require_once '../../config/conexaoDB.php';
        
        $conexao = conexaoDB();
        
        $usuario = (isset($_POST['usuario'])) ? strip_tags($_POST['usuario']) : null;
        $senha = (isset($_POST['senha'])) ? strip_tags($_POST['senha']) : null;
        
        $query = "select * from administrador where usuario = :usuario";
        $sql   = $conexao->prepare($query);
        $sql->bindParam(":usuario", $usuario);
        $sql->execute();
        $administrador = $sql->fetch(PDO::FETCH_ASSOC);
        
        $senha_bd = $administrador['senha'];
        
        if ($sql->rowCount() > 0)
        {   
            if (password_verify($senha, $senha_bd) == 1)
            {
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha']   = $senha;
                header("location: painelDeControle.php");
            }
            else
            {
                $error = "<p class=alert alert-error>Senha Inválida.</p>";
                unset($usuario);
                unset($senha); 
                
            }
           
        }
        else
        {
            $error = "<p class=alert alert-error>Usuário Não Existe.</p>";
            unset($usuario);
            unset($senha);
            
        }
        
                
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Site Simples | Autenticação</title>
        <link rel="stylesheet" href="../../app/css/bootstrap.css">
        <link rel="stylesheet" href="../../app/css/estilo.css">
    </head>
    <body>
           
            <h1>Administrador - Por Gentileza Se Identificar</h1>
            
            <form id="form-adm" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
                <input type="text" name="usuario" placeholder="Usuário"required /><br>
                <input type="password" name="senha" placeholder="Senha" required /><br>
                <input type="submit" class="btn btn-primary" name="Autenticar" value="Autenticar" required />

            </form>
            
            <?php echo isset($error) ? $error : ""; ?>
            
            <h4>Se Caiu Aqui Por Engano ou Deseja Voltar a Página Home <a href="../../home">Clique aqui</a></h4>

           <div id="rodape">

                <hr>   

                <footer >

                    <section id="direitos_reservados">"Todos os direitos reservados - <?php echo date("Y") . "\""; ?></section>

                </footer>

            </div>

            <script type="text/javascript" src="../../app/js/jquery.js"></script>
            <script type="text/javascript" src="../../app/js/bootstrap.js"></script>
        
     </body>
</html>

