<div class="box"> <!-- Default Box -->
	<div class="box-header with-border"> <!-- Header Conteúdo Principal -->
		<center><h3 class="box-title">Grupos Cadastrados Na Plataforma</h3></center>
	</div>

	<div class="box-body"> <!-- Body Conteúdo Principal -->
		<table id="user_data" class="table table-bordered table-striped" width="100%">
			<thead>
				<tr>
					<th>id</th>
					<th>Nome</th>
					<th>Horário</th>
					<th>Nº de Pessoas</th>
					<th>Descrição</th>
					<th>Usuário</th>
					<th>Matrícula</th>
					<th>Matéria</th>
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
					<p>Tem certeza que deseja excluir esse grupo?</p>
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
					<h4 class="modal-title">Adicionar Grupo</h4>
				</div>
				<div class="modal-body">
					<form id="formAdicionar">
						<div class="box-header">
							<h5 class="box-title">Dados Pessoais</h5>
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
							<div class="col-sm-6">
								<div class="form-group has-feedback">
									<input id='inputMatricula' type="text" name="matricula" class="form-control" placeholder="Matrícula">
									<span class="fa fa-graduation-cap form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group has-feedback">
									<input id='inputUsuario' type="text" name="usuario" class="form-control" placeholder="Nome do Usuário" disabled>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
							</div>
						</div>
						<div id="invalido" class="error"></div>
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
									<input id='inputNome_e' name="nome" type="text" class="form-control" placeholder="Nome do Grupo de Estudos">
									<span class="fa fa-user-plus form-control-feedback"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-7">
								<div class="form-group has-feedback">
									<input id='inputHorario_e' type="text" name="horario" class="form-control" placeholder="Horário e Dia do Grupo">
									<span class="fa fa-graduation-cap form-control-feedback"></span>
								</div>
							</div>
							<div class="col-sm-5">
								<div class="form-group has-feedback">
									<input id='inputQuantidade_e' type="text" name="quantidade" class="form-control" placeholder="Quantidade de Pessoas">
									<span class="fa fa-check form-control-feedback"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group has-feedback">
									<textarea id="inputDescricao_e" name="descricao" rows="5" placeholder="Descrição do Grupo"></textarea>
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
									<input id='inputUsuario_e' type="text" name="usuario" class="form-control" placeholder="Nome do Usuário" disabled>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group has-feedback">
									<select class="form-control" id='inputMateria_e' name="materia">
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
			var userValido = false;
			$('#inputMatricula').blur(function(){
				$.ajax({
					method: 'post',
					data: {matricula: $('#inputMatricula').val()},
					url: 'Candidatura/verificarUsuario',
					success: function(retorno){
						if (retorno.erro) {
							userValido = false;
							$('#invalido').html(retorno.msg);
							$('#inputUsuario').val('');
							$('#inputUser_id').val('');
						}else{
							$('#inputUsuario').val(retorno.dados[0].nome);
							$('#invalido').html('');
							$('#inputUser_id').val(retorno.dados[0].id);
							userValido = true;
						}
					}
				});
			});
			var table = $('#user_data').DataTable({
				dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>B"+"<'row'<'col-sm-12'tr>>"+"<'row'<'col-sm-5'i><'col-sm-7'p>>",
				ajax: { url:"<?php echo base_url().'Tabela/grupos'; ?>",type: "post"},
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
						$('#inputHorario_e'   ).val(dados['horario']);
						$('#inputQuantidade_e').val(dados['quantidade_pessoas']);
						$('#inputDescricao_e' ).val(dados['descricao']);
						$('#inputUsuario_e'   ).val(dados['usuario']);
						$('#inputMatricula_e' ).val(dados['matricula']);
						$('#inputMateria_e'   ).val(dados['codigo']);
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
					{ data: "horario"    },
					{ data: "quantidade_pessoas"},
					{ data: "descricao"},
					{ data: "usuario"},
					{ data: "matricula" },
					{ data: "materia" },
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
				$('#invalido').html('');
			});
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
					if (userValido) {
						$.ajax({
							url: 'Grupo/adicionar',
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
					}else{
						return false;
					}
				} // Fim do submitHandler
			}); // Fim das validações do adicionar
			$('#formEditar').validate({
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
						url: 'Grupo/editar',
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
									message: "<center>Edição de grupo realizada com sucesso!</center>"
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
					url: 'Grupo/deletar',
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
								message: "<center>Exclusão de grupo realizada com sucesso!</center>"
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