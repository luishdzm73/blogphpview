<?php

function conexion($bd_config){//funcion para conectarse a la base de datos mediante el metdo PDO y su try catch
try{
	$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);//concatenamos el valor de la variable db_config tanto para la base de datos el usuario y el password.
	return $conexion;//si la conexion es correcta se conectara a la base de daatos
} catch (PDOException $e) {
	return false;//si no hay conexion mandame un error
} 

}

function limpiarDatos($datos){//funcion para limpiar los datos y los pasara por las siguiente funcionnes:
	$datos = trim($datos);//trip elimina los espacion del datos
	$datos = stripslashes($datos);//elimina los slash o otros caracteres de los datos
	$datos = htmlspecialchars($datos);//limpia por complets caracteres especiales dentro de los datos.
	return $datos;//return de los datos
}

function pagina_actual(){//se encargara de retornar direcetamente 
	return isset($_GET['p']) ? (int)$_GET['p'] : 1;//si la variable get esta seteada con la variable p, p de pagina si essta seteada obtendremos el valor p en entero de otra forma retorname 0
}

function obtener_post($post_por_pagina, $conexion){//funcion para obtener post
	$inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;//cuantos por por pagina queremos tener si la pagina actual es mayor a uno entonces, pagina actual la funcion sera multipicada por los post por pagina menos los post por pagina caso contrario sera igual a cero. y lo guardamos en la varible inicio
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina");//sentencia igualda a la conexion que tenemos, sql con el metodo prepare para obtener los post, en la tabla articulos tendra un limite de la variable inicio y post por pagina(traeme todos los articulos desde inicio osea 3 y articulo 2) el SQL_CALC_FOUND_ROWS sirve para calcular cuantos articulos tenemos en la tabla
	$sentencia->execute();//ejecutando la sentencia
	return $sentencia->fetchAll();//retornando todos los post de la pagina.

}

function numero_paginas($post_por_pagina, $conexion){//como primer parametro el post pot pagina(dentro de blog_config revisa config.php) y segundo parametro la conexion revisa el archivo paginacion.php
	$total_post = $conexion->prepare("SELECT FOUND_ROWS() as total");//ponemos una funcion llamada total_post y la igualamos a la conexion y con su prepare y ponemos el found rouws para el total de post y que nos traega el total
	$total_post->execute();//ejecutamos la variable
	$total_post = $total_post->fetch()['total'];//nos traera un arreglo con fecth y le pondemos el total

	$numero_paginas = ceil($total_post / $post_por_pagina);//sera igual al resultado de toal de post entre post pot pagina dentro de un ceil para redondear hacia arriba para tener un entero
	return $numero_paginas;//nos regresara el numero paginas
}

function id_articulo($id){//funcion id,dentro del parametro recibiremos un id y retornaremos valores con la funcion limpiar datos para limpiarlos y los casteara en entero para que no nos inyecten codigo osea que no pondra meter texto solo numeros ya que el dato se convertira en entero.
	return (int)limpiarDatos($id);
}

function obtener_post_por_id($conexion, $id){//los parametros sera la conexion que tengamos y el id revisa el single.php
	$resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");//guardaremos en la variable el resultado de una query la query se ejecuta de una forma en la que podemos traer articulos simples. traeme todos los articulos DONDE el parametro sera el id y como LIMITE sera 1
	$resultado = $resultado->fetchAll();//el resultado sera igual al resultado fetchAll osae que traera todos
	return ($resultado) ? $resultado: false;//si hay resultado lo vamos a devolver de otra forma regresa un false

}

function fecha($fecha){//nos convertira una cadena de texto a tiempo
	$timestamp= strtotime($fecha);//esta funcion nos convierte una cadena de texto a tiempoel valor que pasemmos a la variable fecha
	$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];//arreglo con los meses
	$dia = date('d', $timestamp);//dia que queremos con la funcino date con primer parametro la d de dia y de segundo parametro la variale timestamp
	$mes = date('m', $timestamp) - 1;//en los dias del mes empieza desde 0 asi que le ponemos -1 para que empieze desde enero, la m es de mes y la variable timestamp
	$year = date('y', $timestamp);//usamos la funcion date de primer parametro una y de year y la variable timestamp y lo guardamos en una variale llamada year
	$fecha = "$dia de " .$meses[$mes] . " del $year";//en la variable fecha pondremos la variable dia y concatenamos el arreglo meses y imprimimos el mes, y concatenamos el ano
	return $fecha;//retornamos la variable fecha.
}

function comprobarSession(){
	if (!isset($_SESSION['admin'])) {//si la fucncion de admin no esta seteada...
		header('Location: ' . RUTA);//redirige al directorio osea a la RUTA osea la pagina de inicio
	}
}

?>