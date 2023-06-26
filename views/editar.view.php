<?php require 'header.php'; ?>


<div class="contenedor">
<div class="post">
		<article>
			<h2 class="titulo">Editar Articulo</h2>
			<form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<input type="hidden" name="id" value="<?php echo $post['id']; ?>"><!--boton de tipo hidden nos sirve para decir cual sera el id del articulo que estamos trabajando-->
				<input type="text" name="titulo" value="<?php echo $post['titulo']; ?>">
				<input type="text" name="extracto" value="<?php echo $post['titulo']; ?>">
				<textarea name="texto"><?php echo $post['texto']; ?></textarea>
				<input type="file" name="thumb">
				<input type="hidden" name="thumb-guardada" value="<?php echo $post['thumb']; ?>"><!--se encargara de guardar el valor en la thumb que tengamos ejemplo 1.png o 2.png etc.-->

				<input type="submit" value="Modificar Articulo">
				</form>
		</article>
	</div>
	</div>

<?php require 'footer.php'; ?>