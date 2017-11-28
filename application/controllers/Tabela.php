<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabela extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function usuarios() {
		$this->load->model('TabelaUsuario_model','usuario');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->usuario->dados_completos(),
			"recordsFiltered" => $this->usuario->dados_filtrados(),
			"data"            => $this->usuario->datatable(),
		);
		echo json_encode($output);
	}
	public function chefes() {
		$this->load->model('TabelaChefes_model','chefes');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->chefes->dados_completos(),
			"recordsFiltered" => $this->chefes->dados_filtrados(),
			"data"            => $this->chefes->datatable(),
		);
		echo json_encode($output);
	}
	public function funcionarios() {
		$this->load->model('TabelaFuncionarios_model','funcionarios');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->funcionarios->dados_completos(),
			"recordsFiltered" => $this->funcionarios->dados_filtrados(),
			"data"            => $this->funcionarios->datatable(),
		);
		echo json_encode($output);
	}
	public function cursos() {
		$this->load->model('TabelaCursos_model','cursos');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->cursos->dados_completos(),
			"recordsFiltered" => $this->cursos->dados_filtrados(),
			"data"            => $this->cursos->datatable(),
		);
		echo json_encode($output);
	}
	public function departamentos() {
		$this->load->model('TabelaDepartamento_model','departamentos');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->departamentos->dados_completos(),
			"recordsFiltered" => $this->departamentos->dados_filtrados(),
			"data"            => $this->departamentos->datatable(),
		);
		echo json_encode($output);
	}
	public function materias() {
		$this->load->model('TabelaMaterias_model','materias');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->materias->dados_completos(),
			"recordsFiltered" => $this->materias->dados_filtrados(),
			"data"            => $this->materias->datatable(),
		);
		echo json_encode($output);
	}
	public function monitorias() {
		$this->load->model('TabelaMonitorias_model','monitorias');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->monitorias->dados_completos(),
			"recordsFiltered" => $this->monitorias->dados_filtrados(),
			"data"            => $this->monitorias->datatable(),
		);
		echo json_encode($output);
	}
	public function candidatura() {
		$this->load->model('TabelaCandidatura_model','candidatura');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->candidatura->dados_completos(),
			"recordsFiltered" => $this->candidatura->dados_filtrados(),
			"data"            => $this->candidatura->datatable(),
		);
		echo json_encode($output);
	}
// *****************************************************************************************
// CHEFE DE DEPARTAMENTO
// *****************************************************************************************
	public function funcionariosChefe() {
		$this->load->model('TabelaFuncionariosChefe_model','funcionariosChefe');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->funcionariosChefe->dados_completos(),
			"recordsFiltered" => $this->funcionariosChefe->dados_filtrados(),
			"data"            => $this->funcionariosChefe->datatable(),
		);
		echo json_encode($output);
	}
	public function materiasChefe() {
		$this->load->model('TabelaMateriasChefe_model','materiasChefe');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->materiasChefe->dados_completos(),
			"recordsFiltered" => $this->materiasChefe->dados_filtrados(),
			"data"            => $this->materiasChefe->datatable(),
		);
		echo json_encode($output);
	}
	public function candidaturaChefe() {
		$this->load->model('TabelaCandidaturaChefe_model','candidaturaChefe');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->candidaturaChefe->dados_completos(),
			"recordsFiltered" => $this->candidaturaChefe->dados_filtrados(),
			"data"            => $this->candidaturaChefe->datatable(),
		);
		echo json_encode($output);
	}
	public function monitoriasChefe() {
		$this->load->model('TabelaMonitoriasChefe_model','monitoriasChefe');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->monitoriasChefe->dados_completos(),
			"recordsFiltered" => $this->monitoriasChefe->dados_filtrados(),
			"data"            => $this->monitoriasChefe->datatable(),
		);
		echo json_encode($output);
	}
	public function grupos() {
		$this->load->model('TabelaGrupos_model','grupos');
		$output = array(
			"draw" => isset ( $_POST['draw'] ) ? intval( $_POST['draw'] ) :0,
			"recordsTotal"    => $this->grupos->dados_completos(),
			"recordsFiltered" => $this->grupos->dados_filtrados(),
			"data"            => $this->grupos->datatable(),
		);
		echo json_encode($output);
	}
}