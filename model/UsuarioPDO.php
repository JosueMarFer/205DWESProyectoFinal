<?php

/** 
 * Clase UsuarioPDO
 * 
 * Clase utilizada para las operaciones con los usuarios.
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */

class UsuarioPDO implements UsuarioDB {

  /**
   * valida usuario.
   * 
   * valida si un usuario esta en la BD y si la contraseña introducida corresponde al mismo.
   * 
   * @param String $codUsuario
   * @param String $password
   * @return Usuario null
   */
  public static function validarUsuario($codUsuario, $password) {
    //Definicion de la sentencia SQL, previo cifrado de la password
    $passwordCifrada = (hash('sha256', ($codUsuario . $password)));
    $sqlValidarUsuario = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario ='{$codUsuario}' AND T01_Password ='{$passwordCifrada}';";
    $oResultado = DBPDO::ejecutarConsulta($sqlValidarUsuario);
    $usuarioResultado = $oResultado->fetchObject();
    if ($usuarioResultado) {
      return new Usuario($usuarioResultado->T01_CodUsuario, $usuarioResultado->T01_Password, $usuarioResultado->T01_DescUsuario, $usuarioResultado->T01_NumConexiones, $usuarioResultado->T01_FechaHoraUltimaConexion, null, $usuarioResultado->T01_Perfil);
    } else {
      return null;
    }
  }

  /**
   * Registra la ultima conexion.
   * 
   * Registra la ultima conexion, actualiza el objeto usuario y el registro en la BD.
   * 
   * @param String $oUsuario
   * @return Usuario null
   */
  public static function registrarUltimaConexion($oUsuario) {
    $oUsuario->setfechaHoraUltimaConexionAnterior($oUsuario->getfechaHoraUltimaConexion());
    $oUsuario->setFechaHoraUltimaConexion(new DateTime());
    $oUsuario->setNumAccesos($oUsuario->getNumAccesos() + 1);
    $fechaHoraSQL = $oUsuario->getFechaHoraUltimaConexion();
    $fechaHoraSQLString = $fechaHoraSQL->format("Y-m-d H:i:s");
    $sqlActualizarConexiones = "UPDATE T01_Usuario SET T01_NumConexiones = '{$oUsuario->getNumAccesos()}', T01_FechaHoraUltimaConexion = '{$fechaHoraSQLString}' WHERE T01_CodUsuario = '{$oUsuario->getCodUsuario()}';";
    $actualizado = DBPDO::ejecutarConsulta($sqlActualizarConexiones);
    if ($actualizado) {
      return $oUsuario;
    } else {
      return null;
    }
  }

  /**
   * Alta de un usuario.
   * 
   * Da de alta a un usuario añadiendo el registro a la BD.
   * 
   * @param String $codUsuario
   * @param String $password
   * @param String $descripcionUsuario
   * @return Usuario null
   */
  public static function altaUsuario($codUsuario, $password, $descripcionUsuario) {
    $passwordCifrada = (hash('sha256', ($codUsuario . $password)));
    $sqlAltaUsuario = "INSERT INTO T01_Usuario VALUES ('{$codUsuario}', '{$passwordCifrada}', '{$descripcionUsuario}', 0, NOW(), 'usuario', null);";
    $ingresado = DBPDO::ejecutarConsulta($sqlAltaUsuario);
    if ($ingresado) {
      $oUsuario = UsuarioPDO::validarUsuario($codUsuario, $password);
      return $oUsuario;
    } else {
      return null;
    }
  }

  /**
   * Valida si un codigo existe.
   * 
   * Valida si un codigo existe como registro en la BD.
   * 
   * @param String $codUsuario
   * @return Bolean 
   */
  public static function validarCodNoExiste($codUsuario) {
    $sqlValidarCodNoExiste = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario ='{$codUsuario}';";
    $oResultado = DBPDO::ejecutarConsulta($sqlValidarCodNoExiste);
    $usuarioResultado = $oResultado->fetchObject();
    if ($usuarioResultado) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Modifica un usuario.
   * 
   * Modifica la descripcion del usuario.
   * 
   * @param String $descUsuario
   * @param Usuario $oUsuario
   * @return Usuario null
   */
  public static function modificarUsuario($descUsuario, $oUsuario) {
    $sqlModificarUsuario = "UPDATE T01_Usuario SET T01_DescUsuario = '{$descUsuario}' WHERE T01_CodUsuario = '{$oUsuario->getCodUsuario()}';";
    $modificado = DBPDO::ejecutarConsulta($sqlModificarUsuario);
    if ($modificado) {
      $oUsuario->setDescUsuario($descUsuario);
      return $oUsuario;
    } else {
      return null;
    }
  }

  /**
   * Borra el usuario.
   * 
   * Borra el usuario de la BD.
   * 
   * @param Usuario $oUsuario
   * @return Boolean
   */
  public static function borrarrUsuario($oUsuario) {
    $sqlModificarUsuario = "DELETE FROM T01_Usuario WHERE T01_CodUsuario = '{$oUsuario->getCodUsuario()}';";
    $borrado = DBPDO::ejecutarConsulta($sqlModificarUsuario);
    if ($borrado) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * cambia la password del usuario.
   * 
   * cambia la password del usuario tanto para el objeto como en la BD.
   * 
   * @param Usuario $oUsuario
   * @param String $nuevaPassword
   * @return Usuario null
   */
  public static function cambiarPassword($oUsuario, $nuevaPassword) {
    $sqlModificarUsuario = "UPDATE T01_Usuario SET T01_Password = '{$nuevaPassword}' WHERE T01_CodUsuario = '{$oUsuario->getCodUsuario()}';";
    $modificado = DBPDO::ejecutarConsulta($sqlModificarUsuario);
    if ($modificado) {
      $oUsuario->setPassword($nuevaPassword);
      return $oUsuario;
    } else {
      return null;
    }
  }

}

?>