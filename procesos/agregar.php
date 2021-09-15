<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombre'],
		$_POST['precio'],
		$_POST['sku'],
		$_POST['temporada'],
		$_POST['cantidad'],
		$_POST['categoria'],
				);

	echo $obj->agregar($datos);
	

 ?>