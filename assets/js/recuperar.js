$(document).ready( function() {

	// 	// validação dos campos e pedido ajax
	$( "#formRecuperar" ).validate( {
		rules: {
			email: {
				required: true,
				email: true
			},
		},
		messages: {
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
			$(element).parents( '.form-group' ).addClass( 'has-success' ).removeClass( 'has-error' );
		},
		submitHandler: function (form) {
			$.ajax({
				url: 'Reminder/recuperar',
				method: 'post',
				dataType:"json",
				data: $('#formRecuperar').serialize(),

				success: function(data, textStatus, jqXHR) {
					if (data.erro) {
						$.notify({
							message: "<center>"+data.msg+"</center>"
						},{
							type: 'danger',
							mouse_over: 'pause',
							placement: {
								from: "bottom",
								align: "left"
							},
							z_index: 9999,
						});
					}else if(data.dados == "enviado"){
						$('#inputEmail').val('');
						$.notify({
							message: "<center>Um link para recuperar sua senha foi enviado para o e-mail indicado!</center>"
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
					$('#btn-recupera').prop("disabled",true);
					$("#btn-recupera").html('<i class="fa fa-spin fa-spinner"></i> Espere...');
				},
				complete: function(){
					$('#btn-recupera').prop("disabled",false);
					$('#btn-recupera').html("Enviar");
				},
				erro: function(){
					$('#btn-recupera').prop("disabled",false);
					$("#btn-recupera").html("Enviar");
					$.notify({
						message: "<center>Ocorreu um erro interno</center>"
					},{
						type: 'danger',
						mouse_over: 'pause',
						placement: {
							from: "bottom",
							align: "left"
						},
					});
				},
			}); // Fim do Ajax
			return false;
		},
	}); // Fim da Validação
});