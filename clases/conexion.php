
<?php
	/**
	 * Conexion a la BD
	 */
	class conectar{
		public function conexion(){
			// plexus_root,pl3xu5m3d1n3T123,plexus_medinet_bd
			$conexion=mysqli_connect('localhost','root','654321','medinet_v3');
			//	$conexion=mysqli_connect('localhost','plexus_root','pl3xu5m3d1n3T123','plexus_medinet_bd');
			return $conexion;
		}
	}

?>