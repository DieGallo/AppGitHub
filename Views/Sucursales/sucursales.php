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

<!--<section class="py-5 txt-center">
	<div class="container">
		<p>Visitanos y obten los mejores precios del mercado, cualquier articulo que necesitas para vivir mejor.</p>
	</div>
	<a href="" class="btn btn-info">VER PRODUCTOS</a>
</section>

<div class="py-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mb-4 box-shadow">
					<img src="<?= media() ?>/images/uploads/s1.jpg" alt="Sucursal 1">
					<div class="card-body">
						<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed velit similique nam, cum neque ad aspernatur cupiditate veritatis error fugit ab ex iste tenetur numquam ipsam incidunt eius dicta atque!</p>
						<p>Dirección: Col. Americana, Av. Las Americas <br>
							Teléfono: 3317595659 <br>
							Correo: diego5julio2001@gmail.com
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card mb-4 box-shadow">
					<img src="<?= media() ?>/images/uploads/s2.jpg" alt="Sucursal 1">
					<div class="card-body">
						<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed velit similique nam, cum neque ad aspernatur cupiditate veritatis error fugit ab ex iste tenetur numquam ipsam incidunt eius dicta atque!</p>
						<p>Dirección: Col. Americana, Av. Las Americas <br>
							Teléfono: 3317595659 <br>
							Correo: diego5julio2001@gmail.com
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card mb-4 box-shadow">
					<img src="<?= media() ?>/images/uploads/s3.jpg" alt="Sucursal 1">
					<div class="card-body">
						<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed velit similique nam, cum neque ad aspernatur cupiditate veritatis error fugit ab ex iste tenetur numquam ipsam incidunt eius dicta atque!</p>
						<p>Dirección: Col. Americana, Av. Las Americas <br>
							Teléfono: 3317595659 <br>
							Correo: diego5julio2001@gmail.com
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>-->

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