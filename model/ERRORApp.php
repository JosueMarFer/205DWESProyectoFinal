<?php

/** 
 * Clase ErrorApp
 * 
 * Clase ErrorApp, contiene un constructor y getters.
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */

class ERRORApp {
/**
 * 
 * @var String Codigo de error
 */
  private $codError;
/**
 * 
 * @var String Descripcion de error
 */
  private $descError;
/**
 * 
 * @var String Archivo de error
 */
  private $archivoError;
/**
 * 
 * @var String Linea de error
 */
  private $lineaError;
/**
 * 
 * @var String Pagina siguiente de error
 */
  private $paginaSiguiente;

  /**
   * Constructor de error
   * 
   * Constructor de error
   * 
   * @param String $codError
   * @param String $descError
   * @param String $archivoError
   * @param String $lineaError
   * @param String $paginaSiguiente
   * @return ErrorApp
   */
  public function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
    $this->codError = $codError;
    $this->descError = $descError;
    $this->archivoError = $archivoError;
    $this->lineaError = $lineaError;
    $this->paginaSiguiente = $paginaSiguiente;
  }

  /**
   * Devuelve el codigo de error.
   * 
  * Devuelve el codigo de error.
   * 
   * @return String
   */
  public function getCodError() {
    return $this->codError;
  }

  /**
   * Devuelve la descripcion de error.
   * 
   * Devuelve la descripcion de error.
   * 
   * @return String
   */
  public function getDescError() {
    return $this->descError;
  }

  /**
   * Devuelve el acrchivo de error.
   * 
   * Devuelve el acrchivo de error.
   * 
   * @return String
   */
  public function getArchivoError() {
    return $this->archivoError;
  }

  /**
   * Devuelve la linea de error.
   * 
   * Devuelve la linea de error.
   * 
   * @return String
   */
  public function getLineaError() {
    return $this->lineaError;
  }

  /**
   * Devuelve la pagina siguiente de error.
   * 
   * Devuelve la pagina siguiente de error.
   * 
   * @return String
   */
  public function getPaginaSiguiente() {
    return $this->paginaSiguiente;
  }

}
