<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
    <link active rel="stylesheet" href="css/bootstrap.min.css">
        <link active rel="stylesheet" href="css/estilos.css">
    <link active rel="stylesheet" href="css/estilocomen.css">
    <link active href="https://fonts.googleapis.com/css?family=Shojumaru&display=swap" rel="stylesheet">
    <link active href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

    <title>Music Bar</title>
   
</head>
<body class="bg-dark">
<div class="container justify-content-center">
    <style>
        .jumbotron {
            background: url(img/maderita.jpg) no-repeat center;
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
                   <img class="img-fluid float-center logotipo" src="img/logo.jpg" alt="Logo del bar" width="170">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-5 align-self-center">
                    <p class="titulo">Music Bar</p>
                    <p class="slogan">"Rock it or leave it"</p>
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
                        <a href="#" class="nav-link active">Inicio</a>
                    </li>
                    <?php  

                    if(isset($_SESSION['id_usuario'])){
                        //Si esta logiado 
                    ?>  
                    <li class="nav-item">
                            <a href="#" class="nav-link">Mi perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="login/reservaciones.php" class="nav-link">Reservaciones</a>
                        </li>
                    <?php
                    }
                    ?>    
                    <li class="nav-item">
                        <a href="empresa/index.php" class="nav-link">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a href="eventos/index.php" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a href="bandas/index.php" class="nav-link">Bandas</a>
                    </li>
                    <li class="nav-item">
                        <a href="promociones/index.php" class="nav-link">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a href="ubicacion/index.php" class="nav-link">Ubicación</a>
                    </li>
                     
                        
                <?php  
                    if(isset($_SESSION['id_usuario'])){
                        //Si esta logiado 
                    ?>        
                </ul>
                        <a href="login/salir.php" class="btn btn-sm btn-danger">Cerrar Sesion</a>
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
                                <form method="post" action="usuario/clienteCtrl.php" autocomplete="off">
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
                                    <form action="login/reservaciones.php" method="post">
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
        <div class="row slider mt-3">
            <div class="col-12">
                <div class="carousel slide" id="primer-carousel" data-ride="carousel">
                   <ol class="carousel-indicators">
                       <li data-target="primer-carousel" data-slide-to="0" class="active"></li>
                       <li data-target="primer-carousel" data-slide-to="1"></li>
                       <li data-target="primer-carousel" data-slide-to="2"></li>
                       <li data-target="primer-carousel" data-slide-to="3"></li>
                       <li data-target="primer-carousel" data-slide-to="4"></li>
                       <li data-target="primer-carousel" data-slide-to="5"></li>
                   </ol>
                    <div class="carousel-inner">
                       <div class="carousel-item active">
                          <div class="carousel-caption d-block">
                              <p class="centrado letr">Conoce nuestro bar</p>
                          </div>
                           <img src="img/martinis.jpg" alt="" class="d-block img-fluid">
                       </div>
                       <div class="carousel-item">
                          <div class="carousel-caption d-block">
                              <p class="centrado letr">Disfruta de musica en vivo</p>
                          </div><!-- este texto forzosamente va antes que la imagen -->
                           <img src="img/bar.jpg" alt="" class="d-block img-fluid">
                       </div>
                       <div class="carousel-item">
                          <div class="carousel-caption d-block">
                              <p class="centrado letr">Reserva para nuestros eventos</p>
                          </div>
                           <img src="img/cocteles.jpg" alt="" class="d-block img-fluid">
                       </div>
                       <div class="carousel-item">
                          <div class="carousel-caption d-block">
                              <p class="centrado letr">Artistas altamente reconocidos</p>
                          </div>
                           <img src="img/music.jpg" alt="" class="d-block img-fluid">
                       </div>
                       <div class="carousel-item">
                          <div class="carousel-caption d-block">
                              <p class="centrado letr">Lo mejor en cocteles</p>
                          </div>
                           <img src="img/mojitos.jpg" alt="" class="d-block img-fluid">
                       </div>
                       <div class="carousel-item">
                          <div class="carousel-caption d-block">
                              <p class="centrado letr">Aprovecha las promociones</p>
                          </div>
                           <img src="img/colador.jpg" alt="" class="d-block img-fluid">
                       </div>
                    </div>
                
                    <a href="#primer-carousel" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    
                    <a href="#primer-carousel" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>
    
        <section class="row mt-4">
            <main class="col-12 col-lg-8 align-self-center bg-secondary border-white">
                <h1 class="mt-3 text-white">Visitanos y disfruta de los mejores grupos en vivo</h1>
                <p class="text-white">Si no tienes nada que hacer el fin de semana y te gusta ver grupos de rock en vivo, el Music Bar es uno de los mejores lugares que podrías visitar, en la avenida Nezahualcóyotl. Contamos con el mejor servicio así como un buen trato a nuestros clientes, además te aseguramos que escucharas los mejores éxitos con artistas de alta fama, además de la venta de bebidas que te encantaran, con buenos precios además de snacks que dejaran en tu boca un excelente sabor para que vuelvas pronto.</p>
            </main>
            <aside class="col-12 col-lg-4">
                <div class="card text-white border-white bg-secondary">
                    <div class="card-header vin">
                        <h3 class="card-title">Promociones</h3>
                    </div>
                    <img src="img/vallarta.jpg" class="card-img-top img-fluid" alt="">
                    <div class="card-body neg">
                        <p class="card-text centrado">Registrate y consulta todas nuestras promociones vigentes y reserva</p>
                    </div>
                </div>
            </aside>
        </section>
        
        <?php
     if(isset($_SESSION['id_usuario'])) {
     ?>
     
    <div class="row comentarios d-flex justify-content-center flex-wrap mt-4">
        <div class="col-6">
           <form id="formCom" method="post" action="admi/comentariosCtrl.php">			 
           <h1 class="rojo">Calificanos</h1>
				        <h1 class="clasificacion">
				        <input id="radio1" type="radio" name="estrellas" value="5"><!--
				     --><label for="radio1">★</label><!--
				     --><input id="radio2" type="radio" name="estrellas" value="4"><!--
				     --><label for="radio2">★</label><!--
                     --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                     --><label for="radio3">★</label><!--
                     --><input id="radio4" type="radio" name="estrellas" value="2"><!--
				     --><label for="radio4">★</label><!--
				     --><input id="radio5" type="radio" name="estrellas" value="1"><!--
				     --><label for="radio5">★</label></h1>
							<label for="titulo" class="text-white largo mt-2">Titulo</label>
							<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Asunto" required>
							
							<label for="descripcion largo mt-4" class="text-white largo">Comentario</label>
							<textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" required></textarea>
                           
                            <button type="submit"  class="but btn-primary btn-md mt-4" id="agregar">Enviar</button>
                            <input type="hidden" name="opc" value="1">
                            <?php 
                                echo '<input type="hidden" name="clave" value="'.$_SESSION['clave_cli'].'">';
                            ?>
						</form>
                        
            
            
        
     }
        </div>
					<?php
                      require "admi/comentariosClass.php";
		            
	
                        static $numero;
                        $numero=isset($_POST['numero']) ? $_POST['numero'] : 2;
                        if(isset($_POST['Cargar'])){
                            $numero++;
                        }
                          $coment=new Comentarios();
		                  $coment->conectarBD();
                          $result=$coment->Ver($numero);
                          $Nres=$coment->get_numeroRes();
                            
                        if($numero<$Nres){
                            echo "<div>";
                            require 'admi/boton.php';
                            echo "</div>";
                        }
                      $coment->desconectarBD();
                ?>
        </div>
    <?php 
     }
     ?>
        
        <footer class="row mt-4">
        <div class="col-12 text-white">
            <p class="centrado">Derechos reservados 2022&copy;</p>
        </div>
    </footer>
    </div>
    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>    
</body>
</html>