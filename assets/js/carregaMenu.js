$(document).ready( function(){

	$('#listarUser').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarUser',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar usuários

	$('#listarChefe').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarChefe',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar chefes

	$('#listarFuncionario').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarFuncionario',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar funcionários

	$('#listarCursos').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarCursos',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar Cursos

	$('#listarDepartamentos').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarDepartamentos',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar departamentos

	$('#listarMaterias').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarMaterias',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar materias

	$('#listarMonitorias').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarMonitorias',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar monitorias

	$('#listarCanditaturas').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarCanditaturas',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#listarGrupos').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarGrupos',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#chefeListarFuncionario').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/chefeListarFuncionario',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#chefeListarMaterias').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/chefeListarMaterias',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#chefeListarMonitorias').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/chefeListarMonitorias',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#chefeListarCanditaturas').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/chefeListarCanditaturas',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#chefePerfil').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/chefePerfil',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#usuarioPerfil').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/usuarioPerfil',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#listarMonitoriasUser').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarMonitoriasUser',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#candidatarMonitoria').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/candidatarMonitoria',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#listarMinhasMonitorias').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarMinhasMonitorias',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#montarGrupo').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/montarGrupo',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura

	$('#listarMeusGrupos').click(function(){

		// Remove visualizações anteriores
		$('.box').remove();

		// // // Adiciona o gif de loading
		$('#loading').html("<div id='loadingMenu' class='row'><div class='col-xs-12 text-center'><button type='button' class='btn btn-default btn-lrg ajax'><i class='fa fa-spin fa-refresh'></i>&nbsp; Carregando conteúdo...</button></div></div>")

		// Carrega o arquivo
		$('#ajax-content').load( 'Menu/listarMeusGrupos',function( response, status, xhr ){
			$('#loadingMenu').remove(); // Retira o gif de loading
		});
	}); // Fim do Listar candidatura
}); // Fim do Documento