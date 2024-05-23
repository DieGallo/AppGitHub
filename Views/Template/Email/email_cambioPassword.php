<!DOCTYPE html>
<html lang="en">
	<html>
	<head>
		<style>
		body { font-family: Arial, sans-serif; background-color:  #ffffff; color: #fff; }
		.container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #1a1b15; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
		.header { background-color: #007bff; color: #fff; text-align: center; padding: 20px 0; border-top-left-radius: 10px; border-top-right-radius: 10px; }
		.content { padding: 30px; }
		.button { display: inline-block; background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; transition: background-color 0.3s; text-align: center; }
		.button:hover { background-color: #0056b3; }
		.privacy { font-size: 12px; text-align: center; margin-top: 20px; }
		</style>
	</head>
	<body>
		<div class='container'>
		<div class='header'>
		<h2><?= NOMBRE_EMPRESA ?></h2>
		</div>
		<div class='content'>
		<p>Estimado/a <?= $data['nombreUsuario']; ?>,</p>
		<p>Hemos recibido una solicitud de tu correo: <?= $data['email'];?> para reestablecer tu contraseña. Si no has solicitado esto, por favor ignora este mensaje.</p>
		<p>Por favor, sigue el siguiente enlace para crear una nueva contraseña:</p>
		<p style='text-align: center;'><a href='<?= $data['url_recovery']; ?>' class='button'>Reestablecer Contraseña</a></p>
		<div class='privacy'>Tu privacidad es importante para nosotros. Para más información, consulta nuestro <a href='<?= WEB_EMPRESA; ?>'>Tienda Virtual</a>.</div>
		</div>
		</div>
	</body>
	</html>
</html>