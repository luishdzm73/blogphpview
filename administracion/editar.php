<?php session_start();

require 'config.php';
require '../functions.php';

comprobarSession();//si no hay una session no redirige

$conexion = conexion($bd_config);//comprobando conexion
if (!$conexion) {
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {//si la variable server es igual a post
	$titulo = limpiarDatos($_POST['titulo']);
	$extracto = limpiarDatos($_POST['extracto']);
	$texto = $_POST['texto'];
	$id = limpiarDatos($_POST['id']);
	$thumb_guardada = $_POST['thumb-guardada'];
	$thumb = $_FILE['thumb'];

if (empty($thumb['name'])) {//si esta vacio osea si el usuario no envio una imagen para ser guardad
	$thumb = $thumb_guardada;//sera igual a thum_guardada
	
} else{//caso contrario
	$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];//carga la nueva imagen que el usuario esta cargando sera igual a la carpeta de las imgaenes con el nombre de la imagen y concatenamos la variable blog y el valor carpeta imagnes y concatenamos la variable FILES y la imagen y el nomnre
	move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);//subiremos el archivo con esta funcion y como parametro ponemos el files la imagen y la ruta del archivo subido con tmp y despues la variable
	$thumb = $_FILES['thumb']['name'];
}

$statement = $conexion->prepare(
'UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id'
);//quiero que me actualizes de la tabla articulos y quiero que me setees los titulos igual a lo que era el placeholder del titulo y lo mismo con texto thmb etc
//donde el id sea igual al id se igual al que le estamos pasando.
$statement->execute(array(
':titulo'=>$titulo,
':extracto'=>$extracto,
':texto'=>$texto,
':thumb'=>$thumb,
':id'=>$id
));

header('Location: ' . RUTA . '/administracion');

} else {
	$id_articulo = id_articulo($_GET['id']);

	if (empty($id_articulo)) {
		header('Location: ' . RUTA . '/administracion');
		
	}

	$post = obtener_post_por_id($conexion, $id_articulo);//obteniendo la conexion y el id de los articulos con la funcion obtener post por pagina

	if (!$post) {//si no hay post
		header('Location: ' . RUTA . '/administracion');//redirige al panel de administracion
		# code...
	}
	$post = $post[0];//post sera igual a post con su posicion 0
}

require '../views/editar.view.php';



?>