function carregarPagina(){
	window.location.replace(base_url('login'));
}
$(document).ready( function() {

	// Mascaras do formulário
	$('#inputNome'      ).inputmask({ mask: "a", "repeat": 255,placeholder: '' });
	$('#inputMatricula' ).inputmask({ alias: '99/9999999'});
	$('#inputTelefone'  ).inputmask({ alias: '(99) 99999-9999'});

	// validação dos campos e pedido ajax
	$( "#formCadastro" ).validate( {
		rules: {
			nome: {
				required: true,
			},
			matricula: {
				required: true,
				matUnB: true
			},
			telefone: {
				required: true,
				phoneBR: true
			},
			email: {
				required: true,
				email: true
			},
			curso: {
				required: true,
			},
			senha:{
				required: true,
				minlength: 6
			},
			confSenha: {
				required: true,
				equalTo: "#inputSenha"
			}
		},
		messages: {
			nome: {
				required: 'Por favor, digite seu nome',
			},
			matricula: {
				required: 'Por favor, digite sua matrícula',
			},
			email: {
				required: 'Por favor, digite seu email',
			},
			telefone: {
				required: 'Por favor, digite seu telefone',
			},
			curso: {
				required: 'Por favor, escolha seu curso',
			},
			senha: {
				required: 'Por favor, digite sua senha',
			},
			confSenha: {
				required: 'Por favor, confirme sua senha',
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
				url: 'User/adicionar',
				method: 'post',
				data: $('#formCadastro').serialize(),

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
					}else if(data.dados == 'cadastrado'){
						window.setTimeout(carregarPagina, 4000);
						$.notify({
							message: "<center>Cadastro realizado com sucesso!<br/> Você será redirecionado para a página de cadastro.</center>"
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
					$('#btn-cadastro').prop("disabled",true);
					$("#btn-cadastro").html('<i class="fa fa-spin fa-spinner"></i> Espere...');
				},
				complete: function(){
					$('#btn-cadastro').prop("disabled",false);
					$('#btn-cadastro').html("Registra-se");
				},
				erro: function(){
					$('#btn-cadastro').prop("disabled",false);
					$("#btn-cadastro").html("Registra-se");
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