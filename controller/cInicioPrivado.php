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
//Carga el usuario almacenado en la sesion en un objeto
$oUsuario = $_SESSION['usuarioMiAplicacion'];
$fechaFormateada = new DateTime($oUsuario->getFechaHoraUltimaConexionAnterior());
$fechaFormateada = $fechaFormateada->format("d-m-Y H:i:s");
//Si se pulsa salir se destruye la sesion y se redirige a inicio publico
if (isset($_REQUEST['cerrarSesion'])) {
    $_SESSION['usuarioMiAplicacion'] = null;
    unset($oUsuario);
    session_destroy();
    header('Location: ./index.php');
    exit();
}
//Si se pulsa detalle envia a la pagina de detalle
if (isset($_REQUEST['detalle'])) {
    $_SESSION['paginaEnCurso'] = 'detalle';
    header('Location: ./index.php');
    exit();
}
//Si se pulsa error envia a la pagina de error
if (isset($_REQUEST['error'])) {
    DBPDO::ejecutarConsulta('SELECT * FROM TablaQueNoExiste');
}
//Si se pulsa editar perfil envia a la pagina de editar perfil
if (isset($_REQUEST['miCuenta'])) {
    $_SESSION['paginaEnCurso'] = 'miCuenta';
    header('Location: ./index.php');
    exit();
}
//Si se pulsa mantenimiento de departamentos envia a la pagina de mantenimiento de departamentos
if (isset($_REQUEST['MtoDepartamentos'])) {
    $_SESSION['paginaEnCurso'] = 'wip';
    header('Location: ./index.php');
    exit();
}
//Si se pulsa rest envia a la pagina de rest
if (isset($_REQUEST['rest'])) {
    $_SESSION['paginaEnCurso'] = 'rest';
    header('Location: ./index.php');
    exit();
}
require_once $aVistas['layout'];
?>

