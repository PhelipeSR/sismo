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
					<th>CPF</th>
					<th>Matrícula</th>
					<th>Categoria</th>
					<th>Status</th>
					<th>Matéria</th>
					<th>Turma</th>
					<th>Agencia</th>
					<th>Conta</th>
					<th>Banco</th>
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
					<p>Tem certeza que deseja excluir essa candidatura?</p>
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
					<h4 class="modal-title">Adicionar Candidatura de Usuário</h4>
				</div>
				<div class="modal-body">
					<form id="formAdicionar">
						<div class="box-header">
							<h5 class="box-title">Dados Pessoais</h5>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group has-feedback">
									<input id='inputNome' name="nome" type="text" class="form-control" placeholder="Nome completo" disabled>
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
									<input id='inputCpf' type="text" name="cpf" class="form-control" placeholder="CPF">
									<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
								</div>
							</div>
						</div>
						<input  name="usuario_id" class="hide" id="inputUsuario_id">
						<div id="invalido" class="error"></div>
						<div class="box-header">
							<h5 class="box-title">Dados Bancários</h5>
						</div>
						<div class="row">
							<div class="col-sm-12">
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
							<div class="col-sm-4">
								<div class="form-group has-feedback">
									<select class="form-control" id='inputStatus' name="status">
										<option value="" selected >Status</option>
										<option value="0">Não analizado</option>
										<option value="1">Aceito</option>
										<option value="2">Recusado</option>
									</select>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group has-feedback">
									<select class="form-control" id='inputMateria' name="materia">
										<option value="" selected >Matéria</option>
										<?php
											$this->db->select( 'monitorias.turma, monitorias.id, materia.nome' );
											$this->db->where('monitorias.status', '0');
											$this->db->where('materia.departamento_id', $this->session->departamento);
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
					<h4 class="modal-title">Editar Usuário</h4>
				</div>
				<div class="modal-body">
					<form id="formEditar">
						<div class="box-header">
							<h5 class="box-title">Dados Pessoais</h5>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group has-feedback">
									<input id='inputNome_e' name="nome" type="text" class="form-control" placeholder="Nome completo" disabled>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group has-feedback">
									<input id='inputMatricula_e' type="text" name="matricula" class="form-control" placeholder="Matrícula" disabled>
									<span class="fa fa-graduation-cap form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group has-feedback">
									<input id='inputCpf_e' type="text" name="cpf" class="form-control" placeholder="CPF" disabled>
									<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
								</div>
							</div>
						</div>
						<div class="box-header">
							<h5 class="box-title">Dados Bancários</h5>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group has-feedback">
									<select class="form-control" id='inputRemunerada_e' name="remunerada">
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
									<input id='inputAgencia_e' type="text" name="agencia" class="form-control" placeholder="Agência">
									<span class="fa fa-address-book-o form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group has-feedback">
									<input id='inputConta_e' type="text" name="conta" class="form-control" placeholder="Conta">
									<span class="fa fa-id-card-o form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group has-feedback">
									<input id='inputBanco_e' type="text" name="banco" class="form-control" placeholder="Banco">
									<span class="fa fa-university form-control-feedback"></span>
								</div>
							</div>
						</div>
						<div class="box-header">
							<h5 class="box-title">Dados Acadêmicos</h5>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group has-feedback">
									<select class="form-control" id='inputStatus_e' name="status">
										<option value="" selected >Status</option>
										<option value="0">Não analizado</option>
										<option value="1">Aceito</option>
										<option value="2">Recusado</option>
									</select>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group has-feedback">
									<select class="form-control" id='inputMateria_e' name="materia">
										<option value="" selected >Matéria</option>
										<?php
											$this->db->select( 'monitorias.turma, monitorias.id, materia.nome' );
											$this->db->where('materia.departamento_id', $this->session->departamento);
											$this->db->join('materia', 'monitorias.materia_codigo = materia.codigo','left');
											foreach ($this->db->get('monitorias')->result() as $row) {
												echo "<option value='$row->id'>$row->nome - $row->turma</option>";
											}
										?>
									</select>
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
			$('#inputMatricula').blur(function(){
				$.ajax({
					method: 'post',
					data: {matricula: $('#inputMatricula').val()},
					url: 'Candidatura/verificarUsuario',
					success: function(retorno){
						if (retorno.erro) {
							userValido = false;
							$('#invalido').html(retorno.msg);
							$('#inputNome').val('');
							$('#inputUsuario_id').val('');
						}else{
							$('#inputNome').val(retorno.dados[0].nome);
							$('#invalido').html('');
							$('#inputUsuario_id').val(retorno.dados[0].id);
							userValido = true;
						}
					}
				});
			});

			var table = $('#user_data').DataTable({
				dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>B"+"<'row'<'col-sm-12'tr>>"+"<'row'<'col-sm-5'i><'col-sm-7'p>>",
				ajax: { url:"<?php echo base_url().'Tabela/candidaturaChefe'; ?>",type: "post"},

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
						$('#modalEditar'      ).modal('show');
						$('#inputId'          ).val(dados['id']);
						$('#inputNome_e'      ).val(dados['nome']);
						$('#inputMatricula_e' ).val(dados['matricula']);
						$('#inputCpf_e'       ).val(dados['cpf']);
						$('#inputRemunerada_e').val(dados['remunerada']);
						$('#inputAgencia_e'   ).val(dados['agencia']);
						$('#inputConta_e'     ).val(dados['conta']);
						$('#inputBanco_e'     ).val(dados['banco']);
						$('#inputStatus_e'    ).val(dados['status']);
						$('#inputTurma_e'     ).val(dados['turma']);
						$('#inputMateria_e'   ).val(dados['monitorias_id']);
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
					{ data: "id"       },
					{ data: "nome"     },
					{ data: "cpf"    },
					{ data: "matricula"},
					{ data: "remunerada",render: function(value, type, row, meta){
						if (value == '0') {
							return 'Não Remunerada';
						}else if (value == '1'){
							return 'Remunerada';
						}
					}},
					{ data: "status",render: function(value, type, row, meta){
						if (value == '0') {
							return 'Não Analizado';
						}else if (value == '1'){
							return 'Aceito';
						}
						else if (value == '2'){
							return 'Recusado';
						}
					}},
					{ data: "materia" },
					{ data: "turma" },
					{ data: "agencia" },
					{ data: "conta" },
					{ data: "banco" },
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
				$('#inputNome,#inputNome_e'          ).inputmask({ mask: "a", "repeat": 255,placeholder: '' });
				$('#inputCpf,#inputCpf_e'  ).inputmask({ alias: '999.999.999-99'});
				$('#inputMatricula,#inputMatricula_e').inputmask({ alias: '99/9999999'});
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
					matricula: {
						required: true,
						matUnB: true
					},
					cpf: {
						required: true,
						cpfBR: true
					},
					remunerada: {
						required: true,
					},
					status: {
						required: true,
					},
					turma:{
						required: true,
					},
					materia: {
						required: true,
					}
				},
				messages: {
					nome: {
						required: 'Por favor, digite o nome',
					},
					matricula: {
						required: 'Por favor, digite o matrícula',
					},
					cpf: {
						required: 'Por favor, digite o CPF',
					},
					remunerada: {
						required: 'Por favor, escolha a categoria',
					},
					status: {
						required: 'Por favor, escolha o status',
					},
					turma: {
						required: 'Por favor, digite a turma',
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
						url: 'Candidatura/adicionar',
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
					matricula: {
						required: true,
						matUnB: true
					},
					cpf: {
						required: true,
						cpfBR: true
					},
					remunerada: {
						required: true,
					},
					status: {
						required: true,
					},
					turma:{
						required: true,
					},
					materia: {
						required: true,
					}
				},
				messages: {
					nome: {
						required: 'Por favor, digite o nome',
					},
					matricula: {
						required: 'Por favor, digite o matrícula',
					},
					cpf: {
						required: 'Por favor, digite o CPF',
					},
					remunerada: {
						required: 'Por favor, escolha a categoria',
					},
					status: {
						required: 'Por favor, escolha o status',
					},
					turma: {
						required: 'Por favor, digite a turma',
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
						url: 'Candidatura/editar',
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
									message: "<center>Edição de candidatura do usuário realizada com sucesso!</center>"
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
					url: 'Candidatura/deletar',
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
								message: "<center>Exclusão de candidatura do usuário realizada com sucesso!</center>"
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