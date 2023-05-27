<?php
include("../classes/banco.php");

class Cliente extends Banco{
    public $nome;
    public $cpf;
    private $possui_emprestimo = false;
    public $valor_emprestado;

    public function emprestimo($valor)
    {
        if($this->possui_emprestimo){
            
            echo "<br>Infelizmente não podemos" . " abrir outro emprestimo";
        
        } else {
           
            $this->possui_emprestimo = true;
            $this->depositar($valor);
            $this->valor_emprestado = $valor;
        
        }
    }

    public function quitar_emprestimo($valor_quitacao){

        if($this->valor_emprestado == $valor_quitacao){
            
            $this->saldo -= $valor_quitacao;
            $this->valor_emprestado = 0;

            echo "O novo valor do saldo é R$" . $this->saldo;

            $this->possui_emprestimo = false;
       
        } else{

            echo "Valor de quitação incorreto. O valor correto é R$". $this->valor_emprestado;
        
        }
    }
}

$pessoa = new Cliente();
$pessoa->nome = "Josefina";
$pessoa->cpf = "1111111";
$pessoa->saldo = 1000;
$pessoa->depositar(800);

echo "<br/>O saldo atual de pessoa é R$" . $pessoa->saldo;

$pessoa->emprestimo(7000);

echo "<br/>O saldo atual de pessoa é R$" . $pessoa->saldo;

$pessoa->emprestimo(10000);

echo "<br>";

$pessoa->quitar_emprestimo(7000);

echo "<br>";

$pessoa->emprestimo(2000);

echo "O saldo atual de pessoa é R$" . $pessoa->saldo;

?>