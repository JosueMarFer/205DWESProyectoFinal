<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023  
interface DB {
    public static function ejecutarConsulta($sentenciaSQL, $parametros = null);
}
