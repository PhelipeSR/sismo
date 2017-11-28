<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoria extends CI_Controller {

	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;

	function __construct() {
		parent::__construct();
	}

	public function adicionar() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('materia','Matéria',          'required|trim|integer');
		$this->form_validation->set_rules('status', 'Status da Matéria','required|trim|in_list[0,1]');
		$this->form_validation->set_rules('turma',  'Turma',            'required|trim');
		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Monitoria_model');
			$data = array(
				'materia_codigo'=> $this->input->post('materia',TRUE),
				'status'        => $this->input->post('status',TRUE),
				'turma'         => $this->input->post('turma',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Monitoria_model->addMonitoria($data) ) {
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
		$this->form_validation->set_rules('materia','Matéria',          'required|trim|integer');
		$this->form_validation->set_rules('status', 'Status da Matéria','required|trim|in_list[0,1]');
		$this->form_validation->set_rules('turma',  'Turma',            'required|trim');
		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Monitoria_model');
			$data = array(
				'materia_codigo'=> $this->input->post('materia',TRUE),
				'status'        => $this->input->post('status',TRUE),
				'turma'         => $this->input->post('turma',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Monitoria_model->editMonitoria($data,$this->input->post('id',TRUE)) ) {
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
		$this->load->model('Monitoria_model');

		if ( $this->Monitoria_model->deleteMonitoria($this->input->post('id',TRUE)) ) {
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