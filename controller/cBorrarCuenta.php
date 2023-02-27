<?php

/**
 * Controlador Borrar Cuenta
 * 
 * Controlador Borrar Cuenta
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
$aUsuarioLogueado = [
    'codUsuario' => $oUsuario->getCodUsuario(),
    'password' => $oUsuario->getPassword(),
    'descUsuario' => $oUsuario->getDescUsuario(),
    'numAccesos' => $oUsuario->getNumAccesos(),
    'fechaHoraUltimaConexion' => $oUsuario->getFechaHoraUltimaConexion(),
    'fechaHoraUltimaConexionAnterior' => $oUsuario->getFechaHoraUltimaConexionAnterior(),
    'perfil' => $oUsuario->getPerfil()
];
$aErrores = [
    'contraseñaActual' => '',
    'repetirContraseñaActual' => ''
];
$entradaOK = true;
if (isset($_REQUEST['borrarCuenta'])) {
  $aErrores['contraseñaActual'] = validacionFormularios::validarPassword($_REQUEST['contraseñaActual'], 8, 4, 1, 1);
  $aErrores['repetirContraseñaActual'] = validacionFormularios::validarPassword($_REQUEST['repetirContraseñaActual'], 8, 4, 1, 1);
  foreach ($aErrores as $errorIndex => $errorValue) {
    if (isset($errorValue)) {
      $entradaOK = false;
      $_REQUEST[$errorIndex] = null;
    }
  }
  if ($entradaOK) {
    if ($_REQUEST['contraseñaActual'] != $_REQUEST['repetirContraseñaActual']) {
      $aErrores['repetirContraseñaActual'] = 'Las contraseñas no coinciden';
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
    $borrado = UsuarioPDO::borrarrUsuario($oUsuario);
    if ($borrado) {
      $_SESSION['usuarioMiAplicacion'] = null;
      unset($oUsuario);
      session_destroy();
      $_SESSION['paginaEnCurso'] = 'inicioPublico';
      header('Location: ./index.php');
      exit();
    }
  }
}
require_once $aVistas['layout'];
?>

