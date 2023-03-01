<?php

/**
 * Controlador Consultar/Editar de Departamentos
 * 
 * Controlador Consultar/Editar de Departamentos
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
    'descDepartamento' => '',
    'volumenNegocio' => ''
];
$entradaOK = true;
if (isset($_REQUEST['editarDepartamento'])) {

    $aErrores['descDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 1);
    $aErrores['volumenNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'], obligatorio: 1);
    foreach ($aErrores as $errorIndex => $errorValue) {
        if (isset($errorValue)) {
            $entradaOK = false;
            $_REQUEST[$errorIndex] = null;
        }
    }
    if ($entradaOK) {
        DepartamentoPDO::modificaDepartamento($_SESSION['codDepartamentoEnCurso'], $_REQUEST['descDepartamento'], $_REQUEST['volumenNegocio']);
        $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        header('Location: ./index.php');
        exit();
    }
}
$oDepartamentoPDO = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']);
$oDepartamentoPDO = $oDepartamentoPDO->fetchObject();
$oDepartamentoPDO = new Departamento($oDepartamentoPDO->T02_CodDepartamento, $oDepartamentoPDO->T02_DescDepartamento, $oDepartamentoPDO->T02_FechaCreacionDepartamento, $oDepartamentoPDO->T02_VolumenNegocio, $oDepartamentoPDO->T02_FechaBaja);
$fechaFormateadaCreacion = new DateTime($oDepartamentoPDO->getFechaCreacionDepartamento());
$fechaFormateadaCreacion = $fechaFormateadaCreacion->format("d-m-Y H:i:s");
if (!is_null($oDepartamentoPDO->getFechaBajaDepartamento())) {
    $fechaFormateadaBaja = new DateTime($oDepartamentoPDO->getFechaBajaDepartamento());
    $fechaFormateadaBaja = $fechaFormateadaBaja->format("d-m-Y H:i:s");
} else {
    $fechaFormateadaBaja = null;
}

$aDepartamentoEnCurso = [
    'codDepartamento' => $oDepartamentoPDO->getCodDepartamento(),
    'descDepartamento' => $oDepartamentoPDO->getDescDepartamento(),
    'fechaCreacionDepartamento' => $fechaFormateadaCreacion,
    'volumenNegocio' => $oDepartamentoPDO->getVolumenDeNegocio(),
    'FechaBaja' => $fechaFormateadaBaja
];

require_once $aVistas['layout'];
