<?php

	class Admin{
		private $usuario;
	    private $contra;
	
		public function inicializar($usuario,$contrasena){
			$this->usuario=$usuario;
			$this->contra=$contrasena;

		}
		
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
        public function verificarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
        
		public function valida(){
        $cuenta =strtolower($this->usuario);
        $con = strtolower($this->contra);
        
	$registro=mysqli_query($this->verificarBD(),"select * from empleados where usuario = '$cuenta'") or
     die(mysqli_error($this->verificarBD()));
      if ($reg=mysqli_fetch_array($registro)){
          $c = $reg['usuario'];
          $n = $reg['contrasena'];
          
          
          //conexi 
          if( $c == $cuenta and $n == $con  ){
    		  echo '<script>alert("Usuario correcto") </script>';
            $_SESSION['usuario'] = trim($this->usuario);
            $_SESSION['clave_usua'] = $reg['id_empleado'];
             $_SESSION['cont']= $this->contra;
          /*$_SESSION['evento']= $reg['priv_eve'];
          $_SESSION['cliente']= $reg['priv_cli'];
          $_SESSION['mesa']= $reg['priv_mesa'];
          $_SESSION['banda']= $reg['priv_ban'];
          $_SESSION['reservacion']= $reg['priv_res'];
          $_SESSION['promocion']= $reg['priv_pro'];
          $_SESSION['nombre']= $reg['nombre'].' '.$reg['ape_pat'];
          $_SESSION['puesto']= $reg['puesto'];*/
          
            
            if($cuenta == 'luisluna' && $con == 'luis12345'){
                echo '<div class="jumbotron">
        <div class="container text-center"> 
            <h1 class="display-4">Administrador</h1>
            <h1><small class="text-muted">Luis Luna</small></h1>
        </div>
    </div>
      
    <div class="container">
        <div class="row">
            <section class="col-12"><div class="row text-center"><div class="col-12"><h3>Panel de control</h3></div>
                </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-3 mt-4">
                             <a href="cliente.php" class="btn btn-dark btn-lg btn-block">Clientes</a>
                        </div>
                        <div class="col-12 col-sm-3 mt-4">
                             <a href="reservacion.php" class="btn btn-dark btn-lg btn-block">Reservaciones</a>
                        </div>
                        <div class="col-12 col-sm-3 mt-4">
                             <a href="bandas.php" class="btn btn-dark btn-lg btn-block">Bandas</a>
                        </div>
                        <div class="col-12 col-sm-3 mt-4">
                             <a href="evento.php" class="btn btn-dark btn-lg btn-block">Eventos</a>
                        </div>
                        <div class="col-12 col-sm-3 mt-4">
                             <a href="promocion.php" class="btn btn-dark btn-lg btn-block">Promociones</a>
                        </div>
                        <div class="col-12 col-sm-3 mt-4">
                             <a href="comentarios.php" class="btn btn-dark btn-lg btn-block">Comentarios</a>
                        </div>
                        <div class="col-12 col-sm-3 mt-4">
                             <a href="zona.php" class="btn btn-dark btn-lg btn-block">Zonas</a>
                        </div>
                        <div class="col-12 col-sm-3 mt-4">
                             <a href="mesa.php" class="btn btn-dark btn-lg btn-block">Mesas</a>
                        </div>
                        
                    </div>';
            }else{
              
              echo '<div class="jumbotron">
        <div class="container text-center"> 
            <h1 class="display-4">'.$_SESSION['nombre'].'</h1>
            <h1><small class="text-muted">'.$_SESSION['puesto'].'</small></h1>
        </div>
    </div>
      
    <div class="container">
        <div class="row">
            <section class="col-12"><div class="row text-center"><div class="col-12"><h3>Panel de control</h3></div>
                </div>
                    <div class="row justify-content-center">';
                        $ncliente= strlen($_SESSION['cliente']);
                        if($ncliente != 0){
                            echo '<div class="col-12 col-sm-3 mt-4">
                            <a href="cliente.php" class="btn btn-dark btn-lg btn-block">Clientes</a>
                        </div>';
                        }
                
                        $nres= strlen($_SESSION['reservacion']);
                        if($nres != 0){
                            echo '<div class="col-12 col-sm-3 mt-4">
                            <a href="reservacion.php" class="btn btn-dark btn-lg btn-block">Reservaciones</a>
                        </div>';
                        }
                        
                        $npromocion= strlen($_SESSION['promocion']);
                        if($npromocion != 0){
                            echo '<div class="col-12 col-sm-3 mt-4">
                            <a href="promocion.php" class="btn btn-dark btn-lg btn-block">Promociones</a>
                        </div>';
                        }
                        
                        $nban= strlen($_SESSION['banda']);
                        if($nban != 0){
                            echo '<div class="col-12 col-sm-3 mt-4">
                            <a href="bandas.php" class="btn btn-dark btn-lg btn-block">Bandas</a>
                        </div>';
                        }
                
                        $neven= strlen($_SESSION['evento']);
                        if($neven != 0){
                            echo '<div class="col-12 col-sm-3 mt-4">
                            <a href="evento.php" class="btn btn-dark btn-lg btn-block">Eventos</a>
                        </div>';
                        }
                
                        $nmesa= strlen($_SESSION['mesa']);
                        if($nmesa != 0){
                            echo '<div class="col-12 col-sm-3 mt-4">
                            <a href="mesa.php" class="btn btn-dark btn-lg btn-block">Mesas</a>
                        </div>';
                        }
                    echo '</div>';
            }
            }elseif($cuenta == $reg['usuario'] and $con != $reg['contrasena'] ){
	              	$nc="Ups...Contraseña Incorecta...";
			echo "<script>";
		   echo "alert('$nc');";
		   echo "window.history.back();";
		   echo "</script>";          
          }
      }else{
              $nc="No tienes un cuenta con nosotros";
			echo "<script>";
		   echo "alert('$nc');";
		   echo "window.location ='empleados.php';";
		   echo "</script>";
          }
	}

    public function desconectarBD(){
        mysqli_close($this->verificarBD());
    }
        
    }
?>