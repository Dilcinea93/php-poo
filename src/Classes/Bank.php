<?php

namespace Ejercicios1\Classes;

use Ejercicios1\Classes\AbstractBank;

use Ejercicios1\Classes\Transaction;
use Ejercicios1\Interfaces\IEntidadTransaccion;
use Ejercicios1\Interfaces\ITransaction;
class Bank extends AbstractBank implements IEntidadTransaccion
{

    private $transactions = [];


    public function transferencia()
    {
       array_push( $this->transactions, new Transaction( $this ) );

       return $this->transactions[ count( $this->transactions ) - 1 ];
    }

    public function getTransactions() : array
    {
        return $this->transactions;
    }

}