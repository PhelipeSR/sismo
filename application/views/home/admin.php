<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin | SISMO</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="icon" href="<?php echo base_url('assets/imagens/favicon.png') ?>" type="image/x-icon">

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custon.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-1.10.15/datatables.css') ?>">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header"> <!-- Main Header -->

			<a href="home" class="logo"> <!-- Logo -->
			<span class="logo-mini"><img class="logo-navbar-home" width="auto" height="30" alt="Marca" src="<?php echo base_url('assets/imagens/icone_sismo.png')?>"></span>
			<span class="logo-lg"><img class="logo-navbar" width="auto" height="30" alt="Marca" src="<?php echo base_url('assets/imagens/icone_sismo.png')?>"></span>
			</a>

			<nav class="navbar navbar-static-top" role="navigation">

				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu"> <!-- Navbar Right Menu -->
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu"> <!-- Menu de conta do usuário -->
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img class="iconUser" src="<?php echo base_url('assets/imagens/iconUser.svg')?>;"><span>Administrador</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
										<a href="<?php echo base_url('Authentication/logout');?>" class="btn btn-orange btn-flat btn-block">Sair</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<aside class="main-sidebar"> <!-- Coluna da esquerda -->

			<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">PAINEL ADMINISTRATIVO</li>

					<li class="treeview">
						<a href="#"><i class="fa fa-user"></i> <span>Usuários</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a id="listarUser"        href="#"><i class="fa fa-circle-o"></i>Usuários Comuns</a></li>
							<li><a id="listarChefe"       href="#"><i class="fa fa-circle-o"></i>Chefes de Departamento</a></li>
							<li><a id="listarFuncionario" href="#"><i class="fa fa-circle-o"></i>Funcionários</a></li>
						</ul>
					</li>
					<li><a id="listarCursos"        href="#"><i class="fa fa-graduation-cap"></i><span>Cursos</span></a></li>
					<li><a id="listarDepartamentos" href="#"><i class="fa fa-paint-brush   "></i><span>Departamento</span></a></li>
					<li><a id="listarMaterias"      href="#"><i class="fa fa-pencil        "></i><span>Matérias</span></a></li>
					<li><a id="listarMonitorias"    href="#"><i class="fa fa-handshake-o   "></i><span> Monitorias</span></a></li>
					<li><a id="listarCanditaturas"  href="#"><i class="fa fa-check         "></i><span> Canditaturas</span></a></li>
					<li><a id="listarGrupos"        href="#"><i class="fa fa-user-plus     "></i><span> Grupos de Estudo</span></a></li>
				</ul>
			</section> <!-- /.sidebar -->
		</aside>

		<div class="content-wrapper">

			<section class="content container-fluid">
				<div id="loading"></div>
				<div id="ajax-content">
<!-- ****************************************************************************************************** -->
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Número de<br>Usuários</span>
								<span class="info-box-number">
									<?php
										$this->db->where('privilegio', '0');
										echo $this->db->count_all_results('usuario');
									?>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-red"><i class="fa fa-hand-o-right "></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Número de<br>Chefes de<br>Departamento</span>
								<span class="info-box-number">
									<?php
										$this->db->where('privilegio', '2');
										echo $this->db->count_all_results('usuario');
									?>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Número de<br>Funcionários</span>
								<span class="info-box-number">
									<?php
										$this->db->where('privilegio', '1');
										echo $this->db->count_all_results('usuario');
									?>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-yellow"><i class="fa fa-graduation-cap"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Número de<br>Cursos</span>
								<span class="info-box-number"><?php echo $this->db->count_all('cursos');?></span>
							</div>
						</div>
					</div>
				</div> <!-- row -->
				<div class="callout callout-info">
					<h4>INFORMAÇÕES SOBRE O SISTEMA</h4>

					<p>F.</p>
					<p>F.</p>
					<p>F.</p>
					<p>F.</p>
					<p>F.</p>
					<p>F.</p>
					<p>F.</p>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-paint-brush"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Número de<br>Departamentos</span>
								<span class="info-box-number"><?php echo $this->db->count_all('departamento');?></span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-red"><i class="fa fa-pencil"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Número de<br>Matérias</span>
								<span class="info-box-number"><?php echo $this->db->count_all('materia');?></span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-green"><i class="fa fa-handshake-o"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Número de<br>Monitorias</span>
								<span class="info-box-number"><?php echo $this->db->count_all('monitorias');?></span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-yellow"><i class="fa fa-check"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Número de<br>Candidatos</span>
								<span class="info-box-number"><?php echo $this->db->count_all('candidatar');?></span>
							</div>
						</div>
					</div>
				</div> <!-- row -->
<!-- ****************************************************************************************************** -->
				</div>
			</section>
		</div>

		<footer class="main-footer"> <!-- Footer da Página -->
			<div class="pull-right hidden-xs">
				<b>Versão</b> 1.0.0
			</div>
			<strong>Copyright &copy; 2017 <a target='_blank' href="http://engnetconsultoria.com.br/">Estudantes 3º Semestre Redes</a>.</strong> Todos os direitos reservados.
		</footer> <!-- FIm Footer da Página -->

	</div> <!-- ./wrapper -->

	<!-- REQUIRED JS SCRIPTS -->
	<script src="<?php echo base_url('assets/plugins/jquery-3.2.1/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/adminlte.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatables-1.10.15/datatables.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/inputmask-4.0.1-25/imputmask.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/validate-1.17.0/validate.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/notify-3.1.5/notify.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/carregaMenu.js') ?>"></script>

</body>
</html>