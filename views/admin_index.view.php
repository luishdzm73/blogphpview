<?php require '../views/header.php'; ?>

<div class="contenedor">
	<h2>Panel de Control</h2>
	<a class="btn" href="nuevo.php">Nuevo Post</a>
	<a class="btn" href="cerrar.php">Cerrar Sesion</a>
	<?php  foreach($posts as $post): ?><!--por cada posts trenos un post las tenemos que mandar a llamar desde el index.php del admin-->
		<div class="post">
			<article>
				<h2 class="titulo"><?php echo $post['id'] . '.-' . $post['titulo']; ?></h2><!--concatenamos el titulo desde el arreglo post y su id y concatenamos el titulo del mismo arreglo-->
				<a href="editar.php?id=<?php echo $post['id']; ?>">Editar</a><!--poniendo el boton de editar y nos enviara a editar.php con el parametro id que sera igual a un echo del arregl post y especificando que queremos el id-->
				<a href="../single.php?id=<?php echo $post['id']; ?>">Ver</a><!--retocedemos una carpeta y vamos al single.php que sera igual al id y nos imprimira el arreglo post especificando el id-->
				<a href="borrar.php?id=<?php echo $post['id']; ?>">Borrar</a><!--accediendo al archivo borrar.php que nos traera el id y imprimiendo el arreglo post especificando que queremos el id-->
			</article>
		</div>
	<?php  endforeach; ?>
	
<?php  require '../paginacion.php'; ?><!--retocedemos una carpeta para entrar a este archivo-->
</div>

<?php require '../views/footer.php'; ?><!--retrocedemos un archivo para entrar a esta pagina-->
