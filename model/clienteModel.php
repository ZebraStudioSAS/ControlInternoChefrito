<?php
    include dirname(__FILE__, 2) . "/configuracion/conexion.php";

    /**
     *
     */
    class Cliente
    {
        private $conn;
        private $link;

        public function __construct()
        {
            $this->conn = new ConexionDB();
            $this->link = $this->conn->conectarse();
        }

        //Traer todos las categoria de los clientes registrados.
        public function getClienteOne()
        {
            $query = "SELECT `idCliente`,`razonSocialCliente`,`nitRazonSocial`,`correoElectronicoCliente`,ejecutivocomercial.nombreEjecutivoComercial, estadoCliente FROM cliente INNER JOIN ejecutivocomercial ON cliente.fk_idEjecutivoComercial = ejecutivocomercial.idEjecutivoComercial";
            $result = mysqli_query($this->link, $query);
            $data = array();
            while ($data[] = mysqli_fetch_assoc($result));
                array_pop($data);
            return $data;
        }

        public function getCliente()
        {
            $query = "SELECT * FROM `cliente`";
            $result = mysqli_query($this->link, $query);
            $data = array();
            while ($data[] = mysqli_fetch_assoc($result));
                array_pop($data);
            return $data;
        }

        //Crear una nueva categoria de cliente.
        public function newCliente($data)
        {
            /*if ($data['nitRazonSocial'] != `nitRazonSocial`) {
                //print_r($data);die;
                return false;
            } else if ($data['nitRazonSocial'] == `nitRazonSocial`) {*/
                $query = "INSERT INTO `cliente` (`nitRazonSocial`, `razonSocialCliente`, `correoElectronicoCliente`, `contrasenaCliente`,`fk_idEjecutivoComercial`, `estadoCliente`) VALUES ('" . $data['nitRazonSocial'] . "', '" . $data['razonSocialCliente'] . "', '" . $data['correoElectronicoCliente'] . "', '" . $data['contrasenaCliente'] . "',  '" . $data['fk_idEjecutivoComercial'] . "', '" . $data['estadoCliente'] . "')";
                $result = mysqli_query($this->link, $query);
                if (mysqli_affected_rows($this->link) > 0) {
                    return true;
                } else {
                    return false;
                }
            /*} */
        }

        //Obtener la categoria del cliente por ID - GET
        public function getClienteById($idCliente = null)
        {
            if (!empty($idCliente)) {
                $query = "SELECT * FROM `cliente` WHERE `idCliente` = " . $idCliente;
                $result = mysqli_query($this->link, $query);
                $data = array();
                while ($data[] = mysqli_fetch_assoc($result));
                    array_pop($data);
                return $data;
            } else {
                return false;
            }
        }

        //Obtener la categoria del cliente por ID - SET
        public function setEditCliente($data)
        {
            if (!empty($data['idCliente'])) {
                $query = "UPDATE `cliente` SET `razonSocialCliente` = '" . $data['razonSocialCliente'] . "', `correoElectronicoCliente` = '" . $data['correoElectronicoCliente'] . "', `fk_idEjecutivoComercial` = '" . $data['fk_idEjecutivoComercial'] . "' WHERE `idCliente` = " . $data['idCliente'];
                $result = mysqli_query($this->link, $query);
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        //Borrar registro categoria del cliente por ID
        public function deleteCliente($idCliente = null)
        {
            if (!empty($idCliente)) {
                $query = "DELETE FROM `cliente` WHERE `idCliente` = " . $idCliente;
                $result = mysqli_query($this->link, $query);
                if (mysqli_affected_rows($this->link) > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        //Filtro de busqueda
        public function getClienteBySearch($data = null)
        {
            if (!empty($data)) {
                $query = "SELECT * FROM `cliente` WHERE `razonSocialCliente` LIKE'%" . $data . "%' OR `nitRazonSocial` LIKE'%" . $data . "%'";
                $result = mysqli_query($this->link, $query);
                $data = array();
                while ($data[] = mysqli_fetch_assoc($result));
                    array_pop($data);
                return $data;
            } else {
                return false;
            }
        }
    }
