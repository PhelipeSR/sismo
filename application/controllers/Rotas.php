<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rotas extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	public function index() {
		if ($this->session->logado == true) {

			if ($this->session->privilegio == 0) {
				$this->load->view('home/user');
			}
			else if ($this->session->privilegio == 1) {
				$this->load->view('home/funcionario');
			}
			else if ($this->session->privilegio == 2) {
				$this->load->view('home/chefe');
			}
			else if ($this->session->privilegio == 3) {
				$this->load->view('home/admin');
			}else{
				$this->load->view('home');
			}

		}else{
			$this->load->view('home');
		}
	}
	public function cadastro() {
		$this->load->view('session/cadastro');
	}
	public function contato() {
		$this->load->view('session/contato');
	}
	public function listarMonitorias() {
		$this->load->view('session/listar-monitorias');
	}
	public function recuperacaoSenha() {
		$this->load->view('session/recuperacaoSenha');
	}
	public function login() {
		$this->load->view('session/login');
	}
	public function sobre() {
		$this->load->view('session/sobre');
	}
	public function erro404() {
		$this->load->view('session/404');
	}
}