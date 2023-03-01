<?php
/**
 * Vista Eliminar Departamentos
 * 
 * Vista Eliminar Departamentos
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
?>
<form name="LoginLogoffEliminarDepartamento" method="post">
  <fieldset>
    <div class="formElement">
      <input type="submit" value="Borrar departamento" name="borrarDepartamento" />
    </div>
    <div class="confirmacion">
      <?php
      echo '<h3>¿Esta seguro de que desea eliminar el Departamento de ' . $aDepartamentoEnCurso['descDepartamento'] . '?</h3>';
      ?>
    </div>
  </fieldset>
  <div class="formElement">
    <input type="submit" value="Cancelar" name="cancelar" />
  </div>
</form>
