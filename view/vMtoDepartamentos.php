<?php
/** 
 * Vista Mantenimiento de Departamentos
 * 
 * Vista Mantenimiento de Departamentos
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
?>
<form name="LoginLogoffDepartamento" method="post">
  <fieldset>
    <div class="formElement">
      <label for="descDepartamento">Descripcion de departamento (Introducir en blanco para mostrarlos todos):</label>
      <input class="opcional" type="text" id="descDepartamento" name="descDepartamento" value="<?php echo $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] ?? '' ?>"/>
      <?php (isset($aErrores['descDepartamento'])) ? print '<p style="color: red; display: inline;">' . $aErrores['descDepartamento'] . '</p>' : ''; ?>
      <input type="submit" value="Buscar Departamentos" name="buscarDepartamentos" />
    </div>
    <?php
    if (isset($aResultados)) {
      echo '<table><thead><tr><th>Codigo</th><th>Descripcion</th><th>Fecha creacion</th><th>Volumen de negocio</th><th>Fecha baja</th><th>Editar</th><th>Borrar</th><th>Baja</th><th>Alta</th></tr></thead><tbody>';

      for ($index = 0; $index < count($aResultados); $index++) {

        echo '<tr><td>' . $aResultados[$index]['codDepartamento'] . '</td>';
        echo '<td>' . $aResultados[$index]['descDepartamento'] . '</td>';
        echo '<td>' . $aResultados[$index]['fechaCreacionDepartamento'] . '</td>';
        echo '<td>' . $aResultados[$index]['volumenDeNegocio'] . '</td>';
        echo '<td>' . $aResultados[$index]['fechaBajaDepartamento'] . '</td>';
        echo '<td>' . '<button type="button" name="editar">Editar</button>' . '</td>';
        echo '<td>' . '<button type="button" name="borrar">Borrar</button>' . '</td>';
        echo '<td>' . '<button type="button" name="baja">Baja</button>' . '</td>';
        echo '<td>' . '<button type="button" name="alta">Alta</button>' . '</td></tr>';
      }
      echo '</table>';
    }
    ?>
  </fieldset>
  <div class="formElement">             
    <input type="submit" value="Volver" name="volver" />
  </div>
</form>
