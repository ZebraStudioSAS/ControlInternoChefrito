<?php
    include dirname(__FILE__,2).'/model/lineaProduccionModel.php';

    $lineaProduccion = new LineaProduccion();

    //Request: Crear una nueva categoria de cliente.
    if (isset($_POST['Create'])) {
        if ($lineaProduccion->newLineaProduccion($_POST)) {
            //header ('Location: ../view/agregarLineaProduccion.php?page=new&success=true');
            header ('Location: ../view/listarLineaProduccion.php');
        }else {
            header ('Location: ../view/agregarLineaProduccion.php?page=new&error=true');
        }
    }

    //Request: Editar una categoria de cliente.
    if (isset($_POST['Edit'])) {
        if ($lineaProduccion->setEditLineaProduccion($_POST)) {
            //header ('Location: ../view/editarLineaProduccion.php?page=edit&id=' . $_POST['idLineaProduccion'] . '&success=true');
            header ('Location: ../view/listarLineaProduccion.php');
        } else {
            header ('Location: ../view/editarLineaProduccion.php?page=edit&id=' . $_POST['idLineaProduccion'] . '&error=true');
        }
    }

    //Request: Eliminar una categoria de cliente.
    if (isset($_GET['Delete'])) {
        if ($lineaProduccion->deleteLineaProduccion($_GET['idLineaProduccion'])) {
            // header('location: ../index.php?page=users&success=true');
            echo json_encode(["success" => true]);
        } else {
            // header('location: ../index.php?page=users&&error=true');
            echo json_encode(["error" => true]);
        }
    }
?>
