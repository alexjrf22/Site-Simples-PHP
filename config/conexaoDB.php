<?php

function conexaoDB()
{
    try
    {
        $config = include 'configDB.php';
        
        if(!isset($config['db']))
        {
            throw new \InvalidArgumentException("Configuração do banco de dados não existe"); 
        }
        
        $host = (isset($config['db']['host'])) ? $config['db']['host'] : null;
        $dbname = (isset($config['db']['dbname'])) ? $config['db']['dbname'] : null;
        $senha = (isset($config['db']['senha '])) ? $config['db']['senha '] : null;
        $usuario = (isset($config['db']['usuario'])) ? $config['db']['usuario'] : null;
        
        return new \PDO("mysql:host={$host};dbname={$dbname}" , $usuario , $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    } 
    catch (\PDOException $e) 
    {
        die ("Erro código: " . $e->getCode() . ": " . $e->getMessage() . "\n" . $e->getTraceAsString);

    } 
}





