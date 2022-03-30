<?php
	class Promocion{
		private $nombre;
		private $precio;
		private $inicio;
		private $vigencia;
		private $imagen;
		
		public function inicializar($imagen,$nombre,$precio,$inicio,$vigencia){
            $this->imagen=$imagen;
            $this->nombre=$nombre;
            $this->precio=$precio;
            $this->inicio=$inicio;
            $this->vigencia=$vigencia;
		}
        
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		public function ingresar(){
			mysqli_query($this->conectarBD(),"INSERT INTO promocion(imagen,nombre_promo,precio_promo,inicio_promo,vigencia_promo)
			    values('$this->imagen','$this->nombre','$this->precio','$this->inicio','$this->vigencia')")or
				die("<script>
		      alert('No tienes permiso para ingresar promociones');
		       window.location ='promocion.php';
		   </script>".mysqli_error($this->conectarBD()));
		}
		
		public function listar(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM promocion") or       
			die("<script>
		      alert('No tienes permiso para listar promociones');
		       window.location ='promocion.php';
		   </script>".mysqli_error($this->conectarBD()));
			
			echo '<form action="mesaCtrl.php">
                <div class="input-group">
                    <input type="text" id="clave" name="clave" placeholder="Clave de la promocion" class="form-control">
                    <div class="input-grop-append">
                        <button type="submit" class="btn btn-dark">Buscar</button>
                        <input type="hidden" name="opc" value="2">
                    </div>
                </div>
            </form>
            
            <button class="btn btn-info mt-4" data-toggle="modal" data-target="#modal-agregapromo">Agregar</button>
            
            <div class="modal fade" id="modal-agregapromo" tabindex="-1" role="dialog" aria-labelledby="modal-agregapromo" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">REGISTRATAR PROMOCION</h5>
                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <form method="post" action="promocionCtrl.php" autocomplete="off">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="nombre">Nombre de la promocion :</label>
                                            <input type="text" class="form-control" placeholder="Nombre de la promocion" name="nombre" id="nombre" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="imagen">Imagen:</label>
                                            <input type="file" class="form-control" name="imagen" id="imagen" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="precio">Precio:</label>
                                            <input type="number" class="form-control" placeholder="Precio para la promocion" name="precio" id="precio" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="iniciopromo">Inicio de la promoción:</label>
                                            <input type="date" class="form-control" placeholder="Inicio de la promocion" name="iniciopromo" id="iniciopromo" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="vigen">Vigencia de la promoción:</label>
                                            <input type="date" class="form-control" placeholder="Vigencia de la promocion" name="vigen" id="vigen" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Agregar" class="btn btn-success">
                                        <input type="hidden" name="opc" value="1">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
                    
                    <table class="table table-hover table-sm mt-3 table-responsive-sm"> 
                    <thead><tr><th>Clave</th><th>Nombre</th><th>Precio</th><th>Inicio de la Promoción</th><th>Vigencia de la promoción</th><th>Imagen</th></tr></thead>'; 
            
			while ($reg=mysqli_fetch_array($registros)){       
				echo '<tr><td>'.$reg['clave_promo'].'</td>
                <td>'.$reg['nombre_promo'].'</td>
                <td>'.$reg['precio_promo'].'</td>
                <td>'.$reg['inicio_promo'].'</td>
                <td>'.$reg['vigencia_promo'].'</td>
                <td><button class="btn btn-dark" data-toggle="modal" data-target="#modalimprom-'.$reg['clave_promo'].'">Imagen</button></td>
                
                <div class="modal fade" id="modalimprom-'.$reg['clave_promo'].'">
                    <div class="modal-dialog d-flex justify-content-center align-items-center">
                        <div class="modal-content">
                            <img src="../img/'.$reg['imagen'].'" alt="" id="imagen-modal">
                        </div>
                    </div>
                </div>
                
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-'.$reg['clave_promo'].'"><span class="icon-pencil"></span></button>

                    <div class="modal fade" id="modal-'.$reg['clave_promo'].'" tabindex="-1" role="dialog" aria-labelledby="modal-'.$reg['clave_promo'].'" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">MODIFICAR</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <form method="post" action="promocionCtrl.php" autocomplete="off">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="clave">Clave:</label>
                                                <input type="number" class="form-control" name="clave" id="clave" value="'.$reg['clave_promo'].'" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="nombrenuevo">Nombre de la promoción :</label>
                                                <input type="text" class="form-control" name="nombrenuevo" id="nombrenuevo" value="'.$reg['nombre_promo'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="imagennuevo">Imagen:</label>
                                                <input type="file" class="form-control" name="imagennuevo" id="imagennuevo" value="'.$reg['imagen'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="precionuevo">Precio:</label>
                                                <input type="number" class="form-control" name="precionuevo" id="precionuevo" value="'.$reg['precio_promo'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="inicionuevo">Inicio de la Promoción:</label>
                                                <input type="date" class="form-control" name="inicionuevo" id="inicionuevo" value="'.$reg['inicio_promo'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="vigencianuevo">Vigencia de la Promoción</label>
                                                <input type="date" class="form-control" name="vigencianuevo" id="vigencianuevo" value="'.$reg['vigencia_promo'].'" required>
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
                    </td>
                    <td>
                        <form action="promocionCtrl.php" method="post">
                            <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
                            <input type="hidden" name="opc" value="3">
                            <input type="hidden" name="clave" value='.$reg['clave_promo'].'>
                            </form>
                        </td>';
			 }      
			echo '</table>';   
		}
		
		public function consultar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM promocion WHERE clave_promo='$clave'") or 
			die("<script>
		      alert('No tienes permiso para consultar las promociones');
		       window.location ='promocion.php';
		   </script>".mysqli_error($this->conectarBD()));    
			if ($reg=mysqli_fetch_array($registro))  {   
				echo "<p>Clave de la promocion: ".$reg['clave_promo']."</p><br>";
				echo "<p>Nombre: ".$reg['nombre_promo']."</p>";   
				echo "<p>Precio: ".$reg['precio_promo']."</p>";
				echo "<p>Inicio: ".$reg['inicio_promo']."</p>";
				echo "<p>Vigencia ".$reg['vigencia_promo']."</p>";			
			}  else  {   
				echo 'No existe cliente con dicha clave';  
			}
		}
		
		public function borrar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM promocion WHERE clave_promo='$clave'") or       
			die(mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				mysqli_query($this->conectarBD(),"DELETE FROM promocion WHERE clave_promo='$clave'") or         
				die("<script>
		      alert('No tienes permiso para borrar las mesas');
		       window.location ='promocion.php';
		   </script>".mysqli_error($this->conectarBD()));
			} else{    
				echo '<p>No existe una promocion con dicho codigo</p>';   
			}
		}
		
		public function actualizar(){
		$registros=mysqli_query($this->conectarBD(),"UPDATE promocion SET nombre_promo='$_REQUEST[nombrenuevo]',precio_promo='$_REQUEST[precionuevo]',inicio_promo='$_REQUEST[inicionuevo]',vigencia_promo='$_REQUEST[vigencianuevo]',imagen_promo='$_REQUEST[imagennuevo]'
			WHERE clave_promo='$_REQUEST[clave]'") or 
			die("<script>
		      alert('No tienes permiso para modificar las promociones');
		       window.location ='promocion.php';
		   </script>".mysqli_error($this->conectarBD()));      
				
			echo '<p>La promocion fue modificada con exito</p>';
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}
?>