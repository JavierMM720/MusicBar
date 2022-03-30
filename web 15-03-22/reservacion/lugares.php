<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
    <link active rel="stylesheet" href="../css/bootstrap.min.css">
    <link active rel="stylesheet" href="../css2/jquery-ui.min.css">
    <link active href="https://fonts.googleapis.com/css?family=Shojumaru&display=swap" rel="stylesheet">
    <title>Music Bar</title>
    <style>
        input[type="checkbox"]{
            display:none;
        }

        label{
            background: #000;
            display: inline-block;
            position: relative;
            color:white;
            border-radius: 5px;
        }

        .mesaocupada{
            background: #BB0000;
            color: #fff;
        }
        
        .mesaocupada:hover {
            color: #fff;
        }

        input[type="checkbox"]:checked + label{
            background: #00BB00;
            color:#000;
        }
        
        .btn-light {
            background: #DDD;
        }
        
    </style>
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
                        <a href="#" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                            <a href="#" class="nav-link">Mi perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="../login/reservaciones.php" class="nav-link active">Reservaciones</a>
                        </li>
                        
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
                        <a href="../promociones/index.php" class="nav-link">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a href="../ubicacion/index.php" class="nav-link">Ubicación</a>
                    </li>
                     
                        
                </ul>
                        <a href="../login/salir.php" class="btn btn-sm btn-danger">Cerrar Sesion</a>


            </div> 
        </div>
    </nav>
                
    
    <form action="../usuario/reservacionCtrl.php" method="post">

    
    
    <?php
        
        $_SESSION['fecha_res'] = $_REQUEST['fecha_reserv'];
        $_SESSION['hora_res'] = $_REQUEST['hora_reserv'];
        include '../usuario/mesaClass.php';
        $mesa=new Mesa();
        $mesa->conectarBD();
        // Validar si enviaron fecha:
        // SELECT * FROM reservacion WHERE fecha_reserv = __________;
        // if(num_registros != 0) {
        // tendrian que pintar de rojo las mesas que estan listadas
        //} else {
        // tendrian que pintar todas las mesas libres
        //}
        ?>
         
   
    <div class="container d-block d-md-none">
       
        <div class="row mt-2">
            <div class="col-3">
                <div class="row justify-content-center text-center">
                    <div class="col-12 mx-0">
                        <a href="#vip1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="vip1" class="btn btn-secondary btn-block">VIP1</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row justify-content-center text-center">
                    <div class="col-12 mx-0">
                        <a href="#general" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="general" class="btn btn-dark btn-block">GENERAL</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row justify-content-center text-center">
                    <div class="col-12 mx-0">
                        <a href="#vip2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="vip2" class="btn btn-secondary btn-block">VIP2</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-12">
                <div class="row justify-content-center text-center">
                    <div class="col-6"> 
                        <a href="#vip3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="vip3" class="btn btn-secondary btn-block">VIP3</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <?php
                $mesa->listarGrid($_REQUEST['fecha_reserv']);
            ?>
        </div>
    </div>
    
    <div class="container d-none d-md-block">
     
    <div class="row justify-content-center mt-4">
            <?php
                $mesa->listarEscenario($_REQUEST['fecha_reserv']);
            ?>
    </div>
        
        <?php
        $mesa->desconectarBD();
            ?> 
            
            
        <div class="col text-center mt-4">
            <button type="submit" name=enviar class="btn btn-danger">Reservar</button>
            <input type="hidden" name="opc" value="1">
        </div>
        </div>
        <footer class="mt-4">
        </footer>
           
    </form>
    <footer class="row mt-4 text-center">
        <div class="col-12 text-white">
            <p class="centrado">Derechos reservados 2022&copy;</p>
        </div>
    </footer>
            
        
    </div>
    
    
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
</body>
</html>