<?php

/**
 * Controlador Alta de Departamentos
 * 
 * Controlador Alta de Departamentos
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
if (!isset($_SESSION['usuarioMiAplicacion']) || is_null($_SESSION['usuarioMiAplicacion'])) {
  $_SESSION['paginaEnCurso'] = 'inicioPublico';
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['cancelar'])) {
  $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
  header('Location: ./index.php');
  exit();
}

$aErrores = [
    'codDepartamento' => '',
    'descDepartamento' => '',
    'volumenNegocio' => ''
];
$entradaOK = true;
if (isset($_REQUEST['crearDepartamento'])) {
  $aErrores['codDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamento'], 3, 3, 1);
  $aErrores['descDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 1);
  $aErrores['volumenNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'], obligatorio: 1);
  foreach ($aErrores as $errorIndex => $errorValue) {
    if (isset($errorValue)) {
      $entradaOK = false;
      $_REQUEST[$errorIndex] = null;
    }
  }
  if (DepartamentoPDO::validaCodNoExiste($_REQUEST['codDepartamento'])) {
    $entradaOK = false;
    $aErrores['codDepartamento'] = "El codigo ya existe";
  }
  if ($entradaOK) {
    DepartamentoPDO::altaDepartamento($_REQUEST['codDepartamento'], $_REQUEST['descDepartamento'], $_REQUEST['volumenNegocio']);
    $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
    header('Location: ./index.php');
    exit();
  }
}

require_once $aVistas['layout'];
