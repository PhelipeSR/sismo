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