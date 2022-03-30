<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <title>Bar Rocks</title>
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
                        <a href="reservacion.php" class="nav-link">Regresar</a>
                    </li>
                </ul>
            </div> 
        </div>
    </nav>
   
    <div class="jumbotron">
        <div class="container text-center"> 
            <h1 class="display-4">Administrador</h1>
            <h1><small class="text-muted">Reservaciones</small></h1>
        </div>
    </div>
      
    <div class="container">
        <div class="row">
            <section class="col-12">
                <?php
      
		    include "reservacionClass.php";
            $reserv = new Reservacion();
            $reserv->conectarBD();
                
                        switch($_REQUEST['opc']){
                            case 1:$reserv->inicializar($_SESSION['fecha_res'],$_SESSION['hora_res'],$reservacion,$_SESSION['clave_cli']);
                                $reserv->ingresar();

                                header("Location:../login/reservaciones.php");
                                break;
                            case 2:$reserv->consultar($_REQUEST['clave']); break;
                            case 3:$reserv->borrar($_REQUEST['clave']);
                                header ("Location: reservacion.php"); break;
                            case 4: $reserv->actualizar();
                                header ("Location: reservacion.php"); break;
                            case 5:$reserv->borrar($_REQUEST['clave']);
                                header ("Location: ../login/reservaciones.php"); break;
                        }

                        $reserv->desconectarBD();
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