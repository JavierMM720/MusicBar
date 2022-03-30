<?php
	class Admin{
		private $nombre_emp;
		private $ape_pate;
		private $mat;
		private $mails;
		private $pues;
		private $telefono;
	    private $contra;
		private $nombre;
        
		public function inicializar($nombre,$apepat,$apemat,$puesto, $telefono,$contrasena){
			$this->nombre_emp=$nombre;
			$this->ape_pate=$apepat;
			$this->mat=$apemat;
			$this->pues=$puesto;
			//$this->mails=$email;
			$this->telefono=$telefono;
			$this->contra=$contrasena;
			//Funcion para crear el Usuario
			$n1 = substr($apemat,0,3);
			$n2 = substr($apepat,0,3); 
		    $n3= substr($puesto,0,3);
			$usu= "$n1"."$n2"."$n3";
			$usa=$this->nombre_emp."$n2"."$n1"."$n3";
			$uf= trim($usa);
			$this->nombre = strtolower($uf);
			//	Nombre es el USUARIO .
			
			//fin que quede como Angelesme
		}
       public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		public function crearUsuario(){
			$reg=mysqli_query($this->conectarBD(),"CREATE USER '$this->nombre'@'localhost' IDENTIFIED BY '$this->contra'")or
				die("<h3>Error al crear el usuario</h3>".mysqli_error($this->conectarBD()));
		}
			
		public function ingresar(){
			//validar usuario repetido
		$registro=mysqli_query($this->conectarBD(),"SELECT usuario  FROM empleado  WHERE usuario='$this->nombre'") or 
			die("Problemas al consultar".mysqli_error($this->conectarBD())); 
			 if ($regi=mysqli_fetch_array($registro)){	
				$nc="Lo sentimos usuario ya registrado intente de nuevo con diferentes datos";
			echo "<script>";
		   echo "alert('$nc');";
		   echo "window.location ='agregaEmpleado.php';";
		   echo "</script>";
		}else{
				 //fin validado.
				$reg=mysqli_query($this->conectarBD(),"INSERT INTO empleado(nombre,ape_pat,puesto,contrasena,usuario,telefono,ape_mat)
			    values('$this->nombre_emp','$this->ape_pate','$this->pues','$this->contra','$this->nombre','$this->telefono','$this->mat')")or
				die("<h3>Problemas Al Ingresar Uusario</h3>".mysqli_error($this->conectarBD()));
				
		 echo "<h3>!! Listo Usuario Creeado !!</h3>";
				echo "<h3>El usuario es "."$this->nombre"."</h3>";
				 echo "<h3>La contraseña es "."$this->contra"."</h3>";
				 echo'<a class="btn btn-info" href="admin.php">Aceptar</a>'
                     ;
				 
			 }
			
		}
			
        
        
        public function listar(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM empleado WHERE id_empleado != '154'") or       
			die("Problemas al listar".mysqli_error($this->conectarBD()));
			echo '<a href="agregaEmpleado.php" class="btn btn-info mt-4">Agregar</a>
            
            <table class="table table-hover table-sm mt-3 table-responsive-sm"> 
                    <thead><tr><th>Clave del empleado</th><th>Nombre</th><th>Puesto</th><th>Telefono</th><th>Usuario</th><th>Privilegios</th></tr></thead>';     
			while ($reg=mysqli_fetch_array($registros)){       
				echo '<tr><td>'.$reg['id_empleado'].'</td>';
				echo '<td>'.$reg['nombre'].' '.$reg['ape_pat'].' '.$reg['ape_mat'].'</td>';
                echo '<td>'.$reg['puesto'].'</td>';
				echo '<td>'.$reg['telefono'].'</td>';
				echo '<td>'.$reg['usuario'].'</td>';
			    echo '<td>
                    <form action="adminCtrl.php" method="post">
                        <button type="submit" class="btn btn-danger"><span class="icon-eye"></span>Ver</button>
                        <input type="hidden" name="opc" value="2">
                        <input type="hidden" name="clave" value='.$reg['id_empleado'].'>
                    </form>
                </td>
                
                <td>
                    <form action="adminCtrl.php" method="post">
                        <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
                        <input type="hidden" name="opc" value="3">
                        <input type="hidden" name="usuario" value='.$reg['usuario'].'>
                    </form>
                </td>';
			}      
			echo '</table>';   
			
			mysqli_close($this->conectarBD());    
		}
		
		public function borrar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM empleado	WHERE usuario='$clave'") or       
			die("Problemas al borrar".mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){
				$claves= $reg['usuario'];
				echo "El Empleado : <br><br>";
				echo "<p>Clave: ".$reg['id_empleado']."</p>";
	
				echo "<p>nombre del Empleado: ".$reg['nombre']."  ".$reg['ape_pat']." ".$reg['ape_mat']."</p>";   
				echo "<p>Telefono: ".$reg['telefono']."</p>";
				echo "<p>Usuario: ".$reg['usuario']."</p>";
				
				echo '<p>Se efectuo el borrado del Empleado: '.$reg['usuario'].'</p>'; 
				
			mysqli_query($this->conectarBD(),"DELETE FROM empleado WHERE usuario ='$clave'") or         
			die(mysqli_error($this->conectarBD()));	
				mysqli_query($this->conectarBD(),"REVOKE ALL ON *.* FROM '$claves'@'Localhost'") or         
				die(mysqli_error($this->conectarBD()));
				
				mysqli_query($this->conectarBD(),"DROP USER 
                     '$claves'@'localhost'") or         
			    die(mysqli_error($this->conectarBD()));
				
				
			echo  '<a class="but" href="admin.php" class="btn btn-success">Regresar</a>';	
			}
			else{    
				echo '<h3>No existe un empleado con dicho usuario</h3>';
				echo  '<a class="but" href="admin.php" class="btn btn-success">Regresar</a>';	
			}
		}
		

	
	
	    public function consultar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM empleado WHERE id_empleado='$clave'") or 
			die("Error al consultar los privilegios".mysqli_error($this->conectarBD()));    
			if ($reg=mysqli_fetch_array($registro))  {   
                echo '<h5 class="centrado mt-4">Privilegios del Empleado: '.$reg['id_empleado'].'</h5>
                <h3 class="centrado mt-3">'.$reg['nombre'].' '.$reg['ape_pat'].'</h3>
                <p class="centrado mt-3">Privilegios sobre la tabla mesa: '.$reg['priv_mesa'].'</p>
                <p class="centrado">Privilegios sobre la tabla eventos: '.$reg['priv_eve'].'</p>
                <p class="centrado">Privilegios sobre la tabla bandas: '.$reg['priv_ban'].'</p>
                <p class="centrado">Privilegios sobre la tabla reservaciones: '.$reg['priv_res'].'</p>
                <p class="centrado">Privilegios sobre la tabla promociones: '.$reg['priv_pro'].'</p>
                <p class="centrado">Privilegios sobre la tabla clientes: '.$reg['priv_cli'].'</p>
                </div></div>';
			}  else  {   
				echo '<p>No existe empleado con dicha clave</p>';  
			}
		}
	
		

		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}