<?php

namespace Ejercicios1\Classes;

use Ejercicios1\Interfaces\IEntidadTransaccion;
use Ejercicios1\Interfaces\Transactionable;
use Ejercicios1\Interfaces\ITransaction;
use Ejercicios1\Classes\Bank;

use DateTime;
class Transaction implements ITransaction, IEntidadTransaccion
{

    private $remitente;

    private $receptor;

    private $medio;

    private $tipo;

    private $amount;

    private $transactionCode = null;

    private $time = null;

    private $banco;


    public function __construct(IEntidadTransaccion $medio)   //objeto Banco...
    {   
        $this->setMedio($medio);
        
    }
    
    public function getNombreEntidad() : string {
        return 'BOD';
    }

    // public function setBanco($medio){
    //     $this->banco = 'asjdhka';

    //     return $this;
    // }
    // public function getBanco(){

    //     return 'Yohanna';
    // }
    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    
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
    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * Get the value of medio
     */ 
    public function getMedio()
    {   
        //funciona asi... me retorna BOD
        // $medio= new Bank("BOD", "0116");
        // $medio= $this->medio->getName();
        //recibe el nombre en formato string
        // var_dump($medio);
        return $this->medio;
    }

    /**
     * Set the value of medio
     *
     * @return  self
     */ 
    public function setMedio($medio)
    {
        $this->medio = $medio;  //objeto Banco

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
/************************************************************/
    /**
     * Get the value of receptor
     */ 
    public function getReceptor()
    {
        return $this->receptor;
    }

    static function getTransactions(){

    }
    /**
     * Set the value of receptor
     *
     * @return  self
     */ 
    public function setReceptor(Transactionable $receptor)
    {
        /*

        setReceptor: Objeto. object{ [],[],[]}
        setMedio: Objeto. Object{[[medio][]],}
            object(Ejercicios1\Classes\Persona)#2 (3) {
              ["cuenta_bancaria":"Ejercicios1\Classes\Persona":private]=>
              string(10) "0000000001"
              ["nombre":"Ejercicios1\Classes\Persona":private]=>
              string(7) "Yohanna"
              ["apellido":"Ejercicios1\Classes\Persona":private]=>
              string(7) "Padrino"
            }
            */
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
        //$bak= new Bank($this->getBanco(),'yohanna');
        //Llamar a getName de abstractBank
        /***********************************/
        /* PORQUE NO ME SIRVEEE?? si le estoy enviando un objeto persona igualito que los demas metodos, que tiene de diferente con getRemitente??.*/
          // var_dump($this);
           // var_dump($bank->getCuenta_bancaria()); me dice  Uncaught Error: Call to a member function getCuenta_bancaria() on null (valor de la variable de instancia)

            // $bank->transactions me dice que $bank no es un objeto, pero cuando lo imprimo solo dice que si es un objeto..
            // las propiedades deben ser privadas para no romper el principio de encapsulamiento. Se debe acceder a ellas no asi $bank->transactions  sino con un getter.. Por eso en cada clase un getter debe retornar la variable de instancia de la propiedad que quieras acceder 


            //$bank->getName() dice 
            // Uncaught Error: Call to a member function getName() on null (valor de la variable de instancia medio)

         /*********************************/

        // var_dump($this->getTipoTransaccion());
        printf(
            "\n\n\nREALIZANDO TRANSACCION DESDE %s A %s \n MONTO : %.2f \nbanco: %s\n Tipo de transaccion: %s", 
            $this->getRemitente()->getNombre().' '.$this->getRemitente()->getApellido(), 
            $this->getReceptor()->getNombre().' '.$this->getReceptor()->getApellido(),
            $this->getAmount(),
            $this->getMedio()->getName(),
            $this->getTipo()
        );
    }
}