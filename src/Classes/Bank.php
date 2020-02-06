<?php

namespace Ejercicios1\Classes;

use Ejercicios1\Classes\AbstractBank;

use Ejercicios1\Classes\Transaction;
use Ejercicios1\Interfaces\IEntidadTransaccion;
use Ejercicios1\Interfaces\ITransaction;
class Bank extends AbstractBank
{

    private $transactions = [];//mete aqui una instancia de Transaction 
    //private $name;


    public function transferencia()
    {
       array_push( $this->transactions, new Transaction()); //mete al array intancias de la clase transaccion, para luego retornar ese array con las transacciones 

       return $this->transactions[ count( $this->transactions ) - 1 ];
      // return 'asdas';
       //retorna un objeto 
    }

    public function getTransactions() : array
    {
        return $this->transactions;
    }
    public function getNombreEntidad(): string {
        return $this->getName();
    }

}