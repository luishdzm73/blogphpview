<?php 

require 'administracion/config.php';//mandano a llamar a las configuraciones

require 'functions.php';//mandando a llamar a las funciones

$conexion = conexion($bd_config);//conexion a bas de datos
if(!$conexion) {//si no hay conexion mandame un error
	header ('Location: error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) {//si server rquest metho es igual a get y si no esta vacio el valor de get de busqueda
	$busqueda = limpiarDatos($_GET['busqueda']);// ejecuta el resto del codigo que es buscar dentro de la base de datos con get busqueda esta se ejecutara con la funcion de limpiar datos para evitar inyeccion de codigo

	$statement = $conexion->prepare(//declararemos una consulta sql
		'SELECT * FROM articulos WHERE titulo LIKE :busqueda or texto LIKE :busqueda'//queremos seleccionar todos los archivos de la tabla articulos donde el titulo sea como la busqueda que nosotros estamos resiviendo(para esto lo hacemos con LIKE) o el texto sea similar a busqueda. pnemos dos puntos para que sea un placeholder y reciba los valores
	);
$statement->execute(array(':busqueda'=>"%$busqueda%"));//aqui ponemos que el placeholder busqueda sera igual a la busqueda que pongamos y para esto ponemos los signos de porcentaje
$resultados=$statement->fetchAll();//mostrar todos los datos con fetchAll

if(empty($resultados)){//si la variable resultados esta vacia significa que no hay resultados
	$titulo = 'No se encontraron articulos con el resultados:' . $busqueda;//con la variable nueva titulo pondemos un texto que diga no se encontraron articulos y concatenaremos la busqueda
} else {//caso contrario...
	$titulo = 'Resultados de la busqueda: ' . $busqueda;//sera igual a resultados de la busquda y concatenamos la busqueda
}
} else{//caso contrario
	header('Location: ' . RUTA . '/index.php');//solo mandamos a la pagina de inicion.concatenando la ruta y el index.php
}

require 'views/buscar.view.php';//llamando la vista de buscar

 ?>