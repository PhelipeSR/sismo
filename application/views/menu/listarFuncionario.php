<div class="box"> <!-- Default Box -->
	<div class="box-header with-border"> <!-- Header Conteúdo Principal -->
		<center><h3 class="box-title">Usuários Cadastrados Na Plataforma</h3></center>
	</div>

	<div class="box-body"> <!-- Body Conteúdo Principal -->
		<table id="user_data" class="table table-bordered table-striped" width="100%">
			<thead>
				<tr>
					<th>id</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Telefone</th>
					<th>Departamento</th>
				</tr>
			</thead>
		</table>
	</div>

	<div class="modal fade" id="modalExcluir">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Excluir</h4>
				</div>
				<div class="modal-body">
					<p>Tem certeza que deseja excluir esse funcionário?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-flat" id="btn-excluir">Excluir</button>
				</div>
			</div>
		</div>
	</div> <!-- /.modal -->

	<div class="modal fade" id="modalAdicionar">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Adicionar</h4>
				</div>
				<div class="modal-body">
					<form id="formAdicionar">
						<div class="box-header">
							<h5 class="box-title">Dados Cadastrais</h5>
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
							<div class="col-sm-4">
								<div class="form-group has-feedback">
									<input id='inputTelefone' type="text" name="telefone" class="form-control" placeholder="Telefone">
									<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group has-feedback">
									<select class="form-control" id='inputDepartamento' name="departamento">
										<option value="" selected >Departamento</option>
										<?php
											$this->db->select( '*' );
											$query = $this->db->get('departamento');
											foreach ($query->result() as $row) {
												echo "<option value='$row->id'>$row->nome</option>";
											}
										?>
									</select>
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
						<div class="box-header">
							<h5 class="box-title">Registro de Senha</h5>
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

						<div class="modal-footer">
							<button class="btn btn-primary btn-flat" id="btn-adicionar">Adicionar</button>
						</div>
					</form>
				</div> <!-- /.modal-body -->
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div> <!-- /.modal -->

	<div class="modal fade" id="modalEditar">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Editar</h4>
				</div>
				<div class="modal-body">
					<form id="formEditar">
						<div class="box-header">
							<h5 class="box-title">Dados Cadastrais</h5>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group has-feedback">
									<input id='inputNome_e' name="nome" type="text" class="form-control" placeholder="Nome completo">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group has-feedback">
									<input id='inputTelefone_e' type="text" name="telefone" class="form-control" placeholder="Telefone">
									<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group has-feedback">
									<select class="form-control" id='inputDepartamento_e' name="departamento">
										<option value="" selected >Departamento</option>
										<?php
											$this->db->select( '*' );
											$query = $this->db->get('departamento');
											foreach ($query->result() as $row) {
												echo "<option value='$row->id'>$row->nome</option>";
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group has-feedback">
									<input id='inputEmail_e' type="text" name="email" class="form-control" placeholder="Email">
									<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								</div>
							</div>
						</div>
						<input name="id" class="hide" id="inputId">
						<div class="modal-footer">
							<button class="btn btn-primary btn-flat" id="btn-editar">Editar</button>
						</div>
					</form>
				</div> <!-- /.modal-body -->
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div> <!-- /.modal -->

	<script type="text/javascript">
		$(document).ready(function() {

			var table = $('#user_data').DataTable({
				dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>B"+"<'row'<'col-sm-12'tr>>"+"<'row'<'col-sm-5'i><'col-sm-7'p>>",
				ajax: { url:"<?php echo base_url().'Tabela/funcionarios'; ?>",type: "post"},

				buttons: [{
					text: 'Adicionar',
					className: 'btn-primary btn-flat',
					action: function ( e, dt, type, indexes ) {
						$('#modalAdicionar').modal('show');
					} // Fim da ação
				},{
					extend: 'selectedSingle',
					className: 'btn-primary btn-flat',
					text: 'Editar',
					action: function ( e, dt, type, indexes ) {
						$('#modalEditar'        ).modal('show');
						$('#inputId'            ).val(dados['id']);
						$('#inputNome_e'        ).val(dados['nome']);
						$('#inputEmail_e'       ).val(dados['email']);
						$('#inputTelefone_e'    ).val(dados['telefone']);
						$('#inputDepartamento_e').val(dados['departamento_id']);
					} // Fim da ação
				},{
					extend: 'selectedSingle',
					className: 'btn-primary btn-flat',
					text: 'Excluir',
					action: function ( e, dt, type, indexes ) {
						$('#modalExcluir').modal('show');
					} // Fim da ação
				}],

				columns: [
					{ data: "id"          },
					{ data: "nome"        },
					{ data: "email"       },
					{ data: "telefone"    },
					{ data: "departamento"},
				],
				columnDefs: [{
					targets: [ 0 ],
					visible: false,
				}],

				select: {style: 'single',info: false},
				processing: true, // Ativa gif de processamento
				serverSide: true, // ativa o processamento no lado do servidor
				responsive: true, // Deixa a tabela responsiva
				language: { url: "<?php echo base_url('assets/plugins/datatables-1.10.15/traducao.json') ?>"},

			}); // FIM DO DATATABLE

			// Evento chamado apos selecionar uma linha
			table.on( 'select', function ( e, dt, type, indexes ) {
				dados = table.rows(indexes).data().toArray();
				dados = dados[0];
			});

			// Evento chamado antes de mandar requisição ajax
			table.on( 'preXhr.dt', function () {
				$('#inputNome,#inputNome_e'        ).inputmask({ mask: "a", "repeat": 255,placeholder: '' });
				$('#inputTelefone,#inputTelefone_e').inputmask({ alias: '(99) 99999-9999'});
				// Altera as classes dos botões da tabela
				$('.btn-default').removeClass('btn-default');
			});

			// Cancela as validações e retira as classes ao fechar o modal
			$('#modalAdicionar,#modalEditar').on('hidden.bs.modal', function (e) {
				$('.form-group').removeClass( "has-error has-success focused" );
				$('#formAdicionar').validate().resetForm();
				$('#formEditar').validate().resetForm();
				$('#formAdicionar,#formEditar')[0].reset();
			});

			$('#formAdicionar').validate({
				rules: {
					nome: {
						required: true,
					},
					telefone: {
						required: true,
						phoneBR: true
					},
					email: {
						required: true,
						email: true
					},
					departamento: {
						required: true,
					},
					senha:{
						required: true,
						minlength: 6
					},
					confSenha: {
						required: true,
						equalTo: "#inputSenha"
					}
				},
				messages: {
					nome: {
						required: 'Por favor, digite o nome',
					},
					telefone: {
						required: 'Por favor, digite o telefone',
					},
					departamento: {
						required: 'Por favor, escolha o departamento',
					},
					email: {
						required: 'Por favor, digite o email',
					},
					senha: {
						required: 'Por favor, digite sua senha',
					},
					confSenha: {
						required: 'Por favor, confirme sua senha',
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
						url: 'User/adicionarFuncionario',
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
								$('#modalAdicionar').modal('hide');
								table.ajax.reload( null, false );
								$.notify({
									message: "<center>Adição de Usuário realizada com sucesso!</center>"
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

			$('#formEditar').validate({
				rules: {
					nome: {
						required: true,
					},
					departamento: {
						required: true,
					},
					telefone: {
						required: true,
						phoneBR: true
					},
					email: {
						required: true,
						email: true
					},
				},
				messages: {
					nome: {
						required: 'Por favor, digite o nome',
					},
					departamento: {
						required: 'Por favor, escolha 0 departamento',
					},
					telefone: {
						required: 'Por favor, digite o telefone',
					},
					email: {
						required: 'Por favor, digite o email',
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
						url: 'User/editarFuncionario',
						method: 'post',
						data: $('#formEditar').serialize(),
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
								$('#modalEditar').modal('hide');
								table.ajax.reload( null, false );
								$.notify({
									message: "<center>Edição de Usuário realizada com sucesso!</center>"
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
							$('#btn-editar').prop("disabled",true);
							$("#btn-editar").html("<img src='<?php echo base_url("assets/imagens/loading.svg") ?>'> Espere")
						},
						complete: function(){
							$('#btn-editar').prop("disabled",false);
							$("#btn-editar").html("Editar");
						},
						erro: function(){
							$('#btn-editar').prop("disabled",false);
							$("#btn-editar").html("Editar");
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
			}); // Fim das validações do editar

			$('#btn-excluir').click(function(){
				$.ajax({
					url: 'User/deletar',
					method: 'post',
					data: {id: dados['id']},
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
							$('#modalExcluir').modal('hide');
							table.ajax.reload( null, false );
							$.notify({
								message: "<center>Exclusão de Usuário realizada com sucesso!</center>"
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
						$('#btn-excluir').prop("disabled",true);
						$("#btn-excluir").html("<img src='<?php echo base_url("assets/imagens/loading.svg") ?>'> Espere")
					},
					complete: function(){
						$('#btn-excluir').prop("disabled",false);
						$("#btn-excluir").html("Excluir");
					},
					erro: function(){
						$('#btn-excluir').prop("disabled",false);
						$("#btn-excluir").html("Excluir");
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
			});// Fim do botão de click
		});
	</script>
</div> <!-- Fim Default Box -->