<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
class DepartamentoPDO{
//Funcion utilizada para buscar un departamento por su descripcion
    public static function buscaDepartamentosPorDesc($descDepartamento) {
        //Definicion de la sentencia SQL
        $sqlBuscarDepartamentoDesc = "SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$descDepartamento}%';";
//Ejecucion de la sentencia usando la clase DBPDO
        $oResultado = DBPDO::ejecutarConsulta($sqlBuscarDepartamentoDesc);
        return $oResultado;
    }
//Funcion utilizada para buscar un departamento por su descripcion
    public static function buscaDepartamentosPorCod($codDepartamento) {
        //Definicion de la sentencia SQL
        $$sqlBuscarDepartamentoCod = "SELECT * FROM T02_Departamento WHERE T02_CodDepartamento ='{$codDepartamento}';";
//Ejecucion de la sentencia usando la clase DBPDO
        $oResultado = DBPDO::ejecutarConsulta($sqlBuscarDepartamentoCod);
        return $oResultado;
    }
}
