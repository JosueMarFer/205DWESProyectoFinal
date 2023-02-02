<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
?>
<form name="LoginLogoffCambiarPassword" method="post">
    <fieldset>
        <div class="formElement">
            <label for="nuevaContraseña">Nueva contraseña:</label>
            <input class="obligatorio" type="password" id="nuevaContraseña" name="nuevaContraseña"/>
            <?php (isset($aErrores['nuevaContraseña'])) ? print '<p style="color: red; display: inline;">' . $aErrores['nuevaContraseña'] . '</p>' : ''; ?>
        </div>
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
            <input type="submit" value="Cambiar password" name="cambiarPassword" />
        </div>
    </fieldset>
    <div class="formElement">
        <input type="submit" value="Volver" name="volver" />
    </div>
</form>
