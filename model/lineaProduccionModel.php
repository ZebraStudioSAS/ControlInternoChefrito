<?php
include dirname(__FILE__, 2) . "/configuracion/conexion.php";

/**
 *
 */
class LineaProduccion
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new ConexionDB();
        $this->link = $this->conn->conectarse();
    }

    //Traer todos los ejecutivos comerciales registrados.
    public function getLineaProduccion()
    {
        $query = "SELECT * FROM `lineaproduccion`";
        $result = mysqli_query($this->link, $query);
        $data = array();
        while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
        return $data;
    }

    public function getLineaProduccionProductos()
    {
        $query = "SELECT `idLineaProduccion`,`codigoLineaProduccion`,`nombreLineaProduccion` FROM `lineaproduccion`";
        $result = mysqli_query($this->link, $query);
        $data = array();
        while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
        return $data;
    }

    //Crear un nuevo ejecutivo comercial
    public function newLineaProduccion($data)
    {
        /*if ($data['codigoLineaProduccion'] != `codigoLineaProduccion`) {
            //print_r($data);die;
            return false;
        } else if ($data['codigoLineaProduccion'] == `codigoLineaProduccion`) {*/
            $query = "INSERT INTO `lineaproduccion` (`codigoLineaProduccion`, `nombreLineaProduccion`) VALUES ('" . $data['codigoLineaProduccion'] . "', '" . $data['nombreLineaProduccion'] . "')";
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                return true;
            } else {
                return false;
            }
        //} 
    }

    //Obtener la categoria del cliente por ID - GET
    public function getLineaProduccionById($idLineaProduccion = null)
    {
        if (!empty($idLineaProduccion)) {
            $query = "SELECT * FROM `lineaproduccion` WHERE `idLineaProduccion` = " . $idLineaProduccion;
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
    public function setEditLineaProduccion($data)
    {
        if (!empty($data['idLineaProduccion'])) {
            $query = "UPDATE `lineaproduccion` SET `nombreLineaProduccion` = '" . $data['nombreLineaProduccion'] . "' WHERE `idLineaProduccion` = " . $data['idLineaProduccion'];
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
    public function deleteLineaProduccion($idLineaProduccion = null)
    {
        if (!empty($idLineaProduccion)) {
            $query = "DELETE FROM `lineaproduccion` WHERE `idLineaProduccion` = " . $idLineaProduccion;
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
    public function getLineaProuccionBySearch($data=NULL){
        if(!empty($data)){
            $query  ="SELECT * FROM `lineaproduccion` WHERE `codigoLineaProduccion` LIKE'%".$data."%' OR `nombreLineaProduccion` LIKE'%".$data."%'";
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