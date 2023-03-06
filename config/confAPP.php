<?php

//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023
require_once './core/221120ValidacionFormularios.php'; //Importa libreria de validación
require_once './model/DB.php';
require_once './model/UsuarioDB.php';
require_once './model/Usuario.php';
require_once './model/UsuarioPDO.php';
require_once './model/DBPDO.php';
require_once './model/ERRORApp.php';
require_once './model/Departamento.php';
require_once './model/DepartamentoPDO.php';
require_once './model/REST.php';

$aControladores = [
    'login' => './controller/cLogin.php',
    'inicioPublico' => './controller/cInicioPublico.php',
    'inicioPrivado' => './controller/cInicioPrivado.php',
    'error' => './controller/cError.php',
    'registro' => './controller/cRegistro.php',
    'detalle' => './controller/cDetalle.php',
    'wip' => './controller/cWip.php',
    'rest' => './controller/cRest.php',
    'miCuenta' => './controller/cMiCuenta.php',
    'cambiarPassword' => './controller/cCambiarPassword.php',
    'borrarCuenta' => './controller/cBorrarCuenta.php',
    'mtoDepartamentos' => './controller/cMtoDepartamentos.php',
    'tecnologias' => './controller/cTecnologias.php',
    'consultarEditarDepartamento' => './controller/cConsultarEditarDepartamento.php',
    'eliminarDepartamento' => './controller/cEliminarDepartamento.php',
    'crearDepartamento' => './controller/cAltaDepartamento.php'
    
];

$aVistas = [
    'layout' => './view/Layout.php',
    'login' => './view/vLogin.php',
    'inicioPublico' => './view/vInicioPublico.php',
    'inicioPrivado' => './view/vInicioPrivado.php',
    'error' => './view/vError.php',
    'registro' => './view/vRegistro.php',
    'detalle' => './view/vDetalle.php',
    'wip' => './view/vWip.php',
    'rest' => './view/vRest.php',
    'miCuenta' => './view/vMiCuenta.php',
    'cambiarPassword' => './view/vCambiarPassword.php',
    'borrarCuenta' => './view/vBorrarCuenta.php',
    'mtoDepartamentos' => './view/vMtoDepartamentos.php',
    'tecnologias' => './view/vTecnologias.php',
    'consultarEditarDepartamento' => './view/vConsultarEditarDepartamento.php',
    'eliminarDepartamento' => './view/vEliminarDepartamento.php',
    'crearDepartamento' => './view/vAltaDepartamento.php'
];
