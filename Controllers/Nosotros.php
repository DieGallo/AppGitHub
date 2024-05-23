<?php 
	class Nosotros extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function nosotros()
		{
			$data['page_tag'] = NOMBRE_EMPRESA;
			$data['page_title'] = NOMBRE_EMPRESA;
			$data['page_name'] = "tienda_virtual";
			$this->views->getView($this,"nosotros",$data);
		}

	}
 ?>
