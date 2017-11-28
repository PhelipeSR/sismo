<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidatura extends CI_Controller {

	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;

	function __construct() {
		parent::__construct();
	}

	public function adicionar() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('cpf',       'CPF',       'required|valida_cpf');
		$this->form_validation->set_rules('remunerada','Categoria', 'required|in_list[0,1]');
		$this->form_validation->set_rules('status',    'Status',    'required|in_list[0,1,2]');
		$this->form_validation->set_rules('materia',   'Matéria',   'required|integer');
		$this->form_validation->set_rules('usuario_id','-',         'required|integer');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Candidatura_model');
			$data = array(
				'cpf'           => $this->input->post('cpf',TRUE),
				'remunerada'    => $this->input->post('remunerada',TRUE),
				'status'        => $this->input->post('status',TRUE),
				'monitorias_id' => $this->input->post('materia',TRUE),
				'usuario_id'    => $this->input->post('usuario_id',TRUE),
				'agencia'       => $this->input->post('agencia',TRUE),
				'conta'         => $this->input->post('conta',TRUE),
				'banco'         => $this->input->post('banco',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Candidatura_model->addCandidatura($data) ) {
				$this->dados = 'cadastrado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao adicionar usuário';
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
		$this->form_validation->set_rules('remunerada','Categoria', 'required|in_list[0,1]');
		$this->form_validation->set_rules('status',    'Status',    'required|in_list[0,1,2]');
		$this->form_validation->set_rules('materia',   'Matéria',   'required|integer');
		$this->form_validation->set_rules('id','-',                 'required|integer');


		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Candidatura_model');
			$data = array(
				'remunerada'    => $this->input->post('remunerada',TRUE),
				'status'        => $this->input->post('status',TRUE),
				'monitorias_id' => $this->input->post('materia',TRUE),
				'agencia'       => $this->input->post('agencia',TRUE),
				'conta'         => $this->input->post('conta',TRUE),
				'banco'         => $this->input->post('banco',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Candidatura_model->editCandidatura($data,$this->input->post('id',TRUE)) ) {
				$this->dados = 'editado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao editar usuário';
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
		$this->load->model('Candidatura_model');

		if ( $this->Candidatura_model->deleteCandidatura($this->input->post('id',TRUE)) ) {
			$this->dados = 'excluido';
		}else{
			$this->erro = TRUE;
			$this->msg  = 'Não foi possível excluir Usuário';
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
	} // Fim do Excluir

	public function verificarUsuario() {
		$this->db->select('id,nome');
		$this->db->where('matricula', $this->input->post('matricula',TRUE));
		$query = $this->db->get('usuario');
		if ($query->num_rows() > 0) {
			$this->dados = $query->result();
		}else{
			$this->erro = TRUE;
			$this->msg  = 'Usuário não encontrado';
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
	} // Fim do Excluir

	public function adicionarUser() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('cpf',       'CPF',       'required|valida_cpf');
		$this->form_validation->set_rules('remunerada','Categoria', 'required|in_list[0,1]');
		$this->form_validation->set_rules('materia',   'Matéria',   'required|integer');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Candidatura_model');
			$data = array(
				'cpf'           => $this->input->post('cpf',TRUE),
				'remunerada'    => $this->input->post('remunerada',TRUE),
				'status'        => 0,
				'monitorias_id' => $this->input->post('materia',TRUE),
				'usuario_id'    => $this->session->id,
				'agencia'       => $this->input->post('agencia',TRUE),
				'conta'         => $this->input->post('conta',TRUE),
				'banco'         => $this->input->post('banco',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Candidatura_model->addCandidatura($data) ) {
				$this->dados = 'cadastrado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao adicionar usuário';
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
											'teste' => $_POST
		)));
	} // Fim do Adicionar
}