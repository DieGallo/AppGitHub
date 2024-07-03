<?php 

// CONFLICTOS Y SOLICIONES DE MERGE ESTAMOS EN RAMA MASTER

// COMENTARIOS DE PRUEBA PARA PROBAR COMTMIT EN GIT
// Otro comentario para probar el comando git am
// Comentario para crear una rama
// Estamos dentro de la Rama de Comentarios

// Rama Comentarios, este comentario es para probar Merge
	require_once("Config/Config.php");
	require_once("Helpers/Helpers.php");
	// Nuevo comentario para retomar el curso de GitHub 

	// Este comentario es para hacer un Test de Merge
	$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
	$arrUrl = explode("/", $url);
	$controller = $arrUrl[0];
	$method = $arrUrl[0];
	$params = "";

	// COMENTARIO PARA CREAR NUEVO COMMIT

	if(!empty($arrUrl[1]))
	{
		if($arrUrl[1] != "")
		{
			$method = $arrUrl[1];	
		}
	}

	if(!empty($arrUrl[2]))
	{
		if($arrUrl[2] != "")
		{
			for ($i=2; $i < count($arrUrl); $i++) {
				$params .=  $arrUrl[$i].',';
				# code...
			}
			$params = trim($params,',');
		}
	}
	require_once("Libraries/Core/Autoload.php");
	require_once("Libraries/Core/Load.php");

 ?>