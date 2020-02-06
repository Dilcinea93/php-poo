<?php

namespace Ejercicios1;

use Ejercicios1\Classes\Bank;
use Ejercicios1\Classes\Transaction;
use Ejercicios1\Classes\Persona;

class Main {

    public static function run(){

        $remitente = new Persona("Giovanny", "Avila", "0000000000");
        $receptor  = new Persona("Yohanna", "Padrino", "0000000001");
    
        $banco = new Bank("BOD", "0116");

        $banco->transferencia()->setRemitente( $remitente )->setReceptor( $receptor )->setAmount( 200 )->send();
        $banco->transferencia()->setRemitente( $remitente )->setReceptor( $receptor )->setAmount( 1000 )->send();


        $total = array_reduce( $banco->getTransactions(), function( $count, $obj ) use($receptor){
            if( $obj->getReceptor()->getCuenta_bancaria() == $receptor->getCuenta_bancaria() )
                return $count + $obj->getAmount();

            return $count + 0;
        });


        printf( "\nYOHANNA TIENE UN TOTAL DE: %.2f", $total );
    }
}
