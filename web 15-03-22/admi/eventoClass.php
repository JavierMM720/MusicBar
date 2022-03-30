<?php
	class Evento{
		private $fecha;
		private $hora;
		private $nombre;
		private $imagen;
		
		public function inicializar($fecha,$hora,$nombre,$imagen){
			$this->fecha=$fecha;
			$this->hora=$hora;
			$this->nombre=$nombre;
			$this->imagen=$imagen;
		}
        
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		public function ingresar(){
            mysqli_query($this->conectarBD(),"INSERT INTO evento(fecha_evento,hora_evento,nombre_evento,imagen) values('$this->fecha','$this->hora','$this->nombre','$this->imagen')")or
				die("<script>
		      alert('No tienes permiso para ingresar eventos');
		       window.location ='evento.php';
		   </script>".mysqli_error($this->conectarBD()));
		}
		
		public function listar(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM evento") or       
			die("<script>
		      alert('No tienes permiso para listar eventos');
		       window.location ='evento.php';
		   </script>".mysqli_error($this->conectarBD()));
			
			echo   '<form action="eventoCtrl.php">
                <div class="input-group">
                    <input type="text" id="clave" name="clave" placeholder="Clave del evento" class="form-control">
                    <div class="input-grop-append">
                        <button type="submit" class="btn btn-dark">Buscar</button>
                        <input type="hidden" name="opc" value="2">
                    </div>
                </div>
            </form>
            
            <button class="btn btn-info mt-3" data-toggle="modal" data-target="#modal-agregaevento">Agregar</button>
            
            <div class="modal fade" id="modal-agregaevento" tabindex="-1" role="dialog" aria-labelledby="modal-agregaevento" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">REGISTRATAR EVENTO</h5>
                                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                                <form method="post" action="eventoCtrl.php" autocomplete="off">
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="nombre">Nombre del evento:</label>
                                            <input type="text" class="form-control" placeholder="Nombre del evento" name="nombre" id="nombre" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="imagenevento">Imagen</label>
                                            <input type="file" class="form-control" name="imagenevento" id="imagenevento" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="fechaevento">Fecha del Evento:</label>
                                            <input type="date" class="form-control" placeholder="Fecha del evento" name="fechaevento" id="fechaevento" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="horaevento">Hora del Evento:</label>
                                            <input type="time" class="form-control" placeholder="Hora del evento" name="horaevento" id="horaevento" required>
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
                    <thead><tr><th>Clave</th><th>Nombre</th><th>Fecha del Evento</th><th>Hora</th><th>Imagen</th></tr></thead>'; 
            
			while ($reg=mysqli_fetch_array($registros)){       
				echo '<tr><td>'.$reg['clave_evento'].'</td>
                <td>'.$reg['nombre_evento'].'</td>
                <td>'.$reg['fecha_evento'].'</td>
                <td>'.$reg['hora_evento'].'</td>
                <td><button class="btn btn-dark" data-toggle="modal" data-target="#modalimeve-'.$reg['clave_evento'].'">Imagen</button></td>
                
                <div class="modal fade" id="modalimeve-'.$reg['clave_evento'].'">
                    <div class="modal-dialog d-flex justify-content-center align-items-center">
                        <div class="modal-content">
                            <img src="../img/'.$reg['imagen'].'" alt="" id="imagen-modal">
                        </div>
                    </div>
                </div>
                
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-'.$reg['clave_evento'].'"><span class="icon-pencil"></span></button>

                    <div class="modal fade" id="modal-'.$reg['clave_evento'].'" tabindex="-1" role="dialog" aria-labelledby="modal-'.$reg['clave_evento'].'" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">MODIFICAR</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <form method="post" action="eventoCtrl.php" autocomplete="off">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="clave">Clave:</label>
                                                <input type="number" class="form-control" name="clave" id="clave" maxlength="20" value="'.$reg['clave_evento'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="nombrenuevo">Nombre:</label>
                                                <input type="text" class="form-control" name="nombrenuevo" id="nombrenuevo" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" value="'.$reg['nombre_evento'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="imagennuevo">Imagen:</label>
                                                <input type="file" class="form-control" name="imagennuevo" id="imagennuevo" value="'.$reg['imagen'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="fechanuevo">Fecha del Evento:</label>
                                                <input type="date" class="form-control" name="fechanuevo" id="fechanuevo" value="'.$reg['fecha_evento'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="horanuevo">Hora del Evento</label>
                                                <input type="time" class="form-control" name="horanuevo" id="horanuevo" value="'.$reg['hora_evento'].'" required>
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
                        <form action="eventoCtrl.php" method="post">
                            <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
                            <input type="hidden" name="opc" value="3">
                            <input type="hidden" name="clave" value='.$reg['clave_evento'].'>
                            </form>
                        </td>';
			 }      
			echo '</table>';   
		}
        
        public function consultar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM evento WHERE clave_evento='$clave'") or 
			die("<script>
		      alert('No tienes permiso para consultar eventos');
		       window.location ='evento.php';
		   </script>".mysqli_error($this->conectarBD()));    
			if ($reg=mysqli_fetch_array($registro))  {   
				echo "<p>Clave del evento: ".$reg['clave_evento']."</p><br>";
				echo "<p>Fecha: ".$reg['fecha_evento']."</p>";   
				echo "<p>Nombre: ".$reg['nombre_evento']."</p>";
				
                echo  '<p>Foto del evento</p>';    
                 echo '<img class="img-thumbnail" src=../img/'.$reg['imagen'].' height="300" width="300">';
                
			}  else  {   
				echo '<p>No existe cliente con dicha clave</p>';  
			}
		}
		
		public function borrar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM evento WHERE clave_evento='$clave'") or       
			die("<script>
		      alert('No tienes permiso para borrar los eventos');
		       window.location ='evento.php';
		   </script>".mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				mysqli_query($this->conectarBD(),"DELETE FROM evento WHERE clave_evento='$clave'") or         
				die(mysqli_error($this->conectarBD()));
			} else{    
				echo '<p>No existe un cliente con dicho codigo</p>';   
			}
		}
		
		public function actualizar(){
		$registros=mysqli_query($this->conectarBD(),"UPDATE evento SET fecha_evento='$_REQUEST[fechanuevo]',hora_evento='$_REQUEST[horanuevo]',nombre_evento='$_REQUEST[nombrenuevo]',imagen='$_REQUEST[imagennuevo]'
			WHERE clave_evento='$_REQUEST[clave]'") or 
			die("<script>
		      alert('No tienes permiso para modificar los eventos');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD()));      
				
			echo '<p class="letraform">El evento fue modificado con exito</p>';
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}
?>