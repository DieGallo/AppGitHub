<?php 
	
	//const BASE_URL = "https://tiendavirtualdiegolopez.store";
	const BASE_URL = "http://localhost:8080/tiendaprueba";

	//Zona horaria
	date_default_timezone_set('America/Mexico_City');

	/*Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "u966824512_db_tienda";
	const DB_USER = "u966824512_diegallo";
	const DB_PASSWORD = "Xdloldiego2001";
	const DB_CHARSET = "utf8"; */

	//Datos de conexion Localhost
	const DB_HOST = "localhost";
	const DB_NAME = "db_tienda";
	const DB_USER = "root";
	const DB_PASSWORD = "Xdloldiego2001";
	const DB_CHARSET = "utf8";

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "$";
	const CURRENCY = "MXN";

	// API PayPal
	// SANDBOX
	const URLPAYPAL = "https://api-m.sandbox.paypal.com";
	const IDCLIENTE = "ATBJ5oBrR3200RkBYVgNd1y3z6blFhtHkqTrnOAJzFdpz-OtagS5bpiCPgDRGzD86Vw9lqV5b0RJ0Grr";
	const SECRET = "EOrnwYjfX_W--57RLOgiNFNQHLhZYtt_CIw5-uodid3lwb8Gmyqg1eC0WREi-ZpSDRmseHxIpqklBhZ9";
	
	// LIVE
	//const IDCLIENTE = "AWWH0NSPojytBmV9nm009MIx9AAUtdWQbcHFjZQ2f9j1uNKaN8cxF3l_KspIypX6yCfqXDMmMxUUPOR0";
	//const URLPAYPAL = "https://api-m.paypal.com";
	//const SECRET = "EOSrEwgK6mG2RN_ecDXfmDHgCPkq72-RJCtyVT26hIQ3lQ0ssXYxf2QsIGHy5WttBgLlbEqMjCwgBBjJ";

	// Datos envio de correo
	const NOMBRE_REMITENTE = "Nombre Empresa";
	const EMAIL_REMITENTE = "no-reply@empresa.com";
	const NOMBRE_EMPRESA = "Nombre Empresa*";
	const WEB_EMPRESA = "www.nombreempresa.com";

	const DESCRIPCION = "Descripcion sobre tu tienda";

	// Datos empresa
	const DIRECCION = "Calle Venecia 932, Int 102, Guadalajara";
	const TELEMPRESA = "+(33) 1759 5659";
	const WHATSAPP = "+3317595659";
	const EMAIL_EMPRESA = "diego5julio2001@gmail.com";
	const EMAIL_PEDIDOS = "diego5julio2001@gmail.com";
	const EMAIL_SUSCRIPCION = "diego5julio2001@gmail.com";
	const EMAIL_CONTACTO = "diego5julio2001@gmail.com";

	const CAT_SLIDER = "1,2,3";
	const CAT_BANNER = "4,5,6";
	const CAT_FOOTER = "1,2,3,4,5";

	const KEY = 'diegallo';
	const METHODENCRIPT = "AES-128-ECB";

	// Envio de producto
	const COSTOENVIO = 0;

	// Modulos
	const MUSUARIOS = 2;
	const MPRODUCTOS = 4;
	const MCATEGORIAS = 6;
	const MPEDIDOS = 5;
	const MCLIENTES = 3;
	const MSUSCRIPTORES = 7;
	const MCONTACTO = 8;
	const MPAGINAS = 9;

	// Roles
	const RCLIENTES = 7;
	const RADM = 1;

	const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

	// Productos por pagina
	const CANTPRODUCTOS = 12;
	const PORPAGINA = 8;
	const PORCATEGORIA = 8;
	const BUSCADOR = 8;

	// Redes Sociales
	const FACEBOOK = "https://www.facebook.com";
	const INSTAGRAM = "https://www.instagram.com";
 ?>