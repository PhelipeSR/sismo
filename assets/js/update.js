// Colocar a url aqui. NÃO ESQUECER A BARRA NO FINAL ( / )
var url = 'http://localhost/sismo/';

function carregarPagina(){
	window.location.replace(url+"login");
}
$(document).ready( function() {

	// 	// validação dos campos e pedido ajax
	$( "#formUpdate" ).validate( {
		rules: {
			confSenha: {
				required: true,
				equalTo: "#inputSenha"
			},
			senha:{
				required: true,
				minlength: 6
			}
		},
		messages: {
			confSenha: {
				required: 'Por favor, digite a confirmação',
			},
			senha: {
				required: 'Por favor, digite a senha',
			}
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
				url: url+'reminder/updateSenha',
				method: 'post',
				data: $('#formUpdate').serialize(),

				success: function(data, textStatus, jqXHR) {
					$('#inputSenha,#inputConfSenha').val('');
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
					}else if(data.dados == 'atualizado'){
						window.setTimeout(carregarPagina, 4000);
						$.notify({
							message: "<center>Alteração de senha realizado com sucesso!<br/> Você será redirecionado para a página de login.</center>"
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
					$('#btn-update').prop("disabled",true);
					$("#btn-update").html('<img src="'+url+'assets/imagens/loading.svg"> Espere...');
				},
				complete: function(){
					$('#btn-update').prop("disabled",false);
					$('#btn-update').html("Atualizar");
				},
				erro: function(){
					$('#btn-update').prop("disabled",false);
					$("#btn-update").html("Atualizar");
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
			}); // Fim do Ajax
		},
	}); // Fim da Validação
});