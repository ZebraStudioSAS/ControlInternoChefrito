<?php
    include dirname(__FILE__,2).'/model/clienteModel.php';

    $cliente = new Cliente();

    //Request: Crear una nueva categoria de cliente.
    if (isset($_POST['Create'])) {
        if ($cliente->newCliente($_POST)) {
            //header ('Location: ../view/agregarCliente.php?page=new&success=true');
            header ('Location: ../view/listarCliente.php');
        }else {
            header ('Location: ../view/agregarCliente.php?page=new&error=true');
        }
    }

    //Request: Editar una categoria de cliente.
    if (isset($_POST['Edit'])) {
        if ($cliente->setEditCliente($_POST)) {
            //header ('Location: ../view/editarCliente.php?page=edit&id=' . $_POST['idCliente'] . '&success=true');
            header ('Location: ../view/listarCliente.php');
        } else {
            header ('Location: ../view/editarCliente.php?page=edit&id=' . $_POST['idCliente'] . '&error=true');
        }
    }

    //Request: Eliminar una categoria de cliente.
    if (isset($_GET['Delete'])) {
        if ($cliente->deleteCliente($_GET['$idCliente'])) {
            // header('location: ../index.php?page=users&success=true');
            echo json_encode(["success" => true]);
        } else {
            // header('location: ../index.php?page=users&&error=true');
            echo json_encode(["error" => true]);
        }
    }
?>
