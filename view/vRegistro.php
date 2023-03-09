<?php
/**
 * 
 * Vista Registro
 * 
 * Vista Registro
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
?>
<script defer src="./webroot/scripts/captcha.js"></script>
<form name="ProyectoLoginLogoffTema5Registro" method="post" id="formulario">
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
      <input type="submit" value="Registrar" id="registrar" name="registro" />
    </div>
    <div id="captcha" class="captcha">
      <p>DEMUESTRA QUE NO ERES UN ROBOT:</p>
      <div id="num1" class="cuestion"></div>
      <div class="cuestion">+</div>
      <div id="num2" class="cuestion"></div>
      <div class="cuestion">=</div>
      <div class="cuestion resultado"></div>

      <div id="sol1" class="opcaptcha"></div>
      <div id="sol2" class="opcaptcha"></div>
      <div id="sol3" class="opcaptcha"></div>
    </div>
  </fieldset>
  <div class="formElement">
    <input type="submit" value="Cancelar" name="cancelar" />
  </div>
</form>
