<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="box"> <!-- Default Box -->
	<div class="box-header with-border"> <!-- Header Conteúdo Principal -->
		<center><h3 class="box-title">Meus Grupos de Estudo</h3></center>
	</div>

	<div class="box-body"> <!-- Body Conteúdo Principal -->
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<table id="user_data" class="table table-bordered table-striped table-responsive no-padding">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Horário</th>
							<th>Nº Pessoas</th>
							<th>Descrição</th>
							<th>Matéria</th>
							<th>Apagar Grupo</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$this->db->select( 'grupo_estudo.id,grupo_estudo.nome, grupo_estudo.horario,grupo_estudo.quantidade_pessoas, grupo_estudo.descricao, materia.nome AS materia' );
							$this->db->where('grupo_estudo.usuario_id', $this->session->id);
							$this->db->join('materia', 'grupo_estudo.materia_codigo = materia.codigo');
							foreach ($this->db->get('grupo_estudo')->result() as $row) {

								echo "<tr data-apaga='".$row->id."'>";
									echo "<td>$row->nome</td>";
									echo "<td>$row->horario</td>";
									echo "<td>$row->quantidade_pessoas</td>";
									echo "<td>$row->descricao</td>";
									echo "<td>$row->materia</td>";
									echo "<td><button class='btn btn-block btn-danger cancelar' data-id='".$row->id."'>Cancelar</button></td>";
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
					url: 'Grupo/deletarUser',
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