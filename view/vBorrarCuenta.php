<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
?>
<form name="LoginLogoffBorrarCuenta" method="post">
    <fieldset>
        <p>Para eliminar la cuenta debe introducir la contraseña del usuario actual</p>
        <div class="formElement">
            <label for="contraseñaActual">Contraseña actual:</label>
            <input class="obligatorio" type="password" id="contraseñaActual" name="contraseñaActual"/>
            <?php (isset($aErrores['contraseñaActual'])) ? print '<p style="color: red; display: inline;">' . $aErrores['contraseñaActual'] . '</p>' : ''; ?>
        </div>
        <div class="formElement">
            <label for="repetirContraseñaActual">Repetir contraseña actual:</label>
            <input class="obligatorio" type="password" id="repetirContraseñaActual" name="repetirContraseñaActual"/>
            <?php (isset($aErrores['repetirContraseñaActual'])) ? print '<p style="color: red; display: inline;">' . $aErrores['repetirContraseñaActual'] . '</p>' : ''; ?>
        </div>
        <div class="formElement">
            <input type="submit" value="Borrar cuenta" name="borrarCuenta" />
        </div>
    </fieldset>
    <div class="formElement">
        <input type="submit" value="Volver" name="volver" />
    </div>
</form>
