<div class="box"> <!-- Default Box -->
	<div class="box-header with-border"> <!-- Header Conteúdo Principal -->
		<center><h3 class="box-title">Listar Monitorias</h3></center>
	</div>

	<div class="register-box">
		<div class="register-box-body">
			<form id="listar">
				<div class="box-header">
					<h5 class="box-title">Selecione o departamento</h5>
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
	</div> <!-- /.register-box -->
	<script type="text/javascript">
		$(document).ready(function() {

			$('#inputDepartamento').change(function(){
				$('.sair').remove();
				$('#monitorias').addClass('hide');
				$('#monitores').addClass('hide');
				$.ajax({
					method: 'post',
					data: {departamento: $('#inputDepartamento').val()},
					url: 'Listar/materias',
					success: function(retorno){
						if (retorno.erro) {
							$('#invalido').html(retorno.msg);
							$('#materia').addClass('hide');
						}else{
							for(i = 0; i < retorno.dados.length; i++) {
								$('#inputMateria').append('<option class="sair" value="'+retorno.dados[i].codigo+'" >'+retorno.dados[i].nome+'</option>')
							}
							$('#materia').removeClass('hide');
							$('#invalido').html('');
						}
					}
				});
			});

			$('#inputMateria').change(function(){
				$('.sair1').remove();
				$('#monitores').addClass('hide');
				$.ajax({
					method: 'post',
					data: {materia: $('#inputMateria').val()},
					url: 'Listar/monitorias',
					success: function(retorno){
						if (retorno.erro) {
							$('#invalido').html(retorno.msg);
							$('#monitorias').addClass('hide');
						}else{
							for(i = 0; i < retorno.dados.length; i++) {
								$('#inputMonitorias').append('<option class="sair1" value="'+retorno.dados[i].id+'" >'+retorno.dados[i].turma+'</option>')
							}
							$('#monitorias').removeClass('hide');
							$('#invalido').html('');
						}
					}
				});
			});

			$('#inputMonitorias').change(function(){
				$('.sair2').remove();
				$.ajax({
					method: 'post',
					data: {monitoria: $('#inputMonitorias').val()},
					url: 'Listar/monitores',
					success: function(retorno){
						if (retorno.erro) {
							$('#invalido').html(retorno.msg);
							$('#monitores').addClass('hide');
						}else{
							for(i = 0; i < retorno.dados.length; i++) {
								$('#valores').append('<tr class="sair2"><td>'+retorno.dados[i].nome+'</td><td>'+retorno.dados[i].email+'</td></tr>')
							}
							$('#monitores').removeClass('hide');
							$('#invalido').html('');
						}
					}
				});
			});
		});
	</script>
</div> <!-- Fim Default Box -->