<?php

/** 
 * Interfaz SQL
 * 
 * Interfaz para la ejecucion de consultas SQL
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */

interface DB {

  /** 
   * Funcion consultas SQL
   * 
   * Funcion para ejecutar consultas SQL
   * 
   * @param String $sentenciaSQL Codigo SQL a ejecutar.
   * @param Array $parametros Parametros opcionales, pueden ser nulos.
   */
  public static function ejecutarConsulta($sentenciaSQL, $parametros = null);
}
