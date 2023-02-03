<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
?>
<form name="ProyectoLoginLogoffTema5Registro" method="post">
  <fieldset>
    <legend>Registro</legend>
    <div class="formElement">
      <label for="codUsuario">Codigo de usuario:</label>
      <input type="text" id="codUsuario" name="codUsuario" value="<?php echo $_REQUEST['codUsuario'] ?? '' ?>"/>
      <?php (!is_null($aErrores['codUsuario'])) ? print '<p style="color: red; display: inline;">' . $aErrores['codUsuario'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password"/>
      <?php (!is_null($aErrores['password'])) ? print '<p style="color: red; display: inline;">' . $aErrores['password'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="repetirPassword">Repetir Contraseña:</label>
      <input type="password" id="repetirPassword" name="repetirPassword"/>
      <?php (!is_null($aErrores['repetirPassword'])) ? print '<p style="color: red; display: inline;">' . $aErrores['repetirPassword'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="descUsuario">Descripcion de usuario:</label>
      <input type="text" id="descUsuario" name="descUsuario" value="<?php echo $_REQUEST['descUsuario'] ?? '' ?>"/>
      <?php (!is_null($aErrores['descUsuario'])) ? print '<p style="color: red; display: inline;">' . $aErrores['descUsuario'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="idioma">Selecionar idioma:</label>
      <select id="idioma" name="idioma">
        <option value="espanol">Español</option>
        <option value="portugues">Portugués</option>
        <option value="ingles">Ingles</option>
      </select>
    </div>
    <div class="formElement">
      <input type="submit" value="Registrar" name="registro" />
    </div>
  </fieldset>
  <div class="formElement">
    <input type="submit" value="Cancelar" name="cancelar" />
  </div>
</form>
