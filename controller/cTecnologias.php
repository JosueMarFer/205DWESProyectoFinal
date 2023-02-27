<?php

/** 
 * Controlador Tecnologias
 * 
 * Controlador Tecnologias
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
if (isset($_REQUEST['volver'])) {
  $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
  header('Location: ./index.php');
  exit();
}
require_once $aVistas['layout'];
?>

