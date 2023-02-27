<?php

/**
 * Controlador Inicio Publico
 * 
 * Controlador Inicio Publico
 * 
 *  @author Josue Martinez Fernandez
 * @version 1.0
 */
if (isset($_REQUEST['login'])) {
  $_SESSION['paginaEnCurso'] = 'login';
  header('Location: ./index.php');
  exit();
}
require_once $aVistas['layout'];
?>

