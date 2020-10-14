<?php 

date_default_timezone_set('America/Sao_Paulo');

$autoload = function($class){
    include('classes/'.$class.'.php');
};

spl_autoload_register($autoload);

define('HOST','localhost');
define('DATABASE','projetos_proprios');
define('USER','root');
define('PASSWORD','');

define('NOME_TABELA','tb_partidas');


include_once("helpers.php");







?>