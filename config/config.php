<?php
 require_once("Config/Config.php");
 
 const BASE_URL ="http://localhost/Proyectos/SISO/";

 date_default_timezone_set('America/Bogota');
 
 const DB_HOST = "localhost";
 const DB_NAME = "SISO";
 const DB_USER = "root";
 const DB_PASSWORD = "";
 const DB_CHARSET = "utf8";

 //Para envío de correo
const ENVIRONMENT = 1; // Local: 0, Produccón: 1;

 const SPD = ".";
 const SPM = ",";
 const SMONEY = "$";
 const CURRENCY = "USD";

 //paypal pruebas hay que comentar estas lineas
 const URLPAYPAL = "https://api-m.sandbox.paypal.com/";
 const IDCLIENTE = "AQ9KaFiNiIkdFN7_k_bfFi641QbFYIfnEuFyjQrtJ2qJJb0XWxVyxQ4SvtGBnnRNGRXoqNgb2sCXAtpF";
 const SECRET = "EGIEn2rsj9qvUflqxgLV4nVqGIIlVXrWt4KYt4DBUD9l63BuPBthd-lZxiokDjJQo_d_7F_y9_XfFDCO";

 //paypal producción
 //const IDCLIENTE= "Abz1N2rxQgncLiAayTDCG4gOQVpbBxQwWCboqqb-hLPe6nSha2N66zBnkyv4Qg0yuZ7ZUz-5U3nMYb6j";
 //const URLPAYPAL = "https://api-m.paypal.com";
 //const SECRET = "EIk2jqgFPlI54cJ9FbBshSEmTWFx7JjX9JSM2uqILEW3jQujfqyqqqxwRWhdBHY01avt-re0rWIxyyej";

 const WHATSAPP ="";

 const NOMBRE_REMITENTE = "SISO";
 const EMAIL_REMITENTE ="no-reply@siso.com";
 const NOMBRE_EMPRESA = "SISO";
 const WEB_EMPRESA = "www.siso.com";
 const DESCRIPCION = "La mejor tienda en línea con artículos de calidad y buenos precios";

 const DIRECCION = "Carrera 77  # 36-A-76 Bogotá";
 const TELEMPRESA = "(57)+3214241953";
 const EMAIL_EMPRESA = "harold_uruena@yahoo.com";
 const EMAIL_PEDIDOS = "harold_uruena@yahoo.com";
 const EMAIL_SUSCRIPCION = "harold_uruena@yahoo.com";
 const EMAIL_CONTACTO = "harold_uruena@yahoo.com";

const CAT_SLIDER = "5,6,12";
const CAT_BANNER = "12,5,6";
const CAT_FOOTER = "1,2,4,5";

const KEY ='HRD';
const METHODENCRIPT ="AES-128-ECB";
const COSTOENVIO = 2500;

//roles
const RADMINISTRADOR = 3;
const RCLIENTES = 6;

// MODULOS
const MCATEGORIAS = 1;
const MDASHBOARD = 2;
const MPROVEEDORES = 3;
const MUSUARIOS = 4;
const MMODULOS = 5;
const MCONFIGURACION = 6;
const MROLES = 7;
const MCLIENTES = 8;
const MPRODUCTOS = 9;
const MCOMERCIAL = 10;
const MVENTAS = 11;

const MPEDIDOS = 12;
const MFACTURAS = 14;
const MMONITOR =15;
const MSUSCRIPTOR =16;
const MCONTACTOS = 17;
const MPAGINAS = 18;


//paginas
const PPREGUNTAS = 3;
const PTERMINOS =4;
const PSUCURSALES = 5;
const PINICIO = 6;
const PERROR = 7;

const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

//Productos por página
	const CANTPORDHOME = 8;
	const PROPORPAGINA = 8;
	const PROCATEGORIA = 4;
	

	const PROBUSCAR =2;

?>