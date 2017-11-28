<div class="box"> <!-- Default Box -->
	<div class="box-header with-border"> <!-- Header Conteúdo Principal -->
		<center><h3 class="box-title">Seu Perfil de Usuário</h3></center>
	</div>

	<div class="box-body"> <!-- Body Conteúdo Principal -->
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="box box-primary">
					<div class="login-box-body">
						<p class="login-box-msg"><strong>Dados</strong></p>
						<form id="formAdmin" method="post">
							<div class="form-group has-feedback">
								<input id="inputNome" type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $this->session->nome;?>" disabled>
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input id="inputEmail" type="text" class="form-control" placeholder="E-mail" name="email" value="<?php echo $this->session->email;?>" disabled>
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<input id="inputTelefone" type="text" class="form-control" placeholder="Telefone" name="telefone" value="<?php echo $this->session->telefone;?>" disabled>
								<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
							</div>
							<div id="campoSenha" class="hide">
								<div class="form-group has-feedback">
									<input id="inputSenha" type="password" class="form-control" placeholder="Senha Atual" name="senha">
									<span class="glyphicon glyphicon-lock form-control-feedback"></span>
								</div>
								<h6 class="error"><b>Digite apenas se quiser trocar a senha</b></h6>
								<div class="form-group has-feedback">
									<input id="inputNovaSenha" type="password" class="form-control" placeholder="Nova Senha" name="novaSenha">
									<span class="glyphicon glyphicon-lock form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback">
									<input id='inputConfNovaSenha' type="password" class="form-control" placeholder="Confirme Sua Nova Senha" name="confNovaSenha">
									<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
								</div>
							</div>
							<div class="hide" id="btnsubmit">
								<button type="submit" class="btn waves-effect btn-primary btn-block btn-flat" id="btn-admin">Salvar Edições</button>
							</div>
						</form>
						<div id="btnshow">
							<button class="btn waves-effect btn-primary btn-block btn-flat" id="btn-editar">Editar</button>
						</div>
					</div>
				</div> <!-- /.login-box -->
			</div>
		</div>
	</div>
	<script type="text/javascript">

		$(document).ready( function() {

			$('#inputTelefone').inputmask({ alias: '(99) 99999-9999'});

			$('#btn-editar').click(function(){
				$('#btnsubmit,#campoSenha').removeClass('hide');
				$('#btnshow').addClass('hide');
				$('input').prop('disabled', false);
			});
				// validação dos campos e pedido ajax
			$( "#formAdmin" ).validate( {
				rules: {
					nome: {
						required: true,
					},
					email: {
						required: true,
						email: true
					},
					telefone: {
						required: true,
						phoneBR: true
					},
					senha:{
						required: true,
						minlength: 6
					},
					novaSenha:{
						minlength: 6
					},
					confNovaSenha:{
						equalTo: "#inputNovaSenha"
					},
				},
				messages: {
					nome: {
						required: 'Por favor, digite seu nome',
					},
					email: {
						required: 'Por favor, digite seu email',
					},
					telefone: {
						required: 'Por favor, digite seu telefone',
					},
					curso: {
						required: 'Por favor, escolha seu curso',
					},
					senha: {
						required: 'Por favor, digite sua senha',
					},
				},
				errorPlacement: function ( error, element ) {
					$(element).parents('.form-group').append(error);
				},
				highlight: function ( element, errorClass, validClass ) {
					$(element).parents('.form-group').addClass('has-error').removeClass('has-success');
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$(element).parents( '.form-group' ).addClass( 'has-success' ).removeClass( 'has-error' );
				},
				submitHandler: function (form) {
					$.ajax({
						url: 'User/editarPerfilChefe',
						method: 'post',
						data: $('#formAdmin').serialize(),

						success: function(data) {
							$('#inputSenha,#inputNovaSenha,#inputConfNovaSenha').val('');
							if (data.erro) {
								$.notify({
									message: "<center> "+data.msg+"</center>"
								},{
									type: 'danger',
									mouse_over: 'pause',
									placement: {
										from: "bottom",
										align: "left"
									},
									z_index: 9999,
								});
							}else if(data.dados == 'editado'){
								$.notify({
									message: "<center>Edição realizada com sucesso</center>"
								},{
									type: 'success',
									mouse_over: 'pause',
									placement: {
										from: "bottom",
										align: "left"
									},
									z_index: 9999,
								});
							}
						},
						beforeSend: function(){
							$('#btn-admin').prop("disabled",true);
							$("#btn-admin").html("<img src='<?php echo base_url("assets/imagens/loading.svg") ?>'> Espere")
						},
						complete: function(){
							$('#btn-admin').prop("disabled",false);
							$('#btn-admin').html("Salvar Edições");
						},
						erro: function(){
							$('#btn-admin').prop("disabled",false);
							$("#btn-admin").html("Salvar Edições");
							$.notify({
								message: "<center>Ocorreu um erro interno</center>"
							},{
								type: 'success',
								mouse_over: 'pause',
								placement: {
									from: "bottom",
									align: "left"
								},
								z_index: 9999,
							});
						},
					}); // Fim do Ajax
					return false;
				},
			}); // Fim da Validação
		});
	</script>
</div> <!-- Fim Default Box -->
