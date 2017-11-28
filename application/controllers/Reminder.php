<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller {

	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;

	function __construct() {
		parent::__construct();
	}

	public function recuperar() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('Reminder_model');
			$email = $this->input->post('email',TRUE);

			// Verifica se email existe e volta o id do usuário
			if ($id = $this->Reminder_model->existeEmail($email) ) {
				// Envia o email
				if(enviaEmail($id,$email)){
					$this->dados = 'enviado';
				}else{
					$this->erro  = TRUE;
					$this->msg   = 'Falha ao enviar email. Tente novamente.';
				}
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Email não cadastrado';
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
	} // Fim do recuperar

	public function atualizar(){
		$this->load->model('Reminder_model');
		if ($id = $this->Reminder_model->existeToken( $this->uri->segment(3) ) ) {
			$enviar['id'] = $id;
			$this->load->view('session/recuperacaoUpdate',$enviar);
		}else{
			$this->load->view('session/recuperacaoErro');
		}
	}

	public function updateSenha(){
		// Regras de validação do formulário
		$this->form_validation->set_rules('id', 'ID', 'required|integer');
		$this->form_validation->set_rules('senha','Senha','required|min_length[6]');
		$this->form_validation->set_rules('confSenha','Confirmação de Senha', 'required|matches[senha]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {
			// Carrega o arquivo de conexão com o db
			$this->load->model('Reminder_model');

			// Verifica se existe ação para recuperar senha com o id informado
			if ($this->Reminder_model->existeId( $this->input->post('id',TRUE) ) ) {
				$data = array(
					'id'   => $this->input->post('id',TRUE),
					'hash' => password_hash( $this->input->post('senha',TRUE) , PASSWORD_DEFAULT),
				);
				// Atualiza a senha
				if ($this->Reminder_model->updateSenha($data) ) {
						$this->dados = 'atualizado';
				}else{
					$this->erro  = TRUE;
					$this->msg   = 'Erro ao atualizar senha';
				}
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Dados incorretos';
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
	}

	public function contato(){
		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',    'Nome',     'required|max_length[255]');
		$this->form_validation->set_rules('email',   'Email',    'required|valid_email');
		$this->form_validation->set_rules('conteudo','Conteudo', 'required');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {
			// Carrega o arquivo de conexão com o db
			$this->load->model('Reminder_model');
			$data = array(
				'nome'     => $this->input->post('nome',TRUE),
				'email'    => $this->input->post('email',TRUE),
				'conteudo' => $this->input->post('conteudo',TRUE),
			);
			// Verifica se email foi enviado
			if (contatoUser( $data ) ) {
				$this->dados = 'enviado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao enviar Email';
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
	}
}