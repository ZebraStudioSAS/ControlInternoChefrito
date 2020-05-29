<?php
    $db = new mysqli('127.0.0.1', 'chefrito_userFinal', 'x2*D~x*QYoh}', 'chefrito_total', '3306');
    $acentos = $db->query("SET NAMES 'utf8'");

    //Servidor, usuario, password, DB, Puerto

    if ($db->connect_error < 0) {
        die('No se puede conectar [' . $db->connect_error . ']');
    }
?>
