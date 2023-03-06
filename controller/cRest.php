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
$aPokemon = null;
$aErrores = [
    'nombrePokemon' => ''
];
$entradaOK = true;
if (isset($_REQUEST['mostrarInformacion'])) {
  $aErrores['nombrePokemon'] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombrePokemon'], 255, 1, 1);
  foreach ($aErrores as $errorIndex => $errorValue) {
    if (isset($errorValue)) {
      $entradaOK = false;
      $_REQUEST[$errorIndex] = null;
    }
  }
  if ($entradaOK) {
    $aPokemon = REST::datosPokemon($_REQUEST['nombrePokemon']);
  }
}

require_once $aVistas['layout'];
?>

