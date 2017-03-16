<?php

class Conexao{

    public static $instance;
 
    public static function getConexao() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=mysql.hostinger.com.br;dbname=u910052122_lista', 'u910052122_admin', 'Carlos.1998');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } return self::$instance;
    }
   
}
