<?php 
require 'header.php'//mandando a llamar al header.php
?>

<div class="contenedor">
	<?php  foreach($posts as $post):?><!--el ciclo foreach recorrera el arreglo de post para cargar todos los articulos-->

	<div class="post"><!--esta estructura se va a repetir por cada post que encuentre, obviamente todo esto esta dentro del foreach-->
		<article>
			<h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo']; ?></a></h2><!--accedemos a la variable post con el titulo esto lo obtenemos de la variable post que es la que esta en el foreach, en la referencia nos mandara al single.php y su id que este dentro del post-->
			<p class="fecha"><?php echo fecha($post['fecha']); ?></p><!--fecha imprimiendo el arreglo fecha y el valor fecha-->
			<div class="thumb"><!--divisor con la clase thumb-->
				<a href="single.php?id=<?php echo $post['id']; ?>">
					<img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>"><!--ruta del blog la ruta esta en el config lo mandamos a llamar y direccion de imagenes con el post foreach pero especificando que queremos las imagenes osea el thumb-->
				</a>
			</div>
			<p class="extracto"><?php echo $post['extracto']; ?></p>
			<a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Continuar Leyendo</a><!--imprimiendo el post con su id-->
		</article>
	</div>

	<?php  endforeach; ?><!--fin del foreach-->
	

	
<?php  require 'paginacion.php'; ?><!--mandando a llamar al archivo paginacion.php-->

</div>
<?php require 'footer.php'; ?><!--mandando a llamar al archivo footer.php-->
</body>
</html>