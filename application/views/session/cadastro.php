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
	<div class="register-box">
		<div class="shadow-group">
		<div class="register-logo">
			<a><b>CADASTRO SISMO</b></a>
		</div>
		<div class="register-box-body">
			<form id="formCadastro">
				<div class="box-header">
				<div class = "text-center">
					<h5 class="box-title">Dados Cadastrais</h5>
				</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group has-feedback">
							<input id='inputNome' name="nome" type="text" class="form-control" placeholder="Nome completo">
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group has-feedback">
							<input id='inputMatricula' type="text" name="matricula" class="form-control" placeholder="Matrícula">
							<span class="fa fa-graduation-cap form-control-feedback"></span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group has-feedback">
							<input id='inputTelefone' type="text" name="telefone" class="form-control" placeholder="Telefone">
							<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group has-feedback">
							<input id='inputEmail' type="text" name="email" class="form-control" placeholder="Email">
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group has-feedback">
							<select class="form-control" id='inputCurso' name="curso">
								<option value="" selected >Curso</option>
								<?php
									$this->db->select( 'denominacao, modalidade, turno, codigo' );
									$query = $this->db->get('cursos');
									foreach ($query->result() as $row) {
										echo "<option value='$row->codigo'>$row->denominacao - $row->modalidade ($row->turno)</option>";
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="box-header">
				<div class="text-center">
					<h5 class="box-title">Registro de Senha</h5>
				</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group has-feedback">
							<input id='inputSenha' name="senha" type="password" class="form-control" placeholder="Digite sua senha">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group has-feedback">
							<input id='inputConfSenha' name="confSenha" type="password" class="form-control" placeholder="Confirme sua senha">
							<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-4 col-xs-offset-4">
						<button type="submit" class="btn waves-effect btn-orange btn-block btn-flat" id="btn-cadastro">Registre-se</button>
					</div>
				</div>
			</form>
			<div class="social-auth-links text-center">
				<p>- OU -</p>
			</div>
			<a href="login">Eu já tenho uma conta!</a>
			<a href="contato" class="pull-right">Relatar um problema</a>
		</div> <!-- /.form-box -->
		</div>
	</div> <!-- /.register-box -->

	<!-- REQUIRED JS SCRIPTS -->
	<script>var url_base = '<?php echo base_url(); ?>';function base_url(arg = '') {return url_base + arg;}</script>
	<script src="<?php echo base_url('assets/plugins/jquery-3.2.1/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/inputmask-4.0.1-25/imputmask.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/notify-3.1.5/notify.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/validate-1.17.0/validate.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/cadastro.js') ?>"></script>
</body>
</html>