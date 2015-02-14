<?php

session_start();

if (isset($_SESSION['usuario']) and isset($_SESSION['senha']))
{
    unset($_SESSION['usuario']);
    unset($_SESSION['usuario']);
    session_destroy();
    setcookie("usuario", $_SESSION['usuario'], time()-3600);
    header("location: painelLogin.php");
}

