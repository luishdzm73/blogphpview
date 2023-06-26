<?php $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion); ?><!--creamos una variable llamada numeropaginas y la igualamos a la funcion numeropaginas y dentro pasamoes primer parametro de post por pagina y la conexion-->
<section class="paginacion"><!--agregando un seccion con la clase paginacion y dentro ira todo el codigo-->
	<ul>

		<?php if (pagina_actual() === 1) :  ?><!--Habilitando el control de la pagina anterior, si pagina actual es igual a pagina uno desabilita el boton de pagina anterior-->
			<li class="disabled">&laquo;</li><!--esta li con clase deseabled va a hacer cuando el boton de la paginacion este desabilitado -->
		<?php else:  ?><!--caso contrario-->
			<li><a href="index.php?p=<?php echo pagina_actual() - 1 ?>">&laquo;</a></li><!--muestra el boton normal redirigiendo al index.php y que p sea igual a pagina actual menos 1 para troceder-->
		<?php endif;  ?><!--fin del if-->

		<?php for($i = 1; $i<= $numero_paginas; $i++): ?><!--la variable i va a ser igual a 1, el ciclo se repetira mienstras eque i sea menor o igual al numero de paginas y en cada ciclo vaya incrementando una unidad-->
		<?php if(pagina_actual() === $i): ?><!--si la funcion pagina actual es igual a i-->
			<li class="active"><!--poniendo clase active en el css-->
				<?php echo $i ?><!--imprimenos i-->
			</li>
		<?php else: ?><!--caso contrario-->
			<li><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li><!---Con esto tendremos la paginacion con dos paginas y el boton de siguiente o retrosero funciona bien-->
			<?php endif; ?>
		<?php endfor; ?>

		<?php if(pagina_actual()==$numero_paginas): ?><!--si la funcion pagina actual es igual a numero de paginas significa que estamos en la pagina ultima-->
			<li class="disabled">&raquo;</li><!--lista con la clase disables para desabilitar el boton de paginacion osea que el boton estara desabilitado-->
			<?php else: ?><!--caso contrario...-->
			<li><a href="index.php?p=<?php echo pagina_actual() + 1; ?>">&raquo;</a></li><!--muestranos el elemento li sin la clase desabled con una direcino a index.php y que nos imprima la pagina actual menos 1-->
		<?php endif ?>
	</ul>
</section>