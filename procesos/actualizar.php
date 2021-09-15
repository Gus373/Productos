<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombreU'],
		$_POST['precioU'],
		$_POST['skuU'],
		$_POST['temporadaU'],
		$_POST['cantidadU'],
		$_POST['categoriaU'],
		$_POST['idProducto']
				);

	echo $obj->actualizar($datos);
	

 ?>