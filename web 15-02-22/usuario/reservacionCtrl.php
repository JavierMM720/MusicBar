<?php
include "detalle.php";
            include "reservacionClass.php";
            $reserv = new Reservacion();
            $detalle= new Detalle();
            $reserv-> conectarBD();
           ;
                
                    

                        switch($_REQUEST['opc']){
                            case 1:$reserv->inicializar($_SESSION['fecha_res'],$_SESSION['hora_res'],$_SESSION['clave_cli']);
                                $reserv->ingresar();
                                $reservacion=$detalle->obtenerClaveR();
                                if(isset($_POST['enviar'])){
                                    if(!empty($_POST['mesas'])) {
                                        
                                        foreach($_POST['mesas'] as $seleccion) {
                                            
                                            $detalle->conectarBD();
                                            $detalle->inicializar($reservacion, $seleccion);
                                            $detalle->agregar();
                                            $detalle->desconectarBD();
                                        
                                        }
                                        
                                    }else{
                                        echo "<p><b>Por favor seleccione al menos una opción.</b></p>";
                                    }
                                }
                                header("Location:codigo.php");
                                break;
                            case 4: $reserv->actualizar();
                                header ("Location: reservacion.php"); break;
                            case 5:
                                $detalle->liberarMesas($_REQUEST['clave']);
                                $reserv->borrar($_REQUEST['clave']);
                                header("Location:../login/reservaciones.php"); break;
                        }

                        $reserv->desconectarBD();
                ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontello.css">
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
                        <a href="../index.html" class="nav-link">Inicio</a>
                    </li>
                </ul>
                
                <a href="../reportes/pdfsReserv.php" class="btn btn-light">Generar Reporte</a>
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