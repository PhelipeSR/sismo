<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materia extends CI_Controller {

	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;

	function __construct() {
		parent::__construct();
	}

	public function adicionar() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('codigo',      'Código da Matéria',   'required|trim|min_length[6]|integer|unique[materia.codigo]');
		$this->form_validation->set_rules('nome',        'Nome da Matéria',     'required|trim');
		$this->form_validation->set_rules('departamento','Nome do Departamento','required|trim');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Materia_model');
			$data = array(
				'codigo'          => $this->input->post('codigo',TRUE),
				'nome'            => $this->input->post('nome',TRUE),
				'departamento_id' => $this->input->post('departamento',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Materia_model->addMateria($data) ) {
				$this->dados = 'cadastrado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao adicionar materia';
			}
		}
		// Formulário com erros
		else {
			$this->erro = TRUE;
			$this->msg = validation_errors();
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		//
		// Configuração de saída de dados
		//
		///////////////////////////////////////////////////////////////////////////////////////////////
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array(	'dados' => $this->dados,
											'erro'  => $this->erro,
											'msg'   => $this->msg,
		)));
	} // Fim do Adicionar

	public function editar() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('codigo',      'Código da Matéria',   'required|trim|min_length[6]|integer|unique[materia.codigo.'.$this->input->post('codigo',TRUE).':codigo]');
		$this->form_validation->set_rules('nome',        'Nome da Matéria',     'required|trim');
		$this->form_validation->set_rules('departamento','Nome do Departamento','required|trim');
		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Materia_model');
			$data = array(
				'codigo'          => $this->input->post('codigo',TRUE),
				'nome'            => $this->input->post('nome',TRUE),
				'departamento_id' => $this->input->post('departamento',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Materia_model->editMateria($data,$this->input->post('codigoAntigo',TRUE)) ) {
				$this->dados = 'editado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao editar materia';
			}
		}
		// Formulário com erros
		else {
			$this->erro = TRUE;
			$this->msg = validation_errors();
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		//
		// Configuração de saída de dados
		//
		///////////////////////////////////////////////////////////////////////////////////////////////
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array(	'dados' => $this->dados,
											'erro'  => $this->erro,
											'msg'   => $this->msg,
		)));
	} // Fim do Editar

	public function adicionarChefe() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('codigo',      'Código da Matéria',   'required|trim|min_length[6]|integer|unique[materia.codigo]');
		$this->form_validation->set_rules('nome',        'Nome da Matéria',     'required|trim');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Materia_model');
			$data = array(
				'codigo'          => $this->input->post('codigo',TRUE),
				'nome'            => $this->input->post('nome',TRUE),
				'departamento_id' => $this->session->departamento,
			);
			// Verifica se dados estão corrétos
			if ( $this->Materia_model->addMateria($data) ) {
				$this->dados = 'cadastrado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao adicionar materia';
			}
		}
		// Formulário com erros
		else {
			$this->erro = TRUE;
			$this->msg = validation_errors();
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		//
		// Configuração de saída de dados
		//
		///////////////////////////////////////////////////////////////////////////////////////////////
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array(	'dados' => $this->dados,
											'erro'  => $this->erro,
											'msg'   => $this->msg,
		)));
	} // Fim do Adicionar

	public function editarChefe() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('codigo',      'Código da Matéria',   'required|trim|min_length[6]|integer|unique[materia.codigo.'.$this->input->post('codigo',TRUE).':codigo]');
		$this->form_validation->set_rules('nome',        'Nome da Matéria',     'required|trim');
		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Materia_model');
			$data = array(
				'codigo'          => $this->input->post('codigo',TRUE),
				'nome'            => $this->input->post('nome',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Materia_model->editMateria($data,$this->input->post('codigoAntigo',TRUE)) ) {
				$this->dados = 'editado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao editar materia';
			}
		}
		// Formulário com erros
		else {
			$this->erro = TRUE;
			$this->msg = validation_errors();
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		//
		// Configuração de saída de dados
		//
		///////////////////////////////////////////////////////////////////////////////////////////////
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array(	'dados' => $this->dados,
											'erro'  => $this->erro,
											'msg'   => $this->msg,
		)));
	} // Fim do Editar

	public function deletar() {
		$this->load->model('Materia_model');

		if ( $this->Materia_model->deleteMateria($this->input->post('id',TRUE)) ) {
			$this->dados = 'excluido';
		}else{
			$this->erro = TRUE;
			$this->msg  = 'Não foi possível excluir departamento';
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		//
		// Configuração de saída de dados
		//
		///////////////////////////////////////////////////////////////////////////////////////////////
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array(	'dados' => $this->dados,
											'erro'  => $this->erro,
											'msg'   => $this->msg,
		)));
	}// Fim do deletar
}