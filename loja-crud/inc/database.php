<?php

mysqli_report(MYSQLI_REPORT_STRICT);

/**Funçao para abrir conexão com o banco de dados se tudo dêr certo 
 * a conexão é aberta. No entanto, se houver algum erro, a função dispara
 * uma exceção, que poder ser exibiida ao usuário. 
 */
function open_database(){
    try{
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn;

    } catch(Exception $e){
        echo $e->getMessage();
        return null;
    }
}
//** fecha a conexão que for passada. Se houver qualquer erro, a função dispara uma exceção */
function close_database($conn){
    try{
        mysqli_close($conn);

    } catch (Exception $e){
        echo $e->getMessage();
    }


    /**Pesquisa um Registro pelo ID em uma Tabela */

    function find( $table = null, $id = null){
        $database = open_database();
        $found = null;

        try {
            if($id){
                $sql = "SELECT*FROM". $table. "WHERE id =". $id;
                $result = $database->query($sql);

                if($result->num_rows > 0){
                    $found = $result-> fetch_assoc(MYSQLI_ASSOC);

                    /**Método alternativo 
                     * $found = array();
                     * 
                     * while ($row = $result-> fetch_assoc()){
                     * array_push($found, $row);
                     * }
                     */
                }
            }
        } catch(Exception $e){
            $_SESSION['message'] = $e->GetMessage();
            $_SESSION['type'] = 'danger';
        }

        close_database($database);
        return $found;
    }

    function find_all($table){
        return find($table);
    }
}



