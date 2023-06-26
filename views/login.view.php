<?php require 'header.php'; ?><!--mandamos a llamar al header-->

<div class="contenedor">
	<div class="post">
		<article>
			<h2 class="titulo">Iniciar Sesion</h2>
			<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><!--imprimiendo la variable server con el valor php self enviandose a si mismo el resultado, esto esta dentro de la funcion htmlspecialchars para evitar inyeccion de codigo, le pondremos su clase para su estilo-->
				 <input type="text" name="usuario" placeholder="Usuario"><!--boton input de tipo texto con nombre usauario y su placeholder-->
				 <input type="password" name="password" placeholder="Contraseña"><!--boton input de tipo password nombre password y placebolder contrasena-->
				 <input type="submit" name="Iniciar Sesion"><!--boton input tipo submit nombre inicar sesion,-->
			</form>
		</article>
	</div>
</div>


<?php require 'footer.php';?><!--mandando a llamar al footer-->