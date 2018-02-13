$(document).ready( function() {

	// validação dos campos e pedido ajax
	$( "#formLogin" ).validate( {
		rules: {
			email: {
				required: true,
				email: true
			},
			senha:{
				required: true,
				minlength: 6
			}
		},
		messages: {
			email: {
				required: 'Por favor, digite o email',
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
				url: 'Authentication/logar',
				method: 'post',
				data: $('#formLogin').serialize(),

				success: function(data, textStatus, jqXHR) {
					$('#inputSenha').val('');
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
					}else if(data.dados == 'logado'){
						window.location.replace(base_url());
					}
				},
				beforeSend: function(){
					$('#btn-login').prop("disabled",true);
					$("#btn-login").html('<i class="fa fa-spin fa-spinner"></i> Espere...');
				},
				complete: function(){
					$('#btn-login').prop("disabled",false);
					$('#btn-login').html("Entrar");
				},
				erro: function(){
					$('#btn-login').prop("disabled",false);
					$("#btn-login").html("Entrar");
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