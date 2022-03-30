<?php
	class Mesa{
        private $clave_mesa;
        private $no_mesa;
        private $clave_zona;
        private $fecha_mesa;
		
		public function inicializar($clave_mesa,$no_mesa,$clave_zona,$fecha_mesa){
            $this->clave_mesa=$clave_mesa;
            $this->no_mesa=$no_mesa;
            $this->clave_zona=$clave_zona;
            $this->fecha_mesa=$fecha_mesa;
        }
        
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		public function ingresar(){
			mysqli_query($this->conectarBD(),"INSERT INTO mesa(clave_mesa,no_mesa,clave_zona)
			    values('$this->clave_mesa','$this->no_mesa','$this->clave_zona','$this->fecha_mesa')")or
				die("<script>
		      alert('No tienes permiso para ingresar mesas');
		       window.location ='mesa.php';
		   </script>".mysqli_error($this->conectarBD()));
		}
        
        public function listar(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM mesa") or       
			die("<script>
		      alert('No tienes permiso para listar las mesas');
		       window.location ='mesa.php';
		   </script>".mysqli_error($this->conectarBD()));
			
			echo '<form action="mesaCtrl.php">
                <div class="input-group">
                    <input type="text" id="clave" name="clave" placeholder="Clave de la mesa" class="form-control">
                    <div class="input-grop-append">
                        <button type="submit" class="btn btn-dark">Buscar</button>
                        <input type="hidden" name="opc" value="2">
                    </div>
                </div>
            </form>
            
            <table class="table table-hover table-sm mt-4 table-responsive-sm"> 
                    <thead><tr><th>Clave</th><th>No_mesa</th><th>Descripción</th><th>Clave Zona</th></tr></thead>'; 
            
			while ($reg=mysqli_fetch_array($registros)){       
				echo'<tr><td>'.$reg['clave_mesa'].'</td>       
                    <td>'.$reg['no_mesa'].'</td>
                    <td>'.$reg['descripcion'].'</td>
                    <td>'.$reg['clave_zona'],'</td>
				    <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-'.$reg['clave_mesa'].'"><span class="icon-pencil"></span></button>
                        
                        <div class="modal fade" id="modal-'.$reg['clave_mesa'].'" tabindex="-1" role="dialog" aria-labelledby="modal-'.$reg['clave_mesa'].'" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">MODIFICAR</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form method="post" action="mesaCtrl.php" autocomplete="off">
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="clave">Clave:</label>
                                                <input type="text" class="form-control" name="clave" id="clave" maxlength="20" value="'.$reg['clave_mesa'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="nomesanuevo">No. mesa:</label>
                                                <input type="number" class="form-control" name="nomesanuevo" id="nomesanuevo" value="'.$reg['no_mesa'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="zonanuevo">Zona:</label>
                                                <input type="text" class="form-control" name="zonanuevo" id="zonanuevo" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" value="'.$reg['clave_zona'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="fechamesanuevo">Fecha Reservada:</label>
                                                <input type="text" class="form-control" name="fechamesanuevo" id="fechamesanuevo" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" value="'.$reg['descripcion'].'" required>
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
				        <form action="mesaCtrl.php" method="post">
                        <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
				        <input type="hidden" name="opc" value="3">
				        <input type="hidden" name="clave" value='.$reg['clave_mesa'].'>
				        </form>
				    </td>';
			}      
			echo '</table>';  
		}
        
		public function consultar($clave_mesa){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM mesa WHERE clave_mesa='$clave_mesa'") or 
			die("<p>No tienes permiso para consultar la mesa</p>".mysqli_error($this->conectarBD()));    
			if ($reg=mysqli_fetch_array($registro))  {   
				echo "<p>Clave: ".$reg['clave_mesa']."</p><br>";
				echo "<p>Numero de mesa: ".$reg['no_mesa']."</p>";
                echo "<p>Clave de la zona:".$reg['clave_zona']."</p>";
                echo "<p>Fecha asignada:".$reg['fecha_mesa']."</p>";
			}  else  {   
				echo '<p>No existe mesa con dicha clave</p>';  
			}
		}
		
		public function borrar($clave_mesa){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM mesa WHERE clave_mesa='$clave_mesa'") or       
			die("<p>No tienes permiso para borrar la mesa</p>".mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				mysqli_query($this->conectarBD(),"DELETE FROM mesa WHERE clave_mesa='$clave_mesa'") or         
				die(mysqli_error($this->conectarBD()));
			} else{    
				echo 'No existe mesa con dicho codigo';   
			}
		}
        
        public function estatusMesa($clave_mesa,$estatusnuevo){
            $registros=mysqli_query($this->conectarBD(),"SELECT estatus FROM mesa WHERE clave_mesa='$clave_mesa'") or   
			die("<p>Problemas en el modificar el estatus de la mesa</p>".mysqli_error());
            
            if ($reg=mysqli_fetch_array($registros)) { 
				$regis=mysqli_query($this->conectarBD(),"UPDATE mesa SET estatus='$estatusnuevo' WHERE clave_mesa='$clave_mesa'") or 
			    die("<p>Problemas al actualizar el estatus</p>".mysqli_error($this->conectarBD()));
                header("Location:reservacion.php");
			} else{
                echo "<p>No existe mesa con dicho código</p>";
            }
        }

		public function actualizar(){
		$registros=mysqli_query($this->conectarBD(),"UPDATE mesa SET no_mesa='$_REQUEST[numeronuevo]',clave_zona='$_REQUEST[zonanuevo]',fecha_mesa='$_REQUEST[fechaasignuevo]'
			WHERE clave_mesa='$_REQUEST[clave_mesa]'") or 
			die("<p>No tienes permiso para modificar la mesa</p>".mysqli_error($this->conectarBD()));      
				
			echo '<p>La mesa fue modificado con exito</p>';
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}