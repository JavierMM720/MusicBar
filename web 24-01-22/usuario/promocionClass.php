<?php
	class Promocion{
		
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		
        public function listarPromociones(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM promocion") or       
			die("Problemas al listar".mysqli_error($this->conectarBD()));
            $impresionprom = "";
            
			while ($reg=mysqli_fetch_array($registros)){ 
                $impresionprom.='
                            <div class="col-12 col-lg-4 mt-3">
                                <div class="card border-danger text-white centrado">
                                    <div class="card-header vin">
                                       <h3>'.$reg['nombre_promo'].'</h3>
                                    </div>
                                    <img src="../img/'.$reg['imagen'].'" class="card-img-top img-fluid" alt="">
                                    <div class="card-footer neg" id="'.$reg['nombre_promo'].'">
                                        <button class="btn vin btn-lg btn-block text-white" data-toggle="collapse" data-target="#collapse'.$reg['nombre_promo'].'" aria-expanded="true" aria-controls="collapse'.$reg['nombre_promo'].'">Descripcion...</button>
                                    </div>
                                    <div id="collapse'.$reg['nombre_promo'].'" class="collapse" aria-labelledby="'.$reg['nombre_promo'].'">
                                        <div class="card-body neg text-white">
                                            <p class="centrado">Inicio: '.$reg['inicio_promo'].'</p>
                                            <p class="centrado">Vigencia: '.$reg['vigencia_promo'].'</p>
                                            <p class="centrado">Precio: $'.$reg['precio_promo'].'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                }   
            echo $impresionprom;
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}
?>