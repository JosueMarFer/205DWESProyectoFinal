<?php

/**
 * Controlador Registro
 * 
 * Controlador Registro
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
if (isset($_REQUEST['cancelar'])) {
  $_SESSION['paginaEnCurso'] = 'login';
  header('Location: ./index.php');
  exit();
}
$aErrores = [
    'codUsuario' => '',
    'password' => '',
    'repetirPassword' => '',
    'descUsuario' => ''
];
$entradaOK = true;
if (isset($_REQUEST['registro'])) {
  $aErrores['codUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codUsuario'], 8, 4, 1);
  $aErrores['password'] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 4, 1, 1);
  $aErrores['repetirPassword'] = validacionFormularios::validarPassword($_REQUEST['repetirPassword'], 8, 4, 1, 1);
  $aErrores['descUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descUsuario'], 255, 1, 1);
  foreach ($aErrores as $errorIndex => $errorValue) {
    if (isset($errorValue)) {
      $entradaOK = false;
      $_REQUEST[$errorIndex] = null;
    }
  }
  if ($entradaOK) {
    $usuarioExistente = UsuarioPDO::validarCodNoExiste($_REQUEST['codUsuario']);
    if ($usuarioExistente) {
      $aErrores['codUsuario'] = 'El usuario ya existe';
      $entradaOK = false;
      $_REQUEST['codUsuario'] = null;
    }
    if ($_REQUEST['password'] != $_REQUEST['repetirPassword']) {
      $aErrores['repetirPassword'] = 'Las contraseñas no coinciden';
      $entradaOK = false;
    }
  }
  if ($entradaOK) {
    setcookie('idioma', $_REQUEST['idioma'], time() + 300);
    $oUsuario = UsuarioPDO::altaUsuario($_REQUEST['codUsuario'], $_REQUEST['password'], $_REQUEST['descUsuario']);
    $oUsuario = UsuarioPDO::registrarUltimaConexion($oUsuario);
    $_SESSION['usuarioMiAplicacion'] = $oUsuario;
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: ./index.php');
    exit();
  }
}
require_once $aVistas['layout'];
?>

