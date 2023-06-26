<!DOCTYPE html><!--todo este codigo se guardo en un archivo llamado header porque lo vamos a estar llamando para otras paginas esto sirve par ano estar copeando y pegando todo el codigo asi se modificara en todas las paginas-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<!--<link href='https://fonts.googleapis.com/css?family=Open+Sans|Oswald&display=swap' rel='stylesheet'>-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">
	<title>Blog</title>
</head>
<body>
<header>
	<div class="contenedor"><!--estilo-->
		<div class="logo izquierda"><!--estilo-->
			<p><a href="<?php echo RUTA;  ?>">Mi primer Blog</a></p><!--Titulo del header con una la ruta de la db-->
		</div>
		<div class="derecha">
			<form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.php" method="get"><!--Caja de busqueda El valor de ruta es igual al que esta en el config, despues del pondremos buscar.php para recibirlos en ese archivo-->
			<input type="text" name="busqueda" placeholder="Buscar"><!--Caja de busqueda y su placeholder-->
			<button type="submit" class="icono fa fa-search"></button><!--Boton icono de busqueda-->
			</form>
			<nav class="menu"><!--esta seccion nav encierra el contacto, el logo de twitter y facebook-->
				<ul><!--listas desordenadas-->
					<li><a href="#"><i class="fa fa-twitter"></i></a></li><!--icono de twitter y su href-->
					<li><a href="#"><i class="fa fa-facebook"></i></a></li><!--icono de facebook y su href-->
					<li><a href="#">Contacto<i class="icono fa fa-envelope"></i></a></li><!--icono de contacto y su href-->
				</ul>
			</nav>
		</div>
	</div>
</header>
</body>
</html>