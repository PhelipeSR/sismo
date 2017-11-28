<div class="box"> <!-- Default Box -->
	<div class="box-header with-border"> <!-- Header Conteúdo Principal -->
		<center><h3 class="box-title">Minhas monitorias</h3></center>
	</div>

	<div class="box-body"> <!-- Body Conteúdo Principal -->
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<table id="user_data" class="table table-bordered table-striped table-responsive no-padding">
					<thead>
						<tr>
							<th style='width: 25%'>Matéria</th>
							<th style='width: 10%'>Turma</th>
							<th style='width: 25%'>Situação</th>
							<th style='width: 20%'>Cancelar Inscrição</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$this->db->select( 'monitorias.turma, monitorias.id,candidatar.status, materia.nome, candidatar.id AS tag' );
							$this->db->where('candidatar.usuario_id', $this->session->id);
							$this->db->join('candidatar', 'monitorias.id = candidatar.monitorias_id');
							$this->db->join('materia', 'monitorias.materia_codigo = materia.codigo');
							foreach ($this->db->get('monitorias')->result() as $row) {
								if ($row->status == 1) {
									echo "<tr class='success' data-apaga='".$row->tag."'>";
								}else if ($row->status == 2){
									echo "<tr class='danger' data-apaga='".$row->tag."'>";
								}else{
								echo "<tr data-apaga='".$row->tag."'>";
								}
									echo "<td>$row->nome</td>";
									echo "<td>$row->turma</td>";
									if ($row->status == 0) {
										echo "<td>Não Analisado</td>";
									}else if ($row->status == 1) {
										echo "<td>Aprovado</td>";
									}else{
										echo "<td>Recusado</td>";
									}
									echo "<td><button class='btn btn-block btn-danger cancelar' data-id='".$row->tag."'>Cancelar</button></td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		$(document).ready( function() {
			$('.cancelar').click(function(){
				var id = $(this).data('id')
				$.ajax({
					url: 'Candidatura/deletar',
					method: 'post',
					data: {id: id},

					success: function(data) {
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
						}else if(data.dados == 'excluido'){
							$('[data-apaga="'+id+'"]').remove();
							$.notify({
								message: "<center>Exclusão realizada com sucesso</center>"
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
				}); // Fim do Ajax
			});
		});
	</script>


</div> <!-- Fim Default Box -->