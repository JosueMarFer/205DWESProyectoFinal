<?php
/** 
 * Vista Error
 * 
 * Vista Error
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
?>
<form name="LoginLogoffError" method="post">
  <div class="formElement">             
    <input type="submit" value="Volver" name="volver" />
  </div>
</form>
<?php
echo '<table><tbody>';
foreach ($aError as $campo => $valorCampo) {
  echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
}
echo '</tbody></table>';
?>