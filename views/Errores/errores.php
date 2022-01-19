
<!DOCTYPE html>
<html>
	
	<head>
		<title>Errores</title>
		<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
		<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select-main.css">
		<link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<header class="app-header"><a class="app-header__logo" href="<?= base_url(); ?>/dashboard">SISO</a>
		<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
		<!-- Navbar Right Menu-->
		<ul class="app-nav">
			<!-- User Menu-->
			<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-shopping-cart"></i></a>
			<a href="#" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver carrito de compras"></a>
			</li>
			<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
			<ul class="dropdown-menu settings-menu dropdown-menu-right">
				<li><a class="dropdown-item" href="<?= base_url(); ?>/opciones"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
				<li><a class="dropdown-item" href="<?= base_url(); ?>/perfil"><i class="fa fa-user fa-lg"></i> Profile</a></li>
				<li><a class="dropdown-item" href="<?= base_url(); ?>/lagout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
			</ul>
			</li>
		</ul> 
		</header>
		<br/>
		<br/>
		<br/>
		<main class="lead">
			<div>
				<div  class="alert alert-danger" role="alert" style="text-align: center;">
				<h1>Pagina no encontrada 404</h1>
				</div>
					<div class="content" style="text-align: center;" >
						<a href="<?= base_url(); ?>/Dashboard"><img src="Public/Imagenes/siso.png" width="300" height="150"></a>
					</div>
			</div>
		</main>
	</body>
</html>



