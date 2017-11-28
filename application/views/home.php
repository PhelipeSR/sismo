<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="icon" href="<?php echo base_url('assets/imagens/favicon.png') ?>" type="image/x-icon">

	<title>SISMO | Home</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custon.css') ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition login-page">
	<?php $this->load->view('navbar');?>

	<header class="masthead container">
		<div class="header-content">
			<div class="header-content-inner">
				<h1>
					<img width="300" height="90" alt="Sismo" src="<?php echo base_url('assets/imagens/logo.png')?>">
				</h1>
				<hr>
				<p>Bem-vindo ao Sistema Integrado de Monitoria.
				<br>
				Uma plataforma para você, estudante, que quer se candidatar para ser monitor de alguma disciplina ou quer se juntar a um grupo de estudos.
				</p>
			</div>
		</div>
	</header>

	<!-- REQUIRED JS SCRIPTS -->
	<script src="<?php echo base_url('assets/plugins/jquery-3.2.1/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>
</body>
</html>