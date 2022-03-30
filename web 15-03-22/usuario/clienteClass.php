<?php
	class Cliente{
		private $nombre;
		private $apepat;
		private $apemat;
		private $fechanac;
		private $email;
		private $telefono;
		private $contrasena;
		
		public function inicializar($nombre,$apepat,$apemat,$fechanac,$email,$telefono,$contrasena){
			$this->nombre=$nombre;
			$this->apepat=$apepat;
			$this->apemat=$apemat;
			$this->fechanac=$fechanac;
			$this->email=$email;
			$this->telefono=$telefono;
			$this->contrasena=$contrasena;
		}
        
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		
		public function ingresar(){
			mysqli_query($this->conectarBD(),"INSERT INTO cliente(nombre_cli,ape_pat,ape_mat,fecha_nac,email,telefono,contrasena)
			    values('$this->nombre','$this->apepat','$this->apemat','$this->fechanac','$this->email','$this->telefono','$this->contrasena')")or
				die("<p>No tienes permiso para ingresar clientes</p>".mysqli_error($this->conectarBD()));
		}
		
		public function borrar($clave){
			$registro=mysqli_query($this->conectarUsBD(),"SELECT clave_cli,nombre_cli,ape_pat,ape_mat,fecha_nac,email,telefono FROM cliente WHERE clave_cli='$clave'") or       
			die("No tienes permiso para borrar los clientes".mysqli_error($this->conectarUsBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				mysqli_query($this->conectarUsBD(),"DELETE FROM cliente WHERE clave_cli='$clave'") or         
				die(mysqli_error($this->conectarUsBD()));
			} else{    
				echo '<p>No existe un cliente con dicho codigo</p>';   
			}
		}

		public function actualizar(){
		$registros=mysqli_query($this->conectarUsBD(),"UPDATE cliente SET nombre_cli='$_REQUEST[nombrenuevo]',ape_pat='$_REQUEST[apepatnuevo]',ape_mat='$_REQUEST[apematnuevo]',fecha_nac='$_REQUEST[fechanacnuevo]',email='$_REQUEST[emailnuevo]',telefono='$_REQUEST[telefono]',contrasena='$_REQUEST[contranuevo]' 
			WHERE clave_cli='$_REQUEST[clave]'") or 
			die("<p>No tienes permiso para actualizar los clientes</p>".mysqli_error($this->conectarUsBD())); 
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}