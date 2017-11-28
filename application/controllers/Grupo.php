<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grupo extends CI_Controller {
	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;
	function __construct() {
		parent::__construct();
	}
	public function adicionar() {
		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',      'Nome do Grupo',         'required');
		$this->form_validation->set_rules('horario',   'Horário',               'required');
		$this->form_validation->set_rules('quantidade','Quantidade de Pessoas', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição',             'required');
		$this->form_validation->set_rules('matricula', 'Matrícula',             'required');
		$this->form_validation->set_rules('materia',   'Matéria',               'required|integer');
		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {
			// Carrega o arquivo de conexão com o db
			$this->load->model('Grupo_model');
			$data = array(
				'nome'               => $this->input->post('nome',TRUE),
				'horario'            => $this->input->post('horario',TRUE),
				'quantidade_pessoas' => $this->input->post('quantidade',TRUE),
				'descricao'          => $this->input->post('descricao',TRUE),
				'usuario_id'         => $this->input->post('user_id',TRUE),
				'materia_codigo'     => $this->input->post('materia',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Grupo_model->addCandidatura($data) ) {
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
		$this->form_validation->set_rules('nome',      'Nome do Grupo',         'required');
		$this->form_validation->set_rules('horario',   'Horário',               'required');
		$this->form_validation->set_rules('quantidade','Quantidade de Pessoas', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição',             'required');
		$this->form_validation->set_rules('materia',   'Matéria',               'required|integer');
		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {
			// Carrega o arquivo de conexão com o db
			$this->load->model('Grupo_model');
			$data = array(
				'nome'               => $this->input->post('nome',TRUE),
				'horario'            => $this->input->post('horario',TRUE),
				'quantidade_pessoas' => $this->input->post('quantidade',TRUE),
				'descricao'          => $this->input->post('descricao',TRUE),
				'materia_codigo'     => $this->input->post('materia',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Grupo_model->editCandidatura($data,$this->input->post('id',TRUE)) ) {
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
		$this->load->model('Grupo_model');
		if ( $this->Grupo_model->deleteCandidatura($this->input->post('id',TRUE)) ) {
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
	public function adicionarUser() {
		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',      'Nome do Grupo',         'required');
		$this->form_validation->set_rules('horario',   'Horário',               'required');
		$this->form_validation->set_rules('quantidade','Quantidade de Pessoas', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição',             'required');
		$this->form_validation->set_rules('materia',   'Matéria',               'required|integer');
		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {
			// Carrega o arquivo de conexão com o db
			$this->load->model('Grupo_model');
			$data = array(
				'nome'               => $this->input->post('nome',TRUE),
				'horario'            => $this->input->post('horario',TRUE),
				'quantidade_pessoas' => $this->input->post('quantidade',TRUE),
				'descricao'          => $this->input->post('descricao',TRUE),
				'usuario_id'         => $this->session->id,
				'materia_codigo'     => $this->input->post('materia',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Grupo_model->addCandidatura($data) ) {
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
	public function deletarUser() {
		$this->load->model('Grupo_model');
		if ( $this->Grupo_model->deleteCandidatura($this->input->post('id',TRUE)) ) {
			$this->dados = 'excluido';
		}else{
			$this->erro = TRUE;
			$this->msg  = 'Não foi possível excluir Grupo';
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
}