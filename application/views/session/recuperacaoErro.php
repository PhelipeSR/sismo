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

	<title>SISMO | Erro de Recuperação de Senha</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custon.css') ?>">

</head>

<body class="hold-transition login-page">
	<?php $this->load->view('navbar');?>
	<div class="login-box login-box-tamanho">
		<div class="login-logo">
			<b>SISMO</b>
		</div>

		<div class="login-box-body">
			<h3><i class="fa fa-warning text-yellow"></i> Erro de Recuperação de Senha</h3>

			<p>Não é possível alterar a senha<br/>Dados incompletos ou corrompidos. Tente mandar um novo email de
				<a href="<?php echo base_url()?>recuperacaoSenha">recuperação.</a>
			</p>
		</div> <!-- /.login-box-body -->
	</div> <!-- /.login-box -->

	<!-- REQUIRED JS SCRIPTS -->
	<script src="<?php echo base_url('assets/plugins/jquery-3.2.1/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>
</body>
</html>