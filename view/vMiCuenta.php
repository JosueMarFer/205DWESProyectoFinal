<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
?>
<form name="LoginLogoffEditarPerfil" method="post">
    <fieldset>
        <div class="formElement">
            <label for="codUsuario">Codigo de usuario:</label>
            <input class="bloqueado" type="text" id="codUsuario" name="codUsuario" value="<?php echo $oUsuario->getCodUsuario() ?>" disabled />
        </div>
        <div class="formElement">
            <label for="descUsuario">Descripcion de usuario:</label>
            <input class="obligatorio" type="text" id="descUsuario" name="descUsuario" value="<?php echo ($aErrores['descUsuario'] ? '' : $oUsuario->getDescUsuario()) ?>"/>
            <?php (isset($aErrores['descUsuario'])) ? print '<p style="color: red; display: inline;">' . $aErrores['descUsuario'] . '</p>' : ''; ?>
        </div>
        <div class="formElement">
            <label for="numAccesos">Numero de accesos:</label>
            <input class="bloqueado" type="text" id="numAccesos" name="numAccesos" value="<?php echo $oUsuario->getNumAccesos() ?>" disabled />
        </div>  
        <div class="formElement">
            <label for="fechaHoraUltimaConexionAnterior">Fecha de la ultima conexion:</label>
            <input class="bloqueado" type="text" id="fechaHoraUltimaConexionAnterior" name="fechaHoraUltimaConexionAnterior" value="<?php echo $fechaFormateada ?>" disabled />
        </div> 
        <div class="formElement">
            <label for="perfil">perfil:</label>
            <input class="bloqueado" type="text" id="perfil" name="perfil" value="<?php echo $oUsuario->getperfil() ?>" disabled />
        </div>  
        <div class="formElement">
            <input type="submit" value="Editar perfil" name="editarPerfil" />
        </div>
    </fieldset>
    <div class="formElement">
        <p>¿Desea cambiar la contraseña?</p>
        <input type="submit" value="Cambiar password" name="cambiarPassword" />
        <p>¿Desea eliminar su cuenta?</p>
        <input type="submit" value="Borrar cuenta" name="borrarCuenta" />
    </div>
    <div class="formElement">
        <input type="submit" value="Volver" name="volver" />
    </div>
</form>
