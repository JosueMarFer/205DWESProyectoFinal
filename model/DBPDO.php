<?php

/** 
 * Clase consultas SQL PDO
 * 
 * Clase para la ejecucion de consultas SQL con PDO
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */

class DBPDO implements DB {

  /** 
   * Funcion consultas SQL
   * 
   * Funcion para ejecutar consultas SQL
   * 
   * @param String $sentenciaSQL Codigo SQL a ejecutar.
   * @param Array $parametros Parametros opcionales, pueden ser nulos.
   * @return Object
   */
  public static function ejecutarConsulta($sentenciaSQL, $parametros = null) {
    try {
      $miDB = new PDO(HOSTPDO, USER, PASSWD);
      $oResultado = $miDB->prepare($sentenciaSQL);
      $oResultado->execute($parametros);
      return $oResultado;
    } catch (Exception $e) {
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
