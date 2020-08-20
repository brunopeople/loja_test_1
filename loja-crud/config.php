<?php

/**O nome do banco de Dados */
define('DB_NAME','dbloja');

/**Usuário do banco de dados MySQL */
define('DB_USER','root');

/**Senha do banco de dados MySQL */
define('DB_PASSWORD','');

/**Nome do host do MySQL */
define('DB_HOST', 'localhost');

/**Caminho absoluto para a pasta do sistema */
if( !defined('ABSPATH'))
    define('ABSPATH',dirname(__FILE__). '/');

/**Caminho no server para o sistema */
    if(!defined('BASEURL'))
        define('BASEURL', '/loja-crud/');

/**Caminho do Arquivo de banco de dados */
if(!defined('DBAPI'))
    define('DBAPI', ABSPATH . 'inc/database.php');

