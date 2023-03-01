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
   * @param Integer $limiteDepartamento
   * @return List 
   */
  public static function buscaDepartamentoPorDesc($descDepartamento, $limiteDepartamento) {
    $sqlBuscarDepartamentoDesc = "SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$descDepartamento}%' LIMIT {$limiteDepartamento},5;";
    $oResultado = DBPDO::ejecutarConsulta($sqlBuscarDepartamentoDesc);
    return $oResultado;
  }
  
  /**
   * Cantidad de departamentos por descripcion.
   * 
   * Busca departamentos por su descripcion y devuelve el numero de registros.
   * 
   * @param String $descDepartamento
   * @return Integer 
   */
  public static function cantidadDepartamentoPorDesc($descDepartamento) {
    $sqlCantidadDepartamentoDesc = "SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$descDepartamento}%';";
    $oResultado = DBPDO::ejecutarConsulta($sqlCantidadDepartamentoDesc);
    return $oResultado->rowCount();
  }

  /**
   * Busca departamentos por su codigo.
   * 
   * Busca departamentos por su codigo y devuelve una lista de los mismos.
   * 
   * @param String $codDepartamento
   * @return List
   */
  public static function buscaDepartamentoPorCod($codDepartamento) {
    $sqlBuscarDepartamentoCod = "SELECT * FROM T02_Departamento WHERE T02_CodDepartamento ='{$codDepartamento}';";
    $oResultado = DBPDO::ejecutarConsulta($sqlBuscarDepartamentoCod);
    return $oResultado;
  }

  /**
   * Valida si un codigo existe.
   * 
   * Valida si un codigo existe como registro en la BD.
   * 
   * @param String $codDepartamento
   * @return Boolean
   */
  public static function validaCodNoExiste($codDepartamento) {
    $sqlValidarCodNoExiste = "SELECT * FROM T02_Departamento WHERE T02_CodDepartamento ='{$codDepartamento}';";
    $oResultado = DBPDO::ejecutarConsulta($sqlValidarCodNoExiste);
    $DepartamentoResultado = $oResultado->fetchObject();
    if ($DepartamentoResultado) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Rehabilitacion logica de un departamento.
   * 
   * Elimina la fecha de baja de un departamento en la BD.
   * 
   * @param String $codDepartamento
   * @return Boolean
   */
  public static function rehabilitaDepartamento($codDepartamento) {
    $sqlRehabilitar = "UPDATE T02_Departamento SET T02_FechaBaja = null WHERE T02_CodDepartamento = '{$codDepartamento}';";
    $rehabilitado = DBPDO::ejecutarConsulta($sqlRehabilitar);
    if ($rehabilitado) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Baja logica de un departamento.
   * 
   * Añade la fecha de baja de un departamento en la BD.
   * 
   * @param String $codDepartamento
   * @return Boolean
   */
  public static function bajaLogicaDepartamento($codDepartamento) {
    $sqlBajaLogica = "UPDATE T02_Departamento SET T02_FechaBaja = NOW() WHERE T02_CodDepartamento = '{$codDepartamento}';";
    $eliminado = DBPDO::ejecutarConsulta($sqlBajaLogica);
    if ($eliminado) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Modifica un departamento.
   * 
   * Modifica un departamento por su codigo en la BD.
   * 
   * @param String $codDepartamento
   * @param String $descDepartamento
   * @param String $volumenDeNegocio
   * @return Boolean
   */
  public static function modificaDepartamento($codDepartamento, $descDepartamento = null, $volumenDeNegocio = null) {
    $sqlActualizarDescripcion = "UPDATE T02_Departamento SET T02_DescDepartamento = '{$descDepartamento}' WHERE T02_CodDepartamento = '{$codDepartamento}';";
    $sqlActualizarVolumenDeNegocio = "UPDATE T02_Departamento SET T02_VolumenNegocio = '{$volumenDeNegocio}' WHERE T02_CodDepartamento = '{$codDepartamento}';";
    if (!is_null($descDepartamento)) {
      $descripcionActualizada = DBPDO::ejecutarConsulta($sqlActualizarDescripcion);
    }
    if (!is_null($volumenDeNegocio)) {
      $volumenDeNegocioActualizado = DBPDO::ejecutarConsulta($sqlActualizarVolumenDeNegocio);
    }
    if ($descripcionActualizada || $volumenDeNegocioActualizado) {
      return true;
    } else {
      return false;
    }
  }
  
  /**
   * Alta de un departamento.
   * 
   * Crea un departamento por su codigo en la BD.
   * 
   * @param String $codDepartamento
   * @param String $descDepartamento
   * @param String $volumenDeNegocio
   * @return Boolean
   */
  public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio) {
    $sqlAltaDepartamento = "INSERT INTO T02_Departamento VALUES (UPPER('{$codDepartamento}'), '{$descDepartamento}', NOW(), '{$volumenDeNegocio}', null);";
    $creado = DBPDO::ejecutarConsulta($sqlAltaDepartamento);
    if ($creado) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Baja fisica de un departamento.
   * 
   * Elimina un departamento en la BD.
   * 
   * @param String $codDepartamento
   * @return Boolean
   */
  public static function bajaFisicaDepartamento($codDepartamento) {
    $sqlBorrarUsuario = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento = '{$codDepartamento}';";
    $borrado = DBPDO::ejecutarConsulta($sqlBorrarUsuario);
    if ($borrado) {
      return true;
    } else {
      return false;
    }
  }

}
