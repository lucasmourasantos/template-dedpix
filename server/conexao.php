<?php

/**
 *
 * @return \PDO
 */
function conectaDB() {
    define('MYSQL_HOST', 'localhost');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', '');
    define('MYSQL_DB_NAME', 'ded');

    try {
        $conn = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
        $conn->exec("set names utf8");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

//abstract class ClassConexao{
//
//    protected function conectaDB()
//    {
//        try{
//            $con=new PDO("mysql:host=localhost;dbname=escola","root","");
//            return $con;
//        }catch (PDOException $erro){
//            return $erro->getMessage();
//        }
//    }
//}

?>