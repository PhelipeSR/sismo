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

	<title>SISMO | Página Não Encontrada</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custon.css') ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>


<body class="hold-transition login-page">
	<?php $this->load->view('navbar');?>
	<div class="register-box">
		<div class="shadow-group">
		<div class="register-logo">
			<a><b>ERRO 404</b></a>
		</div>
		<div class="register-box-body">
			<p>Não conseguimos encontrar a página que você está procurando.</p>
			<p>Enquanto isso, você pode <a href="<?php echo base_url('home')?>">retornar a página inicial</a></p>
		</div> <!-- /.form-box -->
		</div>
	</div> <!-- /.register-box -->

	<!-- REQUIRED JS SCRIPTS -->
	<script src="<?php echo base_url('assets/plugins/jquery-3.2.1/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>
</body>
</html>