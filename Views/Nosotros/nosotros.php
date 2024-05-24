<?php
  headerTienda($data);
  //$banner = media()."/tienda/images/bg-01.jpg";
  $banner = $data['page']['portada'];
  $idpagina = $data['page']['idpost'];
?>	

<script>
	document.querySelector('header').classList.add('header-v4');
</script>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?= $banner; ?>);">
	<h2 class="ltext-105 cl0 txt-center">
		<?= $data['page']['titulo'] ?>
	</h2>
</section>

<!-- Content page -->
<?php

	if(viewPage($idpagina)){
		echo $data['page']['contenido'];
	}else{
?>

<!-- VISTA EN CONSTRUCCION PARA EL CLIENTE -->
<div>
	<div class="container-fluid py-5 txt-center">
		<img src="<?= media() ?>/images/uploads/construction.png" alt="Foto construccion">
		<h3>Estamos trabajando para usted.</h3>
	</div>
</div>


<?php
	}
  footerTienda($data);
?>		