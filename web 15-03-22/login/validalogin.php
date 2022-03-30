<?php
class ValidaLoggin{
	private $cuenta;
	private $contr;
	private $rol;
	
	public function inicializar($cuenta ,$contrasena){
		$this->cuenta=$cuenta;
		$this->contr=$contrasena;
	}
	
        public function conectarBD(){
    			$con=mysqli_connect('localhost','u859971941_innSoft','innSoft2020','u859971941_proyectopro')or
				die("Problemas en la conexion a la base de datos");
				return $con;
		}
    
    public function Lista($cliente){
            $registros=mysqli_query($this->conectarBD(),"SELECT * FROM reservacion WHERE clave_cli='$cliente'")or
            die('<h3>¡Bienvenido!</h3><p class="centrado">Aun no tienes reservaciones</p>
            <a href="../reservacion/fechahora.php" class="btn btn-danger">Reservar'.mysqli_error($this->conectarBD()));
         
            echo '<table class="table table-hover table-sm mt-3 border-red text-white"> 
                    <thead><tr><th>Fecha de la reservación</th><th>Hora</th><th>Mesas</th></tr></thead>';
            
            while ($reg=mysqli_fetch_array($registros)){       
				echo '<tr><td>'.$reg['fecha_reserv'].'</td>
                <td>'.$reg['hora_reserv'].'</td>';
                $mesas=$this->conectarBD()->query("select m.descripcion
                                                   from mesa m inner join reservacion_mesa mr on m.clave_mesa = mr.clave_mesa
                                                   inner join reservacion r on mr.clave_reserv = r.clave_reserv
                                                   where r.clave_cli = $cliente and mr.clave_reserv = ".$reg['clave_reserv']);
                $cant=$this->conectarBD()->query("select count(mr.clave_mesa) as num
                                                   from mesa m inner join reservacion_mesa mr on m.clave_mesa = mr.clave_mesa
                                                   inner join reservacion r on mr.clave_reserv = r.clave_reserv
                                                   where r.clave_cli = $cliente");

                if($c=mysqli_fetch_array($cant)){
                    $num=$c['num'];
                }
                echo '<td>';
                    $cont=1;
                while($me=mysqli_fetch_array($mesas)){
                    if($num>1){
                        echo $cont."-.".$me['descripcion']." <br> ";
                    }else{
                        echo $me['descripcion'];
                    }
                    $cont++;
                }
                echo '</td>
                <td>
                   
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalim-'.$reg['clave_reserv'].'">QR</button>
                        <div class="modal fade" id="modalim-'.$reg['clave_reserv'].'">
                            <div class="modal-dialog d-flex justify-content-center align-items-center">
                                <div class="modal-content">
                                        <img src="../temp/reserv'.$reg['clave_reserv'].'.png" alt="" id="imagen-modal">
                                </div>
                            </div>
                        </div>
                    
                </td>
                
            
                    <td>
                        <form action="../usuario/reservacionCtrl.php" method="post">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <input type="hidden" name="opc" value="5">
                            <input type="hidden" name="clave" value='.$reg['clave_reserv'].'>
                            </form>
                        </td>';
			 }
            
			echo '</table>
            <a href="../reservacion/fechahora.php" class="btn btn-info">Reservar</a>'; 
    }
	
	public function loggin(){
         $cuenta =strtolower($this->cuenta);
        $con = strtolower($this->contr);
     $registro=mysqli_query($this->conectarBD(),"select * from cliente where email = '$cuenta'")or
     die('<p>Verifica que tu cuenta o contraseña sean las correctas</p>'.mysqli_error($this->conectarBD()));
        if($reg=mysqli_fetch_array($registro)){
        if( $cuenta == $reg['email'] and $con == $reg['contrasena'] ){
           $_SESSION['id_usuario'] = trim($this->cuenta);
            $_SESSION['clave_cli'] = $reg['clave_cli'];
             $_SESSION['con']= $this->contr;
             //var_dump($_SESSION);exit;
             $this->Lista($reg['clave_cli']);
	    }elseif($cuenta == $reg['email'] and $con != $reg['contrasena'] ){
	              	$nc="Ups...Contraseña Incorecta...";
			echo "<script>";
		   echo "alert('$nc');";
		   echo "window.history.back();";
		   echo "</script>";
	
	    }
	}else{
	           	$nc="No tienes un cuenta con nosotros";
			echo "<script>";
		   echo "alert('$nc');";
		   echo "window.location ='../index.php';";
		   echo "</script>";
	
	    }
	}

	
	
	public function desconectarBD(){
		mysqli_close($this->conectarBD());
	}
}
?>