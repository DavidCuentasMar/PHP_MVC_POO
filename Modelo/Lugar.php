<?php 
class Lugar{
	private $db;

	public function __construct(){
		require_once("Conectar.php");
		$this->db=Conectar::conexion();			

	}
	function guardar($tipo2,$nombre2,$descripcion2,$imagen2){
		$consulta = $this->db->prepare("INSERT INTO lugares (tipo, nombre, descripcion, imagen) VALUES (:tipo1, :nombre1, :descripcion1, :imagen1)");
		$consulta->bindParam(':tipo1', $tipo2);
		$consulta->bindParam(':nombre1', $nombre2);
		$consulta->bindParam(':descripcion1', $descripcion2);
		$consulta->bindParam(':imagen1', $imagen2);
		if ($consulta->execute()) {
			return true;
		}else{
			print_r($consulta->execute());
			return false;
		}
		
	}
	function eliminarReserva($id){
		$consulta=$this->db->prepare("select * from lugares where id=?");
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
				//print_r($resultado);
		if ($resultado['estado']=!0) {
			session_start();
  			//print_r($_SESSION['usuario']['usuario']);
  			$estado = 1;
  			$sth = "UPDATE lugares SET estado = :estado, owner_username =:user WHERE id = :id";
  			$consulta=$this->db->prepare($sth);
			$consulta->execute(array(':estado'=>$estado, ':id'=>$id, ':user'=>NULL));
		}

	}
	function showReservas(){
  		//print_r($_SESSION['usuario']['usuario']);
		$user=$_SESSION['usuario']['usuario'];
		$consulta=$this->db->prepare("select * from lugares where owner_username='$user'");
		$consulta->execute();
		$resultado = $consulta->fetchAll();
		//print_r($resultado);		
		if ($consulta->rowCount() != 0) {
			$items = $consulta->rowCount();
			//echo "numero de items".$items;
			for ($i=0; $i <= ($items-1); $i++) { 
				echo '<div class="col-sm-4 col-lg-4 col-md-4">';
		        echo                '<div class="thumbnail">';
		        echo  				'<div class="imgHome">';
		        echo                    '<img src="../Vista/imgs/'.$resultado[$i]['imagen'].'" alt="nada" width="320"  height="150">';
		        echo  				'</div>';
		        echo                    '<div class="caption">' ;
		        //echo                        '<h4 class="pull-right">$24.99</h4>';
		        echo                        '<h4><a href="#">'.$resultado[$i]['nombre'].'</a>';		        
		        echo                        '</h4>';
		        echo                        '<p>'.$resultado[$i]['descripcion'].'</p>';
		        echo                    '</div>';
		        echo                    '<div class="ratings">';
		        echo 					'<a href="../Controlador/LugarControlador.php?op=0&id='.$resultado[$i]['id'].'"><button type="button" class="btn btn-danger">Eliminar</button></a>';
		        echo                        '</p>';
		        echo                    '</div>';
		        echo                '</div>';
		        echo '</div>';
			}
		}

	}
	function llenar($tipo){
			 $consulta=$this->db->prepare("select * from lugares where tipo='$tipo'");
			 $consulta->execute(array());
			 while ($nuevo=$consulta->fetch(PDO::FETCH_ASSOC)){		
				echo '<div class="col-sm-4 col-lg-4 col-md-4">';
		        echo                '<div class="thumbnail">';
		        echo  				'<div class="imgHome">';
		        echo                    '<img src="../Vista/imgs/'.$nuevo['imagen'].'" alt="nada" width="320"  height="150">';
		        echo  				'</div>';
		        echo                    '<div class="caption">' ;
		        //echo                        '<h4 class="pull-right">$24.99</h4>';
		        echo                        '<h4><a href="#">'.$nuevo['nombre'].'</a>';		        
		        echo                        '</h4>';
		        echo                        '<p>'.$nuevo['descripcion'].'</p>';
		        echo                    '</div>';
		        echo                    '<div class="ratings">';
		        echo 					'<a href="../Controlador/LugarControlador.php?id='.$nuevo['id'].'"><button type="button" class="btn btn-success">Reservar</button></a>';
		        echo                        '</p>';
		        echo                    '</div>';
		        echo                '</div>';
		        echo '</div>';		 

			//	insetarcaja("$nuevo[nombre]","$nuevo[descripcion]","$nuevo[imagen]");	


			 } 
	}
	function insetarcaja($nombre, $descripcion,$ruta){

		        echo '<div class="col-sm-4 col-lg-4 col-md-4">';
                echo        '<div class="thumbnail">';
                echo           '<img src="../Vista/imgs/<?php echo $ruta ?>" alt="nada" width="320"  height="150">';
                echo            '<div class="caption">';
    			echo                   '<h4><a href="#"><?php echo $nombre ?></a>';
                echo                '</h4>';
                echo                '<p><?php echo $descripcion ?></p>';
                echo           '</div>';
                echo        '</div>';
                echo    '</div>';
	}
	function reservarPlace($id){
		$consulta=$this->db->prepare("select * from lugares where id=?");
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
				//print_r($resultado);
		session_start();				
		if ($resultado['estado']==0) {
			session_start();
  			//print_r($_SESSION['usuario']['usuario']);
  			$estado = 1;
  			$sth = "UPDATE lugares SET estado = :estado, owner_username =:user WHERE id = :id";
  			$consulta=$this->db->prepare($sth);
			$consulta->execute(array(':estado'=>$estado, ':id'=>$id, ':user'=>$_SESSION['usuario']['usuario']));
			header('location: ../Vista/Reservas.php');
		}else{
			if ($resultado['owner_username']==$_SESSION['usuario']['usuario']) {
				header('location: ../Vista/Reservas.php');
			}else{
				header('location: ../Vista/666.php');
			}
		}
				
		}
	function showPlaces(){
		$consulta=$this->db->prepare("select * from lugares");
		$consulta->execute();
		$resultado = $consulta->fetchAll();
		//print_r($resultado);

		
		if ($consulta->rowCount() != 0) {
			$items = $consulta->rowCount();
			//echo "numero de items".$items;
			for ($i=$items-1; $i >= ($items-6); $i--) { 
				echo '<div class="col-sm-4 col-lg-4 col-md-4">';
		        echo                '<div class="thumbnail">';
		        echo  				'<div class="imgHome">';
		        echo                    '<img src="../Vista/imgs/'.$resultado[$i]['imagen'].'" alt="nada" width="320"  height="150">';
		        echo  				'</div>';
		        echo                    '<div class="caption">' ;
		        //echo                        '<h4 class="pull-right">$24.99</h4>';
		        echo                        '<h4><a href="#">'.$resultado[$i]['nombre'].'</a>';		        
		        echo                        '</h4>';
		        echo                        '<p>'.$resultado[$i]['descripcion'].'</p>';
		        echo                    '</div>';
		        echo                    '<div class="ratings">';
		        echo 					'<a href="../Controlador/LugarControlador.php?id='.$resultado[$i]['id'].'"><button type="button" class="btn btn-success">Reservar</button></a>';
		        echo                        '</p>';
		        echo                    '</div>';
		        echo                '</div>';
		        echo '</div>';
			}
		}

	}
}



?>