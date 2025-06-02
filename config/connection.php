<?php

//TODO; se define la clase "Conectar".
class Conectar {
    //TODO; Variable protegida para almacenar la conexion a la base de datos.
    protected $dbh;

    //TODO; Funcion para realizar la conexión a la base de datos.
    protected function Conexion() {
        try {
            //TODO; Se establece la conexion a la base de datos usando PDO.
            $connect = $this->dbh = new PDO("mysql:local=localhost;dbname=paypal_integration", "root", "");
            return $connect;
        } catch (Exception $e) {
            print "Error BD".$e->getMessage();
            die();
        }  
    }

    //TODO; Funcion para configurar la codificacion de caracteres.
    public function setNames() {
        //TODO; Se ejecuta la consulta para configurar la codificación de caracteres a UTF-8
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}