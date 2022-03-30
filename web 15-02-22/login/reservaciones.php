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
                </div>

   
    <div class="container text-center text-white bg-dark">
    
        <section class="row mt-4 bg-dark">
            <main class="col-12 bg-dark">
                <?php
                    include"validalogin.php";

                    $Login= new ValidaLoggin();
                    $Login->conectarBD();

                    if( isset($_SESSION['id_usuario'])  ){
                        $Login->inicializar($_SESSION['id_usuario'],$_SESSION['con']);
                        $Login->loggin(); 
                    }else{
                        $Login->inicializar($_REQUEST['usuario'],$_REQUEST['contrasena']);
                        $Login->loggin();  
                    }
                        $Login->desconectarBD();
                ?>
            </main>    
        </section>
        
        
    </div>
    <div>
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