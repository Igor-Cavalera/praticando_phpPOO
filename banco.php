<?php

require_once 'src/Conta.php';
require_once 'src/Titular.php';
require_once 'src/Cpf.php';

$cavalera = new Titular(new Cpf('123.456.789-10'), 'Vinicius Dias');
$primeiraConta = new Conta($cavalera);
$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$patricia = new Titular(new Cpf('668.229.154-11'), 'Patricia');
$segundaConta = new Conta($patricia);
var_dump($segundaConta);

$outra = new Conta(new Titular(new Cpf('123.623.456-55'), 'Abcdefg'));
unset($segundaConta);
echo Conta::recuperaNumeroDeContas();