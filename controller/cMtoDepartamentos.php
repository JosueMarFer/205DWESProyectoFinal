<?php

/**
 * Controlador Mantenimiento de Departamentos
 * 
 * Controlador Mantenimiento de Departamentos
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
if (!isset($_SESSION['criterioBusquedaDepartamentos'])) {
  $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] = '';
}
$aErrores = [
    'descDepartamento' => ''
];
$entradaOK = true;
if (isset($_REQUEST['buscarDepartamentos'])) {
  $aErrores['descDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 0);
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
$oResultado = DepartamentoPDO::buscaDepartamentosPorDesc($_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada']);
$aResultados = [];
for ($index = 0; $index < $oResultado->rowCount(); $index++) {
  $oDepartamento = $oResultado->fetchObject();
  $oDepartamentoInstanciado = new Departamento($oDepartamento->T02_CodDepartamento, $oDepartamento->T02_DescDepartamento, $oDepartamento->T02_FechaCreacionDepartamento, $oDepartamento->T02_VolumenNegocio, ($oDepartamento->T02_FechaBajaDepartamento ?? null));
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
      'fechaBajaDepartamento' => $fechaBajaFormateada,
      'editar' => '',
      'Borrar' => '',
      'Baja' => '',
      'Alta' => ''
  ];
  array_push($aResultados, $aDepartamentoInstanciado);
}
require_once $aVistas['layout'];
?>

