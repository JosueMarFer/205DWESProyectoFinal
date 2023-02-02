<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023   
//Si la sesion no tiene almcenado un usuario redirige al login
if (!isset($_SESSION['usuarioMiAplicacion']) || is_null($_SESSION['usuarioMiAplicacion'])) {
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: ./index.php');
    exit();
}
//Si se pulsa cambiar volver envia a la pagina de inicio privado
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = 'miCuenta';
    header('Location: ./index.php');
    exit();
}

$oUsuario = $_SESSION['usuarioMiAplicacion'];

//Define e inicializa el array de errores
$aErrores = [
    'contraseñaActual' => '',
    'repetirContraseñaActual' => ''
];
//Define e inicializa la variable encargada de comprobar si los datos estan validados
$entradaOK = true;
//Si se ha pulsado el boton de editar Perfil valida los campos
//en caso de devolver algun error almacena el mismo en el array de errores (en su campo correspondiente)
if (isset($_REQUEST['borrarCuenta'])) {
    $aErrores['contraseñaActual'] = validacionFormularios::validarPassword($_REQUEST['contraseñaActual'], 8, 4, 1, 1);
    $aErrores['repetirContraseñaActual'] = validacionFormularios::validarPassword($_REQUEST['repetirContraseñaActual'], 8, 4, 1, 1);
//Recorre el array de errores y en caso de tener alguno la variable que comprueba la entrada pasa a ser false
    foreach ($aErrores as $errorIndex => $errorValue) {
        if (isset($errorValue)) {
            $entradaOK = false;
            $_REQUEST[$errorIndex] = null;
        }
    }
    if ($entradaOK) {
        if ($_REQUEST['contraseñaActual'] != $_REQUEST['repetirContraseñaActual']) {
            $aErrores['repetirContraseñaActual'] = 'Las contraseñas no coinciden';
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        $contraseñaActualCifrada = (hash('sha256', ($oUsuario->getCodUsuario() . $_REQUEST['contraseñaActual'])));
        if ($contraseñaActualCifrada != $oUsuario->getPassword()) {
            $aErrores['contraseñaActual'] = 'Error, la contraseña introducida no es correcta';
            $entradaOK = false;
        }
    }
//Si la entrada es correcta...
    if ($entradaOK) {
//modifica el usuario en la BBDD y lo elimina
//destruye la sesion
        $oUsuario = UsuarioPDO::borrarrUsuario($oUsuario);
        $_SESSION['usuarioMiAplicacion'] = null;
        unset($oUsuario);
    session_destroy();
//Redirige a inicio privado        
        $_SESSION['paginaEnCurso'] = 'cambiarPassword';
        header('Location: ./index.php');
        exit();
    }
}
require_once $aVistas['layout'];
?>

