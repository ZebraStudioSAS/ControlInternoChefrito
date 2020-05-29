<?php
include dirname(__FILE__, 2) . "/configuracion/conexion.php";

/**
 *
 */
class Usuario
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new ConexionDB();
        $this->link = $this->conn->conectarse();
    }

    public function getUsuarioOne()
    {
        $query = "SELECT `idUsuario`,`nombreUsuario`,`apellidoUsuario`,`nickUsuario`,rol.descripcionRol,`ultimoLogin`,`estadoUsuario` FROM `usuario` INNER JOIN rol ON usuario.fk_idRol = rol.idRol WHERE idUsuario > '1'";
        $result = mysqli_query($this->link, $query);
        $data = array();
        while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
        return $data;
    }

    //Traer todos los ejecutivos comerciales registrados.
    public function getUsuario()
    {
        $query = "SELECT * FROM `usuario`";
        $result = mysqli_query($this->link, $query);
        $data = array();
        while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
        return $data;
    }

    //Crear un nuevo ejecutivo comercial
    public function newUsuario($data)
    {
        /*if ($data['nickUsuario'] != `nickUsuario`) {
            //print_r($data);die;
            return false;
        } else if ($data['nickUsuario'] == `nickUsuario`) {*/
           $query = "INSERT INTO `usuario` (`nombreUsuario`, `apellidoUsuario`, `nickUsuario`, `contrasenaUsuario`, `correoUsuario`, `fk_idGenero`, `fk_idRol`, `ultimoLogin`, `estadoUsuario`) VALUES  ('" . $data['nombreUsuario'] . "', '" . $data['apellidoUsuario'] . "', '" . $data['nickUsuario'] . "', '" . $data['contrasenaUsuario'] . "', '" . $data['correoUsuario'] . "', '" . $data['fk_idGenero'] . "', '" . $data['fk_idRol'] . "', '" . $data['ultimoLogin'] . "', '" . $data['estadoUsuario'] . "')";
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                return true;
            } else {
                return false;
            }
        /*} */
    }

    //Obtener la categoria del cliente por ID - GET
    public function getUsuarioById($idUsuario = null)
    {
        if (!empty($idUsuario)) {
            $query = "SELECT * FROM `usuario` WHERE `idUsuario` = " . $idUsuario;
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
    public function setEditUsuario($data)
    {
        if (!empty($data['idUsuario'])) {
            $query = "UPDATE `usuario` SET `nombreUsuario` = '" . $data['nombreUsuario'] . "', `apellidoUsuario` = '" . $data['apellidoUsuario'] . "', `fk_idRol` = '" . $data['fk_idRol'] . "' WHERE `idUsuario` = " . $data['idUsuario'];
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
    public function deleteUsuario($idUsuario = null)
    {
        if (!empty($idUsuario)) {
            $query = "DELETE FROM `usuario` WHERE `idUsuario` = " . $idUsuario;
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
    public function getUsuarioBySearch($data=NULL)
    {
        if(!empty($data)){
            $query  ="SELECT * FROM `usuario` WHERE `nombreUsuario` LIKE'%".$data."%' OR `nickUsuario` LIKE'%".$data."%' OR `apellidoUsuario` LIKE'%".$data."%'";
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
