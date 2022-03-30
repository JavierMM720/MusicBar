<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
    <link active rel="stylesheet" href="../css/bootstrap.min.css">
    <link active href="https://fonts.googleapis.com/css?family=Shojumaru&display=swap" rel="stylesheet">
    <link active href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

    <title>Music Bar</title>
   
</head>
<body class="bg-dark">
<div class="container justify-content-center">
    <style>
        .jumbotron {
            background: url(../img/maderita.jpg) no-repeat center;
            background-size: cover;
            min-height: 30vh;
        }

        #Content{width:120px;}
        #Content div{margin:5px 0;width:120px;border:1px #03f solid;border-top-width:8px;}
    </style>
    <div class="jumbotron">
        <div class="container text-center text-white">
            <div class="row no-gutters">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                   <img class="img-fluid float-center logotipo" src="../img/logo.jpg" alt="Logo del bar" width="170">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-5 align-self-center">
                   <h1 class=" titulo">Music Bar</h1>
                    <h1><small class="text-white slogan">"Rock it or Leave it"</small></h1>
                </div>
                <div class="col-12 col-md-1 col-lg-3"></div>
            </div>
        </div>
    </div>
      
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar" aria-expanded="false" aria-label="Menu de Navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbar2">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link">Inicio</a>
                    </li>
                    <?php  
                    
                    if(isset($_SESSION['id_usuario'])){
                        //Si esta logiado 
                    ?>  
                    <li class="nav-item">
                            <a href="#" class="nav-link">Mi perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="../login/reservaciones.php" class="nav-link">Reservaciones</a>
                        </li>
                    <?php
                    }
                    ?>    
                    <li class="nav-item">
                        <a href="../empresa/index.php" class="nav-link">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a href="../eventos/index.php" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a href="../bandas/index.php" class="nav-link">Bandas</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a href="../ubicacion/index.php" class="nav-link">Ubicación</a>
                    </li>
                     
                        
                <?php  
                    if(isset($_SESSION['id_usuario'])){
                        //Si esta logiado 
                    ?>        
                </ul>
                        <a href="../login/salir.php" class="btn btn-sm btn-danger">Cerrar Sesion</a>
                <?php
                    }else{
                        //Si no esta logeado
                    ?>
                </ul>
                    <button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#modal-registro">Registrarme</button>
                <div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="modal-registro" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">REGISTRATE</h5>
                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <form method="post" action="../usuario/clienteCtrl.php" autocomplete="off">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="apepat">Apellido Paterno:</label>
                                            <input type="text" class="form-control" placeholder="Apellido paterno" name="apepat" id="apepat" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="apemat">Apellido Materno:</label>
                                            <input type="text" class="form-control" placeholder="Apellido materno" name="apemat" id="apemat" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="fechanac">Fecha de Nacimiento:</label>
                                            <input type="text" class="form-control" id="fechanac" placeholder="dd/mm/yyyy" name="fechanac" onchange="javascript: document.form.registro.submit();" required>
                                                <script src="js2/jquery.js"></script>
                                                <script src="js2/jquery-ui.min.js"></script>
                                                <script src ="js2/datepicker-es.js"></script>
                                                <script>
                                                    $("#fechanac").datepicker({ minDate: "-70Y", maxDate: "-18Y" });
                                                    $("#fechanac").datepicker( $.datepicker.regional[ "es"] );
                                                </script>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="telefono">Telefono</label>
                                            <input type="tel" class="form-control" placeholder="Telefono celular" name="telefono" id="telefono" maxlength="10" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="email">Correo Electronico:</label>
                                            <input type="email" class="form-control" placeholder="ejemplo@correo.com" name="email" id="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="pass">Contraseña:</label>
                                            <input type="password" class="form-control" placeholder="Máximo 12 caracteres" name="pass" id="pass" maxlength="20" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="confirma">Confirmar contraseña:</label>
                                            <input type="password" class="form-control" placeholder="Confirma tu contraseña" name="confirma" id="confirma" maxlength="20" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Enviar" class="btn btn-success">
                                        <input type="hidden" name="opc" value="1">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
                
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-inicio">Iniciar Sesión</button>
                <div class="modal fade" id="modal-inicio" tabindex="-1" role="dialog" aria-labelledby="modal-inicio" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Iniciar Sesión</h5>
                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form action="../login/reservaciones.php" method="post">
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="usuario">Correo Electronico</label>
                                                <input type="email" class="form-control" placeholder="ejemplo@correo.com" name="usuario" id="usuario">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="contrasena">Contraseña</label>
                                                <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" id="contrasena">
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Aceptar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <?php
                    }
                    ?>
            </div> 
        </div>
    </nav>
                </div> 
    <div class="container">
        <section>
            <div class="row mt-4">
                <div class="col-12 centrado">
                    <h1 class="text-white text-center">Promociones</h1>
                </div>
            </div>
            <div class="row mt-4">
                <?php
                    
                    include "../usuario/promocionClass.php";
                    $banda=new Promocion();
                    $banda->conectarBD();
                    $banda->listarPromociones();
                    $banda->desconectarBD();
                    
                ?>
            </div>
        </section>
        
        <footer class="row mt-4">
        <div class="col-12 text-white text-center">
            <p class="centrado">Derechos reservados 2022&copy;</p>
        </div>
    </footer>
    </div>
    
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
</body>
</html>