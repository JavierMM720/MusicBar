<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Music Bar</title>
    <style>
        .jumbotron {
            padding: 30px;
            height: 170px;
        }
        
        p {
            text-align: justify;
            padding: 10px;
            font-size: 20px;
        }
        
        .centrado {
            text-align: center;
        }
        
        footer {
            padding: 20px 0;
            background: #1e1e1e;
        }
        
        .navegador a:hover {
            background: rgba(255,255,255,.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar" aria-expanded="false" aria-label="Menu de Navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbar2">
                <ul class="navbar-nav navegador mr-auto">
                    <li class="nav-item active">
                        <a href="../index.php" class="nav-link">Salir</a>
                    </li>
                </ul>
            </div> 
        </div>
    </nav>
   
    <div class="jumbotron">
        <div class="container text-center"> 
            <h1 class="display-4">Administradores</h1>
            <h1><small class="text-muted">¡Bienvenido!</small></h1>
        </div>
    </div>
      
    <div class="container">
        <div class="row">
            <section class="col-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Inicio Sesión</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="../img/logoblan.jpg" alt="Logo de la empresa" width="500" class="img-fluid">
                    </div>
                </div>
                <?php  
                    
                    if(isset($_SESSION['usuario'])){
                        //Si esta logiado 
                    ?>        
                        <div class="row">
                            <div class="col-6 text-center">
                                <a href="salir.php" class="btn btn-danger btn-lg">Cerrar Sesion</a>
                            </div>
                            <div class="col-6 text-center">
                                <a href="empleadosValidarCtrl.php" class="btn btn-info btn-lg">Panel de control</a>
                            </div>
                        </div>
                        
                <?php
                    }else{
                        //Si no esta logeado
                    ?>
                
                <form action="empleadosValidarCtrl.php" method="post">
                    <div class="form-group row">
                        <div class=" col-12 col-md-6 mb-3">
                            <label for="usuario">Ingresa tu usuario:</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="usuario" id="usuario">
                        </div>
                        <div class=" col-12 col-md-6 mb-3">
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" id="contrasena">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-lg btn-dark">Ingresar</button>   
                        </div>
                     </div>
                </form>
                
                <?php
                    }
                ?>
            </section>
        </div>
        
        <footer class="row mt-4">
            <div class="col-12">
                
            </div>
        </footer>
    </div>
    
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
</body>
</html>