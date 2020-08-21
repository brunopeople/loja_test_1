<?php

require_once('../config.php');
require_once(DBAPI);

$funcionarios = null;
$funcionario = null;

/**
 * Listando a lista de funcionarios 
 */

 function index(){
     global $funcionarios;
     $funcionarios = find_all('funcionarios');
 }