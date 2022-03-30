<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <title>Music Bar
    </title>
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
        
        .modal-dialog {
            margin: 0px auto;
            height: 100%;
            max-width: 1000px;
        }
        
        .modal-content {
            width: auto;
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
                
                <a href="../reportes/pdfsBandas.php" class="btn btn-light">Generar Reporte</a>
            </div> 
        </div>
    </nav>
   
    <div class="jumbotron">
        <div class="container text-center">
            <div class="row no-gutters">
                <div class="col-12">
                   <h1 class="display-4">Administrador</h1>
                    <h1><small class="text-muted">Empleados</small></h1>
                </div>
            </div>
        </div>
    </div>  
      
    <div class="container">
        <div class="row">
            <section class="col-12">
                <?php
	
		include "adminclass.php";
		$admin=new Admin();
		$admin->conectarBD();
                
      if(isset($_REQUEST['consultar'])){//
				$consulta= "SELECT";
			}else{
				$consulta=NULL;
			}if(isset($_REQUEST['borrar'])){
				$borra="DELETE";
			}else{ 	                                                      	
                $borra=NULL;
			}
			if(isset($_REQUEST['modificar'])){
				$modifica="UPDATE";
			}else{
				$modifica=NULL;
			}
			if(isset($_REQUEST['insertar'])){
				$inserta="INSERT";
			}else{
				$inserta=NULL;
			}if(isset($_REQUEST['evento'])){
				$even="EVENTO";
			}else{
				$even=NULL;
			}if(isset($_REQUEST['mesas'])){
				$mesa="MESA";
			}else{
				$mesa=NULL;
			}if(isset($_REQUEST['promocion'])){
				$pro="PROMOCION";
			}else{
				$pro=NULL;
			}if(isset($_REQUEST['bandas'])){
				$ban="BANDAS";
			}else{
				$ban=NULL;
			}if(isset($_REQUEST['reservacion'])){
				$res="RESERVACION";
			}else{
				$res=NULL;
			}if(isset($_REQUEST['cliente'])){
				$cl="CLIENTE";
			}else{
				$cl=NULL;
			}   
		
		switch($_REQUEST['opc']){
			case 1:$admin->inicializar($_REQUEST['nombre'],$_REQUEST['apepat'],$_REQUEST['apemat'],$_REQUEST['puesto'],$_REQUEST['telefono'],$_REQUEST['contrasena']);
                $admin->ingresar();
                $admin->crearUsuario();
                $admin->prueba($modifica,$inserta,$borra,$consulta,$even,$mesa,$pro,$ban,$res,$cl);
                //header("Location: admin.php"); break;
                break;
            case 2:$admin->consultar($_REQUEST['clave']); break;
			case 3:$admin->borrar($_REQUEST['usuario']);
                header("Location: admin.php"); break;
		}
    
		
		$admin->desconectarBD();
	
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