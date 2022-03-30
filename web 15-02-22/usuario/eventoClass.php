<?php
	class Evento{
        
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
        public function listarEvento(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM evento") or       
			die("Problemas al listar".mysqli_error($this->conectarBD()));
            $impresioneven = "";
            
			while ($reg=mysqli_fetch_array($registros)){ 
                $impresioneven.= '<div class="col-12 col-lg-4 mt-3">
                    <div class="card border-white bg-secondary">
                        <div class="card-header vin">
                            <h3 class="card-title text-white">'.$reg['nombre_evento'].'</h3>
                        </div>
                        <img src="../img/'.$reg['imagen'].'" class="card-img-top img-fluid" alt="">
                        <div class="card-body neg text-white">
                            <p class="card-text centrado">Fecha del evento:'.$reg['fecha_evento'].'</p>
                            <p class="card-text centrado">Hora del evento:'.$reg['hora_evento'].'</p>
                        </div>
                    </div>
                </div>';
			}  
            echo $impresioneven;
		}
        
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}
?>