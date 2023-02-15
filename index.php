<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
require_once './config/confDBPDO.php'; //Configuración de la base de datos
require_once './config/confAPP.php'; //Configuración de la aplicacion

session_start(); //Inicia la sesión

if (!isset($_SESSION['paginaEnCurso'])) {
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
}

if ($_SESSION['paginaEnCurso'] != 'tecnologias') {
    if (isset($_REQUEST['tecnologias'])) {
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'tecnologias';
        header('Location: ./index.php');
        exit();
    }
}

require_once $aControladores[$_SESSION['paginaEnCurso']];
?>

