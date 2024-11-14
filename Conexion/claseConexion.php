<?php

    /*
        Clase Connection que se encarga de inicializar los metodos setConect() y conect() para establecer conexion con MYSQL
        Autor: Andrés Fernando Sánchez
        Versión: 1.0
        Año: 2020
    */

    class connectionDB{

        // Establecemos las variables privadas de conexion a Mysql que tiene la clase
        private $server; // el servidor o el equipo donde establezco la conexion. Localhost
        private $username; // usuario de base de datos
        private $password; // contraseña
        private $database; // base de datos de conexion
        private $conecction; // Con esta variable voy a guardar toda la conexion con Mysql

        function __construct() // no recibe parametros
        {   
            // Inicializacion de dos metodos privados de la clase
            $this->setConnect(); // this-> sirve para hacer mención o referencia de una funcion o de una variable que utilice la clase
            $this->getConnect();
        }

        public function setConnect(){

            require('configuracion.php');
            $this->server = $server;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        public function getConnect(){
            
            $this->conecction = mysqli_connect($this->server, $this->username, $this->password, $this->database);
            
            if($this->conecction)
            {
                //echo 'Conectado a la base de datos';
            }
            else{
                echo 'Ocurrio un error en la conexion a la base de datos';
            }
            return $this->conecction;
        }
    }
?>