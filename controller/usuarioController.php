<?php
    include dirname(__FILE__,2).'/model/usuarioModel.php';

    $usuario = new Usuario();

    //Request: Crear una nueva categoria de cliente.
    if (isset($_POST['Create'])) {
        if ($usuario->newUsuario($_POST)) {
            //header ('Location: ../view/agregarUsuario.php?page=new&success=true');
            header ('Location: ../view/listarUsuario.php');
        }else {
            header ('Location: ../view/agregarUsuario.php?page=new&error=true');
        }
    }

    //Request: Editar una categoria de cliente.
    if (isset($_POST['Edit'])) {
        if ($usuario->setEditUsuario($_POST)) {
            //header ('Location: ../view/editarUsuario.php?page=edit&id=' . $_POST['idUsuario'] . '&success=true');
            header ('Location: ../view/listarUsuario.php');
        } else {
            header ('Location: ../view/editarUsuario.php?page=edit&id=' . $_POST['idUsuario'] . '&error=true');
        }
    }

    //Request: Eliminar una categoria de cliente.
    if (isset($_GET['Delete'])) {
        if ($usuario->deleteUsuario($_GET['idUsuario'])) {
            // header('location: ../index.php?page=users&success=true');
            echo json_encode(["success" => true]);
        } else {
            // header('location: ../index.php?page=users&&error=true');
            echo json_encode(["error" => true]);
        }
    }
?>
