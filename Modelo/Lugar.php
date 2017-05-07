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
}



?>