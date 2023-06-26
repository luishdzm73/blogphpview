<?php require 'header.php'; ?>


<div class="contenedor">
<div class="post">
		<article>
			<h2 class="titulo">Nuevo Articulo</h2>
			<form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><!--accederemos al php self encerrado en el htmlspecialchar para evitar inyeccion de codigo usaremos el enctype y igualarlo a multipart/from data para poder trabajar con archivos osea para poder subir la imagen desde aqui por eso es importante agregar en enctype, despue el metodo de envio que sera post-->
				<input type="text" name="titulo" placeholder="Titulo del Articulo"><!--boton input para el titulo de articulo-->
				<input type="text" name="extracto" placeholder="Extracto del Articulo"><!--boton input con el extracto del articulo-->
				<textarea name="texto" placeholder="Texto del Articulo"></textarea><!--textare para el articulo-->
				<input type="file" name="thumb"><!--boton de tipo file para las imagenes-->

				<input type="submit" value="Crear Articulo">
				</form>
		</article>
	</div>
	</div>

<?php require 'footer.php'; ?>