<?php
/** 
 * Vista Cambiar password
 * 
 * Vista Cambiar password
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
?>
<form name="LoginLogoffCambiarPassword" method="post">
  <fieldset>
    <div class="formElement">
      <label for="nuevaContraseña">Nueva contraseña:</label>
      <input type="password" id="nuevaContraseña" name="nuevaContraseña"/>
      <?php (isset($aErrores['nuevaContraseña'])) ? print '<p style="color: red; display: inline;">' . $aErrores['nuevaContraseña'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="repetirNuevaContraseña">Repetir nueva contraseña:</label>
      <input type="password" id="repetirNuevaContraseña" name="repetirNuevaContraseña"/>
      <?php (isset($aErrores['repetirNuevaContraseña'])) ? print '<p style="color: red; display: inline;">' . $aErrores['repetirNuevaContraseña'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="contraseñaActual">Contraseña actual:</label>
      <input type="password" id="contraseñaActual" name="contraseñaActual"/>
      <?php (isset($aErrores['contraseñaActual'])) ? print '<p style="color: red; display: inline;">' . $aErrores['contraseñaActual'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <input type="submit" value="Cambiar password" name="cambiarPassword" />
    </div>
  </fieldset>
  <div class="formElement">
    <input type="submit" value="Volver" name="volver" />
  </div>
</form>
