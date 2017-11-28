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
			<a><b>LISTAR MONITORIAS</b></a>
		</div>
		<div class="register-box-body">
			<form id="listar">
				<div class="box-header">
				<div class="text-center">
					<h5 class="box-title">Selecione o departamento</h5>
				</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group has-feedback">
							<select class="form-control" id='inputDepartamento' name="departamento">
								<option value="" selected >Departamento</option>
								<?php
									$this->db->select( '*' );
									foreach ($this->db->get('departamento')->result() as $row) {
										echo "<option value='$row->id'>$row->nome</option>";
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<div id="materia" class="hide">
					<div class="box-header">
						<h5 class="box-title">Selecione a matéria</h5>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-feedback">
								<select class="form-control" id='inputMateria' name="materia">
									<option selected >Matérias</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div id="monitorias" class="hide">
					<div class="box-header">
						<h5 class="box-title">Selecione a matéria</h5>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-feedback">
								<select class="form-control" id='inputMonitorias' name="monitorias">
									<option selected >Turmas</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div id="monitores" class="hide">
					<div class="box-header">
						<h5 class="box-title">Lista de monitores</h5>
					</div>
					<table class="table table-hover table-condensed table-bordered">
						<thead>
							<tr><th>Nome</th><th>Email</th></tr>
						</thead>

						<tbody id="valores">
						</tbody>
					</table>
				</div>
				<div id="invalido" class="error"></div>
			</form>

		</div> <!-- /.form-box -->
		</div>
	</div> <!-- /.register-box -->

	<!-- REQUIRED JS SCRIPTS -->
	<script src="<?php echo base_url('assets/plugins/jquery-3.2.1/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/notify-3.1.5/notify.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/listarMonitorias.js') ?>"></script>
</body>
</html>