<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $dados = null;
	private $erro  = FALSE;
	private $msg   = null;

	function __construct() {
		parent::__construct();
	}

	public function adicionar() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',      'Nome',      'required|trim|max_length[255]');
		$this->form_validation->set_rules('matricula', 'Matrícula', 'required|valida_matricula|unique[usuario.matricula]');
		$this->form_validation->set_rules('telefone',  'Telefone',  'required|valida_telefone');
		$this->form_validation->set_rules('email',     'Email',     'required|valid_email|unique[usuario.email]');
		$this->form_validation->set_rules('curso',     'Curso',     'required');
		$this->form_validation->set_rules('senha',     'Senha',     'required|min_length[6]');
		$this->form_validation->set_rules('confSenha', 'Confirmação de Senha', 'required|matches[senha]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');
			$data = array(
				'nome'       => ucwords(strtolower( $this->input->post('nome',TRUE) )),
				'matricula'  => $this->input->post('matricula',TRUE),
				'telefone'   => $this->input->post('telefone',TRUE),
				'email'      => $this->input->post('email',TRUE),
				'curso'      => $this->input->post('curso',TRUE),
				'hash'       => password_hash( $this->input->post('senha',TRUE) , PASSWORD_DEFAULT),
				'privilegio' => 0
			);
			// Verifica se dados estão corrétos
			if ( $this->User_model->addUsuario($data) ) {
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
		$this->form_validation->set_rules('nome',      'Nome',      'required|trim|max_length[255]');
		$this->form_validation->set_rules('matricula', 'Matrícula', 'required|valida_matricula|unique[usuario.matricula.'.$this->input->post('id',TRUE).']');
		$this->form_validation->set_rules('telefone',  'Telefone',  'required|valida_telefone');
		$this->form_validation->set_rules('email',     'Email',     'required|valid_email|unique[usuario.email.'.$this->input->post('id',TRUE).']');
		$this->form_validation->set_rules('curso',     'Curso',     'required');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');
			$data = array(
				'nome'       => ucwords(strtolower( $this->input->post('nome',TRUE) )),
				'matricula'  => $this->input->post('matricula',TRUE),
				'telefone'   => $this->input->post('telefone',TRUE),
				'email'      => $this->input->post('email',TRUE),
				'curso'      => $this->input->post('curso',TRUE),
				'privilegio' => 0
			);
			// Verifica se dados estão corrétos
			if ( $this->User_model->editUsuario($data,$this->input->post('id',TRUE)) ) {
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

	public function adicionarChefe() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',        'Nome',          'required|trim|max_length[255]');
		$this->form_validation->set_rules('departamento','Departamentto', 'required');
		$this->form_validation->set_rules('telefone',    'Telefone',      'required|valida_telefone');
		$this->form_validation->set_rules('email',       'Email',         'required|valid_email|unique[usuario.email]');
		$this->form_validation->set_rules('senha',       'Senha',         'required|min_length[6]');
		$this->form_validation->set_rules('confSenha',   'Confirmação de Senha', 'required|matches[senha]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');
			$data = array(
				'nome'             => ucwords(strtolower( $this->input->post('nome',TRUE) )),
				'departamento_id'  => $this->input->post('departamento',TRUE),
				'telefone'         => $this->input->post('telefone',TRUE),
				'email'            => $this->input->post('email',TRUE),
				'hash'             => password_hash( $this->input->post('senha',TRUE) , PASSWORD_DEFAULT),
				'privilegio'       => 2
			);
			// Verifica se dados estão corrétos
			if ( $this->User_model->addUsuario($data) ) {
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

	public function editarChefe() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',        'Nome',        'required|trim|max_length[255]');
		$this->form_validation->set_rules('telefone',    'Telefone',    'required|valida_telefone');
		$this->form_validation->set_rules('email',       'Email',       'required|valid_email|unique[usuario.email.'.$this->input->post('id',TRUE).']');
		$this->form_validation->set_rules('departamento','Departamento','required');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');
			$data = array(
				'nome'           => ucwords(strtolower( $this->input->post('nome',TRUE) )),
				'telefone'       => $this->input->post('telefone',TRUE),
				'email'          => $this->input->post('email',TRUE),
				'departamento_id'=> $this->input->post('departamento',TRUE),
				'privilegio'     => 2
			);
			// Verifica se dados estão corrétos
			if ( $this->User_model->editUsuario($data,$this->input->post('id',TRUE)) ) {
				$this->dados = 'editado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao editar chefe de departamento';
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

	public function adicionarFuncionario() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',        'Nome',          'required|trim|max_length[255]');
		$this->form_validation->set_rules('departamento','Departamentto', 'required');
		$this->form_validation->set_rules('telefone',    'Telefone',      'required|valida_telefone');
		$this->form_validation->set_rules('email',       'Email',         'required|valid_email|unique[usuario.email]');
		$this->form_validation->set_rules('senha',       'Senha',         'required|min_length[6]');
		$this->form_validation->set_rules('confSenha',   'Confirmação de Senha', 'required|matches[senha]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');
			$data = array(
				'nome'             => ucwords(strtolower( $this->input->post('nome',TRUE) )),
				'departamento_id'  => $this->input->post('departamento',TRUE),
				'telefone'         => $this->input->post('telefone',TRUE),
				'email'            => $this->input->post('email',TRUE),
				'hash'             => password_hash( $this->input->post('senha',TRUE) , PASSWORD_DEFAULT),
				'privilegio'       => 1
			);
			// Verifica se dados estão corrétos
			if ( $this->User_model->addUsuario($data) ) {
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

	public function editarFuncionario() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',        'Nome',        'required|trim|max_length[255]');
		$this->form_validation->set_rules('telefone',    'Telefone',    'required|valida_telefone');
		$this->form_validation->set_rules('email',       'Email',       'required|valid_email|unique[usuario.email.'.$this->input->post('id',TRUE).']');
		$this->form_validation->set_rules('departamento','Departamento','required');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');
			$data = array(
				'nome'           => ucwords(strtolower( $this->input->post('nome',TRUE) )),
				'telefone'       => $this->input->post('telefone',TRUE),
				'email'          => $this->input->post('email',TRUE),
				'departamento_id'=> $this->input->post('departamento',TRUE),
				'privilegio'     => 1
			);
			// Verifica se dados estão corrétos
			if ( $this->User_model->editUsuario($data,$this->input->post('id',TRUE)) ) {
				$this->dados = 'editado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao editar chefe de departamento';
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

	public function adicionarFuncionarioChefe() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',        'Nome',          'required|trim|max_length[255]');
		$this->form_validation->set_rules('telefone',    'Telefone',      'required|valida_telefone');
		$this->form_validation->set_rules('email',       'Email',         'required|valid_email|unique[usuario.email]');
		$this->form_validation->set_rules('senha',       'Senha',         'required|min_length[6]');
		$this->form_validation->set_rules('confSenha',   'Confirmação de Senha', 'required|matches[senha]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');
			$data = array(
				'nome'             => ucwords(strtolower( $this->input->post('nome',TRUE) )),
				'departamento_id'  => $this->session->departamento,
				'telefone'         => $this->input->post('telefone',TRUE),
				'email'            => $this->input->post('email',TRUE),
				'hash'             => password_hash( $this->input->post('senha',TRUE) , PASSWORD_DEFAULT),
				'privilegio'       => 1
			);
			// Verifica se dados estão corrétos
			if ( $this->User_model->addUsuario($data) ) {
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

	public function editarFuncionarioChefe() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',        'Nome',        'required|trim|max_length[255]');
		$this->form_validation->set_rules('telefone',    'Telefone',    'required|valida_telefone');
		$this->form_validation->set_rules('email',       'Email',       'required|valid_email|unique[usuario.email.'.$this->input->post('id',TRUE).']');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {

			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');
			$data = array(
				'nome'           => ucwords(strtolower( $this->input->post('nome',TRUE) )),
				'telefone'       => $this->input->post('telefone',TRUE),
				'email'          => $this->input->post('email',TRUE),
				'privilegio'     => 1
			);
			// Verifica se dados estão corrétos
			if ( $this->User_model->editUsuario($data,$this->input->post('id',TRUE)) ) {
				$this->dados = 'editado';
			}else{
				$this->erro  = TRUE;
				$this->msg   = 'Erro ao editar chefe de departamento';
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
		$this->load->model('User_model');

		if ( $this->User_model->deleteUsuario($this->input->post('id',TRUE)) ) {
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
	}

	public function editarPerfilChefe() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',     'Nome',      'required|trim|max_length[255]');
		$this->form_validation->set_rules('telefone', 'Telefone',  'required|valida_telefone');
		$this->form_validation->set_rules('email',    'Email',     'required|valid_email|unique[usuario.email.'.$this->session->id.']');
		$this->form_validation->set_rules('senha',    'Senha',     'required|min_length[6]');
		$this->form_validation->set_rules('novaSenha','Nova Senha','min_length[6]');
		$this->form_validation->set_rules('confNovaSenha', 'Confirmação de Nova Senha', 'matches[novaSenha]');


		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {
			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');

			if ($this->User_model->checkUsuario($this->session->id, $this->input->post('senha',TRUE))) {
				$data = array(
					'nome'           => ucwords(strtolower( $this->input->post('nome',TRUE) )),
					'telefone'       => $this->input->post('telefone',TRUE),
					'email'          => $this->input->post('email',TRUE),
				);
				if ($this->input->post('novaSenha',TRUE)) {
					$data['hash'] = password_hash( $this->input->post('novaSenha',TRUE) , PASSWORD_DEFAULT);
				}
				if ( $this->User_model->editUsuario($data, $this->session->id) ) {
					$this->dados = 'editado';
					$this->session->set_userdata($data);
				}else{
					$this->erro  = TRUE;
					$this->msg   = 'Erro ao editar chefe de departamento';
				}
			}else{
				$this->erro = TRUE;
				$this->msg = "Senha incorreta";
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

	public function editarPerfilUsuario() {

		// Regras de validação do formulário
		$this->form_validation->set_rules('nome',     'Nome',      'required|trim|max_length[255]');
		$this->form_validation->set_rules('telefone', 'Telefone',  'required|valida_telefone');
		$this->form_validation->set_rules('email',    'Email',     'required|valid_email|unique[usuario.email.'.$this->session->id.']');
		$this->form_validation->set_rules('matricula', 'Matrícula', 'required|valida_matricula|unique[usuario.matricula.'.$this->session->id.']');
		$this->form_validation->set_rules('curso',     'Curso',     'required');
		$this->form_validation->set_rules('senha',    'Senha',     'required|min_length[6]');
		$this->form_validation->set_rules('novaSenha','Nova Senha','min_length[6]');
		$this->form_validation->set_rules('confNovaSenha', 'Confirmação de Nova Senha', 'matches[novaSenha]');

		// Valida as informações do formulário
		if ( $this->form_validation->run() ) {
			// Carrega o arquivo de conexão com o db
			$this->load->model('User_model');

			if ($this->User_model->checkUsuario($this->session->id, $this->input->post('senha',TRUE))) {
				$data = array(
					'nome'           => ucwords(strtolower( $this->input->post('nome',TRUE) )),
					'telefone'       => $this->input->post('telefone',TRUE),
					'email'          => $this->input->post('email',TRUE),
					'matricula'      => $this->input->post('matricula',TRUE),
					'curso'          => $this->input->post('curso',TRUE),
				);
				if ($this->input->post('novaSenha',TRUE)) {
					$data['hash'] = password_hash( $this->input->post('novaSenha',TRUE) , PASSWORD_DEFAULT);
				}
				if ( $this->User_model->editUsuario($data, $this->session->id) ) {
					$this->dados = 'editado';
					$this->session->set_userdata($data);
				}else{
					$this->erro  = TRUE;
					$this->msg   = 'Erro ao editar';
				}
			}else{
				$this->erro = TRUE;
				$this->msg = "Senha incorreta";
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
}