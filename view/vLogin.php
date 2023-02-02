<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
?>
<form name="LoginLogoffLogin" method="post">
  <fieldset>
    <legend>Login</legend>
    <div class="formElement">
      <label for="codUsuario">Codigo de usuario:</label>
      <input type="text" id="codUsuario" name="codUsuario"/>
      <?php (isset($aErrores['codUsuario'])) ? print '<p style="color: red; display: inline;">' . $aErrores['codUsuario'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password"/>
      <?php (isset($aErrores['password'])) ? print '<p style="color: red; display: inline;">' . $aErrores['password'] . '</p>' : ''; ?>
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
      <input type="submit" value="Iniciar sesion" name="iniciarSesion" />
    </div>
  </fieldset>
  <div class="formElement">                                    
    <p>¿Aún no tienes un usuario? Registrate:</p>
    <input type="submit" value="Registrar" name="registro" />
  </div>  
  <div class="formElement">                                    
    <input type="submit" value="Volver" name="volver" />
  </div>
  <form>
