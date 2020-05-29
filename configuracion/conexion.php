<?php
    class ConexionDB{
        private $host;
        private $user;
        private $password;
        private $database;
        private $port;

        public function __construct(){
            $this->host = "127.0.0.1"; // Servidor local o hosting.
            $this->user = "chefrito_userFinal"; // Usuario de la base de datos.
            $this->password = "x2*D~x*QYoh}"; // Contraseña del usuario de la base de datos.
            $this->database = "chefrito_total"; // Nombre de la base de datos.
            $this->$port = "3306"; //Numero del puerto 
        }

        public function conectarse(){
        $enlace = mysqli_connect($this->host, $this->user, $this->password, $this->database, $this->$port);
            if ($enlace) {
                // echo "Conexión exitosa."; //Si la conexión fue exitosa, arrojar mensaje de comprobante positivo.
            }else {
                die('Error de conexión [' . mysqli_connect_errno() . '] ' . mysqli_connect_error()); // Si la conexión fallo, enviar mensaje de error.
            }
            return($enlace);
            mysql_close($enlace); // Cerrar la conexión a la base de datos, muy importante para agregar seguridad al proyecto.
        }
    }