<?php
    include dirname(__FILE__,2)."/configuracion/conexion.php";

    /**
     *
     */
    class Producto{
        private $conn;
        private $link;

        function __construct(){
            $this->conn = new ConexionDB();
            $this->link = $this->conn->conectarse();
        }

        //Traer todos las categoria de los clientes registrados.
        public function getProductoOne(){
            $query = "SELECT `idProducto`, `codigoProducto`, `nombreProducto`, `embalajeProducto`, `ivaProducto`, lineaproduccion.nombreLineaProduccion, estadoProducto FROM producto INNER JOIN lineaproduccion ON producto.fk_idLineaProduccion = lineaproduccion.idLineaProduccion";
            $result = mysqli_query($this->link, $query);
            $data = array();
            while ($data[] = mysqli_fetch_assoc($result));
                array_pop($data);
            return $data;
        }

        public function getProducto(){
          $query = "SELECT * FROM `producto`";
          $result = mysqli_query($this->link, $query);
          $data = array();
          while ($data[] = mysqli_fetch_assoc($result));
          array_pop($data);
          return $data;
        }

        //Crear una nueva categoria de cliente.
        public function newProducto($data)
        {
            /*if ($data['codigoProducto'] != `codigoProducto`) {
                //print_r($data);die;
                return false;
                } else if ($data['codigoProducto'] == `codigoProducto`) {*/
                $query = "INSERT INTO `producto` (`codigoProducto`, `nombreProducto`, `embalajeProducto`, `ivaProducto`, `fk_idLineaProduccion`, `fk_idCategoriaCliente`, `estadoProducto`) VALUES ('".$data['codigoProducto']."', '".$data['nombreProducto']."', '".$data['embalajeProducto']."', '".$data['ivaProducto']."', '".$data['fk_idLineaProduccion']."', '".$data['fk_idCategoriaCliente']."', '".$data['estadoProducto']."')";
                $result = mysqli_query($this->link, $query);
                if (mysqli_affected_rows($this->link)>0) {
                    return true;
                }else{
                    return false;
                }
            /*}*/
        }

        //Obtener la categoria del cliente por ID - GET
        public function getProductoById($idProducto = NULL){
            if (!empty($idProducto)) {
                $query = "SELECT * FROM `producto` WHERE `idProducto` = ".$idProducto;
                $result = mysqli_query($this->link, $query);
                $data = array();
                while ($data[] = mysqli_fetch_assoc($result));
                    array_pop($data);
                return $data;
            }else {
                return false;
            }
        }

        //Obtener la categoria del cliente por ID - SET
        public function setEditProducto($data){
            if (!empty($data['idProducto'])) {
                $query = "UPDATE `producto` SET `nombreProducto` = '".$data['nombreProducto']."', `embalajeProducto` = '".$data['embalajeProducto']."', `ivaProducto` = '".$data['ivaProducto']."', `fk_idLineaProduccion` = '".$data['fk_idLineaProduccion']."' WHERE `producto`.`idProducto` = '".$data['idProducto']."'";
                $result = mysqli_query($this->link, $query);
                if ($result) {
                    return true;
                }else {
                    return false;
                }
            }else {
                return false;
            }
        }

        //Borrar registro categoria del cliente por ID
        public function deleteProducto($idProducto = null)
        {
            if (!empty($idProducto)) {
                $query = "DELETE FROM `producto` WHERE `idProducto` =  . $idProducto";
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
    		public function getProductoBySearch($data=NULL){
    			if(!empty($data)){
    				$query  ="SELECT * FROM `producto` WHERE `codigoProducto` LIKE'%".$data."%' OR `nombreProducto` LIKE'%".$data."%' OR `fk_idLineaProduccion` LIKE'%".$data."%'" ;
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
