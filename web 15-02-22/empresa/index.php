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
                        <a href="#" class="nav-link active">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a href="../eventos/index.php" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a href="../bandas/index.php" class="nav-link">Bandas</a>
                    </li>
                    <li class="nav-item">
                        <a href="../promociones/index.php" class="nav-link">Promociones</a>
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
    <div class="container text-center">
        <section class="row mt-4">
            <main class="col-12 col-lg-8 align-self-center">
                <h1 class="text-white">Empresa Music Bar</h1>
                <h1><small class="text-white">Información de la empresa</small></h1>
                <div id="accordion">
                    <!-- MISION -->
                    <div class="card border-white bg-secondary">
                        <div class="card-header" id="heading1">
                            <h5 class="mb-0">
                                <button class="btn btn-link " data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                <h2 style="text-decoration:none" class="text-white">Misión</h2>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
                            <div class="card-body neg text-white bg-primary">
                                <img src="../img/exi.png" alt="" width="200">
                                <p>Ser un bar restaurante comprometido con la innovación, la creatividad, no dejando a un lado sobrepasar las expectativas de nuestros clientes, contando con una gama amplia de comida, bebidas y el mejor ambiente de rock que se puedan imaginar, acompañado de un excelente servicio.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- VISION -->
                    <div class="card border-white bg-danger">
                        <div class="card-header bg-secondary" id="heading2">
                            <h5 class="mb-0">
                                <button class="btn btn-link " data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2 " >
                                    <h2 style="text-decoration:none" class="text-white">Visión</h2>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                            <div class="card-body neg text-white">
                                <img src="../img/logoneg.jpg" alt="" width="" height="200">
                                <p>Ser reconocidos como un bar-restaurante original, sólido y profesional, con calidad humana y principios éticos, para ofrecer servicios y productos de excelencia. Lograr una empresa altamente productiva, innovadora, competitiva y dedicada para la satisfacción de nuestros clientes.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- VALORES -->
                    <div class="card border-white bg-secondary">
                        <div class="card-header" id="heading3">
                            <h5 class="mb-0">
                                <button class="btn btn-link " data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                <h2 style="text-decoration:none" class="text-white">Valores</h2>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                            <div class="card-body text-white bg-warning">
                                <a href="../admi/empleados.php"><img src="../img/valores.png" alt="" width="200" height="150"></a>
                                <p>Desarrollar una estructura integra en nuestro equipo colaboradores, actitud de servicio, convivencia y armonía en un ambiente de profesionalismo, honestidad y entusiasmo, con respeto hacia nuestros clientes y empleados, aseo, honestidad y una dedicación a nuestro deber para lograr una mayor prosperidad en nuestro negocio.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <aside class="col-12 col-lg-4">
                <div class="card text-white mt-3 border-white bg-secondary">
                    <div class="card-header vin"><h3 class="card-title">¿Como empezo Music Bar?</h3></div>
                    <img src="../img/inicio.jpg" class="card-img-top img-fluid" alt="">
                    <div class="card-body neg text-white">
                        <p>Fundado por 3 propietarios: Luz, Alberto, Raúl por medio de una idea innovadora de un Bar, el nombre de la empresa se da de la unión de la primera canción del grupo Versus donde el escritor y la voz principal era unos de los propietarios la canción titulada "Rocksong" que en español es "Canción de rock" fue una de sus primeras canciones y la que le llevo al éxito en muchas ocasiones.</p>
                    </div>
                </div>
            </aside>
        </section>
    
        <footer class="row mt-4">
            <div class="col-12">
                <p class="text-white centrado">Derechos reservados 2022&copy;</p>
            </div>
        </footer>
    </div>
    
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
</body>
</html>