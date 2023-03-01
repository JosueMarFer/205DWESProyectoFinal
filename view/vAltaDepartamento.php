<?php
/**
 * Vista Alta de Departamentos
 * 
 * Vista Alta de Departamentos
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
?>
<form name="LoginLogoffAltaDepartamento" method="post">
  <fieldset>
    <div class="formElement">
      <label for="codDepartamento">Codigo de departamento:</label>
      <input type="text" id="codDepartamento" name="codDepartamento" value="<?php echo (isset($aErrores['codDepartamento']) ? '' : $_REQUEST['codDepartamento']) ?>"/>
      <?php (isset($aErrores['codDepartamento'])) ? print '<p style="color: red; display: inline;">' . $aErrores['codDepartamento'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="descDepartamento">Descripcion de departamento:</label>
      <input type="text" id="descDepartamento" name="descDepartamento" value="<?php echo (isset($aErrores['descDepartamento']) ? '' : $_REQUEST['descDepartamento']) ?>"/>
      <?php (isset($aErrores['descDepartamento'])) ? print '<p style="color: red; display: inline;">' . $aErrores['descDepartamento'] . '</p>' : ''; ?>
    </div>  
    <div class="formElement">
      <label for="volumenNegocio">Volumen de negocio:</label>
      <input type="text" id="volumenNegocio" name="volumenNegocio" value="<?php echo (isset($aErrores['volumenNegocio']) ? '' : $_REQUEST['volumenNegocio']) ?>"/>
      <?php (isset($aErrores['volumenNegocio'])) ? print '<p style="color: red; display: inline;">' . $aErrores['volumenNegocio'] . '</p>' : ''; ?>
    </div>  
    <div class="formElement">
      <input type="submit" value="Crear departamento" name="crearDepartamento" />
    </div>
  </fieldset>
  <div class="formElement">
    <input type="submit" value="Cancelar" name="cancelar" />
  </div>
</form>