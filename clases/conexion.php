

<?php 

	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('localhost',
										'root',
										'1234',
										'productos');
			return $conexion;
		}
	}


 ?>