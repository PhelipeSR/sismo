$(document).ready( function() {

	// validação dos campos e pedido ajax
	$( "#formContato" ).validate( {
		rules: {
			nome: {
				required: true,
			},
			conteudo: {
				required: true,
			},
			email: {
				required: true,
				email: true
			},
		},
		messages: {
			nome: {
				required: 'Por favor, digite seu nome',
			},
			conteudo: {
				required: 'Por favor, digite sua mensagem',
			},
			email: {
				required: 'Por favor, digite seu Email',
			},
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
				url: 'Reminder/contato',
				method: 'post',
				data: $('#formContato').serialize(),

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
					}else if(data.dados == 'enviado'){
						$('.form-group').removeClass( "has-error has-success focused" );
						$('#formContato')[0].reset();
						$.notify({
							message: "<center>Mensagem enviada com sucesso!</center>"
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
					$('#btn-contato').prop("disabled",true);
					$("#btn-contato").html('<i class="fa fa-spin fa-spinner"></i> Espere...');
				},
				complete: function(){
					$('#btn-contato').prop("disabled",false);
					$('#btn-contato').html("Enviar Mensagem");
				},
				erro: function(){
					$('#btn-contato').prop("disabled",false);
					$("#btn-contato").html("Enviar Mensagem");
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