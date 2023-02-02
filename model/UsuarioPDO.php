<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023  
class UsuarioPDO implements UsuarioDB {

//Funcion utilizada para comprobar si un usuario existe en la BBDD y si la contraseña es correcta
  public static function validarUsuario($codUsuario, $password) {
    //Definicion de la sentencia SQL, previo cifrado de la password
    $passwordCifrada = (hash('sha256', ($codUsuario . $password)));
    $sqlValidarUsuario = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario ='{$codUsuario}' AND T01_Password ='{$passwordCifrada}';";
//Ejecucion de la sentencia usando la clase DBPDO
    $oResultado = DBPDO::ejecutarConsulta($sqlValidarUsuario);
    $usuarioResultado = $oResultado->fetchObject();
//Si el usuario existe devuelve un objeto usuario, si no retorna un null;
    if ($usuarioResultado) {
      return new Usuario($usuarioResultado->T01_CodUsuario, $usuarioResultado->T01_Password, $usuarioResultado->T01_DescUsuario, $usuarioResultado->T01_NumConexiones, $usuarioResultado->T01_FechaHoraUltimaConexion, null, $usuarioResultado->T01_Perfil);
    } else {
      return null;
    }
  }

  public static function registrarUltimaConexion($oUsuario) {
// Actualiza el numero de conexiones del objeto usuario y la ultima conexion anterior por la ultima conexion        
    $oUsuario->setfechaHoraUltimaConexionAnterior($oUsuario->getfechaHoraUltimaConexion());
    $oUsuario->setFechaHoraUltimaConexion(new DateTime());
    $oUsuario->setNumAccesos($oUsuario->getNumAccesos() + 1);
    $fechaHoraSQL = $oUsuario->getFechaHoraUltimaConexion();
    $fechaHoraSQLString = $fechaHoraSQL->format("Y-m-d H:i:s");
//Definicion de la sentencia SQL
    $sqlActualizarConexiones = "UPDATE T01_Usuario SET T01_NumConexiones = '{$oUsuario->getNumAccesos()}', T01_FechaHoraUltimaConexion = '{$fechaHoraSQLString}' WHERE T01_CodUsuario = '{$oUsuario->getCodUsuario()}';";
//Ejecucion de la sentencia usando la clase DBPDO       
    $actualizado = DBPDO::ejecutarConsulta($sqlActualizarConexiones);
// Devuelve el objeto usuario si no se ha actualizado devuelve un null
    if ($actualizado) {
      return $oUsuario;
    } else {
      return null;
    }
  }

  public static function altaUsuario($codUsuario, $password, $descripcionUsuario) {
//Definicion de la sentencia SQL, previo cifrado de la password
    $passwordCifrada = (hash('sha256', ($codUsuario . $password)));
    $sqlAltaUsuario = "INSERT INTO T01_Usuario VALUES ('{$codUsuario}', '{$passwordCifrada}', '{$descripcionUsuario}', 0, NOW(), 'usuario', null);";
//Ejecucion de la sentencia usando la clase DBPDO       
    $ingresado=DBPDO::ejecutarConsulta($sqlAltaUsuario);
// Devuelve el objeto usuario en caso de haber ingresado, si no devuelve false; 
    if ($ingresado) {
      $oUsuario = UsuarioPDO::validarUsuario($codUsuario, $password);
      return $oUsuario;
    } else {
      return null;
    }
  }

  //Funcion utilizada para comprobar si un usuario existe en la BBDD
  public static function validarCodNoExiste($codUsuario) {
    //Definicion de la sentencia SQL
    $sqlValidarCodNoExiste = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario ='{$codUsuario}';";
//Ejecucion de la sentencia usando la clase DBPDO
    $oResultado = DBPDO::ejecutarConsulta($sqlValidarCodNoExiste);
    $usuarioResultado = $oResultado->fetchObject();
//Si el usuario existe devuelve un objeto usuario, si no retorna un null;
    if ($usuarioResultado) {
      return new Usuario($usuarioResultado->T01_CodUsuario, $usuarioResultado->T01_Password, $usuarioResultado->T01_DescUsuario, $usuarioResultado->T01_NumConexiones, $usuarioResultado->T01_FechaHoraUltimaConexion, null, $usuarioResultado->T01_Perfil);
    } else {
      return null;
    }
  }

  //Funcion utilizada para comprobar si un usuario existe en la BBDD
  public static function modificarUsuario($codUsuario, $descUsuario, $codUsuarioActual) {
    //Definicion de la sentencia SQL
    $sqlModificarUsuario = "UPDATE T01_Usuario SET T01_DescUsuario = '{$descUsuario}', T01_CodUsuario = '{$codUsuario}' WHERE T01_CodUsuario = '{$codUsuarioActual}';";
//Ejecucion de la sentencia usando la clase DBPDO
    $oResultado = DBPDO::ejecutarConsulta($sqlModificarUsuario);
    $modificado = $oResultado->fetchObject();
//Si el usuario existe devuelve un objeto usuario, si no retorna un null;
    if ($modificado) {
      $oUsuario = UsuarioPDO::validarCodNoExiste($codUsuario);
    } else {
      return null;
    }
  }
  
}
?>