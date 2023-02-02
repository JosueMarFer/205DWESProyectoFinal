<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
?>
<form name="LoginLogoffEditarPerfil" method="post">
  <fieldset>
    <div class="formElement">
      <label for="codUsuario">Codigo de usuario:</label>
      <input type="text" id="codUsuario" name="codUsuario" value="<?php $aErrores['codUsuario'] ? $oUsuario->getCodUsuario() : '' ?>"/>
      <?php (isset($aErrores['codUsuario'])) ? print '<p style="color: red; display: inline;">' . $aErrores['codUsuario'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="descUsuario">Descripcion de usuario:</label>
      <input type="text" id="descUsuario" name="descUsuario" value="<?php $aErrores['descUsuario'] ? $oUsuario->getDescUsuario() : '' ?>"/>
      <?php (isset($aErrores['descUsuario'])) ? print '<p style="color: red; display: inline;">' . $aErrores['descUsuario'] . '</p>' : ''; ?>
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
