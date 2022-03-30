<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css2/jquery-ui.min.css">
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
        
        input[type="checkbox"]{
            display:none;
        }

        .privilegios, .privi{
            display: inline-block;
            position: relative;
            color:white;
            border-radius: 5px;
            font-size: 20px;
        }

        input[type="checkbox"]:checked + .privilegios{
            background: #CC0000;
            color:#fff;
        }
        
        input[type="checkbox"]:checked + .privi{
            background: #3366FF;
            color:#fff;
        }
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
                        <a href="admin.php" class="nav-link">Regresar</a>
                    </li>
                </ul>
            </div> 
        </div>
    </nav>
   
    <div class="jumbotron">
        <div class="container text-center"> 
            <h1 class="display-4">Super Administrador</h1>
        </div>
    </div>
      
    <div class="container">
        <div class="row">
            <section class="col-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Agregar empleado:</h3>
                    </div>
                </div>
                
                
                <form action="adminCtrl.php" method="post" autocomplete="off">
                    <div class="form-group row">
                        <div class=" col-12">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" placeholder="Nombre" maxlength="20" name="nombre" id="nombre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-12 col-md-6">
                            <label for="apepat">Apellido Paterno:</label>
                            <input type="text" class="form-control" placeholder="Apellido Paterno" maxlength="20" name="apepat" id="apepat" required>
                        </div>
                        <div class=" col-12 col-md-6">
                            <label for="apemat">Apellido Materno:</label>
                            <input type="text" class="form-control" placeholder="Apellido Materno" maxlength="20" name="apemat" id="apemat" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-12 col-md-6">
                            <label for="telefono">Telefono:</label>
                            <input type="tel" class="form-control" maxlength="10" placeholder="Telefono" name="telefono" id="telefono" required>
                        </div>
                        <div class=" col-12 col-md-6">
                            <label for="puesto">Puesto:</label>
                            <input type="text" class="form-control" placeholder="Ingresa el puesto del empleado" maxlength="20" name="puesto" id="puesto" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-12 col-md-6">
                            <label for="fechanac">Fecha de Nacimiento:</label>
                            <input type="text" class="form-control" id="fechanac" placeholder="dd/mm/yyyy" name="fechanac" onchange="javascript: document.form.registroempl.submit();" required>
                                <script src="../js2/jquery.js"></script>
                                <script src="../js2/jquery-ui.min.js"></script>
                                <script src ="../js2/datepicker-es.js"></script>
                                <script>
                                    $("#fechanac").datepicker({ minDate: "-70Y", maxDate: "-18Y" });
                                    $("#fechanac").datepicker( $.datepicker.regional[ "es"] );
                                </script>
                        </div>
                        <div class=" col-12 col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" placeholder="ejemplo@correo.com" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-12 col-md-6">
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" class="form-control" placeholder="Maximo 8 caracteres" name="contrasena" id="contrasena" required>
                        </div>
                        <div class=" col-12 col-md-6">
                            <label for="contrasena2">Confirmar contraseña:</label>
                            <input type="password" class="form-control" placeholder="Maximo 8 caracteres" name="contrasena2" id="contrasena2" required>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <h3>Seleccione los permisos</h3>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md-6 col-lg-3 text-center">
                            <input type="checkbox" name="consultar" id="consultar">
                            <label for="consultar" class="btn btn-dark privi">Consultar:</label>
                        </div>
                        <div class=" col-12 col-md-6 col-lg-3 text-center">
                            <input type="checkbox" name="borrar" id="borrar">
                            <label for="borrar" class="btn btn-dark privi">Borrar:</label>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 text-center">
                            <input type="checkbox" name="modificar" id="modificar">
                            <label for="modificar" class="btn btn-dark privi">Modificar:</label>
                        </div>
                        <div class=" col-12 col-md-6 col-lg-3 text-center">
                            <input type="checkbox" name="insertar" id="insertar">
                            <label for="insertar" class="btn btn-dark privi">Insertar:</label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h3>Seleccione las tablas permitidas</h3>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md-6 col-lg-4 text-center">
                            <input type="checkbox" name="evento" id="evento">
                            <label for="evento" class="btn btn-dark btn-block privilegios">Evento:</label>
                        </div>
                        <div class=" col-12 col-md-6 col-lg-4 text-center">
                            <input type="checkbox" name="mesas" id="mesas">
                            <label for="mesas" class="btn btn-dark btn-block privilegios">Mesa:</label>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 text-center">
                            <input type="checkbox" name="promocion" id="promocion">
                            <label for="promocion" class="btn btn-dark btn-block privilegios">Promocion:</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md-6 col-lg-4 text-center">
                            <input type="checkbox" name="bandas" id="bandas">
                            <label for="bandas" class="btn btn-dark btn-block privilegios">Bandas:</label>
                        </div>
                        <div class=" col-12 col-md-6 col-lg-4 text-center">
                            <input type="checkbox" name="cliente" id="cliente">
                            <label for="cliente" class="btn btn-dark btn-block privilegios">Cliente:</label>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 text-center">
                            <input type="checkbox" name="reservacion" id="reservacion">
                            <label for="reservacion" class="btn btn-dark btn-block privilegios">Reservacion:</label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row mt-4">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-lg btn-info">Ingresar</button>  
                            <input type="hidden" name="opc" value="1"> 
                        </div>
                     </div>
                </form>
                
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