<?php

/** 
 * Controlador Rest
 * 
 * Controlador Rest
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
if (!isset($_SESSION['usuarioMiAplicacion']) || is_null($_SESSION['usuarioMiAplicacion'])) {
  $_SESSION['paginaEnCurso'] = 'inicioPublico';
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['volver'])) {
  $_SESSION['paginaEnCurso'] = 'inicioPrivado';
  header('Location: ./index.php');
  exit();
}
require_once $aVistas['layout'];
?>

