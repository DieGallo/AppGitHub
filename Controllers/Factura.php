<?php 
	require 'Libraries/html2pdf/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;

	class Factura extends Controllers{
		public function __construct()
		{
			parent::__construct();
			sessionStart();
			session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(MPEDIDOS);
		}

		public function generarFactura($idpedido)
		{
			if($_SESSION['permisosMod']['r']){
				if(is_numeric($idpedido)){
					$idpersona = "";
					if($_SESSION['permisosMod']['r'] and $_SESSION['userData']['idrol'] == RCLIENTES){
						$idpersona = $_SESSION['userData']['idpersona'];
					}
					$data = $this->model->selectPedido($idpedido,$idpersona);
					if(empty($data)){
						echo "Datos no encontrados";
					}else{
						$idpedido = $data['orden']['idpedido'];
						ob_end_clean();
						$html = getFile("Template/Modals/comprobantePDF",$data);
						$html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
						$html2pdf->writeHTML($html);
						$html2pdf->output('Factura-'.$idpedido.'.pdf');
					}	
				}else{
					echo "Dato no valido";
				}
			}else{
				header('Location: '.base_url().'/login');
				die();
			}
		}
	}
 ?>
