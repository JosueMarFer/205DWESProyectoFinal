<?php

/** 
 * Clase Departamento
 * 
 * Clase para instanciar departamentos
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */

class Departamento {
/**
 * 
 * @var String Codigo de departamento
 */
  private $codDepartamento;
/**
 * 
 * @var String Descripcion de departamento
 */
  private $descDepartamento;
/**
 * 
 * @var DateTime Fecha creacion de departamento
 */
  private $fechaCreacionDepartamento;
/**
 * 
 * @var Float Volumen de negocio de departamento
 */
  private $volumenDeNegocio;
/**
 * 
 * @var DateTime Fecha baja de departamento
 */
  private $fechaBajaDepartamento;

  /**
   * Constructor de departamento
   * 
   * Constructor de departamento
   * 
   * @param String $codDepartamento
   * @param String $descDepartamento
   * @param DateTime $fechaCreacionDepartamento
   * @param Float $volumenDeNegocio
   * @param DateTime $fechaBajaDepartamento
   * @return Departamento
   */
  public function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento = null) {
    $this->codDepartamento = $codDepartamento;
    $this->descDepartamento = $descDepartamento;
    $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
    $this->volumenDeNegocio = $volumenDeNegocio;
    $this->fechaBajaDepartamento = $fechaBajaDepartamento;
  }

  /**
   * Devuelve el codigo de departamento.
   * 
   * Devuelve el codigo de departamento.
   * 
   * @return String 
   */
  public function getCodDepartamento() {
    return $this->codDepartamento;
  }

  /**
   * Devuelve la descripcion de departamento.
   * 
   * Devuelve la descripcion de departamento.
   * 
   * @return String 
   */
  public function getDescDepartamento() {
    return $this->descDepartamento;
  }

  /**
   * Devuelve la fecha de creacion de departamento
   * 
   * Devuelve la fecha de creacion de departamento
   * 
   * @return DateTime 
   */
  public function getFechaCreacionDepartamento() {
    return $this->fechaCreacionDepartamento;
  }

  /**
   * Devuelve el volumen de negocio de departamento.
   * 
   * Devuelve el volumen de negocio de departamento.
   * 
   * @return Float 
   */
  public function getVolumenDeNegocio() {
    return $this->volumenDeNegocio;
  }

  /**
   * Devuelve la fecha de baja de departamento.
   * 
   * Devuelve la fecha de baja de departamento.
   * 
   * @return DateTime 
   */
  public function getFechaBajaDepartamento() {
    return $this->fechaBajaDepartamento;
  }

  /**
   * Modifica el codigo de departamento.
   * 
   * Modifica el codigo de departamento.
   * 
   * @param String $codDepartamento
   */
  public function setCodDepartamento($codDepartamento): void {
    $this->codDepartamento = $codDepartamento;
  }

  /**
   * Modifica la descripcion de departamento.
   * 
   * Modifica la descripcion de departamento.
   * 
   * @param String $descDepartamento
   */
  public function setDescDepartamento($descDepartamento): void {
    $this->descDepartamento = $descDepartamento;
  }

  /**
   * Modifica la fecha de creacion de departamento
   * 
   * Modifica la fecha de creacion de departamento
   * 
   * @param DateTime $fechaCreacionDepartamento
   */
  public function setFechaCreacionDepartamento($fechaCreacionDepartamento): void {
    $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
  }

  /**
   * Modifica el volumen de negocio de departamento.
   * 
   * Modifica el volumen de negocio de departamento.
   * 
   * @param Float $volumenDeNegocio
   */
  public function setVolumenDeNegocio($volumenDeNegocio): void {
    $this->volumenDeNegocio = $volumenDeNegocio;
  }

  /**
   * Modifica la fecha de baja de departamento.
   * 
   * Modifica la fecha de baja de departamento.
   * 
   * @param DateTime $fechaBajaDepartamento
   */
  public function setFechaBajaDepartamento($fechaBajaDepartamento): void {
    $this->fechaBajaDepartamento = $fechaBajaDepartamento;
  }

}
