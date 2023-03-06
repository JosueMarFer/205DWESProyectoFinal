<?php
/**
 * Vista Rest
 * 
 * Vista Rest
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
?>
<form name="LoginLogoffRest" method="post">
    <fieldset>
        <div class="formElement">             
            <label for="nombrePokemon">Nombre del pokemon:</label>
            <input type="text" id="nombrePokemon" name="nombrePokemon"/>
            <?php (isset($aErrores['nombrePokemon'])) ? print '<p style="color: red; display: inline;">' . $aErrores['nombrePokemon'] . '</p>' : ''; ?>
        </div>
        <div class="formElement">             
            <input type="submit" value="Mostrar Informacion" name="mostrarInformacion" />
            <input type="submit" value="Volver" name="volver" />               
        </div>
    </fieldset>
</form>
<?php
if (!is_null($aPokemon)) {
    ?>
    <table class="tarjetaPokemon">
        <tr>
            <td colspan="2">
                <img class="imgPokemon" src="<?php echo $aPokemon['sprites']['other']['official-artwork']['front_default'] ?>"></img>
            </td>
        </tr>
        <tr>
            <td>
                <img class="spritePokemon" src="<?php echo $aPokemon['sprites']['front_default']?>"></img>
            </td>
            <td>
                <img class="spritePokemon" src="<?php echo $aPokemon['sprites']['front_shiny']?>"></img>
            </td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><?php echo $aPokemon['name'] ?></td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td><?php echo $aPokemon['types']['0']['type']['name'] ?></td>
        </tr>
    </table>
    <?php
} else if(!isset($aErrores['nombrePokemon'])){
    echo '<p style="color: red; display: inline;">' . 'El pokemon introducido no existe, introduzca un pokemon valido' . '</p>';
}
?>
