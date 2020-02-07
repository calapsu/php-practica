

<?php

class Connectdb
{
    var $host;
    var $user;
    var $pass;
    var $namedb;
    var $connect_mysql;

    // El estado de la conexión
    var $status = 1;
    var $message = '';

    function __construct($host_p, $user_p, $pass_p, $namedb_p)
    {
        $this->host = $host_p;
        $this->user = $user_p;
        $this->pass = $pass_p;
        $this->namedb = $namedb_p;

        // Nos conectamos a la base de datos
        $this->connectMysql();
    }

    // Esta funcion nos permite crer una conexion con mysql (Base de datos)
    function connectMysql()
    {
        $this->connect_mysql = new mysqli($this->host, $this->user, $this->pass, $this->namedb);

        // Validar los errores que se pudieran generar a la hora de conectarnos
        if ($this->connect_mysql->connect_error) {
            $this->status = -1;
            $this->message = $this->connect_mysql->connect_error;
        }
    }

    // Esta funcion permite cerrar la conexion con Mysql (Base de datos)
    function closeMsql()
    {
        $this->connect_mysql->close();
    }
}

$database = new Connectdb('127.0.0.1', 'root', '', 'ajax');