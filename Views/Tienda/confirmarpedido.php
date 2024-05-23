<?php
  headerTienda($data);
?>	
<br><br><br>
<div class="jumbotron text-center">
  <h1 class="display-4">¡Gracias por tu compra!</h1>
  <p class="lead">Tu pedido fue agendado con éxito.</p>
  <p>No. Orden: <strong><?= $data['orden']; ?></strong></p>
  <?php 
    if(!empty($data['transaccion'])){
  ?>
  <p>Transacción: <strong> <?= $data['transaccion']; ?></strong></p>
  <?php } ?>

  <hr class="my-4">
  <p>Un asesor se comunicará con usted para coordinar la entrega de su pedido.</p>
  <p>Puedes ver el estado de tu pedido en la sección de "Pedidos" en tu usuario.</p>
  <br>
  <a class="btn btn-primary btn-lg" href="<?= base_url(); ?>" role="button">Seguir comprando</a>
</div>

<?php
  footerTienda($data);
?>