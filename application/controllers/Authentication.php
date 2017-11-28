<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;

	function __construct() {
		parent::__construct();
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url().'home');
	}

	public function logar() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Authentication_model');
			$data = array(
				'email' => $this->input->post('email',TRUE),
				'senha' => $this->input->post('senha',TRUE)
			);
			// Verifica se dados estão corrétos
			if ( $result = $this->Authentication_model->logar($data) ) {

				$data = array(
					'logado'       => TRUE,
					'id'           => $result['id'],
					'nome'         => $result['nome'],
					'matricula'    => $result['matricula'],
					'email'        => $result['email'],
					'curso'        => $result['curso'],
					'telefone'     => $result['telefone'],
					'privilegio'   => $result['privilegio'],
					'departamento' => $result['departamento_id']
				);
				$this->session->set_userdata($data);
				$this->dados = 'logado';

			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Usuário ou senha inválido';
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
	} // Fim do Login
}