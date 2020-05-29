<?php
    include dirname(__FILE__,2).'/model/productoModel.php';

    $producto = new Producto();

    //Request: Crear una nueva categoria de cliente.
    if (isset($_POST['Create'])) {
        if ($producto->newProducto($_POST)) {
            //header ('Location: ../view/agregarProducto.php?page=new&success=true');
            header ('Location: ../view/listarProducto.php');
        }else {
            header ('Location: ../view/agregarProducto.php?page=new&error=true');
        }
    }

    //Request: Editar una categoria de cliente.
    if (isset($_POST['Edit'])) {
        //print_r($_POST); die;
        if ($producto->setEditProducto($_POST)) {
            //header ('Location: ../view/editarProducto.php?page=edit&id=' . $_POST['idProducto'] . '&success=true');
            header ('Location: ../view/listarProducto.php');
        } else {
            header ('Location: ../view/editarProducto.php?page=edit&id=' . $_POST['idProducto'] . '&error=true');
        }
    }

    //Request: Eliminar una categoria de cliente.
    if (isset($_GET['Delete'])) {
        if ($producto->deleteProducto($_GET['$idProducto'])) {
            // header('location: ../index.php?page=users&success=true');
            echo json_encode(["success" => true]);
        } else {
            // header('location: ../index.php?page=users&&error=true');
            echo json_encode(["error" => true]);
        }
    }
?>
