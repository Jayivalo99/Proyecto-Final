<?php

class Conexion extends PDO{
    private $hostBD='localhost';
    private $nombreBD='desempleo';
    private $usuarioBD='root';
    private $contrasenaBD='blackveilbrides';
    public function __construct()
    {
        try {
            parent::__construct('mysql:host='.$this->hostBD.';dbname='.$this->nombreBD
            .';charset=utf8',$this->usuarioBD,$this->contrasenaBD,array(PDO::ATTR_ERRMODE=>
            PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e){
            echo 'Error'.$e->getMessage();
        }
    }
}

?>