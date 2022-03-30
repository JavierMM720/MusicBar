<?php
	class Cliente{
		private $nombre;
		private $apepat;
		private $apemat;
		private $fechanac;
		private $email;
		private $telefono;
		private $contrasena;
		
		public function inicializar($nombre,$apepat,$apemat,$fechanac,$email,$telefono,$contrasena){
			$this->nombre=$nombre;
			$this->apepat=$apepat;
			$this->apemat=$apemat;
			$this->fechanac=$fechanac;
			$this->email=$email;
			$this->telefono=$telefono;
			$this->contrasena=$contrasena;
		}
        
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
		
		public function ingresar(){
			mysqli_query($this->conectarBD(),"INSERT INTO cliente(nombre_cli,ape_pat,ape_mat,fecha_nac,email,telefono,contrasena)
			    values('$this->nombre','$this->apepat','$this->apemat','$this->fechanac','$this->email','$this->telefono','$this->contrasena')")or
				die("<script>
		      alert('No tienes permiso para ingresar clientes');
		       window.location ='cliente.php';
		   </script>".mysqli_error($this->conectarBD()));
		}
        
        public function listar(){
            $registros=mysqli_query($this->conectarBD(),"SELECT * FROM cliente") or       
			die("<script>
		      alert('No tienes permiso para listar clientes');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD()));
            
            echo '<form action="clienteCtrl.php">
                <div class="input-group">
                    <input type="text" id="clave" name="clave" placeholder="Clave del cliente" class="form-control">
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
                                <form method="post" action="clienteCtrl.php" autocomplete="off">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="apepat">Apellido Paterno:</label>
                                            <input type="text" class="form-control" placeholder="Apellido paterno" name="apepat" id="apepat" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="apemat">Apellido Materno:</label>
                                            <input type="text" class="form-control" placeholder="Apellido materno" name="apemat" id="apemat" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="fechanac">Fecha de Nacimiento:</label>
                                            <input type="text" class="form-control" id="fechanac" placeholder="dd/mm/yyyy" name="fechanac" onchange="javascript: document.form.registrocli.submit();" required>
                                                <script src="js2/jquery.js"></script>
                                                <script src="js2/jquery-ui.min.js"></script>
                                                <script src ="js2/datepicker-es.js"></script>
                                                <script>
                                                    $("#fechanac").datepicker({ minDate: "-70Y", maxDate: "-18Y" });
                                                    $("#fechanac").datepicker( $.datepicker.regional[ "es"] );
                                                </script>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="telefono">Telefono</label>
                                            <input type="tel" class="form-control" placeholder="Telefono celular" name="telefono" id="telefono" maxlength="10" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="email">Correo Electronico:</label>
                                            <input type="email" class="form-control" placeholder="ejemplo@correo.com" name="email" id="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-md-6">
                                            <label for="pass">Contraseña:</label>
                                            <input type="password" class="form-control" placeholder="Máximo 12 caracteres" name="pass" id="pass" maxlength="20" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="confirma">Confirmar contraseña:</label>
                                            <input type="password" class="form-control" placeholder="Confirma tu contraseña" name="confirma" id="confirma" maxlength="20" required>
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
                    <thead><tr><th>Clave</th><th>Nombre</th><th>Fecha Nacimiento</th><th>Correo Electronico</th><th>Telefono</th></tr></thead>';   
            
			while ($reg=mysqli_fetch_array($registros)){       
				echo'<tr><td>'.$reg['clave_cli'].'</td>       
                    <td>'.$reg['nombre_cli'].' '.$reg['ape_pat'].' '.$reg['ape_mat'].'</td><td>'.$reg['fecha_nac'].'</td>
                    <td>'.$reg['email'],'</td>
				    <td>'.$reg['telefono'].'</td>
                    <td>
				        <form action="clienteCtrl.php" method="post">
                        <button type="submit" class="btn btn-danger"><span class="icon-eye"></span></button>
                        <input type="hidden" name="opc" value="2">
				        <input type="hidden" name="clave" value='.$reg['clave_cli'].'>
				        </form>
				    </td>
				    <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-'.$reg['clave_cli'].'"><span class="icon-pencil"></span></button>
                        
                        <div class="modal fade" id="modal-'.$reg['clave_cli'].'" tabindex="-1" role="dialog" aria-labelledby="modal-'.$reg['clave_cli'].'" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">MODIFICAR</h5>
                                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form method="post" action="clienteCtrl.php" autocomplete="off">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="clave">Clave:</label>
                                                <input type="text" class="form-control" name="clave" id="clave" maxlength="20" readonly value="'.$reg['clave_cli'].'" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="nombrenuevo">Nombre:</label>
                                                <input type="text" class="form-control" name="nombrenuevo" id="nombrenuevo" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" value="'.$reg['nombre_cli'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="apepatnuevo">Apellido Paterno:</label>
                                                <input type="text" class="form-control" name="apepatnuevo" id="apepatnuevo" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" value="'.$reg['ape_pat'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="apematnuevo">Apellido Materno:</label>
                                                <input type="text" class="form-control" name="apematnuevo" id="apematnuevo" maxlength="20" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$" value="'.$reg['ape_mat'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="fechanacnuevo">Fecha de Nacimiento:</label>
                                                <input type="date" class="form-control" name="fechanacnuevo" id="fechanacnuevo" value="'.$reg['fecha_nac'].'" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="telefono">Telefono</label>
                                                <input type="tel" class="form-control" name="telefono" id="telefono" maxlength="10" value="'.$reg['telefono'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="emailnuevo">Correo Electronico:</label>
                                                <input type="email" class="form-control" name="emailnuevo" id="emailnuevo" value="'.$reg['email'].'" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="contranuevo">Contraseña:</label>
                                                <input type="password" class="form-control" name="contranuevo" id="contranuevo" maxlength="20" value="'.$reg['contrasena'].'" required>
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
				        <form action="clienteCtrl.php" method="post">
                        <button type="submit" class="btn btn-danger"><span class="icon-trash"></span></button>
				        <input type="hidden" name="opc" value="3">
				        <input type="hidden" name="clave" value='.$reg['clave_cli'].'>
				        </form>
				    </td>';
			 }      
			echo '</table>';   
        }
		
		public function consultar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM cliente WHERE clave_cli='$clave'") or 
			die("<script>
		      alert('No tienes permiso para consultar clientes');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD()));    
			if ($reg=mysqli_fetch_array($registro))  {   
				echo "<p>CLAVE: ".$reg['clave_cli']."</p><br>";
				echo "<p>Nombre: ".$reg['nombre_cli'].' '.$reg['ape_pat'].' '.$reg['ape_mat']."</p>";   
				echo "<p>Fecha de nacimiento: ".$reg['fecha_nac']."</p>";
				echo "<p>Email: ".$reg['email']."</p>";
				echo "<p>Telefono: ".$reg['telefono']."</p>";  
			}  else  {   
				echo '<p>No existe cliente con dicha clave</p>';  
			}
		}
		
		public function borrar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT clave_cli,nombre_cli,ape_pat,ape_mat,fecha_nac,email,telefono FROM cliente WHERE clave_cli='$clave'") or       
			die(mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				mysqli_query($this->conectarBD(),"DELETE FROM cliente WHERE clave_cli='$clave'") or         
				die("<script>
		      alert('No tienes permiso para borrar los clientes');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD()));
			} else{    
				echo '<p>No existe un cliente con dicho codigo</p>';   
			}
		}

		public function actualizar(){
		$registros=mysqli_query($this->conectarBD(),"UPDATE cliente SET nombre_cli='$_REQUEST[nombrenuevo]',ape_pat='$_REQUEST[apepatnuevo]',ape_mat='$_REQUEST[apematnuevo]',fecha_nac='$_REQUEST[fechanacnuevo]',email='$_REQUEST[emailnuevo]',telefono='$_REQUEST[telefono]',contrasena='$_REQUEST[contranuevo]' 
			WHERE clave_cli='$_REQUEST[clave]'") or 
			die("<script>
		      alert('No tienes permiso para actualizar los clientes');
		       window.location ='bandas.php';
		   </script>".mysqli_error($this->conectarBD())); 
		}
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}