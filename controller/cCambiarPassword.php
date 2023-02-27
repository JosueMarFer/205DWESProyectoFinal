<?php

/** 
 * Controlador Cambiar Password
 * 
 * Controlador Cambiar Password
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
  $_SESSION['paginaEnCurso'] = 'miCuenta';
  header('Location: ./index.php');
  exit();
}
$oUsuario = $_SESSION['usuarioMiAplicacion'];
$aErrores = [
    'nuevaContraseña' => '',
    'repetirNuevaContraseña' => '',
    'contraseñaActual' => ''
];
$entradaOK = true;
if (isset($_REQUEST['cambiarPassword'])) {
  $aErrores['nuevaContraseña'] = validacionFormularios::validarPassword($_REQUEST['nuevaContraseña'], 8, 4, 1, 1);
  $aErrores['repetirNuevaContraseña'] = validacionFormularios::validarPassword($_REQUEST['repetirNuevaContraseña'], 8, 4, 1, 1);
  $aErrores['contraseñaActual'] = validacionFormularios::validarPassword($_REQUEST['contraseñaActual'], 8, 4, 1, 1);
  foreach ($aErrores as $errorIndex => $errorValue) {
    if (isset($errorValue)) {
      $entradaOK = false;
      $_REQUEST[$errorIndex] = null;
    }
  }
  if ($entradaOK) {
    if ($_REQUEST['nuevaContraseña'] != $_REQUEST['repetirNuevaContraseña']) {
      $aErrores['repetirNuevaContraseña'] = 'Las contraseñas no coinciden';
      $entradaOK = false;
    }
    if ($_REQUEST['contraseñaActual'] == $_REQUEST['repetirNuevaContraseña']) {
      $aErrores['repetirNuevaContraseña'] = 'La nueva contraseña no debe coincidir con la actual';
      $entradaOK = false;
    }
  }
  if ($entradaOK) {
    $contraseñaActualCifrada = (hash('sha256', ($oUsuario->getCodUsuario() . $_REQUEST['contraseñaActual'])));
    if ($contraseñaActualCifrada != $oUsuario->getPassword()) {
      $aErrores['contraseñaActual'] = 'Error, la contraseña introducida no es correcta';
      $entradaOK = false;
    }
  }
  if ($entradaOK) {
    $contraseñaNuevaCifrada = (hash('sha256', ($oUsuario->getCodUsuario() . $_REQUEST['nuevaContraseña'])));
    $oUsuario = UsuarioPDO::cambiarPassword($oUsuario, $contraseñaNuevaCifrada);
    $_SESSION['usuarioMiAplicacion'] = $oUsuario;
    $_SESSION['paginaEnCurso'] = 'miCuenta';
    header('Location: ./index.php');
    exit();
  }
}
require_once $aVistas['layout'];
?>

