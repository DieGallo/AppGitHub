<?php 
	class PaginasModel extends Mysql
	{
		private $intIdPagina;
		private $strTitulo;
		private $strContenido;
		private $intStatus;
		private $strRuta;
		private $strImagen;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectPaginas(){
			$sql = "SELECT idpost, titulo, DATE_FORMAT(datecreated, '%d/%m/%Y') AS fecha, ruta, status
					FROM post
					WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}
	}
 ?>