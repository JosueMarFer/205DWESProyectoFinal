<?php

/** 
 * Controlador Inicio Privado
 * 
 * Controlador Inicio Privado
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
if (!isset($_SESSION['usuarioMiAplicacion']) || is_null($_SESSION['usuarioMiAplicacion'])) {
  $_SESSION['paginaEnCurso'] = 'inicioPublico';
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
if (isset($_REQUEST['cerrarSesion'])) {
  $_SESSION['usuarioMiAplicacion'] = null;
  unset($oUsuario);
  session_destroy();
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['detalle'])) {
  $_SESSION['paginaEnCurso'] = 'detalle';
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['error'])) {
  DBPDO::ejecutarConsulta('SELECT * FROM TablaQueNoExiste');
}
if (isset($_REQUEST['miCuenta'])) {
  $_SESSION['paginaEnCurso'] = 'miCuenta';
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['mtoDepartamentos'])) {
  $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['rest'])) {
  $_SESSION['paginaEnCurso'] = 'rest';
  header('Location: ./index.php');
  exit();
}
require_once $aVistas['layout'];
?>

