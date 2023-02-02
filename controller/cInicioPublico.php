<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023    
//Si se ha pulsado el boton de login redirige al login
if (isset($_REQUEST['login'])) {
  $_SESSION['paginaEnCurso'] = 'login';
  header('Location: ./index.php');
  exit();
}
require_once $aVistas['layout'];
?>

