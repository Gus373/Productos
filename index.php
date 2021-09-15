<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";  ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						CRUD De Productos
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Gustavo Ponce Arenas
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevos juegos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Precio</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
						<label>Sku</label>
						<input type="text" class="form-control input-sm" id="sku" name="sku">
						<label>Temporada</label>
						<input type="text" class="form-control input-sm" id="temporada" name="temporada">
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
						<label>Categoria</label>
						<input type="text" class="form-control input-sm" id="categoria" name="categoria">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar juego</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idProducto" name="idProducto">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Precio</label>
						<input type="text" class="form-control input-sm" id="precioU" name="precioU">
						<label>Sku</label>
						<input type="text" class="form-control input-sm" id="skuU" name="skuU">
						<label>Temporada</label>
						<input type="text" class="form-control input-sm" id="temporadaU" name="temporadaU">
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
						<label>Categoria</label>
						<input type="text" class="form-control input-sm" id="categoriaU" name="categoriaU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar :(");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar.php",
				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idProducto){
		$.ajax({
			type:"POST",
			data:"idProducto=" + idProducto,
			url:"procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idProducto').val(datos['id_producto']);
				$('#nombreU').val(datos['name']);
				$('#precioU').val(datos['price']);
				$('#skuU').val(datos['sku']);
				$('#temporadaU').val(datos['is_seasonal']);
				$('#cantidadU').val(datos['quantity']);
				$('#categoriaU').val(datos['category']);
			}
		});
	}

	function eliminarDatos(idProducto){
		alertify.confirm('Eliminar un producto', '¿Seguro de eliminar este producto ?', function(){ 

			$.ajax({
				type:"POST",
				data:"idProducto=" + idProducto,
				url:"procesos/eliminar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
	}
</script>