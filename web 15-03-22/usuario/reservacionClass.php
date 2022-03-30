<?php
	class Reservacion{
		private $fecha_reserv="";
		private $hora_reserv="";
        private $clave_cli="";
		
		public function inicializar($fecha_reserv,$hora_reserv,$clave_cli){
            $this->fecha_reserv=$fecha_reserv;
            $this->hora_reserv=$hora_reserv;
            $this->clave_cli=$clave_cli;
        }
		
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		
		public function ingresar(){
			mysqli_query($this->conectarBD(),"INSERT INTO reservacion(fecha_reserv,hora_reserv,status,clave_cli)
			    values('$this->fecha_reserv','$this->hora_reserv','pendiente','$this->clave_cli')")or
				die("<p>Problemas al ingresar</p>".mysqli_error($this->conectarBD()));
		}
        
        public function confirmar($clave,$codigo){
            if($clave===$codigo){
                $registros=mysqli_query($this->conectarBD(),"UPDATE reservacion SET status='asistio' WHERE '.$clave.'=clave_reserv"
                            or die("<script>alert('Código correcto');</script>"));  
                
                //AGREGAR LA RUTA DE LA LISTA AQUI ====>(header("Location: ")<======
            }else{
                echo "<script>alert('Codigo no valido');</script>";
            }
        }
		
		public function consultar($clave_reserv){
			$registro=mysqli_query($this->conectarBD(),"SELECT r.clave_reserv,r.fecha_reserv,r.hora_reserv,r.clave_cli, c.nombre_cli, c.ape_pat, c.ape_mat from reservacion r inner join cliente c on r.clave_cli=c.clave_cli   WHERE mr.clave_reserv='$clave_reserv'") or 
			die("<p>Problemas al consultar</p>".mysqli_error($this->conectarBD())); 
            
            $mesas=$this->conectarBD()->query("select m.descripcion, count(mr.clave_mesa) as num from mesa m inner join reservacion_mesa mr on m.clave_mesa=mr.clave_mesa where mr.clave_reserv=$clave_reserv");
            
			if ($reg=mysqli_fetch_array($registro))  {   
				echo "<p>Clave de la reservación: ".$reg['clave_reserv']."</p><br>";
				echo "<p>Fecha: ".$reg['fecha_reserv']."</p>";   
				echo "<p>Hora: ".$reg['hora_reserv']."</p>";
				echo "<p>Mesas:";
                $cont=1;
                while($me=mysqli_fetch_array($mesas)){
                    if($me['num']>1){
                        echo $cont."-.".$me['descripcion']." // ";
                    }else{
                        echo $me['descripcion'];
                    }
                    $cont++;
                }
                
                echo "</p>";
                echo "<p>Cliente: ".$reg['nombre_cli']." ".$reg['ape_pat']." ".$reg['ape_mat'];
			}  else  {   
				echo '<p>No existe reservacion con dicha clave<p>';  
			}
		}
		
		public function borrar($clave_reserv){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM reservacion WHERE clave_reserv='$clave_reserv'") or       
			die("Problemas al borrar".mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				mysqli_query($this->conectarBD(),"DELETE FROM reservacion WHERE clave_reserv='$clave_reserv'") or         
				die(mysqli_error($this->conectarBD()));
			} else{    
				echo '<p>No existe una reservacion con dicho codigo</p>';   
			}
		}
        
        public function cancelar($clave_reserv){
            $this->conectarBD->query("update reservacion set status='cancelada' where clave_reser=$clave_reserv");
        }
		
		public function actualizar(){
		$registros=mysqli_query($this->conectarBD(),"UPDATE reservacion SET fecha_reserv=$fecha=, hora_reserv='$hora_reserv='$_REQUEST[horanuevo]'
                                                    WHERE clave_reserv='$_REQUEST[clave_reserv]'") or 
			die("<p>Problemas al actualizar</p>".mysqli_error($this->conectarBD()));  
            echo '<p>La reservacion fue modificado con exito</p>';
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}