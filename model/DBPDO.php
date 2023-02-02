<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023  
class DBPDO implements DB {

//Funcion que ejecuta una sentencia SQL
  public static function ejecutarConsulta($sentenciaSQL, $parametros = null) {
    try {
//Conexion con la BBDD
      $miDB = new PDO(HOSTPDO, USER, PASSWD);
//Preparar y ejecutar la consulta
      $oResultado = $miDB->prepare($sentenciaSQL);
      $oResultado->execute($parametros);
      return $oResultado;
    } catch (Exception $e) {
//Si sucede un error instancia un objeto y lo almacena en la sesion         
      $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
      $_SESSION['paginaEnCurso'] = 'error';
      $_SESSION['error'] = new ERRORApp($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine(), $_SESSION['paginaAnterior']);
      header('Location: ./index.php');
      exit();
    } finally {
      unset($miDB);
    }
  }

}
