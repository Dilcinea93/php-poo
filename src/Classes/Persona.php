<?php

namespace Ejercicios1\Classes;

use Ejercicios1\Interfaces\Transactionable;

class Persona implements Transactionable 
{

    private $cuenta_bancaria;

    public $nombre;

    private $apellido;

    public function __construct(string $nombre, string $apellido, string $cuenta_bancaria)
    {
        $this->setCuenta_bancaria($cuenta_bancaria);
        $this->setNombre($nombre);
        $this->setApellido($apellido);        
    }

    public function getCuenta() : string
    {
        return $this->getCuenta_bancaria();
    }

    /**
     * Get the value of cuenta_bancaria
     */ 
    public function getCuenta_bancaria()
    {
        return $this->cuenta_bancaria;
    }

    /**
     * Set the value of cuenta_bancaria
     *
     * @return  self
     */ 
    public function setCuenta_bancaria($cuenta_bancaria)
    {
        $this->cuenta_bancaria = $cuenta_bancaria;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre() : string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido() : string
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }
}