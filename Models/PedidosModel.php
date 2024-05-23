<?php 
class PedidosModel extends Mysql
{
	private $objCategoria;
	public function __construct()
	{
		parent::__construct();
	}

	public function selectPedidos($idpersona = null){
		$where = "";
		if($idpersona != null){
			$where = " WHERE p.personaid = ".$idpersona;
		}
		$sql = "SELECT p.idpedido,
						p.referenciacobro,
						p.idtransaccionpaypal,
						DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,
						p.monto,
						tp.tipopago,
						tp.idtipopago,
						p.status
				FROM pedido p
				INNER JOIN tipopago tp
				ON p.tipopagoid = tp.idtipopago $where";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectPedido(int $idpedido, $idpersona = null){
		$busqueda = "";
		if($idpersona != null){
			$busqueda = " AND p.personaid =".$idpersona;
		}
		$request = array();
		$sql = "SELECT p.idpedido,
						p.referenciacobro,
						p.idtransaccionpaypal,
						p.personaid,
						DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,
						p.costoenvio,
						p.monto,
						p.tipopagoid,
						t.tipopago,
						p.direccionenvio,
						p.status
				FROM pedido as p
				INNER JOIN tipopago t
				ON p.tipopagoid = t.idtipopago
				WHERE p.idpedido = $idpedido ".$busqueda;
		$requestPedido = $this->select($sql);
		if(!empty($requestPedido)){
			$idpersona = $requestPedido['personaid'];
			$sql_cliente = "SELECT idpersona,
									nombres,
									apellidos,
									telefono,
									email_user,
									nit,
									nombrefiscal,
									direccionfiscal 
							FROM persona WHERE idpersona = $idpersona";
			$requestCliente = $this->select($sql_cliente);
			$sql_detalle = "SELECT p.idproducto,
									p.nombre as producto, 
									d.precio, 
									d.cantidad 
							FROM detalle_pedido d
							INNER JOIN producto p 
							ON d.productoid = p.idproducto 
							WHERE d.pedidoid = $idpedido";
			$requestProductos = $this->select_all($sql_detalle);
			$request = array('cliente' => $requestCliente,
							'orden' => $requestPedido,
							'detalle' => $requestProductos
						);
		}
		return $request;
	}

	public function selectTransPaypal(string $idtransaccion, $idpersona = null){
		$busqueda = "";
		if($idpersona != null){
			$busqueda = " AND personaid =".$idpersona;
		}
		$objTransaccion = array();
		$sql = "SELECT datospaypal FROM pedido WHERE idtransaccionpaypal = '{$idtransaccion}'".$busqueda;
		$requestData = $this->select($sql);
		if(!empty($requestData)){
			$objData = json_decode($requestData['datospaypal']);
			//$urlTransaccion = $objData->links[0]->href;
			$urlOrden = $objData->links[0]->href;
			$objTransaccion = CurlConnectionGet($urlOrden,"application/json",getTokenPaypal());
		}
		return $objTransaccion;
	}

	public function reembolsoPaypal(string $idtransaccion, string $observacion){
		$response = false;
		$sql = "SELECT idpedido,datospaypal FROM pedido WHERE idtransaccionpaypal = '{$idtransaccion}'";
		$requestData = $this->select($sql);
		if(!empty($requestData)){
			$objData = json_decode($requestData['datospaypal']);
			$urlReembolso = $objData->links[0]->href;
			$objTransaccion = CurlConnectionGet($urlReembolso,"application/json",getTokenPaypal());
			$urlReembolso2 = $objTransaccion->purchase_units[0]->payments->captures[0]->links[1]->href;
			$objTransaccion2 = CurlConnectionPost($urlReembolso2,"application/json",getTokenPaypal());
			if(isset($objTransaccion2->status) and $objTransaccion2->status == "COMPLETED"){
				$idpedido = $requestData['idpedido'];
				$idtransaccion = $objTransaccion2->id;
				$status = $objTransaccion2->status;
				$jsonData = json_encode($objTransaccion2);
				$observacion = $observacion;
				$query_insert = "INSERT INTO reembolso(pedidoid,
													idtransaccion,
													datosreembolso,
													observacion,
													status)
								VALUES (?,?,?,?,?)";
				$arrData = array($idpedido,
								$idtransaccion,
								$jsonData,
								$observacion,
								$status
							);
				$request_insert = $this->insert($query_insert,$arrData);
				if($request_insert > 0){
					$updatePedido = "UPDATE pedido SET status = ? WHERE idpedido = $idpedido";
					$arrPedido = array("Reembolsado");
					$request = $this->update($updatePedido,$arrPedido);
					$response = true;
				}
			}
			return $response;
		}
	}

	public function updatePedido(int $idpedido, string $estado, $transaccion = NULL, $idtipopago = NULL){
		error_reporting(0);
		if($transaccion == NULL){
			$query_insert  = "UPDATE pedido SET status = ?  WHERE idpedido = $idpedido ";
        	$arrData = array($estado);
		}else{
			$query_insert  = "UPDATE pedido SET referenciacobro = ?, tipopagoid = ?,status = ? WHERE idpedido = $idpedido";
        	$arrData = array($transaccion,
        					$idtipopago,
    						$estado
    					);
		}
		$request_insert = $this->update($query_insert,$arrData);
    	return $request_insert;
	}
}
?>