<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
//Muestra los atributos de el objeto error con formato
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