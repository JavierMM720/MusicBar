<?php
	class Bandas{
		private $nombre_banda;
		private $horainicio;
		private $horafin;
		private $dias;
		private $imagenban;
		
		public function inicializar($nombre_banda,$horainicio,$horafin,$dias,$imagenban){
			$this->nombre_banda=$nombre_banda;
			$this->horainicio=$horainicio;
			$this->horafin=$horafin;
			$this->dias=$dias;
			$this->imagenban=$imagenban;
		}
		
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		public function ingresar(){
			mysqli_query($this->conectarBD(),"INSERT INTO bandas(nombre_banda,horaban_inicio,horaban_fin,dias,imagenban)
			    values('$this->nombre_banda','$this->horainicio','$this->horafin','$this->dias','$this->imagenban')")or
				die("<script>
		      alert('No tienes permiso para ingresar bandas');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD()));
		}
		
		public function listar(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM bandas") or       
			die("<script>
		      alert('No tienes permiso para listar las bandas');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD()));
			
			echo '<form action="bandasCtrl.php">
                <div class="input-group">
                    <input type="text" id="clave" name="clave" placeholder="Clave de la banda" class="form-control">
                    <div class="input-grop-append">
                        <button type="submit" class="btn btn-dark">Buscar</button>
                        <input type="hidden" name="opc" value="2">
                    </div>
                </div>
            </form>
            
            <button class="btn btn-info mt-3" data-toggle="modal" data-target="#modal-agregabanda">Agregar</button>
            
            <div class="modal fade" id="modal-agregabanda" tabindex="-1" role="dialog" aria-labelledby="modal-agregabanda" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">REGISTRATAR BANDA</h5>
                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <form method="post" action="bandasCtrl.php" autocomplete="off">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="nombre">Nombre de la banda:</label>
                                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="horainicio">Hora Inicio:</label>
                                            <input type="time" class="form-control" placeholder="Hora de comienzo" name="horainicio" id="horainicio" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="horafin">Hora Fin:</label>
                                            <input type="time" class="form-control" placeholder="Hora en que finaliza" name="horafin" id="horafin" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="dias">Dias Presentacion:</label>
                                            <input type="text" class="form-control" placeholder="Dias en que se presenta" name="dias" id="dias" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="imagenban">Imagen</label>
                                            <input type="file" class="form-control" name="imagenban" id="imagenban" required>
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
                    <thead><tr><th>Clave</th><th>Nombre</th><th>Hora Inicio</th><th>Hora Fin</th><th>Dias</th><th>Imagen</th></tr></thead>'; 
            
			while ($reg=mysqli_fetch_array($registros)){       
				echo '<tr><td>'.$reg['clave_banda'].'</td>
                <td>'.$reg['nombre_banda'].'</td>
                <td>'.$reg['horaban_inicio'].'</td>
                <td>'.$reg['horaban_fin'].'</td>
                <td>'.$reg['dias'].'</td>
                <td><button class="btn btn-dark" data-toggle="modal" data-target="#modalim-'.$reg['clave_banda'].'">Imagen</button></td>
                
                <div class="modal fade" id="modalim-'.$reg['clave_banda'].'">
                    <div class="modal-dialog d-flex justify-content-center align-items-center">
                        <div class="modal-content">
                            <img src="../img/'.$reg['imagenban'].'" alt="" id="imagen-modal">
                        </div>
                    </div>
                </div>
                
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-'.$reg['clave_banda'].'"><span class="icon-pencil"></span></button>

                    <div class="modal fade" id="modal-'.$reg['clave_banda'].'" tabindex="-1" role="dialog" aria-labelledby="modal-'.$reg['clave_banda'].'" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">MODIFICAR</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <form method="post" action="bandasCtrl.php" autocomplete="off">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="clave">Clave:</label>
                                                <input type="number" class="form-control" name="clave" id="clave" maxlength="20" value="'.$reg['clave_banda'].'" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="nombrenuevo">Nombre:</label>
                                                <input type="text" class="form-control" name="nombrenuevo" id="nombrenuevo" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" value="'.$reg['nombre_banda'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="inicionuevo">Hora Inicio:</label>
                                                <input type="time" class="form-control" name="inicionuevo" id="inicionuevo" value="'.$reg['horaban_inicio'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="finnuevo">Hora Fin:</label>
                                                <input type="time" class="form-control" name="finnuevo" id="finnuevo" value="'.$reg['horaban_fin'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="diasnuevo">Dias Presentación:</label>
                                                <input type="text" class="form-control" name="diasnuevo" id="diasnuevo" value="'.$reg['dias'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="imagennuevo">Imagen</label>
                                                <input type="file" class="form-control" name="imagennuevo" id="imagennuevo" value="'.$reg['imagenban'].'" required>
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
                        <form action="bandasCtrl.php" method="post">
                            <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
                            <input type="hidden" name="opc" value="3">
                            <input type="hidden" name="clave" value='.$reg['clave_banda'].'>
                            </form>
                        </td>';
            }
            echo '</table>';
		}
        
        public function consultar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM bandas WHERE clave_banda='$clave'") or 
			die("<script>
		      alert('No tienes permiso para consultar las bandas');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD()));    
			if ($reg=mysqli_fetch_array($registro))  {   
                echo '<!-- <h3 class="centrado">BANDAS</h3> -->
                
                <h5 class="centrado mt-4">Clave: '.$reg['clave_banda'].'</h5>
                <p class="centrado">Nombre: '.$reg['nombre_banda'].'</p>
                <p class="centrado">Hora de inicio: '.$reg['horaban_inicio'].'</p>
                <p class="centrado">Hora en que finaliza: '.$reg['horaban_fin'].'</p>
                <p class="centrado">Dias en que asiste: '.$reg['dias'].'</p>
                <p class="centrado">Imagen: </p><div class="row"><div class="col text-center"><img class="img-thumbnail img-fluid" src="../img/'.$reg['imagenban'].'" width="500"></div></div>';
			}  else  {   
				echo '<h3>BANDAS</h3><p>No existe cliente con dicha clave</p>';  
			}
		}
		
		public function borrar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM bandas WHERE clave_banda='$clave'") or       
			die(mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				mysqli_query($this->conectarBD(),"DELETE FROM bandas WHERE clave_banda='$clave'") or         
				die("<script>
		      alert('No tienes permiso para borrar las bandas');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD()));
			} else{    
				echo '<p>No existe un banda con dicho codigo</p>';   
			}
		}
		
		public function actualizar(){
		$registros=mysqli_query($this->conectarBD(),"UPDATE bandas SET nombre_banda='$_REQUEST[nombrenuevo]',horaban_inicio='$_REQUEST[inicionuevo]',horaban_fin='$_REQUEST[finnuevo]',dias='$_REQUEST[diasnuevo]',imagenban='$_REQUEST[imagennuevo]'
			WHERE clave_banda='$_REQUEST[clave]'") or 
			die(" <script>
		      alert('No tienes permiso para modificar las bandas');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD()));
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}