<?php

/**
 * Clase Usuario
 * 
 * Clase usuario, contiene un constructor getters y setters.
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */

class Usuario {
/**
 * 
 * @var String Codigo de usuario
 */
  private $codUsuario;
/**
 * 
 * @var String Password de usuario
 */
  private $password;
/**
 * 
 * @var String Descripcion de Usuario
 */
  private $descUsuario;
/**
 * 
 * @var Integer Numero de accesos del usuario
 */
  private $numAccesos;
/**
 * 
 * @var DateTime Fecha hora ultima conexion del usuario
 */
  private $fechaHoraUltimaConexion;
/**
 * 
 * @var Datetime Fecha hora ultima conexion anterior del usuario
 */
  private $fechaHoraUltimaConexionAnterior;
/**
 * 
 * @var Image imagen del usuario
 */
  private $perfil;

  /**
   * Constructor de usuario
   * 
   * Constructor de usuario
   * 
   * @param String $codUsuario
   * @param String $password
   * @param String $descUsuario
   * @param Integer $numAccesos
   * @param Datetime $fechaHoraUltimaConexion
   * @param Datetime $fechaHoraUltimaConexionAnterior
   * @param Image $perfil
   * @return Usuario
   */
  public function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil) {
    $this->codUsuario = $codUsuario;
    $this->password = $password;
    $this->descUsuario = $descUsuario;
    $this->numAccesos = $numAccesos;
    $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
    $this->perfil = $perfil;
  }

  /**
   * Devuelve el codigo de usuario.
   * 
   * Devuelve el codigo de usuario.
   * 
   * @return String
   */
  public function getCodUsuario() {
    return $this->codUsuario;
  }

  /**
   * Devuelve la password de usuario.
   * 
   * Devuelve la password de usuario.
   * 
   * @return String
   */
  public function getPassword() {
    return $this->password;
  }

  /**
   * Devuelve la descripcion de usuario.
   * 
   * Devuelve la descripcion de usuario.
   * 
   * @return String
   */
  public function getDescUsuario() {
    return $this->descUsuario;
  }

  /**
   * Devuelve el numero de accesos de usuario.
   * 
   * Devuelve el numero de accesos de usuario.
   * 
   * @return Integer
   */
  public function getNumAccesos() {
    return $this->numAccesos;
  }

  /**
   * Devuelve la fecha hora de ultima conexion de usuario.
   * 
   * Devuelve la fecha hora de ultima conexion de usuario.
   * 
   * @return DateTime
   */
  public function getFechaHoraUltimaConexion() {
    return $this->fechaHoraUltimaConexion;
  }

  /**
   * Devuelve la fecha hora de la ultima conexion anterior de usuario.
   * 
   * Devuelve la fecha hora de la ultima conexion anterior de usuario.
   * 
   * @return DateTime
   */
  public function getFechaHoraUltimaConexionAnterior() {
    return $this->fechaHoraUltimaConexionAnterior;
  }

  /**
   * Devuelve la imagen de usuario.
   * 
   * Devuelve la imagen de usuario.
   * 
   * @return Image
   */
  public function getPerfil() {
    return $this->perfil;
  }

  /**
   * Modifica el codigo de usuario.
   * 
   * Modifica el codigo de usuario.
   * 
   * @param String $codUsuario
   */
  public function setCodUsuario($codUsuario): void {
    $this->codUsuario = $codUsuario;
  }

  /**
   * Modifica la password de usuario.
   * 
   * Modifica la password de usuario.
   * 
   * @param String $password
   */
  public function setPassword($password): void {
    $this->password = $password;
  }

  /**
   * Modifica la descripcion de usuario.
   * 
   * Modifica la descripcion de usuario.
   * 
   * @param String $descUsuario
   */
  public function setDescUsuario($descUsuario): void {
    $this->descUsuario = $descUsuario;
  }

  /**
   * Modifica el numero de accesos de usuario.
   * 
   * Modifica el numero de accesos de usuario.
   * 
   * @param Integer $numAccesos
   */
  public function setNumAccesos($numAccesos): void {
    $this->numAccesos = $numAccesos;
  }

  /**
   * Modifica la fecha hora de ultima conexion de usuario.
   * 
   * Modifica la fecha hora de ultima conexion de usuario.
   * 
   * @param DateTime $fechaHoraUltimaConexion
   */
  public function setFechaHoraUltimaConexion($fechaHoraUltimaConexion): void {
    $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
  }

  /**
   * Modifica la fecha hora de la ultima conexion anterior de usuario.
   * 
   * Modifica la fecha hora de la ultima conexion anterior de usuario.
   * 
   * @param DateTime $fechaHoraUltimaConexionAnterior
   */
  public function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior): void {
    $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
  }

  /**
   * Modifica la imagen de usuario.
   * 
   * Modifica la imagen de usuario.
   * 
   * @param Image $perfil
   */
  public function setPerfil($perfil): void {
    $this->perfil = $perfil;
  }

}
