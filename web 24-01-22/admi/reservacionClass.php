<?php
	class Reservacion{
		private $fecha_reserv="";
		private $hora_reserv="";
        private $mesas="";
        private $clave_cli="";
		
		public function inicializar($fecha_reserv,$hora_reserv,$mesas,$clave_cli){
            $this->fecha_reserv=$fecha_reserv;
            $this->hora_reserv=$hora_reserv;
            $this->mesas=$mesas;
            $this->clave_cli=$clave_cli;
        }
		
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		public function ingresar(){
			mysqli_query($this->conectarBD(),"INSERT INTO reservacion(fecha_reserv,hora_reserv,mesas,clave_cli)
			    values('$this->fecha_reserv','$this->hora_reserv','$this->mesas','$this->clave_cli')")or
				die("<script>
		      alert('No tienes permiso para ingresar reservaciones');
		       window.location ='reservacion.php';
		   </script>".mysqli_error($this->conectarBD()));
            include "../codigoqr.php";
            $codigo=new codigoQr();
		    $codigo->generarCodigo($this->fecha_reserv,$this->hora_reserv);
		}
		public function listar(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM reservacion") or       
			die("<p>Problemas al listar</p>".mysqli_error($this->conectarBD()));
			
			echo '<form action="reservacionCtrl.php">
                <div class="input-group">
                    <input type="text" id="clave" name="clave" placeholder="Clave de la reservacion" class="form-control">
                    <div class="input-grop-append">
                        <button type="submit" class="btn btn-dark">Buscar</button>
                        <input type="hidden" name="opc" value="2">
                    </div>
                </div>
            </form>
            
            <button class="btn btn-info disabled" data-toggle="modal" data-target="#modal-agregareserv">Agregar</button>
                    
                    <table class="table table-hover table-sm mt-3"> 
                    <thead><tr><th>Clave de reservación</th><th>Fecha</th><th>Hora</th><th>Mesas</th><th>Clave del cliente</th></tr></thead>'; 
            
			while ($reg=mysqli_fetch_array($registros)){
			    $clave=$reg['clave_reserv'];
				echo '<tr><td>'.$reg['clave_reserv'].'</td>
                <td>'.$reg['fecha_reserv'].'</td>
                <td>'.$reg['hora_reserv'].'</td>';
                $mesas=$this->conectarBD()->query("select m.descripcion, count(mr.clave_mesa) as num from mesa m inner join reservacion_mesa mr on m.clave_mesa=mr.clave_mesa where mr.clave_reserv=$clave");    
                echo '<td>';
                    $cont=1;
                while($me=mysqli_fetch_array($mesas)){
                    if($me['num']>1){
                        echo $cont."-.".$me['descripcion']." // ";
                    }else{
                        echo $me['descripcion'];
                    }
                    $cont++;
                }
                echo'</td>
                <td>'.$reg['clave_cli'].'</td>
                
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-'.$reg['clave_reserv'].'"><span class="icon-pencil"></span></button>

                    <div class="modal fade" id="modal-'.$reg['clave_reserv'].'" tabindex="-1" role="dialog" aria-labelledby="modal-'.$reg['clave_reserv'].'" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">MODIFICAR</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <form method="post" action="reservacionCtrl.php" autocomplete="off">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="clave">Clave:</label>
                                                <input type="number" class="form-control" name="clave" id="clave" maxlength="20" value="'.$reg['clave_reserv'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="fechanuevo">Fecha de la reservacion:</label>
                                                <input type="date" class="form-control" name="fechanuevo" id="fechanuevo" maxlength="20" value="'.$reg['fecha_reserv'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="horanuevo">Hora:</label>
                                                <input type="time" class="form-control" name="horanuevo" id="horanuevo" value="'.$reg['hora_reserv'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="clave">Clave de cliente:</label>
                                                <input type="number" class="form-control" name="clave_cli" id="clave_cli" maxlength="20" value="'.$reg['clave_cli'].'" required>
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
                        <form action="reservacionCtrl.php" method="post">
                            <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
                            <input type="hidden" name="opc" value="3">
                            <input type="hidden" name="clave" value='.$reg['clave_reserv'].'>
                            </form>
                        </td>';
			 }      
			echo '</table>';   
		}
		
		
		public function consultar($clave_reserv){
			$registro=mysqli_query($this->conectarBD(),"SELECT r.clave_reserv,r.fecha_reserv,r.hora_reserv,r.mesas,c.clave_cli FROM reservacion r inner join cliente c on c.clave_cli = r.clave_cli WHERE clave_reserv='$clave_reserv'") or 
			die("<script>
		      alert('No tienes permiso para consultar las reservaciones');
		       window.location ='reservacion.php';
		   </script>".mysqli_error($this->conectarBD()));    
			if ($reg=mysqli_fetch_array($registro))  {   
				echo "<p>Clave de la reservación: ".$reg['clave_reserv']."</p><br>";
				echo "<p>Fecha: ".$reg['fecha_reserv']."</p>";   
				echo "<p>Hora: ".$reg['hora_reserv']."</p>";
				echo "<p>Mesas: ".$reg['mesas']."</p>";
                echo "<p>Cliente: ".$reg['clave_cli'];
			}  else  {   
				echo '<p>No existe reservacion con dicha clave<p>';  
			}
		}
		
		public function borrar($clave_reserv){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM reservacion WHERE clave_reserv='$clave_reserv'") or       
			die(mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				mysqli_query($this->conectarBD(),"DELETE FROM reservacion WHERE clave_reserv='$clave_reserv'") or         
				die("<script>
		      alert('No tienes permiso para borrar las reservaciones');
		       window.location ='reservacion.php';
		   </script>".mysqli_error($this->conectarBD()));
			} else{    
				echo '<p>No existe una reservacion con dicho codigo</p>';   
			}
		}
		
		public function actualizar(){
		$registros=mysqli_query($this->conectarBD(),"UPDATE reservacion SET fecha_reserv='$_REQUEST[fechanuevo]',hora_reserv='$_REQUEST[horanuevo]'
        
			WHERE clave_reserv='$_REQUEST[clave_reserv]'") or 
			die("<script>
		      alert('No tienes permiso para modificar las reservaciones');
		       window.location ='reservacion.php';
		   </script>".mysqli_error($this->conectarBD()));      
				
			echo '<p>La reservacion fue modificado con exito</p>';
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}