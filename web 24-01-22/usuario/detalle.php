<?php
	class Detalle{
	
        private $clave_reserv;
		private $clave_mesa;
    
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}

        public function obtenerClaveR(){
            $clave=$this->conectarBD()->query("select max(clave_reserv) as id
                                               from reservacion");
            if($c=mysqli_fetch_array($clave)){
            return $c['id'];
            }

        }

        public function inicializar($clave_reserv,$clave_mesa){
            $this->claver=$clave_reserv;
            $this->clavem=$clave_mesa;
        }

        public function agregar(){
            $this->conectarBD()->query("INSERT INTO reservacion_mesa (clave_reserv,clave_mesa) values('$this->claver','$this->clavem')");    
        }

        public function liberarMesas($clave_reserv){
            $this->conectarBD()->query("delete from reservacion_mesa where clave_reserv = $clave_reserv");
        }
        
        public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
    }
?>