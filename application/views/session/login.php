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

	<title>SISMO | Login</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custon.css') ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition login-page">
	<?php $this->load->view('navbar');?>
	<div class="login-box">
		<div class="shadow-group">
		<div class="login-logo">
			<b>LOGIN SISMO</b>
		</div>

		<div class="login-box-body">
			<p class="login-box-msg">Faça login para iniciar sua sessão</p>

			<form id="formLogin">
				<div class="form-group has-feedback">
					<input id="inputEmail" name="email" type="text" class="form-control" placeholder="Email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input id="inputSenha" name="senha" type="password" class="form-control" placeholder="Senha">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-4 col-xs-offset-4">
						<button id="btn-login" type="submit" class="btn btn-orange btn-block btn-flat">Entrar</button>
					</div>
				</div>
			</form>

			<div class="social-auth-links text-center">
				<p>- OU -</p>
			</div>
			<a href="cadastro">Fazer cadastro</a>
			<a href="recuperacaoSenha" class="pull-right">Esqueceu sua senha?</a>

		</div> <!-- /.login-box-body -->
		</div>
	</div> <!-- /.login-box -->

	<!-- REQUIRED JS SCRIPTS -->
	<script src="<?php echo base_url('assets/plugins/jquery-3.2.1/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/inputmask-4.0.1-25/imputmask.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/notify-3.1.5/notify.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/validate-1.17.0/validate.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/login.js') ?>"></script>
</body>
</html>