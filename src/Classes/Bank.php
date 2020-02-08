<?php

namespace Ejercicios1\Classes;

use Ejercicios1\Classes\AbstractBank;

use Ejercicios1\Classes\Transaction;
use Ejercicios1\Interfaces\IEntidadTransaccion;
use Ejercicios1\Interfaces\ITransaction;
class Bank extends AbstractBank
{

    private $transactions = [];//mete aqui una instancia de Transaction 
    //public $name;


    public function transferencia()
    {
       array_push( $this->transactions, new Transaction($this)); 
       var_dump($this);
        //mete al array intancias de la clase transaccion, para luego retornar ese array con las transacciones 
       //objeto banco, con nombre y codgo de entidad
//$this->objeto Bank: propiedad-1: Transactions, 2- name, 3- bank code.
       //$var= new Bank('BoD','0116'); $var->transactions 
//      var_dump($this);
       return $this->transactions[ count( $this->transactions ) - 1 ];
      // return 'asdas';
       //retorna un objeto 
    }

    public function getTransactions() : array
    {
        return $this->transactions;
    }
    

}