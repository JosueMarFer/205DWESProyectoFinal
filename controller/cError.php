<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023    
//Almacena en un array los atributos del objeto de error almacenado en la sesion.
$aError = [
    'codError' => $_SESSION['error']->getCodError(),
    'descError' => $_SESSION['error']->getDescError(),
    'archivoError' => $_SESSION['error']->getArchivoError(),
    'lineaError' => $_SESSION['error']->getLineaError(),
    'paginaSiguiente' => $_SESSION['error']->getPaginaSiguiente()
];
//Si se pulsa el boton de volver destruye el error de la sesion y vuelve a la pagina anterior
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    $_SESSION['paginaAnterior'] = '';
    unset($_SESSION['error']);
    header('Location: ./index.php');
    exit();
}
require_once $aVistas['layout'];
?>

