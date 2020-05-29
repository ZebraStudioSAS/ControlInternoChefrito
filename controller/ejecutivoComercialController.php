<?php
    include dirname(__FILE__,2).'/model/ejecutivoComercialModel.php';

    $ejecutivoComercial = new EjecutivoComercial();

    //Request: Crear una nueva categoria de cliente.
    if (isset($_POST['Create'])) {
        if ($ejecutivoComercial->newEjecutivoComercial($_POST)) {
            //header ('Location: ../view/agregarEjecutivoComercial.php?page=new&success=true');
            header ('Location: ../view/listarEjecutivoComercial.php');
        }else {
            header ('Location: ../view/agregarEjecutivoComercial.php?page=new&error=true');
        }
    }

    //Request: Editar una categoria de cliente.
    if (isset($_POST['Edit'])) {
        if ($ejecutivoComercial->setEditEjecutivoComercial($_POST)) {
            //header ('Location: ../view/editarEjecutivoComercial.php?page=edit&id=' . $_POST['idEjecutivoComercial'] . '&success=true');
            header ('Location: ../view/listarEjecutivoComercial.php');
        } else {
            header ('Location: ../view/editarEjecutivoComercial.php?page=edit&id=' . $_POST['idEjecutivoComercial'] . '&error=true');
        }
    }

    //Request: Eliminar una categoria de cliente.
    if (isset($_GET['Delete'])) {
        if ($ejecutivoComercial->deleteEjecutivoComercial($_GET['idEjecutivoComercial'])) {
            // header('location: ../index.php?page=users&success=true');
            echo json_encode(["success" => true]);
        } else {
            // header('location: ../index.php?page=users&&error=true');
            echo json_encode(["error" => true]);
        }
    }
?>
