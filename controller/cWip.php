<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023    
//Almacena en un array los atributos del objeto de error almacenado en la sesion.
////Si la sesion no tiene almcenado un usuario redirige al login
if (!isset($_SESSION['usuarioMiAplicacion']) || is_null($_SESSION['usuarioMiAplicacion'])) {
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: ./index.php');
    exit();
}
//Si se pulsa el boton de volver vuelve a inicio privado
if (isset($_REQUEST['volver'])) {
  $_SESSION['paginaEnCurso'] = 'inicioPrivado';
  header('Location: ./index.php');
  exit();
}
require_once $aVistas['layout'];
?>

