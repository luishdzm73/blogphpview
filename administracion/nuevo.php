<?php session_start();//fucion session star para trabajar con sessiones
require 'config.php';//llamando el archivo config
require '../functions.php';//mandando a llamar a las funciones retrocediendo un directorio atras

comprobarSession();//usamos la funcion comprobar session para saber si hay conexion o no
$conexion = conexion($bd_config);//usando la funcion conexion con el parametro de bd_config revisa el archivo config para mas informacion
if (!$conexion) {//si no hay conexon..
	header('Location: ../error.php');//enviame a la pagina de error
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {//comprobando si los datos han sido enviados con el server request method si es igual post sifnigica que los datos han sido enciados y los resiviremos en las siguiente variables..
	$titulo = limpiarDatos($_POST['titulo']);//la variable titulo limpiando datos con la funcion y el arreglo post y el titulo
	$extracto = limpiarDatos($_POST['extracto']);//variable extracto limpiando datos con el arreglo post y trallendo el extracto
	$texto = $_POST['titulo'];//variable texto igualandolo con el arreglo post y especificando que queremos el titulo
	$thumb = $_FILE['thumb']['tmp_name'];//variable thumb igualandolo al arreglo file y espeficicando que queremos el thubm y el nombre

	$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];//en la variable archivo subido esta almacenara laa ruta del archivo una vez finalizado, concatenadmos que queremos regresar una carpeta ya que estamos en la carpeta admin, y concatenamos el arreglo blog_config a la carpeta_imagenes y concatenamos el arreglo files y queremos acceder al thumb y al nombre

	move_uploaded_file($thumb, $archivo_subido);//estamos moviendo de lo que es la computadora del usuario hcia el servidor la imagen

	$statement = $conexion->prepare(//ejecutando una consulta sql insertando datos insertar dentro de articuls el id titulo extracto texto y thumb con los valores y en el primero pondremos null en los demas un placeholder con sus respectivos dos puntos para poder ser remplazados
		'INSERT INTO articulos (id, titulo, extracto, texto, thumb)
		VALUES (null, :titulo, :extracto, :texto, :thumb)'
	);

	$statement->execute(array(//ejecutando el statemento y le pasamos el arreglo y remplazams los placeholder osea titulo sera igual ala variable titulo ylo mismo con los demas, recuerda que las variables estar en la parte de arriba ya las trabajamos.
		':titulo' => $titulo,
		':extracto' => $extracto,
		':texto' => $texto,
		':thumb' => $_FILES['thumb']['name']
	));
	header('Location: '. RUTA . '/administracion');//accedemos a location y accedemoas a la ruta y a la carpta admin
}

require '../views/nuevo.view.php';//accediendo a las vistas del nuevo retrocediendo un directorio



?>