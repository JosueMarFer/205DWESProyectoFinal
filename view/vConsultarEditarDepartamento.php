<?php
/**
 * Vista Consultar/Editar de Departamentos
 * 
 * Vista Consultar/Editar de Departamentos
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
?>
<form name="LoginLogoffConsultarEditarDepartamento" method="post">
  <fieldset>
    <div class="formElement">
      <label for="codDepartamento">Codigo de departamento:</label>
      <input class="bloqueado" type="text" id="codDepartamento" name="codDepartamento" value="<?php echo $aDepartamentoEnCurso['codDepartamento'] ?>" disabled />
    </div>
    <div class="formElement">
      <label for="descDepartamento">Descripcion de departamento:</label>
      <input type="text" id="descDepartamento" name="descDepartamento" value="<?php echo ($aErrores['descDepartamento'] ? '' : $aDepartamentoEnCurso['descDepartamento']) ?>"/>
      <?php (isset($aErrores['descDepartamento'])) ? print '<p style="color: red; display: inline;">' . $aErrores['descDepartamento'] . '</p>' : ''; ?>
    </div>
    <div class="formElement">
      <label for="fechaCreacionDepartamento">Fecha de creacion:</label>
      <input class="bloqueado" type="text" id="fechaCreacionDepartamento" name="fechaCreacionDepartamento" value="<?php echo $aDepartamentoEnCurso['fechaCreacionDepartamento'] ?>" disabled />
    </div>  
    <div class="formElement">
      <label for="volumenNegocio">Volumen de negocio:</label>
      <input type="text" id="volumenNegocio" name="volumenNegocio" value="<?php echo ($aErrores['volumenNegocio'] ? '' : $aDepartamentoEnCurso['volumenNegocio']) ?>" />
      <?php (isset($aErrores['volumenNegocio'])) ? print '<p style="color: red; display: inline;">' . $aErrores['volumenNegocio'] . '</p>' : ''; ?>
    </div> 
    <div class="formElement">
      <label for="FechaBaja">Fecha de baja:</label>
      <input class="bloqueado" type="text" id="FechaBaja" name="FechaBaja" value="<?php echo $aDepartamentoEnCurso['FechaBaja'] ?>" disabled />
    </div>  
    <div class="formElement">
      <input type="submit" value="Editar departamento" name="editarDepartamento" />
    </div>
  </fieldset>
  <div class="formElement">
    <input type="submit" value="Cancelar" name="cancelar" />
  </div>
</form>