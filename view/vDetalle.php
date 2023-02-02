<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
?>
<form name="LoginLogoffDetalle" method="post">
    <div class="formElement">             
        <input type="submit" value="Volver" name="volver" />
    </div>
</form>
<?php
//Obtiene la clave del array y el dato almacenado en el mismo (SUPERGLOBALES)  
echo '<h2>$_SESSION</h2><table>';
foreach ($_SESSION as $campo => $valorCampo) {
    echo '<tr><td>' . $campo . '</td>';
    if (is_object($valorCampo)) {
        echo '<td><table>';
        foreach ((Array)$valorCampo as $campo2 => $valorCampo2) {
            if ($valorCampo2 instanceof DateTime) {
                echo '<tr><td>' . $campo2 . '</td><td>' . $valorCampo2->format("d-m-Y H:i:s") . '</td></tr>';
            } else {
                echo '<tr><td>' . $campo2 . '</td><td>' . $valorCampo2 . '</td></tr>';
            }
        }
        echo '</td></table>';
    } else {
        echo '<td>' . $valorCampo . '</td>';
    }
}
echo '</table>';
echo '<h2>$_COOKIE</h2><table>';
foreach ($_COOKIE as $campo => $valorCampo) {
    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
}
echo '</table>';
echo '<h2>$_ENV</h2><table>';
foreach ($_ENV as $campo => $valorCampo) {
    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
}
echo '</table>';
echo '<h2>$_FILES</h2><table>';
foreach ($_FILES as $campo => $valorCampo) {
    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
}
echo '</table>';
echo '<h2>$_GET</h2><table>';
foreach ($_GET as $campo => $valorCampo) {
    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
}
echo '</table>';
echo '<h2>$_POST</h2><table>';
foreach ($_POST as $campo => $valorCampo) {
    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
}
echo '</table>';
echo '<h2>$_REQUEST</h2><table>';
foreach ($_REQUEST as $campo => $valorCampo) {
    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
}
echo '</table>';
echo '<h2>$_SERVER</h2><table>';
foreach ($_SERVER as $campo => $valorCampo) {
    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
}
echo '</table>';
//Almacenar en el buffer la salida de phpinfo para poder a traves de 
//una expresion regular tan solo recoger la tabla (sin formato) 
echo '<section>';
ob_start();
phpinfo();
$pinfo = ob_get_contents();
ob_end_clean();
$pinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo);
echo $pinfo;
echo '</section>';
?>

