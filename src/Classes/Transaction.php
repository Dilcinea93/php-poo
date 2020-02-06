<?php

namespace Ejercicios1\Classes;

use Ejercicios1\Interfaces\IEntidadTransaccion;
use Ejercicios1\Interfaces\Transactionable;
use Ejercicios1\Interfaces\ITransaction;

use DateTime;
class Transaction  implements ITransaction
{

    private $remitente;

    private $receptor;

    private $medio;

    private $tipo;

    private $amount;

    private $transactionCode = null;

    private $time = null;

    public function __constructor(IEntidadTransaccion $medio, string $tipo)
    {
        $this->setMedio($medio);

        $this->setTipo($tipo);
    }



    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of medio
     */ 
    public function getMedio()
    {
        return $this->medio;
    }

    /**
     * Set the value of medio
     *
     * @return  self
     */ 
    public function setMedio($medio)
    {
        $this->medio = $medio;

        return $this;
    }

    /**
     * Get the value of receptor
     */ 
    public function getReceptor()
    {
        return $this->receptor;
    }

    /**
     * Set the value of receptor
     *
     * @return  self
     */ 
    public function setReceptor(Transactionable $receptor)
    {
        $this->receptor = $receptor;

        return $this;
    }

    /**
     * Get the value of remitente
     */ 
    public function getRemitente()
    {
        return $this->remitente;
    }

    /**
     * Set the value of remitente
     *
     * @return  self
     */ 
    public function setRemitente(Transactionable $remitente)
    {
        $this->remitente = $remitente;

        return $this;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of transactionCode
     */ 
    public function getTransactionCode()
    {
        return $this->transactionCode;
    }

    /**
     * Get the value of time
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */ 
    protected function setTime(DateTime $time)
    {
        $this->time = $time->format('Y-m-d');

        return $this;
    }

    /**
     * Set the value of transactionCode
     *
     * @return  self
     */ 
    protected function setTransactionCode($transactionCode)
    {
        $this->transactionCode = $transactionCode;

        return $this;
    }

    public function send()
    {
        $this->setTime(new DateTime());
        $this->setTransactionCode( md5( ( new DateTime() )->format('Y-m-d H:i:s') ) );

        printf(
            "\nREALIZANDO TRANSACCION DESDE %s A %s POR UN MONTO DE %.2f", 
            $this->getRemitente()->getNombre().' '.$this->getRemitente()->getApellido(), 
            $this->getReceptor()->getNombre().' '.$this->getReceptor()->getApellido(),
            $this->getAmount()
        );
    }
}