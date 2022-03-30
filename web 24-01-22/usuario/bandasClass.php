<?php
	class Bandas{
		
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		
        public function listarBandas(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM bandas") or       
			die("Problemas al listar".mysqli_error($this->conectarBD()));
            $impresionban = "";
            
			while ($reg=mysqli_fetch_array($registros)){
                $impresionban.='
                            <div class="col-12 col-lg-4 mt-3">
                                <div class="card border-white text-white bg-secondary">
                                    <div class="card-header vin">
                                       <h3>'.$reg['nombre_banda'].'</h3>
                                    </div>
                                    <img src="../img/'.$reg['imagenban'].'" class="card-img-top img-fluid" alt="">
                                    <div class="card-footer neg" id="'.str_replace(' ','', $reg['nombre_banda']).'">
                                        <button class="btn vin btn-lg btn-block text-white" data-toggle="collapse" data-target="#collapse'.str_replace(' ','', $reg['nombre_banda']).'" aria-expanded="true" aria-controls="collapse'.str_replace(' ','', $reg['nombre_banda']).'">Descripcion...</button>
                                    </div>
                                    <div id="collapse'.$reg['nombre_banda'].'" class="collapse" aria-labelledby="'.str_replace(' ','', $reg['nombre_banda']).'">
                                        <div class="card-body neg text-white">
                                            <h5>Hora de la presentacion:</h5>
                                            <p class="centrado">'.$reg['horaban_inicio'].'</p>
                                            <h5>Hora de finalizacion:</h5>
                                            <p class="centrado">'.$reg['horaban_fin'].'</p>
                                            <h5>Dias de presentación:</h5>
                                            <p class="centrado">'.$reg['dias'].'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                }   
            echo $impresionban;
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}