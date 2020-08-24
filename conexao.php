<?php

/**
 * @autor: Bruno Pessoa Nunes De Melo
 * Data: 23/08/2020
 * Descrição: Projeto de Um crud utiliza0ndo PHP puro e MySQl.
 * Esta Classe Conexao.php foi elaborada com o objetivo de auxiliar nas operações CRUDs em diverso SGBDS, para a conexão de
 * banco de dados e trazer os parâmetros para a aplicação. 
 *
 */

 /**
  * Definindo as contantes para a conexão com o banco dbloja.SQL
  */

  define('SGBD', 'mysql');
  define('HOST', 'localhost');
  define('DBNAME', 'dbloja');
  define('CHARSET','utf8');
  define('USER', 'root');
  define('PASSWORD', '');
  define('SERVER', 'linux');

  class conexao{
      /**
       * Atribuindo o estático de conexão
       */

       private static $pdo;

       /**Escondendo o construtor da classe */

       private function __construct(){

       }

       /**Estabelecendo um método privado para verificar se a extensão PDO do banco de dados escolhido
        * está habilitada
        */

        private static function verificaExtensao(){
            switch(SGBD):
                case 'mysql':
                    $extensão = 'pdo_mysql';
                break;

                case 'mysql':{
                    if(SERVER == 'linux'):
                        $extensao = 'pdo_dblib';
                    else:
                        $extensao = 'pdo_sqlsrv';
                    endif;
                break;
                }

                case 'postgre':
                    $extensao = 'pdo_pgsql';
                break;
            endswitch;

            if(!extension_loaded($extensao)):
                echo "<h1>Extensão {$extensao} não habilitada!</h1>";
                exit();
            endif;
        }

        /**
         * O Método getInstance() serve para retornar uma conexão válida
         * verifica se já existe uma instância da conexão, no contrário, configura uma nova conexão
         */

         public static function getInstance(){
             self::verificaExtensao();

             if(!isset(self::$pdo)){
                 try{
                     $opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                     switch(SGBD) :
                        case 'mysql':
                            self::$pdo = new \PDO("mysql:host=".HOST."; dbname=".DBNAME. ";" , USER, PASSWORD, $opcoes);
                        else:
                            self::$pdo = new \PDO("sqlsrv:server=".HOST."; database=" .DBNAME. ";", USER, PASSWORD, $opcoes);
                        endif;
                        break;
                 }
                 case 'postgre':
                    self::$pdo = new \PDO("pgsql:host=".HOST. ";dbname=".DBNAME. ";", USER, PASSWORD, $opcoes);
                    break;
                endswitch;
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
               } catch(PDOException $e){
                   print "Erro:".$e->getMessage();
               }
         }
         return self::$pdo;
    }

    public static function isConectado(){
        if(self::$pdo):
            return true;
        else:
            return false;
        endif;
    }
}