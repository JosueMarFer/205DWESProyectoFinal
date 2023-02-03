<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023    
//Almacena en un array los atributos del objeto de error almacenado en la sesion.
////Si la sesion no tiene almcenado un usuario redirige al login
if (!isset($_SESSION['usuarioMiAplicacion']) || is_null($_SESSION['usuarioMiAplicacion'])) {
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: ./index.php');
    exit();
}
//Si se pulsa el boton de volver vuelve a inicio privado
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: ./index.php');
    exit();
}
//Define e inicializa el array de errores
$aErrores = [
    'descDepartamento' => ''
];
//Define e inicializa la variable encargada de comprobar si los datos estan validados
$entradaOK = true;
//Si se ha pulsado el boton de registro valida los campos
//en caso de devolver algun error almacena el mismo en el array de errores (en su campo correspondiente)
if (isset($_REQUEST['buscarDepartamentos'])) {
    $aErrores['descDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descDepartamento'], 255, 1, 0);
//Recorre el array de errores y en caso de tener alguno la variable que comprueba la entrada pasa a ser false
    foreach ($aErrores as $errorIndex => $errorValue) {
        if (isset($errorValue)) {
            $entradaOK = false;
            $_REQUEST[$errorIndex] = null;
        }
    }
//Si la entrada es correcta...
    if ($entradaOK) {
//Crea el usuario en la BBDD y lo instancia
        $oResultado = DepartamentoPDO::buscaDepartamentosPorDesc($_REQUEST['descDepartamento']);
        $aResultados = [];
        for ($index = 0; $index < $oResultado->rowCount(); $index++) {
            $oDepartamento = $oResultado->fetchObject();
            $oDepartamentoInstanciado= new Departamento($oDepartamento->T02_CodDepartamento, $oDepartamento->T02_DescDepartamento, $oDepartamento->T02_FechaCreacionDepartamento, $oDepartamento->T02_VolumenNegocio, ($oDepartamento->T02_FechaBajaDepartamento ?? null));
            array_push($aResultados, $oDepartamentoInstanciado);
        }
    }
}
require_once $aVistas['layout'];
?>

