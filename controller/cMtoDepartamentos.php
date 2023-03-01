<?php

/**
 * Controlador Mantenimiento de Departamentos
 * 
 * Controlador Mantenimiento de Departamentos
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
if (!isset($_SESSION['numPaginaciondepartamentos'])) {
  $_SESSION['numPaginaciondepartamentos'] = 0;
}

$mostrarbotonAntes = true;
$mostrarbotonDespues = true;

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
if (isset($_REQUEST['editar'])) {
  $_SESSION['paginaEnCurso'] = 'consultarEditarDepartamento';
  $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['editar'];
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['borrar'])) {
  $_SESSION['paginaEnCurso'] = 'eliminarDepartamento';
  $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['borrar'];
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['baja'])) {
  DepartamentoPDO::bajaLogicaDepartamento($_REQUEST['baja']);
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['alta'])) {
  DepartamentoPDO::rehabilitaDepartamento($_REQUEST['alta']);
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['crear'])) {
  $_SESSION['paginaEnCurso'] = 'crearDepartamento';
  header('Location: ./index.php');
  exit();
}
if (!isset($_SESSION['criterioBusquedaDepartamentos'])) {
  $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] = '';
}
$aErrores = [
    'descDepartamento' => ''
];
$entradaOK = true;
if (isset($_REQUEST['buscarDepartamentos'])) {
  $aErrores['descDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 0);
  $_SESSION['numPaginaciondepartamentos'] = 0;
  foreach ($aErrores as $errorIndex => $errorValue) {
    if (isset($errorValue)) {
      $entradaOK = false;
      $_REQUEST[$errorIndex] = null;
    }
  }
  if ($entradaOK) {
    $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] = $_REQUEST['descDepartamento'];
  }
}
$numDepartamentosTotal = DepartamentoPDO::cantidadDepartamentoPorDesc($_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada']);
if (isset($_REQUEST['paginaAnterior'])) {
  if ($_SESSION['numPaginaciondepartamentos'] > 0) {
    $_SESSION['numPaginaciondepartamentos'] -= 5;
  }
  header('Location: ./index.php');
  exit();
}
if (isset($_REQUEST['paginaSiguiente'])) {

  if ($_SESSION['numPaginaciondepartamentos'] + 5 < $numDepartamentosTotal) {
    $_SESSION['numPaginaciondepartamentos'] += 5;
  }
  header('Location: ./index.php');
  exit();
}
if ($_SESSION['numPaginaciondepartamentos'] == 0) {
  $mostrarbotonAntes = false;
}
if ($_SESSION['numPaginaciondepartamentos']+5 > $numDepartamentosTotal) {
  $mostrarbotonDespues = false;
}
$oResultado = DepartamentoPDO::buscaDepartamentoPorDesc($_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'], $_SESSION['numPaginaciondepartamentos']);
$aResultados = [];
for ($index = 0; $index < $oResultado->rowCount(); $index++) {
  $oDepartamento = $oResultado->fetchObject();
  $oDepartamentoInstanciado = new Departamento($oDepartamento->T02_CodDepartamento, $oDepartamento->T02_DescDepartamento, $oDepartamento->T02_FechaCreacionDepartamento, $oDepartamento->T02_VolumenNegocio, $oDepartamento->T02_FechaBaja);
  $FechaCreacionDepartamentoFormateada = new DateTime($oDepartamentoInstanciado->getFechaCreacionDepartamento());
  $FechaCreacionDepartamentoFormateada = $FechaCreacionDepartamentoFormateada->format("d-m-Y H:i:s");
  if (!is_null($oDepartamentoInstanciado->getFechaBajaDepartamento())) {
    $fechaBajaFormateada = new DateTime($oDepartamentoInstanciado->getFechaBajaDepartamento());
    $fechaBajaFormateada = $fechaBajaFormateada->format("d-m-Y H:i:s");
  } else {
    $fechaBajaFormateada = '';
  }
  $aDepartamentoInstanciado = [
      'codDepartamento' => $oDepartamentoInstanciado->getCodDepartamento(),
      'descDepartamento' => $oDepartamentoInstanciado->getDescDepartamento(),
      'fechaCreacionDepartamento' => $FechaCreacionDepartamentoFormateada,
      'volumenDeNegocio' => $oDepartamentoInstanciado->getVolumenDeNegocio(),
      'fechaBajaDepartamento' => $fechaBajaFormateada
  ];
  array_push($aResultados, $aDepartamentoInstanciado);
}
require_once $aVistas['layout'];
?>

