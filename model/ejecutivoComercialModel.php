<?php
include dirname(__FILE__, 2) . "/configuracion/conexion.php";

/**
 *
 */
class EjecutivoComercial
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new ConexionDB();
        $this->link = $this->conn->conectarse();
    }

    //Traer todos los ejecutivos comerciales registrados.
    public function getEjecutivoComercial()
    {
        $query = "SELECT * FROM `ejecutivocomercial`";
        $result = mysqli_query($this->link, $query);
        $data = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crear un nuevo ejecutivo comercial

    public function newEjecutivoComercial($data)
    {
        /*if ($data['codigoEjecutivoComercial'] != `codigoEjecutivoComercial`) {
            //print_r($data);die;
            return false;
        } else if ($data['codigoEjecutivoComercial'] == `codigoEjecutivoComercial`) {*/
            $query = "INSERT INTO `ejecutivocomercial` (`codigoEjecutivoComercial`, `nombreEjecutivoComercial`, `correoEjecutivoComercial`) VALUES ('" . $data['codigoEjecutivoComercial'] . "', '" . $data['nombreEjecutivoComercial'] . "', '" . $data['correoEjecutivoComercial'] . "')";
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                return true;
            } else {
                return false;
            }
        /*} */
    }

    //Obtener la categoria del cliente por ID - GET
    public function getEjecutivoComercialById($idEjecutivoComercial = null)
    {
        if (!empty($idEjecutivoComercial)) {
            $query = "SELECT * FROM `ejecutivocomercial` WHERE `idEjecutivoComercial` = " . $idEjecutivoComercial;
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
    public function setEditEjecutivoComercial($data)
    {
        if (!empty($data['idEjecutivoComercial'])) {
            $query = "UPDATE `ejecutivocomercial` SET `nombreEjecutivoComercial` = '" . $data['nombreEjecutivoComercial'] . "', `correoEjecutivoComercial` = '" . $data['correoEjecutivoComercial'] . "' WHERE `idEjecutivoComercial` = " . $data['idEjecutivoComercial'];
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
    public function deleteEjecutivoComercial($idEjecutivoComercial = null)
    {
        if (!empty($idEjecutivoComercial)) {
            $query = "DELETE FROM `ejecutivocomercial` WHERE `idEjecutivoComercial` = " . $idEjecutivoComercial;
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
    public function getEjecutivoComercialBySearch($data=NULL){
        if(!empty($data)){
            $query  ="SELECT * FROM `ejecutivocomercial` WHERE `codigoEjecutivoComercial` LIKE'%".$data."%' OR `nombreEjecutivoComercial` LIKE'%".$data."%' OR `correoEjecutivoComercial` LIKE'%".$data."%'" ;
            $result =mysqli_query($this->link,$query);
            $data   =array();
            while ($data[]=mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        }else{
            return false;
        }
    }
}
