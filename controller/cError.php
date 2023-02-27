<?php

/**
 * Controlador error
 * 
 * Controlador error
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
$aError = [
    'codError' => $_SESSION['error']->getCodError(),
    'descError' => $_SESSION['error']->getDescError(),
    'archivoError' => $_SESSION['error']->getArchivoError(),
    'lineaError' => $_SESSION['error']->getLineaError(),
    'paginaSiguiente' => $_SESSION['error']->getPaginaSiguiente()
];
if (isset($_REQUEST['volver'])) {
  $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
  $_SESSION['paginaAnterior'] = '';
  unset($_SESSION['error']);
  header('Location: ./index.php');
  exit();
}
require_once $aVistas['layout'];
?>

