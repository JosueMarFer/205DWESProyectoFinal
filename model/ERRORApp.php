<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 12/01/2023  
class ERRORApp {
    private $codError;
    private $descError;
    private $archivoError;
    private $lineaError;
    private $paginaSiguiente;
    
    public function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
        $this->paginaSiguiente = $paginaSiguiente;
    }
    public function getCodError() {
        return $this->codError;
    }

    public function getDescError() {
        return $this->descError;
    }

    public function getArchivoError() {
        return $this->archivoError;
    }

    public function getLineaError() {
        return $this->lineaError;
    }

    public function getPaginaSiguiente() {
        return $this->paginaSiguiente;
    }


}
