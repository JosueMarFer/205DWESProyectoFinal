<?php

/** 
 * Controlador Mi Cuenta
 * 
 * Controlador Mi Cuenta
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
if (isset($_REQUEST['cambiarPassword'])) {
  $_SESSION['paginaEnCurso'] = 'cambiarPassword';
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['borrarCuenta'])) {
  $_SESSION['paginaEnCurso'] = 'borrarCuenta';
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
$fechaFormateada = new DateTime($oUsuario->getFechaHoraUltimaConexionAnterior());
$fechaFormateada = $fechaFormateada->format("d-m-Y H:i:s");
$aErrores = [
    'descUsuario' => ''
];
$entradaOK = true;
if (isset($_REQUEST['editarPerfil'])) {
  $aErrores['descUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descUsuario'], 255, 1, 1);
  foreach ($aErrores as $errorIndex => $errorValue) {
    if (isset($errorValue)) {
      $entradaOK = false;
      $_REQUEST[$errorIndex] = null;
    }
  }
  if ($entradaOK) {
    $oUsuario = UsuarioPDO::modificarUsuario($_REQUEST['descUsuario'], $oUsuario);
    $_SESSION['usuarioMiAplicacion'] = $oUsuario;
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: ./index.php');
    exit();
  }
}
require_once $aVistas['layout'];
?>

