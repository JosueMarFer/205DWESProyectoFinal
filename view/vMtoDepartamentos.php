<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
//Muestra los atributos de el objeto error con formato
?>
<form name="LoginLogoffDepartamento" method="post">
    <fieldset>
        <div class="formElement">
            <label for="descDepartamento">Descripcion de departamento (Introducir en blanco para mostrarlos todos):</label>
            <input class="opcional" type="text" id="descDepartamento" name="descDepartamento" value="<?php echo $REQUEST['descDepartamento'] ?? '' ?>"/>
            <?php (isset($aErrores['descDepartamento'])) ? print '<p style="color: red; display: inline;">' . $aErrores['descDepartamento'] . '</p>' : ''; ?>
            <input type="submit" value="Buscar Departamentos" name="buscarDepartamentos" />
        </div>
        <?php
//Mostrar el numero de registros
        if (isset($oResultado)) {
            echo 'El numero de Registros es: ' . $oResultado->rowCount();
//Almacenar en un objeto el resultado de cada consulta
//cada vez que se le asigna un nuevo fetchobject() se almacena una nueva fila de la consulta
//Imprime el resultado en formato de tabla
            echo '<table><thead><tr><th>T02_CodDepartamento</th><th>T02_DescDepartamento</th><th>T02_FechaCreacionDepartamento</th><th>T02_VolumenNegocio</th><th>T02_FechaBaja</th></tr></thead><tbody>';

            for ($index = 0; $index < $oResultado->rowCount(); $index++) {
                $FechaCreacionDepartamentoFormateada = new DateTime($aResultados[$index]->getFechaCreacionDepartamento());
                $FechaCreacionDepartamentoFormateada = $FechaCreacionDepartamentoFormateada->format("d-m-Y H:i:s");
                if (!is_null($aResultados[$index]->getFechaBajaDepartamento())) {
                    $fechaBajaFormateada = new DateTime($aResultados[$index]->getFechaBajaDepartamento());
                    $fechaBajaFormateada = $fechaBajaFormateada->format("d-m-Y H:i:s");
                } else {
                    $fechaBajaFormateada = '';
                }
                echo '<tr><td>' . $aResultados[$index]->getCodDepartamento() . '</td>';
                echo '<td>' . $aResultados[$index]->getDescDepartamento() . '</td>';
                echo '<td>' . $FechaCreacionDepartamentoFormateada . '</td>';
                echo '<td>' . $aResultados[$index]->getVolumenDeNegocio() . '</td>';
                echo '<td>' . $fechaBajaFormateada . '</td></tr>';
            }
            echo '</table>';
        }
        ?>
    </fieldset>
    <div class="formElement">             
        <input type="submit" value="Volver" name="v
               olver" />
    </div>
</form>
