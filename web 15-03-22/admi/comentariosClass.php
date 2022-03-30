<?php
	class Comentarios{
		
		public function inicializar($estrellas,$titulo,$descripcion,$clave){
			$this->estrellas=$estrellas;
			$this->titulo=$titulo;
			$this->descripcion=$descripcion;
            $this->clave=$clave;
		}
		
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
        
		
		public function get_numeroRes(){
			$result=$this->conectarBD()->query("SELECT count(clave_comen) as num FROM comentarios where status=1");
                    $Nres;
					while($reg=mysqli_fetch_array($result)){
                     $Nres=$reg['num'];
                    }
            return $Nres;
		}
		
		public function ingresar(){
                $insertRating = "INSERT INTO comentarios (estrellas,fecha_comen, titulo, descripcion, status, clave_cli) 
                VALUES ('$this->estrellas', '".date("Y-m-d")."', '$this->titulo', '$this->descripcion' ,'0','$this->clave' )";
                mysqli_query($this->conectarBD(), $insertRating) or die("database error: ". mysqli_error($this->conectarBD()));
		}
		
		public function listar(){
			$registros=mysqli_query($this->conectarBD(),"SELECT * FROM comentarios") or       
			die("Problemas al listar".mysqli_error($this->conectarBD()));
			
			echo '<table class="table table-hover table-sm mt-3 table-responsive-sm"> 
                    <thead><tr><th>Clave</th><th>Fecha</th><th>Titulo</th><th>Descripcion</th></tr></thead>' ; 
			while ($reg=mysqli_fetch_array($registros)){    
                
				echo '<tr><td>'.$reg['clave_comen'].'</td>';       
				echo '<td>'.$reg['fecha_comen'].'</td>';
                echo '<td>'.$reg['titulo'].'</td>';
				echo '<td>'.$reg['descripcion'].'</td>';
                if($reg['status']=="0"){
                echo '<td>
				        <form action="comentariosCtrl.php" method="post">
				        <button type="submit" class="btn btn-primary">Aprobar</button>
                        <input type="hidden" name="opc" value="4">
				        <input type="hidden" name="clave" value='.$reg['clave_comen'].'>
				        </form>
				    </td>';
                }else{
                    echo '<td>
				        <form action="comentariosCtrl.php" method="post">
				        <button type="submit" class="btn btn-danger">Bloquear</button>
                        <input type="hidden" name="opc" value="5">
				        <input type="hidden" name="clave" value='.$reg['clave_comen'].'>
				        </form>
				    </td>';
                }
				echo    '<td>
				        <form action="comentariosCtrl.php" method="post">
				        <button type="submit" class="btn btn-success"><span class="icon-trash"></span></button>
				        <input type="hidden" name="opc" value="3">
				        <input type="hidden" name="clave" value='.$reg['clave_comen'].'>
				        </form>
				    </td>
				    <td>
				        <form action="comentariosCtrl.php" method="post">
                        <button type="submit" class="btn btn-success"><span class="icon-eye"></span></button>
				        <input type="hidden" name="opc" value="2">
				        <input type="hidden" name="clave" value='.$reg['clave_comen'].'>
				        </form>
				    </td>';
			 }      
			echo '</table>';   
			
			mysqli_close($this->conectarBD());    
		}
        
        public function Ver($numero){
                    $result=$this->conectarBD()->query("SELECT c.nombre_cli,c.ape_pat, c.ape_mat,a.estrellas,a.titulo,a.descripcion,a.fecha_comen 
                    FROM comentarios a inner join cliente c on c.clave_cli = a.clave_cli 
                    Where a.status=1 order by a.fecha_comen desc  LIMIT 0,$numero");
            
					echo "<table width='600' border='0' cellspacing='2' cellpadding='4' class='mt-4'>";
					while($reg=mysqli_fetch_array($result)){ 
						$titulo=nl2br($reg['titulo']);
						$estrellas=nl2br($reg['estrellas']);
						$comentarios=nl2br($reg['descripcion']);
						
						echo '<tr bgcolor="black" class="text-white"><td><strong>'.$reg['nombre_cli'].' '.$reg['ape_pat'].' '.$reg['ape_mat'].'</strong></td>
								<td align=right>'.date("d-m-Y",strtotime($reg['fecha_comen'])).'</td></tr>';
						echo '<tr ><td colspan=2><h5 class="text-white">'.$titulo.'</h5></td><td colspan=2><h3>
							<form>';
							$cont=0;
							while($cont<=4){
								if($estrellas<=$cont){
							echo '<input id="'.$cont.'" type="checkbox" disabled>
								 <span class="estrellag" for="'.$cont.'">★</span>';
								}else{
							echo '<input id="'.$cont.'" type="checkbox" disabled>
								 <span class="estrellaA" for="'.$cont.'">★</span>';
								}
								$cont++;
							}
					    echo '</h3></td></tr>
							</form>';
						echo '<tr ><td colspan=2><p class="text-white">'.$comentarios.'</p></td></tr>';
						echo '<tr ><td colspan=2>&nbsp;</td></tr>';
					}
					echo "</table>";
        }
		
		public function consultar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM comentarios WHERE clave_comen='$clave'") or 
			die("<p>Problemas al consultar</p>".mysqli_error($this->conectarBD()));    
			if ($reg=mysqli_fetch_array($registro))  {   
				echo '<p class="centrado">Clave del comentario: '.$reg['clave_comen'].'</p><br>';
				echo '<p class="centrado">Fecha: '.$reg['fecha_comen'].'</p>';   
				echo '<p class="centrado">Estrellas: '.$reg['estrellas'].'</p>';
				echo '<p class="centrado">Descripcion: '.$reg['descripcion'].'</p>'; 
			}  else  {   
				echo '<p>No existe cliente con dicha clave</p>';  
			}
		}
		
		public function borrar($clave){
			$registro=mysqli_query($this->conectarBD(),"SELECT * FROM comentarios WHERE clave_comen='$clave'") or       
			die("Problemas al borrar".mysqli_error($this->conectarBD()));  
				
			if ($reg=mysqli_fetch_array($registro)){   
				
				mysqli_query($this->conectarBD(),"DELETE FROM comentarios WHERE clave_comen='$clave'") or         
				die(mysqli_error($this->conectarBD()));
			} else{    
				echo 'No existe un comentario con dicho codigo';   
			}
		}
		
		public function aprobar($clave){
			$registros=mysqli_query($this->conectarBD(),"update comentarios set status=1 WHERE clave_comen='$clave'") or   
			die("Problemas en el modificar:".mysqli_error()); 
            
			
		}
        
        public function bloquear($clave){
			$registros=mysqli_query($this->conectarBD(),"update comentarios set status=0 WHERE clave_comen='$clave'") or   
			die("Problemas en el modificar:".mysqli_error()); 
			
		}
		
		
		public function desconectarBD(){
			mysqli_close($this->conectarBD());
		}
	}