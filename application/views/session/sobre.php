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

	<title>SISMO | Sobre</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custon.css') ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition login-page">
	<?php $this->load->view('navbar');?>
	<header class="masthead container">
		<div class="sobre ">
			<div class="header-content-inner">
				<h1>
					<img width="300" height="10" alt="Sismo" src="<?php echo base_url('assets/imagens/logo.png')?>">
				</h1>
				<hr>
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<p class="paragrafo">O projeto SisMo foi idealizado visando a integração de alunos, professores e funcionários da Universidade a um ambiente virtual conciso e prático, capaz de cobrir necessidades diárias que hoje em dia são, muitas vezes, postas de lado.</p>
						<p class="paragrafo">Com o SisMo, a interação entre alunos e responsáveis dos departamentos se torna muito mais eficiente, tendo em vista a quantidade de tempo e recursos humanos que podem ser poupados ao se utilizar uma ferramenta integrada virtualmente.</p> 
						<p class="paragrafo">É de conhecimento geral que em cada início de semestre, as secretarias de seus respectivos departamentos ficam saturadas de alunos interessados em diversos motivos. Ao se remover a necessidade de efetivar uma monitoria presencialmente, reduz-se o estresse geral causado em todas as partes envolvidas, além de promover um menor tempo de espera para todas as outras áreas envolvidas no processo conhecido que ocorre semestralmente na UnB.</p>
					</div>
				</div>
			</div>
		</div>
	</header>


	<!-- REQUIRED JS SCRIPTS -->
	<script src="<?php echo base_url('assets/plugins/jquery-3.2.1/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>
</body>
</html>