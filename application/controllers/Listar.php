<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listar extends CI_Controller {

	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;

	function __construct() {
		parent::__construct();
	}

	public function materias() {
		$this->load->model('Listar_model');

		if ($result = $this->Listar_model->listarMaterias( $this->input->post('departamento',TRUE) )) {
			$this->dados = $result;
		}else{
			$this->erro = TRUE;
			$this->msg  = 'Departamento sem matérias';
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

	public function monitorias() {
		$this->load->model('Listar_model');

		if ($result = $this->Listar_model->listarMonitorias( $this->input->post('materia',TRUE) )) {
			$this->dados = $result;
		}else{
			$this->erro = TRUE;
			$this->msg  = 'Matéria sem monitoria';
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

	public function monitores() {
		$this->load->model('Listar_model');

		if ($result = $this->Listar_model->listarMonitores( $this->input->post('monitoria',TRUE) )) {
			$this->dados = $result;
		}else{
			$this->erro = TRUE;
			$this->msg  = 'Matéria sem monitores';
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