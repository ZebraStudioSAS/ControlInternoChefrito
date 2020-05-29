<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/styleLogin.css">
    <link rel="stylesheet" href="css/stylePrincipal-2.min.css">
    <title>Usuario bloqueado - inicio sesión</title>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                                        </div>
                                        <form action="configuracion/evaluarSesion.php" method="post" id="formLogin" class="formLogin">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="nickUsuario" name="nickUsuario" aria-describedby="emailHelp" placeholder="Usuario" require>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="contrasenaUsuario" name="contrasenaUsuario" placeholder="Contraseña" require>
                                            </div>
                                            <div class="form-group">
                                            </div>
                                            <div class="form-button">
                                                <input type="submit" value="Ingresar" id="buttonIngreso" name="buttonIngreso" class="btn btn-primary btn-user btn-block">
                                            </div>
                                            <br>
                                            <div>
                                                <span>Usuario bloqueado, comuníquese con la administración.</span>
                                            </div>
                                        </form>
                                        <br>
                                        <div class="text-center">
                                            <a class="small" href="olvidoContrasena.php">¿Olvido su contraseña?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
