<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>EMMSA S.A. | www.emmsapotosi.com</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<link rel="stylesheet" href="<?php echo URL;?>public/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/_all-skins.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/sweetalert.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-datetimepicker.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>public/css/admin.css">

		<script src="<?php echo URL;?>public/js/jQuery-2.1.4.min.js"></script>

		<script src="<?php echo URL;?>public/js/moment.min.js"></script>
		<script src="<?php echo URL;?>public/js/app.min.js"></script>
		<script src="<?php echo URL;?>public/js/bootstrap-datetimepicker.js"></script>
		<script src="<?php echo URL;?>public/js/bootstrap-select.min.js"></script>
		<script src="<?php echo URL;?>public/js/es.js"></script>
		<script src="<?php echo URL;?>public/js/sweetalert.min.js"></script>
		<script src="<?php echo URL;?>public/js/Chart.bundle.min.js"></script>
		<script src="<?php echo URL;?>public/js/bootstrap.min.js"></script>
		<script src="<?php echo URL;?>public/js/admin.js"></script>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header" style="position:fixed;width:100%">
				<!-- Logo -->
				<a href="" class="logo" style="background-color: #9d92af;">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini">
						<img src="<?php echo URL;?>public/images/icons/32/005-man.png" alt="">

					</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg">
						<div class="col-md-2" style="padding:0">
							<img src="<?php echo URL;?>public/images/icons/32/005-man.png" alt="">
						</div>
						<?php $session=Session::getSession('User');?>
						<div class="col-md-10" style="padding-left:5px;paddding-right:0px">
							<h6 style="margin-top:12px;margin-bottom:0;color:#cab9d4"><?php echo $session['nombre']." ".$session['apellido'];?></h6>
							<h5 style="margin-top:0px;font-weight:700"><?php echo $session['tipo'] == 1? "USUARIO" : "ADMINISTRADOR";?></h5>
						</div>
					</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation" style="background-color: #ffffff;">
					<!-- Sidebar toggle button-->
					<div class="col-md-12">
						<div class="col-md-1 col-sm-2 col-xs-2" style="padding:0">
							<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="font-size:1.5em;padding-top:10px;padding-bottom:10px">
								<span class="sr-only"></span>
							</a>
						</div>
						<div class="col-md-6 hidden-sm hidden-xs" style="padding:0">
							<div style="float:left">
								<h3 style="color:#a68db9;margin-bottom:0;margin-top:13px;margin-left:20px;font-weight:600">EMPRESA MINERA MANQUÍRI SA</h3>
							</div>
						</div>
						<div class="col-md-5 col-sm-10 col-xs-10" style="padding:0" >
							<div class="col-md-9 col-sm-9 col-xs-9" style="padding:0">
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-search" id="basic-addon1" style="font-size: 1.9em;margin-top:8px;padding-left:5px;color:#ffebb0;background-color: transparent !important;border:none !important;"></span>
									<input type="text"  tabindex="0" class="form-control" role="button" style="font-family:Arial, FontAwesome;" id="inputsearch" aria-describedby="inputSuccess2Status" placeholder="Buscar...">
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3" style="padding:0">
								<input type="button" value="BUSCAR" id="btnsearch">
							</div>
							<div class="list-group col-md-8 col-sm-8 col-xs-8" style="position:absolute;top:46px;left:55px;max-height:400px;overflow-y: auto;padding-right: 0px" id="searchprincipal">

							</div>
						</div>
					</div>
				</nav>
			</header>
			<!-- columna izquierda. contenidos y  logos -->
			<aside class="main-sidebar" style="background-color: #1a161d;">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar" style="position:fixed;width:230px">
					<!-- Sidebar user panel -->
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header" style="padding-top:0;padding-bottom:0"></li>
						<li>
							<a href="/Principal">
								<i class="fa fa-home"></i> <span>Inicio</span>
							</a>
						</li>
						<li>
							<a href="/Caja" style="cursor:pointer">
								<i class="fa fa-archive"></i> <span>Cajas Potosí</span>
								<small class="pull-right glyphicon glyphicon-map-marker" style="color:#31a5d0"></small>
							</a>
						</li>
						<li>
							<a href="/Caja/lapaz" style="cursor:pointer">
								<i class="fa fa-th-large"></i> <span>Cajas La Paz</span>
							</a>
						</li>
						<li>
							<a href="/Personal" style="cursor:pointer">
								<i class="fa fa-users"></i> <span>Personal Potosí</span>
								<small class="pull-right glyphicon glyphicon-map-marker" style="color:#31a5d0"></small>
							</a>
						</li>
						<li>
							<a href="/Personal/lapaz" style="cursor:pointer">
								<i class="fa fa-group"></i> <span>Personal La Paz</span>
							</a>
						</li>
						<li>
							<a href="/Usuario" style="cursor:pointer">
								<i class="fa fa-user"></i> <span>Usuarios</span>
								<small class="pull-right glyphicon glyphicon-ok" style="color:#5ac65b"></small>
							</a>
						</li>
						<li>
							<a href="/Usuario/destroySession" style="cursor:pointer">
								<i class="fa fa-sign-out"></i> <span>Salir</span>
							</a>
						</li>
					</ul>
				</section>
			</aside>
			<!--Contenido-->
			<div class="content-wrapper" id="contenedor" style="margin-top:50px">
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="box">
								<!-- /.box-header -->
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<!--Contenido-->
