<?php

namespace Ejercicios1;

use Ejercicios1\Classes\Bank;
use Ejercicios1\Classes\Transaction;
use Ejercicios1\Classes\Persona;

/**/

class Main {
public $var= 'YOHANNA';
public $tipoTransaccion= [];
public $tipoTransaccionElegida;

    public function run(){
//echo $this->var;.. no puedo hacer esto desde una clase. si quiero imprimir esta variable, la imprimo desde el main.. desde el index..instanciando la clase y accediendo a su propiedad.
        $remitente = new Persona("Giovanny", "Avila", "0000000000");
        $receptor  = new Persona("Yohanna", "Padrino", "0000000001");
    
        $banco = new Bank("BOD", "0116");
        //$nombrebanco='Provincial';
//$banco->transferencia() objeto Transaction
       //1-seteado como string y pasado al setMedio del objeto Transaction $nombrebanco= $banco->getName();
        $tipoTransaccion= $banco->getTipoTransaccion();
        $this->tipoTransaccion= $tipoTransaccion;

        //La pseudovariable $this esta disponible cuando el metodo donde se vaya a usar es invocado desde el contexto de un objeto.

        /*
            osea que si estas invocando a ESE metodo con una clase estatica (que no se instancia, que no crea objeto y por lo tanto no es el contexto de un objeto porque no hiciste ningun objeto), entonces no estara disponible.

            en cambio si la llamas desde el objeto que instancie la clase a la que pertenece el metodo, (osea haciendo esto $main= new Main();
$main->run(); si estara disponible)
        */
        //$banco->transferencia()::abstractBank::IEntidadTransaccion
        // $banco->transferencia()->setRemitente($remitente )->setReceptor( $receptor )->//1-seteado como string y pasado al setMedio del objeto Transaction setMedio($nombrebanco)->

        for($i=1;$i<=2;$i++){
            $banco->transferencia()->setRemitente( $remitente )->setTipo($tipoTransaccion[0])->setReceptor( $receptor )->setAmount( $i*10 )->send();
        }


        $total = array_reduce( $banco->getTransactions(), function( $count, $obj ) use($receptor){
            if( $obj->getReceptor()->getCuenta_bancaria() == $receptor->getCuenta_bancaria() )
                return $count + $obj->getAmount();

            return $count + 0;
        });


        printf( "\nYOHANNA TIENE UN TOTAL DE: %.2f", $total );
    }
}
