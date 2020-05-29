<?php
class Login
{
  public function evaluarSession($nickLogin, $contrasenaLogin)
  {
	  session_start();

	  $cont=0;

	  //Consulta de la DB

	  include('conexionLogin.php');
      $sql = "SELECT * FROM usuario WHERE nickUsuario = '$nickLogin' AND contrasenaUsuario = '$contrasenaLogin'";

	  if(!$result = $db->query($sql)){
		  die('Datos no encontrados!!! [' . $db->error . ']');
	  }
	  while($row = $result->fetch_assoc())
	  {
		  $nnickUsuario=stripslashes($row["nickUsuario"]);
		  $ccontrasenaUsuario=stripslashes($row["contrasenaUsuario"]);
		  $eestadoUsuario=stripslashes($row["estadoUsuario"]);
          $ffk_idRol=stripslashes($row["fk_idRol"]);
          //print_r($row);die;

	  if (($nnickUsuario==$nickLogin) && ($contrasenaLogin == $ccontrasenaUsuario))
	  {
		$cont=$cont=1;
	  }

	  } //Fin del WHILE

	  //Consulta de la DB

	  if($cont!="0"){
        $_SESSION["estado"]="1";
        if ($eestadoUsuario=="1") {
            if ($ffk_idRol == "1") {
                $_SESSION["idRol"] = "Administrador";
                header("Location: ../view/indexAdministrador.php");
            } elseif ($ffk_idRol == "2") {
                $_SESSION["idRol"] = "Consultor";
                header("Location: ../view/indexConsultor.php");
            }
        } elseif ($eestadoUsuario=="2") {
            header("Location: ../userBlock.php");
        }
	  }
	   if($cont=="0")
	  {
		header ("Location: ../login_error.php");
	  }
  }

}
$nuevo=new Login();
$nuevo->evaluarSession($_POST["nickLogin"], $_POST["contrasenaLogin"])
?>
