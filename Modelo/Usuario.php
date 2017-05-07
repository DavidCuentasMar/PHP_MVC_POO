<?php 
	class Usuario{
		private $db;
		private $usuario;

		public function __construct(){
			require_once("Conectar.php");
			$this->db=Conectar::conexion();			
			$this->usuario=array();
		}

		public function identificar($user,$pass){
			$consulta=$this->db->prepare("select * from usuarios where usuario=? and password=?");
			$consulta->bindParam(1,$user);
			$consulta->bindParam(2,$pass);
			$consulta->execute();
			if ($consulta->rowCount() == 1) {
				return $resultado=$consulta->fetch(PDO::FETCH_ASSOC);
				//print_r($resultado);
				
			}else{
				return $resultado[0]=0;
			}
		}
		public function logout(){
			session_start();
			session_destroy();
		}
		function registrar($username,$password){
			$consulta = $this->db->prepare("INSERT INTO usuarios (usuario, password, rango) VALUES (:user, :pass, :rango)");
			$consulta->bindParam(':user', $username);
			$consulta->bindParam(':pass', $password);
			$consulta->bindParam(':rango', $rango);
			$rango="mortal";
			$consulta->execute();
			return true;


		
		}


	}


?>