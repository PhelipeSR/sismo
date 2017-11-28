<div class="box"> <!-- Default Box -->
	<div class="box-header with-border"> <!-- Header Conteúdo Principal -->
		<center><h3 class="box-title">Adicionar Grupos</h3></center>
	</div>

	<div class="box-body"> <!-- Body Conteúdo Principal -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form id="formAdicionar">
					<div class="box-header">
						<h5 class="box-title">Dados do Grupo</h5>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-feedback">
								<input id='inputNome' name="nome" type="text" class="form-control" placeholder="Nome do Grupo de Estudos">
								<span class="fa fa-user-plus form-control-feedback"></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-7">
							<div class="form-group has-feedback">
								<input id='inputHorario' type="text" name="horario" class="form-control" placeholder="Horário e Dia do Grupo">
								<span class="fa fa-graduation-cap form-control-feedback"></span>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group has-feedback">
								<input id='inputQuantidade' type="text" name="quantidade" class="form-control" placeholder="Quantidade de Pessoas">
								<span class="fa fa-check form-control-feedback"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-feedback">
								<textarea id="inputDescricao" name="descricao" rows="5" placeholder="Descrição do Grupo"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-feedback">
								<select class="form-control" id='inputMateria' name="materia">
									<option value="" selected >Matéria</option>
									<?php
										$this->db->select( '*' );
										$query = $this->db->get('materia');
										foreach ($query->result() as $row) {
											echo "<option value='$row->codigo'>$row->nome</option>";
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<input name="user_id" class="hide" id="inputUser_id">
					<div class="modal-footer">
						<button class="btn btn-primary btn-flat" id="btn-adicionar">Adicionar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {

			$('#inputMatricula').inputmask({ alias: '99/9999999'});
			$('#formAdicionar').validate({
				rules: {
					nome: {
						required: true,
					},
					horario: {
						required: true,
					},
					quantidade: {
						required: true,
						number: true
					},
					descricao: {
						required: true,
					},
					matricula: {
						required: true,
					},
					user_id:{
						required: true,
					},
					materia: {
						required: true,
					}
				},
				messages: {
					nome: {
						required: 'Por favor, digite o nome do grupo',
					},
					horario: {
						required: 'Por favor, informe o horário do grupo',
					},
					quantidade: {
						required: 'Por favor, digite a quantidade de pessoas',
					},
					descricao: {
						required: 'Por favor, descreva o grupo',
					},
					matricula: {
						required: 'Por favor, informe a matrícula',
					},
					user_id: {
						required: 'Por favor, escolha um usuário válido',
					},
					materia: {
						required: 'Por favor, escolha a matéria',
					},
				},
				errorPlacement: function ( error, element ) {
					$(element).parents('.form-group').append(error);
				},
				highlight: function ( element, errorClass, validClass ) {
					$(element).parents('.form-group').addClass('has-error').removeClass('has-success');
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$(element).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				},
				submitHandler: function (form) {

					$.ajax({
						url: 'Grupo/adicionarUser',
						method: 'post',
						data: $('#formAdicionar').serialize(),
						success: function(retorno){
							if (retorno.erro) {
								$.notify({
									message: "<center>"+retorno.msg+"</center>"
								},{
									type: 'danger',
									mouse_over: 'pause',
									placement: {
										from: "bottom",
										align: "left"
									},
									z_index: 9999,
								});
							}else{
								$('#formAdicionar')[0].reset();
								$.notify({
									message: "<center>Adição de grupo realizada com sucesso!</center>"
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
							$('#btn-adicionar').prop("disabled",true);
							$("#btn-adicionar").html("<img src='<?php echo base_url("assets/imagens/loading.svg") ?>'> Espere")
						},
						complete: function(){
							$('#btn-adicionar').prop("disabled",false);
							$("#btn-adicionar").html("Adicionar");
						},
						erro: function(){
							$('#btn-adicionar').prop("disabled",false);
							$("#btn-adicionar").html("Adicionar");
							$.notify({
								message: "<center>Ocorreu um erro interno</center>"
							},{
								type: 'danger',
								mouse_over: 'pause',
								placement: {
									from: "bottom",
									align: "left"
								},
								z_index: 9999,
							});
						},
					});// Fim do ajax

				} // Fim do submitHandler
			}); // Fim das validações do adicionar
		});
	</script>
</div> <!-- Fim Default Box -->