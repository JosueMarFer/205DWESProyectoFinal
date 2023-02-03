<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
if (isset($_COOKIE['idioma'])) {
    switch ($_COOKIE['idioma']) {
        case "espanol":
            echo '<h3>Bienvenido ' . $oUsuario->getCodUsuario() . '</h3>';
            echo '<h3>Se ha conectado: ' . $oUsuario->getNumAccesos() . ' veces</h3>';
            if ($oUsuario->getNumAccesos() > 1) {
                echo '<h3>Su ultima conexion ha sido: ' . $fechaFormateada . '</h3>';
            }
            break;
        case "portugues":
            echo '<h3>Bem-vindo ' . $oUsuario->getCodUsuario() . '</h3>';
            echo '<h3>conectou: ' . $oUsuario->getNumAccesos() . ' vezes</h3>';
            if ($oUsuario->getNumAccesos() > 1) {
                echo '<h3>Sua última conexão foi:: ' . $fechaFormateada . '</h3>';
            }
            break;
        case "ingles":
            echo '<h3>Wellcome ' . $oUsuario->getCodUsuario() . '</h3>';
            echo '<h3>Has conected: ' . $oUsuario->getNumAccesos() . ' times</h3>';
            if ($oUsuario->getNumAccesos() > 1) {
                echo '<h3>Your last connection has been: ' . $fechaFormateada . '</h3>';
            }
            break;
    }
} else {
    echo '<h3>Bienvenido ' . $oUsuario->getCodUsuario() . '</h3>';
    echo '<h3>Se ha conectado: ' . $oUsuario->getNumAccesos() . ' veces</h3>';
    if ($oUsuario->getNumAccesos() > 1) {
        echo '<h3>Su ultima conexion ha sido: ' . $fechaFormateada . '</h3>';
    }
}
?>
<form name="LoginLogoffInicioPrivado" method="post">
    <div class="formElement">             
        <input type="submit" value="Detalle" name="detalle" />
        <input type="submit" value="Error" name="error" />
        <input type="submit" value="Mi cuenta" name="miCuenta" />
        <input type="submit" value="Mantenimiento de departamentos" name="mtoDepartamentos" />
        <input type="submit" value="Rest" name="rest" />
    </div>
        <div class="formElement">             
        <input type="submit" value="Cerrar sesion" name="cerrarSesion" />
    </div>
</form>
