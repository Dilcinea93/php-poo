<?php 

namespace Ejercicios1\Interfaces;

interface Transactionable {
    
    public function getCuenta() : string;

    public function getNombre() : string;

    public function getApellido() : string;
 
}