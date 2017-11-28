<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;

	function __construct() {
		parent::__construct();
	}

	public function adicionar() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('modalidade',  'Modalidade',   'required|in_list[Presencial,Distância]');
		$this->form_validation->set_rules('codigo',      'Código',       'required|integer|unique[cursos.codigo]');
		$this->form_validation->set_rules('denominacao', 'Denominação',  'required|trim');
		$this->form_validation->set_rules('turno',       'Turno',        'required|in_list[Diurno,Noturno]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Curso_model');
			$data = array(
				'modalidade'  => $this->input->post('modalidade',TRUE),
				'codigo'      => $this->input->post('codigo',TRUE),
				'denominacao' => strtoupper( $this->input->post('denominacao',TRUE) ),
				'turno'       => $this->input->post('turno',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Curso_model->addCurso($data) ) {
				$this->dados = 'cadastrado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao adicionar curso';
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
		$this->form_validation->set_rules('modalidade',  'Modalidade',   'required|in_list[Presencial,Distância]');
		$this->form_validation->set_rules('codigo',      'Código',       'required|integer|unique[cursos.codigo.'.$this->input->post('id',TRUE).']');
		$this->form_validation->set_rules('denominacao', 'Denominação',  'required|trim');
		$this->form_validation->set_rules('turno',       'Turno',        'required|in_list[Diurno,Noturno]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Curso_model');
			$data = array(
				'modalidade'  => $this->input->post('modalidade',TRUE),
				'codigo'      => $this->input->post('codigo',TRUE),
				'denominacao' => strtoupper( $this->input->post('denominacao',TRUE) ),
				'turno'       => $this->input->post('turno',TRUE),
			);
			// Verifica se dados estão corrétos
			if ( $this->Curso_model->editCurso($data,$this->input->post('id',TRUE)) ) {
				$this->dados = 'editado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao editar curso';
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
		$this->load->model('Curso_model');

		if ( $this->Curso_model->deleteCurso($this->input->post('id',TRUE)) ) {
			$this->dados = 'excluido';
		}else{
			$this->erro = TRUE;
			$this->msg  = 'Não foi possível excluir curso';
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