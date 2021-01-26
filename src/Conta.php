<?php 

class Conta 
{
    private Titular $titular;
    private float $saldo;
    private static $numeroDeContas = 0;
       
    //MÉTODO CONSTRUTOR
    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;
        
        //Acessando o MÉTODO ESTÁTICO
        self::$numeroDeContas++;
    } 
    
    //MÉTODO DESTRUTOR
    public function __destruct()
    {
        self::$numeroDeContas--;
       
    }

    //Função dentro da classe é chamada de MÉTODO
    public function saca(float $valorASacar): void 
    {
        if ($valorASacar > $this->saldo){
            echo "Saldo indisponivel";
            return;
        } 
        
        $this->saldo -= $valorASacar;
        
    }

    public function deposita(float $valorADepositar): void
    {
        if($valorADepositar < 0) {
            echo "Valor precisa ser postitivo";
            return;
        } 
        
        $this->saldo += $valorADepositar ;
        
    }

    public function transfere(float $valorATransferir, Conta $contaDestino):void
    {
        if ($valorATransferir > $this->saldo){
            echo "Saldo indisponível";
            return;
        }
        
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
        
    }

    //Método recuperarSaldo - MÉTODO GET
    public function recuperaSaldo( ):float
    {
        return $this->saldo;
    }

    // //Método recuperarNomeTitular
    public function recuperaNomeTitular():string 
    {
        return $this->titular->recuperaNome();
    }

    //Método recuperarCpfTitular - MÉTODO GET
    public function recuperaCpfTitular():string 
    {
        return $this->titular->recuperaCpf();
    }

    public static function recuperaNumeroDeContas():int
    {
        return self::$numeroDeContas;
    } 
}