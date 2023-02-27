<?php

/** 
 * Controlador Login
 * 
 * Controlador Login
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
if (isset($_REQUEST['registro'])) {
  $_SESSION['paginaEnCurso'] = 'registro';
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['volver'])) {
  $_SESSION['paginaEnCurso'] = 'inicioPublico';
  header('Location: ./index.php');
  exit();
}
$aErrores = [
    'codUsuario' => '',
    'password' => ''
];
$entradaOK = true;
if (isset($_REQUEST['iniciarSesion'])) {
  $aErrores['codUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codUsuario'], 8, 4, 1);
  $aErrores['password'] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 4, 1, 1);
  foreach ($aErrores as $errorIndex => $errorValue) {
    if (isset($errorValue)) {
      $entradaOK = false;
    }
  }
  if ($entradaOK) {
    $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['codUsuario'], $_REQUEST['password']);

    if (!$oUsuario) {
      $aErrores['password'] = 'El usuario no existe o la contraseña es erronea';
      $entradaOK = false;
    }
  }
  if ($entradaOK) {
    setcookie('idioma', $_REQUEST['idioma'], time() + 300);
    $oUsuario = UsuarioPDO::registrarUltimaConexion($oUsuario);
    $_SESSION['usuarioMiAplicacion'] = $oUsuario;
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: ./index.php');
    exit();
  }
}
require_once $aVistas['layout'];
?>

