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

	<title>SISMO | Nova Senha</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custon.css') ?>">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
	<?php $this->load->view('navbar');?>
	<div class="login-box">
		<div class="login-logo">
			<b>SISMO</b>
		</div>

		<div class="login-box-body">
			<p class="login-box-msg">Informe sua nova senha</p>

			<form id="formUpdate">
				<div class="form-group has-feedback">
					<input id="inputSenha" name="senha" type="password" class="form-control" placeholder="Nova senha">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input id="inputConfSenha" name="confSenha" type="password" class="form-control" placeholder="Confirmação">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<input id="inputId" name="id" class="hide" value="<?php echo $id; ?>">
				<div class="row">
					<div class="col-xs-8">
						<a href="<?php echo base_url()?>login">Fazer login</a>
					</div>
					<div class="col-xs-4">
						<button id="btn-update" class="btn btn-primary btn-block btn-flat">Atualizar</button>
					</div>
				</div>
			</form>

		</div> <!-- /.login-box-body -->
	</div> <!-- /.login-box -->

	<!-- REQUIRED JS SCRIPTS -->
	<script src="<?php echo base_url('assets/plugins/jquery-3.2.1/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/notify-3.1.5/notify.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/validate-1.17.0/validate.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/update.js') ?>"></script>
</body>
</html>