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
  $_SESSION['paginaEnCurso'] = 'inicioPrivado';
  header('Location: ./index.php');
  exit();
}
//Si se pulsa cambiar password envia a la pagina de cambiar password
if (isset($_REQUEST['cambiarPassword'])) {
  $_SESSION['paginaEnCurso'] = 'cambiarPassword';
  header('Location: ./index.php');
  exit();
}
//Si se pulsa borrar cuenta envia a la pagina de borrar cuenta
if (isset($_REQUEST['borrarCuenta'])) {
  $_SESSION['paginaEnCurso'] = 'borrarCuenta';
  header('Location: ./index.php');
  exit();
}

//Define e inicializa el array de errores
$aErrores = [
    'codUsuario' => '',
    'descUsuario' => ''
];
//Define e inicializa la variable encargada de comprobar si los datos estan validados
$entradaOK = true;
//Si se ha pulsado el boton de editar Perfil valida los campos
//en caso de devolver algun error almacena el mismo en el array de errores (en su campo correspondiente)
if (isset($_REQUEST['editarPerfil'])) {
  $aErrores['codUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codUsuario'], 8, 4, 1);
  $aErrores['descUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descUsuario'], 255, 1, 1);
//Recorre el array de errores y en caso de tener alguno la variable que comprueba la entrada pasa a ser false
  foreach ($aErrores as $errorIndex => $errorValue) {
    if (isset($errorValue)) {
      $entradaOK = false;
      $_REQUEST[$errorIndex] = null;
    }
  }
//Comprueba si el usuario ha sido editaado si no devuelve un error
//Si existe devuelve el objeto usuario y lo almacena en una variable
  if ($entradaOK) {
    $oUsuario = UsuarioPDO::validarCodNoExiste($_REQUEST['codUsuario']);
    if ($oUsuario) {
      $aErrores['codUsuario'] = 'El usuario ya existe';
      $entradaOK = false;
      $_REQUEST['codUsuario'] = null;
    }
  }
  //Si la entrada es correcta...
  if ($entradaOK) {
      $oUsuario = $_SESSION['usuarioMiAplicacion'];
//modifica el usuario en la BBDD y lo instancia
    $oUsuario = UsuarioPDO::modificarUsuario($_REQUEST['codUsuario'], $_REQUEST['descUsuario'], $oUsuario->getCodUsuario());
//Almacena en la sesion el objeto del usuario logeado        
    $_SESSION['usuarioMiAplicacion'] = $oUsuario;
//Redirige a inicio privado        
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: ./index.php');
    exit();
  }
}
$oUsuario = $_SESSION['usuarioMiAplicacion'];
require_once $aVistas['layout'];
?>
