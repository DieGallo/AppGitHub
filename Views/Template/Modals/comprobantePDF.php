<?php 
	$cliente = $data['cliente'];
	$orden = $data['orden'];
	$detalle = $data['detalle'];
 ?>
<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factura</title>
	<style>
		table{
			width: 100%;
		}
		table td, table th{
			font-size: 12px;
		}
		h4{
			margin-bottom: 0px;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		.wd33{
			width: 33.33%;
		}
		.tbl-cliente{
			border: 1px solid #CCC;
			border-radius: 10px;
			padding: 5px;
		}
		.wd10{
			width: 10%;
		}
		.wd15{
			width: 15%;
		}
		.wd40{
			width: 40%;
		}
		.wd55{
			width: 55%;
		}
		.tbl-detalle{
			border-collapse: collapse;
		}
		.tbl-detalle thead th{
			padding: 5px;
			background-color: #009688;
			color: #FFF;
		}
		.tbl-detalle tbody td{
			border-bottom: 1px solid #CCC;
			padding: 5px;
		}
		.tbl-detalle tfoot td{
			padding: 5px;
		}
	</style>
</head>
<body>
	<table class="tbl-hader">
		<tbody>
			<tr>
				<td class="wd33">
					<img src="<?= media() ?>/tienda/images/icons/logo-01.png" alt="Logo">
				</td>
				<td class="text-center wd33">
					<h4><strong><?= NOMBRE_EMPRESA ?></strong></h4>
					<p><?= DIRECCION ?> <br>
					Teléfono: <?= TELEMPRESA ?> <br>
					Email: <?= EMAIL_EMPRESA  ?></p>
				</td>
				<td class="text-right wd33">
					<p><strong>No. Orden</strong> <?= $orden['idpedido'] ?><br>
						<strong>Fecha:</strong> <?= $orden['fecha'] ?>  <br>
						<?php 
							if($orden['tipopagoid'] == 1){
						?>
						<strong>Método Pago:</strong> <?= $orden['tipopago'] ?> <br>
						<strong>Transacción:</strong> <?= $orden['idtransaccionpaypal'] ?>
						<?php }else{ ?>
						<strong>Método Pago:</strong> Pago contra entrega <br>
						<strong>Tipo Pago:</strong> <?= $orden['tipopago'] ?>
						<?php } ?>
					</p>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<table class="tbl-cliente">
		<tbody>
			<tr>
				<td class="wd10"><strong>NIT:</strong></td>
				<td class="wd40"><?= $cliente['nit'] ?></td>
				<td class="wd10"><strong>Teléfono:</strong></td>
				<td class="wd40"><?= $cliente['telefono'] ?></td>
			</tr>
			<tr>
				<td><strong>Nombre:</strong></td>
				<td><?= $cliente['nombres'].' '.$cliente['apellidos'] ?></td>
				<td><strong>Dirección:</strong></td>
				<td><?= $cliente['direccionfiscal'] ?></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table class="tbl-detalle">
		<thead>
			<tr>
				<th class="wd55">Descripción</th>
				<th class="wd15 text-right">Precio</th>
				<th class="wd15 text-center">Cantidad</th>
				<th class="wd15 text-right">Importe</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$subtotal = 0;
				foreach ($detalle as $producto) {
					$importe = $producto['precio'] * $producto['cantidad'];
					$subtotal = $subtotal + $importe;
			 ?>
			<tr>
				<td><?= $producto['producto'] ?></td>
				<td class="text-right"><?= '$ '.formatMoney($producto['precio']) ?></td>
				<td class="text-center"><?= $producto['cantidad'] ?></td>
				<td class="text-right"><?= '$ '.formatMoney($importe) ?></td>
			</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3" class="text-right"><strong>Subtotal:</strong></td>
				<td class="text-right"><?= '$ '.formatMoney($subtotal) ?></td>
			</tr>
			<tr>
				<td colspan="3" class="text-right"><strong>Envío:</strong></td>
				<td class="text-right"><?= '$ '.formatMoney($orden['costoenvio']) ?></td>
			</tr>
			<tr>
				<td colspan="3" class="text-right"><strong>Total:</strong></td>
				<td class="text-right"><?= '$ '.formatMoney($orden['monto']) ?></td>
			</tr>
		</tfoot>
	</table>
	<div class="text-center">
		<p>Si tienes preguntas sobre tu pedido, <br> pongase en contacto: <?= TELEMPRESA ?></p>
		<h4>¡Gracias por tu compra!</h4>
	</div>
</body>
</html>