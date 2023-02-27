<?php

/** 
 * Interfaz usuario
 * 
 * Interfaz para la creacion de clases usuario
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */

interface UsuarioDB {

  /** 
   * Funcion validar usuario
   * 
   * Funcion para validar un usuario en la BD
   * 
   * @param String $codUsuario Codigo de usuario.
   * @param String $password Password del usuario.
   */
  public static function validarUsuario($codUsuario, $password);
}
