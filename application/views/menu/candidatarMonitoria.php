<div class="box"> <!-- Default Box -->
	<div class="box-header with-border"> <!-- Header Conteúdo Principal -->
		<center><h3 class="box-title">Candidatar A Uma Monitoria</h3></center>
	</div>

	<div class="box-body"> <!-- Body Conteúdo Principal -->
		<div class="row">
			<div class="col-md-6 col-md-offset-3 teste">
				<div class="box box-primary">
					<div class="login-box-body">
						<form id="formAdicionar">
							<div id="invalido" class="error"></div>
							<div class="box-header">
								<h5 class="box-title">Dados Bancários</h5>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group has-feedback">
										<input id='inputCpf' type="text" name="cpf" class="form-control" placeholder="CPF">
										<span class="fa fa-credit-card-alt form-control-feedback"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group has-feedback">
										<select class="form-control" id='inputRemunerada' name="remunerada">
											<option value="" selected >Categoria</option>
											<option value="1">Remunerada</option>
											<option value="0">Não Remunerada</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group has-feedback">
										<input id='inputAgencia' type="text" name="agencia" class="form-control" placeholder="Agência">
										<span class="fa fa-address-book-o form-control-feedback"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group has-feedback">
										<input id='inputConta' type="text" name="conta" class="form-control" placeholder="Conta">
										<span class="fa fa-id-card-o form-control-feedback"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group has-feedback">
										<input id='inputBanco' type="text" name="banco" class="form-control" placeholder="Banco">
										<span class="fa fa-university form-control-feedback"></span>
									</div>
								</div>
							</div>
							<div class="box-header">
								<h5 class="box-title">Dados Acadêmicos</h5>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group has-feedback">
										<select class="form-control" id='inputMateria' name="materia">
											<option value="" selected >Matéria</option>
											<?php
												$this->db->select( 'monitorias.turma, monitorias.id, materia.nome' );
												$this->db->where('monitorias.status', '0');
												$this->db->join('materia', 'monitorias.materia_codigo = materia.codigo','left');
												foreach ($this->db->get('monitorias')->result() as $row) {
													echo "<option value='$row->id'>$row->nome - $row->turma</option>";
												}
											?>
										</select>
									</div>
								</div>
							</div>

							<div class="modal-footer">
								<button class="btn btn-primary btn-flat" id="btn-adicionar">Candidatar</button>
							</div>
						</form>
					</div>
				</div> <!-- /.login-box -->
			</div>
		</div>
	</div>

	<script type="text/javascript">

		$(document).ready( function() {

			$('#inputCpf').inputmask({ alias: '999.999.999-99'});

			$('#formAdicionar').validate({
				rules: {
					cpf: {
						required: true,
						cpfBR: true
					},
					remunerada: {
						required: true,
					},
					materia: {
						required: true,
					}
				},
				messages: {
					cpf: {
						required: 'Por favor, digite o CPF',
					},
					remunerada: {
						required: 'Por favor, escolha a categoria',
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
						url: 'Candidatura/adicionarUser',
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
								$("option[value='"+$('#inputMateria').val()+"']").each(function() {
									$(this).remove();
								});
								$('#formAdicionar')[0].reset();
								$('.form-group').removeClass( "has-error has-success focused" );
								$.notify({
									message: "<center>Adição de candidatura do usuário realizada com sucesso!</center>"
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
							$("#btn-adicionar").html("<img src='<?php echo base_url("assets/imagens/loading.svg") ?>'> Espere");
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
