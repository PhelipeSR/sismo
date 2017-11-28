<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento extends CI_Controller {

	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;

	function __construct() {
		parent::__construct();
	}

	public function adicionar() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome','Nome do Departamento','required|trim|unique[departamento.nome]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Departamento_model');
			$data = array(
				'nome'  => $this->input->post('nome',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Departamento_model->addDepartamento($data) ) {
				$this->dados = 'cadastrado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao adicionar departamento';
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
		$this->form_validation->set_rules('nome','Nome do Departamento','required|trim|unique[departamento.nome.'.$this->input->post('id',TRUE).']');
		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Departamento_model');
			$data = array(
				'nome'  => $this->input->post('nome',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Departamento_model->editDepartamento($data,$this->input->post('id',TRUE)) ) {
				$this->dados = 'editado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao editar departamento';
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
		$this->load->model('Departamento_model');

		if ( $this->Departamento_model->deleteDepartamento($this->input->post('id',TRUE)) ) {
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