<?php

/** 
 * Clase DepartamentoPDO
 * 
 * Clase utilizada para las operaciones con los departamentos.
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */

class DepartamentoPDO {

  /**
   * Busca departamentos por descripcion.
   * 
   * Busca departamentos por su descripcion y devuelve una lista de los mismos.
   * 
   * @param String $descDepartamento
   * @return List 
   */
  public static function buscaDepartamentosPorDesc($descDepartamento) {
    //Definicion de la sentencia SQL
    $sqlBuscarDepartamentoDesc = "SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$descDepartamento}%';";
    $oResultado = DBPDO::ejecutarConsulta($sqlBuscarDepartamentoDesc);
    return $oResultado;
  }

  /**
   * Busca departamentos por su codigo.
   * 
   * Busca departamentos por su codigo y devuelve una lista de los mismos.
   * 
   * @param String $codDepartamento
   * @return List
   */
  public static function buscaDepartamentosPorCod($codDepartamento) {
    //Definicion de la sentencia SQL
    $$sqlBuscarDepartamentoCod = "SELECT * FROM T02_Departamento WHERE T02_CodDepartamento ='{$codDepartamento}';";
    $oResultado = DBPDO::ejecutarConsulta($sqlBuscarDepartamentoCod);
    return $oResultado;
  }

}
