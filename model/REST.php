<?php

/**
 * Clase REST
 * 
 * Clase para hacer llamadas a APIS
 * 
 * @author Josue Martinez Fernandez
 * @version 1.0
 */
class REST {

  /**
   * devuelve los datos de un pokemon.
   * 
   * recibe el nombre de un pokemon, en caso de existir devuelve un array con los datos del mismo, en caso de no existir devuelve un null
   * 
   * @param String $nombrePokemon
   * @return Array null
   */
  public static function datosPokemon($nombrePokemon) {
    $respuesta = file_get_contents("https://pokeapi.co/api/v2/pokemon/{$nombrePokemon}");
    $respuestaJSON = $respuesta ? json_decode($respuesta, true) : null;
      return $respuestaJSON;
  }

}
