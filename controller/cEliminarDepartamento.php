<?php

/**
 * Controlador Eliminar Departamentos
 * 
 * Controlador Eliminar Departamentos
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

if (isset($_REQUEST['borrarDepartamento'])) {
    $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
    DepartamentoPDO::bajaFisicaDepartamento($_SESSION['codDepartamentoEnCurso']);
    header('Location: ./index.php');
    exit();
}
$oDepartamentoPDO = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']);
$oDepartamentoPDO = $oDepartamentoPDO->fetchObject();
$oDepartamentoPDO = new Departamento($oDepartamentoPDO->T02_CodDepartamento, $oDepartamentoPDO->T02_DescDepartamento, $oDepartamentoPDO->T02_FechaCreacionDepartamento, $oDepartamentoPDO->T02_VolumenNegocio, $oDepartamentoPDO->T02_FechaBaja);
$fechaFormateadaCreacion = new DateTime($oDepartamentoPDO->getFechaCreacionDepartamento());
$fechaFormateadaCreacion = $fechaFormateadaCreacion->format("d-m-Y H:i:s");
$fechaFormateadaBaja = new DateTime($oDepartamentoPDO->getFechaCreacionDepartamento());
$fechaFormateadaBaja = $fechaFormateadaBaja->format("d-m-Y H:i:s");

$aDepartamentoEnCurso = [
    'codDepartamento' => $oDepartamentoPDO->getCodDepartamento(),
    'descDepartamento' => $oDepartamentoPDO->getDescDepartamento(),
    'fechaCreacionDepartamento' => $fechaFormateadaCreacion,
    'volumenNegocio' => $oDepartamentoPDO->getVolumenDeNegocio(),
    'FechaBaja' => $fechaFormateadaBaja
];

require_once $aVistas['layout'];
