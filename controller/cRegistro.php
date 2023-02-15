<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023    
//Si se ha pulsado el boton de cancelar vuelve al login
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = 'login';
    header('Location: ./index.php');
    exit();
}
//Define e inicializa el array de errores
$aErrores = [
    'codUsuario' => '',
    'password' => '',
    'repetirPassword' => '',
    'descUsuario' => ''
];
//Define e inicializa la variable encargada de comprobar si los datos estan validados
$entradaOK = true;
//Si se ha pulsado el boton de registro valida los campos
//en caso de devolver algun error almacena el mismo en el array de errores (en su campo correspondiente)
if (isset($_REQUEST['registro'])) {
    $aErrores['codUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codUsuario'], 8, 4, 1);
    $aErrores['password'] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 4, 1, 1);
    $aErrores['repetirPassword'] = validacionFormularios::validarPassword($_REQUEST['repetirPassword'], 8, 4, 1, 1);
    $aErrores['descUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descUsuario'], 255, 1, 1);
//Recorre el array de errores y en caso de tener alguno la variable que comprueba la entrada pasa a ser false
    foreach ($aErrores as $errorIndex => $errorValue) {
        if (isset($errorValue)) {
            $entradaOK = false;
            $_REQUEST[$errorIndex] = null;
        }
    }
//Comprueba si el usuario existe en la  BBDD en ese caso añade un registro al array de errores y la entrada pasa a ser false.
//Si existe devuelve el objeto usuario y lo almacena en una variable
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
//Si la entrada es correcta...
    if ($entradaOK) {
//Añade la cookie de idioma a la sesion:
        setcookie('idioma', $_REQUEST['idioma'], time() + 300);
//Crea el usuario en la BBDD y lo instancia
        $oUsuario = UsuarioPDO::altaUsuario($_REQUEST['codUsuario'], $_REQUEST['password'], $_REQUEST['descUsuario']);
//Actualiza el numero de conexiones y sincroniza el objeto usuario con el usuario de la BBDD
        $oUsuario = UsuarioPDO::registrarUltimaConexion($oUsuario);
//Almacena el sa sesion el objeto del usuario logeado        
        $_SESSION['usuarioMiAplicacion'] = $oUsuario;
//Redirige a inicio privado        
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: ./index.php');
        exit();
    }
}
require_once $aVistas['layout'];
?>

