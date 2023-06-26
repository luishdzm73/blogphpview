<?php 
require 'header.php';//mandando a llamar al header.php
?>

<div class="contenedor">
	<div class="post">
		<article>
			<h2 class="titulo"><?php echo $post['titulo'];?></h2><!--imprimimos el arreglo post y traeremos el titulo-->
			<p class="fecha"><?php echo fecha($post['fecha']);?></p><!--imprimiremos la funcion fecha y de parametro el arreglo post y que trega la fecha-->
			<div class="thumb">
					<img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb'];?>" alt="<?php echo $post['titulo'];?>"><!--nos imprimira el define RUTA, la direccion de la carpeta imagenes imprimiendo el arreglo post con la thumb, en alt nos imprimira el arregl post con el titulo.-->
				</a>
			</div>
			<p class="extracto"><?php echo nl2br($post['texto']);?></p><!--agregando el parrafo con php con nl2br nos da espaciados entre los textos la variable post llamando su valor texto-->

		</article>
	</div>
</div>

<?php require 'footer.php'; ?>
