<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023    
//Si se pulsa el boton de volver vuelve a inicio privado
if (isset($_REQUEST['volver'])) {
  $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
  header('Location: ./index.php');
  exit();
}
require_once $aVistas['layout'];
?>

