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
		        echo                    '<img src="http://placehold.it/320x150" alt="">';
		        echo                    '<div class="caption">' ;
		        //echo                        '<h4 class="pull-right">$24.99</h4>';
		        echo                        '<h4><a href="#">'.$resultado[$i]['nombre'].'</a>';
		        echo                        '</h4>';
		        echo                        '<p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>';
		        echo                    '</div>';
		        echo                    '<div class="ratings">';
		        echo                        '<p class="pull-right">15 reviews</p>';
		        echo                       ' <p>';
		        echo                            '<span class="glyphicon glyphicon-star"></span>';
		        echo                            '<span class="glyphicon glyphicon-star"></span>';
		        echo                            '<span class="glyphicon glyphicon-star"></span>';
		        echo                            '<span class="glyphicon glyphicon-star"></span>';
		        echo                            '<span class="glyphicon glyphicon-star"></span>';
		        echo                        '</p>';
		        echo                    '</div>';
		        echo                '</div>';
		        echo '</div>';
			}
		}

	}
}



?>