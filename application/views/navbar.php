<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home"><img class="logo-navbar" width="auto" height="30" alt="Marca" src="<?php echo base_url('assets/imagens/icone_sismo.png')?>"></a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right inicial">
				<li><a href="<?php echo base_url('sobre')?>">Sobre</a></li>
				<li><a href="<?php echo base_url('listar-monitorias')?>">Monitorias</a></li>
				<li><a href="<?php echo base_url('contato')?>">Contato</a></li>
				<li><a href="<?php echo base_url('cadastro')?>">Cadastro</a></li>
				<li><a href="<?php echo base_url('login')?>">Login</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
