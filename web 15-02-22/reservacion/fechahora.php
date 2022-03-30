<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
    <link active rel="stylesheet" href="../css/bootstrap.min.css">
    <link active href="https://fonts.googleapis.com/css?family=Shojumaru&display=swap" rel="stylesheet">
    <link active href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <title>Music Bar</title>
    <script>
     window.alert("Te recordamos que solo puedes reservar una mesa de las 7:00 pm a 11:00pm");
    </script>

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

   
    <div class="container text-center">
    
        <section class="row mt-4">
            <main class="col-12 col-lg-8 align-self-center bg-black">
               <h2 class="rojo mb-3 text-white">REGISTRA TU RESERVACIÓN</h2>
                <form action="lugares.php" method="post">
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="fecha_reserv" class="text-formu text-white">Fecha:</label>
                            <input type="text" id="fecha_reserv" name="fecha_reserv" placeholder="dd/mm/yyyy" class="form-control" onchange="javascript: document.form.reservando.submit();"  required>
                            <script src="../js2/jquery.js"></script>
                            <script src="../js2/jquery-ui.min.js"></script>
                            <script src ="../js2/datepicker-es.js"></script>
                            <script>
		
                            $("#fecha_reserv").datepicker({ minDate: -0, maxDate: "+1M +10D" });
                              $("#fecha_reserv").datepicker( $.datepicker.regional[ "es"] );

                            </script>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="hora_reserv" class="textformu text-white">Hora:</label>
                            <input type="time" class="form-control" name="hora_reserv" id="hora_reserv" min="19:00" max="23:00" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button class="btn btn-info btn-sm mt-3" type="submit">Buscar lugares</button>
                        </div>
                    </div>
                </form>
            </main>
            <aside class="col-12 col-lg-4 mt-3">
                <div class="card bg-dark text-white">
                    <img src="../img/vallarta.jpg" class="card-img-top img-fluid" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Promociones</h3>
                        <p class="card-text centrado">Registrate y consulta todas nuestras promociones vigentes y reserva</p>
                        <a href="#" class="btn btn-danger btn-lg btn-block">Ver mas</a>
                    </div>
                </div>
            </aside>
        </section>
        
        <footer class="row mt-4">
        <div class="col-12 text-white">
            <p class="centrado">Derechos reservados &copy;2021</p>    
            <small></small>
        </div>
    </footer>
    </div>
    
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
</body>
</html>