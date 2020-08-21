<?php

require_once('../config.php');
require_once(DBAPI);

$funcionarios = null;
$funcionario = null;

/**
 * Listando a lista de funcionarios 
 */

 /**A função index() é a função que será chamada na tela principal de clientes, e ela fará a consulta
  * pelos registros no banco de dados, e depois colocará tudo na variável $funcionarios, para que possamos 
  exibir. Já a função find_all() sendo usada, é ela que traz os dados. Mas, essa função não existe ainda.
  */
 function index(){
     global $funcionarios;
     $funcionarios = find_all('funcionarios');
 }