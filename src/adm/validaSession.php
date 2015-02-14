<?php

session_start();

if (isset($_SESSION['usuario']) and isset($_SESSION['senha']))
{
    $session_usuario = $_SESSION['usuario'];
    setcookie("usuario", $session_usuario, time()+10800);
}
 else
{   
    header("location:painelLogin.php");
}
