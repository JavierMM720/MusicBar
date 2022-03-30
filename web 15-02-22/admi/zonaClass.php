<?php
	class Zona{
		private $clave_zona;
        private $descripcion;
		
		public function inicializar($clave_zona,$descripcion){
			$this->clave_zona=$clave_zona;
            $this->descripcion=$descripcion;
		}
		
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		public function ingresar(){
			mysqli_query($this->conectarBD(),"INSERT INTO zona(clave_zona,descripcion)
			    values('$this->clave_zona','$this->descripcion')")or
				die("<p>Problemas al ingresar</p>".mysqli_error($this->conectarBD()));
		}
		
		public function listar(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM zona") or       
			die("<p>Problemas al listar</p>".mysqli_error($this->conectarBD()));
			
			echo '<table class="table table-hover table-sm mt-3"> 
                    <thead><tr><th>Clave</th><th>Descripcion</th></tr></thead>'; 
            
			while ($reg=mysqli_fetch_array($registros)){       
				echo'<tr><td>'.$reg['clave_zona'].'</td>       
                    <td>'.$reg['descripcion'].'</td>
                    <td>
				        <form action="zonaCtrl.php" method="post">
                        <button type="submit" class="btn btn-danger"><span class="icon-eye"></span></button>
                        <input type="hidden" name="opc" value="2">
				        <input type="hidden" name="clave" value='.$reg['clave_zona'].'>
				        </form>
				    </td>
				    <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-'.$reg['clave_zona'].'"><span class="icon-pencil"></span></button>
                        
                        <div class="modal fade" id="modal-'.$reg['clave_zona'].'" tabindex="-1" role="dialog" aria-labelledby="modal-'.$reg['clave_zona'].'" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">MODIFICAR</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form method="post" action="zonaCtrl.php" autocomplete="off">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="clave">Clave:</label>
                                                <input type="text" class="form-control" name="clave" id="clave" maxlength="20" value="'.$reg['clave_zona'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="descripcionnuevo">Descripción:</label>
                                                <input type="text" class="form-control" name="descripcionnuevo" id="descripcionnuevo" maxlength="50" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" value="'.$reg['descripcion'].'" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Modificar" class="btn btn-success">
                                            <input type="hidden" name="opc" value="4">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
				    </td>';
			 }      
			echo '</table>'; 
		}
		
		public function consultar($clave_zona){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM zona WHERE clave_zona='$clave_zona'") or 
			die("<p>Problemas al consultar</p>".mysqli_error($this->conectarBD()));    
			if ($reg=mysqli_fetch_array($registro))  {   
				echo "<p>Clave de la zona: ".$reg['clave_zona']."</p><br>";
				echo "<p>Descripcion: ".$reg['descripcion']."</p>";   
			}  else  {   
				echo 'No existe zona con dicha clave';  
			}
		}
		
		public function borrar($clave_zona){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM zona WHERE clave_zona='$clave_zona'") or       
			die("<p>Problemas al borrar</p>".mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				mysqli_query($this->conectarBD(),"DELETE FROM zona WHERE clave_zona='$clave_zona'") or         
				die(mysqli_error($this->conectarBD()));
			} else{    
				echo '<p>No existe un zona con dicho codigo</p>';   
			}
		}
		
		public function modificar($clave_zona){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM zona WHERE clave_zona='$clave_zona'") or   
			die("<p>Problemas en el modificar:</p>".mysqli_error()); 
			if ($reg=mysqli_fetch_array($registros)) { 
				?> <form class="pro" action="zonaActualizaCtrl.php" method="post"> 
					<p class="letraform">Clave:</p>
					<input type="text" name="clave_zona" value="<?php echo $clave_zona; ?>"><br>
					<p class="letraform">Descripcion:</p>
					<input type="text" name="descripcionnuevo" value="<?php echo $reg['descripcion']; ?>"> <br>
					<input type="submit" value="Modificar"> 
				   </form> 
				<?php 
			} else{   
				echo "<p>No existe zona con dicho codigo</p>"; 
			}
		}
		
		public function actualizar(){
		$registros=mysqli_query($this->conectarBD(),"UPDATE zona SET descripcion='$_REQUEST[descripcionnuevo]' WHERE clave_zona='$_REQUEST[clave_zona]'") or 
			die("<p>Problemas al actualizar</p>".mysqli_error($this->conectarBD()));      
				
			echo '<p>La zona fue modificada con exito</p>';
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}