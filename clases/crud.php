<?php 

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into t_product_list (name,
										price,
										sku,
										is_seasonal,
										quantity,
										category)
									values ('$datos[0]',
											'$datos[1]',
											'$datos[2]',
											'$datos[3]',
											'$datos[4]',
											'$datos[5]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idproducto){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_producto,
							name,
							price,
							sku,
							is_seasonal,
							quantity,
							category
					from t_product_list
					where id_producto='$idproducto'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_producto' => $ver[0],
				'name' => $ver[1],
				'price' => $ver[2],
				'sku' => $ver[3],
				'is_seasonal' => $ver[4],
				'quantity' => $ver[5],
				'category' => $ver[6],
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE t_product_list set name='$datos[0]',
										price='$datos[1]',
										sku='$datos[2]',
										is_seasonal='$datos[3]',
										quantity='$datos[4]',
										category='$datos[5]'
						where id_producto='$datos[6]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idproducto){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from t_product_list where id_producto='$idproducto'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>