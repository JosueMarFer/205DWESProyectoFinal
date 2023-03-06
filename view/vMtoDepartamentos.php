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
            <input class="crearDepartamento" type="submit" value="Crear Departamento" name="crear" />
        </div>
        <div class="formElementRD">
            <p>Estado:</p>
            <?php
            if ($_SESSION['criterioBusquedaDepartamentos']['estado'] == 0) {
                ?>
                <label for = "rdAlta">ALTA</label>
                <input type = "radio" id = "rdAlta" name = "estado" value = "2">
                <label for = "rdBaja">BAJA</label>
                <input type = "radio" id = "rdBaja" name = "estado" value = "1">
                <label for = "rdTodos">TODOS</label>
                <input type = "radio" id = "rdTodos" name = "estado" value = "0" checked>
                <?php
            } else {
                if ($_SESSION['criterioBusquedaDepartamentos']['estado'] == 1) {
                    ?>
                    <label for = "rdAlta">ALTA</label>
                    <input type = "radio" id = "rdAlta" name = "estado" value = "2">
                    <label for = "rdBaja">BAJA</label>
                    <input type = "radio" id = "rdBaja" name = "estado" value = "1" checked>
                    <label for = "rdTodos">TODOS</label>
                    <input type = "radio" id = "rdTodos" name = "estado" value = "0">
                    <?php
                } else {
                    if ($_SESSION['criterioBusquedaDepartamentos']['estado'] == 2) {
                        ?>
                        <label for = "rdAlta">ALTA</label>
                        <input type = "radio" id = "rdAlta" name = "estado" value = "2" checked>
                        <label for = "rdBaja">BAJA</label>
                        <input type = "radio" id = "rdBaja" name = "estado" value = "1">
                        <label for = "rdTodos">TODOS</label>
                        <input type = "radio" id = "rdTodos" name = "estado" value = "0">
                        <?php
                    }
                }
            }
            ?>
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
                echo '<td>' . '<button type="submit" name="editar" value="' . $aResultados[$index]['codDepartamento'] . '">Editar</button>' . '</td>';
                echo '<td>' . '<button type="submit" name="borrar" value="' . $aResultados[$index]['codDepartamento'] . '">Borrar</button>' . '</td>';
                echo '<td>' . '<button type="submit" name="baja" value="' . $aResultados[$index]['codDepartamento'] . '"><img src="./webroot/images/downArrow.png" alt="flecha abajo"></button>' . '</td>';
                echo '<td>' . '<button type="submit" name="alta" value="' . $aResultados[$index]['codDepartamento'] . '"><img src="./webroot/images/upArrow.png" alt="flecha arriba"></button>' . '</td></tr>';
            }
            echo '<tr class="celdasVacias" ><td>';
            if ($mostrarbotonAntes) {
                echo '<button type="submit" name="paginaAnterior"><img src="./webroot/images/leftArrow.png" alt="flecha izquierda"></button>';
            };
            echo '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>';
            if ($mostrarbotonDespues) {
                echo '<button type="submit" name="paginaSiguiente"><img src="./webroot/images/rightArrow.png" alt="flecha derecha"></button>';
            };
            echo '</td></tr></table>';
        }
        ?>
    </fieldset>
    <div class="formElement">             
        <input type="submit" value="Volver" name="volver" />
    </div>
</form>
